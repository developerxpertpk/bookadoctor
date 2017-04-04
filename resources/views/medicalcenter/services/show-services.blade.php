@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Services</div>

                    <div class="panel-body">

                       ss

                        {{--<form action="" method="post">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--@foreach($services as $key => $service)--}}
                                {{--<input type="checkbox" value="{{$service->id}}" name="service[{{$service->name}}]">&nbsp;{{$service->name}}<br/>--}}
                            {{--@endforeach--}}
                            {{--@foreach($checked_service as $key1 => $c_service)--}}
                            {{--{{$c_service}}--}}
                            {{--<input type="checkbox" value="{{$c_service->id}}" name="service[{{$c_service->name}}]">&nbsp;{{$service->name}}<br/>--}}
                            {{--@endforeach--}}
                            {{--<input type="submit" value="Add Services" class="edit_pro_btn">--}}
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
