
@extends('layouts.doctorLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Doctor Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('Doctor.register.submit') }}">
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

                        <div class="form-group{{ $errors->has('speciality') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Specialization</label>
                            <div class="col-md-6">
                          <div class="dropdown">
                         <!--  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown button -->

                            <div id="myApp">
                            <v-select multiple:value.sync="selected" :options="options"></v-select>
                            </div>

                            
                            <input type = "checkbox" name="speciality[]" >
                                
                            </div>
                          </button>
                               
                                @if ($errors->has('speciality'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('speciality') }}</strong>
                                </span>
                                @endif
                            </div>
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
                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input  type="hidden" class="form-control" name="role" value="2" required>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status" value="{{ old('status') }}" required autofocus>
                                @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    <input id="role" type="hidden" class="form-control" name="role" value="2" required autofocus>
                    <input id="medic" type="hidden" class="form-control" name="medic" value="1" required autofocus>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="edit_pro_btn">
                                Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection