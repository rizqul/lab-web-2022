<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(){
        $data = Buku::all();
        return view('view', compact('data'));
    }

    public function store(Request $request){
        Buku::create($request->all());
        return redirect('/datapinjam');
    }

    public function edit($id) {
        $data = Buku::find($id);
        return view ('edit', [
            'buku' => $data
        ]);
        // dd($data);
    }

    public function update(Request $request, $id) {
        // dd($request);
        $data = Buku::find($id)->update($request->all());
        return redirect('/datapinjam');
    }

    public function delete($id) {
        $data = Buku::find($id)->delete();
        return redirect('/datapinjam');
    }

}
