@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Image Upload</div>

                    <div class="panel-body">






                        <div class="text-content">
                            <div class="span7 offset1">
                                @if(Session::has('success'))
                                    <div class="alert-box success">
                                        <h2>{!! Session::get('success') !!}</h2>
                                    </div>
                                @endif
                                <div class="secure">Upload form</div>
                                    {!! Form::open(array('route' => 'medical.center.image.upload.submit','method'=>'POST', 'files'=>true)) !!}
                                <div class="control-group">
                                    <div class="controls">
                                        {!! Form::file('images[]', array('multiple'=>true)) !!}
                                        <p class="errors">{!!$errors->first('images')!!}</p>
                                        @if(Session::has('error'))
                                            <p class="errors">{!! Session::get('error') !!}</p>
                                        @endif
                                    </div>
                                </div>
                                    {!! Form::submit('Upload', array('class'=>'send-btn')) !!}
                                {!! Form::close() !!}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
