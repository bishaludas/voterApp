<?php

namespace App\Http\Controllers\Constituency;

use App\ConstituencyArea;
use App\Http\Controllers\Controller;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConstituencyAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constituencyAreas = ConstituencyArea::with('ward')->get();
        return view('entity.votingLocation.index', compact('constituencyAreas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wards = Ward::pluck('name', 'id')->all();
        return view('entity.votingLocation.create', compact('wards'));
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
                'ward_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        ConstituencyArea::create($input);

        return [
            'status'=>'success',
            'message'=>'Zone Created.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(ConstituencyArea $constituency_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(ConstituencyArea $constituency_area)
    {
        $wards = Ward::pluck('name', 'id')->all();
        return view('entity.votingLocation.edit', compact('constituency_area', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConstituencyArea $constituency_area)
    {
        $input = $request->all();

        $rules = [ 'name'=>'required', 
                'ward_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }
        $constituency_area->update($input);
        return [
            'status'=>'success',
            'message'=>'Zone updated.'
        ];
    }

    public function delete($area){
        $object = ConstituencyArea::findOrFail($area);
        $action = 'constituency\ConstituencyAreaController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }


    public function destroy(ConstituencyArea $constituency_area)
    {
        // count districts
        /*if ($zone->districts->count()> 0) {
            return [
                'status'=>'unable',
                'message'=>'Other Districts are associated with this Provience.'
            ];
        }*/

        $constituency_area->delete();
        return [
            'status'=>'success',
            'message'=>'Constituency Area deleted.'
        ];
    }
}
