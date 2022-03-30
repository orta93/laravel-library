<?php

namespace App\Http\Controllers;

use App\Author;
use App\Editorial;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::get();

        return view('books.index')->with([
            'books' => $books
        ]);
    }

    public function show($id)
    {
        return "Mostrando detalle del autor con el id: $id";
    }

    public function create()
    {
        $authors = Author::withTrashed()->get();
        $editorials = Editorial::withTrashed()->get();
        return view('books.create')->with(['authors' => $authors, 'editorials' => $editorials]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pages' => 'required',
            'isbn' => 'required',
            'published_at' => 'required|date',
            'author_id' => 'required',
            'editorial_id' => 'required',
        ]);

//        cuadrado de un numero
//        x * x
//        pow(x, 2)

        $book = Book::create($request->except('_token'));

        if ($book) {
            //Success
            return redirect()->to('/books');
        } else {
            //fail
            return redirect()->to('/books/create');
        }
    }

    public function edit($id)
    {
        $book = Book::find($id);
        if ($book) {
            return view('books.edit')->with(['book' => $book]);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if ($book) {
            /** Option 1. Using functions */
            /*$book->name = $request->get('name');
            $book->last_name = $request->get('last_name');
            $book->save();*/

            /** Option 2. Using eloquent */
            /*Book::where('id', $id)->update([
                'name' => $request->get('name'),
                'last_name' => $request->get('last_name')
            ]);*/

            /** Option 3. Using eloquent directly */
            Book::where('id', $id)->update($request->except('_token'));
        }

        return redirect()->to('/books');
    }

    public function delete($id)
    {
        $book = Book::find($id);

        if ($book) {
            /** Option 1. Using functions */
            $book->delete();

            /** Option 2. Using eloquent */
            Book::where('id', $id)->delete();
        }

        return redirect()->to('/books');
    }
}
