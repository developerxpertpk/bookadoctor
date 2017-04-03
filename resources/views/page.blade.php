@extends('layouts.default')

@section('content')
 @include('slider.slider1')

<h1>{{$pagedata->title}}</h1>
<div id="accordion">
{!! html_entity_decode($pagedata->body) !!}

</div>
{!!html_entity_decode($pagedata->meta_keyword) !!}

  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
@endsection