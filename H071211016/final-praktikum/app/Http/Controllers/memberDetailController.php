<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\memberDetail;

class memberDetailController extends Controller
{
    public function showMemberDetail($id)
    {
        $data = memberDetail::where('id', $id)->get();
        return view ('memberDetail')
            -> with(compact('data'));
    }
}
