@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Services</div>

                    <div class="panel-body">
                        <form action="{{route('service.form.submit')}}" method="post">


                            {{ csrf_field() }}
                            {{--<table>--}}
                                {{--<tr><th>services</th><th>&nbsp;&nbsp;&nbsp;</th><th>Price</th></tr>--}}
{{--@foreach($services as $key => $service)--}}

                                    {{--<tr><td colspan="2"> <input type="checkbox" value="{{$service->id}}" name="service[{{$service->name}}]">&nbsp;{{$service->name}}</td><td>&nbsp;&nbsp;&nbsp;</td><td>{{$service->price}}</td></tr>--}}
    {{--@endforeach--}}
                            {{--@foreach($checked_service as $key1 => $c_service)--}}
                                {{--{{$c_service}}--}}
                                {{--<input type="checkbox" value="{{$c_service->id}}" name="service[{{$c_service->name}}]">&nbsp;{{$service->name}}<br/>--}}
                            {{--@endforeach--}}

                            {{--</table>--}}
    <input type="submit" value="Add Services" class="edit_pro_btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
