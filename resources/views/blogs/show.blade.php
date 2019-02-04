@extends('layouts.app')

@section('content')

    <div class="div.container-fluid">
        <article>
            <div class="jumbotron">
                <h1>{{ $blog->title }}</h1>
                <a class="btn btn-primary btn-xs pull-left" href="{{route('blogs.edit', $blog->id)}}">Edit</a>
                <form method="post" action="{{route('blogs.delete', $blog->id)}}">
                    {{ method_Field('delete') }}
                    <button type="submit" class="btn btn-danger btn-xs pull-left">Delete</button>
                    {{csrf_field()}}
                </form>
            </div>
            <div class="col-md-12">
                <p>{{ $blog->body }}</p>
            </div>
        </article>
    </div>


@endsection