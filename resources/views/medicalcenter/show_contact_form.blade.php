{{-- @extends('layouts.app') --}}
@extends('layouts.homeLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Medical Center Contact Information</div>
                    <div class="panel-body">
                        {{Form::open(['route' => 'medical.center.info.submit','method'=>'POST','class'=>'form-horizontal', 'role'=>'form', 'files' => true])}}
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('medical_center_email') ? ' has-error' : '' }}">
                                {{Form::email('medical_center_email', null, ['class' => 'form-control','id'=>'medical_center_email','placeholder'=>'Medical Center Email'])}}

                                @if ($errors->has('medical_center_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medical_center_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('web_url') ? ' has-error' : '' }}">
                                {{Form::text('web_url', null, ['class' => 'form-control','id'=>'medical_center_web_url','placeholder'=>'Medical Center Web URL'])}}
                                @if ($errors->has('web_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('web_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}">
                                {{--{{Form::text('title', null, ['class' => 'form-control','id'=>'medical_center_title','placeholder'=>'Medical Center Title'])}}--}}
                                {{--@if ($errors->has('title'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('title') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                                {{Form::text('contact_no', null, ['class' => 'form-control','id'=>'medical_center_contact_no','placeholder'=>'Medical Center COntact Number'])}}
                                @if ($errors->has('contact_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @endif



                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                {{Form::text('address', null, ['class' => 'form-control','id'=>'medical_center_address','placeholder'=>'Medical Center Address'])}}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4{{ $errors->has('address') ? ' has-error' : '' }}">

                                <select id="countryId" class="countries form-control" name="country">

                                    <option value="">Select Country</option>
                                </select>

                            </div>
                            <div class="form-group col-md-4{{ $errors->has('address') ? ' has-error' : '' }}">

                                <select id="stateId" class="states form-control" name="state">
                                    <option value="">Select State</option>
                                </select>

                            </div>
                            <div class="form-group col-md-4{{ $errors->has('address') ? ' has-error' : '' }}">

                                <select id="cityId" class="cities form-control" name="city">
                                    <option value="">Select City</option>
                                </select>

                            </div>
                            <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">


                                {{Form::text('pincode', null, ['class' => 'form-control','id'=>'medical_center_pincode','placeholder'=>'Medical Center Pincode'])}}
                                @if ($errors->has('pincode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pincode') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('working_hours') ? ' has-error' : '' }}">


                                {{Form::text('working_hours', null, ['class' => 'form-control','id'=>'medical_center_pincode','placeholder'=>'Medical Center Working Hours'])}}
                                @if ($errors->has('working_hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('working_hours') }}</strong>
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
