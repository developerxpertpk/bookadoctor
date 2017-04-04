@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Doctor Listing
                        {{--<a class="" href="{{route('add.doctor.form')}}" data-toggle="modal" data-target=".bs-example-modal-lg"></a></div>--}}
                    <button type="button" class="edit_pro_btn pull-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-fw fa-edit"></i> Regester Doctor</button>
                        <!-- Large modal -->


                        <div class="modal fade bs-example-modal-lg" data-easein="tada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add Doctors</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('add-doctor.store') }}">
                                            {{ csrf_field() }}
                                            <input id="role" type="hidden" class="form-control" name="role" value="2" required autofocus>
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">First Name</label>
                                                <div class="col-md-6">
                                                    <input id="firstname" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                                    @if ($errors->has('first_name'))
                                                        <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label for="username" class="col-md-4 control-label">Last Name</label>
                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control" name="last_name" value="{{ old('username') }}" required autofocus>
                                                    @if ($errors->has('last_name'))
                                                        <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                                                {{--<label for="password" class="col-md-4 control-label">Password</label>--}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<input id="password" type="password" class="form-control" name="password" required>--}}
                                                    {{--@if ($errors->has('password'))--}}
                                                        {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                {{--</span>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Reset</button>
                                                <button type="submit" class="edit_pro_btn">Add Doctor</button>
                                            </div>

                                            {{--<div class="form-group">--}}
                                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                            {{--<button type="submit" class="edit_pro_btn">--}}
                                            {{--Add Doctor--}}
                                            {{--</button>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <div class="panel-body">

                        <div class="show-admin">
                            <table class="table table-bordered">
                                <tr class="tr-head">
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th width="206px">Action</th>
                                </tr>
                                <?php $i=0;?>
                                @foreach ($doctors as $key => $item)
                                 <?php
//                                        echo "<pre>";
//                                print_r($users);
//                                print_r($item->is_Doctor->medic_id);
//                                print_r(Auth::user()->is_MedicalCenter->id);
//                                print_r($item->is_Doctor->first_name);
//                                print_r($item->is_Doctor->last_name);
//                                print_r($item->email);
//                                print_r( $item->is_Doctor->status );
//                                    die('hello');
                                    ?>

                                @if($item->medic_id == Auth::user()->is_MedicalCenter->id)

                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>@foreach($users as $ueser)
                                             @if($ueser->id == $item->user_id)
                                      {{  $ueser->email}}
                                                @endif
                                        @endforeach  </td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('add-doctor.show',$item->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('medical.edit',$item->id) }}">Edit</a>

                                            <a class="btn btn-primary" href="" data-toggle="modal" data-target=".bs-assign-speciality">Assign speciality</a>

                                            <a class="btn btn-primary" href="" data-toggle="modal" data-target="#myModelkkklpp">Add Doctor Schedule</a>



                                            <div class="modal fade bs-assign-speciality" data-easein="tada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Add Specilaty with {{ $item->first_name }}&nbsp;&nbsp;{{ $item->last_name }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('specilaty.form.submit')}}" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" value="{{$item->id}}" name="doc_id">
                                                                <table>
                                                                    <tr><th>Specilaty</th></tr>
                                                                    @foreach($specilaty as $key => $doc_specilaty)

                                                                        <tr><td colspan="2"> <input type="checkbox" value="{{$doc_specilaty->id}}" name="specilaty[{{$doc_specilaty->name}}]">&nbsp;{{$doc_specilaty->name}}</td></tr>
                                                                    @endforeach

                                                                </table>
                                                                <input type="submit" value="Add Specilaty to {{ $item->first_name }}" class="edit_pro_btn">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="myModelkkklpp" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Modal Header</h4>
                                                        </div>
                                                        {!! Form::open(['route' => 'doctor.schedule.create','method'=>'POST','files'=> true]) !!}
                                                        <input type="hidden" name="user_id" value="{{$item->id }}">
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



                                            {!! Form::open(['method' => 'DELETE','route' => ['add-doctor.destroy', $item->user_id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        </td>


                                        {!! Form::close() !!}

                                    </tr>
                                        @endif
                                        @endforeach


                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
