<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class homePageController extends Controller
{
    public function showHomePage()
    {
        $data = DB::table('users')->limit(5)->get();
        $data2 = DB::table('categories')->limit(6)->get();
        $data3 = DB::table('articles')->where('status', 'published')->limit(5)->get();
        return view('homepage')
            -> with(compact('data'))
            -> with(compact('data2'))
            -> with(compact('data3'));
    }
}
