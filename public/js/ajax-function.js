/**
 * Created by user on 4/14/2017.
 */


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
    $('select#patient').on('change', function() {
        var optionSelected = $(this).find("option:selected");
        patientSelected  = optionSelected.val();
       // console.log(patientSelected);

        $.ajax({
            type: 'POST',
            url : '/medical/patient-booking-history',
            data: { 'sem' : patientSelected },

            success: function(response) {
                var len = response.length;
                console.log(len);

               var i=0;


                var html = "";
                var status = '';
                $.each(response, function(key,val){
                    //console.log(key);
                  // console.log(val); //depending on your data, you might call val.url or whatever you may have
                  //   console.log(val.cancel_reason);



                        i++;
                        if(val.status == '0'){
                            status = '<label class="primary">Booking Pending</label>';
                        }
                        if(val.status == '1'){
                            status = '<label class="success"> Booking Complete </label>';
                        }
                        if(val.status == '2'){
                            status = '<label class="warning"> Booking Canceled </label>';
                        }
                        if(val.status == '3'){
                            status = '<label class="danger"> Booking Rescheduled </label>';
                        }


                    // <td>"+ val.doctor_name +"</td>
                    html = html + "<tr><td>" + i + "</td><td>" + val.id + "</td><td>"+ val.patient_name +"</td><td>"+ val.doctor_name +"</td><td>" + val.reason + "</td><td>" + val.cancel_reason + "</td><td>" + val.reschedule_reason + "</td><td>" + val.Appointment_timings + "<td><span class='status_append"+val.status+"'>"+status+"</span></td></tr>";


                });
                                $(".showdata table tbody").html(html);

            },
            error: function(response) {
                console.log(response);

            }

        });

    });
});



