<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tambahMahasiswaController extends Controller
{
    public function tambahMahasiswa(Request $request){
        $request->validate([
            'NIM'=>'required|unique:mahasiswas',
            'Nama'=>'required',
            'Alamat'=>'required',
            'Fakultas'=>'required'
        ]);
        
        $query = DB::table('mahasiswas')->insert([
            'NIM'=>$request->input('NIM'),
            'Nama'=>$request->input('Nama'),
            'Alamat'=>$request->input('Alamat'),
            'Fakultas'=>$request->input('Fakultas')
        ]);

        if($query){
            return redirect()->to('index')->send()->with('success', 'Data mahasiswa berhasil di tambahkan!');
        } 
    }

    
}

