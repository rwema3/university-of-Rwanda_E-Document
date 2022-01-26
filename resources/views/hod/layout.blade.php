<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href=" {{ asset('admin_assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href=" {{ asset('admin_assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    Admin| @yield('page_title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href=" {{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" />
{{-- 
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script> --}}
  <link href=" {{ asset('admin_assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />

{{-- 
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.5.1.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"> --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  


  @yield('css')

</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href=" {{url('/dashboard')}} " class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('admin_assets/img/logo-small.png') }}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="/admin/dashboard" class="simple-text logo-normal">
          {{auth()->User()->first_name}}
           <div class="logo-image-big">
            <img width="80" src="{{ asset('admin_assets/img/ur_logo.png') }}">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="@yield('dashboard_select')">
            <a href="{{url('/dashboard')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
  
          <li class="@yield('staffs_select')">
            <a href="{{url('/hod/staffs')}}">
              <i class="nc-icon nc-badge"></i>
              <p>Lecturers</p>
            </a>
          </li>


          <li class="@yield('module_select')">
            <a href="{{url('/hod/modules')}}">
              <i class="nc-icon nc-single-02"></i>
              <p> Modules </p>
            </a>
          </li>
          

          <li class="@yield('students_select')">
            <a href="{{url('/hod/students')}}">
              <i class="nc-icon nc-badge"></i>
              <p>Students</p>
            </a>
          </li>




          {{-- <li class="@yield('setting_select')">
            <a href="{{url('/admin/setting')}}">
              <i class="nc-icon nc-settings-gear-65"></i>
              <p>Setting</p>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Logged In as : Head of Dpt </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Plofile</a>
                  <a class="dropdown-item" href="#">Change password</a>
                   <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('frmLogaut').submit();">Logaut</a>
                   <form id="frmLogaut" method="post" action="{{route('logout')}}"> @csrf</form>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

@yield('content')

      <footer style="position: fixed; bottom:0px" class="footer footer-black   footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="/admin/dashboard" target="_blank">Creative team</a></li>
                {{-- <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li> --}}
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by UR Final Year students
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  {{-- <script src="{{ asset('admin_assets/js/core/jquery.min.js') }}"></script> --}}
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="{{ asset('admin_assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <!-- Chart JS -->
  <script src="{{ asset('admin_assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('admin_assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin_assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>

  <!-- Paper Dashboard DEMO methods, don't include it in your ') }}project! -->

  {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}

  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.css"/> --}}

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.js"></script>

{{-- 
  https://code.jquery.com/jquery-3.5.1.js
https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js --}}


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- parsley validation --}}
  <script src="{{ asset('js/parsley/parsley.min.js') }}"></script>


  @yield('modals')
  @yield('js')

</body>
</html>
