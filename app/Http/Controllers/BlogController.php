<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return  view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'image' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
            'icon' => 'required',
            'name' => 'required',
            'number' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        if (!file_exists('uploads/blog-photo')) {
            mkdir('uploads/blog-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100,999999).microtime()) . ".".$ex;
            $file->move(public_path('uploads/blog-photo'), $imageName);
            $data['image'] = 'uploads/blog-photo/'. $imageName;
        }

        Blog::create($data);
        return  redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findorfail($id);
        return  view('admin.blog.show', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findorfail($id);
        return  view('admin.blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
            'icon' => 'required',
            'name' => 'required',
            'number' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        if (!file_exists('uploads/blog-photo')) {
            mkdir('uploads/blog-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100,999999).microtime()) . ".".$ex;
            $file->move(public_path('uploads/blog-photo'), $imageName);
            unlink($blog->image);
            $data['image'] = 'uploads/blog-photo/'. $imageName;
        }

        $blog->update($data);
        return  redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        unlink($blog->image);
        $blog->delete();
        return redirect()->route('admin.blog.index');
    }
}
