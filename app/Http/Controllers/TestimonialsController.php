<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonials::all();
        return  view('admin.testimonials.index', compact('testimonials'));
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
            'image' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'name' => 'required',
            'job' => 'required',
            'icon' => 'required',
            'number' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
        ]);

        if (!file_exists('uploads/testimonials-photo')) {
            mkdir('uploads/testimonials-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100,999999).microtime()) . ".".$ex;
            $file->move(public_path('uploads/testimonials-photo'), $imageName);
            $data['image'] = 'uploads/testimonials-photo/'. $imageName;
        }

        Testimonials::create($data);
        return  redirect()->route('admin.testimonials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonials::findorfail($id);
        return  view('admin.testimonials.show', [
             'testimonials' => $testimonial 
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
        $testimonial = Testimonials::findorfail($id);
        return  view('admin.testimonials.edit', [
             'testimonials' => $testimonial 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonials $testimonial)
    {
        $data = $request->validate([
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'name' => 'required',
            'job' => 'required',
            'icon' => 'required',
            'number' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
        ]);

        if (!file_exists('uploads/testimonials-photo')) {
            mkdir('uploads/testimonials-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100,999999).microtime()) . ".".$ex;
            $file->move(public_path('uploads/testimonials-photo'), $imageName);
            unlink($testimonial->image);
            $data['image'] = 'uploads/testimonials-photo/'. $imageName;
        }

        $testimonial->update($data);
        return  redirect()->route('admin.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonials $testimonial)
    {
        unlink($testimonial->image);
        $testimonial->delete();
        return  redirect()->route('admin.testimonials.index');
    }
}
