<!DOCTYPE html>
<html>
<head>

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
<script src="{{asset('js/app.js')}}"></script></head>
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
			<li><a href="../navbar-static-top/">For Doctors</a></li>
              <li class="active"><a href="./">Login<span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Register</a></li>
              
            </ul>
          </div>
		  </div>
      </nav>
</div>   
</header>
<!--Banner and search portion-->
<img class="imgs" src="img\doctorteam.png"> 
<section class="search text-center">         
<div class="container">
 <div class="col-xs-12 col-sm-5">
    <input type="text" class="form-control input-lg" placeholder="Enter City">
  </div>
  
  <div class="col-xs-12 col-sm-5 spl">
    <input type="text" class="form-control input-lg" placeholder="Specialists Doctors,Clinics">
  </div>

	
<div class="col-xs-12 col-sm-2 spl">	
<button type="button" class="btn btn-success btn-lg">Search</button>
</div>
			  </div> </div>
			  
			  
		 </section>
		 
		<!--healthcare portion-->
<section class="health_care text-center">
<div class="container">
<h2>Find the Nearest HealthCare</h2>

<div class="col-xs-12 col-sm-2">
<i class="fa fa-stethoscope"></i>
<h4>Doctors</h4>
</div>

<div class="col-xs-12 col-sm-2">
<i class="fa fa-h-square"></i>
<h4>Hospital</h4>
</div>

<div class="col-xs-12 col-sm-2">
<i class="fa fa-plus-square"></i>
<h4>Labs</h4>
</div>

<div class="col-xs-12 col-sm-2">
<i class="fa fa-scissors"></i>

<h4>Spa&Salons </h4>
</div>

<div class="col-xs-12 col-sm-2">
<i class="fa fa-user-md"></i>


<h4>Clinics</h4>
</div>

<div class="col-xs-12 col-sm-2">
<i class="fa fa-medkit"></i>

<h4>Fitness</h4>
</div>

</div>
</section>

<section class="request">
<div class="container">
<div class="big_button">
<button type="button" class="btn btn-success btn-lg ">Request an appointment</button>
</div>
</div>
</section>


<!---Best Doctor Portion-->
<section class="best-doctors">
<div class="container">
<h2>Best Doctors</h2>
<div class="col-lg-3">
          <img class="img-circle" src="img\dentist.png" alt="Generic placeholder image" height="170" width="170">
          <h3>Dr. Rajesh</h3>
		  <h4>Denatlist</h4>
        </div>
		
<div class="col-lg-3">
          <img class="img-circle" src="img\cardio.png" alt="Generic placeholder image" height="170" width="170">
          <h3>Dr.Harish</h3>
		   <h4>Cardiolist</h4>	  
        </div>

<div class="col-lg-3">
          <img class="img-circle" src="img\eye.png" alt="Generic placeholder image" height="170" width="170">
          <h3>Dr.Saeed</h3>
		  <h4>Ophthalmologist</h4>
        </div>		
		
<div class="col-lg-3">
          <img class="img-circle" src="img\phy.png" alt="Generic placeholder image" height="170" width="170">
          <h3>Dr.Shela</h3>
		  <h4>psychologist</h4>
        </div>		
</div>
</section>

<!--Feedback portion-->
<section class="feedback">
<div class="container">
<h3>Recent Feedback</h3>
 
<div class="col-xs-12 col-sm-2">
<img src="img\doct.png">
<h5>Dr. Deepak Sharma</h5>
</div>	

<div class="col-xs-12 col-sm-10">
<p>I am 40 yrs. Now I was loosing my hair on my temple area which I got back from prp treatment by Dr. Deepak. 
very satisfactory results of prp which I got at Dermasculpt clinic.Many thanks to team.- Bala
<button type="button" class="btn btn-success btn-lg bb">View More</button></p>
</div>  



</div>
</section>

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