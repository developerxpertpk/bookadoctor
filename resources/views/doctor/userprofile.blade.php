@extends('layouts.doctorLayout')
@section('content')
<div class="row">
	<div class="user-profile">
		<div class="panel panel-default">
			<div class="panel-heading"> User's Profile
				{!! csrf_field() !!}
				<div class="panel-body">
					<div class="profile-section">
						@if($booking->payment_status == 1)
						<div class="col-md-4">
							<div class="profile-col-1">
								<img class="profilepic" src="/images/profile_pic/{{ $booking->is_users->is_Profile->images}}">
								<p>Booking Id : {{$booking->id}} </p>
								<p>Appointment Date : {{date('F d, Y', strtotime($booking->Appointment_timings)) }}</p>
								<p>Appointment Time : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->Appointment_timings)->format('H:i:s')}}</p>
								<p>Name : {{$booking->is_users->is_Profile->first_name}}  {{$booking->is_users-> is_Profile->last_name}} </p>
								<p>Diseases : {{$booking->reason}}</p>
								<p>Contact No. : {{$booking->is_users->is_Profile->contact_no}}</p>
								<p>Address : {{$booking->is_users->is_Profile->address}} , {{$booking->is_users->is_Profile->city}},{{$booking->is_users->is_Profile->state}}</p>
								<p>Zip Code : {{$booking->is_users->is_Profile->pincode}}</p>
								
							</div>

							<br />
						</div>
						<div class="col-md-4">
							<div class="profile-col-2">
								<p>Status :
									@if($booking->status == 0)
									{{ 'Pending '}}
									@endif
									@if($booking->status == 1)
									{{ 'Complete' }}
									@endif
									@if($booking->status == 2)
									{{ 'Cancel' }}
									
									@endif
									@if($booking->status == 3)
									{{ 'Reschedule' }}
									@endif
								</p>
								
								@endif
								<p class="documents">Documents :
									@foreach($k as $key)
									<div class="col-md-6">
										<a href="{{asset('/images/documents/'.$key->documents) }} "  data-lightbox="roadtrip" >
											<img src="{{asset('/images/documents/'.$key->documents) }}" class="embed">
										</a>
									</div>
									@endforeach
								</p>
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="profile-col-3">

							<!-- Add Bookings -->
								
								<!-- 
								{!! Form::open(array('route' => array('doctor.documents.add',$booking->id),'method'=>'POST')) !!}
										{!! csrf_field() !!}
								<button type ="submit" class="edit_pro_btn top"> Add Documents</button>
								{{Form::close()}}
								</div> -->
								<a href="{{route('doctor.documents.add',$booking->id)}}" class="edit_pro_btn">Add Documents</a>
								<!-- End add Bookings -->
								<!-- Complete Booking -->
								<div class="complete">
									
										{!! Form::open(['route' => ['booking.complete', $booking->id]] ) !!}
										{!! csrf_field() !!}
										<input type="hidden" value="1" name="completes">
										<input type="submit" class="edit_pro_btn tops"  name="complete" value="Complete">
										{{Form::close()}}
									
								</div>
	
								<div col-md-12>
									<div class="reschedule">
										<!-- <button type="button" class="edit_pro_btn" data-toggle="modal" data-target="#reschedule">
										Reschedule
										</button> -->
										<a class="edit_pro_btn" data-toggle="modal" data-target="#reschedule">Reschedule</a>
										<!-- Reschedule Modal -->
										<div class="modal fade" id="reschedule" role="dialog">
											<div class="modal-dialog">
												
												<!-- Modal content-->
												<div class="modal-content">
													{!! Form::open(['route' => ['booking.reschedule', $booking->id]] ) !!}
													<div class="modal-header">
														
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Reschedule Booking</h4>
													</div>
													<div class="modal-body">
														<h4> Reason </h4>
														<input type="hidden" value="3" name="reschedules">
														<textarea class="form-control" placeholder="Message" name="reschedule">
														</textarea>
													</div>
												
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
													<button type="submit" class="btn btn-default" id="sub">Submit</button>
												</div>
                                                    </div>
											</div>
										</div>
										
									</div>
								</div>
								{{Form::close()}}
								
								<!-- End Reschedule Modal -->
								<div col-md-12>
									<div class="cancel">
										<!-- <button type="button" class="edit_pro_btn" data-toggle="modal" data-target="#myModal">
										Cancel
										</button> -->
										<a class="edit_pro_btn" data-toggle="modal" data-target="#myModal">Cancel</a>
										<!-- Cancel Modal -->
										
										<div class="modal fade" id="myModal" role="dialog">
											<div class="modal-dialog">
												
												<!-- Modal content-->
												<div class="modal-content">
													{!! Form::open(['route' => ['cancel.booking', $booking->id]]) !!}
													{!! csrf_field() !!}
													
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Cancel Booking</h4>
													</div>
													<div class="modal-body">
														<h4> Reason </h4>
														<input type="hidden" value="2" name="cancels">
														<textarea class="form-control" placeholder="Message" name="reasoncancel">
														</textarea>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
														<button type="submit" class="btn btn-default" id="sub">Submit</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									{{Form::close()}}
								</div>
								<!-- End cancel booking -->

							
						
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
</div>

	<!-- Style -->
							<style>
							.profile-col-3{
								margin-top:20px;
							}
							.reschedule{
								padding-top:10px;
							}
							.cancel{
								padding-top:10px;
							}
							.embed{
								float: left;
								width: 125px;
								height: 125px;
								border: 1px solid #ff0000;
								padding: 4px;
								border-radius: 2px;
							}
							.embed:hover{
								border: 1px solid GREEN;
							}
							
							.profile-col-1{
								float:left;
								width:100%;
							}
							.profile-col-1 img{
								width:200px;
								height:200px;
								float:left;
							}
							.profile-col-1 p{
								float: left;
								width: 100%;
							}
							.top{
								margin-bottom:10px;
							}
							.edit_pro_btn .tops{
								margin-bottom:8px;
							}
							</style>
<!-- Script -->
			<script>
			$(document).ready(function(){
			$('a.embed').gdocsViewer();
			});
			</script>
			<script src="{{ asset('js/lightbox-plus-jquery.js') }}"></script>
			<!-- End Script -->
@endsection