<?php

namespace App\Http\Controllers;

use App\Doctor_Speciality;
use App\speciality;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use App\Doctor;
use App\User;
use App\Service;
use App\Medicalcenter_service;
Use App\Medicalcenter;
use Validator;
use Redirect;
use Auth;
use DB;
use Hash;

class MedicalcenterServiceController extends Controller
{


//
    public function index(Request $request)

    {

        $doctors=Doctor::Where('medic_id','=',Auth::user()->is_MedicalCenter->id)->get();
//        $doctors=Doctor::Where('medic_id','=',Auth::user()->is_MedicalCenter->id)->with('User')->get();
       $users=User::with('is_Doctor')->get();
        $specilaty=speciality::get();
//
//        echo "<pre>";
//

        return view('medicalcenter.services.doctor',compact('doctors','users','specilaty'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
//

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('ItemCRUD.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
//        echo "<pre>";
//    print_r($request['role']);
//        die('hello');
////
//        $this->validate($request, [
//
//            'role_id' => 'required',
//            'first_name' => 'required',
//            'email' => 'required',
//            'password'=>'required|min:8',
//        ]);
//

        //generate a password for the new users
        $pw = User::generatePassword();

        $user = new User;
        $user->role_id=$request['role'];
        $user->email=$request['email'];
        $user->password=$pw;
//        $user->password=bcrypt($request['password']);
        $user->save();

        $doctors = new Doctor;
        $doctors->user_id=$user->id;
        $doctors->medic_id= Auth::user()->is_MedicalCenter->id;
        $doctors->first_name=$request['first_name'];
        $doctors->last_name=$request['last_name'];
        $doctors->status=1;
            $doctors->save();
        User::sendWelcomeEmail($user);
    return redirect()->route('add-doctor.index')->with('success','Item updated successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $item = Item::find($id);

        return view('ItemCRUD.show',compact('item'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $item = Item::find($id);

        return view('ItemCRUD.edit',compact('item'));

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

        ]);


        Item::find($id)->update($request->all());

        return redirect()->route('itemCRUD.index')

            ->with('success','Item updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::where('id', $id)->delete();
      Doctor::where('user_id', $id)->delete();
        return redirect()->route('add-doctor.index')->with('success','Item updated successfully');



    }
    public function add_services(){
        $services=Service::get();
        //print_r($services);
        // dd($services);
        return view('medicalcenter.services.add-services',compact('services'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function assign_service(Request $request){
        $service_id=Auth::user()->is_MedicalCenter;
       // echo $service_id;

        //$name=$request['service'];
        foreach($request->service as $key)
        {

          //  echo $key;
            $service = new Medicalcenter_service;
            $service->service_id=$key;
            $service->medicalcenter_id=$service_id->id;
            $service->save();

//
        }
        $medicaldetail = Medicalcenter::find($service_id->id);
        return view('medicalcenter.services.show-services',compact('medicaldetail'));

    }
    public function add_specilaty(){
        $specilaty=speciality::get();
        //print_r($services);
        // dd($services);
        return view('medicalcenter.services.doctor',compact('specilaty'));
    }

    public function assign_specilaty(Request $request)
    {

        foreach ($request->specilaty as $key) {
            $doc_id = $request['doc_id'];
            //  echo $key;
            $specilaty = new  Doctor_Speciality;
            $specilaty->speciality_id = $key;
            $specilaty->doctors_id = $doc_id;

            $specilaty->save();

//            return redirect()->view('medicalcenter.services.add-doctor',compact('specilaty'));


           return redirect()->route('add-doctor.index');
        }




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

                        return redirect()->route('medical.center.settings')
                            ->with('success', 'Password changed successfully');

                    } else {

                        return redirect()->route('medical.center.settings')
                            ->withErrors('Your New Password and confirm password are not match');
                    }

                } else {
                    return redirect()->route('medical.center.settings')
                        ->withErrors('Your old password does not match');
                }
            }
        }
    }



}
