@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Specilaty Details of {{Auth::user()->is_Profile->title}}</div>

                    <div class="panel-body">
                        <div class="profile-headding"><span>Add Speciality</span> <a class="edit_pro_btn pull-right" data-toggle="modal" data-target="#add_speciality" href=""><i class="fa fa-picture-o"></i> Add Speciality</a></div>



                        <div id="add_speciality" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Speciality</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{Form::open(['route' => 'specilaty.form.submit','method'=>'POST','class'=>'form-horizontal', 'role'=>'form', 'files' => true])}}
                                        {{ csrf_field() }}

                                            <div class="{{ $errors->has('medical_center_email') ? ' has-error' : '' }}">
                                                {{Form::text('specility_name', null, ['class' => 'form-control','id'=>'medical_center_specility_name','placeholder'=>'Specility/Services Name'])}}

                                                @if ($errors->has('medical_center_email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('medical_center_email') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="{{ $errors->has('web_url') ? ' has-error' : '' }}">
                                                {{Form::text('specility_price', null, ['class' => 'form-control','id'=>'medical_center_specility_price','placeholder'=>'Specility/Services price'])}}
                                                @if ($errors->has('web_url'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('web_url') }}</strong>
                                    </span>
                                                @endif
                                            </div>


                                            <div class="">
                                                <div class="">
                                                    {{Form::submit('Add Specilaty', ['class' => 'edit_pro_btn'])}}
                                                </div>
                                            </div>






                                        {{Form::close()}}
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <table class="table table-bordered">
                                <tr><th>S/No</th><th>Name</th><th>Price</th><th>Action</th></tr>
                            <?php $q=1; ?>
                                @foreach($specilaty as $key => $doc_specilaty)

                                    <tr>

                                        <td> {{$q++}}</td>
                                        <td>{{$doc_specilaty->name}}</td>
                                        <td>{{$doc_specilaty->price}}</td>
                                        <td width="150px">
                                            <a class="btn btn-primary"  href="{{route('specilaty.show.edit.form',$doc_specilaty->id)}}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['specilaty.delete', $doc_specilaty->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </tr>

                                @endforeach


                            </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
