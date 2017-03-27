<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Doctor;
class DoctorController extends Controller
{

public function index(){
    return view('doctor.drregistration');
}
public function insert(Request $request ){

    // echo ($request['first_name']);
    

$user = new User;
	$user->email=$request['email'];
	$user->password=bcrypt($request['password']);
	$user->role_id=$request['role'];
	$user->save();
$doctor = new Doctor;
	$doctor->first_name=$request['first_name'];
	$doctor->last_name=$request['last_name'];
	$doctor->medic_id=1;
	$doctor->user_id=$user->id;
	$doctor->status=$request['status'];
	$doctor->profile_pic='_DSC0188.jpg';
	$doctor->save();







// $user = User::create([

// 'email' => $request['email'],
// 'password'=>bcrypt($request['password']),
// 'role_id' => 2,
// ]);
// $doctor = Doctor::create([
// 'fname' => $request['first_name'],
// 'lname' => $request['last_name'],
// 'medic_id'=> 1,
// 'speciality_id' =>$request['speciality'],
// 'status'=>'available',
// 'user_id'=>1,
// ]);
return redirect('/dr_login');
}

 public function Showlogin()
 {
 	return  view('doctor.dr_login');

 }

 public function login(Request $request){
 	 
 	 $email = $request['email'];
 	 $password = $request ['password'];
	 Auth::attempt(['email'=> $request['email'],'password'=> $request ['password']]);


 	 if(Auth::check()){
 	 	
 	 	//die('hhhhh');
 	 	$details = Doctor::where('user_id','=',Auth::User()->id )->first();
 	 	//print_r('user_id');
 	 	 //die('kkkkk');
 	 // 	print_r(Auth::User()->id);	
 		// print_r($details);
 	 	
 	 	 	return view('doctor.showInfo');  //,compact('details')
 	 }

 	 else{

 	 	die('Please check your email or password . Refresh the Page.');
 	 };
 	 

 }
 public function ShowEdit()
 {
 	return  view('doctor.showEdit');

 }
 public function show_doctor_profile(){
 	// echo "hello";
 	return view('doctor.show_profile');

 }
 public function edit(Request $Request){
 	// echo "<pre>";
 	//  print_r($Request);
 	 return view('doctor.home');
 }




 	
// echo "hello";
// }
// public function show_doctor_dashboard(Request $request){
	
// return view('doctor.showinfo');



}