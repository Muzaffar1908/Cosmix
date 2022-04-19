<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();
        return  view('admin.feature.index', compact('features'));
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
            'icon' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'image' => 'required',
        ]);

        if (!file_exists('uploads/feature-photo')) {
            mkdir('uploads/feature-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/feature-photo'), $imageName);
            $data['image'] = 'uploads/feature-photo/' . $imageName;
        }

        Feature::create($data);
        return  redirect()->route('admin.feature.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feature = Feature::findorfail($id);
        return  view('admin.feature.show', [
           'feature' => $feature,
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
        $feature = Feature::findorfail($id);
        return  view('admin.feature.edit', [
           'feature' => $feature,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'icon' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        if (!file_exists('uploads/feature-photo')) {
            mkdir('uploads/feature-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/feature-photo'), $imageName);
            unlink($feature->image);
            $data['image'] = 'uploads/feature-photo/' . $imageName;
        }

        $feature->update($data);
        return redirect()->route('admin.feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        unlink($feature->image);
        $feature->delete();
        return redirect()->route('admin.feature.index');
    }
}
