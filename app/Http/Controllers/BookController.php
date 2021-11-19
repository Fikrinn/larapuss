<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::with('author')->get();
        return view('admin.book.index', compact('books'));
    }


    public function create()
    {
        $author = Author::all();
        return view('admin.book.create', compact('author'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books',
            'amount' => 'required',
            'author_id' => 'required',
            'cover' => 'required|image|max:2048',
        ]);

        $book = new Book;
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/books/', $name);
            $book->cover = $name;
        }
        $book->amount = $request->amount;
        $book->save();
        return redirect()->route('books.index');
    }


    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.book.show', compact('book'));
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $author = Author::all();
        return view('admin.book.edit', compact('book', 'author'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'author_id' => 'required',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $book->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/books/', $name);
            $book->cover = $name;
        }
        $book->amount = $request->amount;
        $book->save();
        return redirect()->route('books.index');
    }


    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->deleteImage();
        $book->delete();
        return redirect()->route('books.index');
    }
}
