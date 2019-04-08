
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <title>Hotel Cresencia</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div id="app">
        <app></app>
    </div>
    <script defer src="{{ asset(mix('js/app.js')) }}"></script>
   </body>
</html>
