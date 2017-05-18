<!DOCTYPE html>
<html>
<head>

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/fullcalendar.css')}}">
<script src="{{asset('js/app.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('js/jquery-ui.js')}}" type="text/javascript"></script>
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
            <ul class="nav navbar-nav navbar-right">
			 <li class="dropdown">
			  <a href="#" data-toggle="modal" data-target="#myModall">Login</a>
					  <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabell">
					  <div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Login</h4>
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
					</div> </div> </div>
					<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10"> 
					<button type="Login" class="btn btn-primary">Login</button>
					<a href="#">Forget Password</a>
					</div> </div> 
					</form>
					</div>
					<div class="modal-footer">
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
</ul>
						</li>
					</ul> 
             </li>
</div>
          </div>
		  </div>
      </nav>
</div>   
</header>
<section class="center">
<div class="container">

<div class="col-xs-12 col-sm-2 left">
<img src="{{asset('images/profile_pic/'.$medicalprofile->images)}}">

</div>
   <div class="col-xs-12 col-sm-8 right">
<h2>{{$medicalprofile->title}}</h2>
 <h4>
 @foreach($medicalprofile->Servicepiv as $key) 
        {{$key->name}}     
 @endforeach
 </h4>
 <span><i class="fa fa-star" aria-hidden="true"></i>
 <i class="fa fa-star" aria-hidden="true"></i>
 <i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star-half-o" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>(1184 votes)</span>
<h4>{{$medicalprofile->address}}, {{$medicalprofile->city}}</h4>
<div class="address">{{$medicalprofile->address}}, {{$medicalprofile->city}}, {{$medicalprofile->state}},<br>
 {{$medicalprofile->country}}, pincode:{{$medicalprofile->pincode}}</div>
<h5>Share on profile <i class="fa fa-facebook-square">
</i>
<i class="fa fa-twitter-square"></i> </h5><button>Call now</button>
 </div>
</div>
</section>

<div class="container">
<section class="container-fluid tab_Doctors">
 <div class="texts text-center">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs link" role="tablist">
    <li role="presentation" class="active"><a href="#Overview" aria-controls="Overview" role="tab" data-toggle="tab">Overview</a></li>
    <li role="presentation"><a href="#Doctors" aria-controls="Doctors" role="tab" data-toggle="tab">Doctors</a></li>
   <li role="presentation"><a href="#Feedback" aria-controls="Feedback" role="tab" data-toggle="tab">Feedback (26)</a></li>
    <li role="presentation"><a href="#Photos" aria-controls="Photos" role="tab" data-toggle="tab">Photos</a></li>
   <li role="presentation"><a href="#Services" aria-controls="Services" role="tab" data-toggle="tab">Services</a></li>
   <li role="presentation"><a href="#Map" aria-controls="Map" role="tab" data-toggle="tab">Map</a></li>
 
  </ul>
  </div>
  <div class="tab-content tt">
   <div role="tabpnel" class="tab-pane active aa" id="Overview">
{{--   <div class="about">
  <h1>About Aspire Fertility Center</h1>
  <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit hendrerit ornare 
  a felis.Nullam hendrerit leo quis volutpat faucibus.Aliquam 
  viverra sagittis bibendum.Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit hendrerit ornare 
  a felis tellus urna venenatis id suscipit hendrerit ornare.Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit hendrerit ornare 
  a felis.Nullam hendrerit leo quis volutpat faucibus tellus urna venenatis id suscipit hendrerit ornare 
  a felis tellus urna venenatis id suscipit hendrerit ornare.Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit  <span>more...</span></p>
  </div>
   --}}
    
    <div class="three-boxes">
     <div class="control-margin">

     <!--<div class="box">-->
	 <div class="col-xs-12 col-sm-3 box">
	<h2 class="overview-timings-title">Timings</h2>
	@foreach($medicalprofile->getUser->usersetting as $key)
	<p>{{$key->day}} {{$key->time_in}} - {{$key->time_out}}</p>
	@endforeach
	{{-- <p>MON - TUE, THU - SAT</p>
    <p>9:00  AM - 7:45  PM</p>
    <p>	WED</p>
										
	<p>9:00  AM - 7:00  PM</p>
										
	<p>SUN</p>
										
    <p>9:00  AM - 11:00  AM</p> --}}
										
	</div>
								   
					 <div class="col-xs-12 col-sm-3 box2">

									<h2>Services</h2>
									@foreach($medicalprofile->Servicepiv as $key=>$value)
									@if($key<=2)
									<h5>{{$value->name}}</h5>
									@endif
									@if($key==2)
									</div>
									<div class="clear"></div>
									<div class="col-xs-12 col-sm-3 box3">
									<h2> </h2>
									<h5>{{$value->name}}</h5>
									@elseif($key>2 && $key<=4)
									<h5>{{$value->name}}</h5>
									@endif
									@if($key>4)
									</div></div>
									<a class="link view-all-services-link moreServicesLink">{{count($medicalprofile->Servicepiv)-5}} more</a>
									@elseif($key==count($medicalprofile->Servicepiv))
									</div></div>
									@endif
									@endforeach
									</div></div>
									{{-- In-Vitro Fertilization (IVF)	</h5>
								<h5>Intra-Uterine Insemination (IUI)</h5>
								<div class="clear"></div>		
																	
								<h5>Laparoscopic Surgery</h5>
								<h5>Hysteroscopy</h5>
								<div class="clear"></div>																		
																
                                     <h5>Clinical Embryologist</h5>
										</div>
										<div class="col-xs-12 col-sm-3 box3">
										<h2> </h2>
										<h5> Amniocentesis</h5>
										<h5>Cervical Cerclage</h5>
										 <h5>Mirena (Hormonal Iud)	<h5>
										<div class="clear"></div>
										<h5>Dilatation and Curettage (D &amp; C)</h5>
										 <h5>Tubectomy/Tubal Ligation</h5>
										 <div class="clear"></div>
										</div>
										
										</div> --}}
																						
									 <div class="col-xs-12 col-sm-3 box4">
									<h3 class="overview-photos-title">Photos</h3>
									<div class="overview-photo-row">
										<img src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043687-5809e5e73ad7e.jpg/microthumbnail" data-id="971251" data-lazy-src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043687-5809e5e73ad7e.jpg/microthumbnail" data-originalsrc="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043687-5809e5e73ad7e.jpg" alt="Aspire Fertility Center - Image 1" class="clinic_photos" itemprop="photo" style="display: inline;">
										<img src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043691-5809e5eb24110.jpg/microthumbnail" data-id="971252" data-lazy-src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043691-5809e5eb24110.jpg/microthumbnail" data-originalsrc="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043691-5809e5eb24110.jpg" alt="Aspire Fertility Center - Image 2" class="clinic_photos" itemprop="photo" style="display: inline;">
										<img src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043696-5809e5f0f0da6.jpg/microthumbnail" data-id="971253" data-lazy-src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043696-5809e5f0f0da6.jpg/microthumbnail" data-originalsrc="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043696-5809e5f0f0da6.jpg" alt="Aspire Fertility Center - Image 3" class="clinic_photos" itemprop="photo" style="display: inline;">
										<img src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043717-5809e6050a5e2.jpg/microthumbnail" data-id="971254" data-lazy-src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043717-5809e6050a5e2.jpg/microthumbnail" data-originalsrc="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043717-5809e6050a5e2.jpg" alt="Aspire Fertility Center - Image 4" class="clinic_photos" itemprop="photo" style="display: inline;">
										</div>
									<div class="overview-photo-row">
										<img src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043725-5809e60d5f147.jpg/microthumbnail" data-id="971255" data-lazy-src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043725-5809e60d5f147.jpg/microthumbnail" data-originalsrc="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043725-5809e60d5f147.jpg" alt="Aspire Fertility Center - Image 5" class="clinic_photos" itemprop="photo" style="display: inline;">
										<img src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043765-5809e6358622a.jpg/microthumbnail" data-id="971256" data-lazy-src="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043765-5809e6358622a.jpg/microthumbnail" data-originalsrc="https://images1-fabric.practo.com/aspire-fertility-center-bangalore-1477043765-5809e6358622a.jpg" alt="Aspire Fertility Center - Image 6" class="clinic_photos" itemprop="photo" style="display: inline;">
										<a href="#photos" class="hospital-photos-link">+1</a>
										</div>
									<p></p>
								</div>
								 <div class="col-xs-12 col-sm-8">.
								 @if(count($medicalprofile->Servicepiv)-4>0)
									<a class="link view-all-services-link moreServicesLink">
									{{count($medicalprofile->Servicepiv)-4}} more</a>
									@else
									&nbsp&nbsp
									@endif
								</div>
						</div>
           </div>
									
									
	{{-- <div role="tabpanel" class="tab-pane" id="Doctors">
   <p>3 Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit hendrerit ornare 
  a felis.Nullam hendrerit leo quis volutpat faucibus.Aliquam 
  viverra sagittis bibendum.Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
    </div>
   <div role="tabpanel" class="tab-pane" id="Feedback">
   <p>
   2 Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit hendrerit ornare 
  a felis.Nullam hendrerit leo quis volutpat faucibus.Aliquam 
  viverra sagittis bibendum.Lorem ipsum dolor sit amet consectetur adipiscing elit.
   </p>
   </div> 
   <div role="tabpanel" class="tab-pane" id="Photos">
   <p>
   1 Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit hendrerit ornare 
  a felis.Nullam hendrerit leo quis volutpat faucibus.Aliquam 
  viverra sagittis bibendum.Lorem ipsum dolor sit amet consectetur adipiscing elit.
  
  No images
   </p>
   </div>
   <div role="tabpanel" class="tab-pane" id="Services">
   <p>
   1 Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit hendrerit ornare 
  a felis.Nullam hendrerit leo quis volutpat faucibus.Aliquam 
  viverra sagittis bibendum.Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Lorem ipsum
  Lorem ipsum
   </p>
   </div>
   <div role="tabpanel" class="tab-pane" id="Map">
   <p>
   1 Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Mauris tellus urna venenatis id suscipit hendrerit ornare 
  a felis.Nullam hendrerit leo quis volutpat faucibus.Aliquam 
  viverra sagittis bibendum.Lorem ipsum dolor sit amet consectetur adipiscing elit.
  Nullam hendrerit leo quis volutpat faucibus.Aliquam 
  viverra sagittis bibendum.Lorem ipsum dolor sit amet consectetur adipiscing elit.
   </p>
  </div>    --}}
       </div>
  </div>
   </div>
</section>
<section class="appointment">

<div class="center">
<h3>Doctors in {{$medicalprofile->title}}</h3>
<h5>{{count($doctors)}} Doctors in this Clinic</h5>
</div>
@foreach($doctors as $key)
 <div class="container"> 						
<div class="col-xs-12 col-sm-2">
	<img src="{{asset('images/profile_pic/'.$key->is_doctors->is_profile->images)}}">
</div >
<div class="col-xs-12 col-sm-6 info">
	<h3>Dr. {{$key->is_doctors->is_profile->first_name}} {{$key->is_doctors->is_profile->last_name}}</h3>
	<p>MBBS,MD obstratrics & Gynaecology,FellowShip in reproductive Medical....
	15 years experience</p>
	@foreach($key->is_doctors->is_profile->Servicedoc as $keyss)
			<h5>{{$keyss->name}}</h5>
	@endforeach
</div >

<div class="col-xs-12 col-sm-4 icons">
			<h5><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span>97% (2445 votes)</span></h5>
			<h5><i class="fa fa-clipboard" aria-hidden="true"></i><span>473 Feedback</span></h5>
				@foreach($key->is_doctors->is_profile->Servicedoc as $keyss)
				@if($keyss->price != null)
			<h5><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span>{{$keyss->price}}</span></h5>
			@endif
	@endforeach
			
			@foreach($key->is_doctors->usersetting as $keys)
			<h5><i class="fa fa-clock-o" aria-hidden="true"><span></i>{{$keys->day}} {{$keys->time_in}}-{{$keys->time_out}}</span></h5>
			@endforeach
			<button type="submit" class="btn btn-success bb open_table" id="split-{{$key->is_doctors->is_profile->id}}"><i class="fa fa-bolt" aria-hidden="true">
			Book Appointment</i></button>
</div>

<div class="t_open{{$key->is_doctors->is_profile->id}}" style="display:none">
<div class="container">
 {!! Form::open(['route' =>['make.booking',$medicalprofile->user_id],'method'=>'POST','files'=> true]) !!}
 {{csrf_field()}}
 <input type="hidden" value="{{$key->is_doctors->id}}" id="doc-id" name="doc-id">
<div class="row form-group">
	<div class="col-md-3">
		Reason:
	</div>
	<div class="col-md-9">
		<select name="reason" class="form-control">
		@foreach($key->is_doctors->is_profile->Servicedoc as $keyss)
			<option value="{{$keyss->name}}-{{$keyss->price}}">{{$keyss->name}}</option>
		@endforeach
		<option value="Regular Checkup">Regular Checkup</option>
		</select>
	</div>
</div>
	<div class="row form-group">
	<div class="col-md-3">
		Date:
	</div>
	<div class="col-md-9">
		<input type="text" id="datepicker1" class="form-control" name="datepicker23" value="">
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		Appointment Time:
	</div>
	<div class="col-md-9">
		<input type="text" name="time12" id="time1" value="">
	</div>
</div>
</div>
  <div class="col-xs-12 col-sm-4">
   <input type="submit" name="submit" class="btn btn-success">
  {!!@Form::close()!!}
 </div>
</div>
</div>
@endforeach
</section>
{{$doctors->links()}}
<script>
$(document).ready(function(){
	 $.ajaxSetup({
          headers:
          {
              'X-CSRF-Token': $('input[name="_token"]').val()
          }
          });
	var c,doc,medicalid;
    $(".open_table").click(function(){
    	var id = this.id;
    	var uniq= id.split("-");
    	//alert(uniq);
        $(".t_open"+uniq[1]).toggle();
    });
    $( "#datepicker1" ).datepicker({ minDate: 0, maxDate: "+1M +10D",dateFormat: "yy-mm-dd", onSelect: function(){
        c = $('#datepicker1').val();
        doc = $("#doc-id").val();
        //$( this ).attr('value')=c;
       // console.log(c);
       // console.log(doc);
        } });
//     $("#datepicker").blur(function(){
//     c = document.getElementById("datepicker").value;
//     console.log(c);
// });
    medicalid={{$medicalprofile->user_id}};
        $( "#time1" ).autocomplete({
      source: function( request, response ) {
        //console.log(c);
         $.ajax({
                url: "/time",
                dataType: "json",
                method: "GET",
                data: { searchText: c, docid: doc, medicid: medicalid},
                success: function( data ) {
                    response(data, function( item ) {
                        return {
                            label:item,
                            value:item,
                        }
                    });
                },
                error: function(xhr, status, error) {
      				// check status && error
      				console.log(error);
      				console.log(status);
      				console.log(xhr);
   					},
            });    
    },
      minLength: 1,
      select: function( event, ui ) {
        //alert(ui.item.value);
      // $( "#time" ).attr( "value" )=ui.item.value; 
      }
    }).on('focus', function() { $(this).keydown(); });
});

//$('#datepicker').on('change',function(){$( "#datepicker" ).attr( "value" )=$( "#datepicker" ).val();});
</script>
<!--Footer-->
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
<li><a href="#" data-toggle="modal" data-target="#myModal1">Register</a></li>
<li><a href="#">Near HealthCare</a></li>
<li><a href="#" data-toggle="modal" data-target="#myModal">Doctor Register</a></li>
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





<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Medical Center Registration</h4>  
					</div>
					<div class="modal-body">
					<form class="form-horizontal"> 
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-4 control-label">First Name</label> 
					<div class="col-sm-8"> 
					<input class="form-control" id="inputEmail3" placeholder="First Name" type="email"> 
					</div> </div> 
					<div class="form-group"> 
					<label for="inputPassword3" class="col-sm-4 control-label">Last Name</label>
					<div class="col-sm-8"> 
					<input class="form-control" id="inputPassword3" placeholder="Last Name" type="Last Name"> 
					</div> </div> 
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-4 control-label">E-mail</label> 
					<div class="col-sm-8"> <input class="form-control" id="inputEmail3" placeholder="Email" type="email"> 
					</div> </div> 
					<div class="form-group"> 
					<label for="inputPassword3" class="col-sm-4 control-label">Password</label>
					<div class="col-sm-8"> 
					<input class="form-control" id="inputPassword3" placeholder="Password" type="password"> 
					</div> </div> 
					<div class="form-group"> 
					<label for="inputPassword3" class="col-sm-4 control-label">Confirm Password</label>
					<div class="col-sm-8"> 
					<input class="form-control" id="inputPassword3" placeholder="Confirm Password" type="password"> 
					</div> </div> 
					<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10"> 
					<div class="checkbox1"> 
					<label> <input type="checkbox"> Remember me </label> 
					</div> </div> </div>
					</div>
					<div class="modal-footer">
				 <button type="Submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div>
			</div>
				</div></div>
				
				
				
				
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel1">Registration</h4>  
					</div>
					<div class="modal-body">
					<form class="form-horizontal"> 
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">First Name</label> 
					<div class="col-sm-10"> <input class="form-control" id="inputEmail3" placeholder="First Name" type="email"> 
					</div> </div> 
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Last Name</label> 
					<div class="col-sm-10"> <input class="form-control" id="inputEmail3" placeholder="Last Name" type="text"> 
					</div> </div> 
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">E-mail</label> 
					<div class="col-sm-10"> <input class="form-control" id="inputEmail3" placeholder="Email" type="email"> 
					</div> </div> 
					<div class="form-group"> 
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10"> 
					<input class="form-control" id="inputPassword3" placeholder="Password" type="password"> 
					</div> </div> 
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Age</label> 
					<div class="col-sm-10"> <input class="form-control" id="inputEmail3" placeholder="Age" type="email"> 
					</div> </div>
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Gender</label> 
					<div class="col-sm-10"> 
					  <label>
						<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
						Male
					  </label>
					  <label>
						<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
						Female
					  </label>		
					</div> </div> 
					
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Address</label> 
					<div class="col-sm-10"> <textarea class="form-control" rows="3" placeholder="Address"></textarea>
					
					</div> </div>
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label"></label> 
					<div class="col-sm-3"> 
					<!--<input class="form-control" id="inputEmail3" placeholder="City" type="email">-->
					<div class="dropdown1">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				  Country
					<span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="#">India</a></li>
					<li><a href="#">Canada</a></li>
    
    
					  </ul>
					</div>
						</div>

					<div class="col-sm-3"> 
					<!--<input class="form-control" id="inputEmail3" placeholder="City" type="email">-->
				<div class="dropdown1">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				  State
					<span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="#">Punjab</a></li>
					<li><a href="#">Haryana</a></li>
					<li><a href="#"></a></li>
					
					</ul>
					</div></div>
								  
					<div class="col-sm-4"> 
					<div class="dropdown1">
					  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					  City
						<span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a href="#">Mohali</a></li>
						<li><a href="#">Chandigarh</a></li>
					   
					  </ul>
					</div>
					</div>


					</div>
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Pin Code</label> 
					<div class="col-sm-10"> <input class="form-control" id="inputEmail3" placeholder="Pin Code" type="text"> 
					</div> </div>
					
					<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label> 
					<div class="col-sm-10"> <input class="form-control" id="inputEmail3" placeholder="Contact Number" type="email"> 
					</div> </div>
					</div>
					<div class="modal-footer">
					<button type="Submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div>
				</div>
				</div></div>
				
				




