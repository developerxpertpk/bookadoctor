@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <?php
            $medical_center=Auth::user()->is_Profile;
                ?>
            <div class="medical-center-profile-view">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ $medical_center->first_name }}&nbsp;{{$medical_center->last_name }} </b> Profile</div>

                    <div class="panel-body">
                        <div class="profile-headding"><span>Basic Information</span>

                            <a class="edit_pro_btn pull-right" href="{{route('medical.center.info.form')}}"><i class="fa fa-fw fa-edit"></i> Edit Basic Information</a>
                            </div>
                            </div>

                        <div class="profile-body">

                            <div class="col-md-12 profile-basic-info">
                                <div class="col-md-2 image"><img src="{{asset('/images/profile_pic/'.$medical_center->images)}}" alt="Profile Pic"/></div>
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

                                </div>

                            </div>
                            <div class="profile-headding"><span>Center Gallary</span> <a class="edit_pro_btn pull-right" href="{{route('medical.center.image.upload.form')}}"><i class="fa fa-picture-o"></i>Upload Images</a></div>
                            <div class="profile-body">

                                        @foreach ($images_gallery as $key => $gallery_img)


                                         <div class="col-md-3">






                                            <a data-toggle="lightbox" href="#gal_{{$gallery_img->medical_center_id}}_{{$gallery_img->id}}">

                                                <img src="http://www.drbooking.com/images/gallery_pic/{{$gallery_img->images}}" class="small-img">

                                            </a>

                                            <div id="gal_{{$gallery_img->medical_center_id}}_{{$gallery_img->id}}" class="lightbox fade"  tabindex="-1" role="dialog" aria-hidden="true">

                                                <div class='lightbox-dialog'>

                                                    <div class='lightbox-content'>
                                                        {!! Form::open(['method' => 'DELETE','route' => ['image.destroy', $gallery_img->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                        <button type="button" class="close" data-dismiss="lightbox" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <img src="http://www.drbooking.com/images/gallery_pic/{{$gallery_img->images}}">

                                                        <div class='lightbox-caption'>

                                                            Write here your caption heress

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        @endforeach

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
