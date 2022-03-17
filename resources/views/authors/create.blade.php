@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear autor</div>

                <div class="card-body">
                    <form method="post" action="/authors/store">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" required type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Ingrese el nombre del autor"/>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input id="last_name" type="text" name="apellido" class="form-control" value="{{ old('apellido') }}" placeholder="Ingrese el apellido del autor"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear autor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
