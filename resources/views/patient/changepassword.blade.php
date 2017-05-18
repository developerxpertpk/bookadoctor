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
.dropdown ul li{
 /* float:right;*/
    list-style: none;
    text-decoration: none;
 
}
.dropdown{
  float:right;
  list-style: none;
  /*width:70%;*/
  margin:0px;
}
.form{
  padding-top: 40px;
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
<div class="container profile">
 <div class="col-xs-12 panel panel-info">
            <div class="panel-heading">
            <h3 class="panel-title">{{Auth::User()->is_Profile->first_name}} {{Auth::User()->is_Profile->last_name}}</h3>
            
            
          
      </div>
      <!-- Change Password -->
<div class="form">
<form class="form-horizontal" action="{{route('patient.password.change')}}" method="POST"> 
          <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
          <label for="inputEmail3" class="col-sm-2 control-label">Old Password</label> 
          <div class="col-sm-10"><input class="form-control" id="inputEmail3" placeholder="Old Password" type="password" name="old_password"> 
          </div> </div>
           <div class="form-group"> 
          <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
          <div class="col-sm-10"> <input class="form-control" id="inputPassword3" placeholder="New Password" type="password" name="new_password"> 
          </div>
           </div> 
             <div class="form-group"> 
          <label for="inputPassword3" class="col-sm-2 control-label">Conform Password</label>
          <div class="col-sm-10"> <input class="form-control" id="inputPassword3" placeholder="Conform Password" type="password" name="password_confirmation"> 
          </div>
           </div>
           <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10"> 
          <button type="submit" class="btn btn-primary">Change Password</button>
          </div>
          </div> 
          </form>
          </div>
          </ul>
          </ul>
          </li>
          </div>
          </a>
          </div>
          </div>
          </nav>
          </div>     </body>
          </html>
