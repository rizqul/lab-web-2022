<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{   
    public function homepage() {
        $popularArticles = Articles::orderBy('likes', 'desc')->limit(5)->get();
        $latestArticles = Articles::orderBy('created_at', 'desc')->limit(5)->get();
        $popularCategories = Categories::orderBy('article_count', 'desc')->limit(5)->get();
        $mostActiveMember = Users::orderBy('article_count', 'desc')->limit(5)->get();

        return view('page.homepage',
            compact(
                'popularArticles',
                'latestArticles',
                'popularCategories',
                'mostActiveMember'
            )
        );
    }

    public function articles() {
        $articles = Articles::orderBy('created_at', 'desc')->paginate(10);
        return view('page.article-list', compact('articles'));
    }

    public function member($username) {
        $user = Users::where('username', $username)->first();

        return view('page.member-detail', compact('user'));
    }


    

}
