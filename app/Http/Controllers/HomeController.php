<?php

namespace App\Http\Controllers;
use App\Models\Slider;
class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
		$sliders = Slider::all();
		//print_r($sliders);
	
		
        return view('front.index',compact('sliders'));
    }
}
