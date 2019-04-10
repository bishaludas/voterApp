<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\RepresentativeAssembly;
use App\Zone;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function filterData(){
    	$zones = Zone::pluck('name', 'id')->all();
    	return view('frontend.data.topic', compact('zones'));
    }

    public function getfilterData(Request $request){
    	$rules = [
    		'zone_id'=>'required',
    		'district_id'=>'required',
    		'area_id'=>'required',
    	];
    	$this->validate($request, $rules);

    	$input =  $request->all();
    	$area = RepresentativeAssembly::find($input['area_id']);
    	return view('frontend.data.topicData', compact('area'));
    }
}
