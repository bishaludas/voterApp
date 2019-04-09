@extends('layouts.master')

@section('content')
<h3>VDC / Municipality</h3>
 	<div class="box-typical box-typical-padding content-box">
    	<div class="btn btn-primary btn-sm ajax-modal-box mb-3" 
    	   data-url="{{ route('vdc-minicipality.create') }}" data-title="Add VDC / Municipality">
    		Add VDC / Municipality
    	</div>

    	<table id="table-xs" class="table table-bordered table-hover table-xs">
			<thead>
				<tr>
					<th width="75">#</th>
					<th>VDC / Municipality Name</th>
					<th>VDC / Municipality</th>										
					<th>District Name</th>																				
					<th width="100">Actions</th>
				</tr>
			</thead>
			<tbody class="loadTable">
				@foreach ($municipalities as $municipality)
					<tr class="tableData">
					<td>{{$loop->iteration}}</td>
					<td>{{$municipality->name}}</td>
					<td>{{$municipality->type ==="vdc" ? "V.D.C" : "Municipality"}}</td>
					<td>{{$municipality->district->name}}</td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box" 
						  data-url="{{ route('vdc-minicipality.edit', $municipality->id) }}" data-title = "Edit">
						  	<i class="ion-edit"></i>
						  </button>
						  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box"  
						  data-url="{{ route('minicipality.delete', $municipality->id) }}" data-title="Delete">
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

