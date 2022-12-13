<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function dashboard()
    {
        return view('module.dashboard');
    }

    public function articles()
    {
        return view('module.articles');
    }

    public function categories()
    {
        return view('module.categories');
    }

    public function tags()
    {
        return view('module.tags');
    }

    /*
     * Users CMS
     */
    public function users()
    {
        $users = Users::paginate(10);
        return view('module.users', compact('users'));
    }

    public function usersFilter(Request $request)
    {
        switch ($request->input('filter')) {
            case 'created_date':
                $users = Users::orderBy('created_at', 'desc')->paginate(10);
                break;
    
            case 'active':
                $users = Users::orderByRaw("FIELD('status', 'active')")->paginate(10);
                break;
    
            case 'inactive':
                $users = Users::orderByRaw("FIELD('status', 'inactive')")->paginate(10);
                break;

            case 'blocked':
                $users = Users::orderByRaw("FIELD('status', 'blocked')")->paginate(10);
                break;
                
            default:
                $users = Users::paginate(10);
                break;
        }
        return view('module.users', compact('users'));
    }

    public function userNew()
    {
        return view('posting.users');
    }

    public function userEdit($id)
    {
        $user = Users::find($id)->first();

        return view('posting.users', compact('user'));
    }
    /* * * * */

    /*
     * Login & Register
     */
    public function login()
    {
        return view('module.login');
    }

    public function register()
    {
        return view('module.register');
    }
    /* * * * */
}
