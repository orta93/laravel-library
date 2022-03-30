@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de editoriales</div>

                <div class="card-body">
                    <a id="elboton" href="/editorials/create" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Agregar un editorial
                    </a>

                    <table class="table table-striped table-hover">
                        <theader>
                            <tr>
                                <th>Nombre</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </theader>
                        <tbody>
                            @foreach($editorials as $editorial)
                            <tr>
                                <td>{{ $editorial->name }}</td>
                                @if(is_null($editorial->deleted_at))
                                <td><a href="/editorials/{{ $editorial->id }}/edit"><i class="fa fa-edit"></i></a></td>
                                <td>
                                    <form id="delete_editorial_{{ $editorial->id }}" method="post" action="/editorials/{{ $editorial->id }}/delete">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="document.getElementById('delete_editorial_{{ $editorial->id }}').submit()"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                                @else
                                    <td colspan="2">
                                    <form id="restore_editorial_{{ $editorial->id }}" method="post" action="/editorials/{{ $editorial->id }}/restore">
                                        @csrf
                                        <a href="javascript:void(0)" onclick="document.getElementById('restore_editorial_{{ $editorial->id }}').submit()">Restaurar</a>
                                    </form>
                                    </td>
                                @endif
                            </tr>
                            @endforeach

                            @if(!count($editorials))
                            <tr>
                                <td class="text-center" colspan="4">No hay editoriales</td>
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
