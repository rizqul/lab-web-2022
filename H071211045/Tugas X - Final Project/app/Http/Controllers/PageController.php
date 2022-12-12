<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function homepage() {
        return view('page.homepage');
    }

    public function dashboard() {
        return view('module.dashboard');
    }

    public function articles() {
        return view('module.articles');
    }

    public function categories() {
        return view('module.categories');
    }

    public function tags() {
        return view('module.tags');
    }

    public function users($filter = null) {
        if ($filter == 'date') {
            $users = Users::orderBy('created_at', 'desc')->paginate(10);
        } else if ($filter == 'role') {
            $users = Users::orderBy('role', 'asc')->paginate(10);
        } else if ($filter == 'status') {
            $users = Users::orderBy('status', 'asc')->paginate(10);
        } else {
            $users = Users::paginate(10);
        }

        return view('module.users', compact('users'));
    }

    public function login() {
        return view('module.login');
    }

    public function register() {
        return view('module.register');
    }


}
