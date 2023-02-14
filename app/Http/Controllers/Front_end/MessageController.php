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



class MessageController extends Controller

{

    public function index()
    {
        if(!Auth::guard('users')->user()) 
    {
        return redirect('/#popup1');
    }
           print_r(Auth::guard('users')->user());
        // return view('front_end.users.login');
    }

    public function chat($id)
    {
      return view('front_end.users.chats');
    }

    public function chats($from,$to)
    {
        $wallet_amount=[];
        $astro_charge='';
        $from_user=DB::table('users')->where('users.id',$from)->first();
        $to_user=DB::table('users')->where('users.id',$to)->first();

        if($from_user->user_type==1){
            $wallet_amount=DB::table('wallet_system')->where('user_id',$from)->first();
        }else{

            $astro_charge=$from_user->per_minute;

        }
        if($to_user->user_type==1){
            $wallet_amount=DB::table('wallet_system')->where('user_id',$to)->first();           
        }else{
            $astro_charge=$to_user->per_minute;

        }

        return view('front_end.users.chats',compact('from_user','to_user','wallet_amount','astro_charge'));

    }

    public function load_request_chat()
    {
        $user_id= $_GET['from_user_id'];
        $user_type= $_GET['user_type'];
       if($user_type == 'astro')
       {
        $notification_data = DB::table('chat_requests')->select('id', 'from_user_id', 'to_user_id', 'status')->where('status', '!=', 'Approve')->where('to_user_id', $user_id)->orderBy('id', 'ASC')->get();
     

       }else{
        $notification_data = DB::table('chat_requests')->select('id', 'from_user_id', 'to_user_id', 'status')->where('status', '=', 'Approve')->where('from_user_id', $user_id)->orderBy('id', 'ASC')->get();
     
       }
        return $notification_data;                              

    }

    public function send_request(Request $request)
    {

     $current_user=Auth::guard('users')->user();
     $id=Auth::guard('users')->user()->id;

     $available_balance=DB::table('wallet_system')->where('user_id',$id)->first();


    $astrologer = DB::table('users')->where('id',$request->to_user_id)->first();
    
    if($astrologer)
    {
        $astro_charge=$astrologer->per_minute * 5;
        if($astro_charge <= $available_balance->wallet_amount )
        {
            $insert= ['from_user_id'=>$request->from_user_id,'to_user_id'=>$request->to_user_id,'status'=>'Pending'];

        DB::table('chat_requests')->insert($insert);  
        $url = 'https://fcm.googleapis.com/fcm/send';
        // $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();

        $FcmToken =  DB::table('users')->select('web_device_id')->where('id',$request->to_user_id)->first();

        $serverKey = 'AAAAATwqS-8:APA91bEaQYb6gSYWm1sGhuNYOkb9Srw4R1vaj5pLNtYjOTsYf3T7ZcJrMDoy2ew-pjTANJ2pEIhyzMQeWgr0bEzoleQPnLBIpsy1QuC7qvs0ku0fd_ZPd71ImS0rTlArb3U9C1mznmpS';
        $actionURL=url("/user/notification/{$request->to_user_id}");
        $data = [
            "to" => $FcmToken->web_device_id,
            "notification" => [
                "title" => 'You have new Chat Request',
                "body" => 'Confirm chat request', 
                "url" =>$actionURL, 
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
        // print_r($result);
        return 1; 

        
        }else{

       $message ='Minimum balance of 5 minutes (INR '.$astro_charge.') is required to start chat with '.$astrologer->name;
       $response =['status'=>0,'message'=>$message];   
       return json_encode($response);
        }
    }
     exit;

        
   


    }


    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        // $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();

        $FcmToken =  DB::table('users')->select('web_device_id')->where('id',1)->first();
        
        $serverKey = 'AAAAATwqS-8:APA91bEaQYb6gSYWm1sGhuNYOkb9Srw4R1vaj5pLNtYjOTsYf3T7ZcJrMDoy2ew-pjTANJ2pEIhyzMQeWgr0bEzoleQPnLBIpsy1QuC7qvs0ku0fd_ZPd71ImS0rTlArb3U9C1mznmpS';
  
        $data = [
            "to" => $FcmToken->web_device_id,
            "notification" => [
                "title" => 'You have new Chat Request',
                "body" => 'Confirm chat request',  
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
        // print_r($result); 
        return redirect('/signin'); 
        // return 1;

    }

    public function approve_request($request)
    {
        $update= ['status'=>'Approve'];

        $user= DB::table('chat_requests')->where('id',$request)->first();

        DB::table('chat_requests')->where(['id'=>$request,'status'=>'Pending'])->update($update);
      
        // $url="http://134.209.229.112/astrology/user/chat/".$user->to_user_id."/".$user->from_user_id;
        // $url="http://collabdoor.com/astrology/user/chat/".$user->from_user_id;

        return $user;

    }

    public function notification($id)
    {

        $messages=DB::table('chat_requests')->where('to_user_id',$id)->orderBy('id', 'DESC')->get();
        return view('front_end.users.notification',compact('messages'));

    }

    public function chat_accept(Request $request)
    {
        $status=[];
         $id= Auth::guard('users')->user()->id;

        //   return $request->data;
       $status= DB::table('chat_requests')->where(['from_user_id'=>$id,'to_user_id'=>$request->data,'status'=>'Approve'])->orderBy('id', 'DESC')->first();
       if(!empty($status))
       {
        return $status;

       }else{
        return 0;
       }

    }

    public function get_notification_count($id)
    {
        $count= DB::table('chat_requests')->where(['to_user_id'=>$id,'status'=>'Pending'])->count();
        return $count;
    }
}