<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('lte/plugins/iCheck/square/blue.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>LOGIN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="border-radius: 10%;">
    <div class="card-body login-card-body">
      <p class="login-box-msg">
        Sign in to start your session
        <br>
        <span style="color: green;font-weight: bold;">
        @if(session('success'))
        {{session('success')}}
        @endif
        </span>
        <br>
        <span style="color: red;">
         @if(session('salah'))
          {{session('salah')}}
        @endif
        </span>
      </p>

      <form action="{{route('ceklogin')}}" method="post">
        @csrf
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <!-- <span class="fa fa-envelope form-control-feedback"></span> -->
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <!-- <span class="fa fa-lock form-control-feedback"></span> -->
        </div>
      <div class="social-auth-links text-center mb-3">
        <button type="submit" class="btn btn-block btn-primary">
          <i class="fa fa-sign-in mr-2"></i> Sign in Your Session
        </button>
        <a href="register/" class="btn btn-block btn-warning">
          <i class="fa fa-edit mr-2"></i> Sign up Your Email
        </a>
      </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('lte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
