<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Userprofile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Input;                                          //All below this was copy n paste
use App\Http\Requests;
use App\User;
use App\UserRegisters;
use Validator;
use View;
use Auth;
use App\Http\Controllers\Redirect;
use Session;
use Hash;
use DB;                                            //Till here

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(){
        //print_r($_POST);
        $email=$_POST['email'];
        $password=$_POST['password'];
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
            {
                if(Auth::user()->role_id == 2)
                {
                    return redirect(route('patient.dashboard'));
                }
                if(Auth::user()->role_id == 3)
                {
                    return redirect(route('doctor.dashboard'));
                }
                if(Auth::user()->role_id == 4)
                {
                    $status2=Userprofile::where('user_id','=',Auth::user()->id)->first();

                    if( $status2->plan_payment_status == 0){
                        return redirect()->route('medical.center.subscription.form')
                            ->with('success', 'New Admin Regester successfully');
                    }
                    if( $status2->plan_payment_status == 1){
                        return redirect(route('medical.center.dashboard'));
                    }
                }
            }
    }
}
