@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->title }}</div>

                    @include('partials/errors')

                    <div class="panel-body" id="content">
                        <p>{{ $post->content }}</p>

                        @if (! $post->isPublished())
                        <form action="{{ route('admin.posts.publish', $post) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-primary">Publicar post</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
