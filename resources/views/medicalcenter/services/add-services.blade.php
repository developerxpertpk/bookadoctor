@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Schedule of <span class="dr-comlete-name"><span class="dr-name-spx">Dr. </span><span class="dr-name">{{App\Userprofile::where('user_id','=',$id)->first()->first_name}}</span>&nbsp;<span class="dr-name">{{App\Userprofile::where('user_id','=',$id)->first()->last_name}}</span></span><a class="edit_pro_btn pull-right" href=""  data-toggle="modal" data-target="#myModelkkklpp{{$id}}"> Add Doctor Schedule</a> </div>

                    <div class="panel-body">
                        
                        <div id="myModelkkklpp{{$id}}" data-easein="tada" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Manage Schedule</h4>
                                                        </div>
                                                        {!! Form::open(['route' => 'insert.doctor.schedule','method'=>'POST','files'=> true]) !!}
                                                        <input type="hidden" name="user_id" value="{{$id}}">
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
         <table class="table table-bordered" id="doctor">
        <div class="col-md-4" >
        <div class="weeks">
        <tr>
        <th> Weekdays </th>
        <th> Time-In </th>
        <th> Time-Out </th>
        <th> Action </th>
        </tr>
        @if(isset($schedule))
            @foreach($schedule as $key)
        <tr>

            <td>{{$key->day}}</td>
            <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$key->time_in)->format('H:i:s')}}</td>
            <td>{{\Carbon\Carbon::createFromFormat('H:i:s', $key->time_out)->format('H:i:s')}}</td>
            <td><a href="{{route('delete.doctor.schedule',$key->id)}}" class="edit_pro_btn">Remove</a>
             <a href=""  name="edit" data-toggle="modal" data-target="#myModelkkk{{$key->id}}" class="edit_pro_btn">Edit</a></td>
                <!-- Model Schedule -->

             <div id="myModelkkk{{$key->id}}" data-easein="tada" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Manage Schedule</h4>
                                                        </div>
         {!! Form::open(['route' => [('edit.doctor.schedule'),$key->id],'method'=>'POST','files'=> true]) !!}
                                                        <input type="hidden" name="user_id" value="{{$id}}">
                                                        <div class="modal-body">
                                                              <div class="styled-select blue semi-square">
                                                              <select name="days">
                                                                <option class="cselect" value="{{$key->day}}">{{$key->day}}</option>
                                                                 </select>
                                                            </div>
                                                       
                                                        <p> Select Your Working Hour's</p>
                                                        <div class="col-md-2">
                                                            <p>From </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input-group clockpicker">

                                                                <input type="text" class="form-control" name="from_time" value="{{$key->time_in}}" >
                                                                <span class="input-group-addon">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>To</p>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="input-group clockpicker2">

                                                                <input type="text" class="form-control" name="to_time" value="{{$key->time_out}}" >
                                                                <span class="input-group-addon">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </span>
                                                            </div> </div>
                                                             <!-- Clock script -->
                                                        <script type="text/javascript">
                                                            $('.clockpicker').clockpicker({
                                                                placement: 'top',
                                                                align: 'left',
                                                                donetext: 'Done',
                                                                default:'{{$key->time_in}}'
                                                            });
                                                            $('.clockpicker2').clockpicker({
                                                                placement: 'top',
                                                                align: 'left',
                                                                donetext: 'Done',
                                                                default:'{{$key->time_out}}'
                                                            });2

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
                                        </tr>
        </div>
        </div>
        </div>
        </div>

        @endforeach
        @endif
        </div>
        </div>
        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
