@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medical Dashboard</div>

                    <div class="panel-body">
                        {!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true)) !!}
                        {!! Form::file('images[]', array('multiple'=>true)) !!}

                        {!! Form::submit('Upload', array('class'=>'send-btn')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
