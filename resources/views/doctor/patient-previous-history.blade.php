@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Previous History
				{!! Form::open(['route' => ['previous.history', $booking->id]]) !!}
					{!! csrf_field() !!}

					<p class="documents">{!! Form::label('Documents') !!}

										@foreach($k as $key)									

									<a href="{{asset('/images/documents/'.$key->documents) }}" data-lightbox=" {{asset('/images/documents/'.$key->documents) }}" class="embed">
									<img src="{{asset('/images/documents/'.$key->documents) }}" class="documents">
								</a>
										@endforeach
								</p>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Styel -->
<style>
.documents{
	width:50px;
	height:50px;
}

</style>


@endsection