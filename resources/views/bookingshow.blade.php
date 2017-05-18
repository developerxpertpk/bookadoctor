<!DOCTYPE html>
<html>

<head>
    <!-- Bootstrap core CSS -->


<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/code.css')}}">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="{{asset('js/app.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/medicalfilter.js')}}"></script>
<style type="text/css" media="screen">
        ul.ui-autocomplete {
    z-index: 1100;
}
        #instructions{
          display:none;
        }
                #mymap {
            border:2px solid black;
            width: 100%;
            height: 500px;
            overflow: hidden;
        }
        #datepicker{
	float:left;

}
#datepicker img{
	width:40px;

}
.body-pannel{
    border: .1px solid grey;
    border-radius: 20px;
    margin-top: 10px;
}
.img{
    height: 100px;
    width: 100px;
    margin-top: 10px;
}
#butt
{
    margin-top: 69px;
    margin-left: -30px;

}
.btn{
    border-radius: 20px!important;
    -webkit-border-radius: 20px!important;
    -moz-border-radius: 20px!important;
    width: 100px!important;
}

	
</style>
</head>
<body>
    <div class="ui-widget">
  <label for="birds">City: </label>
  <input id="city">
</div>
<div class="ui-widget">
  <label for="birds">MedicalCenter: </label>
  <input id="medicalcenter">
</div>
<div class="row" id="micro">
</div>
</body>
</html>