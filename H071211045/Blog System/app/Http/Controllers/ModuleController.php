<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
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

    // Users
    public function users($filter = null) {
        if ($filter == 'date') {
            $users = Users::orderBy('created_at', 'desc')->paginate(10);
            
        } else if ($filter == 'status-active') {
            $users = Users::orderByRaw('FIELD(status, "active")')->paginate(10);
            
        } else if ($filter == 'status-inactive') {
            $users = Users::orderByRaw('FIELD(status, "inactive")')->paginate(10);
            
        } else if ($filter == 'status-blocked') {
            $users = Users::orderByRaw('FIELD(status, "blocked")')->paginate(10);

        } else {
            $users = Users::paginate(10);
        }

        return view('module.users', compact('users'));
    }

    public function userNew() {
        return view('posting.users');
    }

    public function login() {
        return view('module.login');
    }

    public function register() {
        return view('module.register');
    }

}
