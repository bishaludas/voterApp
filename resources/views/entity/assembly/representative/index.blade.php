@extends('layouts.master')

@section('content')
<h3>Representative Assembly Constituency Area</h3>
 	<div class="box-typical box-typical-padding content-box">
    	<div class="btn btn-primary btn-sm ajax-modal-box mb-3" 
    	   data-url="{{ route('representative-assembly.create') }}" data-title="Add">
    		Add Representative 
    	</div>

    	<table id="table-xs" class="table table-bordered table-hover table-xs">
			<thead>
				<tr>
					<th width="75">#</th>
					<th>Representative area</th>										
					<th>Representative area no.</th>										
					<th>District</th>										
					<th>Description</th>										
					<th width="100">Actions</th>
				</tr>
			</thead>
			<tbody class="loadTable">
				@foreach ($representatives as $representative)
					<tr class="tableData">
					<td>{{$loop->iteration}}</td>
					<td>{{$representative->name}}</td>
					<td>{{$representative->representative_no}}</td>
					<td>{{$representative->district->name}}</td>
					<td><a href="{{ route('representative.details', $representative->id) }}">Add Description</a></td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box" 
						  data-url="{{ route('representative-assembly.edit', $representative->id) }}" data-title = "Edit">
						  	<i class="ion-edit"></i>
						  </button>
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box"  
						  data-url="{{ route('representative.delete', $representative->id) }}" data-title="Delete">
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

