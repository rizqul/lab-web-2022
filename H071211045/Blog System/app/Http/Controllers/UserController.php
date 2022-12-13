<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;
    
    // public function __construct() {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $this->user = Auth::user();

            return redirect()->intended('/');
        }

        return back()->with('status', 'Please check your username and password carefully.')->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('page.homepage');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('login.show')->with('status', 'You can now login with that account.');
    }

    public function delete($id)
    {   
        Users::find($id)->delete($id);
        return redirect()->route('page.users');
    }
}
