<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dr. Booking</title>
        <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/medical-admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/clockpicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css/standalone.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-lightbox.min.css') }}">
        <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
      <!--   <link rel="stylesheet" href="{{asset('css/jQuery UI - v1.12.1.css')}}">` -->
        
       <!--  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> -->
       
        <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
       <!--  
       -->  <script src="{{ asset('js/clockpicker.js') }}" type="text/javascript"></script>


     </head>
    <body>
        @include('layouts.doctor-header')
        <div id="admin-wrapper">
            <div id="admin-sidebar">
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                {{-- <nav class="navbar admin-nav" role="navigation"> --}}
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="nav navbar-nav side-nav">

                             <li>
                                    <a href="{{ route('doctor.dashboard') }}"><i class="ffa fa-fw fa-dashboard"></i>  Dashboard</a>
                                </li>
                                
                                <li>
                                    <a href="{{ route('Doctor.booking') }}"><i class="fa fa-sticky-note"></i>  Bookings</a>
                                </li>
                                <li>

                                <a href="javascript:;" data-toggle="collapse" data-target="#profile-medical-center"><i class="fa fa-fw fa-gear"></i> Settings <i class="fa fa-fw fa-caret-down"></i></a>
                             <ul id="profile-medical-center" class="collapse">

                              <li>
                                <a href="{{route('password.reset')}}"><i class="fa fa-fw fa-edit"></i> Change password</a>
                            </li>
                             <li>
                                <a href="{{route('Doctor.image')}}"><i class="fa fa-fw fa-user"></i>Upload Profile Picture</a>
                            </li>
                             <li>
                                <a href="{{route('manage.scedule')}}"><i class="fa fa-fw fa-user"></i>Manage Schedule</a>
                            </li>
                            </ul>

                                <!--  <a href=""><i class="fa fa-fw fa-gear"></i> Settings </a> -->
                                    
                                 
                                </li>
                                
                                <li>
                                  <a href="{{ route('previous.history', Auth::User()->id) }}"><i class="fa fa-bars"></i> History of Patient's</a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="wrapper">
                    <div id="bodder">
                        
                       <div class="container-fluid">
                        @yield('content')
                        </div>
                    </div>
                </div>
                <!-- /#page-wrapper -->
            </div>
            <!-- /#wrapper -->
        </div>
        @include('layouts.footer')
    </body>
</html>