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
        $authors = Author::all();

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
        return "mostrando formulario de edicion de un autor con el id: $id";
    }

    public function update($id)
    {
        return "guardando datos del autor editado";
    }

    public function delete($id)
    {
        return "eliminando autor";
    }
}
