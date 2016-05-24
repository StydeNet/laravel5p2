@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear post</div>

                    @include('partials/errors')

                    @if (session('success'))
                        <p class="alert alert-success">¡Post creado!</p>
                    @endif

                    <div class="panel-body" id="content">
                        <form action="{{ route('admin.posts.store') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Título:</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="title">Contenido:</label>
                                <textarea name="content" class="form-control">{{ old('title') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
