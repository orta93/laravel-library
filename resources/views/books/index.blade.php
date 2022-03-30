@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de libros</div>

                <div class="card-body">
                    <a id="elboton" href="/editorials/create" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Agregar un libro
                    </a>

                    <table class="table table-striped table-hover">
                        <theader>
                            <tr>
                                <th>Titulo</th>
                                <th>Paginas</th>
                                <th>ISBN</th>
                                <th>Fecha de publicacion</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </theader>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->pages }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->published_at }}</td>
                                <td>{{ $book->author->full_name }}</td>
                                <td>{{ $book->editorial->name }}</td>
                                <td><a href="/books/{{ $book->id }}/edit"><i class="fa fa-edit"></i></a></td>
                                <td>
                                    <form id="delete_book_{{ $book->id }}" method="post" action="/books/{{ $book->id }}/delete">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="document.getElementById('delete_book_{{ $book->id }}').submit()"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @if(!count($books))
                            <tr>
                                <td class="text-center" colspan="8">No hay Libros</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
