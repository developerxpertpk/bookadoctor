@extends('layouts.doctorLayout')
@section('content')
<div class="row">
	<div class="doctor-profile">
		<div class="panel panel-default">
			<div class="panel-heading"><span class="heading-pannel"> Doctor Profile</span><a class="edit_pro_btn pull-right c" href="{{route('doctor.register')}}">  Edit</a>
		</div>
		<!-- style -->
		<style>
			.btn a {
			color: #dff0d8;
			text-decoration: none;
			float:right;
			}
			.width_100{
				float:left;
				width:100%;
			}
			.profilepic{
				float: left;
			width: 100%;
			height: 200px;
			width: 193px;
			border-radius: 100%;
			border: 1px solid #000;
			padding:4px;
			
			}
			
			.link_b a{
				float:right;
			}
			.change-pwd{
				margin-top: 15px;
			}
			.edit{
				padding-bottom: 15px;
			}
			
		</style>
		<!-- end style -->
		
		
		<div class="panel-body">
			<div class="col-md-4">
				<img class="profilepic" src="/images/profile_pic/{{Auth::user()->is_Profile->images}}">
			</div>
			<div class="col-md-4">
				<p><b>Name :</b> {{$userr->first_name}} {{$userr->last_name}} </p>
				<p><b>Contact No. :</b>  {{$userr->contact_no}} </p>
				<p><b>Address :</b> {{$userr->address}},{{$userr->city}},{{$userr->state}}<br>Pincde:{{$userr->pincode}}</p>
				<p><b>Country :</b>   {{$userr->country}}</p>
				<p><b>Speciality(s) :</b>
				@if(isset($spe_name_arr))
				@foreach($spe_name_arr as $sep=>$value)
				{{$value}},
				@endforeach
				@endif

				</p>
				<p><b>Gender:</b> {{$userr->gender}}</p>
				

				
				
			</div>

			<div class="col-md-4">
				
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-support fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ App\Booking::where('doctor_id','=',Auth::user()->id)->count()}}</div>
								<div>Total No. of Bookings</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</div>
			
		</div>
		<div class="panel-body">
			<!-- section 1 -->
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-support fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ App\Booking::where('doctor_id','=',Auth::user()->id)->where('status','=',1)->count()}}</div>
								<div>Booking Complete</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- Section two -->
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-support fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ App\Booking::where('doctor_id','=',Auth::user()->id)->where('status','=',0)->count()}}</div>
								<div>Booking Pending!</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- Section 3 -->
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<i class="fa fa-support fa-5x"></i>
							</div>
							<div class="col-xs-9 col-sm-9 col-md-9 text-right">
								<div class="huge">{{ App\Booking::where('doctor_id','=',Auth::user()->id)->where('status','=',2)->count()}}</div>
								<div>Booking Cancel!</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- section4 -->
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-support fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ App\Booking::where('doctor_id','=',Auth::user()->id)->where('status','=',3)->count()}}</div>
								<div>Booking Reschudule!</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>
</div>
@endsection