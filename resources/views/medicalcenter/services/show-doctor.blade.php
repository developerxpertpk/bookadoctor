


@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Doctor Under {{Auth::user()->is_Profile->title}} Medical Center</div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <img id="doctor_previewimg" src="http://www.drbooking.com/images/profile_pic/{{$item->images}}" alt="">

                        </div>
                        <div class="col-md-9">
                            <div class="col-md-3">First Name : </div><div class="col-md-9">{{$item->first_name}}</div>
                            <div class="col-md-3">Last Name : </div><div class="col-md-9">{{$item->last_name}}</div>
                            <div class="col-md-3">Contact Number : </div><div class="col-md-9">{{$item->contact_no}}</div>
                            <div class="col-md-3">Address : </div><div class="col-md-9">{{$item->address}}</div>
                            <div class="col-md-3">Country : </div><div class="col-md-9">{{$item->country}}</div>
                            <div class="col-md-3">State : </div><div class="col-md-9">{{$item->state}}</div>
                            <div class="col-md-3">City : </div><div class="col-md-9">{{$item->city}}</div>
                            <div class="col-md-3">Postal Code : </div><div class="col-md-9">{{$item->pincode}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection









