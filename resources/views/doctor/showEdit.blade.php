@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ route('Doctor.show.edit') }}">
						{{ csrf_field() }}
						<p>dgflIB Jrbgjb QRJV</p>
						<div class="col-md-6">
							
							<input id="firstname" type="text" class="form-control" name="first_name" value="{{ Auth::user()->is_Doctor->first_name }}" required autofocus>
							
						</div>
						<div class="col-md-6">
							
							{{--{{Form::file('profile_pic', ['class' => 'form-control','id'=>'profilepic')}}--}}
							@if ($errors->has('profile_pic'))
							<span class="help-block">
								<strong>{{ $errors->first('profile_pic') }}</strong>
							</span>
							@endif
							
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection