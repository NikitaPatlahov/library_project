<?php

namespace App\Http\Controllers;

use App\Models\AuthorBook;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();


        return view('book.index', compact('books', 'authors'));
    }

    public function create()
    {
        $authors = Author::all();

        return view('book.create', compact('authors'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
                'title' => 'string',
                'year' => 'integer',
            ]);
        $authors = $request->authors;


        $book = Book::create($data);
        $book->authors()->attach($authors);

        return redirect()->route('book.index');

    }

    public function show(Book $book)
    {

        return view('book.show', compact('book'));
    }


    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }


    public function update(Book $book)
    {
        $data = request()->validate([
            'title' => 'string',
            'year' => 'integer',
            'authors' => '',
        ]);
        dd($data);
        $book->update($data);

        return redirect()->route('book.index');

    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }

}
