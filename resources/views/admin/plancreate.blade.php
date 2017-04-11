@extends('layouts.adminLayout')
@section('content')
<div class="show-admin">
  {!! Form::open(['route' => 'plan.create.submit','method'=>'POST','files'=> true]) !!}
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Plan Name:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('name',null,array('placeholder' => 'Title of the page','class' => 'form-control title','id'=>'name')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Plan Cost:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('cost',null,array('placeholder' => 'Cost','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Plan Body:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('body',null,array('placeholder' => 'Body','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="">
      <button type="submit" class="btn btn-primary">
      Add Plan
      </button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection