@extends('layouts.doctorLayout')
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile
				{{Form::open(['route'=>'Doctor.image','method'=>'post','files'=> true])}}
					{!! csrf_field() !!}
					
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
						border-radius: 12px;
						
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
						<div class="profile-col-1">
								<img class="profilepic" src="/images/profile_pic/{{Auth::user()->is_Profile->images}}">
								
								<p>Name : {{$userr->first_name}} {{$userr->last_name}} </p>
								<p>Contact No. : {{$userr->contact_no}} </p>
								<p>Address : {{$userr->address}} </p>
								<p>City :  {{$userr->city}}</p>
								<p>State : {{$userr->state}}</p>
								<p>Zip Code : {{$userr->pincode}}</p>
								<p>Image Upload : <input type="file" class="form-control-file" name="image"></p>
								
							</div>
						</div>

						<div class="col-md-4">
						<div class="profile-col-1">

						</div>
						</div>
						<div class="col-md-4">
							<div class="profile-col-2">
								

										<div class="col-md-12">
										<div class="edit">
										<a class="edit_pro_btn" href="{{route('doctor.register')}}">  Edit</a>
										</div>
										</div>

										<div class="col-md-12">
										<button calss="edit_pro_btn" >Submit</button>
										</div>

										<div class="col-md-12">
										<div class="change-pwd">
										<a class="edit_pro_btn" href="{{ route('password.reset') }}">  Change Password</a>
										</div>
										</div>
							</div>

							</div>
							</div>
							{{Form::close()}}
								</div>
								<div>
								</div>
								</div>
						</div>
					</div>
				</div>
			</form>
					@endsection