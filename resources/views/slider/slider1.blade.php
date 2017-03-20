<section id="slider1">
  <div class="container">
<div class="slider-wrapper">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#finddoctor" aria-controls="finddoctor" role="tab" data-toggle="tab"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
 Find Doctor</a></li>
      <li role="presentation"><a href="#ConsultOnline" aria-controls="ConsultOnline" role="tab" data-toggle="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>
 Consult Online</a></li>
      <li role="presentation"><a href="#AskQuestion" aria-controls="AskQuestion" role="tab" data-toggle="tab"><i class="fa fa-envelope" aria-hidden="true"></i>
 Ask Question</a></li>
      <li role="presentation" class="new"><?php $mytime = Carbon\Carbon::now();
          $mytime->toDateTimeString();
        if ($mytime = $mytime) {
            echo '<div class="post-badge"><div class="badge-bg"></div><span class="badge-text font-pacifico">New</span></div>';
        }?><a href="#BookLabTest" aria-controls="BookLabTest" role="tab" data-toggle="tab">
     &nbsp;<i class="fa fa-flask" aria-hidden="true"></i>
 Book Lab Test</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="finddoctor">
  <div class="color-white tabs">
        <h3>Never wait in line, ever again.</h3>
        <h2>Get well. Online or at Clinic.</h2>

    {!!Form::open(array('url' => 'foo/bar', 'method' => 'PUT'))!!}
    <div class="col-md-10">
      <div class="col-md-4">
          {!!Form::text('city',null, array('placeholder' => 'City','class' => 'form-control'))!!}
      </div>
      <div class="col-md-4">
          {!!Form::text('location',null, array('placeholder' => 'Location','class' => 'form-control'))!!}
      </div>
      <div class="col-md-4">
          {!!Form::text('specility',null, array('placeholder' => 'Specility','class' => 'form-control'))!!}
      </div>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn leftl">Search</button>
    </div>


    {!!Form::close()!!}
    <div class="col-md-6 col-md-offset-right-6">
      <div class="col-md-4">
      <div class="thumb">
        <div class="img text-center">
      <img src="{{ asset('images/location.png') }}">
        </div>
        <h3 class="headdting text-center color-white">Doctors across
30 cities</h3>
      </div>
    </div>
    <div class="col-md-4">
    <div class="thumb">
      <div class="img text-center">
    <img src="{{ asset('images/verified.png') }}">
      </div>
      <h3 class="headdting text-center color-white">Verified patient
reviews</h3>
    </div>
  </div>
  <div class="col-md-4">
  <div class="thumb">
    <div class="img text-center">
  <img src="{{ asset('images/smiley.png') }}">
    </div>
    <h3 class="headdting text-center color-white">Appointments without
hassle</h3>
  </div>
</div>
    </div>

      </div>
    </div>
      <div role="tabpanel" class="tab-pane" id="ConsultOnline">...</div>
      <div role="tabpanel" class="tab-pane" id="AskQuestion">...</div>
      <div role="tabpanel" class="tab-pane" id="BookLabTest">...</div>
    </div>
</div>
  </div>
</section>
