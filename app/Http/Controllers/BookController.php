<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return 'Mostrando listado de todos los books';
    }

    public function show($id)
    {
        return "Mostrando detalle del libro con el id: $id";
    }

    public function create()
    {
        return "mostrando formulario para crear un libro";
    }

    public function store()
    {
        return "guardando por primera vez un libro";
    }

    public function edit($id)
    {
        return "mostrando formulario de edicion de un libro con el id: $id";
    }

    public function update($id)
    {
        return "guardando datos del libro editado";
    }

    public function delete($id)
    {
        return "eliminando libro";
    }
}
