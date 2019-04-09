<div class="col-lg-2">
	{{ Form::label('constituency_id', 'Poll Location')}}
</div>
<div class="col-lg-5 ">
	{{ Form::select('constituency_id',[''=>'-- Choose one --']+$locations, null, 
	['class'=>'form-control'])}}	
</div>