@extends('layouts.front')

@section('content')

    <div class="header banner frontpage-search" >
        <div class="container ">
            <div class="row " style="background: #fff; min-height: 90vh; padding: 20px">
                @if (session()->has('message'))
                  <span class="alert alert-danger" style="display: block">  {{session('message')}}</span>
                @endif
            	<p style="margin-top: 20px">Please confirm before viewing voter data</p><br>
                <div class="col-md-9">
                   	{{Form::open(['method'=>'POST', 'action'=>['Frontend\GetDataController@showVoter',$user->id]])}}
                   		<div class="row form-group">
                   			<div class="col-md-2">
                   				{{Form::label('dob', 'जन्म मिति')}}
                   			</div>
                   			<div class="col-md-2">
                   				{{Form::text('year', null, ['class'=>'form-control', 'placeholder'=>'Year'])}}
                   				@if ($errors->get('year') > 0)
                   					<span class="text-danger">{{ $errors->first('year')}}</span>
                   				@endif
                   			</div>

                   			<div class="col-md-2">
                   				{{Form::text('month', null, ['class'=>'form-control',  'placeholder'=>'Month'])}}
                   				@if ($errors->get('month') > 0)
                   					<span class="text-danger">{{ $errors->first('month')}}</span>
                   				@endif
                   			</div>

                   			<div class="col-md-2">
                   				{{Form::text('day', null, ['class'=>'form-control',  'placeholder'=>'Day'])}}
                   				@if ($errors->get('day') > 0)
                   					<span class="text-danger">{{ $errors->first('day')}}</span>
                   				@endif
                   			</div>
                   		</div>
						
						{{-- Recaptcha --}}
	                   	<div class="row form-group">
	                   		<div class="col-md-2"></div>
   	                        <div class="col-md-8">
   	                            <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
   	                            <small>Confirm you are not robot.</small><br>

   	                            @if ($errors->get('g-recaptcha-response') > 0)
                   					<span class="text-danger">{{ $errors->first('g-recaptcha-response')}}</span>
                   				@endif
   	                    	</div>
	                   	</div>
   	                    
        						<div class="row form-group">
        							<div class="col-md-2"></div>
                          <div class="col-md-4">
                             {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                          </div>
        						</div>
   	                    
   	                {{ Form::close()}}

                </div> 
                <div class="col-md-9" style="border-top: 2px solid black; padding-top: 20px">
                  {{ Form::open(['method'=>'POST', 'action'=>['Frontend\GetDataController@showVoterNo',$user->id]])}}
                    <div class="row form-group">
                      <div class="col-md-2">
                        {{Form::label('citizenship_no', 'नागरिकता नं. ')}}
                      </div>
                      <div class="col-md-8">
                        {{Form::text('citizenship_no', null, ['class'=>'form-control', 'required'])}}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                          <div class="col-md-4">
                             {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                          </div>
                    </div>
                  {{ Form::close()}} 
                </div>
            </div> 
        </div><!--/.container-->
    </div> 

<script src='https://www.google.com/recaptcha/api.js'></script>
@stop

