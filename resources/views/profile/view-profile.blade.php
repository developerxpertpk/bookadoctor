
@extends('layouts.homeLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Wellcome <b>{{Auth::user()->is_Profile->first_name}}&nbsp;{{Auth::user()->is_Profile->last_name}}</b></div>

                    <div class="panel-body">

                        <div class="col-md-3"> <img id="profil_picture" src="http://drbooking/images/profile_pic/{{Auth::user()->is_Profile->profilepic}}" alt=""></div>
                        <div class="col-md-9">
                        <span class="edit_btn_wrapper f_l_w_100" ><a class="edit_pro_btn" href="/editProfile">Edit Profile</a></span>
                            <p><span class="profile_headding">First Name:</span> {{Auth::user()->is_Profile->first_name}}</p>
                            <p><span class="profile_headding">Last Name:</span> {{Auth::user()->is_Profile->last_name}}</p>
                        <p><span class="profile_headding">About:</span> {{Auth::user()->is_Profile->about}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection