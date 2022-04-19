<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return  view('admin.client.index', compact('clients'));
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
        ]);

        if (!file_exists('uploads/client-photo')) {
            mkdir('uploads/client-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100,999999).microtime()) . ".".$ex;
            $file->move(public_path('uploads/client-photo'), $imageName);
            $data['image'] = 'uploads/client-photo/'. $imageName;
        }

        Client::create($data);
        return  redirect()->route('admin.client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findorfail($id);
        return view('admin.client.show', [
            'client' => $client
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
        $client = Client::findorfail($id);
        return view('admin.client.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'image' => 'required',
        ]);

        if (!file_exists('uploads/client-photo')) {
            mkdir('uploads/client-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100,999999).microtime()) . ".".$ex;
            $file->move(public_path('uploads/client-photo'), $imageName);
            unlink($client->image);
            $data['image'] = 'uploads/client-photo/'. $imageName;
        }

        $client->update($data);
        return  redirect()->route('admin.client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        unlink($client->image);
        $client->delete();
        return  redirect()->route('admin.client.index');
    }
}
