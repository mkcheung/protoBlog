<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
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
        $categories = Category::latest()->get();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
//        $blog = new Blog();
//        $blog->title = $request->title;
//        $blog->body = $request->body;
//        $blog->save();

        $input = $request->all();
        $blog = Blog::create($input);

        if($request->category_id){
            $blog->category()->sync($request->category_id);
        }

        return redirect('/blogs');
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog = $blog->update($input);
        return redirect('blogs');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog = $blog->delete();
        return redirect('blogs');
    }

    public function trash()
    {
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash', compact('trashedBlogs'));
    }

    public function restore($id)
    {
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        return redirect('blogs');
    }

    public function permanentDelete($id)
    {
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete($permanentDeleteBlog);
        return back();
    }
}
