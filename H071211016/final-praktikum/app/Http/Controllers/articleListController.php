<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articleList;

class articleListController extends Controller
{
    public function showArticleList()
    {
        $data = articleList::where('status', 'published')->paginate(6);
        return view('articleList')
            -> with(compact('data'));
    }
}
