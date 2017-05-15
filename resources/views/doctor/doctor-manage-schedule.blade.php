@extends('layouts.doctorLayout')
@section('content')
<?php
// echo "<pre>";
// print_r($doctorId);
// die();

?>
<div class="row">
	<div class="user-profile">
		<div class="panel panel-default">
			<div class="col-md-12">
			<h2>Welcome</h2>                                
			<h3>{{$userr->first_name}} {{$userr->last_name}}</h3> <a class="edit_pro_btn" href=""  data-toggle="modal" data-target="#myModelkkklpp{{$doctorId}}"> Enter Your Schedule</a>     
			</div>
			<!-- Model Schedule -->

			 <div id="myModelkkklpp{{$doctorId}}" data-easein="tada" class="modal fade" role="dialog">
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
                                            <!-- End Modal Schedule -->

       <table class="table table-bordered" id="doctor">
        <div class="col-md-4" >
        <div class="weeks">
        <tr>
        <th> Weekdays </th>
        <th> Time-In </th>
        <th> Time-Out </th>
        <th> Action </th>
        </tr>
        	@foreach($schedule as $key)
        <tr>

        	<td>{{$key->day}}</td>
        	<td>{{\Carbon\Carbon::createFromFormat('H:i:s',$key->time_in)->format('H:i:s')}}</td>
        	<td>{{\Carbon\Carbon::createFromFormat('H:i:s', $key->time_out)->format('H:i:s')}}</td>
            <td><a href="{{route('delete.schedule',$key->id)}}" value="0" name="remove" class="links">Remove</a>
             <a href=""  name="edit" data-toggle="modal" data-target="#myModelkkk{{$key->id}}" class="links">Edit</a></td>
                <!-- Model Schedule -->

             <div id="myModelkkk{{$key->id}}" data-easein="tada" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Manage Schedule</h4>
                                                        </div>
         {!! Form::open(['route' => [('edit.schedule'),$key->id],'method'=>'POST','files'=> true]) !!}
                                                        <input type="hidden" name="user_id" value="{{$doctorId}}">
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
        </div>
        </div>
        </table>


<!-- Style -->
<style>
.heading{
	background-color:  #ff6666;
	color:white;

	}
.links{
    padding-right: 40px;
}

/*select optiuon style*/
.styled-select {
  background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
  height: 29px;
  overflow: hidden;
  width: 240px;
}
.styled-select select {
  background: transparent;
  border: none;
  font-size: 14px;
  height: 29px;
  padding: 5px;
  /* If you add too much padding here, the options won't show in IE */
  width: 268px;
}
.styled-select select .cselect{
    color: #fff!important;
}
.styled-select.slate {
  background: url(http://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;
  height: 34px;
  width: 240px;
}
.styled-select.slate select {
  border: 1px solid #ccc;
  font-size: 16px;
  height: 34px;
  width: 268px;
}
/* -------------------- Rounded Corners */
.rounded {
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
}
.semi-square {
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
/* -------------------- Colors: Background */
.slate {
  background-color: #ddd;
}
.green {
  background-color: #779126;
}
.blue {

   background-color: #31708f;
}


.yellow {
  background-color: #eec111;
}
.black {
  background-color: #000;
}
/* -------------------- Colors: Text */
.slate select {
  color: #000;
}
.green select {
  color: #fff;
}
.blue select {
  color: #fff;
  background-color:#31708f; 
   
}
.yellow select {
  color: #000;
}
.black select {
  color: #fff;
}
/* -------------------- Select Box Styles: danielneumann.com Method */
/* -------------------- Source: http://danielneumann.com/blog/how-to-style-dropdown-with-css-only/ */
#mainselection select {
  border: 0;
  color: #EEE;
  background: transparent;
  font-size: 20px;
  font-weight: bold;
  padding: 2px 10px;
  width: 378px;
  *width: 350px;
  *background: #58B14C;
  -webkit-appearance: none;
}
#mainselection {
  overflow: hidden;
  width: 350px;
  -moz-border-radius: 9px 9px 9px 9px;
  -webkit-border-radius: 9px 9px 9px 9px;
  border-radius: 9px 9px 9px 9px;
  box-shadow: 1px 1px 11px #330033;
  background: #58B14C url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 319px center;
}
/* -------------------- Select Box Styles: stackoverflow.com Method */
/* -------------------- Source: http://stackoverflow.com/a/5809186 */
select#soflow,
select#soflow-color {
  -webkit-appearance: button;
  -webkit-border-radius: 2px;
  -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
  -webkit-padding-end: 20px;
  -webkit-padding-start: 2px;
  -webkit-user-select: none;
  background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
  background-position: 97% center;
  background-repeat: no-repeat;
  border: 1px solid #AAA;
  color: #555;
  font-size: inherit;
  margin: 20px;
  overflow: hidden;
  padding: 5px 10px;
  text-overflow: ellipsis;
  white-space: nowrap;
  width: 300px;
}
select#soflow-color {
  color: #fff;
  background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
  background-color: #779126;
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
  padding-left: 15px;
}

	
</style>

<!-- End Style -->


</div>
</div>
</div>


@endsection