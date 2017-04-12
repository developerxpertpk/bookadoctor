@extends('layouts.doctorLayout')
@section('content')

	  <table class="table table-bordered" id="doctor">
  <thead>
      <tr>
          <th>Bookings Id</th>
          <th>Status</th>
          <th>Problem</th>
          
     </tr>
  </thead>
  @foreach($booking as $key)
    @if($key->payment_status == 1)

 	<tr>
 		<td>
	 		<a href="{{ route('user.profile', $key->id) }}">{!! $key->id !!}

	 	</td>

	 	<td>
	 		@if($key->status == 0)

	 		  {{ 'Pending '}}
	 		 @endif 

	 	   @if($key->status == 1)

	 	      {{ 'Complete' }}
	 	     @endif

	 	    @if($key->status == 2)

	 	       {{ 'Cancel' }}
	 	      
	 	       @endif

	 	     @if($key->status == 3)

	 	        {{ 'Reschedule' }}
	 	     @endif
	 	</td>
	 	<td>
	 		{{$key->reason}}
	 	</td>
	 	 </tr>
	 	  @endif
 	 @endforeach
  <tbody>
  </tbody>
  </table>

@endsection
