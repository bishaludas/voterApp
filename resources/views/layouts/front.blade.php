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
                                <li class="menu-agriculture topic-food"><a href="https://www.data.gov/food/" class="local-link"><i></i><span>Agriculture</span></a></li>
                                <li class="menu-climate topic-climate"><a href="https://www.data.gov/climate/" class="local-link"><i></i><span>Climate</span></a></li>
                                <li class="menu-consumer topic-consumer"><a href="https://www.data.gov/consumer/" class="local-link"><i></i><span>Consumer</span></a></li>
                                <li class="menu-ecosystems topic-ecosystems"><a href="https://www.data.gov/ecosystems/" class="local-link"><i></i><span>Ecosystems</span></a></li>
                                <li class="menu-education topic-education"><a href="https://www.data.gov/education/" class="local-link"><i></i><span>Education</span></a></li>
                            </ul>
                        </li>

                        <li class="menu-contact"><a href="https://www.data.gov/contact" class="local-link">Contact</a></li>
                        <li class="menu-contact">
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
