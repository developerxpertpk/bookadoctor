
@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile</div>
					<div class="panel-body">
						 <h4> You Are Logged In!!</h4>

					{!!Form::open(array('file' => true, 'class' => 'form-horizontal' , 'method' => 'post','route' => 'Doctor.show.profile' )) !!}

					{{ csrf_field()}}

					{{ Form::text('first_name', Auth::user()->is_Doctor->first_name)}}

					{{Form::text('last_name', Auth::user()->is_Doctor->last_name)}}

					{{Form::text('status', Auth::user()->is_Doctor->status)}}

				

					{{ Form::submit('Save') }}

					{!!Form::close()!!}

					
				

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection