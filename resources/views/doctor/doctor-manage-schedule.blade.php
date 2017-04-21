@extends('layouts.doctorLayout')
@section('content')
<div class="row">
	<div class="user-profile">
		<div class="panel panel-default">
			<div class="col-md-12">
			<h2>Welcome</h2>                                
			<h3>{{$userr->first_name}} {{$userr->last_name}}</h3> <a class="edit_pro_btn" href=""  data-toggle="modal" data-target="#myModelkkklpp{{$a}}"> Enter Your Scedule</a>        
			</div>
			<!-- Model Schedule -->

			 <div id="myModelkkklpp{{$a}}" data-easein="tada" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Manage Schedule</h4>
                                                        </div>
                                                        {!! Form::open(['route' => 'edit.schedule','method'=>'POST','files'=> true]) !!}
                                                        <input type="hidden" name="user_id" value="{{$a}}">
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
                                            <!-- End Modal Schedule -->

       <table class="table table-bordered" id="doctor">
        <div class="col-md-4" >
        <div class="weeks">
        <tr>
        <th> Weekdays </th>
        <th> Time-In </th>
        <th> Time-Out </th>
        </tr>
        	@foreach($u as $key)
        <tr>

        	<td>{{$key->day}}</td>
        	<td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$key->time_in)->format('H:i:s')}}</td>
        	<td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $key->time_out)->format('H:i:s')}}</td>
        </tr>
        @endforeach
        </div>
        </div>
        </table>


<!-- Style -->
<style>
.heading{
	background-color:  #ff6666;
	color:white;

	}
	
</style>

<!-- End Style -->


</div>
</div>
</div>


@endsection