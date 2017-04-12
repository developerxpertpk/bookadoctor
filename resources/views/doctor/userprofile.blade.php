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

									         <p>{!! Form::label('Documents') !!}
									    	 {{$booking->is_users->is_Profile->documents}}
									         </p>

									    @endif																						     
							</div>

@endsection