@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de autores</div>

                <div class="card-body">
                    <table class="table">
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
                                <td>Editar</td>
                                <td>Eliminar</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
