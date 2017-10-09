<div class="nav_profile">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="javascript:void(0)">
            <img src="{{asset('img/authors/avatar1.jpg')}}" class="img-circle" alt="User Image">
        </a>
        <div class="content-profile">
            <h4 class="media-heading">
                                Addison
                            </h4>
            <ul class="icon-list">
                <li>
                    <a href="{{url('users')}}">
                        <i class="fa fa-fw ti-user"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('lockscreen')}}">
                        <i class="fa fa-fw ti-lock"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('edit_user')}}">
                        <i class="fa fa-fw ti-settings"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('login')}}">
                        <i class="fa fa-fw ti-shift-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<ul class="navigation slimmenu" id="navigation">
    <li {!! (Request::is( 'index')|| Request::is( '/')? 'class="active"': "") !!}>
        <a href="{{url('/')}}">
            <span class="ti-user"></span>
            <span class="mm-text ">Gerenciar Usúarios</span>
        </a>
    </li>

    {{--<li {!! (Request::is( 'form_elements') || Request::is( 'realtime_form') || Request::is( 'form_validations') || Request::is( 'form_layouts') || Request::is( 'complex_forms')|| Request::is( 'complex_forms2') || Request::is( 'radio_checkboxes') || Request::is( 'form_editors') || Request::is( 'form_wizards') || Request::is( 'dropdowns') || Request::is( 'datepicker') ||Request::is( 'advanceddate_pickers') ||Request::is( 'x-editable') ? 'class="menu-dropdown active"': 'class="menu-dropdown"') !!}>--}}
        {{--<a href="javascript:void(0)">--}}
            {{--<i class="menu-icon ti-check-box"></i>--}}
            {{--<span class="mm-text">Forms</span>--}}
            {{--<span class="fa arrow"></span>--}}
        {{--</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--<li {!! (Request::is( 'form_elements') || Request::is( 'realtime_form') || Request::is( 'form_validations') || Request::is( 'form_layouts') || Request::is( 'complex_forms')|| Request::is( 'complex_forms2') || Request::is( 'radio_checkboxes') ? 'class="active"': 'class=""') !!}>--}}
                {{--<a href="javascript:void(0)">--}}
                    {{--<i class="fa fa-fw ti-receipt"></i><span class="mm-text"> Features</span>--}}
                    {{--<span class="fa arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu form-submenu">--}}
                    {{--<li {!! (Request::is( 'form_elements')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('form_elements')}}"><i class="fa fa-fw ti-cup"></i><span class="mm-text"> Form Elements</span>--}}
                                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'realtime_form')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('realtime_form')}}"><i class="fa fa-fw ti-write"></i><span class="mm-text"> Realtime Forms</span></a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'form_validations')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('form_validations')}}">--}}
                            {{--<i class="fa fa-fw ti-alert"></i><span class="mm-text"> Form Validations</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'form_layouts')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('form_layouts')}}">--}}
                            {{--<i class="fa fa-fw ti-layout-width-default"></i><span class="mm-text"> Form Layouts</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'complex_forms')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('complex_forms')}}">--}}
                            {{--<i class="fa fa-fw ti-layout-cta-left"></i><span class="mm-text"> Complex Forms</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'complex_forms2')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('complex_forms2')}}">--}}
                            {{--<i class="fa fa-fw ti-layout-cta-center"></i><span class="mm-text"> Complex Forms 2</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'radio_checkboxes')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('radio_checkboxes')}}">--}}
                            {{--<i class="fa fa-fw ti-check-box"></i> <span class="mm-text">Radio and Checkbox</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is( 'form_editors') || Request::is( 'form_wizards') || Request::is( 'dropdowns') || Request::is( 'datepicker') || Request::is( 'advanceddate_pickers') ||Request::is( 'x-editable')? 'class="active"': 'class=""') !!}>--}}
                {{--<a href="javascript:void(0)">--}}
                    {{--<i class="fa fa-fw ti-clipboard"></i><span class="mm-text"> Components</span>--}}
                    {{--<span class="fa arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu form-submenu">--}}
                    {{--<li {!! (Request::is( 'form_editors')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('form_editors')}}">--}}
                            {{--<i class="fa fa-fw ti-pencil"></i> <span class="mm-text">Form Editors</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'form_wizards')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('form_wizards')}}">--}}
                            {{--<i class="fa fa-fw ti-settings"></i><span class="mm-text"> Form Wizards</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'dropdowns')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('dropdowns')}}">--}}
                            {{--<i class="fa fa-fw ti-widget-alt"></i> <span class="mm-text">Drop Downs</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'datepicker')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('datepicker')}}">--}}
                            {{--<i class="fa fa-fw ti-calendar"></i><span class="mm-text"> Date pickers</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'advanceddate_pickers')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('advanceddate_pickers')}}">--}}
                            {{--<i class="fa fa-fw ti-notepad"></i> <span class="mm-text">Advanced Date pickers</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li {!! (Request::is( 'x-editable')? 'class="active"': "") !!}>--}}
                        {{--<a href="{{url('x-editable')}}">--}}
                            {{--<i class="fa fa-fw ti-slice"></i> <span class="mm-text">X-editable</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        {{--</ul>--}}
    </li>

</ul>
<!-- / .navigation -->
