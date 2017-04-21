@extends('layouts.doctorLayout')
@section('content')
<!-- Style -->
<style>
.date{
	margin-top:10px;
	margin-bottom: 30px;
	
}
</style>
<div class="date">
	<label for="from">From</label>
	<input type="text" id="from" name="from">
	<label for="to">to</label>
	<input type="text" id="to" name="to">
	<br/>
</div>

<script type="text/javascript">
$( function() {
$("#to").datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 2,
dateFormat: 'yy-mm-dd'
});
$("#from")
.datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 2,
dateFormat: 'yy-mm-dd'
}).bind("change",function(){
var minValue = $(this).val();
minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
minValue.setDate(minValue.getDate()+1);
$("#to").datepicker( "option", "minDate", minValue )
});
});
$('#to').on("change",function(){
var from,to;
from =$('#from').val();
if(from == "")
{
alert('Select From First');
}
else
{
to=$(this).val();
dateSearch(from,to);
}
});
function dateSearch(from,to) {
var table, tr, td, th1,td1,i;
table = document.getElementById("doctor");
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[3];
if (td) {
if (td.innerHTML>=from && td.innerHTML<=to) {
//  alert(td.innerHTML);
tr[i].style.display = "";
} else {
//alert('hello sory');
tr[i].style.display = "none";
}
}
}
}
</script>
<table class="table table-bordered" id="doctor">
	
	<tr>
		<th>Bookings Id</th>
		<th>Status</th>
		<th>Problem</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	
	@foreach($booking as $key)
	@if($key->payment_status == 1)
	<tr>
		<td>{{$key->id}}</td>
		<td>@if($key->status == 0)
			{{'Pending'}}
			@endif
			@if($key->status == 1)
			{{'Complete'}}
			@endif
			@if($key->status == 2)
			{{'Cancel'}}
			@endif
			@if($key->status == 3)
			{{'Reschedule'}}
			@endif</td>
			<td>{{$key->reason}}</td>
			<td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $key->Appointment_timings)->format('Y-m-d') }}</td>
			
		
		<td>
			<a href="{{ route('user.profile', $key->id) }}" class="edit_pro_btn">Show Details</a>
		</td>
	</tr>
	@endif
	@endforeach
	
</table>
@endsection