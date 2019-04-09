<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Voter App</title>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" href="{{ asset('css/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="with-side-menu control-panel control-panel-compact">
  @php
    $url = url()->current();

    function ActiveRoute($url, $val){
      if(strpos($url, $val)){
        echo "active-menu";
      }
    }
  @endphp
  <header class="site-header">

      <div class="container-fluid">
  
          <a href="{{ url('/') }}" {{-- class="site-logo" --}}>
              {{-- <img class="hidden-md-down mr-3" src="{{ asset('img/cglogo.png') }}" alt=""> --}}
              Voter App
          </a>
  
          
          <div class="site-header-content">
              <div class="site-header-content-in">
                  <div class="site-header-shown">

                      {{-- <div class="dropdown dropdown-notification notif">
                          <a href="#"
                             class="header-alarm @if ($notifications->count() > 0) dropdown-toggle active    @endif"
                             id="dd-notification"
                             data-toggle="dropdown"
                             aria-haspopup="true"
                             aria-expanded="false">
                              <i class="font-icon-alarm"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
                              <div class="dropdown-menu-notif-header">
                                  Notifications
                                  @if ($notifications->count() > 0)
                                    <span class="label label-pill label-danger">{{$notifications->count()}}</span>
                                  @endif
                              </div>
                              <div class="dropdown-menu-notif-list">
                                  @foreach ($notifications as $notification)
                                    <div class="dropdown-menu-notif-item">
                                      <div class="photo">
                                          <img src="starui/img/photo-64-1.jpg" alt="">
                                      </div>

                                      <a href="{{ route('profile.show', $notification['ref_id_one']) }}">{{$notification->sender}}</a> {{$notification->title}} 
                                      <a href="#" id="notificationRead" 
                                      data-noti="{{ route('notification.read', $notification['id']) }}" 
                                      data-url="{{$notification->link}}">{{$notification->post}}
                                      </a>
                                      <div class="color-blue-grey-lighter">{{$notification->created_at->diffForHumans()}}</div>
                                    </div>
                                  @endforeach
                                
                              </div>
                              <div class="dropdown-menu-notif-more">
                                  <a href="{{ route('notification.index') }}">See more</a>
                              </div>
                          </div>
                      </div> --}}

                      <div class="dropdown user-menu">
                          <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ucfirst(auth()->user()->eng_name)}}
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                             {{--  <a class="dropdown-item" href="#"><i class="ion-android-person mr-2"></i></span>Profile</a>
                              <a class="dropdown-item" href="#"><i class="ion-gear-a mr-2"></i></span>Settings</a>  --}}
                            {{--  <div class="dropdown-divider"></div> --}}
                              <a class="dropdown-item" href="{{ route('logout') }}"><i class="ion-log-out mr-2"></i>Logout</a> 
                          </div>
                      </div>
  
                      <button type="button" class="burger-right">
                          <i class="font-icon-menu-addl"></i>
                      </button>
                  </div><!--.site-header-shown-->
  
                  <div class="mobile-menu-right-overlay"></div>
                  <div class="site-header-collapsed">
                      <div class="site-header-collapsed-in">
                        
                        <div class="dropdown dropdown-typical">                         
                          {{-- <div class="site-header-search-container">
                              <div>News</div>
                          </div>
                           <div class="site-header-search-container">
                              <div>Gallery</div>
                          </div>
                           <div class="site-header-search-container">
                              <div>Department</div>
                          </div> --}}
                         
                      </div><!--.site-header-collapsed-in-->
                  </div><!--.site-header-collapsed-->
              </div><!--site-header-content-in-->

            <div class="response-flash">
              <strong><i class="ion-checkmark-circled mr-2"></i>Success</strong> 
              <p class="ajax-message-div"></p>
            </div>

            <div class="response-flash-unable">
              <strong><i class="ion-close-circled mr-2"></i>Fail</strong> 
              <p class="ajax-message-div"></p>
            </div>

          </div><!--.site-header-content-->
      </div><!--.container-fluid-->
  </header><!--.site-header-->

  
  <nav class="side-menu ">
      <ul class="side-menu-list">          

          <li class="green with-sub @php ActiveRoute($url, 'state') @endphp">
              <a href="{{ route('state.index') }}">
                  <i class="font-icon font-icon-widget"></i>
                  <span class="lbl">Provience</span>
              </a>
          </li>

          <li class="green with-sub @php ActiveRoute($url, 'zone') @endphp">
              <a href="{{ route('zone.index') }}">
                  <i class="font-icon font-icon-widget"></i>
                  <span class="lbl">Zone</span>
              </a>
          </li>

          <li class="green with-sub @php ActiveRoute($url, 'district') @endphp">
              <a href="{{ route('district.index') }}">
                  <i class="font-icon font-icon-widget"></i>
                  <span class="lbl">District</span>
              </a>
          </li>

          <li class="green with-sub @php ActiveRoute($url, 'representative') @endphp">
              <a href="{{ route('representative-assembly.index') }}">
                  <i class="font-icon font-icon-widget"></i>
                  <span class="lbl">Representative Assembly</span>
              </a>
          </li>

          <li class="green with-sub @php ActiveRoute($url, 'assembly-state') @endphp">
              <a href="{{ route('state-assembly.index') }}">
                  <i class="font-icon font-icon-widget"></i>
                  <span class="lbl">State Assembly</span>
              </a>
          </li>

          <li class="green with-sub @php ActiveRoute($url, 'vdc-minicipality') @endphp">
              <a href="{{ route('vdc-minicipality.index') }}">
                  <i class="font-icon font-icon-widget"></i>
                  <span class="lbl">VDC/Minicipality</span>
              </a>
          </li>

          <li class="green with-sub @php ActiveRoute($url, 'ward') @endphp">
              <a href="{{ route('ward.index') }}">
                  <i class="font-icon font-icon-widget"></i>
                  <span class="lbl">Ward</span>
              </a>
          </li>

          <li class="green with-sub @php ActiveRoute($url, 'constituency-area') @endphp">
              <a href="{{ route('constituency-area.index') }}">
                  <i class="font-icon font-icon-widget"></i>
                  <span class="lbl">Polling Station</span>
              </a>
          </li>

          <li class="blue with-sub @php ActiveRoute($url, 'user') @endphp">
              <a href="{{ route('users.index') }}">
                  <i class="font-icon font-icon-user"></i>
                  <span class="lbl">Voters</span>
              </a>
          </li>

          {{-- <li class="blue with-sub @php ActiveRoute($url, 'user') @endphp">
              <span>
                  <i class="font-icon font-icon-user"></i>
                  <span class="lbl">User</span>
              </span>
              <ul>
                  <li><a href="#"><span class="lbl pl-3">User list</span></a></li>
                  <li><a href="#"><span class="lbl pl-3">Create User</span></a></li>
              </ul>
          </li> --}}

      </ul>
  </nav><!--.side-menu-->


{{-- Page Content --}}
  <div class="page-content">
      <div class="container-fluid" style="min-height: 100vh;">
        @yield('content')
       
      </div><!--.container-fluid-->
       <footer>Copyright &copy; {{date('Y')}} CG Techno Dreams</footer>

       {{-- Flash Modal --}}
       @include('includes.flash')
       {{-- Flash Modal End --}}
       
  </div><!--.page-content-->

@include('includes.modal')


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
  
  {{-- Datepicker --}}
{{--   <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}
  {{-- Datetimepicker --}}
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
  @yield('script')
</body>
</html>