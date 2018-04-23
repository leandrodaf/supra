<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SUPRA</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- all -->
    <link rel="stylesheet" href="{{mix('css/all.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('js/template/html5shiv.js')}}"></script>
    <script src="{{asset('js/template/respond.min.js')}}"></script>
    <![endif]-->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')
</head>

<body class="hold-transition skin-blue layout-top-nav">
<div id="app">
    @if (!Auth::guest())
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="{{Auth::user()->getRoutePanel()}}" class="logo">
                                <b>SU</b>PRA
                            </a>

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                            <ul class="nav navbar-nav">

                                @include('layouts.menu')

                                @include('layouts.menuConfiguracoes')

                            </ul>
                        </div>
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">

                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <img src="{{Gravatar::get(Auth::user()->email, 'default')}}"
                                             class="user-image" alt="User Image"/>
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <img src="{{Gravatar::get(Auth::user()->email, 'default')}}"
                                                 class="img-circle" alt="User Image"/>
                                            <p>
                                                {!! Auth::user()->name !!}
                                                <small>Desde {!! Auth::user()->created_at->format('d/m/y') !!}</small>
                                            </p>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            {{--<div class="pull-left">--}}
                                            {{--<a href="#" class="btn btn-default btn-flat">Perfil</a>--}}
                                            {{--</div>--}}
                                            <div class="pull-right">
                                                <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Sair
                                                </a>
                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-custom-menu -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </header>

            <!-- Left side column. contains the logo and sidebar -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container">
                    @yield('content')
                </div>
            </div>


            <!-- Main Footer -->
            {{--<footer class="main-footer footer navbar-fixed-bottom" style="max-height: 100px;text-align: center">--}}
            {{--<strong>Copyright © 2017 <a href="#">SUPRA</a>.</strong> Todos os direitos reservados.--}}
            {{--</footer>--}}

        </div>
    @else
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{!! url('/') !!}">
                        Administrador
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{!! url('/home') !!}">Home</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{!! url('/login') !!}">Login</a></li>
                        <li><a href="{!! url('/register') !!}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


<script src="{{ mix('js/template/manifest.js') }}"></script>
<script src="{{ mix('js/template/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>

<!-- plugin -->
<script src="{{mix('js/all.js')}}"></script>


@yield('scripts')

<!-- AdminLTE App -->
<script src="{{asset('js/template/app.min.js')}}"></script>

</body>
</html>