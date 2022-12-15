<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate();

        return view('dashboard.tags', compact('tags'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => ['required', 'unique:tags', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        // dd($validated);
        $validated['author_id'] = auth()->user()->id;

        Tag::create($validated);

        return redirect(route('tags'));
    }

    public function getTag($id)
    {
        $test = Tag::find($id);
        // dd($test);

        return response()->json(
            [
                'id' => $test->id,
                'name' => $test->name,
                'description' => $test->description,
            ],
            200,
        );
    }

    public function update(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255|unique:tags,name,' . $request->id,
            'description' => 'required|max:255',
        ]);

        // dd($validated);

        Tag::find($request->id)->update($validated);

        return redirect(route('tags'));
    }

    public function delete($id)
    {
        // dd($id);
        Tag::find($id)->delete();
    }
}