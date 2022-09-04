<?php

namespace App\Http\Controllers;

use App\Models\AuthorBook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;


class BookController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        $books = Book::orderBy('title')->get();


        return view('book.index', compact('books', 'authors'));
    }

    public function filter(Request $request, Book $books)
    {
        $data = $request->validate([
            'title' => 'string',
            'year' => 'integer',
            'author' => 'string',
        ]);


        $authors = Author::all();


        $books = Book::whereHas('authors', function (Builder $query) use ($data) {
            $query->where('name', '=', $data['author']);
        })->orderBy('title')
            ->get();
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
            'title' => 'required|string',
            'year' => 'required|integer',
        ]);
        $authors = $request->authors;


        $book = Book::create($data);
        $book->authors()->attach($authors);

        return redirect()->route('book.index')->with('success', 'Книга была добавлена');

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
            'title' => 'required|string',
            'year' => 'required|integer',
        ]);
        $authors = request()->authors;

        $book->update($data);
        $book->authors()->sync($authors);

        return redirect()->route('book.index')->with('success', 'Книга была изменена');

    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Книга была удалена');
    }

}
