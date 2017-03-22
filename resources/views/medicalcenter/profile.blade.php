@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <?php
            $medical_center=Auth::user()->is_MedicalCenter;
                ?>
            <div class="medical-center-profile-view">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ $medical_center->first_name }}&nbsp;{{$medical_center->last_name }} </b> Profile</div>

                    <div class="panel-body">
                        <div class="profile-headding"><span>Basic Information</span>
                            <a class="edit_pro_btn pull-right" href="/medical-center-info"><i class="fa fa-fw fa-edit"></i> Edit Basic Information</a>
                            </div>
                        <div class="profile-body">

                            <div class="col-md-12 profile-basic-info">
                                <div class="col-md-2 image"><img src="{{asset('/images/profile_pic/'.$medical_center->profilepic)}}" alt="Profile Pic"/></div>
                                <div class="col-md-2">
                                    <Strong>Title: </Strong><br/>
                                    <Strong>Center Information:</Strong><br/>
                                    <Strong>Description:</Strong><br/>

                                </div>
                                <div class="col-md-8">
                                    {{ $medical_center->title }}<br/>
                                    {{ $medical_center->medical_center_info }}<br/>
                                    {{ $medical_center->description }}<br/>

                                </div>

                                </div>
                            </div>
                        <div class="profile-headding"><span>Contact Information</span> <a class="edit_pro_btn pull-right" href="{{route('medical.center.contact.info.form')}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Contact Information</a></div>
                        <div class="profile-body">
                            <div class="col-md-12 profile-basic-info">
                                {{--<div class="col-md-2 medic "><img src="{{asset('/images/profile_pic/'.$medical_center->profilepic)}}" alt="Profile Pic"/></div>--}}
                                <div class="col-md-offset-2 col-md-2">
                                    <Strong>Center Email: </Strong><br/>
                                    <Strong>Center Website:</Strong><br/>
                                    <Strong>Contact No:</Strong><br/>
                                    <Strong>Address:</Strong><br/>
                                    <Strong>Country:</Strong><br/>
                                    <Strong>State:</Strong><br/>
                                    <Strong>City:</Strong><br/>
                                    <Strong>Pincode:</Strong><br/>
                                    <Strong>Working Hours:</Strong><br/>


                                </div>
                                <div class="col-md-8">
                                    {{ $medical_center->medical_center_email }}<br/>
                                    {{ $medical_center->web_url }}<br/>
                                    +91 {{ $medical_center->contact_no }}<br/>
                                    {{ $medical_center->address }}<br/>
                                    {{ $medical_center->country }}<br/>
                                    {{ $medical_center->state }}<br/>
                                    {{ $medical_center->city }}<br/>
                                    {{ $medical_center->pincode }}<br/>
                                    {{ $medical_center->working_hours }} * 7<br/>

                                </div>

                            </div>
                            <div class="profile-headding"><span>Center Gallary</span> <a class="edit_pro_btn pull-right" href="{{route('medical.center.image.upload.form')}}"><i class="fa fa-picture-o"></i>Upload Images</a></div>
                            <div class="profile-body">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
