<?php

namespace App\Http\Controllers\Assembly;

use App\District;
use App\Http\Controllers\Controller;
use App\StateAssembly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = StateAssembly::with('district')->get();
        return view('entity.assembly.state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::pluck('name', 'id')->all();
        return view('entity.assembly.state.create', compact('districts'));
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
        $rules = ['name'=>'required', 
                'district_id'=>'required',
                'representative_no'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        StateAssembly::create($input);

        return [
            'status'=>'success',
            'message'=>'Zone Created.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StateAssembly  $stateAssembly
     * @return \Illuminate\Http\Response
     */
    public function show(StateAssembly $state_assembly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StateAssembly  $stateAssembly
     * @return \Illuminate\Http\Response
     */
    public function edit(StateAssembly $state_assembly)
    {
        $districts = District::pluck('name', 'id')->all();
        return view('entity.assembly.state.edit', compact('districts', 'state_assembly'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StateAssembly  $stateAssembly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StateAssembly $state_assembly)
    {
        $input = $request->all();
        $rules = ['name'=>'required', 
                'district_id'=>'required',
                'representative_no'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        $state_assembly->update($input);

        return [
            'status'=>'success',
            'message'=>'Zone updated.',
        ];
    }

    public function delete($id){
        $object = StateAssembly::findOrFail($id);
        $action = 'Assembly\StateController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }


    public function destroy(StateAssembly $state_assembly)
    {
        // check users affilated
        $state_assembly->delete();
        return [
            'status'=>'success',
            'message'=>'Deleted.'
        ];
    }
}
