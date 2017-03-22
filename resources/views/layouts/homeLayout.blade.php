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
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jssor.slider-22.2.0.mini.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/location.js') }}" type="text/javascript"></script>

</head>
<body>

@if(Auth::user()->role_id=1)
 @include('layouts.header')
 @endif

@if(Auth::user()->role_id=2)
    @include('layouts.header')
    @endif

@if(Auth::user()->role_id=3)
    @include('layouts.medical-header')
    @endif

  <div id="home-wrapper">

    @yield('content')

    </div>

 @include('layouts.footer')
</body>
</html>
