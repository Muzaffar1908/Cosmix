<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Slider;

class PagesController extends Controller
{
    public  function  home()
    {
        $sliders = Slider::all();
        return  view('frontend.index', compact('sliders'));
    }

    public  function  about()
    {
        $about = About::first();
        return  view('frontend.index', compact('abouts'));
    }
}
