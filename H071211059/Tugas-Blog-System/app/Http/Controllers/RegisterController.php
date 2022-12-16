<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:6', 'max:225', 'confirmed'],
            'agree' => ['required']
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        session()->flash('registrationSuccess', 'Congratulations, your account has been succesfully created');

        return redirect('/login');
        // return $request->all();
    }
}