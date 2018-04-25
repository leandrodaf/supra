<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('dashboard/aluno/img/kit/free/apple-icon.png')}}">
    <link rel="icon" href="{{asset('dashboard/aluno/img/kit/free/favicon.png')}}">

    <title>
        Supra - Painel do aluno
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('dashboard/aluno/css/material-kit.css?v=2.0.2')}}">


    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('dashboard/aluno/assets-for-demo/demo.css')}}" rel="stylesheet"/>

    <!-- iframe removal -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
</head>

<body class="signup-page">

<div class="page-header header-filter" filter-color="purple"
     style="background-image: url('https://picsum.photos/g/1000/517/?random'); background-size: cover; background-position: top center;">

    @if(Auth::check())
        <nav class="navbar navbar-expand-lg bg-primary" role="navigation-demo">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-translate">

                    <div class="profile-photo-small">
                        <img src="{{asset('/uploads/avatars/'.Auth::user()->aluno->foto_aluno)}}" alt="Circle Image"
                             class="rounded-circle img-fluid" height="40" width="40">
                        <span class="navbar-brand"
                              style="padding-left: 10px;">{{Auth::user()->aluno->nome_aluno}}</span>
                        <span class="navbar-brand"><small>{{Auth::user()->alunos_id}}</small></span>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        {{--<li class="nav-item">--}}
                        {{--<a href="#pablo" class="nav-link">--}}
                        {{--Discover--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sair
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-auto col-md-auto">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
                                                @include('dash.aluno.layout.menu')
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            @yield('content')
        </div>
    @endif


</div>
<!--   Core JS Files   -->
<script src="{{asset('dashboard/aluno/js/core/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/aluno/js/core/popper.min.js')}}"></script>
<script src="{{asset('dashboard/aluno/js/bootstrap-material-design.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="{{asset('dashboard/aluno/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('dashboard/aluno/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('dashboard/aluno/js/material-kit.js?v=2.0.2')}}"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{asset('dashboard/aluno/js/material-kit.js?v=2.0.2')}}"></script>
<!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
<script src="{{asset('dashboard/aluno/assets-for-demo/js/material-kit-demo.js')}}"></script>

@yield('scripts')

</body>

</html>
