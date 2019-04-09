@extends('layouts.master')

@section('content')
<h3>Zone</h3>
 	<div class="box-typical box-typical-padding content-box">
    	<div class="btn btn-primary btn-sm ajax-modal-box mb-3" 
    	   data-url="{{ route('zone.create') }}" data-title="Add Zone">
    		Add Zone
    	</div>

    	<table id="table-xs" class="table table-bordered table-hover table-xs">
			<thead>
				<tr>
					<th width="75">#</th>
					<th>Zone Name</th>										
					<th>Provience Name</th>										
					<th width="100">Actions</th>
				</tr>
			</thead>
			<tbody class="loadTable">
				@foreach ($zones as $zone)
					<tr class="tableData">
					<td>{{$loop->iteration}}</td>
					<td>{{$zone->name}}</td>
					<td>{{$zone->provience->name}}</td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box" 
						  data-url="{{ route('zone.edit', $zone->id) }}" data-title = "Edit">
						  	<i class="ion-edit"></i>
						  </button>
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box"  
						  data-url="{{ route('zone.delete', $zone->id) }}" data-title="Delete">
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

