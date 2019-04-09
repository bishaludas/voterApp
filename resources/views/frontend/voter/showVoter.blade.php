@extends('layouts.front')

@section('content')
    <div class="header banner frontpage-search" >
        <div class="container ">
            <div class="row " style="background: #fff; min-height: 90vh; padding: 20px">
            	<div class="col-md-12">
            		<table id="table-xs" class="table table-bordered table-hover table-xs">
                              <tbody class="loadTable">    
                                    <tr>
                                          <td width="300px">Photo</td>
                                          <td><img src="{{ url('image/'.$user->image_path ?? null) }}" width="150px" class="img-fluid" alt="No-image"></td> 
                                    </tr>                                           
                                    <tr>
                                          <td>मतदाता नं.</td>
                                          <td>{{$user->voter_no ?? null}}</td>                                                
                                    </tr> 
                                    <tr>
                                          <td>मतदाताको नाम (नेपालीमा)</td>
                                          <td>{{$user->nep_name ?? null}}</td>
                                    </tr>
                                    <tr>
                                          <td>मतदाताको नाम (अंग्रेजीमा)</td>
                                          <td>{{ucwords($user->eng_name ?? null)}}</td>
                                    </tr>
                                    <tr>
                                          <td>जन्म मिति</td>
                                          <td>{{ucwords($user->dob ?? null)}}</td>
                                    </tr>
                                    <tr>
                                          <td>लिङ्ग</td>
                                          <td>{{ucwords($user->sex ?? null)}}</td>
                                    </tr>
                                    <tr>
                                          <td>नागरिकता नं.</td>
                                          <td>{{ucwords($user->citizenship_no ?? null)}}</td>    
                                    </tr>

                                    <tr>
                                          <td>वुवाको नाम</td>
                                          <td>{{ucwords($user->father_name ?? null)}}</td>    
                                    </tr>

                                    <tr>
                                          <td>आमाको नाम</td>
                                          <td>{{ucwords($user->mother_name ?? null)}}</td>    
                                    </tr>

                                    <tr>
                                          <td>पति / पत्निको नाम</td>
                                          <td>{{ucwords($user->husband_wife ?? 'N/A')}}</td>    
                                    </tr>

                                    <tr>
                                          <td>प्रदेश नं.</td>
                                          <td>{{ucwords($user->provience->name ?? null)}}</td>    
                                    </tr>

                                    <tr>
                                          <td>जिल्ला</td>
                                          <td>{{ucwords($user->district->name)}}</td>    
                                    </tr>

                                    <tr>
                                          <td>प्रतिनिधि सभा निर्वाचन नं</td>
                                          <td>{{$user->repAssembly->representative_no ?? null}} ({{ucwords($user->repAssembly->name)}}) </td>    
                                    </tr>

                                    <tr>
                                          <td>प्रदेश सभा निर्वाचन नं</td>
                                          <td>{{$user->stateAssembly->representative_no ?? null}} ({{ucwords($user->stateAssembly->name ??null)}}) </td>    
                                    </tr>

                                    <tr>
                                          <td>गा.पा./न.पा.</td>
                                          <td>{{ucwords($user->vdcMinicipality->name ?? null)}}</td>    
                                    </tr>

                                    <tr>
                                          <td>वडा नं.</td>
                                          <td>{{ucwords($user->ward->name ?? null)}}</td>    
                                    </tr>

                                    <tr>
                                          <td>मतदान स्थल</td>
                                          <td>{{ucwords($user->pollingLocation->name ?? null)}}</td>    
                                    </tr>
                              </tbody>
                        </table>
            	</div>
            </div>
        </div><!--/.container-->
    </div> 

<script src='https://www.google.com/recaptcha/api.js'></script>
@stop



  	