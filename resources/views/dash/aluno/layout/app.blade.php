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
        Signup &#45; Material Kit by Creative Tim
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
    <div class="container">
        @yield('content')
    </div>

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
