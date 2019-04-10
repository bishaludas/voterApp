<div class="col-lg-2">
	{{ Form::label('district_id', 'District')}}
</div>
<div class="col-lg-5 ">
	{{ Form::select('district_id',[''=>'-- Choose one --']+$district, null, 
	['class'=>'form-control ajax-input','data-type'=>'area', 'data-url'=>route('filterData')])}}	
</div>