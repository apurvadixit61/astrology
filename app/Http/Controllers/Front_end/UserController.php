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

    public function __construct()
    {

        print_r(Auth::guard('users')->check());
    }
    public function index()
    {
           
        return view('front_end.users.login');
    }

    function dashboard()
    {
        if(Auth::guard('users')->user())
        {

            $user_type=Auth::guard('users')->user()->user_type;
            $id=Auth::guard('users')->user()->id;
            if($user_type==1){
            $total_call=DB::table('chat_history')->where('user_id',$id)->orderBy('id', 'DESC')->get();
            $sum_total_call=count($total_call);
            $total_chat=DB::table('call_details')->where('user_id',$id)->orderBy('id', 'DESC')->get();
            $sum_total_chat=count($total_chat);
            $call_chat=DB::table('users')->where('id',$id)->orderBy('id', 'DESC')->get();
            $sum_call_chat=count($call_chat);
            
            }else{

            $total_call=DB::table('chat_history')->where('astro_id',$id)->orderBy('id', 'DESC')->get();
            $sum_total_call=count($total_call);
            $total_chat=DB::table('call_details')->where('astro_id',$id)->orderBy('id', 'DESC')->get();
            $sum_total_chat=count($total_chat);
            $call_chat=DB::table('users')->where('id',$id)->orderBy('id', 'DESC')->get();
            $sum_call_chat=count($call_chat);
            }

            return view('front_end.users.dashboard',compact('sum_total_call','sum_total_chat','sum_call_chat'));

        }

       // return redirect('login')->with('success', 'you are not allowed to access');
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

    public function profile_page()
    {
        $kundlis=[];
        if(Auth::guard('users')->check()==1)
        {
        $id=Auth::guard('users')->user()->id;
        $profile_update=DB::table('users')->where('id',$id)->orderBy('id', 'DESC')->get();
        $astro_availability=DB::table('astro_availability')->where('astro_id',$id)->orderBy('id', 'DESC')->get();

        return view('front_end.users.profile_update',compact('profile_update','astro_availability'));
        
        }
        return redirect()->back();
    }
    
    public function edit_user(Request $request)
    {

        $id=Auth::guard('users')->user()->id;
          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
           // 'device_id'     =>  'required',

        ]);


        if ($validator->fails()) {
            $error_msg = [];
            foreach ($validator->messages()->all() as $key => $value) {
                array_push($error_msg, $value);
            }
            if ($error_msg) {
                return array(
                    'status' 	=> false,
                    'code' 		=> 201,
                    'message' 	=> $error_msg[0],
                    'data' 		=> $request->all()
                );
            }

        }
        else{


       $checkuser = DB::table('users')->where('id',$id)->first();

        if($checkuser)
        {

                 if($request->profile_image!=''){
                    $coverfile = $request->profile_image;
                    $coverpath = base_path() . '/images/profile_image/';
                    $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());
                    $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                }
                $setdata['name']                  =  $request->name?:'Enter Name';
                $setdata['phone_no']          =  $request->phone_no?:'Enter Phone';
                $setdata['dob']          =  $request->dob?:'Enter DOB';
                $setdata['address']          =  $request->address?:'Enter Address';
                $setdata['blood_group']          =  $request->blood_group?:'Enter Blood Group';
                $setdata['gender']          =  $request->gender?:'Enter Gender';
                $setdata['country']          =  $request->country?:'Enter Country';
                $setdata['zipcode']          =  $request->zipcode?:'Enter Zipcode';
                $setdata['city']          =  $request->city?:'Enter City';
                $setdata['birth_time']          =  $request->birth_time?:'Enter BirthTime';
                $setdata['user_expertise']          =  $request->user_expertise;
                $setdata['user_experience']          =  $request->user_experience;
                $setdata['user_language']          =  $request->user_language;
                $setdata['user_rating']          =  $request->user_rating;
                $setdata['user_aboutus']          =  $request->user_aboutus;
                $setdata['user_avability']          =  $request->user_avability;
                $setdata['user_education']          =  $request->user_education;
                 if($coverimg_name){
                    $setdata['profile_image']              =  $coverimg_name;
                    $setdata['image_url']              =      $coverpath;
                }
                $result = DB::table('users')->where('id',$request->user_id)->update($setdata);;
                $data['data'] = '';
				$data['status'] = true;
				$data['message'] = "Data Update successfully";

        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }

        echo json_encode($data);
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

    public function doSignup(Request $request)
    {
        $input= $request->all();
       $email_exists= DB::table('users')->where('email',$input['email'])->first();

       $phone_exists= DB::table('users')->where('phone_no',$input['phone'])->first();
      
       $date = explode('-', $input['dob']);

       $dob=$date['2'].'-'.$date['1'].'-'.$date['0'];
      
       if(empty($email_exists) && empty($phone_exists))
       {

        $insert=['name'=>$input['name'],
        'user_type'=>1,'email'=>$input['email'],
        'phone_no'=>$input['phone'],'dob'=>$dob,'birth_time'=>$input['birth_time'],'birth_place'=>$input['birth_place'],'password'=>Hash::make($request->password)];
        DB::table('users')->insert($insert);

            return redirect('/signin')->with('success', 'Account created successfully. Please login'); 

       }else{
        if(!empty($email_exists)){ 
            return redirect()->back()->with('error', 'An account with email address already exists')->withInput(); 

        }
        if(!empty($phone_exists)){
            return redirect()->back()->with('error', 'An account with phone number already exists')->withInput(); 

        }
       }


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

                      return redirect()->back()->with('error', 'User not Exists')->withInput(); 
                  }else{
          
          
                    if (Hash::check($input['password'], $checkuser->password)) {
                      
                        $credentials = array(
                            'phone_no' => $checkuser->phone_no,
                            'password' => $input['password']                        );
                     if( Auth::guard('users')->attempt($credentials)) 
                        {
                            $update=['token' => md5(uniqid()),'user_status'=>'Online'];

                            DB::table('users')->where('id',$checkuser->id)->update($update);
                            return redirect('/'); 

                        } 
                        else 
                        {
                            return redirect('/'); 
                              
                        }

                    }else{
                        return redirect()->back()->with('error', 'Password Not Matched')->withInput(); 
                    }
                
                
                  }


            //   }

    }

    public function delete_kundli($id)
    {
        DB::table('kundli')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Kundli deleted Successfully'); 


    }
    public function orders()
    {
        if(Auth::guard('users')->user())
        {
            $id=Auth::guard('users')->user()->id;
            $user_type=Auth::guard('users')->user()->user_type;
            $chat_history=[];

            if($user_type==1){
             
                $messages=DB::table('chat_history')
                 ->join('users','users.id','=','chat_history.astro_id')
                 ->where('user_id',$id)->orderBy('chat_history.id', 'DESC')
                 ->get();
             
                 }else{
             
                     $messages=DB::table('chat_history')
                     ->join('users','users.id','=','chat_history.user_id')
                     ->where('astro_id',$id)->orderBy('chat_history.id', 'DESC')
                     ->get();
               
                 }

            // $result = DB::select( DB::raw("select m.*
            // from message m
            // where m.id in (select max(m.id) as max_id
            //                from message m
            //                group by least(m.to_user_id, m.from_user_id), greatest(m.to_user_id, m.from_user_id)
            //               ) order by m.id desc") );

            //     foreach($result as $msg) 
            //     {
            //         if($msg->from_user_id ==$id || $msg->to_user_id ==$id)
            //         {
            //             if($msg->from_user_id ==$id) {$msg->name=$this->get_user_name($msg->to_user_id); $msg->to =$msg->to_user_id; }
            //             else {$msg->name=$this->get_user_name($msg->from_user_id); $msg->to =$msg->from_user_id; }
            //            array_push($messages,$msg);
            //         }
            //     }     

            return view('front_end.users.orders',compact('messages'));
        }
        return redirect('/'); 

    }

    public function wallets_new()
    {
        if(Auth::guard('users')->user())
        {
            $wallet_data=[];
            $payments_data=[];
            $deduction_data=[];$wallets=0;
        $id=Auth::guard('users')->user()->id;
        $user_type=Auth::guard('users')->user()->user_type;
        $chat_history=[];
        if(!empty($wallets)){$wallets=$wallets->wallet_amount;}
                
        $wallet_data=DB::table('trancation_histroy')->where('user_id',$id)->get();

        $wallets=DB::table('payments')->where('astro_id',$id)->sum('wallet_amount');
        $payments_data=DB::table('payments')->leftJoin('users', 'users.id', '=', 'payments.user_id')->where('astro_id',$id)->orderBy('payments.id', 'DESC')->get();

        if($user_type==1){
         
            $messages=DB::table('chat_history')
             ->join('users','users.id','=','chat_history.astro_id')
             ->where('user_id',$id)->orderBy('chat_history.id', 'DESC')
             ->get();
         
             }else{
         
                 $messages=DB::table('chat_history')
                 ->join('users','users.id','=','chat_history.user_id')
                 ->where('astro_id',$id)->orderBy('chat_history.id', 'DESC')
                 ->get();
           
             }

           
             return view('front_end.users.wallets',compact('messages','wallet_data','payments_data','deduction_data'));

            }

    }

    public function wallets()
    {
        if(Auth::guard('users')->user())
        {
            $id=Auth::guard('users')->user()->id;
            $wallet_data=[];
            $payments_data=[];
            $deduction_data=[];$wallets=0;
            if(Auth::guard('users')->user()->user_type==1){

                $wallets=DB::table('wallet_system')->where('user_id',$id)->first();
                $result=DB::table('payments')->where('user_id',$id)->orderBy('id','DESC')->get();

                foreach($result as $res)
                {
                    $res->name=$this->get_user_name($res->astro_id);
                    array_push($deduction_data,$res);
                }

                if(!empty($wallets)){$wallets=$wallets->wallet_amount;}
                
                $wallet_data=DB::table('trancation_histroy')->where('user_id',$id)->get();
            }else
            {

                //$wallets=DB::table('payments')->where('astro_id',$id)->sum('wallet_amount');
                $wallets=DB::table('chat_history')->where('astro_id',$id)->sum('astro_earning_amount');
                // $payments_data=DB::table('payments')->leftJoin('users', 'users.id', '=', 'payments.user_id')->where('astro_id',$id)->orderBy('payments.id', 'DESC')->get();

            }

          
            return view('front_end.users.wallets',compact('wallets','wallet_data','payments_data','deduction_data'));
        }
        return redirect('/'); 

    }

    public function recharge()
    {
            


        if(Auth::guard('users')->check()==1)
        {
            $user_id=Auth::guard('users')->user()->id;
            $Amount = DB::table('wallet_system')->where('user_id',$user_id)->sum('wallet_amount');
       
            if($Amount){
            $data['amount'] = $Amount;
            $data['status'] = true;
            $data['message'] = "All Wallet Amount data";
            }
            else
            {
                    //$data['data'] = 'Does not data found';
                    $data['status'] = true;
                    $data['amount'] = 0;
                    $data['message'] = "No data found enterd user id";
    
            }

        return view('front_end.users.recharge',$data);
        }

        return redirect('/signin'); 

    }

    public function logout(Request $request) {
        $id=Auth::guard('users')->user()->id;
         
        $update=['token' => 0,'user_status'=>'Offline','is_busy'=>0];

        DB::table('users')->where('id',$id)->update($update);

        Auth::guard('users')->logout();
        return redirect('/');
      }

      public function content_read($url)
      {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_URL, $url);
          $result = curl_exec($ch);
          curl_close($ch);
  
          return $result;
      }

      public function chatintake(Request $request)
      {
        
        $input = $request->all();
        $location = $request->input('birth_place');
        $address = str_replace(" ", "+", "$location");
        $map_where = 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&address=' . $address . '&sensor=false';
        $geocode = $this->content_read($map_where);
        $json = json_decode($geocode);
        $json = json_decode($geocode);
        if ($json->{'results'}) {
            $loc['lat'] = isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'}) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'} : 0;
            $loc['long'] = isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'}) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'} : 0;
        } else {
            $loc['lat'] = 0;
            $loc['long'] = 0;
        }

        $date = explode('-', $input['birth_date']);
        $time = explode(':', $input['birth_time']);

 
        $insert=['user_id'=>Auth::guard('users')->user()->id,
        'kundli_user_name'=>$input['kundli_user_name'],'birthday_year'=>$date['0'],'birth_day'=>$date['2'],'birth_month'=>$date['1'],
        'birth_time'=>$input['birth_time'],'birth_place'=>$input['birth_place'],'birth_time_mintus'=>$time['1'],'birth_time_hrs'=>$time['0'],'lat'=>$loc['lat'],'long'=>$loc['long'],'time_zone'=>'5.5',
        'gender' => $input['gender'],
        'marital_status' => $input['marital_status'],
        'occupation' => $input['occupation'],'birth_date'=>$input['birth_date'],
        'topic_concern' => $input['topic_concern']];
        $kundli=DB::table('kundli')->where($insert)->first();

        if(empty($kundli))
        {
           $kundli_id= DB::table('kundli')->insertGetId($insert);
        }else{
           $kundli_id =$kundli->id;

        }

        
        $id=$input['to_user'];

        $bytes = random_bytes(6);

        $insert= ['from_user_id'=>Auth::guard('users')->user()->id,'to_user_id'=>$id,'status'=>'Pending','key'=>bin2hex($bytes)];

        DB::table('chat_requests')->insert($insert);  
        $url = 'https://fcm.googleapis.com/fcm/send';
        // $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();

        $FcmToken =  DB::table('users')->select('web_device_id')->where('id',$id)->first();

        $serverKey = 'AAAAATwqS-8:APA91bEaQYb6gSYWm1sGhuNYOkb9Srw4R1vaj5pLNtYjOTsYf3T7ZcJrMDoy2ew-pjTANJ2pEIhyzMQeWgr0bEzoleQPnLBIpsy1QuC7qvs0ku0fd_ZPd71ImS0rTlArb3U9C1mznmpS';
        $actionURL=url("/user/notification/{$id}");
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

        $user=DB::table('users')->where('id',$input['to_user'])->first();
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update(['kundli_id'=>$kundli_id]);
        return view('front_end.users.confirm',compact('id','user'));

      }
      
      public function get_user_name($id)
      {
        $users= DB::table('users')->where('id',$id)->first();
        return $users->name; 
      }

      public function chat_history($userid)
      {
        $to_user= DB::table('users')->where('id',$userid)->first();
        $id=Auth::guard('users')->user()->id;
        DB::enableQueryLog();
        $chats=DB::select( DB::raw("select * from message where (from_user_id=".$userid." and to_user_id=".$id.") or(from_user_id=".$id." and to_user_id=".$userid.")") );
     
        // $query = DB::getQueryLog();
        // print_r($query);   //  echo "<pre>";
       
        return view('front_end.users.chats',compact('to_user','chats'));
      }

      public function profileupdate(Request $request)
      {
        $input=$request->all();
        $id=Auth::guard('users')->user()->id;
        $user_type=Auth::guard('users')->user()->user_type;
         $update=['name'=>empty($input['name'])?'':$input['name'],'dob'=>empty($input['dob'])?'':$input['dob'],'birth_time'=>empty($input['birth_time'])?'':$input['birth_time'],'birth_place'=>empty($input['birth_place'])?'':$input['birth_place'],'user_language'=>empty($input['user_language'])?'':$input['user_language'],
         'user_expertise'=>empty($input['user_expertise'])?'':$input['user_expertise'],
         'user_experience'=>empty($input['user_experience'])?'':$input['user_experience'],'gender'=>empty($input['gender'])?'':$input['gender'],
         'user_aboutus'=>empty($input['user_aboutus'])?'':$input['user_aboutus'],'per_minute'=>empty($input['per_minute'])?'':$input['per_minute']];
        if(!empty($request->file('image_url')))
         {
            $files_arr=[];
            $files=$request->file('image_url');
            foreach($files as $file)
            {
             $coverfile = $file;
             $coverpath = base_path() . '/images/profile_image/cover_img';
             $file->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());
             $coverimg_name = '/'.time().$coverfile->getClientOriginalName();     
             array_push($files_arr,$coverimg_name);

            }

            $update['image_url']=implode('|',$files_arr);
         }
         if(!empty($request->file('profile_image')))
         {
            $coverfile = $request->profile_image;
            $coverpath = base_path() . '/images/profile_image';
            $request->profile_image->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

            $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
            $update['profile_image']=$coverimg_name;         

         }

         if(!empty($request->password))
         {
            $update['password']=Hash::make($request->password);
         }

       
        DB::table('users')->where('id',$id)->update($update);

         if($user_type==2)
        {
        foreach($input['week_day'] as $key=> $week)
        {
        $where=['astro_id'=>$id,'days'=>$week];

          $weeks_available =  DB::table('astro_availability')->where($where)->first();
          if(empty($weeks_available))
          {
            $insert=['astro_id'=>$id,'days'=>$input['week_day'][$key],'start_time'=>$input['week_start_time'][$key],'end_time'=>$input['week_end_time'][$key]];
            $weeks_available =  DB::table('astro_availability')->insert($insert);
          }else{
            $update=['start_time'=>$input['week_start_time'][$key],'end_time'=>$input['week_end_time'][$key]];
            $weeks_available =  DB::table('astro_availability')->where($where)->update($update);
          }

        }

       }
        return redirect()->back()->with('success', 'Profile Updated successfully');

      }

      public function delete_cover_img($key)
      {
        $id=Auth::guard('users')->user()->id;

        $data=DB::table('users')->select('image_url')->where('id',$id)->first();
        $data=explode('|',$data->image_url);
        unset($data[$key]);
        DB::table('users')->where('id',$id)->update(['image_url'=>implode('|',$data)]);
        return $key;
      }

     
}