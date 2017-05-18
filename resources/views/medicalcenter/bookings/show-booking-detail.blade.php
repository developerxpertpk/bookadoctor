@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="booking-details">
                <div class="panel panel-default">
                    <div class="panel-heading custom-panel-heading"> <span><b>{{$paitent_detail->first_name}} {{$paitent_detail->last_name}} </b></span> Booking Details <a href="{{route('medical.center.booking.show')}}" class="edit_pro_btn pull-right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a></div>

                    <div class="panel-body">
                        <div class="col-md-2">
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
                        <div class="col-md-2">
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
                        <div class="col-md-4">
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

                             <h3>Booking Payments Details</h3>

                              <table class="table table-bordered" id="patient-booking">
                            <tr class="tr-head">
                                <th>Sr/No.</th>
                                <th>Amount</th>
                                <th>Transcrion Mode</th>
                                <th>Status</th>
                            </tr>
                            
                            <?php $i=1;?>
                             @foreach($payment_transction_deatils as $booling_trans)
                                      
                                       <tr class="tr-body">
                                             <td>{{$i++}}</td>
                                             <td>{{$booling_trans->amount}}</td>
                                             <td>{{$booling_trans->transaction_mode}}</td>
                                             <td>@if($booling_trans->status==1)
                                                   <label class="primary">Payment Receved</label> 
                                                    @endif
                                                    @if($booling_trans->status==0)
                                                    <label class="warning">Payment Refunded</label>
                                                    @endif</td>
                                    </tr>
                             @endforeach
                          </table>
                        </div>

                        <div class="col-md-4">
                            <h3>Documents Details</h3>
                            <a href="{{route('patient.document.upload.form',$booking_detail->id)}}" class="edit_pro_btn" id="yourBtn">Click To Add Document</a>
@foreach($booling_docs as $booling_doc)



 <div class="col-md-6">

    
        <a href="http://www.drbooking.com/images/documents/{{$booling_doc->documents}}" data-toggle="lightbox" data-gallery="example-gallery">

            <img src="http://www.drbooking.com/images/documents/{{$booling_doc->documents}}" class="new-small-img">

        </a>
{!! Form::open(['method' => 'DELETE','route' => ['document.destroy', $booling_doc->id,$booling_doc->booking_id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'edit_pro_btn1']) !!}
                    {!! Form::close() !!}

        </div>

    @endforeach

 </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    

    <script>
                @if(Session::has('notification'))
        var type = "{{ Session::get('notification.alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('notification.message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('notification.message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('notification.message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('notification.message') }}");
                break;
        }
        @endif
    </script>
@endsection
