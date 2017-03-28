@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('Doctor.show.list') }}">
						{{ csrf_field() }}
						<p>komal</p>

						@foreach($doctor as $key)

							 <p>This is user {{ $user->id }}</p>

						@endforeach

						 <!-- <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                           
                                <div class="col-md-8">
                                <label for="email" class="col-md-4 control-label">First Name</label>
                          		<input id="firstname" type="text" class=" col-md-4 form-control" name="first_name" value="{{ Auth::user()->is_Doctor->first_name }}" required autofocus>
                               </div>
                            </div> -->
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection