<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class editDataMahasiswaController extends Controller
{
    public function editDataMahasiswa(Request $request, $NIM){
        
        $request->validate([
            'NIM'=>'required',
            'Nama'=>'required',
            'Alamat'=>'required',
            'Fakultas'=>'required'
        ]);

        try {

            $query = DB::table('mahasiswas')->where('NIM', $NIM)->update([
                'NIM'=>$request->input('NIM'),
                'Nama'=>$request->input('Nama'),
                'Alamat'=>$request->input('Alamat'),
                'Fakultas'=>$request->input('Fakultas')
            ]);
            return redirect()->to('index')->send()->with('success', 'Data berhasil di edit');
        
        } 
        catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->to('index')->send()->with('exist', 'Mahasiswa dengan NIM tersebut sudah ada!');
            }
        }
    }
}