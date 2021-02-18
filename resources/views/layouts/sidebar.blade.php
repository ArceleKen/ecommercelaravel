<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! asset('dist/img/user.jpg')!!}" class="img-circle" alt="User Image">
                {{--<img src="dist/img/user.jpg" class="img-circle" alt="User Image">--}}
            </div>
            <div class="pull-left info">
                <p>
                    @if (Session::has('email'))
                    {{ Session::get('email')}}
                    @endif
                </p>
                <p><i class="fa fa-circle text-success"></i> Online</p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

            @if(auth()->check())

            @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('gestion_compte'))
            <li class="treeview user user-menu">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Gestion des comptes</span>
                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>

                <ul class="treeview-menu" style="width: auto">
                    @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('lister_user'))
                    <li>
                        <a class="" rel="alternate" href="{!! url('/users') !!}">
                            <i class="fa fa-user"></i> <span>Utilisateurs</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('lister_role'))
                    <li>
                        <a class="" rel="alternate" href="{!! url('/roles') !!}">
                            <i class="fa fa-cogs"></i> <span>R&ocirc;les</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('lister_permissions'))
                    <li>
                        <a class="" rel="alternate" href="{!! url('/permissions') !!}">
                            <i class="fa fa-lock"></i> <span>Permissions</span>
                        </a>
                    </li>
                    @endif

                    @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('recherche_log'))
                    <li>
                        <a class="" rel="alternate" href="{!! url('/logs') !!}">
                            <i class="fa fa-file-text"></i> <span>Logs</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            <li class="">
                <a href="{!! url('/commandslist') !!}">
                    <i class="fa fa-file-text"></i> <span>Les commmandes</span>
                </a>
            </li>
            
            @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>