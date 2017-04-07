@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">{{Auth::user()->is_Medicalcenter->first_name}}Services</div>

                    <div class="panel-body">


                        @foreach($medicaldetail->services as $key)
                            {{ $key->name }}
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
