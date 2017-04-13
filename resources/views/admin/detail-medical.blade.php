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
      {{ $medicaldetail->title }} <br/>
      {{ $medicaldetail->medical_center_info }}<br/>
      {{ $medicaldetail->description }}<br/>
      {{ $medicaldetail->medical_center_email }}<br/>
      +91-{{ $medicaldetail->contact_no }}<br/>
      {{ $medicaldetail->address }},{{$medicaldetail->city}},{{$medicaldetail->state}},{{$medicaldetail->country}},<br/>pincode:{{$medicaldetail->pincode}}<br/><br/>
     {{ $medicaldetail->working_hours }}<br/> 
     {{ $medicaldetail->web_url }}<br/>
  </div>
  <div class="col-md-3 mediccontent">
  <div class="aligndoc">
  @foreach($doctors as $doctor)
  <a href="{{ route('Doctor.profile',$doctor->doctor_id) }}"><i class="fa fa-user-md"></i>{{$doctor->is_doctors->is_profile['first_name']}} {{$doctor->is_doctors->is_profile['last_name']}}</a><br/>
  @endforeach
  </div>
  {{$doctors->render()}}
  </div> 
</div>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#bookings">Open Modal</button> 
</div>       

</div>
<!-- Modal -->
  <div class="modal fade" id="bookings" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Booking Details</h4>
        </div>
        <div class="modal-body">
          <table class="table table-hover">
            <caption>Booking List</caption>
            <thead>
              <tr>
                <th>Booking Id</th>
                <th>Doctor Name</th>
                <th>Patient Name</th>
                <th>Patient Issue</th>
                <th>Appointment Timings</th>
                <th>Booking Status</th>
                <th>Payment Status</th>
              </tr>
            </thead>
            <tbody>
            @foreach($booking as $key=>$value)
              <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->is_doctors->is_profile->first_name}} {{$value->is_doctors->is_profile->last_name}}</td>
                <td>{{$value->is_users->is_profile->first_name}} {{$value->is_users->is_profile->last_name}}</td>
                <td>{{$value->reason}}</td>
                <td>{{$value->Appoitment_timings}}</td>
                <td>@if($value->status=='1')
                {{'Complete'}}
                @elseif($value->status=='2')
                {{'Cancel'}}
                @elseif($value->status=='3')
                {{'Rescheduled'}}
                @else
                {{'pending'}}
                @endif
               </td>
               <td>@if($value->payment_status=='1')
                {{'Complete'}}
                @else
                {{'pending'}}
                @endif
               </td> 
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
        {{-- {{ $booking->links() }} --}}
        </div>
      </div>
      
    </div>
  </div>
  
</div>

@endsection
