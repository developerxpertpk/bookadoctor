<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Doctor; 
use Image;
use App\speciality;
use App\Doctor_Speciality;
use App\Booking;
use App\Profile;


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
	
	//$doctor->profile_pic=$fileName;
    // return view('doctor.show_profile');

	$doctor->save();

	//Pivot table
	foreach($request->speciality as $key)
	{
	$speciality = new  Doctor_Speciality;
		$speciality->speciality_id=$key;
		$speciality->doctors_id=$doctor->id;
		$speciality->save();
	}

return view('doctor.dr_login');
}

 public function update(Request $request){

 		$user  = new User;
 		$doctor = new Doctor;
		$doctor->user_id=$user->id;
	    //print_r($doctor);
		//die('aaaaa');
		 return redirect ('doctor.show_profile');
	}

 	// if($file = $request->hasFile('profile_pic1')) {
  //        $file = $request->file('profile_pic1') ;
  //        $fileName = $file->getClientOriginalName() ;
  //        $extention = $file->getClientOriginalExtension();
  //        $destinationPath = public_path().'/images/profile_pic/' ;
  //        $file->move($destinationPath,$fileName);
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
 		 //print_r(Auth::User()->id);	
 		 // print_r($details);
 	 	
 	 	 //return view('doctor.showInfo');  //,compact('details')
 	 	return redirect('/profile');
 	 }

 	 else{

 	 	die('Please check your email or password . Refresh the Page.');
 	 };
 	 

 }
 // public function ShowEdit()
 // {
 // 	return  view('doctor.showEdit');

 // }
 // public function show_doctor_profile(){

 	
 // 	return view('doctor.show_profile');


 // }
 public function edit(Request $Request){
 	// echo "<pre>";
 	//  print_r($Request);
 	 return view('doctor.home');
 }
// Auth::user()->is_Doctor->profile_pic
 	
// echo "hello";
// }
// public function show_doctor_dashboard(Request $request){
	
// return view('doctor.showinfo');

public function profile(){

	
$user = Auth::User();

	
	 $userr = $user->is_doctor->doctor_speciality;
	 foreach ($userr as $key) {
	 	$doe= speciality::where('id','=',$key->speciality_id)->get();

	 	foreach($doe as $key2 )
	 	{
	 		$treat[]=$key2->name;
 }

	 }

// Bookings Function start
	 //$booking = Booking::where('doctor_id','=',$user->is_doctor->id)->fir();
	  $booking = Booking::all()->where('doctor_id','=',$user->is_doctor->id);
	  //$profile = Profile::all()->where('user_id','=',8);
	  foreach($booking as $key=>$value)
	  {
	  	//print_r($value->user_id);
	  	$userr=User::find($value->user_id);
	  	// $s[]=$userr->profile->age;
	  	// $k[]=$userr->profile->first_name;
	  	// $i[]=$userr->profile->last_name;
	  	$s=$userr->profile->age;
	  	 //$first_name[]=$userr->profile->first_name;
	  	 //$last_name[]=$userr->profile->last_name;
	  	 //$age[]=$userr->profile->age;
	  	
	  }
	 // array_combine($first_name, $last_name);
	 // $output = array_combine($first_name,$last_name);


	    //  echo "<pre>";
	    print_r($s);
	    //  print_r($k);
	    //  print_r($i);
	   die('bcmchjghjw');
	  // print_r($booking->user_id);die('hhhchghgcc');
	 //die($user->is_Doctor);

	 return view ('doctor.profile', compact('user','treat','booking','s','k') );
}
 public function update_profile(Request $request){
 	
 	if($request->hasFile('profile_image')){


 		$profile_image = $request->file('profile_image');
 		//echo $profile_image; die;
 		$filename = time() . '.' . $profile_image->getClientOriginalExtension();
 		Image::make($profile_image)->resize(300,300)->save(public_path('/images/profile_pic/' . $filename ));

 		$user  = Auth::user();
 		$user->is_doctor->profile_pic=$filename;
 		
 		$user->save();
 		Doctor::where('user_id',$user->id)->update(['profile_pic'=>$filename]);

 	}

 	 return $this->profile();
 }
    
    public function speciality(){
    	  $specialities = speciality::all();
    	  // print_r($specialities);
    	  // die('jhsdvhjVHVHQSVXHJQVCVHVHVC');

    	  return  view('doctor.drregistration',compact('specialities'));
    }
}

// Auth::check($request);
//     {
//       $details='App/Doctor',"where('user_id','=', 'Auth:user_id') compact('details')";

//      }