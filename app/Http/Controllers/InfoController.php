<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::all();
        return  view('admin.info.index', compact('infos'));
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
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required',
        ]);

        Info::create($data);
        return  redirect()->route('admin.info.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::findorfail($id);
        return  view('admin.info.show', [
            'info' => $info
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
        $info = Info::findorfail($id);
        return  view('admin.info.edit', [
            'info' => $info
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'icon' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required',
        ]);

        $info->update($data);
        return  redirect()->route('admin.info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        $info->delete();
        return  redirect()->route('admin.info.index');
    }
}
