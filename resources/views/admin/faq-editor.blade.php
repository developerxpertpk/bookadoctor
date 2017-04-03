@extends('layouts.adminLayout')
@section('content')
<div class="show-admin">
  {!! Form::open(['route' => 'add.faq.submit','method'=>'POST','files'=> true]) !!}
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Title:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('title',null,array('placeholder' => 'Title of the page','class' => 'form-control title')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Slug:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('slug',null,array('placeholder' => 'Slug','class' => 'form-control','id'=>'slug')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Excerpt:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('excerpt',null,array('placeholder' => 'Excerpt','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Body:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('body',null,array('placeholder' => 'Body','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Meta_Description:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('meta_description',null,array('placeholder' => 'Body','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Meta Keywords:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('meta_keywords',null,array('placeholder' => 'Body','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="">
      <button type="submit" class="btn btn-primary">
      Add FAQ
      </button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
<script>
$(document).ready(function(){
CKEDITOR.replace(jQuery('.ckeditor'));
alert('hahahha');
});
jQuery(document).ready(function($) {
/* now you can use $ */
});
</script>
@endsection