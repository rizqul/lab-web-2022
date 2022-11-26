<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Seller;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::latest()->paginate(5);

        return view('seller', compact('sellers'));
    }

    public function saveProductUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
        ]);

        Seller::create($request->all());

        return redirect()->route('seller')->with('Success', 'Seller created successfully');
    }
    public function saveProductUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
        ]);

        DB::table('sellers')
            ->insert([
                'name' => $request->name,
                'address' => $request->address,
                'gender' => $request->gender,
                'no_hp' => $request->no_hp,
                'status' => $request->status,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect()->route('seller')->with('Success', 'Seller created successfully');
    }
}