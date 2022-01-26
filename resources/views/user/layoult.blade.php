<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title> UR E-Document | @yield('page_title') </title>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

      {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
      {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="{{asset('user_assets/assets/css/bootstrap.css') }}">
      <script defer src="{{asset('user_assets/assets/fontawesome/js/all.min.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('user_assets/assets/vendors/chartjs/Chart.min.css') }}">
      <link rel="stylesheet" href="{{ asset('user_assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
      <link rel="stylesheet" href="{{ asset('user_assets/assets/css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('user_assets/assets/css/custom.css') }}">
      <link rel="shortcut icon" href=" {{asset('admin_assets/img/ur_logo.png')}}" type="image/x-icon">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
      <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

      @yield('css')
   </head>
<body>
      <div id="app">
         <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
               <div class="sidebar-header" style="height: 50px;margin-top: -30px">
                      {{-- <i class="fa fa-users text-success me-4"></i> --}}
                      <img src="{{asset('admin_assets/img/ur_logo.png')}}" alt="">
                      <span>E-document</span>
                </div>
      

                @yield('sidebar')
            

                <div id="main">
                    @yield('navbar')

                @yield('content')

                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
                <script src="{{ asset('user_assets/assets/js/feather-icons/feather.min.js') }} "></script>
                <script src="{{ asset('user_assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }} "></script>
                <script src="{{ asset('user_assets/assets/js/app.js') }} "></script>
                <script src="{{ asset('user_assets/assets/vendors/chartjs/Chart.min.js') }} "></script>
                <script src="{{ asset('user_assets/assets/vendors/apexcharts/apexcharts.min.js') }} "></script>
                <script src="{{ asset('user_assets/assets/js/pages/dashboard.js') }} "></script>
                <script src="{{ asset('user_assets/assets/js/main.js') }} "></script>
                <script src="{{ asset('js/jq-signature.js') }}"></script>

                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.css"/>
                <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.js"></script>

                {{-- sweet arlet --}}
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                <script>
                // {{-- logaut --}}
                // $('#l-logaut').click( function(e) {
                //     e.preventDefault();

                //     $('frnLogaut').submit();
                //   });

                </script>
                @yield('js')

            </body>
            </html>
