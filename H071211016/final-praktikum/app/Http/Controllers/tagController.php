<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tag;
use App\Models\articleTag;
use Illuminate\Support\Facades\DB;
use Auth;

class tagController extends Controller
{
    public function showTag()
    {
        $data = tag::withCount('articles')->where('author_id', Auth::id())->get();
        return view('member/tag')
            ->with(compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $tag = new tag();
        $tag->name = $request->name;
        $tag->author_id = Auth::id();
        $tag->save();

        return redirect()->to('/tag')->send()->with('success', 'Your Category Successfully Uploaded!');
    }

    public function edit(Request $request, $id){
        $request->validate([
            'name'=>'required',
        ]);
        
        $tag = tag::find($id);
        $tag->name = $request->name;

        $tag->save();

        return redirect()->to('/tag')->send()->with('success', 'Data berhasil di edit!');
    }

    public function delete($id)
    {
        $deleted = DB::table('tags')->where('id','=', $id)->delete();
        return redirect()->to('/tag')->send()->with('success', 'Data berhasil di hapus!');
    }
}
