@extends('layouts.master')

@section('content')
<h3>{{$area->name}}</h3>
 	<div class="box-typical box-typical-padding content-box">
		{{Form::model($area, ['method'=>'PATCH', 'action'=>['Assembly\RepresentativeController@updateDescription', $area->id]])}}
			
			<div class="row form-group">
				<div class="col-lg-12">
					{{ Form::textarea('description', null, ['class'=>'form-control lfm-editor'])}}
				</div>
			</div>
			<!-- /description -->
			
			<div class="row form-group">
				<div class="col-md-10 ml-2">
					{{ Form::submit('Submit', ['class'=>'btn btn-primary float-left'])}}
				</div>
			</div>
		{{Form::close()}}
    </div>

    
@stop

@section('script')
@include('includes.tinymce');
@stop



