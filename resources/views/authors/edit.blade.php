@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar autor</div>

                <div class="card-body">
                    <form method="post" action="/authors/{{ $author->id }}/update">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" required type="text" name="name" class="form-control" value="{{ old('name', $author->name) }}" placeholder="Ingrese el nombre del autor"/>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input id="last_name" type="text" name="last_name" class="form-control" value="{{ old('last_name', $author->last_name) }}" placeholder="Ingrese el apellido del autor"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Editar autor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
