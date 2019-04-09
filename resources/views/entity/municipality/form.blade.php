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
			{{ Form::label('type', 'Type')}}
		</div>
		<div class="col-lg-9">
			{{ Form::select('type', [''=>'-- Choose one --','vdc'=>'V.D.C', 'minicipality'=>'Municipality'],null, ['class'=>'form-control'])}}
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

	