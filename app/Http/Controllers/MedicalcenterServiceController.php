<?php

namespace App\Http\Controllers;

use App\Doctor_Speciality;
use App\Schedule;
use App\speciality;
use App\Userprofile;
use App\medicalcenter_doctor;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use App\User;
use App\Service;
use App\Medicalcenter_service;
use Validator;
use Redirect;
use Auth;
use DB;
use Hash;

class MedicalcenterServiceController extends Controller
{

    public function index(Request $request)

    {
        $specilaty=speciality::where('user_id','=',Auth::user()->id)->get();
        $test= medicalcenter_doctor::where('medicalcenter_id','=',Auth::user()->id)->get();

      foreach ($test as $key=>$val){

          $test1= Userprofile::where('user_id','=',$val->doctor_id)->get();

          $doctors[]=$test1;
      }

        return view('medicalcenter.services.doctor',compact('doctors','users','specilaty'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }



    public function create()

    {

        return view('ItemCRUD.create');

    }
    public function add_doctor()

    {

        return view('medicalcenter.services.add-doctor');

    }



    public function store(Request $request)

    {
        //generate a password for the new users
        $pw = User::generatePassword();

        $user = new User;
        $user->role_id=$request['role'];
        $user->email=$request['email'];
        $user->status=1;
        $user->password=$pw;
        $user->save();

        $doctors = new Userprofile;
        $doctors->user_id=$user->id;
        $doctors->first_name=$request['first_name'];
        $doctors->last_name=$request['last_name'];

            $doctors->save();
        $doctorsmedical = new medicalcenter_doctor;
        $doctorsmedical->doctor_id=$user->id;
        $doctorsmedical->medicalcenter_id=Auth::user()->id;
        $doctorsmedical->save();


        User::sendWelcomeEmail($user);
    return redirect()->route('add-doctor.index')->with('success','Item updated successfully');

    }


    public function show($id)

    {

        $item = Userprofile::find($id);
        $schedule= Schedule::where('user_id','=',$id)->get();
        $test= Doctor_Speciality::where('user_id','=',$id)->get();

        foreach ($test as $key=>$val){

            $test1= speciality::where('id','=',$val->speciality_id)->get();

            $doctorsspeciality[]=$test1;
        }
        return view('medicalcenter.services.show-doctor',compact('item','doctorsspeciality','schedule'));

    }


    public function edit_specilaty_edit(Request $request,$id){

        $medical_speciality=speciality::Where('id','=',$id)->first();
        $medical_speciality->name=$request['new_specility_name'];
        $medical_speciality->price=$request['new_specility_price'];
        $medical_speciality->save();

        return redirect()->route('specility.show.form');



    }
    public function edit_specilaty_show($id){

        $specilaty=speciality::find($id)->first();

        return view('medicalcenter.services.edit-specilaty',compact('specilaty','id'));


    }
    public function delete_specilaty($id){


    speciality::where('id', $id)->delete();
        return redirect()->route('specility.show.form');



    }


    public function edit($id)

    {

        $item = Userprofile::find($id);

        return view('ItemCRUD.edit',compact('item'));

    }

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

        ]);


        Userprofile::find($id)->update($request->all());

        return redirect()->route('add-doctor.index')

            ->with('success','Item updated successfully');

    }


    public function destroy($id)

    {

        User::where('id', $id)->delete();
        Userprofile::where('user_id', $id)->delete();
        Doctor_Speciality::where('user_id', $id)->delete();
        Schedule::where('user_id', $id)->delete();
        medicalcenter_doctor::where('doctor_id', $id)->delete();
        if(medicalcenter_doctor::where('doctor_id', $id)->get()->count()==0){

            return redirect()->route('doctor.add.doctor')->with('success','Item updated successfully');
        }
        else{
            return redirect()->route('add-doctor.index')->with('success','Item updated successfully');
        }





    }
    public function add_services(){
        $services=Service::get();
        return view('medicalcenter.services.add-services',compact('services'));
    }

    public function assign_service(Request $request){
        $service_id=Auth::user()->is_MedicalCenter;
        foreach($request->service as $key)
        {

            $service = new Medicalcenter_service;
            $service->service_id=$key;
            $service->medicalcenter_id=$service_id->id;
            $service->save();
        }
        $medicaldetail = Medicalcenter::find($service_id->id);
        return view('medicalcenter.services.show-services',compact('medicaldetail'));

    }
    public function add_specilaty(){
        $specilaty=speciality::orderBy('id', 'desc')->where('user_id','=',Auth::user()->id)->get();
        return view('medicalcenter.services.add-specilaty',compact('specilaty'));
    }
public function insert_specilaty(Request $request){



    $this->validate($request, [
        'specility_name' => 'required',
        'specility_price' => 'required',
    ]);
    $specilaty1 = new speciality;
    $specilaty1->user_id=Auth::user()->id;
    $specilaty1->name=$request['specility_name'];
    $specilaty1->price=$request['specility_price'];
    $specilaty1->save();

    return redirect()->route('specility.show.form');


}
    public function assign_specilaty(Request $request)
    {

        foreach ($request->specilaty as $key) {
            $doc_id = $request['doc_id'];

            $specilaty = new  Doctor_Speciality;
            $specilaty->speciality_id = $key;
            $specilaty->user_id = $doc_id;

            $specilaty->save();
        }
        return redirect()->route('add-doctor.index');
    }
public function show_setting_page(){
        return view('medicalcenter.settings');
}
    public function pwdchange(Request $request)
    {

        $rules = array(
            'current-password' => 'required',
            'password' => 'required|between:6,16|confirmed',
            'password_confirmation' => 'required'
        );
        // VALIDATING THE INPUT
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {

            return redirect()->route('medical.center.settings')->withErrors($validator);

        } else {

            if (Auth::check()) {
                $request_data = $request->All();
                $old_pwd = $request_data['current-password'];
                $new_pwd = $request_data['password'];
                $confirm_pwd = $request_data['password_confirmation'];
                $current_password = Auth::User()->password;

                if (Hash::check($old_pwd, $current_password)) {

                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);

                    if ($new_pwd == $confirm_pwd) {

                        $new_pwd = Hash::make($request_data['password']);
                        $obj_user->password = $new_pwd;
                        $obj_user->save();
                        $notification = array(
                            'message' => 'Password changed successfully',
                            'alert-type' => 'success'
                        );
                        \Session::flash('notification',$notification);
                        return redirect()->route('medical.center.settings');

                    } else {
                        $notification = array(
                            'message' => 'Your New Password and confirm password are not match',
                            'alert-type' => 'warning'
                        );
                        \Session::flash('notification',$notification);
                        return redirect()->route('medical.center.settings');
                    }

                } else {
                    $notification = array(
                        'message' => 'Your old password does not match.',
                        'alert-type' => 'error'
                    );
                    \Session::flash('notification',$notification);
                    return redirect()->route('medical.center.settings');
                }
            }
        }
    }



}
