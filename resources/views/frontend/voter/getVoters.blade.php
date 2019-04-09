@extends('layouts.front')

@section('content')
    <div class="header banner frontpage-search" >
        <div class="container ">
            <div class="row " style="background: #fff; height: 90vh;">
                <div class="col-lg-12">
                    <h3>वडा अनुसार नामावली </h3>
                    <table id="table-xs" class="table table-bordered table-hover table-xs">
                            <thead>
                                <tr>
                                    <th width="75">Voter no.</th>
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
                                    <td>{{$user->voter_no ?? null}}</td>
                                    <td>{{$user->nep_name}}</td>
                                    <td>{{ucwords($user->sex)}}</td>
                                    <td>{{ucwords($user->father_name)}}</td>
                                    <td>{{ucwords($user->mother_name)}}</td>
                                    <td>{{ucwords($user->pollingLocation->name)}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            {{Form::open(['method'=>'GET', 
                                            'action'=>['Frontend\GetDataController@confirmVoter', $user->id]])}}
                                            <button class="btn btn-sm btn-secondary ">
                                                <i class="ion-eye"></i>
                                            </button>
                                                
                                            {{Form::close()}}
                                        </div>
                                    </td>
                                </tr>       
                                @endforeach             
                            </tbody>
                        </table>
                       {!! $users->appends(request()->query())->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
        </div><!--/.container-->
    </div> 

@stop

