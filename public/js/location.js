 
    // var geocoder =new google.maps.Geocoder();
    // var mymap = new GMaps({
    //   el: '#mymap',
    //   lat: 21.170240,
    //   lng: 72.831061,
    //   zoom:4,
    // });// Gmaps end

    // $.each( locations, function( index, value ){
    //     var geocoder = new google.maps.Geocoder();
    //     var address = value.address+','+value.city+','+value.state+','+value.country;
    //     geocoder.geocode({ 'address': address }, function (results, status) {
    //     if (status == google.maps.GeocoderStatus.OK) {
    //         var latitude = results[0].geometry.location.lat();
    //         var longitude = results[0].geometry.location.lng();
    //     mymap.addMarker({
    //       lat: latitude,
    //       lng: longitude,
    //       title: value.city,
    //       infoWindow: {
    //             content: '<p><b><img src="{{asset('images/medic.png' )}}">'+value.address+'</b></p><p>'+value.city+','+value.state+','+value.country+'</p>'+'<br><button onclick="route(\'' + latitude + ',' + longitude + '\')">Get Route</button>',
    //                     },
    //       mouseover: function(e){
    //             this.infoWindow.open(this.map, this);

    //             this.infoWindow.close(this.map, this,3000);
    //         },
    //      /* mouseout: function(e){
    //             this.infoWindow.close(this.map, this);
    //         },*/
    //       click: function(e) {
    //         this.infoWindow.open(this.map, this);
    //       },
    //     });//add marker ends ends
    //     }});
//       $( "#birds" ).autocomplete({
//         source: "{{URL::route('autocomplete')}}",
//         minLength: 1,
//         select: function( event, ui ) {
//             document.getElementById("services").value ="";
//             var geocoder = new google.maps.Geocoder();
//             var address = ui.item.value;//value=City Name
//             geocoder.geocode({ 'address': address }, function (results, status) {
//         if (status == google.maps.GeocoderStatus.OK) {
//             var latitude = results[0].geometry.location.lat();
//             var longitude = results[0].geometry.location.lng();
//             //alert(latitude);
//             var mymap = new GMaps({
//             el: '#mymap',
//             lat: latitude,
//             lng: longitude,
//             zoom:13,
//     });
//             $.each( locations, function( index, value ){
//         var geocoder = new google.maps.Geocoder();
//         var address = value.address+','+value.city+','+value.state+','+value.country;
//         geocoder.geocode({ 'address': address }, function (results, status) {
//         if (status == google.maps.GeocoderStatus.OK) {
//             var latitude = results[0].geometry.location.lat();
//             var longitude = results[0].geometry.location.lng();
//         mymap.addMarker({
//           lat: latitude,
//           lng: longitude,
//           title: value.city,
//           click: function(e) {
//             alert('This is '+value.address+','+value.city+','+value.state+' from India.');
//           },
//           infoWindow: {
//                 content: '<p><b><img src="{{asset('images/medic.png' )}}">'+value.address+'</b></p><p>'+value.city+','+value.state+','+value.country+'</p>'
//                         },
//           mouseover: function(e){
//                 this.infoWindow.open(this.map, this);
//             },
//             mouseout: function(e){
//                 this.infoWindow.close(this.map, this);
//             }
//         });
//     }});
//         });

//         }});
//             //console.log(ui.item.value);
//         //$('#birds').val(ui.item.value);
//       }
//     });//city ends
//        $( "#services" ).autocomplete({
//         source: "{{URL::route('services')}}",
//         minLength: 1,
//         select: function( event, ui ) {
//           $.ajaxSetup({
//           headers:
//           {
//               'X-CSRF-Token': $('input[name="_token"]').val()
//           }
//           });
//             $.ajax({                    
//             url: "{{route('specialfilter')}}",     
//             type: 'GET', // performing a POST request
//             data : {
//             data1 : ui.item.value, // will be accessible in $_POST['data1']
//                     },
//             // dataType: 'json',                   
//             success: function(data)         
//             {
//             var geocoder = new google.maps.Geocoder();
//             var address = document.getElementById('birds').value;
//             if(address != "")
//             {
//             geocoder.geocode({ 'address': address }, function (results, status) {
//         if (status == google.maps.GeocoderStatus.OK) {
//             var latitude = results[0].geometry.location.lat();
//             var longitude = results[0].geometry.location.lng();
//             //alert(latitude);
//             var mymap = new GMaps({
//             el: '#mymap',
//             lat: latitude,
//             lng: longitude,
//             zoom:13,
//     });
//                $.each( data, function( index, value ){
//                 //alert(value.address);
//                 $.each( value, function( index, value2 ){
//                 var geocoder = new google.maps.Geocoder();
//         var address = value2.address+','+value2.city+','+value2.state+','+value2.country;
//         geocoder.geocode({ 'address': address }, function (results, status) {
//         if (status == google.maps.GeocoderStatus.OK) {
//             var latitude = results[0].geometry.location.lat();
//             var longitude = results[0].geometry.location.lng();
//             console.log(longitude);
//         mymap.addMarker({
//           lat: latitude,
//           lng: longitude,
//           title: value.city,
//           click: function(e) {
//             //alert('This is '+value.address+','+value.city+','+value.state+' from India.');
//           },
//           infoWindow: {
//                 content: '<p><b><img src="{{asset('images/medic.png' )}}">'+value2.address+'</b></p><p>'+value2.city+','+value2.state+','+value2.country+'</p>'
//                         },
//                         mouseover: function(e){
//                 this.infoWindow.open(this.map, this);
//             },
//             mouseout: function(e){
//                 this.infoWindow.close(this.map, this);
//             }
//         });
//       }});//if statement and geocode
//                 });//end of inner each
//                 });//end of outer each
//              }});//if statement of th mymap initiation
//           }
//           else{
//             var geocoder =new google.maps.Geocoder();
//             var mymap = new GMaps({
//               el: '#mymap',
//               lat: 21.170240,
//               lng: 72.831061,
//               zoom:4,
//               });
//             $.each( data, function( index, value ){
//                 //alert(value.address);
//                 $.each( value, function( index, value2 ){
//                 var geocoder = new google.maps.Geocoder();
//         var address = value2.address+','+value2.city+','+value2.state+','+value2.country;
//         geocoder.geocode({ 'address': address }, function (results, status) {
//         if (status == google.maps.GeocoderStatus.OK) {
//             var latitude = results[0].geometry.location.lat();
//             var longitude = results[0].geometry.location.lng();
//             console.log(longitude);
//             mymap.addMarker({
//             lat: latitude,
//             lng: longitude,
//             title: value.city,
//             click: function(e) {
//             //alert('This is '+value.address+','+value.city+','+value.state+' from India.');
//             },
//             infoWindow: {
//                 content: '<p><b><img src="{{asset('images/medic.png' )}}">'+value2.address+'</b></p><p>'+value2.city+','+value2.state+','+value2.country+'</p>'
//                         },
//                         mouseover: function(e){
//                 this.infoWindow.open(this.map, this);
//             },
//             mouseout: function(e){
//                 this.infoWindow.close(this.map, this);
//             }
//         });
//       }});//if statement and geocode
//                 });//end of inner each
//                 });//end of outer each

//              } //else statement ends
//           }//ajax success function ends
//             });//ajax function ends
//         }//select function of services end
//     });// jquery services autocomplete end
//     });
  // function currentloc()
  //   {
  //       $( "#spineer" ).addClass("fa-spin", 250);
  //       $( "#spineer" ).removeClass("fa-spin", 1000);
  //       GMaps.geolocate({
  //       success: function(position) {
  //       var mymap = new GMaps({
  //       el: '#mymap',
  //       lat:position.coords.latitude,
  //       lng:position.coords.longitude,
  //       //infoWindow:{content:'You are Here'},
  //       });
  //       mymap.addMarker({
  //           lat: position.coords.latitude,
  //           lng: position.coords.longitude,
  //           title: 'U R HERE',
  //           click: function(e) {
  //           //alert('This is '+value.address+','+value.city+','+value.state+' from India.');
  //           },
  //           infoWindow: {
  //               content: '<p><b><img src="{{asset('images/medic.png' )}}"></p>'
  //                       }
  //                     })
  //       mymap.drawCircle({
  //       lat: position.coords.latitude,
  //       lng: position.coords.longitude,
  //       radius: 2000 ,
  //       strokeColor: '#5588bb',
  //       fillColor: '#5588bb',
  //       editable: true,
  //       zIndex: -1,
  //       radius_changed: function() {
  //         nearBy(this.getRadius());
  //       }
  //     });
  //       mymap.setCenter(position.coords.latitude, position.coords.longitude);
  //         },
  //       error: function(error) {
  //       alert('Geolocation failed: '+error.message);
  //         },
  //       not_supported: function() {
  //       alert("Your browser does not support geolocation");
  //         },
  //       always: function() {
  //       //alert("Done!");
  //         }
  //       });//geolocation
  //   }
            function route(lat)
        {
          var res = lat.split(",");
        //  alert(res[0]);
          var latlon;
        GMaps.geolocate({
        success: function(position) {
        mymap.travelRoute({
  destination: [res[0], res[1]],
  origin: [position.coords.latitude,position.coords.longitude],
  travelMode: 'driving',
  step: function(e) {
    $('#instructions').append('<li>'+e.instructions+'</li>');
    $('#instructions li:eq(' + e.step_number + ')').delay(450 * e.step_number).fadeIn(200, function() {
      mymap.drawPolyline({
        path: e.path,
        strokeColor: 'blue',
        strokeOpacity: 0.6,
        strokeWeight: 6
      });//draw Poly Line ends
    });//end instruction
  }//step ends
});//travel route ends
        }});//end of geolocate and success function

        }//end of route function