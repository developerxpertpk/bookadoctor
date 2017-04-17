@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="Patient Documents">
                <div class="panel panel-default">
                    <div class="panel-heading">Patient Documents</div>

                    <div class="panel-body">
                        <div class="text-content">
                            <div class="span7 offset1">
                                @if(Session::has('success'))
                                    <div class="alert-box success">
                                        <h2>{!! Session::get('success') !!}</h2>
                                    </div>
                                @endif
                                <div class="secure">Upload form</div>
                                {!! Form::open(array('route' => 'patient.document.upload.submit','method'=>'POST', 'files'=>true)) !!}
                                <div class="control-group">
                                    <div class="controls">
                                        {!! csrf_field() !!}
                                        {!!Form::hidden('booking_id', $booking->id)!!}
                                        {!! Form::file('docimages[]', array('multiple'=>true)) !!}
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
    </div>
@endsection
