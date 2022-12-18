<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\register;

class registerController extends Controller
{

    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|unique:users',
            'userName' => 'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'foto'=>'required',
        ]);

        $register = new register();
        $register->name = $request->name;
        $register->userName = $request->userName;
        $register->email = $request->email;
        $register->password = bcrypt($request->password);
        $register->level = 'member';

        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoArticle/', $request->file('foto')->getClientOriginalName());
            $register->foto = $request->file('foto')->getClientOriginalName();
            $register->save();
        }


        return redirect()->to('/login')->send()->with('success', 'Data berhasil di tambahkan!');
    }
}