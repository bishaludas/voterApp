{{Form::model($state_assembly, ['method'=>'PATCH', 
		'action'=>['Assembly\StateController@update', $state_assembly->id], 
		'class'=>'ajax-form-post'])}}

	@include('entity.assembly.state.form')

	
	<div class="row">
		<div class="offset-lg-2 col-lg-8">
			{{ Form::submit('Update', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}