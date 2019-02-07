@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <h1>{{ $category->name }}</h1>

        <div class="btn-group">
            <a class="btn btn-warning btn-sm pull-left btn-margin-right" href="{{route('categories.edit', $category->id)}}">Edit</a>
            <form method="post" action="{{route('categories.destroy', $category->id)}}">
                {{ method_Field('delete') }}
                <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                {{csrf_field()}}
            </form>
        </div>

    </div>


@endsection