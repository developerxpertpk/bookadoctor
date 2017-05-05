@extends('layouts.doctorLayout')
@section('content')
	<div class="row">
		<div class="col-md-12 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Previous History
					
					{!! csrf_field() !!}
					<div class="panel-body">
					<p> Hello </p>
					<div class="ui-widget">
						<label for="birds">Names </label>
						<input id="birds">
					</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Styel -->
<!-- <style>
.documents{
	width:50px;
	height:50px;
}
</style> -->
<!-- Script -->
<script>
$( function() {
	
	$(" #birds").autocomplete({
	source:'/bookings_H',   
	minLength: 1,
	
	});
	});
</script>
	<!--   End Script -->
	@endsection