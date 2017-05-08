@extends('layouts.doctorLayout')
@section('content')
	<div class="row">
		<div class="col-md-12 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Previous History
					<p> </p>
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
					<table class="table" id="tab1">
					<p><b>Bookings</b></p>
					<tr>
						<th>Id</th>
						<th>Appointment Date</th>
						<th>Appointment Time</th>
						<th>Reason</th>
							
						
					</tr>
					</table>
					</div>
					</div>

					<div id="kz" >
					
					<div class="profile-col-3">
					<table class="table table-striped" id="tab2">
					<p><b>Documents</b></p>
					<tr>
						
						
							
						
					</tr>
					</table>
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
	$("#kk").css("display", "none");
	$("#kl").css("display", "none");
	$("#kz").css("display", "none");

	$(" #birds").autocomplete({
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
            url: "{{route('history.profile')}}",     
            type: 'GET',
            datatype:'text', // performing a POST request
            data : {
            data1 : ui.item.id, // will be accessible in $_POST['data1']
                    },
            success:function(data)

            { 

               alert('Success');
            	$("#kk").css("display", "block");
            	$("#kl").css("display", "block");
				$("#kz").css("display", "block");
            	$("#kk").append("Name  : "+"<b>"+data[0].name+"</b>"+"<br/>","Issue  : "+"<b>"+data[0].reason+ "</b>"+"<br/>","Address.  : "+"<b>"+data[0].is_users.is_profile.address+"</b>"+"<br/>",);
            	var img=data[0].is_users.is_profile.images;
            	console.log(data);
            	//console.log(data[0].booking);
            	
            	$.each(data[0].booking,function(index,value){
            		console.log(value.reason);
            		$('#tab1').append("<tr><td>"+value.id+"</td><td>"+value.Appointment_timings+"</td><td>"+value.Appointment_timings+"</td><td>"+value.reason+"</td>")
            	});

            	console.log(data[0].documents);
            	// $("#pic1").attr("src","http:://" )}}");
               
               var pic=window.location.protocol+'//'+window.location.host+'/images/profile_pic/'+img;
              // console.log(pic);
               $(".profile-col-1").append("<img src="+pic+">");

             var doc =data[0].documents;
            //console.log(data[0].documents[0].documents);
            // var test="<img src=\'{{asset('images/documents/"+value.documents+"')}}\'>"

       
            // console.log(documents);
               $.each(doc,function(index,value){
               	console.log(value.documents);
               	 var documents=window.location.protocol+'//'+window.location.host+'/images/documents/'+value.documents;
               	 $(".profile-col-3").append("<a href="+documents+" data-lightbox="+documents+"><img src="+documents+" alt="+value.documents+">");

               	// console.log("sdcsdc'"+value+"jas")

              //$(".profile-col-3").append("<img src={{asset('/images/documents/'+"value.documents+")}}>");
              // $(".profile-col-3").append(test);

			});



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
<script>
   lightbox.option({
      'resizeDuration': 500,
      'wrapAround': true,
      'disableScrolling': true,
      
  })
      </script>
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

</style>
<!-- End Style -->

	@endsection