<!DOCTYPE html>
<html>
<head>

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link href="{{asset('css/ekko-lightbox.css')}}" rel="stylesheet">
<link href="{{asset('css/medical-admin.css')}}" rel="stylesheet">
<link href="{{asset('css/admin.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/ekko-lightbox.js')}}"></script>


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
/*.profile{
	float:left;
	    width: 65px;
    height: 65px;
    border-radius: 69px;
}*/
</style>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
        alwaysShowClose: true
    });
});
</script>
</head>
<body>

<header>
<div class="container-fluid navigation">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="">
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
            <li class="profile_li"> </li>
             <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>   
                    {{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('patient.profile.login') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                                                   
                     
                        <li class="divider"></li>
                        {{--<li>--}}
                            {{--{{ Auth::user()->email }}--}}
                        {{--</li>--}}
                        <li>

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
<div class="profile">
 <div class="col-xs-12 panel panel-info booking-details">
            <div class="panel-heading">
					  
					  
					  
				<div class="dropdown1">
        <h4>{{Auth::user()->is_Profile->first_name}} {{Auth::user()->is_Profile->last_name}}</h4>
				
				</div>     
			</div></a>
            <div class="panel-body">
               <div class="panel-body">
              <div class="row">
                    <div class="panel-body">
                        <div class="col-md-2">
                            <h3>Patient Details</h3>
                            <p><img id="logo-img" src="/images/profile_pic/{{Auth::user()->is_Profile->images}}" style="height: 120px;"></p>
                          <p>Name : {{Auth::user()->is_Profile->first_name}}  {{Auth::user()->is_Profile->last_name}}</p>
                            <p>Contact Number : +91-{{Auth::user()->is_Profile->contact_no}}</p>
                            <p>Address : {{Auth::user()->is_Profile->address}}</p>
                            <p>Country : {{Auth::user()->is_Profile->country}}</p>
                            <p>State : {{Auth::user()->is_Profile->state}} </p>
                            <p>City :{{Auth::user()->is_Profile->city}} </p>
                            <p>Pincode :{{Auth::user()->is_Profile->pincode}}</p>
                        </div>
                        <div class="col-md-2">
                            <h3>Doctor Details</h3>
                          
                            <p><img id="logo-img" src="/images/profile_pic/{{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->images}}" style="height: 120px;"></p>
                            <p>Name : Dr. {{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->first_name}}&nbsp;{{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->last_name}} </p>
                            <p>Contact Number :{{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->contact_no}}</p>
                            <p>Address :{{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->address}}</p>
                            <p>Country :{{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->country}} </p>
                            <p>State :{{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->state}} </p>
                            <p>City : {{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->city}}</p>
                            <p>Pincode :{{App\Userprofile::where('user_id','=',$key->doctor_id)->first()->pincode}} </p>
                            
                        </div>
                        <div class="col-md-4">
                         <h3>Booking Details</h3>
                                <p>
                                @if($key->status==0)
                                    <label class="primary">Booking Pending</label>
                                @endif
                                @if($key->status==1)
                                    <label class="success">Booking Complete</label>
                                @endif
                                @if($key->status==2)
                                    <label class="warning">Booking Canceled</label>
                                @endif
                                @if($key->status==3)
                                    <label class="danger">Booking Rescheduled</label>
                                @endif
                            </p>
                            <p>
                                @if($key->payment_status==0)
                                    <label class="warning">Payment Pending</label>
                                @endif
                                @if($key->payment_status==1)
                                    <label class="success">Payment Complete</label>
                                @endif
                            </p>
                            <p> Disease Type : {{$key->reason}}</p>
                            <p> Appointment Date : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $key->Appointment_timings)->format('Y-m-d') }}</p>
                            <p> Appointment Time : {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $key->Appointment_timings)->format('H:i:s') }}</p>
                            @if($key->status==2)
                            <p>Booking Cancellation Reason : {{$key->cancel_reason}}</p>
                            @endif
                            @if($key->status==3)
                                <p>Booking Rescheduling Reason : {{$key->reschedule_reason}}</p>
                            @endif

                           
                           
                             <h3>Booking Payments Details</h3>

                              <table class="table table-bordered" id="patient-booking">
                            <tr class="tr-head">
                                <th>Sr/No.</th>
                                <th>Amount</th>
                                <th>Transcrion Mode</th>
                                <th>Status</th>
                            </tr>
                              <?php $i=1;?>
                             @foreach($payment_transction_deatils as $booling_trans)
                                      
                                       <tr class="tr-body">
                                             <td>{{$i++}}</td>
                                             <td>{{$booling_trans->amount}}</td>
                                             <td>{{$booling_trans->transaction_mode}}</td>
                                             <td>@if($booling_trans->status==1)
                                                   <label class="primary">Payment Receved</label> 
                                                    @endif
                                                    @if($booling_trans->status==0)
                                                    <label class="warning">Payment Refunded</label>
                                                    @endif</td>
                                    </tr>
                             @endforeach
                            
                               </table>
                        </div>
                        
  <div class="col-md-4">
      <h3>Documents Details</h3>

 <a href="{{route('add.booking.doc',$key->id)}}" class="edit_pro_btn" id="yourBtn">Click To Add Document</a>
@foreach($booling_docs as $booling_doc)
    <div class="col-md-6">

        <a href="/images/documents/{{$booling_doc->documents}}" data-toggle="lightbox" data-gallery="example-gallery" ><img src="/images/documents/{{$booling_doc->documents}}" class="new-small-img">
        </a>
{!! Form::open(['method' => 'DELETE','route' => ['patient.document.destroy', $booling_doc->id,$booling_doc->booking_id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'edit_pro_btn1']) !!}
                    {!! Form::close() !!}
       
     

    </div>
    
@endforeach
    </div>
   </div>

    

                            </div>
                            </div>
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

		</ul>
    </div>
</body>
</html>