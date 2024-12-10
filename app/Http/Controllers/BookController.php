<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file',
        ]);

        // Handle file upload
        $filePath = $request->file('file')->store('books');
        // Create the book
        Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'description' => $request->description,
            'file' => $filePath,
        ]);

        return redirect()->route('home')->with('success', 'Книга успешно добавлена!');
    }
    public function destroy(Book $book)
    {
        // Delete the associated file if exists
//        if ($book->file) {
//            \Storage::delete($book->file);
//        }

        // Delete the book
        $book->delete();

        return redirect()->route('home')->with('success', 'Книга успешно удалена!');
    }
    public function show(Book $book)
    {
        $books = Book::all();
        return view('book', compact('book', 'books'));
    }
    public function books(){
        $books = Book::all();
        return view('book-list', compact('books'));
    }
}
