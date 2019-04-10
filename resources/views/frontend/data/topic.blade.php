@extends('layouts.front')

@section('content')
<div class="jumbotron">
    <div class="container">
        <p>Use the form below to obtain required data.</p>

        <div style="display: block !important; margin:0 !important; padding: 0 !important" id="wpp_popup_post_end_element"></div>  </div><!--/.container-->
    </div><!--/.jumbotron-->


    <div class="header banner frontpage-search">
        <div class="container">
            <div class="text-center getstarted">
                <small>Search over datasets </small>
                <br/><i class="ion-arrow-down-b"></i>
            </div>

            <div class="box-typical box-typical-padding content-box" style="min-height: 70vh">

                {{ Form::open(['method'=>'GET', 'action'=>'Frontend\TopicController@getfilterData'])}}
                        <div class="row form-group">
                            <div class="col-lg-2">
                                 {{ Form::label('zone_id', 'Zone')}}
                             </div>
                             <div class="col-lg-5">
                                 {{ Form::select('zone_id', [''=>'--- Choose One ---']+$zones, null, 
                                 ['class'=>'form-control ajax-input','data-type'=>'district', 'data-url'=>route('filterData')])}} 
                             </div>
                         </div>

                        <div class="row form-group filterDistrict">
                            <div class="col-lg-2">
                                 {{ Form::label('district_id', 'District')}}
                             </div>
                             <div class="col-lg-5">
                                 {{ Form::select('district_id', [''=>'--- Choose One ---'], null, 
                                 ['class'=>'form-control ','disabled'])}} 
                             </div>
                         </div>

                     <div class="row form-group filterConstituencyArea">
                        <div class="col-lg-2">
                             {{ Form::label('area_id', 'Constituency Area')}}
                         </div>
                         <div class="col-lg-5">
                             {{ Form::select('area_id', [''=>'--- Choose One ---'], null, ['class'=>'form-control' , 'disabled'])}}   
                         </div>
                     </div>

                     <div class="row form-group">
                        <div class="offset-md-2 col-lg-3">
                         {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}    
                     </div>
                 </div>

                 {{Form::close()}}
 </div>
</div><!--/.container-->
</div> 
</header>

@stop

