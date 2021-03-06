@extends('layouts.adminLayout')
@section('content')
<div id="admin-content">
  {!! Form::open(['route' =>['update.medical.submit',$medicaldetail->id],'class' => 'add-admin-form','method'=>'POST','files'=> true]) !!}
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <h2 class="text-center">Edit Medical Center Info</h2>
  <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
    <div class="controls">
    Title:  {!! Form::text('name', $medicaldetail->title, array('placeholder' => 'Your Name','class' => 'form-control',)) !!}
      <span class="help-block">{{ $errors->first('name', ':message') }}</span>
    </div>
  </div>
  <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
    <div class="controls">
    Medical Center Email:  {!! Form::text('email', $medicaldetail->medical_center_email, array('placeholder' => 'Email','class' => 'form-control')) !!}
      <span class="help-block">{{ $errors->first('email', ':message') }}</span>
    </div>
  </div>
  <div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }}">
    <div class="controls">
     Medical Description: {!! Form::text('username',$medicaldetail->description , array('placeholder' => 'Username','class' => 'form-control')) !!}
      <span class="help-block">{{ $errors->first('username', ':message') }}</span>
    </div>
  </div>
  <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
    <div class="controls">
     Contact No:  {!! Form::text('contact_no',$medicaldetail->contact_no, array('placeholder' => '','class' => 'form-control')) !!}
      <span class="help-block">{{ $errors->first('password', ':message') }}</span>
    </div>
  </div>
  <div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }}">
    <div class="controls">
      Address:{!! Form::text('username', $medicaldetail->address, array('placeholder' => 'Username','class' => 'form-control')) !!}
      <span class="help-block">{{ $errors->first('username', ':message') }}</span>
    </div>
  </div>
  <div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }}">
    <div class="controls">
      City: {!! Form::text('username', $medicaldetail->city, array('placeholder' => 'Username','class' => 'form-control')) !!}
      <span class="help-block">{{ $errors->first('username', ':message') }}</span>
    </div>
  </div>
  <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
    <div class="controls">
      State: {!! Form::text('name', $medicaldetail->state, array('placeholder' => 'Your Name','class' => 'form-control',)) !!}
      <span class="help-block">{{ $errors->first('name', ':message') }}</span>
    </div>
  </div>
  <div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }}">
    <div class="controls">
     Country: {!! Form::text('username', $medicaldetail->country, array('placeholder' => 'Username','class' => 'form-control')) !!}
      <span class="help-block">{{ $errors->first('username', ':message') }}</span>
    </div>
  </div>
  <div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }}">
    <div class="controls">
      Pincode: {!! Form::text('username', $medicaldetail->pincode, array('placeholder' => 'Username','class' => 'form-control')) !!}
      <span class="help-block">{{ $errors->first('username', ':message') }}</span>
    </div>
  </div>
  <div class="form-group">
    <div class="">
      <button type="submit" class="btn btn-primary">
      Update
      </button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection