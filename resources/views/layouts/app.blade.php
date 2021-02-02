<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title', 'My Project')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="{!! asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! asset('bower_components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{!! asset('bower_components/Ionicons/css/ionicons.min.css') !!}" rel="stylesheet">
    <!-- Theme style -->
    <link href="{!! asset('dist/css/AdminLTE.min.css') !!}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{!! asset('dist/css/skins/_all-skins.min.css') !!}" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css') !!}" rel="stylesheet">
    <link href="{!! asset('bower_components/bootstrap-timepicker/css/timepicker.less') !!}" rel="stylesheet">
    <!-- datetime picker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Date Picker -->
    <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css') !!}" rel="stylesheet">
    <!-- select2 -->
    <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css') !!}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css') !!}" rel="stylesheet">
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.css') !!}" rel="stylesheet">

    <link href="{!! asset('dist/css/style.css') !!}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{!! asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}"></script>
    <![endif]-->

    <!-- Google Font -->
    <link href="{!! asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') !!}"
          rel="stylesheet">
    <!-- style css pour map google localization -->
    <style>
           /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Header Navbar: style can be found in header.less -->
    @include('layouts.navbar')

    @include('layouts.sidebar')

    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @yield('content')

        {{--
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


        </section>
        --}}
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright © 2021<a href="http://www.worldvoicegroup.com" target="_blank" class="wv"> My Project</a></strong> Tous droits reserv&eacute;s.

    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<script type="text/javascript" src="{!! asset('js/app.min.js') !!}"></script>
<!-- jQuery 3 -->

<!--<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js') !!}"></script>
-->

<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js') !!}"></script>



<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js') !!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" src="{!! asset('https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- DataTables -->
<script type="text/javascript" src="{!! asset('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js') !!}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js') !!}"></script>

<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js') !!}">
</script>
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js') !!}">
</script>


<!-- datepicker -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js') !!}"></script>

<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.full.min.js') !!}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js') !!}"></script>
<!-- datepicker -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js') !!}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.all.min.js') !!}"></script>
<!-- Slimscroll -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/js/adminlte.min.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script type="text/javascript" src="{!! asset('dist/js/pages/dashboard.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{!! asset('dist/js/demo.js') !!}"></script>
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


        $('.example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "order": [[ 0, 'desc' ]]

        });

        $(".select2").select2();


        $('#datepicker').datepicker({
            autoclose: true,
            //dateFormat: "yy-mm-dd",
            format: 'yyyy-mm-dd',
            autocomplete: 'false'
        });
        $('#datepicker').datepicker('setDate', 'today');


        $('#datepicker1').datepicker({
            autoclose: true,
            //dateFormat: "yy-mm-dd"
             format: 'yyyy-mm-dd'
        });

        $("#timepicker1").timepicker(
        {
        timeFormat: "h:mm:ss p",
        autoclose: true

         }
         );


        $('.datetimepicker2').datetimepicker(
                {
                    //format: "yyyy-mm-dd hh:mm:ss",
                    //autoclose: true,
                    //format:'Y-m-d  H:i',
                    //inline:true,
                    // lang:'fr'
                }
        );

      /* $('#datetimepicker').datetimepicker(
                {
                    //format: "yyyy-mm-dd hh:mm:ss",
                    //autoclose: true,
                    format:'Y-m-d  H:i:s',
                    //startDate:'+1971/05/01',
                    showSecond: true,
                       showMillisec: true,
                       timeFormat: 'hh:mm:ss:l'
                    //inline:true,
                    // lang:'fr'
                }
        );
        */

        $('#datetimepicker').datetimepicker(
                {
                    format: 'Y-MM-DD HH:mm:ss'
                    //format:'Y-m-d  h:m:s',
                   //showSecond: true,
                  // showMinute: true,
                   //showHour: true,
                  // useSeconds: true,
                   //useMinutes: true,
                   //timeFormat: 'HH:mm:ss',
                }
        );

        $('#datetimepicker12').datetimepicker(
                {
                    format: 'Y-MM-DD HH:mm:ss'
                    //format:'Y-m-d  h:m:s',
                   //showSecond: true,
                  // showMinute: true,
                   //showHour: true,
                  // useSeconds: true,
                   //useMinutes: true,
                   //timeFormat: 'HH:mm:ss',
                }
        );

    })



</script>

<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL-3Vqf4UCkRFiYZ0wLJ3qRGT9WBiYbns&callback=initMap">
</script>

</body>
</html>
