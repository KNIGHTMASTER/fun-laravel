<header class="main-header">
    <!-- Logo -->
    <a class="logo" href={!! URL::to('/dashboard') !!}>
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>F</b>L</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{--{!! HTML::image('img/app/ic-pmi-30x30.png') !!}--}} Fun Laravel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav role="navigation" class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a role="button" data-toggle="offcanvas" class="sidebar-toggle" href="#">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <div class="fa fa-user"></div>
                        <span class="hidden-xs">{{$userName}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <a class="btn btn-flat" href="{{URL::to('/auth/logout')}}">Sign out</a>
                        </li>                     
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a data-toggle="control-sidebar" href="#"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>