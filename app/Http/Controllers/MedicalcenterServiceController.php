<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use App\Doctor;
use App\User;
use Validator;
use Redirect;
use Auth;
use DB;

class MedicalcenterServiceController extends Controller
{

    public function add_services(){
        return view('medicalcenter.services.add-services');
    }
//    public function add_doctor(){
//        $doctors=User::with('is_Doctor')->get();
////
////        echo "<pre>";
////       // dd($doctors);
////     print_r($doctors);
//
//
//
//        return view('medicalcenter.services.doctor',compact('doctors'))
//            ->with('i', ($request->input('page', 1) - 1) * 5);
//
//    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {




        $doctors=Doctor::Where('medic_id','=',Auth::user()->is_MedicalCenter->id)->get();
//        $doctors=Doctor::Where('medic_id','=',Auth::user()->is_MedicalCenter->id)->with('User')->get();
       $users=User::with('is_Doctor')->get();
//
//        echo "<pre>";
//

        return view('medicalcenter.services.doctor',compact('doctors','users'))
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




}
