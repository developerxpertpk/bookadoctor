@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Services</div>

                    <div class="panel-body">
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <table>
                                <tr><th>services</th></tr>
                                @foreach($specilaty as $key => $doc_specilaty)

                                    <tr><td colspan="2"> <input type="checkbox" value="{{$doc_specilaty->id}}" name="service[{{$doc_specilaty->name}}]">&nbsp;{{$doc_specilaty->name}}</td></tr>
                                @endforeach
                                {{--@foreach($checked_service as $key1 => $c_service)--}}
                                {{--{{$c_service}}--}}
                                {{--<input type="checkbox" value="{{$c_service->id}}" name="service[{{$c_service->name}}]">&nbsp;{{$service->name}}<br/>--}}
                                {{--@endforeach--}}

                            </table>
                            <input type="submit" value="Add Services" class="edit_pro_btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
