{{-- @extends('layouts.app') --}}
@extends('layouts.default')
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Doctor Profile</div>
                <div class="panel-body">
                <?php
                die('aaa');
                ?>
                
                            {{Form::open(['route' => 'doctor.register.submit','method'=>'POST','class'=>'form-horizontal', 'role'=>'form', 'files' => true])}}
                            {{ csrf_field() }}
 <div class="col-md-2 medic "><img src="{{asset('/images/profile_pic/'.$medicaldetail->profilepic)}}" alt="Profile Pic"/></div>
                        <div class="col-md-3"> <img id="previewimg" src={{asset('/images/profile_pic/'}}" alt=""></div>
                        <div class="col-md-9">
                            <div class="form-group{{ $errors->has('profilepic') ? ' has-error' : '' }}">


                                <?php
                              $fileN=Auth::user()->is_doctor->profilepic;
                                ?>
                                {{Form::file('profilepic', ['class' => 'form-control','id'=>'profilepic',$value=$fileN])}}
                                @if ($errors->has('profilepic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilepic') }}</strong>
                                    </span>
                                @endif
                            </div>

                   

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {{Form::text('title', Auth::user()->is_doctor->title, ['class' => 'form-control','id'=>'medical_center_title','placeholder'=>'Doctors Name'])}}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('medical_center_info') ? ' has-error' : '' }}">
                                {{Form::text('medical_center_info',Auth::user()->is_MedicalCenter->medical_center_info, ['class' => 'form-control','id'=>'medical_center_info','placeholder'=>' Doctors Status'])}}
                                @if ($errors->has('medical_center_info'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medical_center_info') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{Form::textarea('description', Auth::user()->is_MedicalCenter->description , ['class' => 'form-control','id'=>'description','cols'=>'30','rows'=>'6','placeholder'=>'Medical Center Description'])}}
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
				

				
                <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="edit_pro_btn">
                                    Done
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