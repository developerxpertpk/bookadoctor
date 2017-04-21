<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\User;
use App\Userprofile;
use Auth;
use App\BookingDocuments;
use Validator;
use Redirect;
use File;
use Session;

class MedicalcenterBookingController extends Controller
{
    public function index(){
        $bookings=Booking::where('medic_id','=',Auth::user()->id)->get();
//        echo "<pre>";
//        print_r($bookings);
//        die('hsdd');

            return view('medicalcenter.bookings.show-bookings',compact('bookings'));
    }
    public function show_detail($id){
        $booking_detail=Booking::where('id','=',$id)->first();
        $booling_docs=BookingDocuments::where('booking_id','=',$id)->get();
//
        $doctor_detail= Userprofile::where('user_id','=',$booking_detail->doctor_id)->first();
        $paitent_detail= Userprofile::where('user_id','=',$booking_detail->user_id)->first();



//        echo "<pre>";
//        print_r($paitent_detail);
//





        
//        die('hsdd');

            return view('medicalcenter.bookings.show-booking-detail',compact('booking_detail','doctor_detail','paitent_detail','booling_docs'));
    }
    public function cancel_booking(Request $request,$id){

        $book = Booking::find($id);
        $book->status=$request['cancel_status'];
        $book->cancel_reason=$request['cancel_reason'];
        $patient_email=User::where('id','=',$book->user_id)->first()->email;
        $doctor_email=User::where('id','=',$book->doctor_id)->first()->email;
        $book->save();
        User::booking_cancel_email_msg_to_patient($patient_email);
        User::booking_cancel_email_msg_to_doctor($doctor_email);
        return $this->show_detail($id);
    }
    public function reschedule_booking(Request $request,$id){

        $book = Booking::find($id);
        $book->status=$request['reschedule_status'];
        $book->reschedule_reason=$request['reschedule_reason'];
        $patient_email=User::where('id','=',$book->user_id)->first()->email;
        $doctor_email=User::where('id','=',$book->doctor_id)->first()->email;
        $book->save();
        User::booking_reschedule_email_msg_to_patient($patient_email);
        User::booking_reschedule_email_msg_to_doctor($doctor_email);
        return $this->show_detail($id);
    }
    public function complete_booking($id){
        $book = Booking::find($id);
        $book->status=1;
//        echo $book->user_id;
//       echo $book->doctor_id;

       $patient_email=User::where('id','=',$book->user_id)->first()->email;
       $doctor_email=User::where('id','=',$book->doctor_id)->first()->email;

      $book->save();
        User::booking_complete_email_msg_to_patient($patient_email);
        User::booking_complete_email_msg_to_doctor($doctor_email);
     return $this->show_detail($id);
    }
 public function show_booking_history(){
    $patient_dist= Booking::select('user_id')->distinct()->where('medic_id','=',Auth::user()->id)->get();
    foreach ($patient_dist as $patient){
        $patient->user_id;
        $data=Userprofile::where('user_id','=',$patient->user_id)->get();

        $patient_history[]=$data;


    }

        return view('medicalcenter.bookings.patient-booking-history',compact('patient_history'));
    }
    public function show_booking_history_show(Request  $request)
    {
        $patient_user_id = $_POST['sem'];
       $bookings = Booking::where('user_id','=',$patient_user_id)->get();
        foreach($bookings as $key)
        {
            $key['doctor_name']=$key->is_doctors->is_profile->first_name." ".$key->is_doctors->is_profile->last_name;
            $key['patient_name']=$key->is_users->is_profile->first_name." ".$key->is_users->is_profile->last_name;
            $key['medicalcenter_name']=$key->is_medical->is_profile->title;
        }

        return response($bookings);
    }

    public function documents_upload_form($id)
    {
        $booking_id=$id;
        $booking = Booking::find( $booking_id);

            return view('medicalcenter.bookings.upload-patient-document-form',compact('booking'));
    }
public function documents_upload_submit(Request $request)
    {
        $files = $request->file('docimages') ;
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
            $rules = array('file' => 'mimes:png,jpeg|required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
            if($validator->passes()){
                $destinationPath = public_path().'/images/documents/' ;
                $fileName = rand(5,8).$file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $fileName);
                $uploadcount ++;
            }
           $dooking_id = $request['booking_id'];
            $gallery = new BookingDocuments;
            $gallery->booking_id=$dooking_id;
            $gallery->documents=$fileName;
            $gallery->save();

        }
        return $this->show_detail($dooking_id);


    }

    public function destroy1doc($id,$del)
    {

        $news = BookingDocuments::findOrFail($id);
        $image_path = app_path("images/documents/{$news->documents}");

        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $news->delete();

        return $this->show_detail($del);

    }


}

