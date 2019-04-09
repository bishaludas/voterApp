{{Form::model($district, ['method'=>'PATCH', 
		'action'=>['district\DistrictController@update', $district->id], 
		'class'=>'ajax-form-post'])}}

	@include('entity.district.form')

	
	<div class="row">
		<div class="offset-lg-2 col-lg-8">
			{{ Form::submit('Update', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}