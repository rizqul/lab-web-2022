<?php

namespace App\Http\Controllers;

use App\Models\Sellers;
use Illuminate\Http\Request;
use \Carbon\Carbon as Date;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller {

    public function storeSellerEloquent(Request $request) { // Use Eloquent
        $request->validate([
            'seller_name' => 'required',
            'seller_address' => 'required',
            'seller_gender' => 'required',
            'seller_phone' => 'required',
            'seller_status' => 'required',
        ]);

        Sellers::create(
            [
                'name' => $request->seller_name,
                'address' => $request->seller_address,
                'gender' => $request->seller_gender,
                'phone' => $request->seller_phone,
                'status' => $request->seller_status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect('/');
    }

    public function storeSellerQuery(Request $request) { // Use Query Builder
        $request->validate([
            'seller_name' => 'required',
            'seller_status' => 'required',
        ]);

        $sellers = DB::table('sellers')->insert(
            [
                'name' => $request->seller_name,
                'status' => $request->seller_status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('index', compact('sellers'))
            ->with('success', 'Seller created successfully.');
    }

    public function editSeller($id) {
        $sellers = Sellers::find($id);

        return view('index', compact('sellers'));
    }

    public function updateSellerEloquent(Request $request, $id) { // Use Eloquent
        $request->validate([
            'seller_name' => 'required',
            'seller_status' => 'required',
        ]);

        $sellers = Sellers::find($id);
        $sellers->name = $request->seller_name;
        $sellers->status = $request->seller_status;
        $sellers->updated_at = Date::now();
        $sellers->save();

        return redirect()->route('index', compact('sellers'))
            ->with('success', 'Seller updated successfully');
    }

    public function updateSellerQuery(Request $request, $id) { // Use Query Builder
        $request->validate([
            'seller_name' => 'required',
            'seller_status' => 'required',
        ]);

        $sellers = DB::table('sellers')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->seller_name,
                    'status' => $request->seller_status,
                    'updated_at' => Date::now()
                ]
            );

        return redirect()->route('index', compact('sellers'))
            ->with('success', 'Seller updated successfully');
    }

    public function deleteSeller($id) {
        $sellers = Sellers::find($id);
        $sellers->delete();

        return redirect('/');
    }

}
