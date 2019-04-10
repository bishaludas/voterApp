<?php

namespace App\Http\Controllers\Home;

use App\ConstituencyArea;
use App\District;
use App\Http\Controllers\Controller;
use App\MunicipalityVdc;
use App\RepresentativeAssembly;
use App\User;
use App\Ward;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$districts = District::pluck('name', 'id')->all();
    	return view('welcome', compact('districts'));
    }



    public function getfilterData(Request $request){
    	$input =  $request->all();
        if ($input['type'] == "district") {
            $district = District::where('zone_id', $input['data'])->pluck('name', 'id')->all();
            return view('partials.getDistrict', compact('district'));
        }

        if ($input['type'] == "area") {
            $area = RepresentativeAssembly::where('district_id', $input['data'])->pluck('name', 'id')->all();
            return view('partials.getConstituencyArea', compact('area'));
        }

    	if ($input['type'] == "municipality") {
    	 	$municipality = MunicipalityVdc::where('district_id', $input['data'])->pluck('name', 'id')->all();
    	 	return view('partials.getMunicipality', compact('municipality'));
    	}

    	if ($input['type'] == 'ward') {
    	 	$wards = Ward::where('ref_id', $input['data'])->pluck('name', 'id')->all();
    	 	return view('partials.getWard', compact('wards'));
    	 } 
    	
    	if ($input['type'] == 'poll') {
    		$locations = ConstituencyArea::where('ward_id', $input['data'])->pluck('name', 'id')->all();
    		return view('partials.getPollLocation', compact('locations'));
    	}
    	
    }

    public function getVoters(Request $request){
    	$input = $request->all();
    	$users = User::where('citizenship_no', '!=', '0')
                    ->where('district_id', $input['district_id'])
    				->where('vdc_municipality_id', $input['vdc_municipality_id'])
    				->where('ward_id', $input['ward_id'])
    				->where('constituency_id', $input['constituency_id'])
    				->paginate(20);

    	return view('users.index', compact('users'));
    }
}
