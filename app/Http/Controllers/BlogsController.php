<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use function var_dump;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
//        $blog = new Blog();
//        $blog->title = $request->title;
//        $blog->body = $request->body;
//        $blog->save();

        $input = $request->all();
        $blog = Blog::create($input);

        return redirect('/blogs');

    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.show', compact('blog'));

    }
}
