
// jssor slider js start

jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
 // //    //if (response.status == 0) {
 //      $("span.status_append0").append("<label class='primary'>Booking Pending</label>");
 // //  //  }
 // //   // if (response.status == 1) {
 //       $("span.status_append1").append("<label class='success'> Booking Complete </label>");
 // //   // }
 // // //   if (response.status == 2) {
 //      $("span.status_append2").append("<label class='warning'> Booking Canceled </label>");
 // //   // }
 // //   // if (response.status == 3) {
 //        $(".status_append3").append("<label class='danger'> Booking Rescheduled </label>");
 // //   // }

            /*responsive code end*/
    $(".spelization").select2({
        placeholder: "Select Spelizations",
        maximumSelectionLength: 3
    });
        });

// jssor slider js end


//image preview j query

jQuery(document).ready(function() {
// Function for Preview Image.
    jQuery(function() {
        $(":file").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
        $('#message').css("display", "none");
        $('#preview').css("display", "block");
        $('#previewimg').attr('src', e.target.result);
    };
// Function for Deleting Preview Image.
    $("#deleteimg").click(function() {
        $('#preview').css("display", "none");
        $('#file').val("");
    });
// Function for Displaying Details of Uploaded Image.
    $("#submit").click(function() {
        $('#preview').css("display", "none");
        $('#message').css("display", "block");
    });

    //function for creating sub domaib

// add the animation to the popover
    $('a[rel=popover]').popover().click(function(e) {
        e.preventDefault();
        var open = $(this).attr('data-easein');
        if (open == 'shake') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'pulse') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'tada') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'flash') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'bounce') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'swing') {
            $(this).next().velocity('callout.' + open);
        } else {
            $(this).next().velocity('transition.' + open);
        }

    });

// add the animation to the modal
    $(".modal").each(function(index) {
        $(this).on('show.bs.modal', function(e) {
            var open = $(this).attr('data-easein');
            if (open == 'shake') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'pulse') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'tada') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'flash') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'bounce') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'swing') {
                $('.modal-dialog').velocity('callout.' + open);
            } else {
                $('.modal-dialog').velocity('transition.' + open);
            }

        });
    });
});

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
        alwaysShowClose: true
    });
});


                                    jQuery(document).ready(function(){
                                        

                                    $('.radio-group input:radio[name="selector"]').change(function(){

                                    if($(this).val() == 'speciality'){
                                    $('#medical_center_specility_price').attr('disabled', true).val(null);
                                    $('#medical_center_specility_price').removeAttr('required');

                                    }
                                    if($(this).val() == 'service'){
                                        
                                    $('#medical_center_specility_price').attr('disabled', false).val();
                                    $('#medical_center_specility_price').attr('required','required')
                                    }
                                    });
                                    });
                                    // ]]>