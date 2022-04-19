<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return  view('admin.about.index', compact('abouts'));
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
            'text_uz' => 'required',
            'text_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'image' => 'required',
        ]);

        if (!file_exists('uploads/about-photo')) {
            mkdir('uploads/about-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/about-photo'), $imageName);
            $data['image'] = 'uploads/about-photo/' . $imageName;
        }

        About::create($data);
        return redirect()->route('admin.about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.show', [
            'about' => $about
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
        $about = About::findOrFail($id);
        return view('admin.about.edit', [
            'about' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        if (!file_exists('uploads/about-photo')) {
            mkdir('uploads/about-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/about-photo'), $imageName);
            unlink($about->image);
            $data['image'] = 'uploads/about-photo/' . $imageName;
        }

        $about->update($data);
        return  redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        
    }
}
