{{Form::model($vdc_minicipality, ['method'=>'PATCH', 
		'action'=>['minicipality\MunicipalityVdcController@update', $vdc_minicipality->id], 
		'class'=>'ajax-form-post'])}}

	@include('entity.municipality.form')

	
	<div class="row">
		<div class="offset-lg-2 col-lg-8">
			{{ Form::submit('Update', ['class'=>'btn btn-primary'])}}
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	
{{Form::close()}}