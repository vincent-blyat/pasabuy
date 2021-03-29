<?php

namespace App\Http\Controllers;

use App\Mail\emailConfirmation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //

    private $personalInfo; //temp storage for tbl_userInformation 
    private $accountInfo; //temp storage for tbl_userAuthentication
    private $addressInfo; //temp storage for tbl_useraddress


    //function to put personal info in $personalInfo and  $accountInfo; 
    function postPersonal(Request $request){
        // return response()->json("hello");
        $request->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required'],
            'phoneNumber' => ['required'],
            'password' => ['required'],
            'verificationCode'=> ''
       ]);
        
        // $user = new User();
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->verification_code = sha1(time());
        $request->verificationCode = sha1(time());
        $data =[
            'name' => $request->firstName,
            'verification_code' => $request->verificationCode
        ];


        $email = $request->email;     
        if($request != null){
            Mail::to($email)->send(new emailConfirmation($data));
            return redirect()->back()->with(session()->flash('alert-success', 'Please check your email for verification link'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Error, Something went wrong'));
     }


     //function to put personal info in $addressInfo
    function postAddress(Request $request){

        return response()->json('hello world');
    }

     //function to put personal info in $addressInfo
     function postID(Request $request){


    }


    //this is the function to call to save the data in database
    function register(Request $request){


    }
}