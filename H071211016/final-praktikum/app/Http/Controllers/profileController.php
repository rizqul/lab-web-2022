<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;


class profileController extends Controller
{
    public function showProfile($id)
    {
        $data = User::withCount('articles')->where('id', $id)->get();
        return view('profile')
            ->with(compact('data'));
    }

    public function editProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->userName;
        $user->biography = $request->biography;

        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoArticle/', $request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
            $user->save();
        }

        return redirect()->to('/profile/'.Auth::id())->send()->with('success', 'Data berhasil di edit!');

    }

    public function deleteProfile($id)
    {
        $deleted = DB::table('users')->where('id','=', $id)->delete();
        return redirect()->to('/login')->send()->with('success', 'Data berhasil di hapus!');
    }
}
