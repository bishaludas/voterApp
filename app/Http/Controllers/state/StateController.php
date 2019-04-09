<?php

namespace App\Http\Controllers\State;

use App\Http\Controllers\Controller;
use App\State;
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
        $proviences = State::all();
        return view('entity.provience.index', compact('proviences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entity.provience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =  $request->all();
        $rules = [ 'name'=>'required'];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        State::create($input);
        
        return [
            'status'=>'success',
            'message'=>'Provience Created.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('entity.provience.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $input =  $request->all();
        $rules = [ 'name'=>'required'];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        $state->update($input);
        return [
            'status'=>'success',
            'message'=>'Provience updated.'
        ];
    }

    public function delete($state){
        $object = State::findOrFail($state);
        $action = 'state\StateController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }


    public function destroy(State $state)
    {
        // count zones
        if ($state->zones->count() > 0) {
            return [
            'status'=>'unable',
            'message'=>'Other Zones are associated with this Provience.'
            ];
        }
        $state->delete();
        
        return [
            'status'=>'success',
            'message'=>'Provience deleted.'
        ];
    }
}
