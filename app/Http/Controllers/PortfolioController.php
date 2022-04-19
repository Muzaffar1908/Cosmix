<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return  view('admin.portfolio.index', compact('portfolios'));
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
        ]);

        if (!file_exists('uploads/portfolio-photo')) {
            mkdir('uploads/portfolio-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/portfolio-photo'), $imageName);
            $data['image'] = 'uploads/portfolio-photo/' . $imageName;
        }

        Portfolio::create($data);
        return  redirect()->route('admin.portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::findorfail($id);
        return  view('admin.portfolio.show', [
          'portfolio' => $portfolio,
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
        $portfolio = Portfolio::findorfail($id);
        return  view('admin.portfolio.edit', [
          'portfolio' => $portfolio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
        ]);

        if (!file_exists('uploads/portfolio-photo')) {
            mkdir('uploads/portfolio-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/portfolio-photo'), $imageName);
            unlink($portfolio->image);
            $data['image'] = 'uploads/portfolio-photo/' . $imageName;
        }

        $portfolio->update($data);
        return  redirect()->route('admin.portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        unlink($portfolio->image);
        $portfolio->delete();
        return  redirect()->route('admin.portfolio.index');
    }
}
