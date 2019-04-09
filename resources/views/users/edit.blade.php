{{Form::model($user, ['method'=>'PATCH', 
		'action'=>['User\UserController@update', $user->id], 
		'class'=>'ajax-form-post'])}}
	
	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			
		</div>
		<div class="col-lg-8">
			<img src="{{ url('image/'.$user->image_path ?? null) }}" width="150px" class="img-fluid" alt="No-image">
		</div>
	</div>

	@include('users.form') 

	<div class="row">
		<div class="offset-lg-2 col-lg-8">
			{{ Form::submit('Update', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}

@include('includes.nepDate')
