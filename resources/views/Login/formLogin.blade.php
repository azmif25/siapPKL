
<!DOCTYPE html>
  <!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
  -->
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('lte\plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte\dist/css/adminlte.min.css')}}">
  </head>

  <style media="screen">
  body{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
  }
  </style>

<body class="hold-transition login-page">
<div class="login-box bgbg">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    &nbsp;
    <img src="https://i.pinimg.com/originals/d9/c8/4a/d9c84abcf4b69b73c59b1c28682f47cd.png" width="120px" class="img-fluid mx-auto d-block">
    <div class="card-header text-center">
      <h3><b>Login</b>Pengguna</h3>
    </div>
    <div class="card-body">
      @if (Session::has('message'))
      <div id="alert-msg" class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ Session::get('message') }}
      </div>
      @endif
      @if(session()->has('error'))
          <div class="alert alert-danger">
              {{ session()->get('error') }}
          </div>
      @endif
      <form action="{{url(action('LoginController@postLogin'))}}" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token();  ?>">
        <div class="input-group mb-3">
          <input type="text" name="EmailUsername" class="form-control" placeholder="Email / Username" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-contact"></i>Masuk</button>
          </div>

          &nbsp;
          <!-- /.col -->
          <div class="col-12">
            <a href="{{ URL::to('register')}}" class="btn btn-info btn-block">
                <i class="fa fa-plus"></i>
                &nbsp; Daftar Peserta
            </a>
          </div>
          <!-- /.col -->
        </div>
      </form>

      </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('lte\plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte\plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte\dist/js/adminlte.min.js')}}"></script>
</body>
</html>
