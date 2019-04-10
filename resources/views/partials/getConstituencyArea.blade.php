<div class="col-lg-2">
	{{ Form::label('area_id', 'Constituency Area')}}
</div>
<div class="col-lg-5 ">
	{{ Form::select('area_id',[''=>'-- Choose one --']+$area, null, 
	['class'=>'form-control'])}}	
</div>