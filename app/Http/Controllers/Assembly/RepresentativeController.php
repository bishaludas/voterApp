<?php

namespace App\Http\Controllers\Assembly;

use App\District;
use App\Http\Controllers\Controller;
use App\RepresentativeAssembly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representatives = RepresentativeAssembly::with('district')->get();
        return view('entity.assembly.representative.index', compact('representatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::pluck('name', 'id')->all();
        return view('entity.assembly.representative.create', compact('districts'));
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

        RepresentativeAssembly::create($input);

        return [
            'status'=>'success',
            'message'=>'Zone Created.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RepresentativeAssembly  $representativeAssembly
     * @return \Illuminate\Http\Response
     */
    public function show(RepresentativeAssembly $representative_assembly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RepresentativeAssembly  $representativeAssembly
     * @return \Illuminate\Http\Response
     */
    public function edit(RepresentativeAssembly $representative_assembly)
    {
        $districts = District::pluck('name', 'id')->all();
        return view('entity.assembly.representative.edit', compact('districts', 'representative_assembly'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RepresentativeAssembly  $representativeAssembly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RepresentativeAssembly $representative_assembly)
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

        $representative_assembly->update($input);

        return [
            'status'=>'success',
            'message'=>'Zone updated.',
        ];
    }

    public function delete($id){
        $object = RepresentativeAssembly::findOrFail($id);
        $action = 'Assembly\RepresentativeController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }


    public function destroy(RepresentativeAssembly $representative_assembly)
    {
        // count users
        

        $representative_assembly->delete();
        return [
            'status'=>'success',
            'message'=>'Deleted.'
        ];
    }


    public function addDescription($id){
        $area = RepresentativeAssembly::findOrFail($id);
        return view('entity.assembly.details.addDetails', compact('area'));
    }

    public function updateDescription(Request $request, $id){
        return $request->all();
    }

}
