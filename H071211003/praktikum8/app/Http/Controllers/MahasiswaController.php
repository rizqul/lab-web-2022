<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function index(){
        $data = Mahasiswa::paginate(10);
        return view ('index', compact('data'));

        // $data = Mahasiswa::all();
        // return view('mahasiswas', compact('data'));
    }

    public function insertdata(){
        return view('TambahData');
    }

    public function tambahdata(Request $request){
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id){
        $data = Mahasiswa::find($id);
        
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Mahasiswa::find($id);
        $data->update($request->all());
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id){
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Di Hapus');
    }
}
