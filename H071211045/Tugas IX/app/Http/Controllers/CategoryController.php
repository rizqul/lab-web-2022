<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use \Carbon\Carbon as Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {

    public function storeCategoryEloquent(Request $request) { // Use Eloquent
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $categories = Categories::create(
            [
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('categories.index', compact('categories'))
            ->with('success', 'Category created successfully.');
    }

    public function storeCategoryQuery(Request $request) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $categories = DB::table('categories')->insert(
            [
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->route('categories.index', compact('categories'))
            ->with('success', 'Category created successfully.');
    }

    public function editCategory($id) {
        $categories = Categories::find($id);

        return view('index', compact('categories'));
    }

    public function updateCategoryEloquent(Request $request, $id) { // Use Eloquent
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $categories = Categories::find($id);
        $categories->name = $request->name;
        $categories->status = $request->status;
        $categories->updated_at = Date::now();
        $categories->save();

        return redirect()->route('index', compact('categories'))
            ->with('success', 'Category updated successfully');
    }

    public function updateCategoryQuery(Request $request, $id) { // Use Query Builder
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $categories = DB::table('categories')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'status' => $request->status,
                    'updated_at' => Date::now()
                ]
            );

        return redirect()->route('index', compact('categories'))
            ->with('success', 'Category updated successfully');
    }

    public function deleteCategory($id) {
        $categories = Categories::find($id);
        $categories->delete();

        return redirect()->route('index', compact('categories'))
            ->with('success', 'Category deleted successfully');
    }
}
