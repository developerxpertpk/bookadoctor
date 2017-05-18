{{-- @extends('layouts.app') --}}
@extends('layouts.doctorLayout')
@section('content')


    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div> {{$count}}

                        <div>Total No. Of Patients</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-hospital-o fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div> {{$medic_name}}

                        <div>Medical Center Name </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sticky-note fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>{{$count}}
                        <div>Total No. of Bookings</div>
                    </div>
                </div>
            </div>
                  </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sticky-note fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>{{ App\Booking::where('doctor_id','=',Auth::user()->id)->where('status','=',1)->count()}}
                        <div>Complete Bookings</div>
                    </div>
                </div>
            </div>
                  </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sticky-note fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>{{App\Booking::where('doctor_id','=',Auth::user()->id)->where('status','=',0)->count()}}
                        <div>Pending Bookings</div>
                    </div>
                </div>
            </div>
                  </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sticky-note fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>{{ App\Booking::where('doctor_id','=',Auth::user()->id)->where('status','=',3)->count()}}
                        <div>Reschedule Bookings</div>
                    </div>
                </div>
            </div>
                  </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sticky-note fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>{{ App\Booking::where('doctor_id','=',Auth::user()->id)->where('status','=',2)->count()}}
                        <div>Cancel Bookings</div>
                    </div>
                </div>
            </div>
                  </div>
    </div>



@endsection
