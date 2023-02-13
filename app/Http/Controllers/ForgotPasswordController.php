<?php

namespace App\Http\Controllers;

use App\ApiCode;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use Mail;


class ForgotPasswordController extends Controller
{
    public function forgot(Request $request) {

         // $request->validate(['email' => 'required|email']);

         //    $status = Password::sendResetLink(
         //        $request->only('email')
         //    );
        // var_dump($status);die;
        // $credentials = request()->validate(['email' => 'required|email']);

        // Password::sendResetLink($credentials);
         
            $business_email   = $request->business_email;
            $validator = Validator::make($request->all(), [

            'business_email'     => 'required|email',
        ]);
            if ($validator->fails()) {
            $error_msg = [];

            foreach ($validator->messages()->all() as $key => $value) {
                array_push($error_msg, $value);
            }

            if ($error_msg) {
                return array(
                    'status' => false,
                    'code' => 201,
                    'message' => $error_msg[0],
                    'data' => $request->all()
                );
            }

        }else{
            $checkuser = DB::table('business')->where('business_email', $business_email)->first(); 
            if($checkuser == null){

                $data['status'] = "false";
                $data['message'] = "User does not exist";
            }else{


                $val=DB::table('password_resets')->insert([
                                'email' => $business_email,
                                'token' =>Hash::make(uniqid()), 
                            ]);
               
                    $tokenData = DB::table('password_resets')
                                ->where('email',$business_email)->first();

                                if ($this->sendResetEmail($business_email, $tokenData->token)) {
                                     $data['status'] = "true";
                                    $data['message'] = "A reset link has been sent to your email address.";
                                
                                } else {
                                     $data['status'] = "true";
                                    $data['message'] = "A Network Error occurred. Please try again.";

                                    }

    
        }
            }
             return response()->json($data, 200); 
 }

     
    private function sendResetEmail($email, $token)
    {
       
       $base_url="http://tenspark.com/collab/api/";
        //Retrieve the user from the database
        $user = DB::table('business')->where('business_email', $email)->select('business_name', 'business_email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link =  $base_url . 'password/reset' .'?token_id='. $token . '&email=' . urlencode($user->business_email);

        // var_dump($link);
        // die;
            try {
            //Here send the link with CURL with an external email API 
                $data = [
                  'subject' => "Password reset link",
                  'email' => $email,
                  'content' => $link
                ];
                
                Mail::send('email-template', $data, function($message) use ($data) {
                $message->to($data['email']);
                 $message->subject($data['subject']);
                });

                return true;
            } catch (\Exception $e) {
                return false;
            }
        }


    public function reset(Request $request) {
        // $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
        //     $user->password = Hash::make($password);
        //     $user->save();
        // });

        // if ($reset_password_status == Password::INVALID_TOKEN) {
        //     return $this->respondBadRequest(ApiCode::INVALID_RESET_PASSWORD_TOKEN);
        // }

        // return $this->respondWithMessage("Password has been successfully changed");
                    
            $validator = Validator::make($request->all(), [

                    'email' => 'required|email',
                    'token_id' => 'required',
                    'password' => 'required|confirmed'
        ]);



        if ($validator->fails()) {
            $error_msg = [];

            foreach ($validator->messages()->all() as $key => $value) {
                array_push($error_msg, $value);
            }

            if ($error_msg) {
                return array(
                    'status' => false,
                    'code' => 201,
                    'message' => $error_msg[0],
                    'data' => $request->all()
                );
            }

        }else{

            
            $tokenData = DB::table('password_resets')
                        ->where('token', $request->token_id)->first();
                        // var_dump( $tokenData);die;
                         if ($tokenData==null){
                            $data['status'] = "false";
                            $data['message'] = "Enter valid token";   
                         }else{
                            $tokenData = DB::table('password_resets')
                                        ->where('token', $request->token_id)->first();

                            $setdata=array(
                                    'business_password'  =>  Hash::make($request->password)
                                    );
                    
                             DB::table('business')->where('business_email', $tokenData->email)->update($setdata);       
                            
                          

                            $data['status'] = "true";
                            $data['message'] = "Password update success"; 

                            }
                         }              
                return response()->json($data, 200); 
                }
}