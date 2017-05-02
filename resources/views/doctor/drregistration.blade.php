@extends('layouts.doctorLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Doctor Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('Doctor.register.submit') }}">
                        {{ csrf_field() }}
                        <input id="role" type="hidden" class="form-control" name="role" value="2" required autofocus>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Contact No. </label>
                            <div class="col-10">
                        <input class="form-control" type="text"  name="contactno" value="" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Address</label>
                            <div class="col-10">
                               <textarea class="form-control"  name="address" rows="5" id="comment"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">City</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="city" value="" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">State</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="state" value="" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Pincode</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="pincode"  value="" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-md-4">
                            <label for="example-text-input" class="col-2 col-form-label">Country</label>
                             </div>
                            <div class="col-8">
                                <input class="form-control" type="text" name="country" value="" id="example-text-input">
                            </div>
                        </div>

                        
                        <input id="role" type="hidden" class="form-control" name="role" value="3" required autofocus>
                        <input id="medic" type="hidden" class="form-control" name="medic" value="4" required autofocus>
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