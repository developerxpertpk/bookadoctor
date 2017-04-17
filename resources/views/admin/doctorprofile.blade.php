@extends('layouts.adminLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile
				<a href="{{route('medical.show',$user->is_profile->doc->medicalcenter_id)}}" class="pull-right btn btn-sm btn-info"><i class="fa fa-long-arrow-left"></i> Medical Detail
					</a>
					<!-- Modalend-->
					<div class="panel-body">
						<img src="{{asset('images/profile_pic/'.$user->is_profile->images)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">  <!-- DSC_0022.jpg -->
						<h4>{{ $user->is_profile->first_name}} {{ $user->is_profile->last_name}}'s Profile</h4>
						<div clo-md-12>
							<label col-md-4>Email : </label><h4>{{ $user->email}} </h4>
						</div>
						<div clo-md-12>
							<label col-md-4>Status : </label><h4>@if($user->status=='1')
							{{'Active'}}
							@else
							{{'Blocked'}}
							@endif
							 </h4>
						</div>
						<div clo-md-12>
							<label col-md-4>Address : </label><h4>{{ $user->is_profile->address}}, {{ $user->is_profile->city}}, {{ $user->is_profile->state}}, {{ $user->is_profile->country}}, pincode:{{ $user->is_profile->pincode}}  </h4>
						</div>
						<div clo-md-12>
							<label col-md-4>Contact Number : </label><h4>+91-{{ $user->is_profile->contact_no}} </h4>
						</div>
						<div clo-md-12>
							<label col-md-4>Email : </label><h4>{{ $user->email}} </h4>
						</div>
						{{-- <div clo-md-12>
							<label col-md-4>Specialities : </label>
							@foreach($user->is_doctor->doctor_speciality as $key)
							{{ $key->name }}
							@endforeach

						</div> --}}
						{{-- <div col-md-12>
							<label col-md-4>  Your Schedule :</label><br/>
							<p><b>Days:</b>{{ $user->is_doctor->schedule->days }}</p> 
							<p><b>From:</b>{{ date('H:i:s',strtotime($user->is_doctor->schedule->from)) }}</p>
							<p><b>To:</b>{{ date('H:i:s',strtotime($user->is_doctor->schedule->to)) }}</p>

						</div>
 --}}					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection