@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Doctor</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('add-doctor.store') }}">
                            {{ csrf_field() }}
                            <input id="role" type="hidden" class="form-control" name="role" value="3" required autofocus>
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

                            <div class="modal-footer">
                                <label for="email" class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="edit_pro_btn">Add Doctor</button>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
