<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(4);
        return  view('admin.slider.index', compact('sliders'));
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
            'title_uz' => 'required',
            'title_en' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        if (!file_exists('uploads/slider-photo')) {
            mkdir('uploads/slider-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100,999999).microtime()) . ".".$ex;
            $file->move(public_path('uploads/slider-photo'), $imageName);
            $data['image'] = 'uploads/slider-photo/'. $imageName;
        }

        Slider::create($data);
        return  redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return  view('admin.slider.show', [
            'slider' => $slider
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
        $slider = Slider::findOrFail($id);
        return  view('admin.slider.edit', [
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        if (!file_exists('uploads/slider-photo')) {
            mkdir('uploads/slider-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100,999999).microtime()) . ".".$ex;
            $file->move(public_path('uploads/slider-photo'), $imageName);
            unlink($slider->image);
            $data['image'] = 'uploads/slider-photo/'. $imageName;
        }

        $slider->update($data);
        return  redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        unlink($slider->image);
        $slider->delete();
        return  redirect()->route('admin.slider.index');
    }
}
