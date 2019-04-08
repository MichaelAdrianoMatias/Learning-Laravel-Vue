@extends('layouts.master')

<style type="text/css">
  .invalid-feedback {
    color: #e3342f !important;
   }
</style>
@section('body')
<body class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href=""><b>CMMS</b>V2</a>
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Request Account</p>
            <form method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
                @if(session()->has('login_error'))
                  <div class="alert alert-success">
                    {{ session()->get('login_error') }}
                  </div>
                @endif
              <div class="form-group has-feedback">
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}" autofocus placeholder="Name">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group has-feedback">
                <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" type="text" name="username" value="{{ old('username') }}" autofocus placeholder="Username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group has-feedback">
                    <input id="email" type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
              </div>
              <div class="form-group has-feedback">
                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
              </div>

              <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" >
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  @if ($errors->has('password-confirm'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password-confirm') }}</strong>
                  </span>
                  @endif
              </div>
              
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                       <a href="{{ route('login') }}" class="text-center">Goto Login</a>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
          <!-- /.login-box-body -->
        </div>
      </body>
@endsection
