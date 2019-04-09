@extends('layouts.front')

@section('content')

    <div class="header banner frontpage-search" >
        <div class="container ">
            <div class="row " style="background: #fff; min-height: 90vh; padding: 20px">
                @if (session()->has('message'))
                  <span class="alert alert-primary" style="display: block">  {{session('message')}}</span>
                @endif
            	  	<h3 style="text-align: center; margin-bottom: 30px">Login</h3>  
            	  	<div class="col-md-offset-4 col-md-7">
            	  		{{ Form::open(['method'=>'POST', 'action'=>'Frontend\AdminLoginController@attempLogin'])}}
            	  		<div class="row">
            	  			<div class="col-md-8 form-group">
            	  				{{ Form::label('email', 'Email')}}
            	  				{{ Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Username', 'required'])}}
            	  			</div>

            	  			<div class="col-md-8 form-group">
            	  				{{ Form::label('password', 'Password')}}
            	  				{{ Form::password('password', ['class'=>'form-control' , 'required'])}}
            	  			</div>

            	  			<div class="col-md-8 form-group">
            	  				{{ Form::submit('Submit', ['class'=>'btn btn-primary form-control'])}}
            	  			</div>
            	  		</div>
            	  		{{ Form::close()}}
            	  	</div>                     
            </div> 
        </div><!--/.container-->
    </div> 

<script src='https://www.google.com/recaptcha/api.js'></script>
@stop

