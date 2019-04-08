{{-- @extends('layouts.master') --}}
@section('body')  
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      @include('layouts.header')
      @include('layouts.sidebar')
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pace page
            <small>Loading example</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li> 
            <li class="active">Pace page</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          @yield('content')
          {{-- <router-view></router-view> --}}
          <app-component></app-component>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      @include('layouts.footer')
    </div>
    <!-- ./wrapper -->
    </body>
@endsection
  

