@extends('layouts.medicalCenterLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="add-services">
                <div class="panel panel-default">
                    <div class="panel-heading">Doctor Listing
                    </div>

                    <div class="panel-body">

                        <div class="show-admin">
                            <table class="table table-bordered">
                                <tr class="tr-head">
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Number</th>
                                    <th>Weekly Schedule</th>
                                    <th>Daily Time In</th>
                                    <th>Daily Time Out</th>

                                    <th width="206px">Action</th>
                                </tr>
                                <?php $i=0;?>
                                @foreach ($doctors as $key => $items)
                                    @foreach ($items as $key => $item)
                                        <?php $days = App\Usersetting::where('user_id','=',$item->user_id)->get()?>


                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->contact_no }}</td>
                                        <td>@foreach($days as $day)
                                                {{$day->day}}
                                            @endforeach
                                            </td>
                                        <td>@foreach($days as $day)
                                                {{$day->time_in}}
                                            @endforeach
                                        </td>
                                        <td>@foreach($days as $day)
                                                {{$day->time_out}}
                                            @endforeach
                                        </td>

                                        <td>
                                            @if(App\Doctor_Speciality::where('user_id','=',Auth::user()->id)->get()->count()>=1)
                                            <a class="btn btn-info" href="{{ route('add-doctor.show',$item->id) }}">Show</a>
                                            @endif
                                                @if(App\Speciality::where('user_id','=',Auth::user()->id)->get()->count()>=1)
                                            <a class="btn btn-primary" href="" data-toggle="modal" data-target=".bs-assign-speciality{{$item->id }}">Assign speciality</a>
                                              @endif

                                              
                <a class="btn btn-primary" href="{{route('assign.doctor.service',$item->id)}}">Add Doctor Schedule</a>
                                                




                                            <div class="modal fade bs-assign-speciality{{$item->id }}" data-easein="tada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Add Specilaty with {{ $item->first_name }}&nbsp;&nbsp;{{ $item->last_name }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('assign.specilaty.form.submit')}}" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" value="{{$item->user_id}}" name="doc_id">
                                                                <table>
                                                                    <tr><th>Specilaty</th></tr>
                                                                     @if(isset($specilaty))
                                                                    @foreach($specilaty as $key => $doc_specilaty)
                                                                    @if($doc_specilaty->status=="speciality")

                                                                        <tr><td colspan="2"> <input type="checkbox" value="{{$doc_specilaty->id}}" name="specilaty[{{$doc_specilaty->name}}]">&nbsp;{{$doc_specilaty->name}}</td></tr>
                                                                        @endif
                                                                    @endforeach
                                                                    @endif

                                                                </table>
                                                                <input type="submit" value="Add Specilaty to {{ $item->first_name }}" class="edit_pro_btn">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="myModelkkklpp{{$item->id }}" data-easein="tada" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Modal Header</h4>
                                                        </div>
                                                        {!! Form::open(['route' => 'doctor.schedule.create','method'=>'POST','files'=> true]) !!}
                                                        <input type="hidden" name="user_id" value="{{$item->user_id }}">
                                                        <div class="modal-body">
                                                            <p>Select Working Days </p>
                                                            <div class="">
                                                                <input type="checkbox" id="weekday-mon" class="weekday" name="weekdays[]" value="Monday"/>
                                                                <label for="weekday-mon">Monday</label>
                                                                <input type="checkbox" id="weekday-tue" class="weekday" name="weekdays[]" value="Tuesday"/>
                                                                <label for="weekday-tue">Tuesday</label>
                                                                <input type="checkbox" id="weekday-wed" class="weekday" name="weekdays[]" value="Wednesday"/>
                                                                <label for="weekday-wed">Wednesday</label>
                                                                <input type="checkbox" id="weekday-thu" class="weekday" name="weekdays[]" value="Thursday"/>
                                                                <label for="weekday-thu">Thursday</label>
                                                                <input type="checkbox" id="weekday-fri" class="weekday" name="weekdays[]" value="Friday"/>
                                                                <label for="weekday-fri">Friday</label>
                                                                <input type="checkbox" id="weekday-sat" class="weekday" name="weekdays[]" value="Saturday"/>
                                                                <label for="weekday-sat">Saturday</label>
                                                                <input type="checkbox" id="weekday-sun" class="weekday" name="weekdays[]" value="Sunday"/>
                                                                <label for="weekday-sun">Sunday</label>
                                                            </div>

                                                        </div>
                                                        <p> Select Your Working Hours</p>
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



                                            {!! Form::open(['method' => 'DELETE','route' => ['add-doctor.destroy', $item->user_id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        </td>


                                        {!! Form::close() !!}

                                    </tr>
                                     {{--@endif--}}
                                    @endforeach

                                @endforeach


                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
