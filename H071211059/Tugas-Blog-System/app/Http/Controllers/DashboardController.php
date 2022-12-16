<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_user = count(User::all());
        $total_article = count(Article::all());
        $total_likes = count(Article::all());

        $most_likes = Article::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        $most_views = Article::orderBy('view_count', 'desc')->take(3)->get();
        $most_comments = Article::withCount('comments')->orderBy('comments_count', 'desc')->take(3)->get();

        return view('dashboard.home', compact('total_user', 'total_article', 'total_likes', 'most_likes', 'most_views', 'most_comments'));
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}