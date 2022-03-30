@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear editorial</div>

                <div class="card-body">
                    <form method="post" action="/editorials/store">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" required type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Ingrese el nombre de la editorial"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear editorial</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
