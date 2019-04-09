<div class="col-lg-2">
	{{ Form::label('ward_id', 'Ward')}}
</div>
<div class="col-lg-5 ">
	{{ Form::select('ward_id',[''=>'-- Choose one --']+$wards, null, 
	['class'=>'form-control ajax-input','data-type'=>'poll', 'data-url'=>route('filterData')])}}	
</div>