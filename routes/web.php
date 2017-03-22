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
// 	{
// 		$User = new \App\User;
// 		return view('welcome')->with('users',User::all()->with('roles'));
// 	});



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

    Route::get('/', function () {
    return view('homenew');
});
    Route::post('/', 'HomenewController@index')->name('home1.home1');
// Route::get('/','AdminController@index')->name('admin.dashboard');



    Route::get('/home', 'HomeController@index');

    Route::prefix('admin')->group(function(){
            Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
            Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
            Route::get('/','AdminController@index')->name('admin.dashboard');
            // Route::post('/', 'AdminController@index')->name('home1.home1');
            Route::get('/add-admin', 'AdminController@add')->name('admin.add');
            Route::post('/add-admin', 'AdminController@insert')->name('admin.add.submit');
            Route::delete('/add-admin/{id}', 'AdminController@destroy')->name('admin.destroy');
            Route::get('/add-admin/{id}', 'AdminController@show')->name('admin.show');
            Route::get('/add-admin/{id}/edit', 'AdminController@edit')->name('admin.edit');
            Route::get('/medical','AdminController@medicalindex')->name('medical.list');
            Route::get('/medical/{id}','AdminController@medicalshow')->name('medical.show');
            Route::get('/medical/{id}/edit','AdminController@medicaledit')->name('medical.edit');
            // Route::get('/medical','AdminController@medicaledit')->name('medical.edit');
            // Route::get('/medical','AdminController@medicaldestroy')->name('medical.destroy');
    });


//     medical center routes

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

Route::get('/medical-dashboard', 'LoginController@showMedicalDashboard')->name('medical.center.dashboard')->middleware('auth');
//Route::get('/add-doctor', 'AddController@add')->name('doctor.add');




//patients Routes

    Route::get('/patient', 'Auth\MedicalCenterRegisterController@showPatientRegistrationForm')->name('patient.regester');
    Route::post('/patient', 'Auth\MedicalCenterRegisterController@register')->name('patient.regester.submit');
    Route::get('/parient-dashboard', 'LoginController@showPatientDashboard')->name('patient.dashboard')->middleware('auth');
    Route::get('/doctor-dashboard', 'LoginController@showDoctorDashboard')->name('doctor.dashboard')->middleware('auth');
    Route::get('/profile',array('as'=>'profile','before'=>'auth','uses'=>'ProfileController@getProfile'));
    Route::get('/editProfile',array('as'=>'editProfile','before'=>'auth','uses'=>'ProfileController@editProfile'));
    Route::post('/updateProfile',array('as'=>'updateProfile','before'=>'auth','uses'=>'ProfileController@updateProfile'));

//    Route::any ( '/search', function () {
//    $q = Input::get ( 'search' );
//    $user = Admin::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
//    if (count ( $user ) > 0)
//        return view ( 'homenew' )->withDetails ( $user )->withQuery ( $q );
//    else
//        return view ( 'homenew' )->withMessage ( 'No Details found. Try to search again !' );
//} );

    Route::get('/drregistration','DoctorController@index');
    Route::post('/drregistration','DoctorController@insert')->name('Doctor.register.submit');
    Route::get('/dr_login','DoctorController@Showlogin');
    
    Route::post('/dr_login','LoginController@login')->name('Doctor.login.submit');
    Route::get('/dr_login','DoctorController@show_doctor_dashboard')->name('doctor.dashboard');

    //Route::get('/dr_login','DoctorController@showInfo');
    Route::post('/dr_login','DoctorController@showInfo')->name('doctor.register.submit');

