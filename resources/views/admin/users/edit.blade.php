@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar usuario</div>

                    @include('partials/errors')

                    @if (session('success'))
                        <p class="alert alert-success">¡Usuario actualizado!</p>
                    @endif

                    <div class="panel-body" id="content">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
