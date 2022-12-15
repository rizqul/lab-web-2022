<?php

namespace App\Http\Controllers;

use Image;
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
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        $user = new Users();

        $user->name = $data['name'];

        // Password
        if ($data['new_password'] != $data['confirm_password']) {
            return back()->with('status', 'The password doesn\'t match.')->onlyInput('username', 'email', 'name');

        } else if (strlen($data['new_password']) < 8) {
            return back()->with('status', 'The password must be at least 8 characters.')->onlyInput('username', 'email', 'name');

        } else if (!preg_match('/[A-Z]/', $data['new_password'])) {
            return back()->with('status', 'The password must contain at least one uppercase letter.')->onlyInput('username', 'email', 'name');
            
        } else if (!preg_match('/[0-9]/', $data['new_password'])) {
                return back()->with('status', 'The password must contain at least one number.')->onlyInput('username', 'email', 'name');

        } else {
            $user->password = $data['new_password'];
        }

        // Email
        $matchEmail = Users::where('email', $data['email'])->first();

        if ($matchEmail) {
            return back()->with('status', 'Email already taken.')->onlyInput('username', 'email', 'name');
            
        } else {
            $user->email = $data['email'];
        }

        // Username
        $matchUsername = Users::where('username', $data['username'])->first();

        if ($matchUsername) {
            return back()->with('status', 'Username already taken.')->onlyInput('username', 'email', 'name');
            
        } else if (strlen($data['username']) < 4) {
            return back()->with('status', 'The username must be at least 4 characters.')->onlyInput('username', 'email', 'name');

        } else if (strlen($data['username']) > 24) {
            return back()->with('status', 'The username must be at most 24 characters.')->onlyInput('username', 'email', 'name');

        } else {
            $user->username = $data['username'];
        }
        
        $user->save();

        return redirect()->route('login.show')->with('status', 'You can now login with that account.');
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);

        $data = Users::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->biography = $request->biography;

        if ($request->file('avatar')) {
            $data->avatar = $request->file('avatar')->store('users');
        }

        $data->save();
        
        return redirect()->route('page.users');
    }

    public function delete($id)
    {   
        Users::find($id)->delete($id);
        return redirect()->route('page.users');
    }
}
