
<template>
<body class="hold-transition login-page">
<div class="login-box" >
  <div class="login-logo">
  <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="login-box-body">
  <p class="login-box-msg">Sign in to start your session</p>

  <form action="../../index2.html" method="post">
    <div class="form-group has-feedback">
    <input type="email" class="form-control" placeholder="Email">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
    <input type="password" class="form-control" placeholder="Password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
    <div class="col-xs-8">
      <div class="checkbox icheck">
      <label>
        <input type="checkbox"> Remember Me
      </label>
      </div>
    </div>

    <div class="col-xs-4">
      <button @click="goToDashboard" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div>

    </div>
  </form>

  <div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
    Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
    Google+</a>
  </div>


  <a href="#">I forgot my password</a><br>
  <a href="register.html" class="text-center">Register a new membership</a>

  </div>

</div>
</body>
</template>

<template>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
      <a href=""><b>Hotel</b>Cresencia</a>
      </div>
      <div class="login-box-body">
      <p class="login-box-msg">Sign-in</p>
      <form @submit.prevent="authenticate">
        <div class="form-group has-feedback">
        <input class="form-control" id="identity" v-model="form.idendity" type="identity" name="identity" autofocus="true" placeholder="Username or email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
        <input id="password" type="password" v-model="form.password" placeholder="Password" class="form-control" name="password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          <label class="">
            <router-link to="/register"  class="text-center"><span><b style="color:rgb(64,64,64)">No Account?</b></span> Request Here</router-link>
            
          </label>
          </div>
        </div>

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>

        </div>
      </form>
      </div>
    </div>
  </body>
</template>
<script>

export default {
  name: 'Login',
  data() {
  return {
    form: {
    identity: '',
    password: '' 
    }
  }
  },
  methods: {
  authenticate() {
    this.$store.dispatch('login');
    login(this.data.form)
      .then((res) => {
      this.$store.commit("loginSuccess", res);
      this.$router.push({ path: '/dashboard' });
      })
      .catch((rej) => {
        this.$$store.commit("loginFailed", {rej});
      })  
    },
    goToDashboard() {
     this.$router.push({ path: '/dashboard' });
  }, 
  },
  
}
</script>

<style scoped>
 
</style>

