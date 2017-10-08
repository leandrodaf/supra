<nav class="navbar navbar-static-top" role="navigation">
    <a href="{{url('/')}}" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <img src="{{url('img/logo.png')}}" alt="logo" />
    </a>
    <!-- Header Navbar: style can be found in header-->
    <!-- Sidebar toggle button-->
    <!-- Sidebar toggle button-->
    <div>
        <a href="javascript:void(0)" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i class="fa fa-fw ti-menu"></i>
        </a>
    </div>
    <div class="navbar-right">
        <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-fw ti-email black"></i>
                    <span class="label label-success">2</span>
                </a>
                <ul class="dropdown-menu dropdown-messages table-striped">
                    <li class="dropdown-title">New Messages</li>
                    <li>
                        <a href="" class="message striped-col">
                            <img class="message-image img-circle" src="{{url('img/authors/avatar7.jpg')}}" alt="avatar-image">
                            <div class="message-body"><strong>Ernest Kerry</strong>
                                <br> Can we Meet?
                                <br>
                                <small>Just Now</small>
                                <span class="label label-success label-mini msg-lable">New</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="message">
                            <img class="message-image img-circle" src="{{url('img/authors/avatar6.jpg')}}" alt="avatar-image">
                            <div class="message-body"><strong>John</strong>
                                <br> Dont forgot to call...
                                <br>
                                <small>5 minutes ago</small>
                                <span class="label label-success label-mini msg-lable">New</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="message striped-col">
                            <img class="message-image img-circle" src="{{url('img/authors/avatar5.jpg')}}" alt="avatar-image">
                            <div class="message-body">
                                <strong>Wilton Zeph</strong>
                                <br> If there is anything else &hellip;
                                <br>
                                <small>14/10/2014 1:31 pm</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="message">
                            <img class="message-image img-circle" src="{{url('img/authors/avatar1.jpg')}}" alt="avatar-image">
                            <div class="message-body">
                                <strong>Jenny Kerry</strong>
                                <br> Let me know when you free
                                <br>
                                <small>5 days ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="message striped-col">
                            <img class="message-image img-circle" src="{{url('img/authors/avatar.jpg')}}" alt="avatar-image">
                            <div class="message-body">
                                <strong>Tony</strong>
                                <br> Let me know when you free
                                <br>
                                <small>5 days ago</small>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-footer"><a href="javascript:void(0)">View All messages</a></li>
                </ul>
            </li>
            <!--rightside toggle-->
            <li>
                <a href="javascript:void(0)" class="dropdown-toggle toggle-right">
                    <i class="fa fa-fw ti-view-list black"></i>
                    <span class="label label-danger">9</span>
                </a>
            </li>
            <!-- User Account: style can be found in dropdown-->
            <li class="dropdown user user-menu">
                <a href="javascript:void(0)" class="dropdown-toggle padding-user" data-toggle="dropdown">
                    <img src="{{url('img/authors/avatar1.jpg')}}" width="35" class="img-circle img-responsive pull-left" height="35" alt="User Image">
                    <div class="riot">
                        <div>
                            Addison
                            <span>
                                        <i class="caret"></i>
                                    </span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{url('img/authors/avatar1.jpg')}}" class="img-circle" alt="User Image">
                        <p> Addison</p>
                    </li>
                    <!-- Menu Body -->
                    <li class="p-t-3">
                        <a href="{{url('user_profile')}}">
                            <i class="fa fa-fw ti-user"></i> My Profile
                        </a>
                    </li>
                    <li role="presentation"></li>
                    <li>
                        <a href="{{url('edit_user')}}">
                            <i class="fa fa-fw ti-settings"></i> Account Settings
                        </a>
                    </li>
                    <li role="presentation" class="divider"></li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{url('lockscreen')}}">
                                <i class="fa fa-fw ti-lock"></i> Lock
                            </a>
                        </div>
                        <div class="pull-right">
                            <a href="{{url('login')}}">
                                <i class="fa fa-fw ti-shift-right"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
