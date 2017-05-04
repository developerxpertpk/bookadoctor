{{-- @extends('layouts.app') --}}
@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Medical Center Contact Information</div>
                    <div class="panel-body">
                        {{Form::open(['route' => 'medical.center.contact.info.submit','method'=>'POST','class'=>'form-horizontal', 'role'=>'form', 'files' => true])}}
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('medical_center_email') ? ' has-error' : '' }}">
                                {{Form::email('medical_center_email', $contact_info->medical_center_email, ['class' => 'form-control','id'=>'medical_center_email','placeholder'=>'Medical Center Email'])}}

                                @if ($errors->has('medical_center_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medical_center_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('web_url') ? ' has-error' : '' }}">
                                {{Form::text('web_url', $contact_info->web_url, ['class' => 'form-control','id'=>'medical_center_web_url','placeholder'=>'Medical Center Web URL'])}}
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
                                {{Form::text('contact_no', $contact_info->contact_no, ['class' => 'form-control','id'=>'medical_center_contact_no','placeholder'=>'Medical Center Contact Number'])}}
                                @if ($errors->has('contact_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @endif



                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                {{Form::text('address', $contact_info->address, ['class' => 'form-control','id'=>'medical_center_address','placeholder'=>'Medical Center Address'])}}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">


                                {{Form::text('pincode', $contact_info->pincode, ['class' => 'form-control','id'=>'medical_center_pincode','placeholder'=>'Medical Center Pincode','onblur'=>'getLocation()'])}}
                                @if ($errors->has('pincode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pincode') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group col-md-4{{ $errors->has('country') ? ' has-error' : '' }}">


                                {{Form::text('country', $contact_info->country, ['class' => 'form-control','id'=>'medical_center_country','placeholder'=>'Country'])}}
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group col-md-4{{ $errors->has('state') ? ' has-error' : '' }}">


                            {{Form::text('state', $contact_info->state, ['class' => 'form-control','id'=>'medical_center_state','placeholder'=>'State'])}}
                            @if ($errors->has('state'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif

                        </div>
                        <div class="form-group col-md-4{{ $errors->has('city') ? ' has-error' : '' }}">


                        {{Form::text('city', $contact_info->city, ['class' => 'form-control','id'=>'medical_center_city','placeholder'=>'City'])}}
                        @if ($errors->has('city'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
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
