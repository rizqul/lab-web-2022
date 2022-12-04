<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){        //untuk ke halaman web
        return view('datamahasiswa');
    }

    public function add(){
        return view('datamahasiswa', ["title" => "Tambah Data",]);
        //untuk munculkan modal (pop up form)
        //di form, data dibuat (create)
    }

    public function submit(Request $request){

        Mahasiswa::create([
            'NIM' => $request->nim,
            'Nama' => $request->nama,
            'Alamat' => $request->alamat,
            'Fakultas' => $request->fakultas,
        ]);

        return redirect()->back()->with('status', true);
    }
    
    public function edit($id){
        $singledata = Mahasiswa::find($id);
        return view('editdata', compact('singledata'));
    }

    public function update(Request $request, $id){
        Mahasiswa::find($id)->update([
            'NIM' => $request->nim,
            'Nama' => $request->nama,
            'Fakultas' => $request->fakultas,
            'Alamat' => $request->alamat
        ]);

        return redirect()->intended('/datamahasiswa')->with('status', true);    //status merupakan variabel baru
    }

    public function delete($id){
        $delete = Mahasiswa::find($id);
        $delete->delete();
        return redirect()->back();
    }
}