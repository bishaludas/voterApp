<?php

namespace App\Http\Controllers\Minicipality;

use App\District;
use App\Http\Controllers\Controller;
use App\MunicipalityVdc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MunicipalityVdcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = MunicipalityVdc::with('district')->get();
        return view('entity.municipality.index', compact('municipalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::pluck('name', 'id')->all();
        return view('entity.municipality.create', compact('districts'));
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
                'type'=>'required',
                'district_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }
        MunicipalityVdc::create($input);

        return [
            'status'=>'success',
            'message'=>$request->type == 'vdc' ? 'V.D.C created' : 'Municipality created.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MunicipalityVdc  $municipalityVdc
     * @return \Illuminate\Http\Response
     */
    public function show(MunicipalityVdc $municipalityVdc)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MunicipalityVdc  $municipalityVdc
     * @return \Illuminate\Http\Response
     */
    public function edit(MunicipalityVdc $vdc_minicipality)
    {
        $districts = District::pluck('name', 'id')->all();
        return view('entity.municipality.edit', compact('vdc_minicipality', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MunicipalityVdc  $municipalityVdc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MunicipalityVdc $vdc_minicipality)
    {
        $input = $request->all();
        $rules = [ 'name'=>'required', 
                'type'=>'required',
                'district_id'=>'required'
                ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        $vdc_minicipality->update($input);
        return [
            'status'=>'success',
            'message'=>$request->type == 'vdc' ? 'V.D.C updated' : 'Municipality updated.',
        ];
    }

    public function delete($vdc_minicipality){
        $object = MunicipalityVdc::findOrFail($vdc_minicipality);
        $action = 'minicipality\MunicipalityVdcController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }


    public function destroy(MunicipalityVdc $vdc_minicipality)
    {
        //  count districts
        if ($vdc_minicipality->wards->count()> 0) {
            return [
                'status'=>'unable',
                'message'=>"Wards are associated with this." 
            ];
        }

        $vdc_minicipality->delete();
        return [
            'status'=>'success',
            'message'=>$vdc_minicipality->type == "vdc"? "VDC deleted." : "Municipality deleted."
        ];
    }
}
