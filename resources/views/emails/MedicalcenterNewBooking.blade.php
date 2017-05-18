Respected Sir/Mam,

New Booking has been made.
<p> <h3>Doctor's Name: {{$doctor_name}}</h3></p>
 <p> <h3>Patient's Name: {{$user_name}}</h3></p>
 <p><h3>Appointment Date:</h3> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timings)->format('Y-m-d')}}</p> 
 <p><h3>Appointment Timings:</h3>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timings)->format('H:i')}}</p> 
s
Thank you.