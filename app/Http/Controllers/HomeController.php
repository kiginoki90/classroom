<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    // 一覧ページ
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('home.index', compact('posts'));
    }

}
