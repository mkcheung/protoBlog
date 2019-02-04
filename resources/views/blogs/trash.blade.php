@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="jumbotron">
        <h1>Trashed Blogs</h1>
    </div>
</div>
<div class="col-md-12">
    @foreach($trashedBlogs as $blog)
        <h2>{{ $blog->title }}</h2>
        <p>{{ $blog->body }}</p>

        <div class="btn-group">
            {{-- restore --}}
            <form action="{{route('blogs.restore', $blog->id)}}" method="get">
                <button class="btn btn-success btn-xs pull-left btn-margin-right" type="submit">
                    Restore
                </button>
                {{ csrf_field() }}
            </form>

            {{-- permanent delete --}}
            <form action="{{route('blogs.permanent-delete', $blog->id)}}" method="post">
                {{ method_field('delete') }}
                <button class="btn btn-danger btn-xs pull-left btn-margin-right" type="submit">
                    Permanent Delete
                </button>
                {{ csrf_field() }}
            </form>
        </div>
    @endforeach
</div>

@endsection