<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ecommerce</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box" style="margin-top: 10%">
    
    <!-- /.login-logo -->
    <div class="" style="margin-top: 10%"></div>
    <div class="login-box-body" style="min-height: 300px; padding-top: 15%">
        <h3 class="login-box-msg" style="color: #2d2d72;"> {!! Lang::get('messages.titrelogin') !!}!</h3>
        @include('adminlte-templates::common.errors')

        <form method="post" action="{{ url('/requestpwd') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('login') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="login" value="{{ old('login') }}" placeholder="Login" id="login" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('login'))
                    <span class="help-block">
                    <strong>{{ $errors->first('login') }}</strong>
                </span>
                @endif
            </div>

           
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{!! Lang::get('messages.login') !!}</button>

            </div>
            
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

<!-- script de login -->
{!! Html::script('js/login/login.js') !!}
</body>
</html>
