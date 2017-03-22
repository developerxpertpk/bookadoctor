<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicalcenter;
use Auth;
use Validator;
use Redirect;
//use Request;
use Session;
use App\Medicalcenterimage;

class MedicalcenterimageController extends Controller
{
    public function multiple_upload(Request $request) {
                    // getting all of the post data
        $files = $request->file('images') ;
                    // Making counting of uploaded images
                $file_count = count($files);
                    // start count how many uploaded
                $uploadcount = 0;
                foreach($files as $file) {
                $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file'=> $file), $rules);
                if($validator->passes()){
                    $destinationPath = public_path().'/images/gallery_pic/' ;
                    $fileName = $file->getClientOriginalName() ;
                $upload_success = $file->move($destinationPath, $fileName);
                $uploadcount ++;
                }
                    $gallery = new Medicalcenterimage;
                    $gallery->medical_center_id=Auth::user()->is_MedicalCenter->id;
                    $gallery->images=$fileName;
                    $gallery->save();
                    return redirect()->route('medical.center.image.gallery')->with('success','Image Uploaded successfully');;
                }
//                if($uploadcount == $file_count){
//                    Session::flash('success', 'Upload successfully');
//                    return redirect()->route('medical.center.image.gallery');
//
//                }
//                else {
//                    return Redirect::to('medical-center-image-upload')->withInput()->withErrors($validator);
//                }
}

        public function gallery_images(){
            $images_gallery = Medicalcenterimage::where('medical_center_id', '=', Auth::user()->is_MedicalCenter->id)->all();

            echo "<pre>";
            print_r($images_gallery);
            dd('hell');
            return view('medicalcenter.profile',compact('images_gallery'));
        }
}
