<!DOCTYPE html>
<html>
<head>

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
<script src="{{asset('js/app.js')}}"></script>

<style>
.dropdown-menu{
	float:left;
}
.img-circle {
    height: 200px;
    border-radius: 50%;
    width: 200px;
}
.profile_li{
   list-style: none;
}
.img-circle {
    height: 200px;
    border-radius: 50%;
    width: 200px;
}
.dropdown{
  float:right;
  list-style: none;
  /*width:70%;*/
  margin:0px;
}
.dropdown ul li{
 /* float:right;*/
    list-style: none;
    text-decoration: none;
 
}
.nav navbar-nav li{
  list-style: none;
}
/*.profile{
	float:left;
	    width: 65px;
    height: 65px;
    border-radius: 69px;
}*/
</style>
</head>
<body>

<header>
<div class="container-fluid navigation">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
		  <a class="navbar-brand" href="#">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img\logo.png"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Dr.Booking</a></li>
            </ul>
            @if(Auth::Check())
            <li class="profile_li"> <img id="profile_avatar" class="profile" src=""></li>
             <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>   
                    {{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('patient.profile.login') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                                                   
                       

                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i>
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                            {{-- <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a> --}}
                        </li>
                    </ul>
                </li>
           
            @else
            <ul class="nav navbar-nav navbar-right">
			 <li class="dropdown">
			  <a href="#" data-toggle="modal" data-target="#myModall">Login</a>
					  <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabell">
					  <div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
        
					<h4 class="modal-title" id="myModalLabel">Login</h4>
					<!--<i class="fa fa-address-book" aria-hidden="true"></i>-->
  
					</div>
					<div class="modal-body">
					<form class="form-horizontal"> 
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label> 
					<div class="col-sm-10"> <input class="form-control" id="inputEmail3" placeholder="Email" type="email"> 
					</div> </div> <div class="form-group"> 
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10"> <input class="form-control" id="inputPassword3" placeholder="Password" type="password"> 
					</div> </div> 
					<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10"> 
					<div class="checkbox"> 
					<label> <input type="checkbox"> Remember me </label> 
					</div> </div> </div> <div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10"> 
					<button type="button" class="btn btn-primary">Login</button>
					</div> </div> 
					</form>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="#">Forget Password</a>
				</div>
			</div>
				</div></div>
			</li>
			
              <li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li class="dropdown-submenu">
                <a tabindex="-1" href="#" data-toggle="modal" data-target="#myModal">Medical Center</a>
			   
						<li class="dropdown-submenu open">
    <a tabindex="0"  href="#" data-toggle="modal" data-target="#myModal1">Patient</a>  </li>

   <!-- <ul class="dropdown-menu">
      <li class="dropdown-header">User Name</li>
      <li><a tabindex="0">Sub action</a></li>
      <li class="disabled"><a tabindex="0">Another sub action</a></li>
      <li><a tabindex="0">Something else here</a></li>
    </ul>-->
</ul>
						</li>
					</ul> 
			
             </li>
			 
           <!--  <li> settings
			  <a href="#" <i class="fa fa-cog" aria-hidden="true"></i></a>
					  
			</li>-->
</div>
          </div>
		  </div>@endif
      </nav>
</div>   
</header>
</ul>
</ul></li></div></a></div></div></nav></div></header>
<!--Profile portion-->
<div class="container profile">
 <div class="col-xs-12 panel panel-info">
            <div class="panel-heading">
					  
					  
					  
				<div class="dropdown1">
        <h4>{{Auth::user()->is_Profile->first_name}} {{Auth::user()->is_Profile->last_name}}</h4>
					<button class="btn btn-default dropdown-toggle col-md-offset-10" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Setting
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
					<li><a href="{{route('patient.edit')}}">Edit</a></li>
					<li><a href="{{route('patient.password')}}">Change password</a></li>
          <li><a href="{{route('patient.appointment')}}">Make Appointment</a></li>
            <li><a href="{{route('user.appointment.history')}}">Appointments History</a></li>
					
				  </ul>
				</div>     
			</div></a>
            <div class="panel-body">
              
                
                
        
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Disease</th>
                        <th>Doctor's Name</th>
                        <th>Action</th>
                      </tr>
                      @foreach($b as $key)
                      <tr>
                        <td>{{$key->id}}</td>
                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $key->Appointment_timings)->format('Y-m-d') }}</td>
                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $key->Appointment_timings)->format('H:i:s') }}</td>
                        <td>{{$key->reason}}</td>
                        <td> Dr. {{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->first_name}}&nbsp;{{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->last_name}}</td>
                        <td> <a href="{{route('patient.show.booking',$key->id)}}"> <button type="button">Show </button></a>
                         <button type="button" name="cancel" data-toggle="modal" data-target="#cancel">Cancel </button>
                        <!-- Cancel Modal -->

                    
                    <div class="modal fade" id="cancel" role="dialog">
                      <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                          {!! Form::open(['route' => ['patient.cancel.booking', $key->id]]) !!}
                          {!! csrf_field() !!}
                          <input type="hidden" value ="{{$key->doctor_id}}" name="did">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cancel Booking</h4>
                          </div>
                          <div class="modal-body">
                            <h4> Reason </h4>
                            <input type="hidden" value="2" name="cancels">
                            <textarea class="form-control" placeholder="Message" name="reasoncancel">
                            </textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                            <button type="submit" class="btn btn-default" id="sub">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{Form::close()}}
                           <!-- End Cancel Modal -->
                        <!-- Reschedule -->
                        <button type="button" name="reschedule" data-toggle="modal" data-target="#reschedule">Reschedule </button>
                        <!-- Reschedule Modal -->
                    <div class="modal fade" id="reschedule" role="dialog">
                      <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                          {!! Form::open(['route' => ['patient.reschedule.booking', $key->id]] ) !!}
                           {!! csrf_field() !!}
                          <input type="hidden" value ="{{$key->doctor_id}}" name="did">
                          <div class="modal-header">
                            
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Reschedule Booking</h4>
                          </div>
                          <div class="modal-body">
                            <h4> Reason </h4>
                            <input type="hidden" value="3" name="reschedules">
                            <textarea class="form-control" placeholder="Message" name="reschedule">
                            </textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                          <button type="submit" class="btn btn-default" id="sub">Submit</button>
                          </div>
                        </div>
                        </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
                {{Form::close()}}
                
                <!-- End Reschedule Modal -->
                </td>
                      </tr>
                      @endforeach
                      </tbody>
                      </table>
                      </div>
                      </div>
 
  
    </div>
<section class="footer">
<div class="container">

<div class="col-xs-12 col-sm-4 list1">
<h3>About Us</h3>
<p>I am 40 yrs. Now I was loosing my hair on my temple area which I got back from prp treatment by Dr. Deepak. 
very satisfactory results of prp which I got at Dermasculpt clinic.Many thanks to team  to team.
I am 40 yrs. Now I was loosing my hair on my temple area which I got back from prp treatment by Dr. Deepak. 
</p>
</div>
<div class="col-xs-12 col-sm-3 list">

<ul class="listing">
<li><a href="#">Register</a></li>
<li><a href="#">Near HealthCare</a></li>
<li><a href="#">Doctor Register</a></li>
<li><a href="#">Best Doctors</a></li>
<li><a href="#">Request an Appointment</a></li>
</div>

<div class="col-xs-12 col-sm-3 list">
<ul class="listing">
<li><a href="#">Contact Us</a></li>
<li><a href="#">Terms & Conditions</a></li>
<li><a href="#">Privacy policy</a></li>
<li><a href="#">FAQ</a></li>

</ul>
</div>
<div class="col-xs-12 col-sm-2 list">
<ul class="listing">
<li><a href="#"></i>Share on</a></li>
<li class="share"><a href="#"><i class="fa fa-facebook-square"> </i>
Facebook</a></li>
<li><a href="#"><i class="fa fa-twitter-square"></i>
Twitter</a></i></li>
<li><a href="#"><i class="fa fa-youtube-square"></i>You Tube</a></li>

</ul>
</div>
</div>

<div class="rights text-center">
<span>© 2017 By <a href="http://www.wishtreetech.com" target="_blank" class="text-color">Talentelgia Technologies</a>
 All Rights Reserved </span></div>

</section>

		
</body>
</html>