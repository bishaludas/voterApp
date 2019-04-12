<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    
    public function login(){
    	return view('frontend.auth.login');
    }

    public function attempLogin(Request $request){

    	$rules = [
    		'email'=>'email|required',
    		'password'=>'required'];
    	$this->validate($request, $rules);

    	$input = $request->except('_token');

    	// check if user Exists
    	$user = User::where('email', $request['email'])->first();

    	if (is_null($user)) {
    		session()->flash('message', "The user does not exist");
    		return back();
    	}

    	if (Auth::attempt($input)) {
    		return redirect()->route('state.index');
    	}else{
			sesion()->flash('message', 'Your credentials do not match');
    		return back();
    	}

    }


    public function logout(){
    	Auth::logout();
    	return redirect()->route('home');
    }
}
