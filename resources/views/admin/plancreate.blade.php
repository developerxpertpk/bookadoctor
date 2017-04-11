@extends('layouts.adminLayout')
@section('content')
<div class="show-admin">
  @if(isset($plan))
  {!! Form::open(['route' => ['plan.edit.submit',$id],'method'=>'POST','files'=> true]) !!}
  @else
  {!! Form::open(['route' => 'plan.create.submit','method'=>'POST','files'=> true]) !!}
  @endif
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Plan Name:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('name',(isset($plan)) ? $plan->name : '',array('placeholder' => 'Title of the page','class' => 'form-control title','id'=>'name')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Plan Cost:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('amount',(isset($plan))  ? $plan->amount : '',array('placeholder' => 'Cost','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Plan Body:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('description',(isset($plan))  ? $plan->description : '',array('placeholder' => 'Body','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="">
      <button type="submit" class="btn btn-primary">
      @if(isset($plan))
      Update Plan
      @else
      Add Plan
      @endif
      </button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection
