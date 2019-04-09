	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('ref_id', 'VDC / Municipality')}}
		</div>
		<div class="col-lg-9">
			{{ Form::select('ref_id', [''=>'-- Choose Provience --']+$municipalities,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('name', 'Ward no.')}}
		</div>
		<div class="col-lg-9">
			{{ Form::text('name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	