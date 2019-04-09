<div class="col-lg-2">
	{{ Form::label('vdc_municipality_id', 'VDC/ Municipality')}}
</div>
<div class="col-lg-5 ">
	{{ Form::select('vdc_municipality_id',[''=>'-- Choose one --']+$municipality, null, 
	['class'=>'form-control ajax-input','data-type'=>'ward', 'data-url'=>route('filterData')])}}	
</div>