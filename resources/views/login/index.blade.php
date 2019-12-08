<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin DKRTH</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/') }}/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}/vendor/adminlte/vendor/font-awesome/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/') }}/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}/vendor/adminlte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}/vendor/adminlte/vendor/icheck-bootstrap/icheck-bootstrap.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ asset('/') }}/home"><b>DKRTH</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{ asset('/') }}/login" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group has-feedback ">
            <input type="text" name="username" class="form-control" value=""
              placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback ">
            <input type="password" name="password" class="form-control"
              placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">
              Login
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <script src="{{ asset('/') }}/vendor/adminlte/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('/') }}/vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('/') }}/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
  </body>
</html>