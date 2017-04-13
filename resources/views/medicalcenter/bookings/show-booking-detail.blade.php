@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="booking-details">
                <div class="panel panel-default">
                    <div class="panel-heading">Booking Details</div>

                    <div class="panel-body">
                        <div class="col-md-3">
                            <h3>Patient Details</h3>
                            <p><img id="logo-img" src="http://www.drbooking.com/images/profile_pic/{{$paitent_detail->images}}"></p>
                          <p>Name : {{$paitent_detail->first_name}}  {{$paitent_detail->last_name}}</p>
                            <p>Contact Number : +91-{{$paitent_detail->contact_no}}</p>
                            <p>Address : {{$paitent_detail->address}}</p>
                            <p>Country : {{$paitent_detail->country}}</p>
                            <p>State : {{$paitent_detail->state}}</p>
                            <p>City : {{$paitent_detail->city}}</p>
                            <p>Pincode : {{$paitent_detail->pincode}}</p>
                        </div>
                        <div class="col-md-3">
                            <h3>Doctor Details</h3>
                            <p><img id="logo-img" src="http://www.drbooking.com/images/profile_pic/{{$doctor_detail->images}}"></p>
                            <p>Name : {{$doctor_detail->first_name}}  {{$doctor_detail->last_name}}</p>
                            <p>Contact Number : +91-{{$doctor_detail->contact_no}}</p>
                            <p>Address : {{$doctor_detail->address}}</p>
                            <p>Country : {{$doctor_detail->country}}</p>
                            <p>State : {{$doctor_detail->state}}</p>
                            <p>City : {{$doctor_detail->city}}</p>
                            <p>Pincode : {{$doctor_detail->pincode}}</p>
                        </div>
                        <div class="col-md-3">
                            <h3>Booking Details</h3>
                            <p>
                                @if($booking_detail->status==0)
                                    <label class="primary">Booking Pending</label>
                                @endif
                                @if($booking_detail->status==1)
                                    <label class="success">Booking Complete</label>
                                @endif
                                @if($booking_detail->status==2)
                                    <label class="warning">Booking Canceled</label>
                                @endif
                                @if($booking_detail->status==3)
                                    <label class="danger">Booking Rescheduled</label>
                                @endif
                            </p>
                            <p>
                                @if($booking_detail->payment_status==0)
                                    <label class="warning">payment Pending</label>
                                @endif
                                @if($booking_detail->payment_status==1)
                                    <label class="success">payment Complete</label>
                                @endif
                            </p>
                            <p> Disease Type : {{$booking_detail->reason}}</p>
                            <p> Appointment Date : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking_detail->Appointment_timings)->format('Y-m-d') }}</p>
                            <p> Appointment Time : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking_detail->Appointment_timings)->format('H:i:s') }}</p>
                            @if($booking_detail->status==2)
                            <p>Booking Cancellation Reason : {{$booking_detail->cancel_reason}}</p>
                            @endif
                            @if($booking_detail->status==3)
                                <p>Booking Rescheduling Reason : {{$booking_detail->reschedule_reason}}</p>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <h3>Documents Details</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
