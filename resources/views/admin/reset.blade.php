@extends('layouts.adminLayout')

@section('content')
<div class="container">
         <div id="admin-content">
               @if ($message = Session::get('warning'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-Danger">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.reset') }}">
{{--                         <input type="hidden" name="token" value="{{ $token }}"> --}}
                        <div class="col-md-9">             
    <label for="current-password" class="col-sm-4 control-label">Current Password</label>
    <div class="col-sm-8">
      <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
      </div>
    </div>
    <label for="password" class="col-sm-4 control-label">New Password</label>
    <div class="col-sm-8">
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
    </div>
    <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
    <div class="col-sm-8">
      <div class="form-group">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-6">
      <button type="submit" class="btn btn-danger">Submit</button>
    </div>
  </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
