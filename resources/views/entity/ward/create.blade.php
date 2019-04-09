{{Form::open(['method'=>'POST', 'action'=>'ward\WardController@store', 'class'=>'ajax-form-post'])}}

	@include('entity.ward.form')

	<div class="row">
		<div class="offset-lg-7 col-lg-5">
			{{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}