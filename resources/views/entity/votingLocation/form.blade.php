	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('ward_id', 'Ward')}}
		</div>
		<div class="col-lg-9">
			{{ Form::select('ward_id', [''=>'-- Choose Ward --']+$wards,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('name', 'Location')}}
		</div>
		<div class="col-lg-9">
			{{ Form::text('name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	