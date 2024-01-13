<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ConfigRequest;

class ConfigController extends Controller
{
    public function index()
    {
        return view ('config.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // 現在認証されているユーザーを取得
        $posts = DB::table('posts')->get();

        // ユーザー名の更新
        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }

        if ($request->filled('name')) {
            $newName = $request->input('name');

            // ポストテーブルの更新
            $user->posts()->update(['user_name' => $newName]);
        }

        // メールアドレスの更新
        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        // アイコンのアップロード
        if ($request->filled('icon')) {
            $userIcon = $request->input('icon');
            $path = $userIcon->storeAs('avatars', $user->id . '.' . $userIcon->getClientOriginalExtension(), 'public');
            $user->icon = $path;
        }

        // パスワードの変更
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // 電話番号の更新
        if ($request->filled('phone_number')) {
            $user->phone_number = $request->input('phone_number');
        }

        $user->save();

        return redirect()->route('configs.index')->with('flash_message', '設定を修正しました');
    }
}
