<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mahasiswaController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            return view('index', [
                'data' => DB::table('mahasiswas')->where('Nama', 'LIKE', '%' .$request->search. '%')->paginate(10)
            ]);
        } else {
            return view('index', [
                'data' => DB::table('mahasiswas')->paginate(10)
            ]);
        }
    }
}
