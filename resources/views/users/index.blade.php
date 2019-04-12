@extends('layouts.master')

@section('content')
<h3>Voters</h3>
 	<div class="box-typical box-typical-padding content-box">
    	<div class="btn btn-primary btn-sm ajax-modal-box mb-3" 
    	   data-url="{{ route('users.create') }}" data-title="Add Voter">
    		Add Voter
    	</div>
		
    	<table id="table-xs" class="table table-bordered table-hover table-xs">
			<thead>
				<tr>
					<th width="75">Voter Id</th>
					<th>Voter Name</th>										
					<th>Sex</th>										
					<th>Father's Name</th>										
					<th>Mother's Name</th>										
					<th>Pooling Station</th>										
					<th width="100">Actions</th>
				</tr>
			</thead>
			<tbody class="loadTable">
				@foreach ($users as $user)
					<tr class="tableData">
					<td>{{$user->id}}</td>
					<td>{{$user->nep_name}}</td>
					<td>{{ucwords($user->sex)}}</td>
					<td>{{ucwords($user->father_name)}}</td>
					<td>{{ucwords($user->mother_name)}}</td>
					<td>{{ucwords($user->pollingLocation->name ?? null)}}</td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
							{{Form::open(['method'=>'GET', 'action'=>['User\UserController@show', $user->id]])}}
							<button class="btn btn-sm btn-secondary ">
							  	<i class="ion-eye"></i>
						  	</button>
						  		
						  	{{Form::close()}}

							  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box" 
							  data-url="{{ route('users.edit', $user->id) }}" data-title ="Edit Voter">
							  	<i class="ion-edit"></i>
							  </button>
							  <button type="button" class="btn btn-sm btn-secondary ajax-modal-box"  
							  data-url="{{ route('users.delete', $user->id) }}" data-title="Delete">
							  	<i class="ion-trash-b"></i>
							  </button>
						</div>
					</td>
				</tr>		
				@endforeach				
			</tbody>
		</table>

		{{ $users->links() }}
    </div>
@stop

@section('script')
	<script type="text/javascript" src="{{ asset('js/vendor/jquery.nepaliDatePicker.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('js/vendor/nepaliDatePicker.min.css') }}">
@stop

