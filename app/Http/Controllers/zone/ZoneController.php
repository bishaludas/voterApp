<?php

namespace App\Http\Controllers\Zone;

use App\Http\Controllers\Controller;
use App\State;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::with('provience')->get();
        return view('entity.zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = State::pluck('name', 'id')->all();
        return view('entity.zone.create', compact('provinces'));
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
                'state_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }
        Zone::create($input);

        return [
            'status'=>'success',
            'message'=>'Zone Created.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        $provinces = State::pluck('name', 'id')->all();
        return view('entity.zone.edit', compact('zone', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        $input = $request->all();

        $rules = [ 'name'=>'required', 
                'state_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }
        $zone->update($input);
        return [
            'status'=>'success',
            'message'=>'Zone updated.'
        ];
    }

    public function delete($zone){
        $object = Zone::findOrFail($zone);
        $action = 'zone\ZoneController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }

    public function destroy(Zone $zone)
    {
        // count districts
        if ($zone->districts->count()> 0) {
            return [
                'status'=>'unable',
                'message'=>'Other Districts are associated with this Provience.'
            ];
        }

        $zone->delete();
        return [
            'status'=>'success',
            'message'=>'Zone deleted.'
        ];
    }
}
