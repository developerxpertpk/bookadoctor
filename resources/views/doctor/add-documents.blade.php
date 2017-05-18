@extends('layouts.doctorLayout')
@section('content')
<div class="row">
	<div class="doctor-profile">
		<div class="panel panel-default">
			<div class="panel-heading"><span class="heading-pannel"> Add Documnets</span>
		</div>
		<!-- Script -->
		<script>
		$(".addbtn").click(function(){
		$.ajax({
		url:'add-catagory',
		data:{
		logo:new FormData($("#upload_form")[0]),
		},
		dataType:'json',
		async:false,
		type:'post',
		processData: false,
		contentType: false,
		success:function(response){
		console.log(response);
		},
		});
		});
		</script>
		<!-- End Script -->
		
		<div class="panel-body">
			<div class="text-content">
                            <div class="span7 offset1">
                                @if(Session::has('success'))
                                    <div class="alert-box success">
                                        <h2>{!! Session::get('success') !!}</h2>
                                    </div>
                                @endif
                                <div class="secure">Upload form</div>
                                {!! Form::open(array('route' => 'doctor.document.submit','method'=>'POST', 'files'=>true)) !!}
                                <div class="control-group">
                                    <div class="controls">
                                        {!! csrf_field() !!}
                                        {!!Form::hidden('booking_id', $booking->id)!!}
                                        {!! Form::file('docimages[]', array('multiple'=>true)) !!}
                                        <p class="errors">{!!$errors->first('images')!!}</p>
                                        @if(Session::has('error'))
                                            <p class="errors">{!! Session::get('error') !!}</p>
                                        @endif
                                    </div>
                                </div>
                                {!! Form::submit('Upload', array('class'=>'send-btn')) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
		</div>
		
	</div>
</div>
</div>
</div>
</div>
</div>
@endsection