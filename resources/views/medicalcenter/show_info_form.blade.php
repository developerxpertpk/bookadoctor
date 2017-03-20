{{-- @extends('layouts.app') --}}
@extends('layouts.homeLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Medical Center Information</div>
                    <div class="panel-body">
                            {{Form::open(['route' => 'medical.center.info.submit','method'=>'POST','class'=>'form-horizontal', 'role'=>'form', 'files' => true])}}
                            {{ csrf_field() }}
                        <div class="col-md-3"> <img id="profil_picture" src="http://drbooking/images/profile_pic/{{Auth::user()->is_MedicalCenter->profilepic}}" alt=""></div>
                        <div class="col-md-9">
                            <div class="form-group{{ $errors->has('profilepic') ? ' has-error' : '' }}">
                                {{Form::file('profilepic', ['class' => 'form-control','id'=>'profilepic'])}}
                                @if ($errors->has('profilepic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilepic') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('medical_center_info') ? ' has-error' : '' }}">
                                {{Form::text('medical_center_info', null, ['class' => 'form-control','id'=>'medical_center_info','placeholder'=>'Medical Center Information'])}}
                                @if ($errors->has('medical_center_info'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medical_center_info') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {{Form::text('title', null, ['class' => 'form-control','id'=>'medical_center_title','placeholder'=>'Medical Center Title'])}}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {{--{{Form::text('title', null, ['class' => 'form-control','id'=>'medical_center_title','placeholder'=>'Medical Center Title'])}}--}}
                                {{--@if ($errors->has('title'))--}}
                                {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('title') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}


                                <select class="spelization" multiple="multiple" style="width: 100%">
                                    <option value="AL">Alabama</option>
                                    <option value="AL">1Alabama</option>
                                    <option value="AL">2Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>

                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{Form::textarea('description', null , ['class' => 'form-control','id'=>'description','cols'=>'30','rows'=>'6','placeholder'=>'Medical Center Description'])}}
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
