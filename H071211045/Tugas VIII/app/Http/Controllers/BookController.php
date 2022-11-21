<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller {

    // Indexing Method
    public function index() {
        $books = Book::latest()->paginate(5);
        return view('main', compact('books'));
    }

    // Store Variables to Database
    public function store(Request $input, Book $books) {
        $input->validate([
            'book_name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'favorable' => 'required',
        ]);

        $books = Book::create([
            'book_name' => $input->book_name,
            'author' => $input->author,
            'category' => $input->category,
            'favorable' => $input->favorable,
        ]);

        return redirect()->route('index', $books)->with('success', 'Successfully Added the Book');
    }

    // Edit Method
    public function edit(Request $request) {
        $request->validate([
            'book_name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'favorable' => 'required',
        ]);

        DB::table('books')
            ->where('id', $request->id)
            ->update([
                'book_name' => $request->book_name,
                'author' => $request->author,
                'category' => $request->category,
                'favorable' => $request->favorable,
            ]);

        return redirect()->route('index')->with('success', 'Successfully Updated the Book');
    }

    // Delete Method
    public function delete($id) {
        DB::table('books')
            ->where('id', '=', $id)
            ->delete();

        return redirect()->route('index')->with('success', 'Successfully Deleted the Book');
    }
}
