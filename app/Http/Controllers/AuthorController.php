<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $texto = 'Bienvenido';
        $authors = Author::withTrashed()->get();

        return view('authors.index')->with([
            'emilioGuerra' => $texto,
            'authors' => $authors
        ]);
    }

    public function show($id)
    {
        return "Mostrando detalle del autor con el id: $id";
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'apellido' => 'required'
        ]);

        $author = Author::create([
            'name' => $request->get('name'),
            'last_name' => $request->get('apellido')
        ]);

        if ($author) {
            //Success
            return redirect()->to('/authors');
        } else {
            //fail
            return redirect()->to('/authors/create');
        }
    }

    public function edit($id)
    {
        $author = Author::find($id);
        if ($author) {
            return view('authors.edit')->with(['author' => $author]);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if ($author) {
            /** Option 1. Using functions */
            /*$author->name = $request->get('name');
            $author->last_name = $request->get('last_name');
            $author->save();*/

            /** Option 2. Using eloquent */
            /*Author::where('id', $id)->update([
                'name' => $request->get('name'),
                'last_name' => $request->get('last_name')
            ]);*/

            /** Option 3. Using eloquent directly */
            Author::where('id', $id)->update($request->except('_token'));
        }

        return redirect()->to('/authors');
    }

    public function delete($id)
    {
        $author = Author::find($id);

        if ($author) {
            /** Option 1. Using functions */
            $author->delete();

            /** Option 2. Using eloquent */
            Author::where('id', $id)->delete();
        }

        return redirect()->to('/authors');
    }
}
