{{Form::model($representative_assembly, ['method'=>'PATCH', 
		'action'=>['Assembly\RepresentativeController@update', $representative_assembly->id], 
		'class'=>'ajax-form-post'])}}

	@include('entity.assembly.representative.form')  

	
	<div class="row">
		<div class="offset-lg-2 col-lg-8">
			{{ Form::submit('Update', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}