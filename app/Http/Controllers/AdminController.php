<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Page;
use App\User;
use Datatables;
use App\Userprofile;
use App\Booking;
use App\medicalcenter_doctor;
use Auth;
use Validator;
use Hash;
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
    public function showPasswordForm()
      {
        return view('admin.reset');
      }
        public function medicalindex()
        {
            return view('admin.add-medical');
        }
        public function medicallist()
        {
            $users = DB::table('users')
            ->join('userprofiles', 'users.id', '=', 'userprofiles.user_id')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('userprofiles.id','userprofiles.user_id','userprofiles.title','userprofiles.description','userprofiles.medical_center_email','userprofiles.contact_no','userprofiles.address','users.status')
            ->where('users.role_id','=','4')
            ->get();
         
            return Datatables::of($users)->addColumn('action', function($user){return '<a href="/admin/medical/'.$user->id.'/status" class="btn btn-s btn-info"><i class="fa fa-television"></i>Status</a><a href="/admin/medical/'.$user->id.'" class="btn btn-s btn-primary"><i class="fa fa-television"></i> Show</a><a href="/admin/medical/'.$user->id.'/edit" class="btn btn-s btn-warning"><i class="fa fa-edit"></i> Edit</a><a href="#show-'.$user->id.'" class="btn btn-s btn-danger"><i class="fa fa-trash"></i> Delete</a>';})->make(true);
        }

        public function medicalshow($id)
        {
            $medicaldetail = Userprofile::where('user_id','=',$id)->first();
            $booking=Booking::where('medic_id','=',$id)->get();
            $doctors=medicalcenter_doctor::where('medicalcenter_id','=',$id)->paginate(5);
            // foreach ($doctors as $key) 
            // {
            // $user=User::find($id);
            // print_r($medicaldetail->Servicepiv);
            // }
            
            // die();
            // foreach ($booking as $key =>$value) {
            //     echo($value->is_doctors->is_profile);
            // }
            // die();
            return view('admin.detail-medical', compact('medicaldetail','booking','doctors'));
        }

        public function medicaledit($id)
        {
            $medicaldetail = Userprofile::where('id', '=', $id)->first();
            return view('admin.edit-medical',compact('medicaldetail'));
        }
        public function medicalStore(Request $request,$id)
        {
            Userprofile::find($id)->update($request->all());
            return redirect()->route('medical.list')
                            ->with('success','Page record updated');
        }

        public function medicaldestroy($id)
        {
             Userprofile::find($id)->delete();
            return redirect()->route('medical.list')
                            ->with('success','Medical Center Deleted');
        }
        public function medicalstatus($id)
        {
          $user=User::find($id);
          if($user->status==1)
          {
            $user->status=0;
            $user->save();
           return redirect()->route('medical.list')
                            ->with('success','Medical Center Status Changed');
          } 
          elseif($user->status==0)
          {
            $user->status=1;
            $user->save();
           return redirect()->route('medical.list')
                            ->with('success','Medical Center Status Changed');
          } 
        }

        public function showcmsfaq()
        {
            $pagelist = Page::all();
            return view('admin.crudcms',compact('pagelist'));
        }

        public function editcms($id)
        {
            $pagedetail = Page::find($id);
            return view('admin.editcms',compact('pagedetail','id'));
        }

        public function cmsstatus($id)
        {
            $pagedetail = Page::find($id);
            if($pagedetail != null)
            {
            if($pagedetail->status=="Inactive")
            {
                $pagedetail->status="Active";
                $pagedetail->save();
            }
            else
            {
                $pagedetail->status="Inactive";
                $pagedetail->save();
            }
        }
            return $this->showcmsfaq();
            
        }

        public function cmsupdate(Request $request,$id)
        {
            $this->validate($request, [
          'title' => 'required',
          'slug' => 'required',
          'body' => 'required',

            ]);
            
            Page::find($id)->update($request->all());
            return redirect()->route('add.faq.show')
                            ->with('success','Page record updated');


        }
        public function cmsdelete($id)
        {
             Page::find($id)->delete();
            return redirect()->route('add.faq.show')
                            ->with('success','Page Deleted');
        }
        public function createnewpage()
        {
            return view('admin.faq-editor');
        }
        public function showdoctor($id)
        {
            $user=User::find($id);
            return view('admin.doctorprofile',compact('user'));
        }
        public function reset2(Request $request)
    {
        if(Auth::Check())
  {
    $request_data = $request->All();
    $validator = $this->admin_credential_rules($request_data);
    if($validator->fails())
    {
        return redirect()->route('reset.password')->with('Warning','Password Does not match');
    }
    else
    {  
      $current_password = Auth::User()->password;           
      if(Hash::check($request_data['current-password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['password']);;
        $obj_user->save(); 
        return redirect()->route('admin.dashboard')->with('success','Password Changed');
      }
      else
      {           
        $error = array('current-password' => 'Please enter correct current password');
        return redirect()->route('reset.password')->with('Warning','error');
      }
    }        
  }
  else
  {
    return redirect()->to('/');
  }    
       
    }

    public function admin_credential_rules(array $data)
{
  $messages = [
    'current-password.required' => 'Please enter current password',
    'password.required' => 'Please enter password',
  ];

  $validator = Validator::make($data, [
    'current-password' => 'required',
    'password' => 'required|same:password',
    'password_confirmation' => 'required|same:password',     
  ], $messages);

  return $validator;
}

}
   
