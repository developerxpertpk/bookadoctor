{{-- @extends('layouts.app') --}}
@extends('layouts.doctorLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Password Reset</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('change.password') }}">
                          {!! csrf_field() !!}
                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"> Old Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="old_password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"> New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="new_password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Conform Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="confirm_password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div>
                             <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="edit_pro_btn">
                                            Change Password
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
