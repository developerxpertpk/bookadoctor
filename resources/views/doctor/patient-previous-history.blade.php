@extends('layouts.doctorLayout')
@section('content')


<div class="panel panel-default">
	<div class="panel-heading">Previous History
		
		{!! csrf_field() !!}
		
		<div class="ui-widget">
			<label for="birds"> Patient Name </label>
			<input id="birds">
			
		</div>
	</div>
	<div class="panel-heading">
		<div id="kk">
			<div class="col-md-12">
				<div class="profile-col-1">
					
				</div>
			</div>
		</div>
		
		<div id="kl" >
			
			<div class="profile-col-2">
				<table class="table" id="table1">
					<p><b>Bookings</b></p>
					<tr>
						<th>Sr\No.</th>
						<th>Appointment Date</th>
						<th>Appointment Time</th>
						<th>Reason</th>
						
						
					</tr>
					
				</table>
			</div>
			<div class="pagination">  </div>
		</div>

		<div class="loading-div"><img src="{{asset('img/ajax-loader.gif')}}" ></div>
		<div id="results"><!-- content will be loaded here --></div>
		
		<div id="kz" >{{$booking}}
			<div class="profile-col-3">
				<table class="table table-striped" id="table2">
					<p><b>Documents</b></p>
				<tr></tr>
			</table>
			
			
			
			
		</div>
	</div>
	<div class="pagination">
		
	</div>
</div>



</div>
</div>
<style type="text/css">
	.contents{
		margin: 20px;
		padding: 20px;
		list-style: none;
		background: #F9F9F9;
		border: 1px solid #ddd;
		border-radius: 5px;
	}
	.contents li{
	    margin-bottom: 10px;
	}
	.loading-div{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.56);
		z-index: 999;
		display:none;
	}
	.loading-div img {
		margin-top: 20%;
		margin-left: 50%;
	}

	/* Pagination style */
	.pagination{margin:0;padding:0;}
	.pagination li{
		display: inline;
		padding: 6px 10px 6px 10px;
		border: 1px solid #ddd;
		margin-right: -1px;
		font: 15px/20px Arial, Helvetica, sans-serif;
		background: #FFFFFF;
		box-shadow: inset 1px 1px 5px #F4F4F4;
	}
	.pagination li a{
	    text-decoration:none;
	    color: rgb(89, 141, 235);
	}
	.pagination li.first {
	    border-radius: 5px 0px 0px 5px;
	}
	.pagination li.last {
	    border-radius: 0px 5px 5px 0px;
	}
	.pagination li:hover{
		background: #CFF;
	}
	.pagination li.active{
		background: #F0F0F0;
		color: #333;
	}
</style>	


<!-- Styel -->
<!-- <style>
.documents{
	width:50px;
	height:50px;
}
</style> -->
<!-- Script -->
<!-- $('#pagination a').on('click', function(e){ -->
<!-- $('.demo1').bootpag({
total: 5
}).on("page", function(event, num){
$(".content").html("Page " + num); // or some ajax content loading...

// ... after content load -> change total to 10
$(this).bootpag({total: 10, maxVisible: 10});

}); -->
<script>
$( function() {
	$("#kk").css("display", "none");
	$("#kl").css("display", "none");
	$("#kz").css("display", "none");
	
	$("#birds").autocomplete({
		source:'/bookings_H',
		minLength: 1,
		select: function(event,ui)
		{
			
			$.ajaxSetup({
				headers:
				{
				'X-CSRF-Token': $('input[name="_token"]').val()
				}
			});
			$.ajax({
				url: "/patientprofile",
				type: 'POST',
				datatype:'text', // performing a POST request
				data : {
					data1 : ui.item.id, // will be accessible in $_POST['data1']
				},
				success:function(data){
					//alert('Success');
					// console.log(data);
					/*$("#kk").css("display", "block");
					$("#kl").css("display", "block");
					$("#kz").css("display", "block");*/

					$("#results" ).load( "{{url('test')}}");










					// $("#kk").append("Name  : "+"<b>"+data[0].name+"</b>"+"<br/>","Issue  : "+"<b>"+data[0].reason+ "</b>"+"<br/>","Address.  : "+"<b>"+data[0].is_users.is_profile.address+"</b>"+"<br/>");

					// document.cookie = "username="+data;
					// console.log(document.cookie);
					// $("#table1").append('jshdvcbdksjbcs');
					<?php
						// $test=$_COOKIE('username');
						// setcookie("username", "", time() - 3600);
					?>
					/*$.each(data,function(index,value){
						console.log(value);
						
						var time=value.Appointment_timings;
						var test = time.split(" ");
						
						
						$("#table1").append("<tr><td>"+1+"</td><td>"+test[0]+"</td><td>"+test[1]+"</td><td>"+value.reason+"</td></tr>"); 
					});*/


					// $('.pagination').append()
					

					// var img=data[0].is_users.is_profile.images;
					// console.log(data);
					// console.log(data[0].booking.data);
					// var srno=0;
					// console.log(data[0].booking.data.__proto__.slice.caller);

					// $.each(data[0].booking.data,function(index,value){
					// 	//console.log(value.reason);
					// 	//console.log(value.Appointment_timings);
					// 	$('#table1').append("");
					// 	var time=value.Appointment_timings;
					// 	var date = time.split(" ");
					// 	srno++;
					// 	$('#table1').append("<tr><td>"+srno+"</td><td>"+date[0]+"</td><td>"+date[1]+"</td><td>"+value.reason+"</td></tr>");
					// });

					// $(".pagination").append(""+data[0].booking.render());
					// console.log(data[0].documents);
					// $("#pic1").attr("src","http:://" )
				

					// var pic=window.location.protocol+'//'+window.location.host+'/images/profile_pic/'+img;
					// console.log(pic);
					// $(".profile-col-1").append("<img src="+pic+">");
					// var doc =data[0].documents;
					// //console.log(data[0].documents[0].documents);
					// // var test="<img src=\'{{asset('images/documents/"+value.documents+"')}}\'>"

					// // console.log(documents);
					// $.each(doc,function(index,value){
					// 	console.log(value.documents);
					// 	var documents=window.location.protocol+'//'+window.location.host+'/images/documents/'+value.documents;
					// 	$(".profile-col-3").append("<a href="+documents+" data-lightbox="+documents+"><img src="+documents+" alt="+value.documents+">");

					// 	//  date("Y-m-d",strtotime($request->input('from_date')));
					// 	// console.log("sdcsdc'"+value+"jas")
					// //$(".profile-col-3").append("<img src={{asset('/images/documents/'+"value.documents+")}}>");
					// // $(".profile-col-3").append(test);
					// 			});
					// jQuery(function($){
					// 	$('.table1').footable({
					// 		"columns": $.get('columns.json'),
					// 		"rows": $.get('rows.json')
					// 	});
					// });
						//console.log(value);
					// });

					//("#pic1").attr("src",pic);

					//document.getElementsById("pic1").setAttribute("src", "pic");
						//$("#kl").append(bookings);
					// $("#kl").show(pic);
							
						//console.log(data);
				},
				error:function()
				{
					alert('Not Found');
				}
			});
		}
	});
});

	
</script>
<!-- <script>
lightbox.option({
'resizeDuration': 500,
'wrapAround': true,
'disableScrolling': true,

})
</script> -->
<!--   End Script -->
<!-- Style -->
<style>
#kk img{
	width:200px;
	height:200px;
}
#kz img{
	width:100px;
	height:100px;
	padding-right:10px;
}
/*.lb-outerContainer{
	height: 307px !important;
}*/
.lightbox {
height: 100%;
overflow: hidden;
}
.lb-prev{
	display: block !important;
}
.lb-next{
	display: block !important;
}
</style>
<!-- End Style -->
@endsection