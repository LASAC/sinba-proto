<!DOCTYPE html>
<html lang="en" ng-app="SinbaApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        td.action {
            width: 250px;
        }
    </style>


</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll_view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('/home') }}" class="site_title">
                        <i class="fa fa-cloud"></i> {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="clearfix">
                </div>

                <!-- User profile-->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{URL::asset('/img/mckameya.jpg')}}"  alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Olá,</span>
                        <h2>Marília</h2>
                    </div>
                </div>

                <!-- Sidebar Menu-->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section active">
                        <ul class="nav side-menu" style="">
                          <li class=""><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu" style="display: none;">
                                  <li><a href="{{ url('/home') }}">Feed</a></li>
                              </ul>
                          </li>
                            <li class="active"><a><i class="fa fa-edit"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                                    <li class="current-page"><a href="{{ url('/users') }}">Usuários</a></li>
                                    <li><a href="{{ url('/units') }}">Unidades</a></li>
                                    <li><a href="{{ url('/parameters') }}">Parâmetros</a></li>
                                    <li><a href="{{ url('/watersheds') }}">Bacias Hidrográficas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top navigation-->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">{{trans('strings.register')}}</a></li>
                    @else
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{URL::asset('/img/mckameya.jpg')}}" alt="">
                                {{ Auth::user()->name }}
                                @if(Auth::user()->isAdmin)
                                    <span style="font-size: x-small; font-style: italic;">(admin)</span>
                                @endif
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right" role="menu">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="{{URL::asset('/img/mckameya.jpg')}}" alt="Profile Image"></span>
                                        <span>
                                  <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                  Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="{{URL::asset('/img/mckameya.jpg')}}"  alt="Profile Image"></span>
                                        <span>
                                  <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                  Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="{{URL::asset('/img/mckameya.jpg')}}"  alt="Profile Image"></span>
                                        <span>
                                  <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                  Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>

        <!-- Page content-->
        <div class="right_col" role="main" style="min-height: 1657px;">
            <div class="row">
                @yield('messages')
                @yield('content')
            </div>
        </div>


        <!-- Footer -->
        <footer>
          <div class="pull-right">
            SINBA - 2017
          </div>
          <div class="clearfix"></div>
        </footer>
    </div>
</div>
@yield('style')

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="/js/jquery.min.js" type="text/javascript" ></script>
<script src="/js/bootstrap.min.js" type="text/javascript" ></script>
<script src="/js/SinbaApp.js"></script>
<script src="/js/custom.js"></script>

@yield('script')

</body>
</html>
