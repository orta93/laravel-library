@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de autores</div>

                <div class="card-body">
                    <a id="elboton" href="/authors/create" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Agregar un autor
                    </a>

                    <table class="table table-striped table-hover">
                        <theader>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </theader>
                        <tbody>
                            @foreach($authors as $author)
                            <tr>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->last_name }}</td>
                                @if(is_null($author->deleted_at))
                                <td><a href="/authors/{{ $author->id }}/edit"><i class="fa fa-edit"></i></a></td>
                                <td>
                                    <form id="delete_author_{{ $author->id }}" method="post" action="/authors/{{ $author->id }}/delete">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="document.getElementById('delete_author_{{ $author->id }}').submit()"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                                @else
                                    <td colspan="2">Restaurar</td>
                                @endif
                            </tr>
                            @endforeach

                            @if(!count($authors))
                            <tr>
                                <td class="text-center" colspan="4">No hay autores</td>
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
