@extends('layouts.adminLayout')
@section('content')
<div class="show-admin">
    <?php $i=0;?>
  <div class="row">
    <div class="col-md-6 medic"><h4>Medicalcenter Details</h4></div>
    <div class="col-md-5 medic"><h4>Doctor's List</h4></div>
    <div class="col-md-1"><a href="{{route('medical.list')}}" class="btn btn-info btn-sm">
          <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a></div>
  </div>
  <div class="row">
   {{--  <div class="col-md-2 medic "><img src="{{asset('/images/profile_pic/'.$medicaldetail->images)}}" alt="Profile Pic"/></div> --}}
    <div class="col-md-1 mediccontent">
      <Strong>Name: </Strong><br/>
      <Strong>UserName:</Strong><br/>
      <Strong>Description:</Strong><br/>
      <Strong>Email:</Strong><br/>
      <Strong>Contact:</Strong><br/>
      <Strong>Address:</Strong><br/><br/>
      <Strong>Timings:</Strong><br/>
      <Strong>web:</Strong>
      </div>
      <div class="col-md-5 mediccontent">
      @foreach($medicaldetail as $key)
      {{ $key->title }} <br/>
      {{ $key->medical_center_info }}<br/>
      {{ $key->description }}<br/>
      {{ $key->medical_center_email }}<br/>
      +91-{{ $key->contact_no }}<br/>
      {{ $key->address }},{{$key->city}},{{$key->state}},{{$key->country}},<br/>pincode:{{$key->pincode}}<br/><br/>
      {{-- {{ $key->working_hours }}<br/> --}}
     {{ $key->web_url }}<br/>
      {{-- {{ $key->created_at->totimestring() }} --}}
      @endforeach
  </div>
  <div class="col-md-3 mediccontent">
  <div class="aligndoc">
  {{-- @foreach($medicaldetail->doctors as $doctor)

  {{$doctor->first_name}} {{$doctor->last_name}}<br/>

  @endforeach
  {!! $medicaldetail->doctors->render() !!} --}}
  </div>
  </div>   
</div>
</div>       

</div>

@endsection
