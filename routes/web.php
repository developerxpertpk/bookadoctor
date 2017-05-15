<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
// });
//
Auth::routes();
//
//Route::get('/home', 'HomeController@index');
// Route::get('/', function()
//  {
//      $User = new \App\User;
//      return view('welcome')->with('users',User::all()->with('roles'));
//  });
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
//   });
Route::get('/', 'HomenewController@index')->name('home1.home1');
// Route::get('/','AdminController@index')->name('admin.dashboard');
Route::get('/home', 'HomeController@index');
Route::prefix('admin')->group(function(){
Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/','AdminController@index')->name('admin.dashboard');
Route::get('password/reset','AdminController@showPasswordForm')->name('reset.password');
Route::post('password/reset','AdminController@reset2')->name('admin.reset');
Route::get('/medical','AdminController@medicalindex')->name('medical.list');
Route::get('/medical/list','AdminController@medicallist')->name('admin.datatable.list');
Route::get('/medical/{id}','AdminController@medicalshow')->name('medical.show');
Route::get('/medical/{id}/edit','AdminController@medicaledit')->name('medical.edit');
Route::get('/medical/{id}/status','AdminController@medicalstatus')->name('medical.status');
Route::post('/medical/{id}/edit','AdminController@medicalStore')->name('update.medical.submit');
Route::post('/medical', 'AdminController@medicalStore')->name('admin.add.submit');
Route::delete('/medical/{id}', 'AdminController@medicaldestroy')->name('medical.destroy');
Route::get('/add-faq', 'AdminController@showcmsfaq')->name('add.faq.show');
Route::post('/add-faq', 'PageController@create')->name('add.faq.submit');
Route::get('/add-faq/createnewpage','AdminController@createnewpage')->name('cms.create');
Route::get('/add-faq/{id}','AdminController@cmsstatus')->name('cms.status');
Route::get('/add-faq/{id}/delete','AdminController@cmsdelete')->name('cms.destroy');
Route::get('/add-faq/{id}/edit','AdminController@editcms')->name('cms.edit');
Route::post('/add-faq/{id}/edit','AdminController@cmsupdate')->name('cms.edit.update');
Route::get('/plan','SubscriptionController@index')->name('subscription.list');
Route::get('/plan/create','SubscriptionController@create')->name('plan.create');
Route::post('/plan/create','SubscriptionController@store')->name('plan.create.submit');
Route::get('/plan/{id}/edit','SubscriptionController@edit')->name('plan.edit.show');
Route::post('/plan/{id}/edit','SubscriptionController@update1')->name('plan.edit.submit');
Route::get('/plan/{id}/delete','SubscriptionController@delete')->name('plan.destroy');
Route::get('/doctor/{id}','AdminController@showdoctor')->name('Doctor.profile');
Route::get('/payments','DoctorBookingController@viewpage')->name('payments.list');
Route::get('/payments/data','DoctorBookingController@viewlist')->name('payment.data');
// Route::get('/medical','AdminController@medicaledit')->name('medical.edit');
// Route::get('/medical','AdminController@medicaldestroy')->name('medical.destroy');
});
//medical center routes
Route::prefix('medical')->group(function(){
Route::get('/medical-center', 'Auth\MedicalCenterRegisterController@showMedicalRegistrationForm')->name('medical.center.regester');
Route::post('/medical-center', 'Auth\MedicalCenterRegisterController@register')->name('medical.center.regester.submit');
Route::get('/medical-center-subscription', 'MedicalCenterController@index')->name('medical.center.subscription.form');
Route::post('/payment-sussess', 'MedicalCenterController@payment_success')->name('medical.center.payment');
Route::get('/medical-center-info', 'MedicalCenterController@show_info_form')->name('medical.center.info.form');
Route::post('/medical-center-info', 'MedicalCenterController@insert')->name('medical.center.info.submit');
Route::get('/medical-center-contact-info', 'MedicalCenterController@show_contact_form')->name('medical.center.contact.info.form');
Route::post('/medical-center-contact-info', 'MedicalCenterController@contact_insert')->name('medical.center.contact.info.submit');
Route::get('/medical-center-profile','MedicalCenterController@getProfile')->name('medical.center.profile');
Route::get('/medical-center-image-upload','MedicalCenterController@imageUpload')->name('medical.center.image.upload.form');
Route::post('/medical-center-image-upload','MedicalcenterimageController@multiple_upload')->name('medical.center.image.upload.submit');
Route::get('/medical-center-image-gallery','MedicalcenterimageController@gallery_images')->name('medical.center.image.gallery');
Route::delete('/medical-center-image-delete/{id}','MedicalcenterimageController@destroy1')->name('image.destroy');
Route::get('/medical-center-add-service','MedicalcenterServiceController@add_services')->name('service.show.form');
Route::post('/medical-center-add-service','MedicalcenterServiceController@assign_service')->name('service.form.submit');
Route::get('/medical-center-setting','MedicalcenterServiceController@show_setting_page')->name('medical.center.settings');
Route::post('/medical-center-change-password','MedicalcenterServiceController@pwdchange')->name('medical.center.postpwd');
Route::post('/doctor-working-hours-and-days','ScheduleController@doctor_schedule')->name('doctor.schedule.create');
Route::post('/medical-working-hours-and-days','ScheduleController@medical_schedule')->name('medical.schedule.create');
//
Route::get('/medical-center-add-specilaty','MedicalcenterServiceController@add_specilaty')->name('specility.show.form');
Route::post('/medical-center-add-specilaty','MedicalcenterServiceController@insert_specilaty')->name('specilaty.form.submit');
Route::post('/medical-center-assign-specilaty','MedicalcenterServiceController@assign_specilaty')->name('assign.specilaty.form.submit');
Route::get('/specility/{id}/edit','MedicalcenterServiceController@edit_specilaty_show')->name('specilaty.show.edit.form');
Route::post('/specility/{id}/edit','MedicalcenterServiceController@edit_specilaty_edit')->name('specilaty.edit.form.submit');
Route::delete('/specility/{id}','MedicalcenterServiceController@delete_specilaty')->name('specilaty.delete');
Route::get('/add-new-doctor', 'MedicalcenterServiceController@add_doctor')->name('doctor.add.doctor');
Route::resource('/add-doctor','MedicalcenterServiceController');
Route::get('/medical-dashboard', 'LoginController@showMedicalDashboard')->name('medical.center.dashboard')->middleware('auth');
Route::get('/medicalcenter-plan-subscription-detail', 'MedicalCenterController@show_medical_subscription_detail')->name('subscription.plans.details');
//Route::get('/add-doctor', 'AddController@add')->name('doctor.add');
//    routes for booking under medical center
Route::get('medical-center-doctor-booking','MedicalcenterBookingController@index')->name('medical.center.booking.show');
Route::post('medical-center-doctor-booking-filter','MedicalcenterBookingController@filter_booking')->name('medical.center.booking.filter');
Route::get('medical-center-doctor-booking-show/{id}','MedicalcenterBookingController@show_detail')->name('show.booking.detail');
Route::post('medical-center-doctor-booking-cancel/{id}','MedicalcenterBookingController@cancel_booking')->name('medical.cancel.booking');
Route::post('medical-center-doctor-booking-reschedule/{id}','MedicalcenterBookingController@reschedule_booking')->name('medical.reschedule.booking');
Route::get('medical-center-doctor-booking-complete/{id}','MedicalcenterBookingController@complete_booking')->name('complete.booking.detail');
Route::get('medical-center-doctor-booking-history','MedicalcenterBookingController@show_booking_history')->name('medical.center.patient.booking.history');
Route::post('/patient-booking-history','MedicalcenterBookingController@show_booking_history_show');
Route::get('patient-booking-documents/{id}','MedicalcenterBookingController@documents_upload_form')->name('patient.document.upload.form');
Route::post('patient-booking-documents','MedicalcenterBookingController@documents_upload_submit')->name('patient.document.upload.submit');
Route::get('medical-center-doctor-booking-payment-detail/{id}','MedicalcenterBookingController@show_payment_detail')->name('show.booking.payment');
Route::get('medical-center-doctor-booking-payment-history','MedicalcenterBookingController@show_payment_history')->name('patient.booking.payment.history');
Route::delete('booking-documents-delete/{id}-{del}','MedicalcenterBookingController@destroy1doc')->name('document.destroy');
Route::post('patient-booking-payment-update/{id}/edit','MedicalcenterBookingController@paitent_payment_update')->name('patient.booking.payment.update');

Route::get('medical-center-show-rescheduled-booking','MedicalcenterBookingController@show_rescheduled_booking')->name('medical.center.rescheduled.booking.show');
Route::get('medical-center-show-pending-booking','MedicalcenterBookingController@show_pending_booking')->name('medical.center.pending.booking.show');
Route::get('medical-center-show-canceled-booking','MedicalcenterBookingController@show_canceled_booking')->name('medical.center.canceled.booking.show');
Route::get('medical-center-show-completed-booking','MedicalcenterBookingController@show_completed_booking')->name('medical.center.completed.booking.show');
Route::get('assign-service-to-doctor-{id}','MedicalcenterServiceController@assign_service_to_doctor')->name('assign.doctor.service');

});
//patients Routes
Route::get('/patient', 'Auth\MedicalController@showPatientRegistrationForm')->name('patient.regester');
Route::post('/patient', 'Auth\MedicalCenterRegisterController@register')->name('patient.regester.submit');
Route::get('/patient-dashboard', 'LoginController@showPatientDashboard')->name('patient.dashboard')->middleware('auth');
Route::get('/doctor-dashboard', 'LoginController@showDoctorDashboard')->name('doctor.dashboard')->middleware('auth');
Route::get('/profile',array('as'=>'profile','before'=>'auth','uses'=>'ProfileController@getProfile'));
Route::get('/editProfile',array('as'=>'editProfile','before'=>'auth','uses'=>'ProfileController@editProfile'));
Route::post('/updateProfile',array('as'=>'updateProfile','before'=>'auth','uses'=>'ProfileController@updateProfile'));
//komal
Route::post('/userProfile','PatientController@insert')->name('patient.insert');
Route::get('/userprofile','PatientController@user_login')->name('patient.profile.login');
Route::get('/edit','PatientController@edit')->name('patient.edit');
Route::post('/imageupload','PatientController@update_profile')->name('patient.update');
Route::get('/changepassword','PatientController@change_password')->name('patient.password');
Route::post('/password','PatientController@password')->name('patient.password.change');
Route::get('/appointment','PatientController@appointment')->name('patient.appointment');
Route::get('/city','PatientController@city')->name('city');
Route::get('/state','PatientController@state')->name('state');
Route::get('/country','PatientController@country')->name('country');
Route::get('/medicalcenter','PatientController@medicalcenter')->name('title');
Route::get('/disease','PatientController@disease')->name('disease');

// Rout::get('/getprofile','PatientController@profile')->name('patient.profile');
//    Route::any ( '/search', function () {
//    $q = Input::get ( 'search' );
//    $user = Admin::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
//    if (count ( $user ) > 0)
//        return view ( 'homenew' )->withDetails ( $user )->withQuery ( $q );
//    else
//        return view ( 'homenew' )->withMessage ( 'No Details found. Try to search again !' );
//} );
//Doctors Module
Route::get('/drregistration','DoctorController@index')->name('doctor.register');
Route::post('/drregistration','DoctorController@insert')->name('Doctor.register.submit');
//Route::get('/drregistration','DoctorController@speciality');
Route::get('/dr_login','DoctorController@Showlogin');
Route::post('/dr_login','DoctorController@login')->name('Doctor.login.submit');
Route::get('/dr-login','DoctorController@loginnew')->name('doctor.profile');
Route::get('/change_password','DoctorController@password')->name('password.reset');
Route::post('/changepassword','DoctorController@resetpassword')->name('change.password');
Route::get('/profile','DoctorController@profile');
// /Route::post('/profile','DoctorController@profile')->name('Doctor.show.profile');
Route::post('/profile','DoctorController@update_profile')->name('Doctor.image');
//Route::post('/profile/s','ScheduleController@insert')->name('Doctor.schedule.create');
Route::get('/bookings','DoctorController@viewBookings')->name('Doctor.booking');
Route::get('/bookings/{id}','DoctorController@bookingsProfile')->name('user.profile');
Route::post('/bookings/{id}','DoctorController@cancelbooking')->name('cancel.booking');
Route::post('/bookings/{id}/reschedule','DoctorBookingController@reschedulebooking')->name('booking.reschedule');
Route::post('/bookings/{id}/complete','DoctorBookingController@completebooking')->name('booking.complete');
Route::get('/bookings/{id}/history','DoctorBookingController@history')->name('previous.history');
Route::get('/bookings_H','DoctorBookingController@bookinghistory')->name('booking.history');
Route::get('/dashboard','DoctorController@dashboard')->name('doctor.dashboard');
Route::get('/manageschedule','DoctorController@manageschedule')->name('manage.scedule');
Route::post('/manageschedule','DoctorController@insertschedule')->name('insert.schedule');
Route::post('/manageschedule/edit{id}','DoctorController@editschedule')->name('edit.schedule');
Route::get('/manageschedule/delete{id}','DoctorController@deleteschedule')->name('delete.schedule');
Route::post('/patientprofile','DoctorController@historyProfile')->name('history.profile');
Route::get('/profilepatient','PatientController@index')->name('profile.patient');
Route::get('/city','PatientController@city')->name('city');
Route::get('/state','PatientController@state')->name('state');
Route::get('/country','PatientController@country')->name('country');
Route::get('/medicalcenter','PatientController@medicalcenter')->name('title');
Route::get('/disease','PatientController@disease')->name('disease');
Route::get('/user-history','PatientController@userhistory')->name('user.appointment.history');
Route::post('/booking-cancel/{id}','PatientController@cancelbooking')->name('patient.cancel.booking');
Route::post('/booking-reschedule/{id}','PatientController@reschedulebooking')->name('patient.reschedule.booking');
Route::get('/showbooking{id}','PatientController@showbooking')->name('patient.show.booking');
Route::get('/add-patient-document{id}','PatientController@add_patient_document')->name('add.booking.doc');
Route::post('/add-patient-document','PatientController@add_patient_document_submit')->name('add.booking.doc.submit');
Route::delete('booking-documents-delete/{id}-{del}','PatientController@destroyDoc')->name('patient.document.destroy');
Route::get('/documents/{id}','DoctorController@AddDocuments')->name('doctor.documents.add');
Route::post('/adddocumnents','DoctorController@add_doctor_document_submit')->name('doctor.document.submit');


// Route::get('/{page}','HomenewController@show')->name('dynamic');
//booking
                    

                                      

                 
