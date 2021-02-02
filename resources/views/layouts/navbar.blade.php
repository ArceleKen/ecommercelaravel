
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M-P</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b> My Project</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    @if (Session::has('username'))

                       <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-circle text-success"></i>{{ Session::get('username')}}</a>
                    -->

                    <a href="{!! url('/logout') !!}" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="hidden-xs">{!! Lang::get('messages.deconnexion')  !!}
                                    <i class="fa fa-sign-out"></i> </span>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>


                    @endif

                    <ul class="dropdown-menu">

                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{!! url('/logout') !!}" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="hidden-xs">{!! Lang::get('messages.deconnexion')  !!}
                                    <i class="fa fa-sign-out"></i> </span>
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>