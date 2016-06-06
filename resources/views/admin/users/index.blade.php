@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body" id="content">
                        <form action="{{ route('admin.users.index') }}" method="GET" class="form form-inline">
                            <input type="text" value="{{ Request::get('search', '') }}" name="search" placeholder="Buscar usuarios por email" class="form-control">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                        <br>

                        <table class="table">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->experiences_count }}</td>
                                <td><a href="#">Editar</a></td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
