<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Input;                                          //All below this was copy n paste
use App\Http\Requests;
use App\User;
use App\UserRegisters;
use App\UserProfiles;
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

    //Below is a temporary function implimentation trial

    // public function authenticated($request , $user)
    // {
        
    // }

    public function login(){
        //print_r($_POST);
        $email=$_POST['email'];
        $password=$_POST['password'];
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
            {
                if(Auth::user()->role_id == 1)
                {
                    return redirect(route('patient.dashboard'));
                }
                if(Auth::user()->role_id == 2)
                {
                    return redirect(route('doctor.dashboard'));
                }
                if(Auth::user()->role_id == 3)
                {
                    return redirect(route('medical.center.dashboard'));

                }

            }
        //die('hahaha');
    }


}
