<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,{{ csrf_token() }}">
        <title>Dr. Booking</title>
        <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.tagit.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput-typeahead.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">

        {{-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script> --}}
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->
        <script src="{{ asset('js/tag-it.js') }}"></script>
        <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
         <script src="{{ asset('js/jquery.table2excel.js') }}"></script>
        <script src="{{ asset('js/jssor.slider-22.2.0.mini.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/select2.js') }}" type="text/javascript"></script>
        {{-- <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script> --}}
        {{-- <script src="{{ asset('js/location.js') }}" type="text/javascript"></script> --}}
        {{-- flot js include for admin dashboard --}}
        {{--  <script src="{{ asset('js/plugins/flot/excanvas.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/flot/flot-data.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/flot/jquery.flot.tooltip.min.js') }}" type="text/javascript"></script> --}}
        {{-- flot js include for admin dashboard --}}
        {{--   <script src="{{ asset('js/plugins/morris/morris-data.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/morris/raphael.min.js') }}" type="text/javascript"></script> --}}
        {{-- for Ck editor --}}
        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    </head>
    <body>
        @include('layouts.admin-header')
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
                                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                               
                                    <li><a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-medkit"></i> Medical Centers <i class="fa fa-fw fa-caret-down"></i></a>
                                    <ul id="demo" class="collapse">
                                        <li>
                                            <a href="{{ route('medical.list') }}">Medical Center</a>
                                        </li>
                                        <li>
                                            <a href="#">Schedule</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('subscription.list') }}"><i class="fa fa-fw fa-edit"></i> Subscription Plans</a>
                                </li>
                                <li>
                                    <a href="{{route('payments.list')}}"><i class="fa fa-fw fa-desktop"></i> Payments</a>
                                </li>
                                <li>
                                    <a href="{{ route('add.faq.show') }}" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-wrench"></i> Manage Content</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                        <!-- /.navbar-collapse -->
                    {{-- </nav> --}}
                </div>
            </div>
            <div id="wrapper">
            <div id="page-wrapper">
                <div id="bodder">
                    @yield('content')
                </div>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div>
    @include('layouts.footer')
    @stack('scripts')
</body>
</html>