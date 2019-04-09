	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('district_id', 'District')}}
		</div>
		<div class="col-lg-9">
			{{ Form::select('district_id', [''=>'-- Choose District --']+$districts,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('name', 'Area')}}
		</div>
		<div class="col-lg-9">
			{{ Form::text('name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-lg-3">
			{{ Form::label('representative_no', 'Representative no.')}}
		</div>
		<div class="col-lg-9">
			{{ Form::number('representative_no', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	