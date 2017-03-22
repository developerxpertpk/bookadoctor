{{-- @extends('layouts.app') --}}
@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Medical Center Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('medical.center.regester.submit') }}">
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
                        <div class="form-group{{ $errors->has('domain_name') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Sub Domain Name</label>

                            <div class="col-md-6">
                                <input id="domain_name" type="text" class="form-control" name="domain_name" value="{{ old('domain_name') }}" required autofocus>

                                @if ($errors->has('domain_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('domain_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sub_domain_name') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Sub Domain</label>

                            <div class="col-md-6">
                                <input id="sub_domain_name" type="text" class="form-control" name="sub_domain_name" value="{{ old('sub_domain_name') }}" disabled autofocus>

                                @if ($errors->has('sub_domain_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_domain_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <script type="text/javascript">
                            jQuery(document).ready(function() {
                                $('#domain_name').change(function () {
                                    $('#sub_domain_name').val($(this).val() + '.drbooking.com');
                                });
                            });
                        </script>
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
