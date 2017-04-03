@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile <input type="submit" class="pull-right btn btn-sm btn-danger" value=" Schedule"></div>
				<div class="panel-body">
					<img src="images/profile_pic/{{$user->is_doctor->profile_pic}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">  <!-- DSC_0022.jpg -->

					<h4>{{ $user->is_doctor->first_name}} {{ $user->is_doctor->last_name}}'s Profile</h4>
					<div clo-md-12>
					<label col-md-4>Email : </label><h4>{{ $user->email}} </h4>
					</div>
					<div clo-md-12>
					<label col-md-4>Status : </label><h4>{{ $user->is_doctor->status}} </h4>
					</div>
					<div clo-md-12>
					<label col-md-4>Specialities : </label>
							@foreach($treat as $key)
							{{ $key }}
							@endforeach
					</div>
					<form enctype="multipart/form-data" action="/profile" method="post" >
						<label>Update profile picture</label>
						<input type="file" name="profile_image">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" class="pull-right btn btn-sm btn-primary">

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection