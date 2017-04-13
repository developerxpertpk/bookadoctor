@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <?php
            $medical_center=Auth::user()->is_MedicalCenter;


            ?>
            <div class="medical-center-profile-view">
                <div class="panel panel-default">
                    {{--<div class="panel-heading"><b>{{ $medical_center->first_name }}&nbsp;{{$medical_center->last_name }} </b> Profile</div>--}}

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <!--
    @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif -->
                        <!--  check if any error -->
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{  $message }}</p>
                            </div>
                        @endif


                        <div class="profile-headding"><span>Change Password</span>
                            <a class="edit_pro_btn pull-right" href="" data-toggle="modal" data-target="#changepassword"><i class="fa fa-fw fa-edit"></i> Change Password</a>
                        </div>
                            <div class="profile-headding"><span>Manage Opening & Closing hours and days</span>

                            <a class="edit_pro_btn pull-right" href="" data-toggle="modal" data-target="#opening_closing_hour"><i class="fa fa-fw fa-edit"></i> Manage Opening & Closing hours and days</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--model for change password--}}

    <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="user"><div class="user-icon text-center"><img id="logo-img" src="http://www.drbooking.com/images/profile_pic/{{Auth::user()->is_Profile->images}}"></div></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    {{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
                </div>
                <div class="modal-body">
                    <form id="form-change-password" role="form" method="POST" action="{{route('medical.center.postpwd')}}"  class="form-horizontal">

                        <div class="col-md-9">

                            <label for="current-password" class="col-sm-6 col-md-6 col-lg-6 control-label">Current Password</label>
                            <div class="col-sm-6 col-md-6 col-lg-6">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div  class="form-group {{ $errors->has('current-password') ? ' has-error' : '' }}">

                                    <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Current Password" required autofocus>

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                          <strong>{{ $errors->first('current-password') }}</strong>
                      </span>
                                    @endif
                                </div>
                            </div>


                            <label for="password" class="col-sm-6 col-md-6 col-lg-6 control-label">New Password</label>
                            <div class="col-sm-6 col-md-6 col-lg-6">


                                <div  class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                    <strong>{{ $errors->first('current-password') }}</strong>
                </span>
                                    @endif
                                </div>

                            </div>

                            <label for="password_confirmation" class="col-sm-6 col-md-6 col-lg-6 control-label">Re-enter Password</label>
                            <div class="col-sm-6 col-md-6 col-lg-6">


                                <div  class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-6 col-md-6 col-lg-6 ">
                                <button type="submit" class="edit_pro_btn">Change Password</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--model for opening closeing hours or day--}}
    <div id="opening_closing_hour" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                {!! Form::open(['route' => 'medical.schedule.create','method'=>'POST','files'=> true]) !!}
                <input type="hidden" name="user_id" value="{{Auth::user()->id }}">
                <div class="modal-body">
                    <p>Select Working Days </p>
                    <div class="weekDays-selector">
                        <input type="checkbox" id="weekday-mon" class="weekday" name="weekdays[]" value="mon"/>
                        <label for="weekday-mon">Monday</label>
                        <input type="checkbox" id="weekday-tue" class="weekday" name="weekdays[]" value="tue"/>
                        <label for="weekday-tue">Tuesday</label>
                        <input type="checkbox" id="weekday-wed" class="weekday" name="weekdays[]" value="wed"/>
                        <label for="weekday-wed">Wednesday</label>
                        <input type="checkbox" id="weekday-thu" class="weekday" name="weekdays[]" value="thu"/>
                        <label for="weekday-thu">Thursday</label>
                        <input type="checkbox" id="weekday-fri" class="weekday" name="weekdays[]" value="fri"/>
                        <label for="weekday-fri">Friday</label>
                        <input type="checkbox" id="weekday-sat" class="weekday" name="weekdays[]" value="sat"/>
                        <label for="weekday-sat">Saturday</label>
                        <input type="checkbox" id="weekday-sun" class="weekday" name="weekdays[]" value="sun"/>
                        <label for="weekday-sun">Sunday</label>
                    </div>

                </div>
                <p> Select Your Working Hour's</p>
                <div class="col-md-2">
                    <p>From </p>
                </div>
                <div class="col-md-4">
                    <div class="input-group clockpicker">

                        <input type="text" class="form-control" name="from_time" value="09:30" >
                        <span class="input-group-addon">
										<span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
									</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <p>To</p>
                </div>

                <div class="col-md-4">
                    <div class="input-group clockpicker">

                        <input type="text" class="form-control" name="to_time" value="09:30" >
                        <span class="input-group-addon">
										<span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
									</span>
                    </div>
                </div>
                <!-- Clock script -->
                <script type="text/javascript">
                    $('.clockpicker').clockpicker({
                        placement: 'top',
                        align: 'left',
                        donetext: 'Done'
                    });
                </script>
                <!-- End Clock Script -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL -->

@endsection
