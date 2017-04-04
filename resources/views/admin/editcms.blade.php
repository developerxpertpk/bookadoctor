@extends('layouts.adminLayout')
@section('content')
<div class="show-admin">
  {!! Form::open(['route' => ['cms.edit.update',$id],'method'=>'POST','files'=> true]) !!}
  <div class="row form-group">
    <h3>Edit {{ $pagedetail->title }} Page</h3>
    <div class="col-md-2">
      <strong>Title:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('title',$pagedetail->title,array('placeholder' => 'Title of the page','class' => 'form-control title','id'=>'title')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Slug:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::text('slug',$pagedetail->slug,array('placeholder' => 'Slug','class' => 'form-control','id'=>'slug')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Excerpt:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('excerpt',$pagedetail->excerpt,array('placeholder' => 'Excerpt','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Body:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('body',$pagedetail->body,array('placeholder' => 'Body','class' => 'form-control ckeditor')) !!}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      <strong>Meta_Description:</strong>
    </div>
    <div class="col-md-10">
      {!! Form::textarea('meta_description',$pagedetail->meta_description,array('placeholder' => 'Body','class' => 'form-control ckeditor')) !!}
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
            <input type="text" class="form-control" id="meta" name = "meta_keywords" data-role="tagsinput" value="{{$pagedetail->meta_keywords}}">
            {{--  <input name="beta" type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" >  --}}
          </div>
        </div>
      </div>
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
<script type="text/javascript">
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