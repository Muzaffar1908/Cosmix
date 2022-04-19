<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return  view('admin.team.index', compact('teams'));
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
            'name' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        if (!file_exists('uploads/team-photo')) {
            mkdir('uploads/team-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/team-photo'), $imageName);
            $data['image'] = 'uploads/team-photo/' . $imageName;
        }

        Team::create($data);
        return  redirect()->route('admin.team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::findorfail($id);
        return  view('admin.team.show', [
            'team' => $team
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
        $team = Team::findorfail($id);
        return  view('admin.team.edit', [
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'name' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        if (!file_exists('uploads/team-photo')) {
            mkdir('uploads/team-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/team-photo'), $imageName);
            unlink($team->image);
            $data['image'] = 'uploads/team-photo/' . $imageName;
        }

        $team->update($data);
        return  redirect()->route('admin.team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        unlink($team->image);
        $team->delete();
        return  redirect()->route('admin.team.index');
    }
}
