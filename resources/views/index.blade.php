<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $data['app_name'] }} | {{ $data['title'] }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->

  <div>
    @if (session('info'))
			<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
        {{ session('info') }}
      </div>
		@endif

    @if (session('alert'))
			<div class="alert alert-warning alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
       {{ session('alert') }}
      </div>
		@endif  

    @if (session('danger'))
			<div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
       {{ session('danger') }}
      </div>
		@endif 
    
    @if (session('success'))
			<div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
       {{ session('success') }}
      </div>
		@endif 
  </div>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('login') }}" class="h1"><b>CMS Laravel</b>&nbsp;V1</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="{{ route('process.login') }}" method="post">
        <div class="input-group mb-3">
          <input type="username" name="username" id="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">&nbsp;</div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
