@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="medical-center-booking-listing">
                <div class="panel panel-default">
                    <div class="panel-heading custom-panel-heading">Bookings Under {{Auth::user()->is_Profile->title}} Medical Center <a href="" class="edit_pro_btn pull-right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a></div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr class="tr-head">
                                <th>Booking No</th>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Reasion</th>
                                <th>Cancel Reason</th>
                                <th>Reschedule Reason</th>
                                <th>Appointment</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            <?php $i=1; ?>
                                @foreach($bookings as $booking)
                                <tr class="tr-body">
                                    <td>{{$i++}}</td>
                                    <td>{{App\Userprofile::find($booking->user_id)->first_name}}</td>
                                    <td>{{App\Userprofile::find($booking->doctor_id)->first_name}}</td>
                                    <td>{{$booking->reason}}</td>
                                    <td>{{$booking->cancel_reason}}</td>
                                    <td>{{$booking->reschedule_reason}}</td>
                                    <td>{{$booking->Appointment_timings}}</td>
                                    <td>
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
                                    </td>
                                    <td style="width: 350px">

                                            <a class="btn btn-info" href="{{route('show.booking.detail',$booking->id)}}">Show Booking</a>
                                        @if($booking->status != 2)
                                        <a class="btn btn-danger" href="" data-toggle="modal" data-target="#cancel_booking{{$booking->id}}">Cancel Booking</a>
                                           @endif
                                        @if($booking->status != 3)
                                        <a class="btn btn-warning" href="" data-toggle="modal" data-target="#reschedule_booking{{$booking->id}}">Reschedule Booking</a>
                                            @endif
                                        @if($booking->status != 1)
                                        <a class="btn btn-success" href="{{route('complete.booking.detail',$booking->id)}}">Complete Booking</a>
                                        @endif
                                    </td>

                                </tr>


  {{--cancel booking model start--}}
                                <div id="cancel_booking{{$booking->id}}" data-easein="perspectiveLeftIn" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Complete Booking Detail</h4>
                                            </div>
                                            <div class="modal-body">

                                                {!! Form::open(['route' => ['medical.cancel.booking', $booking->id]]) !!}
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="cancel_status" value="2"/>
                                                    <h4> Reason </h4>
                                                    <textarea class="form-control" placeholder="Message" name="cancel_reason">
                                           </textarea>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                                                    <button type="submit" class="btn btn-default" id="sub">Submit</button>
                                                </div>
                                            {{Form::close()}}

                                            </div>

                                        </div>
                                    </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
    {{--cancel booking model end--}}
   {{--reschedule booking model start--}}
                                <div id="reschedule_booking{{$booking->id}}" data-easein="whirlIn" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Complete Booking Detail</h4>
                                            </div>
                                            <div class="modal-body">

                                                {!! Form::open(['route' => ['medical.reschedule.booking', $booking->id]]) !!}
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="reschedule_status" value="3"/>
                                                <h4> Reason </h4>
                                                <textarea class="form-control" placeholder="Message" name="reschedule_reason">
                                           </textarea>

                                            </div>

                                                     <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                                                          <button type="submit" class="btn btn-default" id="sub">Submit</button>
                                                    </div>
                                            {{Form::close()}}
                                                  </div>

                                                     </div>
                                               </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
  {{--reschedule booking model end--}}
  {{--complete booking model start--}}




                        @endforeach
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
