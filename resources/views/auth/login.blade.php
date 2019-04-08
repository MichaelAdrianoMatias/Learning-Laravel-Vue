@extends('master')

<style type="text/css">
  .invalid-feedback {
  color: #e3342f !important;
   }
  /* body {
      overflow-y: hidden !important;
  } */
</style>
@section('body')
<body class="hold-transition login-page">
 <div class="login-box">
   <div class="login-logo">
   <a href=""><b>Hotel</b>Cresencia</a>
   </div>
   <!-- /.login-logo -->
   <div class="login-box-body">
   <p class="login-box-msg">Sign-in</p>
   <form method="POST" action="{{ route('login') }}">
     {{ csrf_field() }}
     @if(session()->has('login_error'))
       <div class="alert alert-success">
       {{ session()->get('login_error') }}
       </div>
     @endif
     <div class="form-group has-feedback">
     <input class="form-control{{ $errors->has('identity') ? ' has-error' : '' }}" id="identity" type="identity" name="identity" value="{{ old('identity') }}" autofocus placeholder="Username or email">
     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
     @if ($errors->has('identity'))
       <span class="invalid-feedback" role="alert">
         <strong>{{ $errors->first('identity') }}</strong>
       </span>
     @endif
     </div>
    
     <div class="form-group has-feedback">
     <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password" >

     <span class="glyphicon glyphicon-lock form-control-feedback"></span>
       @if ($errors->has('password'))
       <span class="invalid-feedback" role="alert">
       <strong>{{ $errors->first('password') }}</strong>
       </span>
       @endif
     </div>
     
     <div class="row">
     <div class="col-xs-8">
       <div class="checkbox icheck">
       <label class="">
         <a href="{{ route('register') }}" class="text-center"><span><b style="color:rgb(64,64,64)">No Account?</b></span> Request Here</a>
         {{-- <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Remember Me --}}
       </label>
       </div>
     </div>
     <!-- /.col -->
     <div class="col-xs-4">
       <btn-primary-md></btn-primary-md>
       {{-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> --}}
     </div>
     <!-- /.col -->
     </div>
   </form>
   </div>
   <!-- /.login-box-body -->
 </div> 
    </body>
@endsection
