<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Page;
use App\User;
use Datatables;
use App\Userprofile;

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
        public function medicalindex()
        {
            return view('admin.add-medical');
        }
        public function medicallist()
        {
            $users = DB::table('users')
            ->join('userprofiles', 'users.id', '=', 'userprofiles.user_id')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('userprofiles.id','userprofiles.user_id','userprofiles.title','userprofiles.description','userprofiles.medical_center_email','userprofiles.contact_no','userprofiles.address')
            ->where('users.role_id','=','2')
            ->get();
         
            return Datatables::of($users)->addColumn('action', function($user){return '<a href="/admin/medical/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-television"></i> Show</a><a href="/admin/medical/'.$user->id.'/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a><a href="#show-'.$user->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>';})->make(true);
        }

        public function medicalshow($id)
        {
           // $medicaldetail = Medicalcenter::where('id', '=', $id)->first();
            $medicaldetail = Userprofile::where('id','=',$id)->get();
            // $medicaldetail->setRelation('doctors', $medicaldetail->doctors()->paginate(8));
            // $doc=$medicaldetail->doctor->fname;
            // $doc= Doctor::medicalcenters();
            return view('admin.detail-medical', compact('medicaldetail'));
        }

        public function medicaledit($id)
        {
            $medicaldetail = Userprofile::where('id', '=', $id)->first();
            return view('admin.edit-medical',compact('medicaldetail'));
        }
        public function medicalStore(Request $request)
        {
            Userprofile::find($request->id)->update($request->all());
            return redirect()->route('medical.list')
                            ->with('success','Page record updated');
        }

        public function medicaldestroy($id)
        {
             Medicalcenter::find($id)->delete();
            return redirect()->route('admin.detail-medical')
                            ->with('success','Medical Center Deleted');
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
        function createnewpage()
        {
            return view('admin.faq-editor');
        }






}
