<?php

namespace App\Http\Controllers;

use App\Mail\emailConfirmation;
use App\Models\User;
use App\Models\userAddress;
use App\Models\userInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        $this->personalInfo = ['email'=> $request->email, 'firstName' => $request->firstName, 'lastName' => $request->lastName,'phoneNumber'=> $request->phoneNumber];
        $this->accountInfo = ['email'=> $request->email, 'password' => $request->password];
        $request->verificationCode = mt_rand(100000, 999999);
        $data =[
            'name' => $request->firstName,
            'verification_code' => $request->verificationCode
        ];

        //return response()->json(trim($request->email));
        $email = trim($request->email);   
        $code = $request->verificationCode;

        $returnValue = ['personalInfo'=>  $this->personalInfo,'account'=>  $this->accountInfo, 'code'=>$code ];
        if($request != null){
            Mail::to($email)->send(new emailConfirmation($data));
            return response()->json($returnValue);
        }
        return response()->json($returnValue);
     }


     //function to put personal info in $addressInfo
    function postAddress(Request $request){

        $request->validate([
            'houseNumber' => ['required'],
            'province' => ['required'],
            'barangay' => ['required'],
            'cityMunicipality' => ['required'],
       ]);

       $this->addressInfo = ['houseNumber'=> $request->houseNumber, 'province'=> $request->province,'barangay'=> $request->barangay,'cityMunicipality'=> $request->cityMunicipaity];
       
        
        return response()->json( $this->addressInfo);
    }

     //function to put personal info in $addressInfo
     function postID(Request $request){


    }


    //this is the function to call to save the data in database
    function register($data){
        


        return response()->json($data);
        // $userInfo = new userInformation();
        // $userInfo->email = $request[0]->email;
        // $userInfo->firstName = $request[0]->firstName;
        // $userInfo->lastName = $request[0]->lastName;
        // $userInfo->phoneNumber = $request[0]->phoneNumber;

        // if($userInfo->save()){
        //     $userAuth = new user();
        //     $userAuth->email = $request[1]->email;
        //     $userAuth->password = Hash::make($request[1]->password);
            
        //     if($userAuth->save()){
        //         $userAddress = new userAddress();
        //         $userAddress->houseNumber = $request[2]->houseNumber;
        //         $userAddress->province = $request[2]->province;
        //         $userAddress->barangay = $request[2]->barangay;
        //         $userAddress->cityMuncipality = $request[2]->cityMuncipality;
                
        //         $userAddress->save();
        //     }
        //     else{
        //         return response()->json('error, information address not saved'); 
        //     }
            
        // }else{
        //     return response()->json('error, information address not saved'); 
        // }

    }
}
