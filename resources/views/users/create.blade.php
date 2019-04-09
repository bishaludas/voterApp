{{Form::open(['method'=>'POST', 'action'=>'User\UserController@store', 'class'=>'ajax-form-post voter-form'])}}

	@include('users.form') 

	<div class="row">
		<div class="offset-lg-7 col-lg-5">
			{{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}

@include('includes.nepDate')
