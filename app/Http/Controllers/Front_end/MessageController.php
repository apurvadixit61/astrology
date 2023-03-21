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
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)



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

    public function chat($from,$to,Request $request)
    {

        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        // echo ;
        // echo date('H:i');
        // exit;
        $key=$request->get('key');
        $key_exists= DB::table('chat_requests')->where(['status'=>'Approve','key'=>$request->get('key')])->first();
     
          
       $chat_id=$key_exists->id;       
        $wallet_amount=[];
        $kundli=[];
        $astro_charge='';
        $userid=0;
        $from_user=DB::table('users')->where('users.id',$from)->first();
        $to_user=DB::table('users')->where('users.id',$to)->first();

        if($from_user->user_type==1){
            $userid=$from_user->id;
            $max_time=$from_user->is_login;
            $wallet_amount=DB::table('wallet_system')->where('user_id',$from)->first();
            $kundli=DB::table('kundli')->where('user_id',$from)->orderBy('id', 'DESC')->first();
        }else{
            $astroid=$from_user->id;
            $astro_charge=$from_user->per_minute;

        }
        if($to_user->user_type==1){
            $userid=$to_user->id;
            $max_time=$to_user->is_login;
            $wallet_amount=DB::table('wallet_system')->where('user_id',$to)->first();  
            $kundli=DB::table('kundli')->where('user_id',$to)->orderBy('id', 'DESC')->first();

        }else{
            $astroid=$to_user->id;

            $astro_charge=$to_user->per_minute;

        }
       
        if($max_time==0)
        {
            $max_time=((int)($wallet_amount->wallet_amount)/(int)($astro_charge))*60; 
            print_r($max_time);
            exit;
            $msg='<div>Name:'.$kundli->kundli_user_name.'<br/>Gender:'.$kundli->gender.'<br/>Date:'.$kundli->birth_date.'<br/>Time:'.$kundli->birth_time.'<br/>Place:'.$kundli->birth_place.'<br/>Marital Status:'.$kundli->marital_status.'<br/>Occupation:'.$kundli->occupation.'<br/>Topic of Concern:'.$kundli->topic_concern.'<br/></div>';
        
            $insert=[
            ['from_user_id'=>$userid,'to_user_id'=>$astroid,'chat_message'=>'This is an automated message to confirm that chat has started.','message_status'=>'Not Send','message_time'=>date('H:i a'),'message_date'=>date('Y-m-d')],
            ['from_user_id'=>$astroid,'to_user_id'=>$userid,'chat_message'=>'Welcome to Our website.Consultant will take a minute to analyse your details.You may ask your question in the meanwhile.','message_status'=>'Not Send','message_time'=>date('H:i a'),'message_date'=>date('Y-m-d')],
            ['from_user_id'=>$userid,'to_user_id'=>$astroid,'chat_message'=>$msg,'message_status'=>'Not Send','message_time'=>date('H:i a'),'message_date'=>date('Y-m-d')]];
            DB::table('message')->insert($insert);
           
            DB::table('users')->where('id',$userid)->update(['is_login'=>$max_time]);
        }
      
      
        return view('front_end.users.chat',compact('from_user','to_user','wallet_amount','astro_charge','key','key_exists','chat_id','kundli','max_time'));
       
    //   return view('front_end.users.chats');
    }
    public function chats($from,$to,Request $request)
    {
       
        $from_user=DB::table('users')->where('id',$from)->first();
        $to_user=DB::table('users')->where('id',$to)->first();
        $user_type=$from_user->user_type;
        if($from_user->user_type==1 ){ 
            $user= $from_user;
            $astro=$to_user;
           }
        if($to_user->user_type==1){           
            $user= $to_user;
            $astro=$from_user;
        }
        
         $user_amount=DB::table('wallet_system')->where('user_id',$user->id)->first();
         $astro_charge=DB::table('users')->where('id',$astro->id)->first();

        // print_r($astroid);
        print_r($user_amount->wallet_amount);
        echo "<br>";
        print_r($astro_charge->per_minute);
        return view('front_end.users.chat',compact('user','astro','user_type','from_user','to_user'));
    }
    public function chatss($from,$to,Request $request)
    {
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        // echo ;
        // echo date('H:i');
        // exit;
        $key=$request->get('key');
        $key_exists= DB::table('chat_requests')->where(['status'=>'Approve','key'=>$request->get('key')])->first();
        if(empty($key_exists))
        {
            return view('front_end.notfound');

        }else{

          
       $chat_id=$key_exists->id;       
        $wallet_amount=[];
        $kundli=[];
        $astro_charge='';
        $userid=0;
        $from_user=DB::table('users')->where('users.id',$from)->first();
        $to_user=DB::table('users')->where('users.id',$to)->first();

        if($from_user->user_type==1){
            $userid=$from_user->id;
            $max_time=$from_user->is_login;
            $wallet_amount=DB::table('wallet_system')->where('user_id',$from)->first();
            $kundli=DB::table('kundli')->where('user_id',$from)->orderBy('id', 'DESC')->first();
        }else{
            $astroid=$from_user->id;
            $astro_charge=$from_user->per_minute;

        }
        if($to_user->user_type==1){
            $userid=$to_user->id;
            $max_time=$to_user->is_login;
            $wallet_amount=DB::table('wallet_system')->where('user_id',$to)->first();  
            $kundli=DB::table('kundli')->where('user_id',$to)->orderBy('id', 'DESC')->first();

        }else{
            $astroid=$to_user->id;

            $astro_charge=$to_user->per_minute;

        }
       
        if($max_time==0)
        {
            $max_time=floor((int)($wallet_amount->wallet_amount)/(int)($astro_charge))*60; 
           
            $msg='<div>Name:'.$kundli->kundli_user_name.'<br/>Gender:'.$kundli->gender.'<br/>Date:'.$kundli->birth_date.'<br/>Time:'.$kundli->birth_time.'<br/>Place:'.$kundli->birth_place.'<br/>Marital Status:'.$kundli->marital_status.'<br/>Occupation:'.$kundli->occupation.'<br/>Topic of Concern:'.$kundli->topic_concern.'<br/></div>';
        
            $insert=[['from_user_id'=>$userid,'to_user_id'=>$astroid,'chat_message'=>$msg,'message_status'=>'Not Send','message_time'=>date('H:i a'),'message_date'=>date('Y-m-d')],
            ['from_user_id'=>$userid,'to_user_id'=>$astroid,'chat_message'=>'<b>This is an automated message to confirm that chat has started.</b>','message_status'=>'Not Send','message_time'=>date('H:i a'),'message_date'=>date('Y-m-d')],
            ['from_user_id'=>$astroid,'to_user_id'=>$userid,'chat_message'=>'<b>Welcome to Our website.Consultant will take a minute to analyse your details.You may ask your question in the meanwhile.</b>','message_status'=>'Not Send','message_time'=>date('H:i a'),'message_date'=>date('Y-m-d')]];
            DB::table('message')->insert($insert);           
            DB::table('users')->where('id',$userid)->update(['is_login'=>$max_time]);
            DB::table('users')->where('id',$astroid)->update(['is_login'=>$max_time]);
        }
      
      
        return view('front_end.users.chat',compact('from_user','to_user','wallet_amount','astro_charge','key','key_exists','chat_id','kundli','max_time'));
       }
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
        $astro_charge=$astrologer->per_minute * 1;
        if(!empty($available_balance)){
        if($astro_charge <= $available_balance->wallet_amount )
        {

      
        return 1; 

        
        }else{

       $message ='Minimum balance of 1 minutes (INR '.$astro_charge.') is required to start chat with '.$astrologer->name;
       $response =['status'=>0,'message'=>$message];   
       return json_encode($response);
        }

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
        $update= ['status'=>'Approve','request_date'=>date('Y-m-d H:i:s')];
        $user= DB::table('chat_requests')->where('id',$request)->first();

        DB::table('chat_logs')->insert(['userid'=>$user->from_user_id,'astroid'=>$user->to_user_id,'approve_time'=>date('Y-m-d h:i:s a'),'start_time'=>date('h:i:s')]);
        DB::table('chat_requests')->where('id','<',$request)->update(['status'=>'Close']);
        DB::table('chat_requests')->where(['id'=>$request])->update($update);      
        return $user;

    }

    public function reject_request($request)
    {
        $update= ['status'=>'Close'];

        $user= DB::table('chat_requests')->where('id',$request)->first();
        //  DB::table('chat_requests')->where('id','<',$request)->update(['status'=>'Close']);

        DB::table('chat_requests')->where(['id'=>$request])->update($update);
      
        // $url="http://134.209.229.112/astrology/user/chat/".$user->to_user_id."/".$user->from_user_id;
        // $url="http://collabdoor.com/astrology/user/chat/".$user->from_user_id;

        return $user;

    }

    public function notification()
    {
        $id=Auth::guard('users')->user()->id;
        $messages=DB::table('chat_requests')->select('chat_requests.*','users.name as user_name','users.profile_image as profile_images')->where('to_user_id',$id)
        ->leftJoin('users', 'users.id', '=', 'chat_requests.from_user_id')->orderBy('chat_requests.id', 'DESC')->get();
        return view('front_end.users.notification',compact('messages'));

    }

    public function chat_accept(Request $request)
    {
        $status=[];
         $id= Auth::guard('users')->user()->id;

         $status= DB::table('chat_requests')->where(['from_user_id'=>$id,'to_user_id'=>$request->data])->orderBy('id', 'DESC')->first();
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