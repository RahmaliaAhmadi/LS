<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\SliderRepository;

class SliderController extends Controller
{
    /**
     * The SliderRepository instance.
     *
     * @var \App\Repositories\SliderRepository
     */
	protected $sliderRepository;
	
	public function __construct(SliderRepository $sliderRepository){
		$this->sliderRepository = $sliderRepository;
		$this->middleware('admin');
	} 
	public function index(){
		
		$getallsliders =  $this->sliderRepository->getAllSlides();

		return view('back.sliders.index',compact('getallsliders'));
	}
}
