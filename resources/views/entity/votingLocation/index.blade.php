@extends('layouts.master')

@section('content')
<h3>Polling Station</h3>
 	<div class="box-typical box-typical-padding content-box">
    	<div class="btn btn-primary btn-sm ajax-modal-box mb-3" 
    	   data-url="{{ route('constituency-area.create') }}" data-title="Add Polling Station">
    		Add Polling Station
    	</div>

    	<table id="table-xs" class="table table-bordered table-hover table-xs">
			<thead>
				<tr>
					<th width="75">#</th>
					<th>Polling Station</th>										
					<th>Ward no.</th>										
					<th width="100">Actions</th>
				</tr>
			</thead>
			<tbody class="loadTable">
				@foreach ($constituencyAreas as $area)
					<tr class="tableData">
					<td>{{$loop->iteration}}</td>
					<td>{{$area->name}}</td>
					<td>{{$area->ward->name}}</td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box" 
						  data-url="{{ route('constituency-area.edit', $area->id) }}" data-title = "Edit">
						  	<i class="ion-edit"></i>
						  </button>
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box"  
						  data-url="{{ route('area.delete', $area->id) }}" data-title="Delete">
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

