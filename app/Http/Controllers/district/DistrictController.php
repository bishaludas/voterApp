<?php

namespace App\Http\Controllers\District;

use App\District;
use App\Http\Controllers\Controller;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::with('zone')->get();
        return view('entity.district.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zone = Zone::pluck('name', 'id')->all();
        return view('entity.district.create', compact('zone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [ 'name'=>'required', 
                'zone_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }
        District::create($input);        

        return [
            'status'=>'success',
            'message'=>'Zone Created.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $zone = Zone::pluck('name', 'id')->all();
        return view('entity.district.edit', compact('zone', 'district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $input = $request->all();

        $rules = [ 'name'=>'required', 
                'zone_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }
        $district->update($input);
        return [
            'status'=>'success',
            'message'=>'Zone updated.'
        ];
    }

    public function delete($zone){
        $object = District::findOrFail($zone);
        $action = 'district\DistrictController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }


    public function destroy(District $district)
    {
        // count districts
        if ($district->municipality->count()> 0) {
            return [
                'status'=>'unable',
                'message'=>'Other VDC/Minicipality are associated with this Provience.'
            ];
        }

        $district->delete();
        return [
            'status'=>'success',
            'message'=>'District deleted.'
        ];
    }
}
