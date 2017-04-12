@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile
					{!! csrf_field() !!}
					
					
					<!-- style -->
					<style>
						. btn a {
						color: #dff0d8;
						text-decoration: none;
						float:right;
						}
					</style>
					<!-- end style -->
					<div class="panel-body">
						<div class="col-md-8">
							{!! Form::open(['route' => 'Doctor.image','class' => 'form','files' => true])!!}
							
							<h3>WELCOME  {{$userr->first_name}} {{$userr->last_name}}  </h3>
							<p><b>Your Profile</b></p>    <a href="{{ route('password.reset') }}">  Change Password</a>
							<div class="form-group">
								{!! Form::label('Number') !!}
								{{$userr->contact_no}}
								
							</div>
							<div class="form-group">
								{!! Form::label('Address') !!}
								{{$userr->address}}
								
							</div>
							<div class="form-group">
								{!! Form::label('Country') !!}
								{{$userr->country}}
								
							</div>
							<div class="form-group">
								{!! Form::label('State') !!}
								{{$userr->state}}
								
							</div>
							<div class="form-group">
								{!! Form::label('Zip code') !!}
								{{$userr->pincode}}
								
							</div>
							<div class="form-group">
								{!! Form::label('City') !!}
								{{$userr->city}}
								
							</div>
							<div class="form-group">
								{!! Form::label('Profile Image') !!}
								{!! Form::file('image') !!}
							</div>
							<div>
							</div>
							{{ Form::submit() }}
							{!! Form::close() !!}
							<div class="profile_pic">
								<div class="col-md-4">
									<img src="{{asset('images/profile_pic/'.$userr->images)}}" >
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- style -->
			<style>
			.profile_pic{
				float: right;
				width:100%;
				}
			.profile_pic img{
				height:150px;
				width:150px;
			}
			</style>
		</div>
		@endsection