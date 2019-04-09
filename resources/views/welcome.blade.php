@extends('layouts.front')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>The home of the Nepal Government&#8217;s open data</h1>
        <p>Here you will find data and resources to conduct research, develop web and mobile applications, design data visualizations, and more.</p>

        <div style="display: block !important; margin:0 !important; padding: 0 !important" id="wpp_popup_post_end_element"></div>  </div><!--/.container-->
    </div><!--/.jumbotron-->


    <div class="header banner frontpage-search">
        <div class="container">
            <div class="text-center getstarted">
                <h4><label for="search-header">मतदाता नामावली <br>
                    <small>Search over datasets
                    </small>
                    <br/><i class="ion-arrow-down-b"></i></label></h4>
                </div>
                
                <div class="box-typical box-typical-padding content-box">

                  {{ Form::open(['method'=>'GET', 'action'=>'Frontend\GetDataController@getVoters'])}}
                  <div class="row form-group">
                    <div class="col-lg-2">
                       {{ Form::label('district_id', 'District')}}
                   </div>
                   <div class="col-lg-5">
                       {{ Form::select('district_id', [''=>'--- Choose One ---']+$districts, null, 
                       ['class'=>'form-control ajax-input','data-type'=>'municipality', 'data-url'=>route('filterData')])}} 
                   </div>
                </div>

                <div class="row form-group filterMunicipality">
                    <div class="col-lg-2">
                       {{ Form::label('vdc_municipality', 'VDC/ Municipality')}}
                   </div>
                   <div class="col-lg-5 ">
                       {{ Form::select('vdc_municipality', [''=>'--- Choose One ---'], null, ['class'=>'form-control', 'disabled'])}} 
                   </div>
                </div>

                <div class="row form-group filterWard">
                    <div class="col-lg-2">
                       {{ Form::label('ward_id', 'Ward')}}
                   </div>
                   <div class="col-lg-5">
                       {{ Form::select('ward_id', [''=>'--- Choose One ---'], null, ['class'=>'form-control', 'disabled'])}}  
                   </div>
                </div>

                <div class="row form-group filterLocation">
                    <div class="col-lg-2">
                       {{ Form::label('poll_location', 'Poll Location')}}
                   </div>
                   <div class="col-lg-5">
                       {{ Form::select('poll_location', [''=>'--- Choose One ---'], null, ['class'=>'form-control' , 'disabled'])}}   
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



<div role="document">
    <div class="content">
        <main class="main" role="main" id="main">
            <div class="wrap container">
                <div class="page-header">
                    <h1>Browse Topics</h1>
                </div>
                <ul class="topics">
                    <li>
                        <a href="#"><i class="ion-ios-people"></i><br><span>Population</span></a>
                    </li>
                    <li>
                        <a href="/climate/"><i class="ion-plane"></i><span>Airports</span></a>
                    </li>
                    <li>
                        <a href="/consumer/"><i class="ion-android-car"></i><span>Roads</span></a>
                    </li>
                    <li >
                        <a href="/ecosystems/"><i class="ion-ios-home"></i><span>Places</span></a>
                    </li>
                    <li>
                        <a href="/education/"><i class="ion-earth"></i><span>Rivers</span></a>
                    </li>                                           
                </ul>

            </div><!--/.container-->


            <section id="highlights" class="wrap wrap-lightblue">
                <div class="container">
                    <div class="page-header">
                        <h1>Highlights</h1>
                    </div>

                    <div id="highlightsCarousel" class="carousel highlights slide">
                        <!-- Carousel items -->
                        <div id="highlightsCarouselInner" class="carousel-inner">
                            <div class="highlight item active ">
                                <header><h2 class="entry-title" style="float:left;">2011 Nepal census</h2></header>
                                <br clear="all"/>
                                <div class="featured-image col-md-6">
                                    <img  src="{{ asset('image/front/mapofnepal.png') }}" style="width: 100%">                    
                                </div>

                                <article class="col-md-6">
                                    <p>Nepal conducted a widespread national census in 2011 by the Nepal Central Bureau of Statistics. Working with the 58 municipalities and the 3915 Village Development Committees at a district level, they recorded data from all the municipalities and villages of each district. The data included statistics on population size, households, sex and age distribution, place of birth, residence characteristics, literacy, marital status, religion, language spoken, caste/ethnic group, economically active population, education, number of children, employment status, and occupation.</p>

                                    <ul style="margin-top: 30px;">
                                        <li>Total population in 2011: 26,494,504</li>
                                        <li>Increase since last census 2001: 3,343,081</li>
                                        <li>Annual population growth rate (exponental growth): 1.35</li>
                                        <li>Number of households: 5,427,302</li>
                                        <li>Average Household Size: 4.88</li>
                                        <li>Population in Mountain: 6.73%, Hill: 43.00% and Terai: 50.27%.</li>
                                    </ul>

                                </article>
                            </div><!--/.highlight-->
                        </div>
                        {{-- <div class="pull-right">
                            <a href="/highlights" class="more-link" style="color:#fff;">More Highlights</a>
                        </div> --}}
                    </div>
                </div>
                <!--/.container-->
            </section><!--/.wrap-lightblue-->
        </main>
        <!-- /.main -->
    </div>
    <!-- /.content -->
</div>
<!-- /.wrap -->



<footer class="content-info" role="contentinfo">
            <div class="container">
                <div class="row">
                   <!--  <div class="col-lg-4">
                        <p>&copy; 2019 Data.gov</p>
                    </div> -->
                    <div class="col-md-6 col-lg-6">
                    
                    <ul id="menu-footer2" class="nav">
                        <li><a href="https://www.data.gov/privacy-policy" class="local-link">Privacy and Website Policies</a></li>
                        <li><a href="https://www.usa.gov/" class="external ext-link" rel="external" >USA.GOV</a></li>
                        <li><a href="http://www.performance.gov/" class="external ext-link" rel="external">PERFORMANCE.GOV</a></li>
                    </ul>            
                    </div>
                
                    <nav class="col-md-3 col-lg-3" role="navigation">
                        <ul id="menu-footer" class="nav"><li class="menu-about"><a href="https://www.data.gov/about" class="local-link">About</a></li>
                            <li class="menu-open-government"><a href="https://www.data.gov/open-gov/" class="local-link">Open Government</a></li>
                            <li class="menu-blog"><a href="https://www.data.gov/meta/" class="local-link">Blog</a></li>
                            <li class="menu-metrics"><a href="https://www.data.gov/metrics" class="local-link">Metrics</a></li>
                            <li class="menu-events"><a href="/events/">Events</a></li>
                            <li class="menu-log-in"><a href="https://www.data.gov/wp/wp-login.php" class="local-link">Log In</a></li>
                        </ul>                
                    </nav>

                    <div class="col-md-3 col-lg-3 social-nav">
                        <nav role="navigation">
                            <ul id="menu-social_navigation" class="nav"><li><a href="https://twitter.com/usdatagov" title="This link will direct you to an external website that may have different content and privacy policies from Data.gov." class="local-link"><i class="fa fa-twitter" ></i><span>Twitter</span></a></li>
                                <li><a href="http://github.com/GSA/data.gov/" title="This link will direct you to an external website that may have different content and privacy policies from Data.gov." class="local-link"><i class="fa fa-github" ></i><span>Github</span></a></li>
                            </ul>                   
                        </nav>
                    </div>
                </div>
            </div>
        </footer>

@stop

