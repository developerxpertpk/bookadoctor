 
 $( function() { 
        var c;
        var pic=window.location.protocol+'//'+window.location.host+'/images/profile_pic/';
                $.ajaxSetup({
          headers:
          {
              'X-CSRF-Token': $('input[name="_token"]').val()
          }
          });
    $( "#city" ).autocomplete({
      source: "/city",
      minLength: 1,
      select: function( event, ui ) {
        $("#city").val(ui.item.value);
        c= $("#city").val();
         $.ajax({
                url: "/citymedicfilter2",
                dataType: "json",
                data: { searchText: c},
                success: function( data ) {
                  $("#micro").html("");
                    $.each(data,function(index , value){
                    $("#micro").append('<div class="col-md-10 body-pannel col-md-offset-1"><div class="col-md-3"><div class="row"> <div class="col-md-12 col-lg-12 border img" align="center"> <img alt="User Pic" src="'+pic+value.pic+'" class="img-circle img-responsive"> </div> </div></div><div class="col-md-8"><p><h4>'+value.title+'</h4></p><p id="ss">'+$.each(value.speciality,function(index2,value2){value2})+'</p><p>'+value.address+'<br>'+value.city+value.state+value.country+', pin:'+value.pincode+'</p></div><div class="col-md-1"><div class="row" id="butt"><div class="col-md-12"><a href="/medicalprofiledisplay/'+value.id+'"><button type="btn btn-success" class="btn btn-primary"><i class="pulse fa fa-heartbeat "></i>Booking</button></a></div></div></div></div>');
                    });
                    pulse();
                }
            });    

      },
    });

    $( "#medicalcenter" ).autocomplete({
      source: function( request, response ) {
        //console.log(c);
         $.ajax({
                url: "/citymedicfilter",
                dataType: "json",
                method: "GET",
                data: { searchText: c},
                success: function( data ) {
                    response(data, function( item ) {
                        return {
                            label:item,
                            value:item,
                        }
                    });
                }
            });    
    },
      minLength: 1,
      select: function( event, ui ) {
        //alert(ui.item.value);
        $.ajax({
                url: "/namemedicfilter",
                dataType: "json",
                data: { searchText: ui.item.value,
                  searchcity:c              },
                success: function( data ) {
                    $("#micro").html("");
                    $.each(data,function(index , value){
                    $("#micro").append('<div class="col-md-10 body-pannel col-md-offset-1"><div class="col-md-3"><div class="row"> <div class="col-md-12 col-lg-12 border img" align="center"> <img alt="User Pic" src="'+pic+value.pic+'" class="img-circle img-responsive"> </div> </div></div><div class="col-md-8"><p><h4>'+value.title+'</h4></p><p id="ss">'+$.each(value.speciality,function(index2,value2){value2})+'</p><p>'+value.address+'<br>'+value.city+value.state+value.country+', pin:'+value.pincode+'</p></div><div class="col-md-1"><div class="row" id="butt"><div class="col-md-12"><a href="/medicalprofiledisplay/'+value.id+'"><button type="btn btn-success btn-block" class="btn btn-primary"><i class="fa fa-heartbeat "></i>Booking</button></a></div></div></div></div>');
                    });
                        pulse();
                }
            });    
      }
    }).on('focus', function() { $(this).keydown(); });
    function pulse() {
    setInterval(function(){ $('.fa-heartbeat').animate({
        fontSize:12, 
        opacity: 0.5
    }, 250);
        $('.fa-heartbeat').animate({
        fontSize:16, 
            opacity: 1
    }, 250);  }, 500);


};

pulse();
  } );