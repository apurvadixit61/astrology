<?php



namespace App\Http\Controllers\Front_end;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Front_end\AstrologyApiClient;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use url;
use Validator;
use Redirect;
use Auth;
use App;
use Session;
//use App\Models\users;



class UserController extends Controller

{

    public function index()
    {
           
        return view('front_end.users.login');
    }

    function dashboard()
    {
        if(Auth::guard('users')->user())
        {
            return view('front_end.users.chats');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }
    public function storeToken(Request $request)
    {
        if(Auth::guard('users')->check() == true){
        $id=Auth::guard('users')->user()->id;
        DB::table('users')->where('id',$id)->update(['web_device_id'=>$request->token]);
        return response()->json(['Token successfully stored.']);
        }else{
        return response()->json(['User not logged in']);

        }
    }

    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        // $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();
        // $id=Auth::guard('users')->user()->id;

        $FcmToken =  DB::table('users')->select('web_device_id')->where('id',1)->first();
        
        $serverKey = 'AAAAATwqS-8:APA91bEaQYb6gSYWm1sGhuNYOkb9Srw4R1vaj5pLNtYjOTsYf3T7ZcJrMDoy2ew-pjTANJ2pEIhyzMQeWgr0bEzoleQPnLBIpsy1QuC7qvs0ku0fd_ZPd71ImS0rTlArb3U9C1mznmpS';
  
        $data = [
            "to" => $FcmToken->web_device_id,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];

      
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        // Close connection
        curl_close($ch);
        // FCM response
        print_r($result); 
        return redirect('/'); 

    }


    public function doLogin(Request $request)
    {

        // $rules = array(
        //     'email' => 'required|email',
        //     'password' => 'required|alphaNum|min:8');
        //     // checking all field
        //     $validator = Validator::make($request->all() , $rules);
        //     // if the validator fails, redirect back to the form
        //     if($validator->fails()) {
        //         $errors = $validator->errors();
        //         return redirect()->back()->withErrors($errors);
        //     }
        //       else
        //       {
                $input= $request->all();
                $userdata = array(
                    'phone_no' => $input['email'] ,
                    'password' => $input['password']
                  );
              

                  $checkuser = DB::table('users')->where('phone_no',$input['email'])->first();
           
                  if($checkuser == null){
      
                      $data['status'] = "false";
                      $data['message'] = "Enter phone number";
                  }else{
          
          
                    if (Hash::check($input['password'], $checkuser->password)) {
                      
                        $credentials = array(
                            'phone_no' => $checkuser->phone_no,
                            'password' => $input['password']                        );
                     if( Auth::guard('users')->attempt($credentials)) 
                        {
                            $update=['token' => md5(uniqid()),'is_login'=>1,'user_status'=>'Online'];

                            DB::table('users')->where('id',$checkuser->id)->update($update);
                            return redirect('/'); 

                        } 
                        else 
                        {
                            return redirect('/'); 
                              
                        }

                    }else{
                        return redirect('/'); 
                    }
                
                
                  }


            //   }

    }

    public function logout(Request $request) {
         
        // $update=['token' => md5(uniqid()),'is_login'=>1,'user_status'=>'Online'];

        // DB::table('users')->where('id',$checkuser->id)->update($update);

        Auth::guard('users')->logout();
        return redirect('/');
      }
}