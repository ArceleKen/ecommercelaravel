<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>digiReport</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{Html::style('/dist/css/style.css')}}
            <!-- Bootstrap 3.3.7 -->
    {{Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css')}}
            <!-- Font Awesome -->
    {{Html::style('/bower_components/font-awesome/css/font-awesome.min.css')}}
    {{Html::style('/bower_components/datetimepicker/jquery.datetimepicker.css')}}
    {{--{{Html::style('/bower_components/datetimepicker/jquery.datetimepicker.min.css')}}--}}

    {{Html::style('/plugins/datatables/dataTables.bootstrap.css')}}
    {{Html::style('/plugins/datatables/dataTables.bootstrap.css')}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.css') }}">--}}
            <!-- daterangepicker -->
    <!-- Ionicons -->
    {{Html::style('bower_components/Ionicons/css/ionicons.min.css')}}
            <!-- Theme style -->
    {{Html::style('/dist/css/AdminLTE.min.css')}}
            <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {{Html::style('/dist/css/skins/_all-skins.min.css')}}
            <!-- Morris chart -->
    {{Html::style('bower_components/morris.js/morris.css')}}
            <!-- jvectormap -->
    {{Html::style('bower_components/jvectormap/jquery-jvectormap.css')}}
            <!-- Date Picker -->
    {{Html::style('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}
    {{Html::style('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}
            <!-- Daterange picker -->

    {{Html::style('plugins/select2/select2.css')}}

            <!-- DataTables -->
    {{Html::style('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}
    {{Html::style('/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}
            <!-- bootstrap wysiHtml5 - text editor -->
    {{Html::style('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}

            <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{Html::script('https://oss.maxcdn.com/Html5shiv/3.7.3/Html5shiv.min.js')}}
    {{Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}
    <![endif]-->

    <!-- Google Font -->
    {{Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}

    {{Html::style('css/classes.css')}}
    {{Html::style('/plugins/jstree/dist/themes/default/style.css')}}



    @yield('css')
    {{Html::style('css/style.css')}}
    <style>
        .skin-blue .main-header .navbar {
            /*background-color: #2d2d72;*/
        }

        a {
            color: #2d2d72;
        }

        .thumbnail {
            border-radius: 2px;
            padding: 20px;
            margin-bottom: 50px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        a.thumbnail {
            background-color: #fcfcfc;
        }

        .small-box h4 {
            font-size: 20px;
            font-weight: bold;
            margin: 0 0 10px 0;
            white-space: nowrap;
            padding: 0;
        }

        section.content {
            margin-top: 30px;
        }

        .btn-style {
            float: right;
            margin-top: 8px;
            height: 39px;
        }

        .btn-style2 {
            margin-top: 8px;
            height: 39px;
        }

        .btn-annuler {
            height: 41px;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
@if (Session::has('username')) <!-- tester si le user est connecté, actuellement mode non connecté pour tester le template -->
<div class="wrapper">
    <!-- Main Header -->
    @include('layouts.navbar')

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Copyright © 2017 <a
                    href="http://www.worldvoicegroup.com" target="_blank" class="wv">WORLD VOICE GROUP</a></strong> All rights reserved.
    </footer>

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
                    digiPOS
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

                    @include('adminlte-templates::common.errors')
                    <div class="clearfix"></div>

                    @include('flash::message')

                    <div class="row" style="min-height: 835px">
                        <!-- Main content -->
                        <section class="content">
                            <!-- Your Page Content Here -->
                            <h3 style="text-align: center">Vous ne pouvez acc&eacute;der &agrave; cette page.</h3><br>
                            <h4 style="text-align: center">Merci de cliquer <a style="font-weight:bold" href="{{ url('/home') }}">ICI</a> pour rejoindre la page d'accueil !</h4>
                        </section>
                        <!-- /.content -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif

            <!-- jQuery 3 -->
    {{Html::script('bower_components/jquery/dist/jquery.min.js')}}
            <!-- jQuery UI 1.11.4 -->
    {{Html::script('bower_components/jquery-ui/jquery-ui.min.js')}}
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- Bootstrap 3.3.7 -->
    {{Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js')}}
            <!-- DataTables -->
    {{Html::script('bower_components/datatables.net/js/jquery.dataTables.min.js')}}
    {{Html::script('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}
    {{Html::script('bower_components/datatables.net-bs/js/dataTables.bootstrap.js')}}
            <!-- daterangepicker -->
    {{Html::script('bower_components/moment/min/moment.min.js')}}
    {{Html::script('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}
    {{Html::script('bower_components/datetimepicker/jquery.datetimepicker.full.min.js')}}

            <!-- datepicker -->

    {{Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}
    {{Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}

    {{Html::script('bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js')}}


    {{Html::script('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}

    {{Html::script('plugins/select2/select2.full.min.js')}}
    {{Html::script('plugins/select2/select2.js')}}
            <!-- Morris.js charts -->
    {{--Html::script('bower_components/raphael/raphael.min.js')}}
    {{Html::script('bower_components/morris.js/morris.min.js')}}
    <!-- Sparkline -->
    {{Html::script('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}
    <!-- jvectormap -->
    {{Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}
    {{Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}
    <!-- jQuery Knob Chart -->
    {{Html::script('bower_components/jquery-knob/dist/jquery.knob.min.js')}}

    {{Html::script('bower_components/jquery-knob/dist/jquery.knob.min.js')}}--}}
    <!-- daterangepicker -->
    {{--Html::script('bower_components/moment/min/moment.min.js'--)}}
    {{--Html::script('bower_components/bootstrap-daterangepicker/daterangepicker.js')--}}
    <!-- datepicker -->
    {{--Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')--}}
    <!-- DataTables -->
    {{--Html::script('bower_components/datatables.net/js/jquery.dataTables.min.js')}}
    {{Html::script('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')--}}
    <!-- Bootstrap WYSIHtml5 -->
    {{Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}
            <!-- Slimscroll -->
    {{Html::script('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}
            <!-- FastClick -->
    {{Html::script('/bower_components/fastclick/lib/fastclick.js')}}
            <!-- AdminLTE App -->
    {{Html::script('/dist/js/adminlte.min.js')}}
    {{Html::script('dist/js/adminlte.min.js')}}
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{Html::script('dist/js/pages/dashboard.js')}}
            <!-- AdminLTE for demo purposes -->
    {{Html::script('dist/js/demo.js')}}

    {{Html::script('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')}}

    {{--<script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('assets/js/locales/bootstrap-datetimepicker.fr.js') }}"></script>--}}

    <script>
        $(function () {
            $('.example').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });

            $(".select2").select2();

            $('#datepicker').datepicker({
                autoclose: true,
                dateFormat: "yy-mm-dd hh:mm:ss"
            });
            $('#datepicker1').datepicker({
                autoclose: true,
                dateFormat: "yy-mm-dd hh:mm:ss"
            });

            //$( ".timepicker" ).timepicker({ timeFormat: "hh:mm:ss", autoclose: true });


            $('.datetimepicker').datetimepicker(
                    {
                        //format: "yyyy-mm-dd hh:mm:ss",
                        //autoclose: true,
                        //format:'Y-m-d  H:i',
                        //inline:true,
                        // lang:'fr'
                    }
            );

            $('#datetimepicker').datetimepicker(
                    {
                        //format: "yyyy-mm-dd hh:mm:ss",
                        //autoclose: true,
                        format:'Y-m-d  H:i',
                        startDate:'+1971/05/01'
                        //inline:true,
                        // lang:'fr'
                    }
            );

        })
    </script>

    {{Html::script('js/selectRadioBtn.js')}}
    {{Html::script('plugins/jstree/dist/jstree.min.js')}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.all.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    {{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
    </script>--}}

    <!-- historique -->
    <script>
        window.baseURL = "{{url('/')}}";
        window._token = "{{csrf_token()}}";

        function historique(type) {
            var data = {};
            var url = '{!! URL::to('historique-session') !!}';
            data._token = '{!! csrf_token() !!}';
            data.data = localStorage.getItem(type);
            $.ajax({
                type: "POST",
                data: data,
                url: url
                , success: function (retour) {
                    window.location.href = '{!! URL::to('historique') !!}' + '/' + type
                }
                , error: function (resultat, statut, erreur) {
                    console.log('erreur :  ' + erreur)
                }
            });
        }

    </script>

    <!-- fin historique -->

    @yield('scripts')
</body>
</html>