@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="paitent-booking-history">
                <div class="panel panel-default">
                    <div class="panel-heading">Patient Booking History</div>

                    <div class="panel-body">
                        <select class="form-control chosepatient" name="sem" id="patient">
                            <option value="" selected="selected" disabled>Select Patient</option>
                    @foreach($patient_history as $patients)
                        @foreach($patients as $patient)
                           <option value="{{$patient->user_id}}"> {{$patient->first_name}} {{$patient->last_name}}</option>
                            @endforeach
                            @endforeach
                        </select>

                        <div class="showdata">
                            <table class="table table-responsive">

                                <thead class="table_head">
                                <tr id="r_head">
                                    <th>Sr.No</th>
                                    <th>Booking No</th>
                                    <th>Patient Name</th>
                                    {{--<th>Doctor Name</th>--}}
                                    <th>Disease Name</th>
                                    <th>Cancel Reason</th>
                                    <th>Reschedule Reason</th>
                                    <th>Appointment Date & Time</th>
                                    <th width="200px">Status</th>


                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
