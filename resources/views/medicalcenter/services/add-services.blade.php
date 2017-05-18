@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Schedule <a class="edit_pro_btn pull-right" href=""  data-toggle="modal" data-target="#myModelkkklpp{{$id}}"> Enter Your Schedule</a> </div>

                    <div class="panel-body">
                        
                        <div id="myModelkkklpp{{$id}}" data-easein="tada" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Manage Schedule</h4>
                                                        </div>
                                                        {!! Form::open(['route' => 'insert.schedule','method'=>'POST','files'=> true]) !!}
                                                        <input type="hidden" name="user_id" value="{{$doctorId}}">
                                                        <div class="modal-body">
                                                           
                                                           
                                                              <div class="styled-select blue semi-square">
                                                              <select name="days">
                                                                <option class="cselect">Week Days</option>
                                                                <option value="Monday">Monday</option>
                                                                <option value="Tuesday">Tuesday</option>
                                                             <option value="Wednesday">Wednesday</option>
                                                                  <option value="Thursday">Thursday</option>
                                                                   <option value="Friday">Friday</option>
                                                                     <option value="Saturday">Saturday</option>
                                                                    <option value="Sunday">Sunday</option>

                                                              </select>
                                                            </div>


                                                        </div>
                                                        <p> Select Your Working Hour's</p>
                                                        <div class="col-md-2">
                                                            <p>From </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input-group clockpicker">

                                                                <input type="text" class="form-control" name="from_time" value="09:30" >
                                                                <span class="input-group-addon">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>To</p>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="input-group clockpicker">

                                                                <input type="text" class="form-control" name="to_time" value="09:30" >
                                                                <span class="input-group-addon">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </span>
                                                            </div>
                                                        </div>
                                                        <!-- Clock script -->
                                                        <script type="text/javascript">
                                                            $('.clockpicker').clockpicker({
                                                                placement: 'top',
                                                                align: 'left',
                                                                donetext: 'Done'
                                                            });
                                                        </script>
                                                        <!-- End Clock Script -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-default">Submit</button>
                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
