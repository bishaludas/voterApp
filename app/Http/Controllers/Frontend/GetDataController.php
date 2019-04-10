<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\User;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function getVoters(Request $request){
    	$rules = [
    		'district_id'=>'required',
    		'vdc_municipality_id'=>'required',
    		'ward_id'=>'required',
    		'constituency_id'=>'required'
    	];
    	$this->validate($request, $rules);

    	$input = $request->all();
    	$users = User::where('citizenship_no', '!=', '0')
                    ->where('district_id', $input['district_id'])
    				->where('vdc_municipality_id', $input['vdc_municipality_id'])
    				->where('ward_id', $input['ward_id'])
    				->where('constituency_id', $input['constituency_id'])
    				->paginate(30);


    	return view('frontend.voter.getVoters', compact('users'));
    }


    public function confirmVoter($id){
    	$user = User::findOrFail($id);
    	return view('frontend.voter.confirm', compact('user'));
    }




    public function showVoter(Request $request, $id){
    	$rules = [
    		'year'=>'required',
    		'month'=>'required',
    		'day'=>'required',
    		'g-recaptcha-response'=>'required|recaptcha'
    	];

    	$message = [
    		'year.required'=>'Year is required',
    		'month.required'=>'Month is required',
    		'day.required'=>'Day is required',
    		'g-recaptcha-response.required'=>'Please ensure that you are a human!',
            'g-recaptcha-response.recaptcha'=>'Please ensure that you are a human!'
    	];
    	$this->validate($request, $rules, $message);


    	$user = User::findOrFail($id);
    	$input = $request->all();
    	$nep_date = (int)$input['year'].'/'.(int)$input['month'].'/'.(int)$input['day'];
    	// date('Y-m-d', strtotime($date));

    	if ($user->nep_date == $nep_date) {
    		return view('frontend.voter.showVoter', compact('user'));
    	}else{
            session()->flash('message', 'Date does not match');
            return back();
    	}
    }

    public function showVoterNo(Request $request, $id){
        $user = User::findOrFail($id);
        if ($user->citizenship_no == $request->citizenship_no) {
            return view('frontend.voter.showVoter', compact('user'));
        }
        session()->flash('message', 'Provided data do not match our record');
        return back();
    }
}
