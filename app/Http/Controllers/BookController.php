<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }


    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'course_code' => 'required',
            'price' => 'required|numeric',
            'condition' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
        ]);


        $photoPath = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = basename($photoPath);

        Book::create($validated);

        return redirect('/books')->with('success', 'Book successfully added.');
    }



    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }




}