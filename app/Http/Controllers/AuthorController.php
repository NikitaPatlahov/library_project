<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('name')->get();

        return view('author.index', compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        $author = Author::create($data);
        return redirect()->route('author.index')->with('success', 'Автор был добавлен');
    }

    public function edit(Author $author)
    {
        return view('author.edit', compact('author'));
    }

    public function update(Author $author)
    {
        $data = request()->validate([
            'name' => 'required|string'
        ]);

        $author->update($data);

        return redirect()->route('author.index')->with('success', 'Книга был изменен');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('author.index')->with('success', 'Автор был удален');
    }
}
