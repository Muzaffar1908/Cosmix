<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricings = Pricing::all();
        return  view('admin.pricing.index', compact('pricings'));
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
            'price' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        Pricing::create($data);
        return  redirect()->route('admin.pricing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pricing = Pricing::findorfail($id);
        return  view('admin.pricing.show', [
            'pricing' => $pricing,
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
        $pricing = Pricing::findorfail($id);
        return  view('admin.pricing.edit', [
            'pricing' => $pricing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pricing $pricing)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'price' => 'required',
            'text_uz' => 'required',
            'text_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        $pricing->update($data);
        return  redirect()->route('admin.pricing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricing $pricing)
    {
        $pricing->delete();
        return  redirect()->route('admin.pricing.index');
    }
}
