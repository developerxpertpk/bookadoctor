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
                    
    @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif 
                        <!--  check if any error -->
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{  $message }}</p>
                            </div>
                        @endif


                        <div class="profile-headding"><span>Change Password</span>
                            <a class="edit_pro_btn pull-right" href="" data-toggle="modal" data-target="#changepassword"><i class="fa fa-fw fa-edit"></i> Change Password</a>
<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <div class="user">
                    <div class="user-icon text-center">
                    <img id="logo-img" src="http://www.drbooking.com/images/profile_pic/{{Auth::user()->is_Profile->images}}">
                    </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       <form id="form-change-password" role="form" method="POST" action="{{route('medical.center.postpwd')}}"  class="form-horizontal">

                        <div class="col-md-9">

                            <label for="current-password" class="col-sm-6 col-md-6 col-lg-6 control-label">Current Password</label>
                            <div class="col-sm-6 col-md-6 col-lg-6">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

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
                                    <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required />

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

                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password" required /s>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-sm-offset-4 col-sm-8 col-md-8 col-lg-8 ">
                                <button type="submit" class="edit_pro_btn">Change Password 
                                </button>
                            </div>
                            </div>
                        </div>

                    </form>
      </div>
      <div class="modal-footer">
       {{--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

                        </div>
                            <div class="profile-headding"><span>Add Mecical Center Schedule</span>

                            <a class="edit_pro_btn pull-right" href="" data-toggle="modal" data-target="#opening_closing_hour"><i class="fa fa-fw fa-edit"></i> Add Schedule</a>
                        </div>

                  
                    <table class="table table-bordered" id="doctor">
        <div class="col-md-4" >
        <div class="weeks">
        <tr>
        <th> Weekdays </th>
        <th> Time-In </th>
        <th> Time-Out </th>
        <th> Action </th>
        </tr>
        @if(isset($schedules))
            @foreach($schedules as $key)
        <tr>

            <td>{{$key->day}}</td>
            <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$key->time_in)->format('H:i:s')}}</td>
            <td>{{\Carbon\Carbon::createFromFormat('H:i:s', $key->time_out)->format('H:i:s')}}</td>
            <td><a href="{{route('delete.medicalcenter.schedule',$key->user_id)}}" class="edit_pro_btn">Remove</a>
             <a href=""  name="edit" data-toggle="modal" data-target="#myModelkkk{{$key->id}}" class="edit_pro_btn">Edit</a></td>
                <!-- Model Schedule -->

             <div id="myModelkkk{{$key->id}}" data-easein="tada" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Manage Schedule</h4>
                                                        </div>
                        
                                                        <div class="modal-body">
                                                        {!! Form::open(['route' => [('edit.medicalcenter.schedule'),$key->user_id],'method'=>'POST','files'=> true]) !!}
                                         
                                                              <div class="styled-select blue semi-square">
                                                              <select name="days">
                                                                <option class="cselect" value="{{$key->day}}">{{$key->day}}</option>
                                                                 </select>
                                                            </div>
                                                       
                                                        <p> Select Your Working Hour's</p>
                                                        <div class="col-md-2">
                                                            <p>From </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input-group clockpicker">

                                                                <input type="text" class="form-control" name="from_time" value="{{$key->time_in}}" >
                                                                <span class="input-group-addon">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>To</p>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="input-group clockpicker2">

                                                                <input type="text" class="form-control" name="to_time" value="{{$key->time_out}}" >
                                                                <span class="input-group-addon">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </span>
                                                            </div> </div>
                                                             <!-- Clock script -->
                                                        
                                                        <!-- End Clock Script -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-default">Submit</button>
                                                           
                                                        </div>
                                                         {{ Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </tr>
        </div>
        </div>
      
       

        @endforeach
        @endif
      
        </table>
        </div>
                
    {{--model for change password--}}
    

    {{--model for opening closeing hours or day--}}
    <div id="opening_closing_hour" class="modal fade" role="dialog">
         <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Manage Opening & Closing hours and days</h4>
                                                        </div>
                                                        {!! Form::open(['route' => 'medical.schedule.create','method'=>'POST','files'=> true]) !!}
                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                        <div class="modal-body">
                                                           
                                                           
                                                              <div class="styled-select blue semi-square">
                                                              <select name="days">
                                                                <option class="cselect">Week Days</option>
                                                                <option value="Monday">Monday</option>
                                                                <option value="Tuesday">Tuesday</option>
                                                             <option value="Wednesday">Wednesday</option>
                                                                  <option value="Thursday">Thursday</option>
                                                                   <option value="Friday">Friday</option>
                                                                     <option value="Saturday">Saturday</option>
                                                                    <option value="Sunday">Sunday</option>

                                                              </select>
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
                                                       
                                                        </div>
                                                         <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-default">Submit</button>
                                                            {{ Form::close() }}
                                                    </div>
                                                </div>
    </div>
    </div>
<script type="text/javascript">
                                                            $('.clockpicker').clockpicker({
                                                                placement: 'top',
                                                                align: 'left',
                                                                donetext: 'Done',
                                                                default:'{{$key->time_in}}'
                                                            });
                                                            $('.clockpicker2').clockpicker({
                                                                placement: 'top',
                                                                align: 'left',
                                                                donetext: 'Done',
                                                                default:'{{$key->time_out}}'
                                                            });

                                                        </script>
    <!-- MODAL -->
    <script>
                @if(Session::has('notification'))
        var type = "{{ Session::get('notification.alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('notification.message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('notification.message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('notification.message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('notification.message') }}");
                break;
        }
        @endif
    </script>
@endsection
