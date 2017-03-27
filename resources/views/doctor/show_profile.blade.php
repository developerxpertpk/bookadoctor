@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ route('Doctor.show.profile') }}">
						{{ csrf_field() }}

						<p>komal</p>
						</form>
						</div>
						</div>
						</div>
						</div>
					</div>
					@endsection

