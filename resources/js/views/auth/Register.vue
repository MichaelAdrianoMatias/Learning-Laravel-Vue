<template>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
      <a href=""><b>CMMS</b>V2</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
      <p class="login-box-msg">Request Account</p>
      <form @submit.prevent="register">
        <div class="form-group has-feedback">
        <input class="form-control" id="name" type="text" name="name" autofocus="" placeholder="Name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
       
        </div>
        <div class="form-group has-feedback">
        <input class="form-control" id="username" type="text" name="username"  placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
       
        </div>
        <div class="form-group has-feedback">
          <input id="email" type="email" placeholder="Email Address" class="form-control" name="email">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         
        </div>
        <div class="form-group has-feedback">
          <input id="password" type="password" placeholder="Password" class="form-control" name="password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         
        </div>

        <div class="form-group has-feedback">
          <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          
        </div>
        
        <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <router-link to="/login">Goto Login</router-link>
             <!-- <a href="{{ route('login') }}" class="text-center">Goto Login</a> -->
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

</template>

<script> 
  export default {
    data(){
      return {
        formData: {
          name: '',
          email: '',
          password: '',
          error: false,
          errors: {},
          success: false
        }
      };
    },
    methods: {
      register() {
        console.log(this.formData);
      }              
    }
}
</script>