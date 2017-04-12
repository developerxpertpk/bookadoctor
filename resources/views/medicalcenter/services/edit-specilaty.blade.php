


@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Specilaty Details of {{Auth::user()->is_Profile->title}}</div>

                    <div class="panel-body">


                        {{Form::open(['route' => ['specilaty.edit.form.submit',$id],'method'=>'POST','class'=>'form-horizontal', 'role'=>'form', 'files' => true])}}
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('medical_center_email') ? ' has-error' : '' }}">
                            {{Form::text('new_specility_name',$specilaty->name, ['class' => 'form-control','id'=>'medical_center_specility_name','placeholder'=>'Specility/Services Name'])}}

                            @if ($errors->has('medical_center_email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('medical_center_email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="{{ $errors->has('web_url') ? ' has-error' : '' }}">
                            {{Form::text('new_specility_price',$specilaty->price, ['class' => 'form-control','id'=>'medical_center_specility_price','placeholder'=>'Specility/Services price'])}}
                            @if ($errors->has('web_url'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('web_url') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="">
                            <div class="">
                                {{Form::submit('Update Specilaty', ['class' => 'edit_pro_btn'])}}
                            </div>
                        </div>






                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection





