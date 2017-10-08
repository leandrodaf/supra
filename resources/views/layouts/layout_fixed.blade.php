<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@yield("title") | Clear Admin Template </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{url('img/favicon.ico')}}" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom_css/skins/skin-default.css')}}" type="text/css" id="skin" />
    <link rel="stylesheet" href="{{asset('css/layouts.css')}}">
    <style type="text/css">
    .right-side {
        padding-top: 51px;
    }
    </style>
    <!-- end of global css -->
    @yield('header_styles')
</head>

<body class="skin-default fixed-menu">
    <div class="preloader">
        <div class="loader_img"><img src="{{asset('img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
    </div>
    <!-- header logo: style can be found in header-->
    <header class="header">
        @include('layouts.header')
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar-->
            <section class="sidebar affix">
                <div class="left_slim">
                    <div id="menu" role="navigation">
                        @include('layouts.leftmenu')
                    </div>
                </div>
                <!-- menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        <aside class="right-side">
            @yield('page-header')
            <!-- Main content -->
            <section class="content">
                @yield("content")
                <!--rightside bar -->
                @include("layouts.rightside")
            </section>
            <!-- /.content -->
        </aside>
        <!-- /.right-side -->
    </div>
    <!-- /.right-side -->
    <!-- ./wrapper -->
    <!-- global js -->
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('js/custom_js/layout_custom.js')}}"></script>
    <!-- end of page level js -->
    @yield('footer_scripts')
</body>

</html>
