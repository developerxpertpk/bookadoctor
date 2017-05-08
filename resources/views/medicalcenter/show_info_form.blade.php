{{-- @extends('layouts.app') --}}
@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Medical Center Information</div>
                    <div class="panel-body">
                            {{Form::open(['route' => 'medical.center.info.submit','method'=>'POST','class'=>'form-horizontal', 'role'=>'form', 'files' => true])}}
                            {{ csrf_field() }}
                        <div class="col-md-3"> <img id="previewimg" src="http://www.drbooking.com/images/profile_pic/{{Auth::user()->is_Profile->images}}" alt=""></div>
                        <div class="col-md-9">
                            <div class="form-group{{ $errors->has('profilepic') ? ' has-error' : '' }}">
                                <?php
                                $fileN=Auth::user()->is_Profile->images;
                                ?>
                                    <input type="file" name="profilepic" class="form-control" id="profilepic" value="Auth::user()->is_Profile->images">
                                {{--{{Form::file('profilepic', ['class' => 'form-control','id'=>'profilepic',$value=$fileN])}}--}}
                                @if ($errors->has('profilepic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilepic') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {{Form::text('title', Auth::user()->is_Profile->title, ['class' => 'form-control','id'=>'medical_center_title','placeholder'=>'Medical Center Title'])}}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('medical_center_info') ? ' has-error' : '' }}">
                                {{Form::text('medical_center_info',Auth::user()->is_Profile->medical_center_info, ['class' => 'form-control','id'=>'medical_center_info','placeholder'=>'Medical Center Information'])}}
                                @if ($errors->has('medical_center_info'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medical_center_info') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{Form::textarea('description', Auth::user()->is_Profile->description , ['class' => 'form-control','id'=>'description','cols'=>'30','rows'=>'6','placeholder'=>'Medical Center Description'])}}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="">
                                    {{Form::submit('Add Medical Information', ['class' => 'edit_pro_btn'])}}
                                </div>
                            </div>


                        </div>


                            {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
