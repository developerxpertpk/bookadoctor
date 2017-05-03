@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="medical-center-booking-listing">
                <div class="panel panel-default">
                    <div class="panel-heading custom-panel-heading">Bookings Under {{Auth::user()->is_Profile->title}} Medical Center <a href="/medical/medical-dashboard" class="edit_pro_btn pull-right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a></div>

                    <div class="panel-body">
                        <div class="col-md-12">

                            <label for="from">From</label>
                            <input type="text" id="from_date" name="from_date">
                            <label for="to">to</label>
                            <input type="text" id="to_date" name="to_date">

<script type="text/javascript">





    $( function() {

        $("#to_date").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            dateFormat: 'yy-mm-dd'
        });
            $("#from_date")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2,
                    dateFormat: 'yy-mm-dd'
                }).bind("change",function(){
                    var minValue = $(this).val();
                    minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                    minValue.setDate(minValue.getDate()+1);
                    $("#to").datepicker( "option", "minDate", minValue )
                });

    });
    $('#to_date').on("change",function(){
        var from,to;
        from =$('#from_date').val();
        if(from == "")
        {
            alert('Select From First');
        }
        else
        {
            to=$(this).val();
            dateSearch(from,to);
        }
    });
    function dateSearch(from,to) {
        var table, tr, td, i;
        table = document.getElementById("patient-booking");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[6];
            if (td) {
                if (td.innerHTML>=from && td.innerHTML<=to) {
                  //  alert(td.innerHTML);
                    tr[i].style.display = "";
                } else {
                    //alert('hello sory');
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
                        </div>
                        <table class="table table-bordered" id="patient-booking">
                            <tr class="tr-head">
                                <th>Booking No</th>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Reasion</th>
                                <th>Cancel Reason</th>
                                <th>Reschedule Reason</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            <?php $i=1; ?>
                                @foreach($bookings as $booking)
                                <tr class="tr-body">
                                    <td>{{$i++}}</td>
                                    <td>{{App\Userprofile::find($booking->user_id)->first_name}} {{App\Userprofile::find($booking->user_id)->last_name}}</td>
                                    <td>{{App\Userprofile::find($booking->doctor_id)->first_name}} {{App\Userprofile::find($booking->doctor_id)->last_name}}</td>
                                    <td>{{$booking->reason}}</td>
                                    <td>{{$booking->cancel_reason}}</td>
                                    <td>{{$booking->reschedule_reason}}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->Appointment_timings)->format('Y-m-d') }}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->Appointment_timings)->format('H:i:s') }}</td>
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
                                        <a class="btn btn-info" href="{{route('show.booking.payment',$booking->id)}}">Show Payment</a>
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
                                                <h4>Refund Amount&nbsp;&nbsp;&nbsp; <input type="checkbox" name="refund_amount" value="1" required><span><h6>select Checkbox If you want refund Booking amount </h6></span></h4>
                                                    <textarea class="form-control" placeholder="Message" name="cancel_reason" required>
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

  {{--reschedule booking model end--}}
  {{--complete booking model start--}}




                        @endforeach
                      </table>

                </div>
            </div>
        </div>
    </div>

@endsection
