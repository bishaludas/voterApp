@extends('layouts.front')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h2 style="margin: 0rem">{{ucwords($area->name)}}</h2>
        <div style="display: block !important; margin:0 !important; padding: 0 !important" id="wpp_popup_post_end_element"></div>  </div><!--/.container-->
    </div><!--/.jumbotron-->


    <div class="header banner frontpage-search" >
        <div class="container">
            <div class="box-typical box-typical-padding content-box" style="min-height: 70vh; background: #fff; padding: 25px">
                    {!! $area->description !!}
            </div>
        </div><!--/.container-->
    </div> 
</header>

@stop

