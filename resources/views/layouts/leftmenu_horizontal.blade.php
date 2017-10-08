<ul class="navigation slimmenu" id="navigation">
    <li {!! (Request::is( 'index')|| Request::is( '/') || Request::is( 'index2')? 'class="active menu-dropdown"': 'class="menu-dropdown"') !!}>
        <a href="javascript:void(0)">
            <i class="menu-icon ti-check-box"></i>
            <span class="mm-text">Dashboards</span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is( 'index')|| Request::is( '/')? 'class="active"': "") !!}>
                <a href="{{url('/')}}">
                    <i class="menu-icon ti-desktop"></i>
                    <span class="mm-text ">Dashboard 1</span>
                </a>
            </li>
            <li {!! (Request::is( 'index2')? 'class="active"': "") !!}>
                <a href="{{url('index2')}}">
                    <i class="menu-icon ti-layout-list-large-image"></i>
                    <span class="mm-text ">Dashboard 2</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon ti-check-box"></i>
            <span class="mm-text">Elements</span>
        </a>
        <ul>
            <li {!! (Request::is( 'form_elements') || Request::is( 'realtime_form') || Request::is( 'form_validations') || Request::is( 'form_layouts') || Request::is( 'complex_forms')|| Request::is( 'complex_forms2') || Request::is( 'radio_checkboxes') || Request::is( 'form_editors') || Request::is( 'form_wizards') || Request::is( 'dropdowns') || Request::is( 'datepicker') ||Request::is( 'advanceddate_pickers') ||Request::is( 'x-editable') ? 'class="menu-dropdown active"': 'class="menu-dropdown"') !!}>
                <a href="javascript:void(0)">
                    <i class="menu-icon ti-check-box"></i>
                    <span class="mm-text">Forms</span>
                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is( 'form_elements') || Request::is( 'realtime_form') || Request::is( 'form_validations') || Request::is( 'form_layouts') || Request::is( 'complex_forms')|| Request::is( 'complex_forms2') || Request::is( 'radio_checkboxes') ? 'class="active"': 'class=""') !!}>
                        <a href="javascript:void(0)">
                            <i class="fa fa-fw ti-receipt"></i><span class="mm-text"> Features</span>
                        </a>
                        <ul class="sub-menu form-submenu">
                            <li {!! (Request::is( 'form_elements')? 'class="active"': "") !!}>
                                <a href="{{url('form_elements')}}"><i class="fa fa-fw ti-cup"></i><span class="mm-text"> Form Elements</span>
                                    </a>
                            </li>
                            <li {!! (Request::is( 'realtime_form')? 'class="active"': "") !!}>
                                <a href="{{url('realtime_form')}}"><i class="fa fa-fw ti-write"></i><span class="mm-text"> Realtime Forms</span></a>
                            </li>
                            <li {!! (Request::is( 'form_validations')? 'class="active"': "") !!}>
                                <a href="{{url('form_validations')}}">
                                    <i class="fa fa-fw ti-alert"></i><span class="mm-text"> Form Validations</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'form_layouts')? 'class="active"': "") !!}>
                                <a href="{{url('form_layouts')}}">
                                    <i class="fa fa-fw ti-layout-width-default"></i><span class="mm-text"> Form Layouts</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'complex_forms')? 'class="active"': "") !!}>
                                <a href="{{url('complex_forms')}}">
                                    <i class="fa fa-fw ti-layout-cta-left"></i><span class="mm-text"> Complex Forms</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'complex_forms2')? 'class="active"': "") !!}>
                                <a href="{{url('complex_forms2')}}">
                                    <i class="fa fa-fw ti-layout-cta-center"></i><span class="mm-text"> Complex Forms 2</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'radio_checkboxes')? 'class="active"': "") !!}>
                                <a href="{{url('radio_checkboxes')}}">
                                    <i class="fa fa-fw ti-check-box"></i> <span class="mm-text">Radio and Checkbox</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li {!! (Request::is( 'form_editors') || Request::is( 'form_wizards') || Request::is( 'dropdowns') || Request::is( 'datepicker') || Request::is( 'advanceddate_pickers') ||Request::is( 'x-editable')? 'class="active"': 'class=""') !!}>
                        <a href="javascript:void(0)">
                            <i class="fa fa-fw ti-clipboard"></i><span class="mm-text"> Components</span>
                        </a>
                        <ul class="sub-menu form-submenu">
                            <li {!! (Request::is( 'form_editors')? 'class="active"': "") !!}>
                                <a href="{{url('form_editors')}}">
                                    <i class="fa fa-fw ti-pencil"></i> <span class="mm-text">Form Editors</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'form_wizards')? 'class="active"': "") !!}>
                                <a href="{{url('form_wizards')}}">
                                    <i class="fa fa-fw ti-settings"></i><span class="mm-text"> Form Wizards</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'dropdowns')? 'class="active"': "") !!}>
                                <a href="{{url('dropdowns')}}">
                                    <i class="fa fa-fw ti-widget-alt"></i> <span class="mm-text">Drop Downs</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'datepicker')? 'class="active"': "") !!}>
                                <a href="{{url('datepicker')}}">
                                    <i class="fa fa-fw ti-calendar"></i><span class="mm-text"> Date pickers</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'advanceddate_pickers')? 'class="active"': "") !!}>
                                <a href="{{url('advanceddate_pickers')}}">
                                    <i class="fa fa-fw ti-notepad"></i> <span class="mm-text">Advanced Date pickers</span>
                                </a>
                            </li>
                            <li {!! (Request::is( 'x-editable')? 'class="active"': "") !!}>
                                <a href="{{url('x-editable')}}">
                                    <i class="fa fa-fw ti-slice"></i> <span class="mm-text">X-editable</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is( 'general_components') || Request::is( 'buttons') || Request::is( 'tabs_accordions')|| Request::is( 'fonticons') || Request::is( 'advanced_modals') || Request::is( 'timeline') || Request::is( 'notifications')? 'class="menu-dropdown active"': 'class="menu-dropdown"') !!}>
                <a href="javascript:void(0)">
                    <i class="menu-icon ti-desktop"></i>
                    <span class="mm-text">UI Features</span>
                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is( 'general_components')? 'class="active"': "") !!}>
                        <a href="{{url('general_components')}}">
                            <i class="fa fa-fw ti-plug"></i><span class="mm-text"> General Components</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'buttons')? 'class="active"': "") !!}>
                        <a href="{{url('buttons')}}">
                            <i class="fa fa-fw ti-layout-placeholder"></i> <span class="mm-text">Buttons</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'tabs_accordions')? 'class="active"': "") !!}>
                        <a href="{{url('tabs_accordions')}}">
                            <i class="fa fa-fw ti-layers"></i><span class="mm-text"> Tabs &amp; Accordions</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'fonticons')? 'class="active"': "") !!}>
                        <a href="{{url('fonticons')}}">
                            <i class="fa fa-fw ti-ink-pen"></i><span class="mm-text"> Font Icons</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'advanced_modals')? 'class="active"': "") !!}>
                        <a href="{{url('advanced_modals')}}">
                            <i class="fa fa-fw ti-brush-alt"></i><span class="mm-text"> Advanced Modals</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'timeline')? 'class="active"': "") !!}>
                        <a href="{{url('timeline')}}">
                            <i class="fa fa-fw ti-time"></i><span class="mm-text"> Timeline</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'notifications')? 'class="active"': "") !!}>
                        <a href="{{url('notifications')}}">
                            <i class="fa fa-fw ti-flag-alt"></i><span class="mm-text"> Notifications</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is( 'pickers') || Request::is( 'grid_layout') || Request::is( 'tags_input') || Request::is( 'nestable_list') || Request::is( 'sweet_alert') || Request::is( 'toastr_notifications') || Request::is( 'draggable_portlets')||Request::is( 'transitions')? 'class="active menu-dropdown"': 'class="menu-dropdown"') !!}>
                <a href="javascript:void(0)">
                    <i class="menu-icon ti-briefcase"></i>
                    <span class="mm-text">UI Components</span>
                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is( 'pickers')? 'class="active"': "") !!}>
                        <a href="{{url('pickers')}}">
                            <i class="fa fa-fw ti-brush"></i><span class="mm-text"> Pickers</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'grid_layout')? 'class="active"': "") !!}>
                        <a href="{{url('grid_layout')}}">
                            <i class="fa fa-fw ti-layout-grid2"></i><span class="mm-text"> Grid Layout</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'tags_input')? 'class="active"': "") !!}>
                        <a href="{{url('tags_input')}}">
                            <i class="fa fa-fw ti-tag"></i><span class="mm-text"> Tags Input</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'nestable_list')? 'class="active"': "") !!}>
                        <a href="{{url('nestable_list')}}">
                            <i class="fa fa-fw ti-view-list"></i><span class="mm-text"> Nestable List</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'sweet_alert')? 'class="active"': "") !!}>
                        <a href="{{url('sweet_alert')}}">
                            <i class="fa fa-fw ti-bell"></i><span class="mm-text"> Sweet Alert</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'toastr_notifications')? 'class="active"': "") !!}>
                        <a href="{{url('toastr_notifications')}}">
                            <i class="fa fa-fw ti-tablet"></i><span class="mm-text"> Toastr Notifications</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'draggable_portlets')? 'class="active"': "") !!}>
                        <a href="{{url('draggable_portlets')}}">
                            <i class="fa fa-fw ti-control-shuffle"></i> <span class="mm-text">Draggable Portlets</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'transitions')? 'class="active"': "") !!}>
                        <a href="{{url('transitions')}}"> <i class="fa fa-fw ti-star"></i><span class="mm-text"> Transitions </span></a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is( 'widgets')||Request::is( 'widgets1')? 'class="active menu-dropdown"': 'class="menu-dropdown"') !!}>
                <a href="javascript:void(0)">
                    <i class="menu-icon ti-widget"></i>
                    <span class="mm-text">Widgets</span>
                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is( 'widgets')? 'class="active"': "") !!}>
                        <a href="{{url('widgets')}}">
                            <i class=" menu-icon fa fa-fw ti-widgetized"></i> <span class="mm-text">Widgets 1</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'widgets1')? 'class="active"': "") !!}>
                        <a href="{{url('widgets1')}}">
                            <i class=" menu-icon fa fa-fw ti-widget-alt"></i> <span class="mm-text">Widgets 2</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon ti-check-box"></i>
            <span class="mm-text">Components</span>
        </a>
        <ul>
            <li {!! (Request::is( 'simple_tables') ||Request::is( 'datatables') || Request::is( 'advanced_datatables') || Request::is( 'responsive_datatables') || Request::is( 'bootstrap_tables') ? 'class="active menu-dropdown"': 'class="menu-dropdown"') !!}>
                <a href="javascript:void(0)">
                    <i class="menu-icon ti-layout-grid4"></i>
                    <span class="mm-text">DataTables</span>
                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is( 'simple_tables')? 'class="active"': "") !!}>
                        <a href="{{url('simple_tables')}}">
                            <i class="fa fa-fw ti-layout"></i><span class="mm-text"> Simple tables</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'datatables')? 'class="active"': "") !!}>
                        <a href="{{url('datatables')}}">
                            <i class="fa fa-fw ti-server"></i><span class="mm-text"> Data Tables</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'advanced_datatables')? 'class="active"': "") !!}>
                        <a href="{{url('advanced_datatables')}}">
                            <i class="fa fa-fw ti-layout-grid3"></i><span class="mm-text"> Advanced Tables</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'responsive_datatables')? 'class="active"': "") !!}>
                        <a href="{{url('responsive_datatables')}}">
                            <i class="fa fa-fw ti-layout-accordion-merged"></i><span class="mm-text"> Responsive DataTables</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'bootstrap_tables')? 'class="active"': "") !!}>
                        <a href="{{url('bootstrap_tables')}}">
                            <i class="fa fa-fw ti-layout-grid2"></i> <span class="mm-text">Bootstrap Tables</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is( 'flot_charts') || Request::is( 'nvd3_charts') || Request::is( 'circle_sliders') ||Request::is( 'chartjs_charts') ||Request::is( 'dimple_charts') ||Request::is( 'amcharts') || Request::is( 'chartist') ? 'class="active menu-dropdown"': 'class="menu-dropdown"') !!}>
                <a href="javascript:void(0)">
                    <i class="menu-icon ti-bar-chart"></i>
                    <span class="mm-text">Charts</span>
                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is( 'flot_charts')? 'class="active"': "") !!}>
                        <a href="{{url('flot_charts')}}">
                            <i class="fa fa-fw ti-bar-chart-alt"></i><span class="mm-text"> Flot Charts</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'nvd3_charts')? 'class="active"': "") !!}>
                        <a href="{{url('nvd3_charts')}}">
                            <i class="fa fa-fw ti-stats-up"></i><span class="mm-text"> NVD3 Charts</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'circle_sliders')? 'class="active"': "") !!}>
                        <a href="{{url('circle_sliders')}}">
                            <i class="fa fa-fw ti-basketball"></i><span class="mm-text"> Circle Sliders</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'chartjs_charts')? 'class="active"': "") !!}>
                        <a href="{{url('chartjs_charts')}}">
                            <i class="fa fa-fw ti-pie-chart"></i><span class="mm-text"> Chartjs Charts</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'dimple_charts')? 'class="active"': "") !!}>
                        <a href="{{url('dimple_charts')}}">
                            <i class="fa fa-fw ti-save-alt"></i><span class="mm-text"> Dimple Charts</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'amcharts')? 'class="active"': "") !!}>
                        <a href="{{url('amcharts')}}">
                            <i class="fa fa-fw ti-stats-up"></i><span class="mm-text"> Amcharts</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'chartist')? 'class="active"': "") !!}>
                        <a href="{{url('chartist')}}">
                            <i class="fa fa-fw ti-bar-chart"></i><span class="mm-text"> Chartist Charts</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is( 'calendar') || Request::is( 'calendar2')? 'class="active menu-dropdown"': 'class="menu-dropdown"') !!}>
                <a href="javascript:void(0)">
                    <i class="menu-icon ti-calendar"></i>
                    <span class="mm-text">Calendar</span>
                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is( 'calendar')? 'class="active"': "") !!}>
                        <a href="{{url('calendar')}}">
                            <i class=" menu-icon fa fa-fw ti-video-clapper"></i>
                            <span class="mm-text">Calendar</span>
                            <small class="badge">7</small>
                        </a>
                    </li>
                    <li {!! (Request::is( 'calendar2')? 'class="active"': "") !!}>
                        <a href="{{url('calendar2')}}">
                            <i class=" menu-icon fa fa-fw ti-calendar"></i>
                            <span class="mm-text">Advanced Calendar</span>
                            <small class="badge">6</small>
                        </a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is( 'masonry_gallery') || Request::is( 'multiplefile_upload') || Request::is( 'dropify') || Request::is( 'image_hover') || Request::is( 'image_filter') || Request::is( 'image_magnifier') ? 'class="active menu-dropdown"': 'class="menu-dropdown"') !!}>
                <a href="javascript:void(0)">
                    <i class="menu-icon ti-gallery"></i>
                    <span class="mm-text">Gallery</span>
                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is( 'masonry_gallery')? 'class="active"': "") !!}>
                        <a href="{{url('masonry_gallery')}}">
                            <i class="fa fa-fw ti-gallery"></i><span class="mm-text"> Masonry Gallery</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'multiplefile_upload')? 'class="active"': "") !!}>
                        <a href="{{url('multiplefile_upload')}}">
                            <i class="fa fa-fw ti-upload"></i><span class="mm-text"> Multiple File Upload</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'dropify')? 'class="active"': "") !!}>
                        <a href="{{url('dropify')}}">
                            <i class="fa fa-fw ti-dropbox"></i><span class="mm-text"> Dropify</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'image_hover')? 'class="active"': "") !!}>
                        <a href="{{url('image_hover')}}">
                            <i class="fa fa-fw ti-image"></i><span class="mm-text"> Image Hover</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'image_filter')? 'class="active"': "") !!}>
                        <a href="{{url('image_filter')}}">
                            <i class="fa fa-fw ti-filter"></i><span class="mm-text"> Image Filter</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'image_magnifier')? 'class="active"': "") !!}>
                        <a href="{{url('image_magnifier')}}">
                            <i class="fa fa-fw ti-zoom-in"></i><span class="mm-text"> Image Magnifier</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is( 'google_maps') || Request::is( 'vector_maps') || Request::is( 'advanced_maps') ? 'class="active menu-dropdown "': 'class="menu-dropdown "') !!}>
                <a href="javascript:void(0) ">
                    <i class="menu-icon ti-location-pin "></i>
                    <span class="mm-text ">Maps</span>
                </a>
                <ul class="sub-menu ">
                    <li {!! (Request::is( 'google_maps')? 'class="active "': " ") !!}>
                        <a href="{{url( 'google_maps')}} ">
                            <i class="fa fa-fw ti-world "></i><span class="mm-text "> Google Maps</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'vector_maps')? 'class="active "': " ") !!}>
                        <a href="{{url( 'vector_maps')}} ">
                            <i class="fa fa-fw ti-map "></i><span class="mm-text "> Vector Maps</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'advanced_maps')? 'class="active "': " ") !!}>
                        <a href="{{url( 'advanced_maps')}} ">
                            <i class="fa fa-fw ti-map-alt "></i><span class="mm-text "> Advanced Maps</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon ti-gallery"></i>
            <span class="mm-text">Pages</span>
        </a>
        <ul>
            <li {!! (Request::is( 'login') || Request::is( 'lockscreen') || Request::is( 'forgot_password') || Request::is( 'register') || Request::is( 'reset_password') ? 'class="menu-dropdown active "': 'class="menu-dropdown "') !!}>
                <a href="javascript:void(0) ">
                    <i class="menu-icon ti-files "></i>
                    <span class="mm-text ">Pages</span>
                </a>
                <ul class="sub-menu ">
                    <li {!! (Request::is( 'login')? 'class="active "': " ") !!}>
                        <a href="{{url( 'login')}} ">
                            <i class="fa fa-fw ti-shift-right "></i><span class="mm-text "> Login</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'register')? 'class="active "': " ") !!}>
                        <a href="{{url( 'register')}} ">
                            <i class="fa fa-fw ti-check-box "></i><span class="mm-text "> Register</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'forgot_password')? 'class="active "': " ") !!}>
                        <a href="{{url( 'forgot_password')}} ">
                            <i class="fa fa-fw ti-help "></i><span class="mm-text "> Forgot Password</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'reset_password') ? 'class="active "': " ") !!}>
                        <a href="{{url( 'reset_password')}} ">
                            <i class="fa fa-fw ti-key "></i><span class="mm-text "> Reset Password</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'lockscreen')? 'class="active "': " ") !!}>
                        <a href="{{url( 'lockscreen')}} ">
                            <i class="fa fa-fw ti-lock "></i><span class="mm-text "> Lockscreen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is( '404') || Request::is( '500') || Request::is( 'blank') || Request::is( 'invoice') ||Request::is( 'session_timeout') || Request::is( 'pricing_table') ? 'class="menu-dropdown active "': 'class="menu-dropdown "') !!}>
                <a href="javascript:void(0) ">
                    <i class="menu-icon ti-face-smile "></i>
                    <span class="mm-text ">Extra Pages</span>
                </a>
                <ul class="sub-menu ">
                    <li {!! (Request::is( 'blank')? 'class="active "': " ") !!}>
                        <a href="{{url( 'blank')}} ">
                            <i class="fa fa-fw ti-file "></i><span class="mm-text "> Blank</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'invoice')? 'class="active "': " ") !!}>
                        <a href="{{url( 'invoice')}} ">
                            <i class="fa fa-fw ti-layout-cta-left "></i> <span class="mm-text ">Invoice</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'session_timeout')? 'class="active "': " ") !!}>
                        <a href="{{url( 'session_timeout')}} ">
                            <i class="fa fa-fw ti-time "></i><span class="mm-text "> Session Timeout</span>
                        </a>
                    </li>
                    <li {!! (Request::is( 'pricing_table')? 'class="active "': " ") !!}>
                        <a href="{{url( 'pricing_table')}} ">
                            <i class="fa fa-fw ti-time "></i><span class="mm-text "> Pricing</span>
                        </a>
                    </li>
                    <li {!! (Request::is( '404')? 'class="active "': " ") !!}>
                        <a href="{{url( '404')}} ">
                            <i class="fa fa-fw ti-unlink "></i><span class="mm-text "> 404 Error</span>
                        </a>
                    </li>
                    <li {!! (Request::is( '500')? 'class="active "': " ") !!}>
                        <a href="{{url( '500')}} ">
                            <i class="fa fa-fw ti-face-sad "></i><span class="mm-text "> 500 Error</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li {!! (Request::is( 'menubarfold') || Request::is( 'horizontal_menu') || Request::is( 'boxed_movable_header') |Request::is( 'movable_header') || Request::is( 'boxed_fixed_header') || Request::is( 'layout_fixed') |Request::is( 'mini_sidebar') ? 'class="active menu-dropdown "': 'class="menu-dropdown "') !!}>
        <a href="javascript:void(0) ">
            <i class="menu-icon ti-layout-grid3 "></i>
            <span class="mm-text ">Layouts</span>
            <span class="fa arrow "></span>
        </a>
        <ul class="sub-menu ">
            <li {!! (Request::is( 'menubarfold')? 'class="active "': " ") !!}>
                <a href="{{url( 'menubarfold')}} ">
                    <i class="fa fa-fw ti-layout-menu-v "></i><span class="mm-text "> Menubar Fold</span>
                </a>
            </li>
            <li {!! (Request::is( 'horizontal_menu')? 'class="active "': " ") !!}>
                <a href="{{url( 'horizontal_menu')}} ">
                    <i class="fa fa-fw ti-layout-menu-full "></i><span class="mm-text "> Horizontal Menu</span>
                </a>
            </li>
            <li {!! (Request::is( 'mini_sidebar')? 'class="active "': " ") !!}>
                <a href="{{url('mini_sidebar')}}">
                    <i class="fa fa-fw ti-control-backward "></i><span class="mm-text "> Mini Sidebar</span>
                </a>
            </li>
            <li {!! (Request::is( 'boxed_movable_header')? 'class="active "': " ") !!}>
                <a href="{{url( 'boxed_movable_header')}} ">
                    <i class="fa fa-fw ti-layout-grid2 "></i><span class="mm-text "> Boxed &amp; Movable Header</span>
                </a>
            </li>
            <li {!! (Request::is( 'movable_header')? 'class="active "': " ") !!}>
                <a href="{{url( 'movable_header')}} ">
                    <i class="fa fa-fw ti-view-list-alt "></i><span class="mm-text "> Movable Header</span>
                </a>
            </li>
            <li {!! (Request::is( 'boxed_fixed_header')? 'class="active "': " ") !!}>
                <a href="{{url( 'boxed_fixed_header')}} ">
                    <i class="fa fa-fw ti-view-list "></i><span class="mm-text "> Boxed &amp; Fixed Header</span>
                </a>
            </li>
            <li {!! (Request::is( 'layout_fixed')? 'class="active "': " ") !!}>
                <a href="{{url( 'layout_fixed')}} ">
                    <i class="fa fa-fw ti-layout-column2 "></i><span class="mm-text "> Fixed Header &amp; Menu</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
<!-- / .navigation -->
