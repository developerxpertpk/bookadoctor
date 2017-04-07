<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Auth;



class ProfileController extends Controller
{


//        function for get profile
    public function getProfile(){
    return view('profile.view-profile');
    }

//        function for edit profile

    public function editProfile(){
        return view('profile.edit-profile');
    }

    public function updateProfile(Request $request){

        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'issue' => 'required',
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);

        //$profile= new Profile();
        $profile=Profile::Where('user_id','=',Auth::user()->id)->first();
        

        if($file = $request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture') ;
            $fileName = $file->getClientOriginalName() ;
            $extention = $file->getClientOriginalExtension();
            $destinationPath = public_path().'/images/profile_pic/' ;
            $file->move($destinationPath,$fileName);

        }

             $profile->first_name=$request['firstName'];
             $profile->last_name=$request['lastName'];
             $profile->issue=$request['issue'];
             $profile->profilepic=$fileName;
           //  $profile->Auth::User();
             $profile->save();
        return redirect()->route('profile')->with('success','Profile created successfully');

            //ssreturn $profile->profilepic;

    }
}
