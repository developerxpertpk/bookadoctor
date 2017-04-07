@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile
					<button type="button" class="pull-right btn btn-sm btn-danger" data-toggle="modal" data-target="#myModelkkkl"> View Bookings
					</button>
					<!-- MODAL -->
					<div id="myModelkkkl" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Bookings</h4>
								</div>
								{!! Form::open() !!}
								<input type="hidden" name="user_id" value="{{$user->id }}">
								<div class="modal-body">
									<p> Booking List</p>
									<table class="table table-bordered" id="patient">
										<thead>
											
											<th>  Patient's Name </th>
											<th> Date & Time </th>
											<th> Age </th>
											<th> Issue </th>
											<th> Action </th>
										</thead>
									</tr>
									@foreach($s as $key=>$value)
									<tr>
										<td>
										
											@foreach($k as $key=>$value1)
											{{$value1}}
											@endforeach
											
											
										</td>
										
										
										
										<td>
											@foreach($booking as $key1)
											{{$key1->date_test }}
											@endforeach
										</td>
									</td>
									
									
									
									
									<td>
										{{$value}}
									</td>
									<td>
										
										@foreach($booking as $key2)
										{{$key2->problem }}
										@endforeach
										
									</td>
									<td>
										<button type="button " class="btn btn-default" data-dismiss="modal">Edit</button>
										<button type="button " class="btn btn-default" data-dismiss="modal">Cancel</button>
										
									</td>
									
								</tr>
								@endforeach
							</table>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
							
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
			
			<!-- Modal end-->
			<div class="panel-body">
				<img src="images/profile_pic/{{$user->is_doctor->profile_pic}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">  <!-- DSC_0022.jpg -->
				<h4>{{ $user->is_doctor->first_name}} {{ $user->is_doctor->last_name}}'s Profile</h4>
				<div clo-md-12>
					<label col-md-4>Email : </label><h4>{{ $user->email}} </h4>
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