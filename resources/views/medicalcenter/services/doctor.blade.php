@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Doctor Listing
                        {{--<a class="" href="{{route('add.doctor.form')}}" data-toggle="modal" data-target=".bs-example-modal-lg"></a></div>--}}
                    <button type="button" class="edit_pro_btn pull-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-fw fa-edit"></i> Regester Doctor</button>
                    <div class="panel-body">

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
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="edit_pro_btn">Save changes</button>
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


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
