/**
 * Created by user on 3/8/2017.
 */

/* Custom JavaScript For change profile or edit profile*/
//
// function changeProfilePicture() {
//     var selectedImage=  jQuery("#profilePicture")[0].files[0];
//     if (selectedImage){
//         var privewId=document.getElementById('profileImage');
//         privewId.src='';
//         var oReader =new FileReader();
//         oReader.onload=function (e) {
//             privewId.src=e.target.result;
//         }
//         oReader.readAsDataURL(selectedImage);
//         $("#uploadButton").removeClass('disabled');
//     }
//
// }
// // function for upload profile picture
// function uploadProfilePicture() {
//
//     //variables for get forn data from editform
//     var file2=document.getElementById("profilePicture");
//     var ext=file2.type;
//     var firstName =  jQuery('#firstName').val();
//     var lastName =  jQuery('#lastName').val();
//     var about =  jQuery('#aboutMe').val();
//
//     // create a cbject and append value with object
//     var formdata = new FormData();
//     formdata.append('pic',file2);
//     formdata.append('ext',ext);
//     formdata.append('firstName',firstName);
//     formdata.append('lastName',lastName);
//     formdata.append('about',about);
//
//     //process data with ajax for send data on route
//
//     var ajax = new XMLHttpRequest();
//     ajax.upload.addEventListener("progress",progresHandler,false);
//     ajax.addEventListener("load",completeHandler,false);
//     ajax.open("POST","http://drbooking/updateProfile");
//     ajax.send(formdata);
//
// }
// function completeHandler() {
//     var response = this.responseText;
//     jQuery("#mediaProgress").fadeOut();
//     jQuery("#title").html("Profile pic Successfilly uploaded");
//     jQuery("#profilePicture").hide();
//     jQuery("#uploadButton").hide();
// }
//
// function progresHandler() {
//     var percent = (event.loaded / event.total) * 100;
//     jQuery("#mediaProgress").fadeIn();
//     document.getElementById('progressBar').style.width = percent + '%';
// }
