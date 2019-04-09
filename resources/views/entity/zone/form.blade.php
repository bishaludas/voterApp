	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('state_id', 'State')}}
		</div>
		<div class="col-lg-9">
			{{ Form::select('state_id', [''=>'-- Choose Provience --']+$provinces,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('name')}}
		</div>
		<div class="col-lg-9">
			{{ Form::text('name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	