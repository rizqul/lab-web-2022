<?php

namespace App\Http\Controllers;

use App\Models\Sellers;
use Illuminate\Http\Request;
use \Carbon\Carbon as Date;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function index() {
        $sellers = Sellers::latest()->paginate(5);
        return view('index');
    }

    public function storeSellerEloquent(Request $request) { // Use Eloquent
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $sellers = Sellers::create(
            [
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('index', compact('sellers'))
            ->with('success', 'Seller created successfully.');
    }

    public function storeSellerQuery(Request $request) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $sellers = DB::table('sellers')->insert(
            [
                'name' => $request->name,
                'status' => $request->status,
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
            'name' => 'required',
            'status' => 'required',
        ]);

        $sellers = Sellers::find($id);
        $sellers->name = $request->name;
        $sellers->status = $request->status;
        $sellers->updated_at = Date::now();
        $sellers->save();

        return redirect()->route('index', compact('sellers'))
            ->with('success', 'Seller updated successfully');
    }

    public function updateSellerQuery(Request $request, $id) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $sellers = DB::table('sellers')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'status' => $request->status,
                    'updated_at' => Date::now()
                ]
            );

        return redirect()->route('index', compact('sellers'))
            ->with('success', 'Seller updated successfully');
    }

    public function deleteSeller($id) {
        $sellers = Sellers::find($id);
        $sellers->delete();

        return redirect()->route('index', compact('sellers'))
            ->with('success', 'Seller deleted successfully');
    }

}
