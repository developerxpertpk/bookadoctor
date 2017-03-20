<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }
    public function add()
    {
      $adminnew = Admin::orderBy('id', 'desc')->get();
      return view('admin.add-admin',compact('adminnew'));
        // return view('add-admin');
    }


    public function insert(Request $request)
  {
      $this->validate($request, [
          'name' => 'required',
          'username' => 'required',
          'email' => 'required',
          'password' => 'required',

      ]);


         $adminnew = new Admin;
         $adminnew->name = $request['name'];
         $adminnew->username = $request['username'];
         $adminnew->email = $request['email'];
         $adminnew->password = bcrypt($request['password']);



                       $adminnew->save() ;
      return redirect()->route('admin.add')
                     ->with('success','New Admin Regester successfully');


  }



        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $admins = Admin::find($id);
            return view('show-admin',compact('admins'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $admins = Admin::find($id);
            return view('edit-admin',compact('admins'));
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
              'sku_code' => 'required',
              'product_name' => 'required',
              'price' => 'required',
              'categorie' => 'required',
              'product_img' => 'required',
              'product_description' => 'required',
              'weight' => 'required',
            ]);

            Admin::find($id)->update($request->all());
            return redirect()->route('admin.add')
                            ->with('success','Admin updated successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Admin::find($id)->delete();
            return redirect()->route('admin.add')
                            ->with('success','Admin deleted successfully');
        }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */






}
