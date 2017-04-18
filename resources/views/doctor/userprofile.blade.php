@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> User's Profile
					{!! csrf_field() !!}
					<div class="panel-body">
						<div class="col-md-12">
							{!! Form::open()!!}
							
						
							<form class="form-horizontal">
							@if($booking->payment_status == 1)
							<div class="form-group width_100">
							
							<label for="inputEmail" class="control-label col-xs-2">Booking Id</label>
								<div class="col-xs-4">
           						<input type="text" class="form-control" id="inputEmail"  value="{{$booking->id}}">
								</div>
							 

							 
							
							<label for="inputEmail" class="control-label col-xs-2">Name</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->is_users->is_Profile->first_name}}  {{$booking->is_users->is_Profile->last_name}}">
								</div>
								</div>

							 <div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">Diseases</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->reason}}">
								</div>
							
							 
							<label for="inputEmail" class="control-label col-xs-2">Contact Number</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->is_users->is_Profile->contact_no}}">
								</div>
							 </div>


							 <div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">Address</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->is_users->is_Profile->address}}">
								</div>
							
							 
							<label for="inputEmail" class="control-label col-xs-2">City</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->is_users->is_Profile->city}}">
								</div>
							 </div>


							  <div class="form-group width_100">
							<label for="inputEmail" class="control-label col-xs-2">State</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->is_users->is_Profile->state}}">
								</div>
							
							 
							<label for="inputEmail" class="control-label col-xs-2">Zip Code</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->is_users->is_Profile->pincode}}">
								</div>
							 </div>

							   <div class="form-group width_100">
							
							<label for="inputEmail" class="control-label col-xs-2">Zip Code</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->is_users->is_Profile->pincode}}">
								</div>

								<label for="inputEmail" class="control-label col-xs-2">Appointment Date</label>
								<div class="col-xs-4">
           						 <input type="text" class="form-control" id="inputEmail"  value="{{$booking->Appoitment_timings}}">
								</div>
							 </div>
								
								<p>{!! Form::label('Status') !!}
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
								<p class="documents">{!! Form::label('Documents') !!}

										@foreach($k as $key)									

									<a href="{{asset('/images/documents/'.$key->documents) }}" data-lightbox=" {{asset('/images/documents/'.$key->documents) }}" class="embed">
									<img src="{{asset('/images/documents/'.$key->documents) }}" class="documents">
								</a>
										@endforeach
								</p>
								
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="button" class="edit_pro_btn" data-toggle="modal" data-target="#myModal">
									Cancel
									</button>
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
										{{Form::close()}}
										<!--  End Cancel Modal -->
										<button type="button" class="edit_pro_btn" data-toggle="modal" data-target="#reschedule">
										Reschedule
										</button>
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
													</div>

													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
														<button type="submit" class="btn btn-default" id="sub">Submit</button>
													</div>

												</div>
												
											</div>
										</div>
										{{Form::close()}}

										<!-- End Reschedule Modal -->
										<!-- Previous History -->
										
										<!-- End Previous History -->

										<!-- Complete Booking -->
										<div class="complete">
										{!! Form::open(['route' => ['booking.complete', $booking->id]] ) !!}
										{!! csrf_field() !!}
										<input type="hidden" value="1" name="completes">
									<input type="submit" class="edit_pro_btn"  name="complete" value="Complete">
										
										
										</div>
										{!! Form::close() !!}
									</div>
									<!-- End Complete Booking -->
									
								</div>
								</form>
								
								
								<!-- Style -->
								<style>
								.documents img{
									width:30px;
									height:30px;
								}

								.width_100{
								float:left;
								width:100%;
								}
								.embed{
									width:50px;
									height:50px;
								}

								</style>
								<!-- EndStyle -->

								<!-- Script -->
								<script>
								$(document).ready(function(){
								 $('a.embed').gdocsViewer();
								});
								</script>

								<!-- End Script -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection