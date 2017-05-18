{{-- @extends('layouts.app') --}}
@extends('layouts.medicalCenterLayout')
@section('content')


    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user-md fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div> {{App\medicalcenter_doctor::where('medicalcenter_id','=',Auth::user()->id)->get()->count()}}

                        <div>Total No Of Doctors</div>
                    </div>
                </div>
            </div>
            <a href="{{route('add-doctor.index')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       <div class="huge">$ {{ App\plan::where('id','=',Auth::user()->is_Profile->plan_id)->first()->amount}}</div>
                        <div>Subscription {{ App\plan::where('id','=',Auth::user()->is_Profile->plan_id)->first()->name}}</div>
                    </div>
                </div>
            </div>
            <a href="{{route('subscription.plans.details')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Booking::where('medic_id','=',Auth::user()->id)->where('status','=',3)->count()}}</div>
                        <div>Booking Rescheduled!</div>
                    </div>
                </div>
            </div>
            <a href="{{route('medical.center.rescheduled.booking.show')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details
                    
                    </span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Booking::where('medic_id','=',Auth::user()->id)->where('status','=',0)->count()}}</div>
                        <div>Booking Pending!</div>
                    </div>
                </div>
            </div>
            <a href="{{route('medical.center.pending.booking.show')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>



{{--second row--}}
<div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Booking::where('medic_id','=',Auth::user()->id)->where('status','=',2)->count()}}</div>
                        <div>Booking Canceled!</div>
                    </div>
                </div>
            </div>
            <a href="{{route('medical.center.canceled.booking.show')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
<div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Booking::where('medic_id','=',Auth::user()->id)->where('status','=',1)->count()}}</div>
                        <div>Booking Completed!</div>
                    </div>
                </div>
            </div>
            <a href="{{route('medical.center.completed.booking.show')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
<div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ App\Booking::where('medic_id','=',Auth::user()->id)->count()}}</div>
                        <div>Total Booking!</div>
                    </div>
                </div>
            </div>
            <a href="{{route('medical.center.booking.show')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>




@endsection
