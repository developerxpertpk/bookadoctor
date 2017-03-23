<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\User;

class MedicalcenterServiceController extends Controller
{

    public function add_services(){
        return view('medicalcenter.services.add-services');
    }
    public function add_doctor(){
        return view('medicalcenter.services.doctor');
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {


      $doctors = Doctor::orderBy('id','DESC')->paginate(5);



        return view('medicalcenter.services.doctor',compact('doctors'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        print_r($doctors);
//        return view('ItemCRUD.index',compact('items'))
//
//            ->with('i', ($request->input('page', 1) - 1) * 5);

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

        $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

        ]);

        $user =new User;
        $doctors =new User;

        $user = User::create([

            'email' => $request['email'],
            'password'=>bcrypt($request['password']),
            'role_id' => 2,
        ]);



        $doctor = Doctor::create([
            'fname' => $request['first_name'],
            'lname' => $request['last_name'],
            'medic_id'=> 1,
            'speciality_id' =>$request['speciality'],
            'status'=>'available',
            'user_id'=>1,
        ]);

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

        Item::find($id)->delete();

        return redirect()->route('itemCRUD.index')

            ->with('success','Item deleted successfully');

    }




}
