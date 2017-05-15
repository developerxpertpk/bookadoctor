<!DOCTYPE html>
<html>
<head>

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>

<style>
.dropdown-menu{
	float:left;
}
.img-circle {
    height: 200px;
    border-radius: 50%;
    width: 200px;
}
 ul.ui-autocomplete {
    z-index: 1100;
}
/*.profile{
	float:left;
	    width: 65px;
    height: 65px;
    border-radius: 69px;
}*/
</style>
<script>

$( function() {

	  $( "#cities" ).autocomplete({
      source: '/city',
      minLength: 1,
      select: function( event, ui ) {
        $("#cities").val(ui.item.value);
      }
    });

	  $( "#medical" ).autocomplete({
      source: '/medicalcenter',
      minLength: 1,
      select: function( event, ui ) {
        $("#medical").val(ui.item.value);
      }
    });

$(" #disease").autocomplete({                              
	source:'/disease',   
	minLength: 1,
	});

	});

</script>
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
            <li> <img id="profile_avatar" class="profile" src=""></li>
             <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>   
                    {{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('patient.profile.login') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                                                   
                        <li><a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
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
				  </div>
          </div>
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
<!--Profile portion-->
<div class="container profile">
 <div class="col-xs-12 panel panel-info">
            <div class="panel-heading">
			<h3> Make Your Booking Here</h3>
			
			</div>
			 <div class="panel-body">
              <div class="row">
              	 <form id="logout-form" action="{{ route('patient.appointment') }}" method="POST" ">
           			 {{ csrf_field() }}
           		<div class="panel-body">
           		<div class=" form-group form-inline">
           			<div class="ui-widget">
						<label for="city" class="col-md-4  contro-label">  Select City </label> <!--  Cities -->   
						<input id="cities" name="city" class="form-control col-md-6 ">
					</div>
					</div>
					<div class=" form-group form-inline">
					<div class="ui-widget">
						<label for="medical " class="col-md-4 contro-label"> Medical Center Name </label> <!--  Medical Centers -->   
						<input id="medical" name="medical" class="form-control col-md-6  ">
					</div>
					</div>
					
					<div> <!-- Reason -->
					<div class=" form-group form-inline">
					<div class="ui-widget">
						<label for="disease" class=" col-md-4 contro-label"> Disease </label> 
						<input  type ="text" id="disease" name="disease" class="form-control col-md-6 ">
					</div>
					</div>
					</div>
           			</form>

              </div>
              </div>
			<div class-="viewdoctors">
			<table class="table table-bordered">
				<tr>
					<th>Day</th>
					<th>Time</th>
					<th>Status</th>   <!-- Available or Not available -->
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>

			</table>
              </div>
              </div>

              </ul>
              </ul>
              </li>
              </div>
              </a>
              </div>
              </div>
              </nav>
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
</ul>
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

