@extends('layouts.adminLayout')
@section('content')
<div id="admin-content">
         {!! Form::open(['route' => 'admin.add.submit','class' => 'add-admin-form','method'=>'POST','files'=> true]) !!}
               @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            {!! Form::close() !!}  
    </div>
<div class="show-admin">
    <?php $i=0;?>
  <div class="row">
    <div class="col-md-8 medic"><h4>Medicalcenter Details</h4></div>
    <div class="col-md-3 medic"><h4>Doctor's List</h4></div>
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
      <div class="col-md-3 mediccontent">
      {{ $medicaldetail->title }}<br/>
      {{ $medicaldetail->medical_center_info }}<br/>
      {{ $medicaldetail->description }}<br/>
      {{ $medicaldetail->medical_center_email }}<br/>
      +91-{{ $medicaldetail->contact_no }}<br/>
      {{ $medicaldetail->address }},{{$medicaldetail->city}},{{$medicaldetail->state}},{{$medicaldetail->country}},<br/>pincode:{{$medicaldetail->pincode}}<br/>
      {{ $medicaldetail->working_hours }}<br/>
      {{ $medicaldetail->web_url }}<br/>
  </div>
  <div class="col-md-5 medic-content">
    {{ $medicaldetail->doctor()->where('medic_id',1)->get() }}
    

  </div>     
</div>
</div>       

</div>

@endsection
