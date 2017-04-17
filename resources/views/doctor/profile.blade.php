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
						    height: 150px;
						    width: 150px;
						    border-radius: 96px;
						}
						
						.link_b a{
							float:right;
						}

						
					</style>
					<!-- end style -->
					<div class="panel-body">
						<div class="col-md-12">
							{!! Form::open(['route' => 'Doctor.image','class' => 'form','files' => true])!!}
							<div class="col-md-12">
							 <li> <img class="profilepic" src="images/profile_pic/{{Auth::user()->is_Profile->images}}"></li>
							<div class="col-md-4">
							<h5>WELCOME </h5> <h3>{{$userr->first_name}} {{$userr->last_name}}  </h3>
							</div>
							</div>
							
							<form class="form-horizontal">

							<div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">Name</label>
								<div class="col-xs-10">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$userr->first_name}} {{$userr->last_name}}">
								</div>
							 </div>

							<div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">Contact Number</label>
								<div class="col-xs-10">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$userr->contact_no}}">
								</div>
							 </div>

							 <div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">Address</label>
								<div class="col-xs-10">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$userr->address}}">
								</div>
							 </div>

							  <div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">Country</label>
								<div class="col-xs-10">
           						 <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{$userr->country}}">
								</div>
							 </div>

							  <div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">State</label>
								<div class="col-xs-10">
           						 <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{$userr->state}}">
								</div>
							 </div>

							  <div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">Zipcode</label>
								<div class="col-xs-10">
           						 <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{$userr->pincode}}">
								</div>
							 </div>

							   <div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">City</label>
								<div class="col-xs-10">
           						 <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{$userr->city}}">
								</div>
							 </div>

							 <div class="col-md-12">
							<div class="link_b">
							 <a class="edit_pro_btn" href="{{ route('password.reset') }}">  Change Password</a>
							</div>
							</div>



							
							
							
							
							<div>
							</div>
							
							{!! Form::close() !!}
							

						</div>
					</div>
				</div>
			</div>
			</form>
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