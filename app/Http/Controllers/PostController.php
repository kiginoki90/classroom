<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    // 一覧ページ
    public function index()
    {
        $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    // 詳細ページ
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 作成ページ
    public function create()
    {
        return view ('posts.create');
    }

    // 作成機能
    public function store(PostRequest $request)
    {
        //インスタンス作成
        $post = new Post();

        //保存の内容
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::id();

        //データベースに保存
        $post->save();

        return redirect()->route('posts.index')->with('flsh_message','投稿が完了しました');
    }
}
