<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $data = Mahasiswa::paginate(5);
        return view('datamahasiswa', compact('data'));
    }

    public function tambahmahasiswa() {
        return view('tambahdata');
    }

    public function insertdata(Request $request) {
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa')->with('success', 'Data berhasil ditambahkan.');
    }

    public function showdata($id) {
        $data = Mahasiswa::find($id);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id) {
        $data = Mahasiswa::find($id);
        $data->update($request->all());
        return redirect()->route('mahasiswa')->with('success', 'Data berhasil diubah.');

    }

    public function delete($id) {
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa')->with('success', 'Data berhasil dihapus.');

    }
}
