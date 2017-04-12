<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicalcenter;
use Auth;
use Validator;
use Redirect;
use File;
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
                    $fileName = rand(5,8).$file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $fileName);
                $uploadcount ++;
                }
                    $gallery = new Medicalcenterimage;
                    $gallery->user_id=Auth::user()->id;
                    $gallery->images=$fileName;
                    $gallery->save();

                }
        return redirect()->route('medical.center.image.gallery')->with('success','Image Uploaded successfully');

}

        public function gallery_images(){
            $images_gallery = Medicalcenterimage::where('user_id', '=', Auth::user()->id)->get();

//            echo "<pre>";
//            print_r($images_gallery);
//            dd('hell');
            return view('medicalcenter.profile',compact('images_gallery'));
        }

    public function destroy1($id)
    {

        $news = Medicalcenterimage::findOrFail($id);
        $image_path = app_path("images/gallery_pic/{$news->images}");

        if (File::exists($image_path)) {
            File::delete($image_path);
          //  unlink($image_path);
        }
        $news->delete();



//        Medicalcenterimage::find($id)->delete();
        return redirect()->route('medical.center.image.gallery')
            ->with('success','Image deleted successfully');
    }
}
