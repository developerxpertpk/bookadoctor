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
        <script src="https://unpkg.com/vue-select@latest"></script>
        
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jssor.slider-22.2.0.mini.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/select2.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/clockpicker.js') }}" type="text/javascript"></script>
        <!-- <script src="{{ asset('js/location.js') }}" type="text/javascript"></script> -->
        <script src="{{ asset('js/bootstrap-lightbox.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/velocity.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/velocity.ui.min.js') }}" type="text/javascript"></script>
        <!-- <script src="{{ asset('js/dropdown.js') }}" type="text/javascript"></script> -->
        <!--   flot js include for admin dashboard
        <script src="{{ asset('js/plugins/flot/excanvas.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/flot/flot-data.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/flot/jquery.flot.tooltip.min.js') }}" type="text/javascript"></script>
        flot js include for admin dashboard  -->
        <!-- <script src="{{ asset('js/plugins/morris/morris-data.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/morris/raphael.min.js') }}" type="text/javascript"></script> -->
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
                                <li class="active">
                                    <a href="{{ route('Doctor.image') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                                </li>
                                     <li>
                                        <a href="{{ route('Doctor.booking') }}"><i class="fa fa-bars"></i> View Bookings</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div id="wrapper">
                        <div id="bodder">
                           
                            @section('Annoy')
                            <section class="container-fluid">
                                <!-- Page Heading -->
                                <section class="row">
                                    <div class="medical-dashboard-header">
                                        {{--<h1 class="page-header">--}}
                                        {{--Dr. Booking --}}
                                        {{--</h1>--}}
                                        <section class="page-header">
                                            <div class="medical-center-logo col-md-2"><img id="logo-img" src="{{asset('images/profile_pic/Anony.png')}}"></div>
                                            <div class="medical-center-tagline col-md-10"> <span class="page-tagline">
                                                
                                            </span></div>
                                        </section>
                                    </div>
                                </section>
                            </section>
                            @endsection
                            @yield('content')
                        </div>
                    </div>
                    <!-- /#page-wrapper -->
                </div>
                <!-- /#wrapper -->
            </div>
            @include('layouts.footer')
        </body>
    </html>