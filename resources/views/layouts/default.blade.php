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
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/drop_down.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="http://cdn-na.infragistics.com/igniteui/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet"></link>
        <link href="http://cdn-na.infragistics.com/igniteui/latest/css/structure/infragistics.css" rel="stylesheet"></link>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jssor.slider-22.2.0.mini.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/select2.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/location.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/dropdown.js') }}" type="text/javascript"></script>
        <script src="http://igniteui.com/js/modernizr.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
        <script src="http://cdn-na.infragistics.com/igniteui/latest/js/infragistics.core.js"></script>
        <script src="http://cdn-na.infragistics.com/igniteui/latest/js/infragistics.lob.js"></script>
    </head>
    <body>
        @include('layouts.header')
        
        <div id="home-wrapper">
            @yield('content')
        </div>
        @include('layouts.footer')
    </body>
</html>