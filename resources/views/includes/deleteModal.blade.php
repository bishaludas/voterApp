{{Form::open(['method'=>'DELETE', 
		'action'=>[$action, $object->id], 
		'class'=>'ajax-form-post'])}}
	<p>Are you sure you want to delete ? <b>{{$object->name ?? null}}</b></p>
	<div class="row">
		<div class="col-lg-6">
			{{ Form::submit('Delete', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}

