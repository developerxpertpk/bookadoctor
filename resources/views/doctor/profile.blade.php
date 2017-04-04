@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile
					<button type="button" class="pull-right btn btn-sm btn-danger" data-toggle="modal" data-target="#myModelkkkl"> Schedule
					</button>
					<!-- MODAL -->
					<div id="myModelkkkl" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Modal Header</h4>
								</div>
								  {!! Form::open(['route' => 'Doctor.schedule.create','method'=>'POST','files'=> true]) !!}
								  <input type="hidden" name="user_id" value="{{$user->id }}">
								<div class="modal-body">
									<p>Select Working Days </p>
									<div class="weekDays-selector">
										<input type="checkbox" id="weekday-mon" class="weekday" name="weekdays[]" value="mon"/>
										<label for="weekday-mon">Monday</label>
										<input type="checkbox" id="weekday-tue" class="weekday" name="weekdays[]" value="tue"/>
										<label for="weekday-tue">Tuesday</label>
										<input type="checkbox" id="weekday-wed" class="weekday" name="weekdays[]" value="wed"/>
										<label for="weekday-wed">Wednesday</label>
										<input type="checkbox" id="weekday-thu" class="weekday" name="weekdays[]" value="thu"/>
										<label for="weekday-thu">Thursday</label>
										<input type="checkbox" id="weekday-fri" class="weekday" name="weekdays[]" value="fri"/>
										<label for="weekday-fri">Friday</label>
										<input type="checkbox" id="weekday-sat" class="weekday" name="weekdays[]" value="sat"/>
										<label for="weekday-sat">Saturday</label>
										<input type="checkbox" id="weekday-sun" class="weekday" name="weekdays[]" value="sun"/>
										<label for="weekday-sun">Sunday</label>
									</div>
									
								</div>
								<p> Select Your Working Hour's</p>
								<div class="col-md-2">
								<p>From </p>
								</div>
								 <div class="col-md-4">
								<div class="input-group clockpicker">
								
								 <input type="text" class="form-control" name="from_time" value="09:30" >
									<span class="input-group-addon">
										<span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
									</span> 
									</div>
								</div>
								<div class="col-md-2">
								<p>To</p>
								</div>

								 <div class="col-md-4">
								<div class="input-group clockpicker">
								
								 <input type="text" class="form-control" name="to_time" value="09:30" >
									<span class="input-group-addon">
										<span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
									</span> 
									</div>
								</div>
								 <!-- Clock script -->
								<script type="text/javascript">
								$('.clockpicker').clockpicker();
								</script>
								<!-- End Clock Script -->
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-default">Submit</button>
									{{ Form::close() }}
								</div>
							</div>
						</div>
					</div>
					
					<!-- Modalend-->
					<div class="panel-body">
						<img src="images/profile_pic/{{$user->is_doctor->profile_pic}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">  <!-- DSC_0022.jpg -->
						<h4>{{ $user->is_doctor->first_name}} {{ $user->is_doctor->last_name}}'s Profile</h4>
						<div clo-md-12>
							<label col-md-4>Email : </label><h4>{{ $user->email}} </h4>
						</div>
						<div clo-md-12>
							<label col-md-4>Status : </label><h4>{{ $user->is_doctor->status}} </h4>
						</div>
						<div clo-md-12>
							<label col-md-4>Specialities : </label>
							@foreach($treat as $key)
							{{ $key }}
							@endforeach

						</div>
						<div col-md-12>
							<label col-md-4>  Your Schedule :</label><br/>
							<p><b>Days:</b>{{ $user->is_doctor->schedule->days }}</p> 
							<p><b>From:</b>{{ date('H:i:s',strtotime($user->is_doctor->schedule->from)) }}</p>
							<p><b>To:</b>{{ date('H:i:s',strtotime($user->is_doctor->schedule->to)) }}</p>

						</div>
						{!! Form::open(['route' => 'Doctor.image','method'=>'POST','files'=> true]) !!}
							<label>Update profile picture</label>
							<input type="file" name="profile_image">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="submit" class="pull-right btn btn-sm btn-primary">
							{{ Form::close() }}

					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection