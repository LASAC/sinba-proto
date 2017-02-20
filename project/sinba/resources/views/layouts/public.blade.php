<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="SinbaApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/base.css?<?=date('YmdHis')?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/custom.css?<?=date('YmdHis')?>" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        td.action {
            width: 250px;
        }
    </style>
    @yield('style')

    <!-- Scripts -->
    <script src="/js/libs/angular.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll_view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('/home') }}" class="site_title">
                        <i class="fa fa-share-alt"></i> {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="clearfix">
                </div>

                @if(Auth::user())
                <!-- User profile-->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{URL::asset('/img/mckameya.jpg')}}"  alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>{{ trans('strings.hello') }},</span>
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>

                <!-- Sidebar Menu-->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section active">
                        <ul class="nav side-menu" style="">
                            <li class=""><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                    <li><a href="{{ url('/home') }}">Feed</a></li>
                                    <!--<li><a href="javascript:;"> Profile</a></li>-->
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i>{{ trans('strings.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @can('manage')
                            <li class="active"><a><i class="fa fa-edit"></i> {{ trans('strings.entries') }} <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                                    <li class="current-page"><a href="{{ url('/users') }}">{{ trans('strings.users') }}</a></li>
                                    <li><a href="{{ url('/units') }}">{{ trans('strings.units') }}</a></li>
                                    <li><a href="{{ url('/parameters') }}">{{ trans('strings.parameters') }}</a></li>
                                </ul>
                            </li>
                            @endcan
                            <li class="active"><a><i class="fa fa-edit"></i> {{trans('strings.watersheds')}} <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                                    <li>
                                        <a href="{{ url('/watersheds') }}">
                                            @can('manage')
                                                {{ trans('strings.manage') }}
                                            @else
                                                {{ trans('strings.search') }}
                                            @endcan
                                        </a>
                                    </li>
                                    @foreach(\App\WatershedAccess::watershedsAccessedBy(Auth::id()) as $watershed)
                                    <li><a href="{{ url('/watersheds/' . $watershed->id) }}">{{ $watershed->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
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
                        <li><a href="{{ url('/login') }}">{{ trans('strings.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{trans('strings.register')}}</a></li>
                    @else

                        <!-- NOTIFICATION
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
                        -->
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
<script src="/js/services/locale/{{ config('app.locale') }}/Locale.js?<?=date('YmdHis')?>"></script>
<script src="/js/custom.js"></script>

@yield('script')

</body>
</html>
