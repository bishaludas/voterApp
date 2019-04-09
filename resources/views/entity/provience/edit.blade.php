{{Form::model($state, ['method'=>'PATCH', 
		'action'=>['state\StateController@update', $state->id], 
		'class'=>'ajax-form-post'])}}


	<div class="row form-group">
		<div class="col-lg-2">
			{{ Form::label('name')}}
		</div>
		<div class="col-lg-10">
			{{ Form::text('name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row">
		<div class="offset-lg-2 col-lg-8">
			{{ Form::submit('Update', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}