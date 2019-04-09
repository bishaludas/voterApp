@extends('layouts.master')

@section('content')
<h3>State Assembly Constituency Area</h3>
 	<div class="box-typical box-typical-padding content-box">
    	<div class="btn btn-primary btn-sm ajax-modal-box mb-3" 
    	   data-url="{{ route('state-assembly.create') }}" data-title="Add">
    		Add  
    	</div>

    	<table id="table-xs" class="table table-bordered table-hover table-xs">
			<thead>
				<tr>
					<th width="75">#</th>
					<th>State Area</th>										
					<th>State area no.</th>										
					<th>District</th>										
					<th width="100">Actions</th>
				</tr>
			</thead>
			<tbody class="loadTable">
				@foreach ($states as $state)
					<tr class="tableData">
					<td>{{$loop->iteration}}</td>
					<td>{{$state->name}}</td>
					<td>{{$state->representative_no}}</td>
					<td>{{$state->district->name}}</td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box" 
						  data-url="{{ route('state-assembly.edit', $state->id) }}" data-title = "Edit">
						  	<i class="ion-edit"></i>
						  </button>
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box"  
						  data-url="{{ route('state-assembly.delete', $state->id) }}" data-title="Delete">
						  	<i class="ion-trash-b"></i>
						  </button>
						</div>
					</td>
				</tr>		
				@endforeach				
			</tbody>
		</table>
    </div>
@stop

