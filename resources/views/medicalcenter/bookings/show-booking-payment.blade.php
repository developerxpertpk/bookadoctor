@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="booking-payment-detail">
                <div class="panel panel-default">
                    <div class="panel-heading custom-panel-heading"><span><b>{{$paitent_detail->first_name}} {{$paitent_detail->last_name}} </b></span> Booking Payment Details</div>
                    <div class="panel-body">
                        <table class="table table-bordered" id="patient-booking">
                            <tr class="tr-head">
                                <th>Sr/No.</th>
                                <th>Payment Id</th>
                                <th>Doctor Name</th>
                                <th>Amount</th>
                                <th>Transaction No</th>
                                <th>Transaction Mode</th>
                                <th>Payment Date</th>
                                <th>Payment Time</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            <?php $i=1; ?>
                        @foreach($payment_deatils as $payment_deatil)
                                <tr class="tr-body">
                                    <td>{{$i++}}</td>
                                    <td>{{$payment_deatil->id}}</td>
                                    <td>{{$payment_deatil->doctor_name}}</td>
                                    <td>{{$payment_deatil->amount}}</td>
                                    <td>{{$payment_deatil->transaction_id}}</td>
                                    <td>{{$payment_deatil->transaction_mode}}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment_deatil->created_at)->format('Y-m-d') }}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment_deatil->created_at)->format('H:i:s') }}</td>
                                    <td>{{$payment_deatil->status}}</td>
                                    <td><a class="btn btn-warning" href="" data-toggle="modal" data-target="#update_booking_payment{{$payment_deatil->id}}">Update</a></td>

                                </tr>

                            {{--update booking payment model--}}
                                <div id="update_booking_payment{{$payment_deatil->id}}" data-easein="whirlIn" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Complete Booking Detail</h4>
                                            </div>
                                            {!! Form::open(['route' => ['patient.booking.payment.update', $payment_deatil->id],'method'=>'post']) !!}
                                            <div class="modal-body">


                                                {!! csrf_field() !!}


                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                                                <button type="submit" class="btn btn-default" id="sub">Submit</button>
                                            </div>
                                            {{Form::close()}}
                                        </div>

                                    </div>
                                </div>

                        @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>

                    </div>
@endsection
