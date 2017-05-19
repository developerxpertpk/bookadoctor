<!DOCTYPE html>
<<<<<<< HEAD
<html>

<head>
    <!-- Bootstrap core CSS -->


<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
<script src="{{asset('js/app.js')}}"></script>
<!-- <script src="{{asset('js/jquery-1.12.4.js')}}"></script> -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="{{asset('js/jquery-ui.js')}}"></script>

<script>
$( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });

 $( "#city" ).autocomplete({
      source: "{{URL::route('city')}}",
      minLength: 1,
      select: function( event, ui ) {
        $("#city").val(ui.item.value);
      }
    });
    $( "#state" ).autocomplete({
     source: "{{URL::route('state')}}",
     minLength: 1,
     select: function( event, ui ) {
        $("#state").val(ui.item.value);
     }
    });

    $( "#country" ).autocomplete({
     source: "{{URL::route('country')}}",
     minLength: 1,
     select: function( event, ui ) {
        $("#country").val(ui.item.value);
      }
    });


  } );
// $( function() {
//     $( "#datepicker" ).datepicker({
//       showOn: "button",
//       buttonImage: "/img/calendar.gif",
//       buttonImageOnly: true,
//       buttonText: "Select date"
//     });
//   } );
</script>
<style>
#datepicker{
	float:left;

}
#datepicker img{
	width:40px;

}
 ul.ui-autocomplete {
    z-index: 1100;
}

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
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </a>
                        <a class="navbar-brand" href="#"><img src="img\logo.png"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Dr.Booking</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right"> @if(isset($page)) @foreach($page as $key)
                            <li class="dropdown"> <a href="{{$key->slug}}">{{$key->title}}</a></li> @endforeach @endif
                            <li class="dropdown"> <a href="#" data-toggle="modal" data-target="#myModall">Login</a>
=======
<html ng-app>
    <head>
        {{--  Bootstrap core CSS
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/angular-messages.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/custom_angular.js') }}" type="text/javascript"></script> --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>Dr. Booking</title>
        <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/medical-admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-lightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/clockpicker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
        {{--<link rel="stylesheet" href="{{ asset('css/standalone.css') }}">--}}
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        ]) !!};
        </script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jssor.slider-22.2.0.mini.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/select2.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/location.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap-lightbox.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/clockpicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/velocity.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/velocity.ui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/ajax-function.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.form.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.table2excel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/custom_angular.js') }}" type="text/javascript"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzoNF3kifUvuxgwoDSxQlgVgSKu9_ddzc"
        type="text/javascript"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
        <script>
        $( function() {
        $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
        });
        $( "#city" ).autocomplete({
        source: "{{URL::route('city')}}",
        minLength: 1,
        select: function( event, ui ) {
        $("#city").val(ui.item.value);
        }
        });
        $( "#state" ).autocomplete({
        source: "{{URL::route('state')}}",
        minLength: 1,
        select: function( event, ui ) {
        $("#state").val(ui.item.value);
        }
        });
        $( "#country" ).autocomplete({
        source: "{{URL::route('country')}}",
        minLength: 1,
        select: function( event, ui ) {
        $("#country").val(ui.item.value);
        }
        });
        } );
        // $( function() {
        //     $( "#datepicker" ).datepicker({
        //       showOn: "button",
        //       buttonImage: "/img/calendar.gif",
        //       buttonImageOnly: true,
        //       buttonText: "Select date"
        //     });
        //   } );
        </script>
        <style>
        #datepicker{
        float:left;
        }
        #datepicker img{
        width:40px;
        }
        ul.ui-autocomplete {
        z-index: 1100;
        }
        </style>
    </head>
    <body>
        <header id="header" class="user-headder">
            <div class="container-fluid navigation">
                <!-- Static navbar -->
                <nav class="navbar navbar-default">
                    <div class="user-navigation">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </a>
                            <a class="navbar-brand" href="{{ route('home1.home1') }}"><img src="{{ asset('img\logo.png') }}"></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{ route('home1.home1') }}">Dr.Booking</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right"> @if(isset($page)) @foreach($page as $key)
                                <li class="dropdown"> <a href="{{$key->slug}}">{{$key->title}}</a></li> @endforeach @endif
                                @if (Auth::guest())
                                <li class="dropdown"> <a href="#" data-toggle="modal" data-target="#myModall">Login</a>
>>>>>>> 27469232d5b1131875a6fe9cffc6607134e294e1
                                <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabell">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Login</h4>
                                                <!--<i class="fa fa-address-book" aria-hidden="true"></i>--></div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{action('Auth\LoginController@login')}}" method="POST" name="loginForm">
                                                        <div class="form-group" ng-class="{true: 'error'}[loginsubmitted && loginForm.email.$invalid]">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" id="inputEmail3" placeholder="Email" type="email" name="email" ng-model="email" required="required">
                                                                <span class="help-inline" ng-show="loginsubmitted && loginForm.email.$error.required">Email Required</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" ng-class="{true: 'error'}[loginsubmitted && loginForm.password.$invalid]">
                                                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" id="inputPassword3" placeholder="Password" type="password" name="password" ng-model="password" required="required">
                                                                <span class="help-inline" ng-show="loginsubmitted && loginForm.password.$error.required">Password Required</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox"> Remember me </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <button type="submit" class="btn btn-primary" ng-click="loginsubmitted=true">Login</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer"> {{--
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}} <a href="#">Forget Password</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu"> <a tabindex="-1" href="#" data-toggle="modal" data-target="#myModal">Medical Center</a></li>
                                            <li class="dropdown-submenu open"> <a tabindex="0" href="#" data-toggle="modal" data-target="#myModal1">Patient</a> </li>
                                            <!-- <ul class="dropdown-menu">
                                                <li class="dropdown-header">User Name</li>
                                                <li><a tabindex="0">Sub action</a></li>
                                                <li class="disabled"><a tabindex="0">Another sub action</a></li>
                                                <li><a tabindex="0">Something else here</a></li>
                                            </ul>-->
                                            
                                        </ul>
                                    </li>
                                    @else
                                    {{-- <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    <li> <img id="profile_avatar" src="{{asset('/images/profile_pic/'.Auth::user()->is_Profile->images)}}"></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  {{ Auth::user()->is_Profile->first_name }}&nbsp;{{ Auth::user()->is_Profile->last_name }}  <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            @if(Auth::user()->role_id==4)
                                            <li><a href="{{ route('medical.center.dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                                            @endif
                                            <li><a href="{{route('medical.center.image.gallery')}}"><i class="fa fa-fw fa-user"></i> Show Profile</a></li>
                                            <li>
                                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                                            </li>
                                            <li>
                                                <a href="{{route('medical.center.settings')}}"><i class="fa fa-fw fa-gear"></i> Settings</a>
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
                                        @endif
                                        <!--  <li> settings
                                            <a href="#" <i class="fa fa-cog" aria-hidden="true"></i></a>
                                            
                                        </li>-->
                                    </div>
                                </div>
                                
                            </div>
                        </nav>
                    </div>
<<<<<<< HEAD
                
        </div>
        </nav>
        </div>
    </header>
    <!--Banner and search portion--><img class="imgs" src="img\doctorteam.png">
    <section class="search text-center">
        <div class="container">
            <div class="col-xs-12 col-sm-5">
                <input type="text" class="form-control input-lg" placeholder="Enter City"> </div>
            <div class="col-xs-12 col-sm-5 spl">
                <input type="text" class="form-control input-lg" placeholder="Specialists Doctors,Clinics"> </div>
            <div class="col-xs-12 col-sm-2 spl">
                <button type="button" class="btn btn-success btn-lg">Search</button>
            </div>
        </div>
        
    </section>
    <!--Map-->
    <section>
        <div class="container control_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3431.3224802446844!2d76.72586331460944!3d30.6812015951665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f92d9039a87ad%3A0x725444a58a7f1c82!2sTalentelgia+Technologies+PVT+LTD!5e0!3m2!1sen!2sin!4v1493199520534" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </section>
    <!--healthcare portion-->
    <section class="tab-new">
        <h2>Find the Nearest HealthCare</h2>
        <div class="active container tab_control">
            <div class="tab left-nav col-xs-12 col-sm-4 pull-left">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#doctors" aria-controls="doctor" role="tab" data-toggle="tab"><i class="fa fa-briefcase"></i>
Doctors</a></li>
                    <li role="presentation"><a href="#dentist" aria-controls="dentist" role="tab" data-toggle="tab"><i class="fa fa-stethoscope"></i>
Dentist</a></li>
                    <li role="presentation"><a href="#alternative_medicine_doctor" aria-controls="alternative_medicine_doctor" role="tab" data-toggle="tab"><i class="fa fa-plus-square"></i>Alternative Medicine doctor</a></li>
                    <li role="presentation"><a href="#therapists_nutrinionist" aria-controls="therapists_nutrinionist" role="tab" data-toggle="tab"><i class="fa fa-heartbeat"></i>Therapists nutrinionist</a></li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content col-xs-12 col-sm-8 pull-right">
                <div role="tabpanel" class="tab-pane active" id="doctors">
                    <ul class="nav nav-tab" role="tablist">
                        <li>Ophthalmologist</li>
                        <li>Dermatologist</li>
                        <li>Cardiologist</li>
                        <li>Psychiatrist</li>
                        <li>Gastroenterologist</li>
                        <li>Ear-Nose-Throat (ENT)</li>
                        <li>Gynecologist / Obstetrician</li>
                        <li>Neurologist</li>
                        <li>Urologist</li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="dentist">
                    <ul class="nav nav-tab" role="tablist">
                        <li>Dentist</li>
                        <li>Orthodontist</li>
                        <li>Endodontist</li>
                        <li>Prosthodontist</li>
                        <li>Pediatric</li>
                        <li>Implantologist</li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="alternative_medicine_doctor">
                    <ul class="nav nav-tab" role="tablist">
                        <li>Ayurveda</li>
                        <li>siddha</li>
                        <li>Yoga$Naturopatny</li>
                        <li>Homeopath</li>
                        <li>Unani</li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="therapists_nutrinionist">
                    <ul class="nav nav-tab" role="tablist">
                        <li>Achouncturist</li>
                        <li>Psychologist</li>
                        <li>Speech therapist</li>
                        <li>physiotherapict</li>
                        <li>Audiologist</li>
                        <li>Dietitian$Nutritionist</li>
                        <li>Thryoid Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="request">
        <div class="container">
            <div class="big_button">
            @if(!Auth::User())
               <button type="button" class="btn btn-success btn-lg"data-toggle="modal" data-target="#myModal">Request an appointment</button>
                <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          </div>
        <div class="modal-body">
          <h4>Please Login First.</h4>
        </div>
       </div>
      
    </div>
  </div>
  
</div>

    		@elseif(Auth::User())
    		
              <form id="logout-form" action="{{ route('patient.appointment') }}" method="POST" ">
           			 {{ csrf_field() }}
                <button type="button" class="btn btn-success btn-lg">Request an appointment</button>

               </form>
@endif           
            </div>
        </div>
    </section>
    <!---Best Doctor Portion-->
    <section class="best-doctors">
        <div class="container">
            <h2>Best Doctors</h2>
            <div class="col-lg-3"> <img class="img-circle" src="img\dentist.png" alt="Generic placeholder image" height="170" width="170">
                <h3>Dr. Rajesh</h3>
                <h4>Denatlist</h4> </div>
            <div class="col-lg-3"> <img class="img-circle" src="img\cardio.png" alt="Generic placeholder image" height="170" width="170">
                <h3>Dr.Harish</h3>
                <h4>Cardiolist</h4> </div>
            <div class="col-lg-3"> <img class="img-circle" src="img\eye.png" alt="Generic placeholder image" height="170" width="170">
                <h3>Dr.Saeed</h3>
                <h4>Ophthalmologist</h4> </div>
            <div class="col-lg-3"> <img class="img-circle" src="img\phy.png" alt="Generic placeholder image" height="170" width="170">
                <h3>Dr.Shela</h3>
                <h4>psychologist</h4> </div>
        </div>
    </section>
    <!--Feedback portion-->
    <section class="feedback">
        <div class="container">
            <h3>Recent Feedback</h3>
            <div class="col-xs-12 col-sm-2"> <img src="img\doct.png">
                <h5>Dr. Deepak Sharma</h5> </div>
            <div class="col-xs-12 col-sm-10">
                <p>I am 40 yrs. Now I was loosing my hair on my temple area which I got back from prp treatment by Dr. Deepak. very satisfactory results of prp which I got at Dermasculpt clinic.Many thanks to team.- Bala
                    <button type="button" class="btn btn-success btn-lg bb">View More</button>
                </p>
            </div>
        </div>
    </section>
    <section class="footer">
        <div class="container">
            <div class="col-xs-12 col-sm-4 list1">
                <h3>About Us</h3>
                <p>I am 40 yrs. Now I was loosing my hair on my temple area which I got back from prp treatment by Dr. Deepak. very satisfactory results of prp which I got at Dermasculpt clinic.Many thanks to team to team. I am 40 yrs. Now I was loosing my hair on my temple area which I got back from prp treatment by Dr. Deepak. </p>
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
                <ul class="listing"> @if(isset($page)) @foreach($page as $key)
                    <li><a href="{{$key->slug}}">{{$key->title}}</a></li> @endforeach @endif </ul>
            </div>
            <div class="col-xs-12 col-sm-2 list">
                <ul class="listing">
                    <li>
                        <a href="#">Share on</a>
                    </li>
                    <li class="share"><a href="#"><i class="fa fa-facebook-square"> </i>
Facebook</a></li>
                    <li><a href="#"><i class="fa fa-twitter-square"></i>
Twitter</a>
                    </li>
                    <li><a href="#"><i class="fa fa-youtube-square"></i>You Tube</a></li>
                </ul>
            </div>
        </div>
        <div class="rights text-center"> <span>© 2017 By <a href="http://www.wishtreetech.com" target="_blank" class="text-color">Talentelgia Technologies</a>
 All Rights Reserved </span></div>

    </section>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Medical Center</h4> </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{route('medical.center.regester.submit')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="role" value="4">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="inputEmail3" placeholder="First Name" type="text" name="first_name"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="inputPassword3" placeholder="Last Name" type="text" name="last_name"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">E-mail</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="inputEmail3" placeholder="Email" type="email" name="email"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="inputPassword3" placeholder="Password" type="password" name="password"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="inputPassword3" placeholder="Confirm Password" type="password"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me </label>
                                </div>
                            </div>
                        </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
                    </div>
            </div>
                    </div>
    </div>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel1">Registration</h4> </div>
                <div class="modal-body">

                <form class="form-horizontal"  action="{{route('patient.insert')}}" method="post" File="true">
                {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="inputEmail3" placeholder="First Name" type="text" name="first_name"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="inputEmail3" placeholder="Last Name" type="text" name="last_name"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="inputEmail3" placeholder="Email" type="email" name="email"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="inputPassword3" placeholder="Password" type="password" name="password"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">DOB</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="datepicker" placeholder="Age" type="text" name="dob">
                                <!-- To be replaced by Jquery Datepicker -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-10">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios1" value="Male" checked> Male </label>
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios1" value="Female" checked> Female </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="Address" name="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-3">
                                <!--<input class="form-control" id="inputEmail3" placeholder="City" type="email">-->
                                <div class="dropdown1">
                                    Country:<input type="text" id="country" class="form-control" name="country">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="dropdown1">
                                    State:<input type="text" id="state" class="form-control" name="state">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="dropdown1">
                                   City:<input type="text" id="city" class="form-control" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Pin Code</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="inputEmail3" placeholder="Pin Code" type="text" name="pincode"> </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="inputEmail3" placeholder="Contact Number" type="text" name="contactno"> </div>
                        </div>
                
                <div class="modal-footer">
                    <button type="Submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>