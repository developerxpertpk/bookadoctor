<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">

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
    <link rel="stylesheet" href="{{ asset('css/bootstrap-lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clockpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
    {{--<link rel="stylesheet" href="{{ asset('css/standalone.css') }}">--}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jssor.slider-22.2.0.mini.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/location.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-lightbox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/clockpicker.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/velocity.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/velocity.ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/ajax-function.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.form.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.table2excel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/angular/custom_angular.js') }}" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzoNF3kifUvuxgwoDSxQlgVgSKu9_ddzc"
            type="text/javascript"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">

    </head>
    <body>
        @include('layouts.header')
        
        <div id="home-wrapper">
            @yield('content')
        </div>
        @include('layouts.footer')
    </body>
</html>