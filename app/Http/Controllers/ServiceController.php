<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(4);
        return  view('admin.service.index', compact('services'));
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
            'text_uz' => 'required',
            'text_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'percent' => 'required',
            'image' => 'required',
        ]);

        if (!file_exists('uploads/service-photo')) {
            mkdir('uploads/service-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/service-photo'), $imageName);
            $data['image'] = 'uploads/service-photo/' . $imageName;
        }

        Service::create($data);
        return  redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findorfail($id);
        return  view('admin.service.show', [
           'service' => $service
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
        $service = Service::findorfail($id);
        return  view('admin.service.edit', [
           'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'icon' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'percent' => 'required',
        ]);

        if (!file_exists('uploads/service-photo')) {
            mkdir('uploads/service-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/service-photo'), $imageName);
            unlink($service->image);
            $data['image'] = 'uploads/service-photo/' . $imageName;
        }

        $service->update($data);
        return  redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        unlink($service->image);
        $service->delete();
        return redirect()->route('admin.service.index');
    }
}
