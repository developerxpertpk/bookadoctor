@extends('layouts.homeLayout')

@section('content')
 @include('slider.slider1')
 {{-- offer section start --}}
<section class="offer-wrapper text-center">
  <a class="offer-btn" href="#"><span class="offer">Offer</span></a><a class="offer-tagline" href="#">Full Body Checkup + FREE doctor consultation starting at Rs. 599 only! Limited offer. Book Now!</a>
</section>
 {{-- offer section end --}}

  {{-- Feature section start --}}
<section id="feature">
  <div class="feature">
    <div class="container">
    <div class="col-md-12">
      <h2 class="text-center">Why use <span style="color:red;">Dr</span><span style="color:#000;"> Booking</span></h2>
    </div>
    <div class="col-md-3">
      <div class="thumb">
        <div class="img text-center">
<img src="{{ asset('images/feature1.png') }}">
        </div>
        <h3 class="headdting text-center">90,000+ verified doctors </h3>
        <p class="text text-center">
          All doctors on Lybrate go
          through a stringent
          verification process
        </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="thumb">
        <div class="img text-center">
      <img src="{{ asset('images/feature2.png') }}">
        </div>
        <h3 class="headdting text-center">24*7 access to healthcare</h3>
        <p class="text text-center">
          sequat. Duis aute irure dolor in
           reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur.

        </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="thumb">
        <div class="img text-center">
      <img src="{{ asset('images/feature3.png') }}">
        </div>
        <h3 class="headdting text-center">Save time & money</h3>
        <p class="text text-center">
          sequat. Duis aute irure dolor in
           reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur.
        </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="thumb">
        <div class="img text-center">
      <img src="{{ asset('images/feature4.png') }}">
        </div>
        <h3 class="headdting text-center">100% care guaranteed</h3>
        <p class="text text-center">
          sequat. Duis aute irure dolor in
           reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur.
        </p>
      </div>
    </div>
</div>
  </div>

</section>
 {{-- Feature section end --}}

  {{-- categories section start --}}
  <section id="top-categories">
      <div class="container">
        <div class="col-md-12">
          <h2 class="color-black text-center">Top Categories</h2>
        </div>
    <div class="col-md-12 a-topCategories">
      <a class="d-unit a-dietician" href="#">
					<div class="d-title">Dietitian</div>
				</a>
        <a class="d-unit a-gynaecologist" href="#">
<div class="d-title">Gynaecologist</div>
</a>
<a class="d-unit a-psychologist" href="#">
<div class="d-title">Psychologist</div>
</a>
<a class="d-unit a-dermatologist" href="#">
<div class="d-title">Dermatologist</div>
</a>
<a class="d-unit a-sexologist" href="#">
<div class="d-title">Sexologist</div>
</a>
<a class="d-unit a-ayurveda" href="#">
<div class="d-title">Ayurveda</div>
</a>
<a class="d-unit a-homeopath" href="#">
<div class="d-title">Homeopath</div>
</a>

    </div>
    <div class="a-viewMoreCategories text-center">
   			<button class="btn btn-lg btn-link c_red">
   				View More <img src="{{ asset('images/viewmorearrow.png') }}">
   			</button>
      </div>

  </div>
  </section>
  {{-- Popular Cities section start --}}

  <section id="popularcities">
      <div class="container">
        <div class="col-md-12">
          <h2 class="color-black text-center">Popular Cities</h2>
        </div>
  <div class="col-xs-12 a-topCategories">
				<a class="d-unit a-cities-delhi" href="#">
					<div class="d-title">Delhi</div>
				</a>
				<a class="d-unit a-cities-bangalore" href="#">
					<div class="d-title">Bangalore</div>
				</a>
				<a class="d-unit a-cities-mumbai" href="#">
					<div class="d-title">Mumbai</div>
				</a>
				<a class="d-unit a-cities-kolkata" href="#">
					<div class="d-title">Kolkata</div>
				</a>
				<a class="d-unit a-cities-chennai" href="#">
					<div class="d-title">Chennai</div>
				</a>
			</div>
      <div class="a-viewMoreCategories text-center">
          <button class="btn btn-lg btn-link c_red">
            View More <img src="{{ asset('images/viewmorearrow.png') }}">
          </button>
        </div>
    </div>
        </section>
        {{-- Popular Cities section end --}}

        {{-- health tips section start --}}



    <section id="ru-doctor">
      <div class="container">
        <div class="col-md-12">
          <h2 class="color-black text-center">Are you Medical Center?</h2>
        </div>

					<div class="col-sm-offset-2 col-sm-8">
						<div class="text-center">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
						</div>
					</div>
          <div class="a-viewMoreCategories text-center">

              <button class="btn btn-lg btn-danger" style="font-size:18px;" type="button" onclick="location.href = 'https://doctor.lybrate.com';">Know More</button>
            </div>

        </section>

@endsection
