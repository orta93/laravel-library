@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Libro</div>

                <div class="card-body">
                    <form method="post" action="/books/store">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input id="title" type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Ingrese el nombre del libro"/>
                        </div>
                        <div class="form-group">
                            <label for="pages">Paginas</label>
                            <input id="pages" required type="number" name="pages" class="form-control" value="{{ old('pages') }}" placeholder="Ingrese la cantidad de paginas del libro"/>
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input id="isbn" required type="text" name="isbn" class="form-control" value="{{ old('isbn') }}" placeholder="Ingrese el ISBN del libro"/>
                        </div>
                        <div class="form-group">
                            <label for="published_at">Fecha de publicacion</label>
                            <input id="published_at" required type="date" name="published_at" class="form-control" value="{{ old('published_at') }}" placeholder="Ingrese la fecha de publicacion del libro"/>
                        </div>
                        <div class="form-group">
                            <label for="author_id">Autor</label>
                            <select id="author_id" name="author_id" class="form-control">
                                <option value="">Seleccione un autor</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editorial_id">Editorial</label>
                            <select id="editorial_id" name="editorial_id" class="form-control">
                                <option value="">Seleccione una editorial</option>
                                @foreach($editorials as $editorial)
                                    <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear libro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
