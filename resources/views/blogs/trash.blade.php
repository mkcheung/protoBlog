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
    {{-- restore --}}

        <form action="{{route('blogs.restore', $blog->id)}}" method="get">
            <button class="btn btn-success btn-xs pull-left btn-margin-right" type="submit">
                Restore
            </button>
            {{ csrf_field() }}
        </form>
    @endforeach
</div>

@endsection