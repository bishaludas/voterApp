<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data.gov Nepal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- This site is optimized with the Yoast SEO plugin v7.9.1 - https://yoast.com/wordpress/plugins/seo/ -->
    <meta property="og:type" content="website" />
    <meta property="og:description" content=" Data relating to website" />
    <!-- / Yoast SEO plugin. -->
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
</style>

</head>
<body class="home page tribe-no-js">

    <header>
        <div class="banner navbar navbar-default navbar-static-top yamm" role="banner">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ route('home') }}" alt="Data.gov" class="local-link" style="text-decoration: none">
                        <span style="font-size: 5rem;">Data</span>
                        <img src="{{ asset('image/front/Flag-Nepal.gif') }}" width="100px" style="margin-top: -30px">
                    </a>
                </div>

                <nav class="collapse navbar-collapse" role="navigation">
                    <ul id="menu-primary-navigation" class="nav navbar-nav navbar-right" style="margin-top: 20px">
                        
                        <li class="dropdown yamm-fw menu-topics">
                            <a class="dropdown-toggle local-link" data-toggle="dropdown" data-target="#" href="https://www.data.gov/communities/">Topics <b class="caret"></b></a>
                            <ul class="dropdown-menu topics">
                                <li>
                                    <a href="{{ route('topic.filter') }}"><i class="ion-ios-people"></i><br><span>Population</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('topic.filter') }}"><i class="ion-plane"></i><span>Airports</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('topic.filter') }}"><i class="ion-android-car"></i><span>Roads</span></a>
                                </li>
                                <li >
                                    <a href="{{ route('topic.filter') }}"><i class="ion-ios-home"></i><span>Places</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('topic.filter') }}"><i class="ion-earth"></i><span>Rivers</span></a>
                                </li>          
                            </ul>
                        </li>

                        <li class="menu-contact"><a href="" class="local-link">Contact</a></li>
                         @if (auth()->check())
                         <li>
                            <a href="{{ route('state.index') }}" class="local-link">Admin</a>
                        </li>
                        @endif
                        <li >
                            @if (!auth()->check())
                                <a href="{{ route('login') }}" class="local-link">Login</a>
                            @endif
                            @if (auth()->check())
                                <a href="{{ route('logout') }}" class="local-link">Logout</a>
                            @endif
                        </li>
                       
                    </ul>        
                </nav>

            </div>
            <div id="external_disclaimer" class="tooltip" role="tooltip" aria-hidden="true">This link will direct you to an external website that may have different content and privacy policies.
            </div>
        </div>



        @yield('content')   

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script type='text/javascript' src={{ asset('js/front/theme.js') }}></script>
    <script type='text/javascript' src='https://code.jquery.com/jquery-migrate-3.0.1.min.js'></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

</body>
</html>
