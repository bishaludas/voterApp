<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\MunicipalityVdc;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wards = Ward::with('Municipality')->get();
        return view('entity.ward.index', compact('wards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipalities = MunicipalityVdc::pluck('name', 'id')->all();
        return view('entity.ward.create', compact('municipalities'));
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
                'ref_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }
        Ward::create($input);

        return [
            'status'=>'success',
            'message'=>'Ward Created.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(Ward $ward)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(Ward $ward)
    {
        $municipalities = MunicipalityVdc::pluck('name', 'id')->all();
        return view('entity.ward.edit', compact('ward', 'municipalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ward $ward)
    {
        $input = $request->all();
        $rules = [ 'name'=>'required', 
                'ref_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        $ward->update($input);
        return [
            'status'=>'success',
            'message'=>'Ward updated.'
        ];
    }

    public function delete($ward){
        $object = Ward::findOrFail($ward);
        $action = 'ward\WardController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }


    public function destroy(Ward $ward)
    {
        // count constituencyArea
        if ($ward->constituencyArea->count()> 0) {
            return [
                'status'=>'unable',
                'message'=>'Constituency Area are associated with this Ward.'
            ];
        }

        $ward->delete();
        return [
            'status'=>'success',
            'message'=>'Ward deleted.'
        ];
    }
}
