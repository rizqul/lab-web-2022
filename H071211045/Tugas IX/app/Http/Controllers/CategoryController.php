<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use \Carbon\Carbon as Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {

    public function storeCategoryEloquent(Request $request) { // Use Eloquent
        $request->validate([
            'category_name' => 'required',
            'category_status' => 'required',
        ]);

        Categories::create(
            [
                'name' => $request->category_name,
                'status' => $request->category_status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->back()
            ->with('success', 'Category created successfully.');
    }

    public function storeCategoryQuery(Request $request) { // Use Query Builder
        $request->validate([
            'category_name' => 'required',
            'category_status' => 'required',
        ]);

        DB::table('categories')->insert(
            [
                'name' => $request->category_name,
                'status' => $request->category_status,
                'updated_at' => Date::now(),
                'created_at' => Date::now()
            ]
        );

        return redirect()->back()
            ->with('success', 'Category created successfully.');
    }

    public function editCategory($id) {
        $categories = Categories::find($id);

        return view('index', compact('categories'));
    }

    public function updateCategoryEloquent(Request $request, $id) { // Use Eloquent
        $request->validate([
            'category_name' => 'required',
            'category_status' => 'required',
        ]);

        $categories = Categories::find($id);
        $categories->name = $request->category_name;
        $categories->status = $request->category_status;
        $categories->updated_at = Date::now();
        $categories->save();

        return redirect()->route('index', compact('categories'))
            ->with('success', 'Category updated successfully');
    }

    public function updateCategoryQuery(Request $request, $id) { // Use Query Builder
        $request->validate([
            'category_name' => 'required',
            'category_status' => 'required',
        ]);

        $categories = DB::table('categories')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->category_name,
                    'status' => $request->category_status,
                    'updated_at' => Date::now()
                ]
            );

        return redirect()->route('index', compact('categories'))
            ->with('success', 'Category updated successfully');
    }

    public function deleteCategory($id) {
        $categories = Categories::where('id', $id)->first();

        if ($categories) {
            $categories->delete();
        }

        return redirect('/');
    }
}
