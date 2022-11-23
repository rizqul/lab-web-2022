<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;

class BookController extends Controller {

    // Indexing Method
    public function index() {
        $books = Book::latest()->paginate(10);
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
    public function edit(Request $input) {
        $input->validate([
            'id' => 'required',
            'book_name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'favorable' => 'required',
        ]);

        DB::table('books')
            ->where('id', $input->id)
            ->update([
                'book_name' => $input->book_name,
                'author' => $input->author,
                'category' => $input->category,
                'favorable' => $input->favorable,
            ]);

        return redirect()->back()->with('success', 'Successfully Edited the Book');
    }

    // Delete Method
    public function delete(Request $input) {
        $input->validate([
            'id' => 'required',
        ]);

        DB::table('books')
            ->where('id', '=', $input->id)
            ->delete();

        return redirect()->route('index')->with('success', 'Successfully Deleted the Book');
    }

}
