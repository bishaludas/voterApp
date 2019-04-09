{{Form::model($constituency_area, ['method'=>'PATCH',  
		'action'=>['constituency\ConstituencyAreaController@update', $constituency_area->id], 
		'class'=>'ajax-form-post'])}}

	@include('entity.votingLocation.form')

	
	<div class="row">
		<div class="offset-lg-2 col-lg-8">
			{{ Form::submit('Update', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}