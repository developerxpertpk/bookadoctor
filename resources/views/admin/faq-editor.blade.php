@extends('layouts.adminLayout')
@section('content')
<div class="show-admin">
  {!! Form::open(['route' => 'add.faq.submit','method'=>'POST','files'=> true]) !!}
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Title:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('title',null,array('placeholder' => 'Title of the page','class' => 'form-control title','id'=>'title')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Slug:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('slug',null,array('placeholder' => 'Slug','class' => 'form-control','id'=>'slug','disabled')) !!}
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
      <div class="tab-pane" id="TabCareerInfo" name="Career History">
    <div class="row">
        <div class="col-md-12">
            <input type="text" class="form-control" id="meta" name = "meta_keywords" data-role="tagsinput">                                  
        </div>
    </div>
</div>
    </div>    
  </div>
  <div class="form-group">
    <div class="">
      <button type="submit" class="btn btn-primary">
      Add Page
      </button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
<script>
$(document).ready(function() {
  $("#meta").focusout(function(){
   var vab= $("#meta").val();
   console.log($("#meta").val())
  });
  $('#title').change(function () {
$('#slug').val('/'+$(this).val().toLowerCase());
});
});
</script>
@endsection