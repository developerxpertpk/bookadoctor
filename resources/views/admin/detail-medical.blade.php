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
    <div class="col-md-2 medic "><img src="{{asset('/images/profile_pic/'.$medicaldetail->profilepic)}}" alt="Profile Pic"/></div>
    <div class="col-md-1 mediccontent">
      <Strong>Name: </Strong><br/>
      <Strong>UserName:</Strong><br/>
      <Strong>Description:</Strong><br/>
      <Strong>Email:</Strong><br/>
      <Strong>Contact:</Strong><br/>
      <Strong>Address:</Strong><br/><br/>
      <Strong>Timings:</Strong><br/>
      <Strong>Contact:</Strong>
      </div>
      <div class="col-md-5 mediccontent">
      {{ $medicaldetail->title }}<br/>
      {{ $medicaldetail->medical_center_info }}<br/>
      {{ $medicaldetail->description }}<br/>
      {{ $medicaldetail->medical_center_email }}<br/>
      +91-{{ $medicaldetail->contact_no }}<br/>
      {{ $medicaldetail->address }},{{$medicaldetail->city}},{{$medicaldetail->state}},{{$medicaldetail->country}},<br/>pincode:{{$medicaldetail->pincode}}<br/>
      {{ $medicaldetail->working_hours }}<br/>
      {{ $medicaldetail->web_url }}<br/>
      {{ $medicaldetail->created_at->totimestring() }}
  </div>
  <div class="col-md-3 mediccontent">
  <div class="aligndoc">
  @foreach($medicaldetail->doctors as $doctor)

  {{$doctor->first_name}} {{$doctor->last_name}}<br/>

  @endforeach
  {!! $medicaldetail->doctors->render() !!}
  </div>
  </div>   
</div>
</div>       

</div>

@endsection
