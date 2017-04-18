@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> User's Profile
					{!! csrf_field() !!}
					<div class="panel-body">
						<div class="col-md-8">
							{!! Form::open()!!}
							
							<p><b>User's Profile</b></p>
							<div class="form-group">
								
								@if($booking->payment_status == 1)
								<p>{!! Form::label('Booking Id') !!}
									{{$booking->id}}
								</p>
								<p>{!! Form::label('Appointment Date & Time') !!}
									{{$booking->Appoitment_timings}}
								</p>
								<p>{!! Form::label('Issue') !!}
									{{$booking->reason}}
								</p>
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
								
								<p>{!! Form::label('Name') !!}
									{{$booking->is_users->is_Profile->first_name}}  {{$booking->is_users->is_Profile->last_name}}
								</p>
								<p>{!! Form::label('Contact Number') !!}
									{{$booking->is_users->is_Profile->contact_no}}
								</p>
								<p>{!! Form::label('Address') !!}
									{{$booking->is_users->is_Profile->address}}
								</p>
								<p>{!! Form::label('State') !!}
									{{$booking->is_users->is_Profile->state}}
								</p>
								<p>{!! Form::label('City') !!}
									{{$booking->is_users->is_Profile->city}}
								</p>
								<p>{!! Form::label('Country') !!}
									{{$booking->is_users->is_Profile->country}}
								</p>
								<p>{!! Form::label('Zip Code') !!}
									{{$booking->is_users->is_Profile->pincode}}
								</p>
								@endif
								<p class="documents">{!! Form::label('Documents') !!}

											@foreach($k as $key)									

									<a href="{{asset('/images/documents/'.$key->documents)}}" data-lightbox="{{asset('/images/documents/'.$key->documents)}}">
									<embed src="{{asset('/images/documents/'.$key->documents)}}" width="30" height="30"  ></embed></a>
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
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Cancel Booking</h4>
													</div>
													<div class="modal-body">
														<h4> Reason </h4>
														<textarea class="form-control" placeholder="Message" name="reason">
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
												{!! Form::open(['route' => ['cancel.booking', $booking->id]] ) !!}
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Reschedule Booking</h4>
													</div>
													<div class="modal-body">
														<h4> Reason </h4>
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
										<div class="complete">
										{!! Form::open(['route' => ['booking.complete', $booking->id]] ) !!}
										<input type="submit" class="edit_pro_btn"  name="complete" value="Complete">
										
										
										</div>
										{!! Form::close() !!}

									</div>
									
									
								</div>
								
								
								<!-- Style -->
								<style>
								.documents img{
									width:30px;
									height:30px;
								}
								</style>
								<!-- EndStyle -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection