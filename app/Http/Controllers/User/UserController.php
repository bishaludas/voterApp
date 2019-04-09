<?php

namespace App\Http\Controllers\User;

use App\ConstituencyArea;
use App\District;
use App\Http\Controllers\Controller;
use App\MunicipalityVdc;
use App\RepresentativeAssembly;
use App\State;
use App\StateAssembly;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('citizenship_no', '!=', '0')->paginate(20);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::pluck('name', 'id')->all();
        $districts = District::pluck('name', 'id')->all();
        $municipality = MunicipalityVdc::pluck('name', 'id')->all();;
        $ward = Ward::pluck('name', 'id')->all();;
        $pollStations = ConstituencyArea::pluck('name', 'id')->all();
        $stateAssembly = StateAssembly::pluck('name', 'id')->all();
        $repAssembly = RepresentativeAssembly::pluck('name','id')->all();
        
        return view('users.create', compact('states', 'districts', 'municipality', 'ward', 'pollStations', 'stateAssembly','repAssembly'));
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
        $rules = [
            'voter_no'=>'required',
            'nep_name'=>'required',
            'eng_name'=>'required',
            'dob'=>'required',
            'sex'=>'required',
            'citizenship_no'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'image_path'=>'required',
            'state_id'=>'required',
            'district_id'=>'required',
            'vdc_municipality_id'=>'required',
            'ward_id'=>'required',
            'constituency_id'=>'required',
            'rep_assembly_id'=>'required',
            'state_assembly_id'=>'required',
        ];

        $customMessages = [
            'voter.no.required' => 'Nepali Name field is required.',
            'nep_name.required' => 'Nepali Name field is required.',
            'eng_name.required' => 'English Name field is required.',
            'dob.required' => 'Date of birth field is required.',
            'father_name.required'=>"Father's name is required",
            'mother_name.required'=>"Mother's name is required",
            'image_path.required'=>"Voter's image is required",
            'state_id.required'=>"This field should not be empty",
            'district_id.required'=>'This field should not be empty',
            'vdc_municipality_id.required'=>'This field should not be empty',
            'ward_id.required'=>'This field should not be empty',
            'constituency_id.required'=>'This field should not be empty',
            'rep_assembly_id.required'=>'This field should not be empty',
            'state_assembly_id.required'=>'This field should not be empty',
        ];

         // nepali name validation
        $nep_name = $input['nep_name'];
        if (strlen($nep_name) === strlen(utf8_decode($nep_name))) {
            return  [
                'status'=>'fail',
                'errors'=>['nep_name'=>'नाम नेपालीमा हुन पर्छ |']
            ];
        }

        $validator = Validator::make($input, $rules, $customMessages);
        if ($validator->fails()) {
            return  [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        // handle image
        if ($file = $request->file('image_path')) {
            $name = time().'-'.str_random(10).'-'.$file->getClientOriginalName();
            $input['image_path'] = $file->storeAs('voters', $name, 'voter');
        }
        $input['eng_date'] = date('Y-m-d', strtotime($input['eng_date']));
        
        // return $input;
       User::create([
            'voter_no'=>$input['voter_no'],
            'nep_name'=>$input['nep_name'],
            'eng_name'=>$input['eng_name'],
            'sex'=>$input['sex'],
            'citizenship_no'=>$input['citizenship_no'],
            'father_name'=>$input['father_name'],
            'mother_name'=>$input['mother_name'],
            'husband_wife'=>$input['husband_wife'] ?? null,
            'image_path'=>$input['image_path'],
            'state_id'=>$input['state_id'],
            'district_id'=>$input['district_id'],
            'ward_id'=>$input['ward_id'],
            'constituency_id'=>$input['constituency_id'],
            'rep_assembly_id'=>$input['rep_assembly_id'],
            'state_assembly_id'=>$input['state_assembly_id'],
            'vdc_municipality_id'=>$input['vdc_municipality_id'],
            'dob'=>$input['dob'],
            'nep_date'=>$input['nep_date'],
            'eng_date'=>$input['eng_date']
       ]);

        return [
            'status'=>'success',
            'message'=>'Created successfully.'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $states = State::pluck('name', 'id')->all();
        $districts = District::pluck('name', 'id')->all();
        $municipality = MunicipalityVdc::pluck('name', 'id')->all();;
        $ward = Ward::pluck('name', 'id')->all();;
        $pollStations = ConstituencyArea::pluck('name', 'id')->all();
        $stateAssembly = StateAssembly::pluck('name', 'id')->all();
        $repAssembly = RepresentativeAssembly::pluck('name','id')->all();
        
        return view('users.edit', compact('states', 'districts', 'municipality', 'ward', 'pollStations', 
            'stateAssembly','repAssembly', 'user'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input =  $request->all();        
        $rules = [
            'voter_no'=>'required',
            'nep_name'=>'required',
            'eng_name'=>'required',
            'dob'=>'required',
            'sex'=>'required',
            'citizenship_no'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            
            'state_id'=>'required',
            'district_id'=>'required',
            'vdc_municipality_id'=>'required',
            'ward_id'=>'required',
            'constituency_id'=>'required',
            'rep_assembly_id'=>'required',
            'state_assembly_id'=>'required',
        ];

        $customMessages = [
            'voter.no.required' => 'Nepali Name field is required.',
            'nep_name.required' => 'Nepali Name field is required.',
            'eng_name.required' => 'English Name field is required.',
            'dob.required' => 'Date of birth field is required.',
            'father_name.required'=>"Father's name is required",
            'mother_name.required'=>"Mother's name is required",
            
            'state_id.required'=>"This field should not be empty",
            'district_id.required'=>'This field should not be empty',
            'vdc_municipality_id.required'=>'This field should not be empty',
            'ward_id.required'=>'This field should not be empty',
            'constituency_id.required'=>'This field should not be empty',
            'rep_assembly_id.required'=>'This field should not be empty',
            'state_assembly_id.required'=>'This field should not be empty',
        ];

         // nepali name validation
        $nep_name = $input['nep_name'];
        if (strlen($nep_name) === strlen(utf8_decode($nep_name))) {
            return  [
                'status'=>'fail',
                'errors'=>['nep_name'=>'नाम नेपालीमा हुन पर्छ |']
            ];
        }

        $validator = Validator::make($input, $rules, $customMessages);
        if ($validator->fails()) {
            return  [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        // handle image
        if ($file = $request->file('image_path')) {
            $name = time().'-'.str_random(10).'-'.$file->getClientOriginalName();
            $input['image_path'] = $file->storeAs('voters', $name, 'voter');
        }

        /*if($user->dob !== $input['dob']){
            $input['eng_date'] = date('Y-m-d', strtotime($input['eng_date']));
        }*/
       
       $user->update($input);
       return [ 
            'status'=>'success',
            'message'=>'Voter Updated'
       ];

    }

    public function delete($user){
        $object = User::findOrFail($user);
        $action = 'User\UserController@destroy';
        return view('includes.deleteModal', compact('object', 'action'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return [
            'status'=>'success',
            'message'=>'User deleted.'
        ];
    }
}
