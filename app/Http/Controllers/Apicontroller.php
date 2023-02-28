<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;

use App\User;
use url;
use Validator;
use Session;
use Hash;
date_default_timezone_set("Asia/Kolkata");

class Apicontroller extends Controller{

    public function index()
    {
        $response = [];
        $response['code'] = 302;
        $response['status'] = false;
        $response['message'] = 'Invalid Access';
        echo str_replace('\/','/',json_encode($response));

    }


/*******************************Login**********************************************************************/
    public function login(Request $request){
        //echo "sdfd";die;
        $phone_no   = $request->phone_no;
        $password   = $request->password;
        $validator = Validator::make($request->all(), [

            'phone_no'      =>  'required|numeric|digits_between:1,10',
            // 'password'  => 'required|min:6',
            // 'device_id'  => 'required',
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
           $passwords= Hash::make($request->password);
        //   echo $passwords;die;
             $checkuser = DB::table('users')->where('phone_no', $phone_no)->first();
             if($checkuser == null){

                $data['status'] = "false";
                $data['message'] = "Enter phone number";
            }else{
                
                // if($checkuser->status==1){
                $setdata['device_id']=$request->device_token;
                $setdata['token'] = md5(uniqid());
                $setdata['is_login']=1;
                $setdata['user_status']='Online';


               DB::table('users')->where('phone_no', $phone_no)->update($setdata);
                $userdata='';
				$userdata = DB::table('users')->where('phone_no', $phone_no)->first();
	            $data['status'] = "true";
                $data['id'] = $userdata->id;
                $data['token'] = $userdata->token;
                $data['user_type'] = $userdata->user_type;
                $data['otp_verify'] = $userdata->otp_verify;
                $data['name'] = $userdata->name;
                $data['message'] = "success";
                // }else{
                //      $data['status'] = "false";
                //      $data['message'] = "Your account not verified from admin or may be suspended";
                    
                // }
          }

        }
        echo json_encode($data);
    }
/*******************************End-Login**********************************************************************/
/*******************************Registration**********************************************************************/

public function get_chat_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'astro_id'      =>  'required',
           
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

        }else{
            $check = DB::table('chat_active_status')->where('astro_id',$request->astro_id)->first();
          //    print_r($check); die();
  
              if(!empty($check)){

                $data['status'] = true;
                $data['message'] = "chat status list";
                $data['data']=$check;
              }else{
                $data['status'] = true;
           //     $data['data']="";
                $data['message'] = "Data does not found";
                
              }
        }
        echo json_encode($data);
    }



public function get_call_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no'      =>  'required|numeric|digits_between:1,10',
           
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

        }else{
            $check = DB::table('call_in_queue')->where('mobile_no',$request->mobile_no)->first();
            //  print_r($check); die();
  
              if(!empty($check)){

                $data['status'] = true;
                $data['message'] = "Call status list";
                $data['data']=$check;
              }else{
                $data['status'] = false;
                $data['message'] = "Data does not found";
                
              }
        }
        echo json_encode($data);
    }


    public function chat_status_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'astro_id'          =>  'required',
            'start_time'      =>  'required',
        //   'mobile_no'      =>  'required|numeric|digits_between:1,10',
           'end_time'      =>  'required'
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

        }else{
       
            $check = DB::table('chat_active_status')->where('astro_id',$request->astro_id)->first();
            //  print_r($check); die();
  
              if(empty($check)){
                $setdata=array(

                    'astro_id'                     =>  $request->astro_id,
                //    'mobile_no'                 =>  $request->mobile_no,
                    'start_time'                    =>  $request->start_time,
                    'end_time'                    =>  $request->end_time,
                    'chat_status'                    => $request->status,
                    'status'        =>        $request->status,
                  );

  $setourdata=array('is_busy'=> $request->status);

    $otp_msg="chat in check progress for astrologer ".$request->mobile_no;
    $resultlastid = DB::table('chat_active_status')->insertGetId($setdata);
    $results = DB::table('users')->where('id',$request->astro_id)->update($setourdata);
    $id="$resultlastid";
    $data['status'] = true;
    $data['chat_status'] = true;
   

                }else{

                    $setdata=array(

                        'astro_id'                     =>  $request->astro_id,
                      //  'mobile_no'                 =>  $request->mobile_no,
                        'start_time'                    =>  $request->start_time,
                        'end_time'                    =>  $request->end_time,
                        'chat_status'                    =>   $request->status,
                        'status'        =>         $request->status,
                      );
                    $result = DB::table('chat_active_status')->where('astro_id',$request->astro_id)->update($setdata);
                   
                    $setourdata=array('is_busy'=> $request->status);
                    $results = DB::table('users')->where('id',$request->astro_id)->update($setourdata);
                    $otp_msg="chat in check progress for astrologer ".$request->mobile_no;
                    $data['status'] = true;
                    $data['chat_status'] = true;

                }
   
    }
    echo json_encode($data);
}


public function call_in_queue_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'astro_id'          =>  'required',
        //    'start_time'      =>  'required',
           'mobile_no'      =>  'required|numeric|digits_between:1,10',
        //    'end_time'      =>  'required'
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

        }else{
       
            $check = DB::table('call_in_queue')->where('mobile_no',$request->mobile_no)->first();
            //  print_r($check); die();
  
              if(empty($check)){
                $setdata=array(

                    'astro_id'                     =>  $request->astro_id,
                    'mobile_no'                 =>  $request->mobile_no,
                    'start_time'                    =>  $request->start_time,
                    'end_time'                    =>  $request->end_time,
                    'call_status'                    =>  true,
                    'status'        =>        1,
                  );

    $otp_msg="Call in check progress for astrologer ".$request->mobile_no;
    $resultlastid = DB::table('call_in_queue')->insertGetId($setdata);
    $id="$resultlastid";
    $data['status'] = true;
    $data['call_status'] = true;
   

                }else{

                    $setdata=array(

                        'astro_id'                     =>  $request->astro_id,
                        'mobile_no'                 =>  $request->mobile_no,
                        'start_time'                    =>  $request->start_time,
                        'end_time'                    =>  $request->end_time,
                        'call_status'                    =>  true,
                        'status'        =>        1,
                      );
                    $result = DB::table('call_in_queue')->where('mobile_no',$request->mobile_no)->update($setdata);
                    $otp_msg="Call in check progress for astrologer ".$request->mobile_no;
                    $data['status'] = true;
                    $data['call_status'] = true;

                }
   
    }
    echo json_encode($data);
}

/**************************************************************************************************** */


public function astro_registration(Request $request)
    {

         date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
         $current_date=date('y-m-d H:i:s');

         //echo $date;die;
         $validator = Validator::make($request->all(), [
            'name'          =>  'required',
            'email_id'      =>  'required|email',
            'phone_no'      =>  'required|numeric|digits_between:1,10',
            'password'      =>  'required|min:6',
            'address'           =>  'required',
            'category_id'          =>  'required',
            'user_expertise'     =>  'required',
            'user_experience'     =>  'required',
            'user_language'     =>  'required',
            'user_aboutus'     =>  'required',
            'user_avability'     =>  'required',
            'user_education'     =>  'required',
            'gender'     =>  'required',
            'device_id'     =>  'required',
            'user_type'     =>  'required',
           

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

        }else{
  $coverimg_name='';

                if(!empty($request->profile_image))
                {
               $coverimg_name= $request->profile_image;
              // print_r($coverimg_name);die();


                }


                 if($request->profile_image!=''){
                    $coverfile = $request->profile_image;

                    $coverpath = base_path() . '/images/profile_image/';

                    $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

                    $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                    // print_r($coverimg_name);die();
                }
            $check = DB::table('users')->where('phone_no',$request->phone_no)->first();
          //  print_r($check); die();

            if(empty($check)){
                $digits = 5;
                //$otp= rand(pow(10, $digits-1), pow(10, $digits)-1);
                $otp='12345';
                $setdata=   array(

                        'name'=>  $request->name,
                        'user_type'=>  $request->user_type,
                        'email'=>  $request->email_id,
                        'phone_no'=>  $request->phone_no,
                        'address'=>  $request->address,
                        'category_id'=>$request->category_id,
                        'user_expertise'=>  $request->user_expertise,
                        'user_experience'=>  $request->user_experience,
                        'remember_token'=>  $request->device_id,
                        'device_id'=>  $request->device_token,
                        'user_experience'=>  $request->user_experience,
                        'user_language'=>  $request->user_language,
                        'user_aboutus'=>  $request->user_aboutus,
                        'user_aboutus'=>  $request->user_aboutus,
                        'user_avability'=>  $request->user_avability,
                        'user_education'=>  $request->user_education,
                        'gender'=>  $request->gender,
                        'created_at'=>$current_date,
                        'profile_image'=>  $coverimg_name,
                        'per_minute'=>$request->per_minute,
                        'password'=>  Hash::make($request->password),
                        'status'=>0,
                        'otp'=>$otp,
                                //'remember_token'                =>  Hash::make(uniqid()),
                              /*  'country'                => $request->country,
                                'zipcode'                => $request->zipcode,
                                'city'                => $request->city,  */

                            );

                $otp_msg="Thankyou for registration ,Please use Your otp is".$otp;
                $resultlastid = DB::table('users')->insertGetId($setdata);
                $id="$resultlastid";
                $data['status'] = "true";
                $data['message'] = "Registration successfully,send otp your registered number please check and verify account";
                $data['user_id'] =$id;
                $data['user_name'] =$setdata['name'];
                $data['user_type'] =$setdata['user_type'];
                $data['email'] =$setdata['email'];
                $data['otp'] =$setdata['otp'];
                $data['address'] =$setdata['address'];
                $data['device_id'] =$setdata['device_id'];

            }else{

                $data['status'] = "false";
                $data['message'] = "This Phone Number already exist";

            }
        }
        echo json_encode($data);
    }







public function registration(Request $request)
    {

         date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
         $current_date=date('y-m-d H:i:s');

         //echo $date;die;
         $validator = Validator::make($request->all(), [
            'name'          =>  'required',
            'email_id'      =>  'required|email',
            'phone_no'      =>  'required|numeric|digits_between:1,10',
            'password'      =>  'required|min:6',
            'dob'           =>  'required',
            'birth_time'          =>  'required',
            'birth_place'     =>  'required',
            'device_id'     =>  'required',
            'user_type'     =>  'required',
            'address'     =>  'required',

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

        }else{

            $check = DB::table('users')->where('phone_no',$request->phone_no)->first();
          //  print_r($check); die();

            if(empty($check)){
                $digits = 5;
                $otp= rand(pow(10, $digits-1), pow(10, $digits)-1);
               // $otp='12345';
                $setdata=   array(

                                'name'                     =>  $request->name,
                                'user_type'                 =>  $request->user_type,
                                'email'                    =>  $request->email_id,
                                'phone_no'                    =>  $request->phone_no,
                                'dob'                    =>  $request->dob,
                                'birth_time'        =>        $request->birth_time,
                                'birth_place'      =>  $request->birth_place,
                                'address'                  =>  $request->address,
                                'remember_token'     =>  $request->device_id,
                                'device_id'                  =>  $request->device_token,
                                 'created_at'=>$current_date,
                                'password'                 =>  Hash::make($request->password),
                                'otp'=>$otp,
                                //'remember_token'                =>  Hash::make(uniqid()),
                              /*  'country'                => $request->country,
                                'zipcode'                => $request->zipcode,
                                'city'                => $request->city,  */

                            );

                $otp_msg="Thankyou for registration ,Please use Your otp is".$otp;
                $resultlastid = DB::table('users')->insertGetId($setdata);
                $id="$resultlastid";
                $data['status'] = "true";
                $data['message'] = "Registration successfully,send otp your registered number please check and verify account";
                $data['user_id'] =$id;
                $data['user_name'] =$setdata['name'];
                $data['user_type'] =$setdata['user_type'];
                $data['email'] =$setdata['email'];
                $data['otp'] =$setdata['otp'];
                $data['address'] =$setdata['address'];
                $data['device_id'] =$setdata['device_id'];
                
                $msgs=$otp.' is your verification code';
             //   Sendotp($request->device_token,$msgs);
            

            }else{

                $data['status'] = "false";
                $data['message'] = "This Phone Number already exist";

            }
        }
        echo json_encode($data);
    }


    public function feedback(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name'          =>  'required',
          //  'email'      =>  'required|email',
            'phone'      =>  'required|numeric|digits_between:1,10',
            'user_id'     =>  'required',
            'message'     =>  'required',
            'device_id'     =>  'required',
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

        }else{

        $checkuser = DB::table('users')->where('id',$request->user_id)->first();

        if($checkuser)
        {
            $setdata=   array(

                                'name'                     =>  $request->name,
                                'user_id'                 =>  $request->user_id,
                                'email'                    =>  $request->email,
                                'phone'                    =>  $request->phone,
                                'message'                    =>  $request->message,
                                'user_rating'                    =>  $request->user_rating,

                            );


                $resultlastid = DB::table('feedback')->insertGetId($setdata);

                if($resultlastid){
                $data['status'] = "true";
                $data['user_id'] =$resultlastid;
                $data['user_name'] =$setdata['name'];
                $data['user_id'] =$setdata['user_id'];
                $data['email'] =$setdata['email'];
                $data['rply'] =$setdata['message'];
                $data['message'] ='Your Feedback sent to successfully';
                }else
                {

            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Something went wrong";
                }


        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }
        echo json_encode($data);
    }

}




public function send_redmis_to_customer(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id'     =>  'required',
            'astro_id'=>'required',
            'message'     =>  'required',
            
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

        }else{

       
                              $setdata=   array(
                                 'user_id'                 =>  $request->user_id,
                                'astro_id'                    =>  $request->astro_id,
                                'message'                    =>  $request->message,
                               
                            );


                $resultlastid = DB::table('add_remedy')->insertGetId($setdata);

                if($resultlastid){
                $data['status'] = "true";
                $data['user_id'] =$setdata['user_id'];
                $data['rply'] =$setdata['message'];
                $data['message'] ='Your redmey added to successfully';
                }else
                {

            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Something went wrong";
                }


        echo json_encode($data);
    }

}


public function add_remedy(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id'     =>  'required',
            'astro_id'=>'required',
            'message'     =>  'required',
            
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

        }else{

       
                              $setdata=   array(
                                 'user_id'                 =>  $request->user_id,
                                'astro_id'                    =>  $request->astro_id,
                                'message'                    =>  $request->message,
                               
                            );


                $resultlastid = DB::table('add_remedy')->insertGetId($setdata);

                if($resultlastid){
                $data['status'] = "true";
                $data['user_id'] =$setdata['user_id'];
                $data['rply'] =$setdata['message'];
                $data['message'] ='Your redmey added to successfully';
                }else
                {

            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Something went wrong";
                }


        echo json_encode($data);
    }

}






public function call_check(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
           'device_id'          =>  'required',
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

        }else{


        $checkuser = DB::table('users')->where('id',$request->user_id)->first();

        if($checkuser)
        {
            $msgs=$request->msg;
            $datas=$this->sendNotification($request->device_id,$msgs);



                $data['status'] = "true";
                $data['message'] =$msgs;



        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "No Call  Check";

        }
        echo json_encode($data);
    }

}

public function view_call_chat(Request $request)
    {
         $validator = Validator::make($request->all(), [
           // 'user_id'          =>  'required',
           'sender_id'          =>  'required',
           'receiver_id'          =>  'required',
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

        }else{

  //DB::connection()->enableQueryLog();
        $checkuser = DB::table('chat')->where('sender_id',$request->sender_id)->where('receiver_id',$request->receiver_id)->orWhere('sender_id',$request->receiver_id)->where('receiver_id',$request->sender_id)->get();


   $queries = DB::getQueryLog();
/*print_r($queries);
die;*/


      $countUser = count($checkuser);
      if($countUser>0)
        {

                $data['data'] = $checkuser;
                $data['status'] = "true";
                $data['message'] ="All Chat Found";



        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "No Chat Found";

        }
        echo json_encode($data);
    }

}



 public function add_call_chat(Request $request)
    {
         $validator = Validator::make($request->all(), [
           'sender_id'         =>  'required',
           'receiver_id'        =>  'required',
           'message'            =>  'required',
           'device_id'          =>  'required',
           'user_id'            =>  'required',
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

        }else{


       // $checkuser = DB::table('users')->where('id',$request->user_id)->first();
	    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $time =  date('H:i:s');



	    $result = DB::table('chat')->insert(
                array(
                'sender_id'   =>   $request->sender_id,
                'receiver_id' =>   $request->receiver_id,
                'message'     =>   $request->message,
                'device_id'   =>   $request->device_id,
                'user_id'     =>   $request->user_id,
                'sent_date'   =>   date('Y-m-d'),
                'sent_time'   =>   $time,
                )
        );

        if($result)
        {
            $msgs="$request->message";
            $datas=$this->sendNotification($request->device_id,$msgs);

                $data['status'] = "true";
                $data['message'] =$msgs;



        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Chat Not Added";

        }
        echo json_encode($data);
    }

}



public function add_kundli(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'generate_kundli_image'      =>  'required',

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

        }else{

        /*$checkuser = DB::table('users')->where('id',$request->user_id)->where('remember_token',$request->device_id)->first();

        if($checkuser)
        {*/

            $method=$request->payment_method;
            $setdata=   array(

                                'user_id'                     =>  $request->user_id,
                                'generate_kundli_image'       => $request->generate_kundli_image,
                                'kundli_user_name'            => $request->kundli_user_name,
                                'birthday_year'                 => $request->birthday_year,
                                'birth_day'                  => $request->birth_day,
                                'birth_month'                 => $request->birth_month,
                                'birth_time'                         => $request->birth_time,
                                'birth_place'                        => $request->birth_place,
                                'birth_time_mintus'                   => $request->birth_time_mintus,
                                'birth_time_hrs'                   => $request->birth_time_hrs,
                                'lat'                   => $request->lat,
                                'long'                   => $request->long,
                                'time_zone'                   => $request->time_zone,
                                'birth_time_mintus'                   => $request->birth_time_mintus,
                             );

                           //print_r($setdata);die;


                $resultlastid = DB::table('kundli')->insertGetId($setdata);

                if($resultlastid){
                $data['status'] = "true";
                $data['message'] ='Your Kundli added sucessfully';
                }else
                {

            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Something went wrong";
                }


       /* }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }*/
        echo json_encode($data);
    }

}



public function add_wallet_amt(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'payment_method'      =>  'required',
           // 'payment_status'      =>  'required',
            'wallet_amount'     =>  'required',
            'trancation_id'     =>  'required',
            'device_id'     =>  'required',

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

        }else{

        $checkuser = DB::table('users')->where('id',$request->user_id)->get();
        if($checkuser)
        {
         $wallet_system = DB::table('wallet_system')->where('user_id',$request->user_id)->get();
         $wallet_system_check=count($wallet_system);
         if($wallet_system_check > 0 ){
            // $avble_bal= $wallet_system[0]->wallet_amount;
            // $new_bal=$request->wallet_amount;
            // $total_bal=$avble_bal + $new_bal;
            // $setdata['wallet_amount']=  $total_bal;
            // $result = DB::table('wallet_system')->where('user_id',$request->user_id)->update($setdata);
            //  $data['status'] = "true";
            //  $data['user_id'] =$request->user_id;
            //  $data['wallet_amount'] =$total_bal;
            //  $data['message'] ='Your Wallet amount udapted sucessfully';
            $method=$request->payment_method;
            $setdata=   array(
            'user_id'=>  $request->user_id,
            'payment_method'=> $request->payment_method,
            'payment_status'=>  $request->payment_status,
            'wallet_amount'=>  $request->wallet_amount,
            'trancation_id'=>  $request->trancation_id,
            'status'=>  1,);
               $resultlastid = DB::table('wallet_system')->insertGetId($setdata);
               $data['status'] = "true";
               $data['user_id'] =$request->user_id;
               $data['wallet_amount'] =$request->wallet_amount;
               $data['message'] ='Your Wallet amount added sucessfully';
         }else{
             $method=$request->payment_method;
             $setdata=   array(
             'user_id'=>  $request->user_id,
             'payment_method'=> $request->payment_method,
             'payment_status'=>  $request->payment_status,
             'wallet_amount'=>  $request->wallet_amount,
             'trancation_id'=>  $request->trancation_id,
             'status'=>  1,);
                $resultlastid = DB::table('wallet_system')->insertGetId($setdata);
                $data['status'] = "true";
                $data['user_id'] =$request->user_id;
                $data['wallet_amount'] =$request->wallet_amount;
                $data['message'] ='Your Wallet amount added sucessfully';
         }
             
         }else{
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "User does not exist";
                
         }

       
        echo json_encode($data);
    }

}




 public function add_wallet_amt_old(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'payment_method'      =>  'required',
           // 'payment_status'      =>  'required',
            'wallet_amount'     =>  'required',
            'trancation_id'     =>  'required',
            'device_id'     =>  'required',

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

        }else{

        $checkuser = DB::table('users')->where('id',$request->user_id)->get();
        if($checkuser)
        {
         $wallet_system = DB::table('wallet_system')->where('user_id',$request->user_id)->get();
         $wallet_system_check=count($wallet_system);
         if($wallet_system_check > 0 ){
            $avble_bal= $wallet_system[0]->wallet_amount;
            $new_bal=$request->wallet_amount;
            $total_bal=$avble_bal + $new_bal;
            $setdata['wallet_amount']=  $total_bal;
            $result = DB::table('wallet_system')->where('user_id',$request->user_id)->update($setdata);
             $data['status'] = "true";
             $data['user_id'] =$request->user_id;
             $data['wallet_amount'] =$total_bal;
             $data['message'] ='Your Wallet amount udapted sucessfully';
         }else{
             $method=$request->payment_method;
             $setdata=   array(
             'user_id'=>  $request->user_id,
             'payment_method'=> $request->payment_method,
             'payment_status'=>  $request->payment_status,
             'wallet_amount'=>  $request->wallet_amount,
             'trancation_id'=>  $request->trancation_id,
             'status'=>  1,);
                $resultlastid = DB::table('wallet_system')->insertGetId($setdata);
                $data['status'] = "true";
                $data['user_id'] =$request->user_id;
                $data['wallet_amount'] =$request->wallet_amount;
                $data['message'] ='Your Wallet amount added sucessfully';
         }
             
         }else{
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "User does not exist";
                
         }

       
        echo json_encode($data);
    }

}






 public function add_orders(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'email'      =>  'required|email',
            'device_id'     =>  'required',
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

        }else{

        $checkuser = DB::table('users')->where('id',$request->user_id)->first();

        if($checkuser)
        {
            $setdata=   array(

                                'order_id'                     =>  rand().time(),
                                'user_id'                 =>  $request->user_id,
                                'email'                    =>  $request->email,
                                'astrologer_id'                    =>  $request->astrologer_id,
                                'astro_name'                    =>  $request->astro_name,
                                'user_name'                    =>  $request->astro_name,
                                'astrologer_id'                    =>  $request->astrologer_id,
                                'plan_id'                    =>  $request->plan_id,
                                'plan_amount'                    =>  $request->plan_amount,
                                'payment_status'                    =>  $request->payment_status,
                                'invoice_number'                    => 'ASTRO'.rand().$request->user_id ,
                                'payment_method'                    => $request->payment_method,
                                'payment_type'                    => $request->payment_type,
                                'invoice_number'                    => 'ASTRO'.rand().$request->user_id ,
                                'status'                    =>  1,

                            );


                $resultlastid = DB::table('billing_tbl')->insertGetId($setdata);

                if($resultlastid){
                $data['status'] = "true";
                $data['payment_status'] = $request->payment_status;
                $data['user_id'] = $request->user_id;
                $data['astrologer_id'] = $request->astrologer_id;
                $data['message'] ='Your order placed successfully';
                }else
                {

            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Something went wrong";
                }


        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }
        echo json_encode($data);
    }

}


/*public function user_chatlist(Request $request)
    {
        
        
        
    }*/


public function user_chatlist_old_8(Request $request)
    {


          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'device_id'     =>  'required',

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


       $checkuser = DB::table('users')->get();

        if($checkuser)
        {
            
            
             //$coverpath = url . '/images/profile_image/';
            //  $coverpath = url('images/profile_image/').$checkuser->profile_image;
            // $setdata['name']                  =  $checkuser->name;
            // //$setdata['profile_image']              =  $checkuser->profile_image;
            // $setdata['image_url']              =     $coverpath;
            // $setdata['last_message']              =     '-';
              



                $data['data'] =$checkuser;
				$data['status'] = true;
				$data['message'] = "View Data";

        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }

        echo json_encode($data);
        }

    }





/*******************************Registration-END**********************************************************************/
/*******************************UPDATE-PROFILE**********************************************************************/
public function view_users(Request $request)
    {


          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
       //     'device_id'     =>  'required',

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


       $checkuser = DB::table('users')->where('id',$request->user_id)->first();

        if($checkuser)
        {
             //$coverpath = url . '/images/profile_image/';
                $coverpath = url('images/profile_image/').$checkuser->profile_image;
                $setdata['name']                  =  $checkuser->name;
                $setdata['dob']             =         $checkuser->dob;
                $setdata['birth_time']         =  $checkuser->birth_time;
                $setdata['birth_place']          =  $checkuser->birth_place;
                $setdata['user_expertise']          =  $checkuser->user_expertise;
                $setdata['user_experience']          =  $checkuser->user_experience;
                $setdata['user_language']          =  $checkuser->user_language;
                $setdata['user_rating']          =  $checkuser->user_rating;
                $setdata['user_aboutus']          =  $checkuser->user_aboutus;
                $setdata['user_avability']          =  $checkuser->user_avability;
                $setdata['user_education']          =  $checkuser->user_education;
                $setdata['email']          =  $checkuser->email;
                $setdata['phone_no']          =  $checkuser->phone_no;
                $setdata['address']          =  $checkuser->address;
                $setdata['blood_group']          =  $checkuser->blood_group;
                $setdata['gender']          =  $checkuser->gender;
                $setdata['profile_image']              =  $checkuser->profile_image;
                $setdata['image_url']              =     $coverpath;
                $setdata['country']              =      $checkuser->country;
                $setdata['city']              =      $checkuser->city;
                $setdata['zipcode']              =      $checkuser->zipcode;



                $data['data'] =$setdata;
				$data['status'] = true;
				$data['message'] = "View Data";

        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }

        echo json_encode($data);
        }

    }


/***************************************Notification***************************************/




public function view_all_category(Request $request)
    {


          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
           // 'user_id'          =>  'required',
          //  'device_id'     =>  'required',

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

       $checkuser = DB::table('category')->get();
	    if($checkuser)
        {

        $data['data'] = $checkuser;
		$data['status'] = true;
		$data['message'] = "All category";

        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found";

        }

        echo json_encode($data);
        }

    }


public function view_notfication(Request $request)
    {


          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
          //  'device_id'     =>  'required',

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

       $checkuser = DB::table('users')->get();
	    if($checkuser)
        {

        //$notification = DB::table('notification')->orderBy('id', 'DESC')->get();
        //print_r($notification);die;
        $notification=DB::table('notification')->where('user_id',$request->user_id)->orWhere('type','ALL')->orderBy('id', 'DESC')->get();
        if($notification){
        $data['data'] = $notification;
		$data['status'] = true;
		$data['message'] = "All user notification";
        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found enterd user id";

        }

        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }

        echo json_encode($data);
        }

    }




    public function view_plan(Request $request)
    {


          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            //'user_id'          =>  'required',
          //  'device_id'     =>  'required',

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


       $checkuser = DB::table('users')->get();
	    if($checkuser)
        {

        $notification = DB::table('plan')->orderBy('id', 'DESC')->get();
        //print_r($notification);die;
        if($notification){
        $data['data'] = $notification;
		$data['status'] = true;
		$data['message'] = "All plan";
        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found enterd user id";

        }




        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }

        echo json_encode($data);
        }

    }


  public function view_kundli(Request $request)
    {


          $validator = Validator::make($request->all(), [
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

  $notification = DB::table('kundli')
       ->select('kundli.*',DB::raw('CONCAT("http://md-54.whb.tempwebhost.net/~democdyb/astrologer/astrofeed/", "", generate_kundli_image) AS kundli_url'))
       ->where('user_id',$request->user_id)->get();
	    if($notification)
        {

        //print_r(COUNT($notification));die;
        if(COUNT($notification) > 0){
        $data['data'] = $notification;
		$data['status'] = true;
		$data['message'] = "All Kundli View Successfully";
        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found enterd user id";

        }




        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }

        echo json_encode($data);
        }

    }
    
    
    public function call_by_kundali(Request $request)
    {
        
        //echo "f";die;
        $users = DB::table('users')->where('id',$request->astro_id)->orderBy('id', 'DESC')->first();
        $device_id= $users->device_id;
      //print_r($users);die;
          //$kundali = DB::table('users')->where('id',$request->user_id)->orderBy('id', 'DESC')->first();
          $validator = Validator::make($request->all(), [
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


       $notification = DB::table('kundli')->where('user_id',$request->user_id)->limit(1)->orderBy('id', 'DESC')->first();
      // print_r($notification);die;
       //echo $notification->id;die;
       
       //$generta= 
       

      //	$notification = DB::table('kundlid')
								//	->orderBy('id')
								//	->where('user_id',$request->user_id)
								//	->get();
	    if($notification)
        {

        //print_r(COUNT($notification));die;
        if($notification){
       $datas=$this->sendNotificationCallBYcall($device_id,$notification);
    
           // print_r($datas);die;
        $data['data'] = $notification;
		$data['status'] = true;
		$data['message'] = "User kundali view";
        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found enterd user id";

        }




        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }

        echo json_encode($data);
        }

    }


    public function update_read_status(Request $request)
    {
        
           $setdata['unread_msg']=$request->unread_msg;
           $result = DB::table('chat')->where('id',$request->id)->update($setdata);
                 if($result){
              //  $data['data'] = '';
				$data['status'] = true;
				$data['message'] = "read successfully updated";
                 }else
                 {

               // $data['data'] = '';
				$data['status'] = false;
				$data['message'] = "oops something went wrong";
                 }
echo json_encode($data);
    }

   public function view_wallet_bal(Request $request)
    {


          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
         //   'device_id'     =>  'required',

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


        $checkuser = DB::table('users')->where('id',$request->user_id)->first();
      //  print_r($checkuser);die;
	    if($checkuser)
        {
            //echo $request->user_type;die;
        if($request->user_type==1){    
         
        $Amount = DB::table('wallet_system')->where('user_id',$request->user_id)->sum('wallet_amount');
        //print_r($Amount);die;
        if($Amount){
        $data['Amount'] = $Amount;
        $data['status'] = true;
		$data['message'] = "All Wallet Amount data";
        }
    }else{

        $Amount = DB::table('payments')->where('astro_id',$request->user_id)->sum('wallet_amount');
        $data['Amount'] = $Amount;
        $data['status'] = true;
		$data['message'] = "All Wallet Amount data";


    }
 } else
        {
                //$data['data'] = 'Does not data found';
				$data['status'] = true;
				$data['Amount'] = 0;
				$data['message'] = "No data found enterd user id";

        }


        echo json_encode($data);
        }

    }

public function wallet_amount_deduct(Request $request)
    {
          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'current_used_bal'     =>  'required',

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
            $wallet_system = DB::table('wallet_system')->where('user_id',$request->user_id)->get();
         $wallet_system_check=count($wallet_system);
         if($wallet_system_check > 0 ){
            $avble_bal= $wallet_system[0]->wallet_amount;
            $new_bal=$request->current_used_bal;
            $total_bal=$avble_bal - $new_bal;
            $setdata['wallet_amount']=  $total_bal;
            $result = DB::table('wallet_system')->where('user_id',$request->user_id)->update($setdata);
             $data['status'] = "true";
             $data['user_id'] =$request->user_id;
             $data['wallet_amount'] =$total_bal;
             $data['message'] ='Your Wallet amount udapted sucessfully';
           
        }else{
             $data['status'] = "true";
             $data['user_id'] =$request->user_id;
             $data['wallet_amount'] =$total_bal;
             $data['message'] ='No credits in your wallet';
        }
        
         echo json_encode($data);
    }

}

/*********************************************************************/

public function view_orders(Request $request)
    {


          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'device_id'     =>  'required',

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


       $checkuser = DB::table('users')->where('id',$request->user_id)->first();
	    if($checkuser)
        {

        $orders = DB::table('billing_tbl')->where('user_id',$request->user_id)->get();
        //print_r($notification);die;
        if($orders){
        $data['data'] = $orders;
		$data['status'] = true;
		$data['message'] = "All orders";
        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found enterd user id";

        }




        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }

        echo json_encode($data);
        }

    }
/********************************************************************************************************/


 public function edit_user(Request $request)
    {


          $coverimg_name = '';
          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'device_id'     =>  'required',

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


       $checkuser = DB::table('users')->where('id',$request->user_id)->first();

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



               /* $setdata['user_expertise']          =  $request->user_expertise;
                $setdata['user_experience']          =  $request->user_experience;
                $setdata['user_language']          =  $request->user_language;
                $setdata['user_rating']          =  $request->user_rating;
                $setdata['user_aboutus']          =  $request->user_aboutus;
                $setdata['user_avability']          =  $request->user_avability;
                $setdata['user_education']          =  $request->user_education;*/
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
 /*******************************UPDATE-PROFILE-END*******************************************************************/

 /*******************************Otp-Verify*******************************************************************/


public function otp_verify(Request $request)
    {


         $coverimg_name = '';
         $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'otp'     =>  'required',
            'device_token'     =>  'required',

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
        else
        {

               $checkuser = DB::table('users')->where('id',$request->user_id)->where('device_id',$request->device_token)->first();
               if($checkuser)
                {

                $checkotps = DB::table('users')->where('otp',$request->otp)->first();
                if(empty($checkotps)){
                $data['data'] = '';
				$data['status'] = true;
				$data['message'] = "Otp does not matched";
                }else
                {
                 $setdata['otp_verify'] =  1;
                $result = DB::table('users')->where('id',$request->user_id)->update($setdata);

                $data['data'] = '';
				$data['status'] = true;
				$data['message'] = "Otp successfully verified";

                }


           }else
           {
                $data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Your user id or token does not matched";

           }
    }

        echo json_encode($data);

}





public function otp_mobile_verify(Request $request)
    {


         $coverimg_name = '';
         $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
            'otp'     =>  'required',
            //'device_token'     =>  'required',

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
        else
        {

               $checkuser = DB::table('users')->where('id',$request->user_id)->first();
               if($checkuser)
                {

                $checkotps = DB::table('password_resets')->where('otp',$request->otp)->first();
                if(empty($checkotps)){
                $data['data'] = '';
				$data['status'] = true;
				$data['message'] = "Otp does not matched";
                }else
                {
                 $setdata['otp_verify_status'] =  1;

                 $result = DB::table('password_resets')->where('user_id',$request->user_id)->update($setdata);
                 if($result){
                $data['data'] = '';
				$data['status'] = true;
				$data['message'] = "Otp successfully verified";
                 }else
                 {

                $data['data'] = '';
				$data['status'] = true;
				$data['message'] = "Your otp expaired";
                 }

                }


           }else
           {
                $data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Your user id or token does not matched";

           }
    }

        echo json_encode($data);

}




public function forgot(Request $request) {

            $mobile   = $request->mobile;
            $validator = Validator::make($request->all(), [
            'mobile'     => 'required',
            'device_token'     => 'required',
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
            $checkuser = DB::table('users')->where('phone_no', $mobile)->first();
            //print_r($checkuser);die;

            if(empty($checkuser)){

                $data['status'] = "false";
                $data['message'] = "User does not exist";
            }else{

                   $digits = 5;
                //$otp= rand(pow(10, $digits-1), pow(10, $digits)-1);
                $otp='12345';
                $val=DB::table('password_resets')->insert([
                                'email' => $mobile,
                                'otp' => $otp,
                                'user_id' =>  $checkuser->id,
                                'token' =>Hash::make(uniqid()),
                            ]);




                                     $data['status'] = "true";
                                     $data['otp'] = $otp;
                                     $data['user_id'] = $checkuser->id;
                                     $data['message'] = "Otp send your registered number";
                               // $msg='Your OTP Is 78888';
                                //$this->sendResetEmail($mobile,$msg);
                               /* if($this->sendResetEmail($mobile,$msg))
                                {
                                     $data['status'] = "true";
                                     $data['message'] = "Otp send your registered number";
                                }*/

                               // print_r($tokenData);die;

                             /*   if ($this->sendResetEmail($email, $tokenData->token)) {
                                     $data['status'] = "true";
                                     $data['message'] = "A reset link has been sent to your email address.";

                                } else {
                                     $data['status'] = "true";
                                    $data['message'] = "A Network Error occurred. Please try again.";

                                    }*/


        }
            }
             return response()->json($data, 200);
 }


/***************************************Astrology list**************************************************************/

public function astrologer_list(Request $request){


           /* $validator = Validator::make($request->all(), [
            'device_token'     => 'required',
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

        } else{*/
        $limit=$request->limit;
        $offset=$request->offset;
        $filter_params=$request->category_id;
        $language=$request->language;
        $gender= $request->gender;
        $offers= $request->offers;
        $category_id= $request->category_id;
        
//         $letAndParams;
//         if($language!="" && $gender!="" && $offers!="" && $category_id!="")
//         {
        
//         if($request->category_id==0){
//       // $letAndParams='AND';
//       //->whereRaw("find_in_set('laravel',tags)")
//         	$checkuser = DB::table('users')
//         ->select('usersl.*',DB::raw('CONCAT("http://md-54.whb.tempwebhost.net/~democdyb/astrologer/images/profile_image/", "", profile_image) AS image_url'))

//         ->where('user_type',$request->user_type)->where('offers',$request->offers)->whereRaw("find_in_set"($gender, gender))->whereRaw("find_in_set"($language, user_language))->take($limit)->skip($offset)->orderBy('id', 'DESC')->get();
            
//         }
            
//         }else 
//         if($language=="" || $gender=="" || $offers=="" || $category_id==""){
            
          


            
// //             $searchvalue = 'css';
// // $query = DB::table('tags_value')
// //     ->whereRaw('FIND_IN_SET(?, Tags)', [$searchvalue])
// //     ->get();
    
            
//           /* $data = DB::table("articles")
//       ->select("*")
//       ->whereRaw("find_in_set('php',tags)")
//       ->get();*/
            
//         //     $query = DB::table('users')
//         //  ->WHERE CONCAT(",", `user_language`, ",") REGEXP ",(val1|val2|val3)"
//         //  ->get();
         
//         //  print_r($query);die;
//              // $letAndParams='AND';
//         // 	$checkuser = DB::table('users')
//         // ->select('users.*',DB::raw('CONCAT("http://md-54.whb.tempwebhost.net/~democdyb/astrologer/images/profile_image/", "", profile_image) AS image_url'))

//         // ->where('user_type',$request->user_type)->where('offers',$request->offers)->whereRaw("find_in_set"($gender, gender))->whereRaw("find_in_set"($language, user_language))->take($limit)->skip($offset)->orderBy('id', 'DESC')->get();
//         }
        
        
       // echo $letAndParams;die;
        //print_r($letAndParams)
        
        
        
        
        if($request->category_id==0){
          //  $filter_params='';
              	$checkuser = DB::table('users')
        ->select('users.*',DB::raw('CONCAT("https://collabdoor.com/astrology/images/profile_image/", "", profile_image) AS image_url'))

        ->where('user_type',$request->user_type)->take($limit)->skip($offset)->orderBy('id', 'DESC')->get();
        }else{
         //  $filter_params= $request->category_id;
            	$checkuser = DB::table('users')
        ->select('users.*',DB::raw('CONCAT("https://collabdoor.com/astrology/images/profile_image/", "", profile_image) AS image_url'))

        ->where('user_type',$request->user_type)->where('category_id',$request->category_id)->take($limit)->skip($offset)->orderBy('id', 'DESC')->get();  
        }
       //	$checkuser = DB::table('users')->where('user_type',$request->user_type)->limit(10)->offset()->orderBy('id', 'DESC')->get();
     




//print_r($checkuser);die;
		if(!empty($checkuser)){
		  unset($checkuser->password);

		   	    if($request->user_type==1)
		   	    {
		   	       $data['list'] = $checkuser;

		   	    }else
		   	    {
		   	      $data['list'] = $checkuser;

		   	    }

				$data['status'] = "true";
				$data['message'] = "success";
			}else{
				$data['status'] = "false";
				$data['message'] = "Not found data";
			}


        return response()->json($data, 200);
    }




public function astro_gallery(Request $request)
{
  $id=$request->id;

  $data['gallery']=DB::table('astro_gallery')
  ->select('astro_gallery.*',DB::raw('CONCAT("https://collabdoor.com/astrology/images/astro_gallery", "", image) AS image_url'))
  ->where('userid',$id)->get();
  if($data['gallery'])
  {

      $data['status'] = "true";
      $data['message'] = "Not found data";
  }
  else {

      $data['status'] = "false";
      $data['message'] = "success";
  }


  return response()->json($data, 200);

}



 private function sendResetEmail($email, $token)
    {

         Mail::send('emails.cancelOrder', array('key' => 'value'), function ($message)
        {
            $message->from('appmactosys@gmail.com');
            $message->to('appmactosys@gmail.com', 'John Smith')->subject('Welcome!');
        });

        /*$base_url="http://tenspark.com/astrologer/api/";
        $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();
        $link =  $base_url . 'password/reset' .'?token_id='. $token . '&email=' . urlencode($user->email);
        try {
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
            }*/


}



    public function users_registration(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name'          =>  'required',
            'username'      =>  'required',
            'ownername'     =>  'required',
            'email_id'      =>  'required|email',
            'phone_no'      =>  'required|numeric|digits_between:1,10',
            'address'       =>  'required',
            // 'website'       =>  'required',
            'password'      =>  'required|min:6',
            'bio'           =>  'required',
            'logo'          =>  'required',
            'cover_img'     =>  'required',
            'doc_type'      =>  'required',
            'auth_doc'      =>  'required',
            'shelf_doc'     =>  'required',
            'country'       =>  'required',
            'country_code'  =>  'required',
            'city'          =>  'required',
            'main_activity' =>  'required',
            'sub_activity'  =>  'required',
            'creation_date' =>  'required',
            // 'establish_date'=>  'required',
            'expiry_date'   =>  'required',
            'device_id'     =>  'required',
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

        }else{
	// print_r($_POST);print_r($_FILES);die;
            $check = DB::table('business')->where('business_email',$request->email_id)->first();
            if(empty($check)){
                $logofile = $request->logo;
                $Logopath = base_path() . '/images/business_logo/';
                $logofile->move($Logopath,  '/'.time().$logofile->getClientOriginalName());
                $logo_name = '/'.time().$logofile->getClientOriginalName();
                $coverfile = $request->cover_img;
                $coverpath = base_path() . '/images/cover_img/';
                $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());
                $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                $shelfdoc = $request->shelf_doc;
                $shelfdocpath = base_path() . '/images/shelf_doc/';
                $shelfdoc->move($shelfdocpath,  '/'.time().$shelfdoc->getClientOriginalName());
                $shelfdocname = '/'.time().$shelfdoc->getClientOriginalName();

                $setdata=   array(

                                'business_name'                     =>  $request->name,
                                'business_username'                 =>  $request->username,
                                'business_owner'                    =>  $request->ownername,
                                // 'BID'                               =>  $request->bid,
                                'business_email'                    =>  $request->email_id,
                                'business_main_phone_number'        =>  $request->phone_no,
                                'business_address'                  =>  $request->address,
                                // 'business_lat'                      => $request->lat,
                                // 'business_lng'                      => $request->lng,
                                // 'business_web_site'                 => $request->website,
                                'business_password'                 =>  Hash::make($request->password),
                                'business_account_status'           =>  true,
                                'business_bio'                      =>  $request->bio,
                                'business_logo'                     =>  $logo_name,
                                'business_cover_image'              =>  $coverimg_name,
                                'doc_type'                          =>  $request->doc_type,
                                // 'authentic_doc'                     =>  $auth_docname,
                                'shelf_doc'                         =>  $shelfdocname,
                                'business_country'                  =>  $request->country,
                                'business_country_code'             =>  $request->country_code,
                                'business_city'                     =>  $request->city,
                                'business_main_activity_id'         =>  $request->main_activity,
                                'business_sub_activity_id'          =>  $request->sub_activity,
                                'business_creation_date'            =>  $request->creation_date,
                                // 'business_subscriptions_renew_date' =>  $request->establish_date,
                                'business_exp_date'                 =>  $request->expiry_date,
                                'token_id'                         	=>  Hash::make(uniqid()),

                            );
                    $resultlastid = DB::table('business')->insertGetId($setdata);
                    // Mail::send("ok", $data, $callback);die;
                    $authdocfile = $request->auth_doc;
                    foreach($authdocfile as $key => $audoc){

                        $authPath = base_path() . '/images/auth_doc/';
                        $audoc->move($authPath,  '/'.time().$audoc->getClientOriginalName());
                        $multi_doc = '/'.time().$audoc->getClientOriginalName();
                        $result = DB::table('authentication_doc')->insert(['business_uni_id'=>$resultlastid,'document_url'=>$multi_doc]);

                    }
                $data['status'] = "true";
                $data['message'] = "Registration successfully";

            }else{

                $data['status'] = "false";
                $data['message'] = "duplicate entry";

            }
        }
        echo json_encode($data);
    }











    public function edit_users(Request $request)
    {


        $checkuser = DB::table('user')->where('id',$request->user_id)->first();
        $logo_name = '';
        $coverimg_name = '';
        $shelfdocname = '';
        $logo_name = '';


		if(!empty($checkuser)){
         $validator = Validator::make($request->all(), [
            'name'          =>  'required',
            'username'      =>  'required',
            'ownername'     =>  'required',
            'email_id'      =>  'required|email',
            'phone_no'      =>  'required|numeric|digits_between:1,10',
            'address'       =>  'required',
            // 'website'       =>  'required',
            'password'      =>  'required|min:6',
            'bio'           =>  'required',
            'doc_type'      =>  'required',
            'country'       =>  'required',
            'country_code'  =>  'required',
            'city'          =>  'required',
            'main_activity' =>  'required',
            'sub_activity'  =>  'required',
            'creation_date' =>  'required',
            // 'establish_date'=>  'required',
            'expiry_date'   =>  'required',
            'device_id'     =>  'required',
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

        }else{
	// print_r($_POST);print_r($_FILES);die;

                if($request->logo!=''){
                    $logofile = $request->logo;
                    $Logopath = base_path() . '/images/business_logo/';
                    $logofile->move($Logopath,  '/'.time().$logofile->getClientOriginalName());
                    $logo_name = '/'.time().$logofile->getClientOriginalName();
                }
                if($request->cover_img!=''){
                    $coverfile = $request->cover_img;
                    $coverpath = base_path() . '/images/cover_img/';
                    $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());
                    $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                }
                if($request->shelf_doc!=''){
                    $shelfdoc = $request->shelf_doc;
                    $shelfdocpath = base_path() . '/images/shelf_doc/';
                    $shelfdoc->move($shelfdocpath,  '/'.time().$shelfdoc->getClientOriginalName());
                    $shelfdocname = '/'.time().$shelfdoc->getClientOriginalName();
                }
                $setdata['business_name']                     =  $request->name;
                $setdata['business_username']                 =  $request->username;
                $setdata['business_owner']                    =  $request->ownername;
                $setdata['business_email']                    =  $request->email_id;
                $setdata['business_main_phone_number']        =  $request->phone_no;
                $setdata['business_address']                  =  $request->address;
                $setdata['business_password']                 =  Hash::make($request->password);
                $setdata['business_account_status']           =  true;
                $setdata['business_bio']                      =  $request->bio;
                if($logo_name!=''){
                    $setdata['business_logo']                     =  $logo_name;
                }
                if($coverimg_name){
                    $setdata['business_cover_image']              =  $coverimg_name;
                }
                $setdata['doc_type']                          =  $request->doc_type;
                // $setdata['authentic_doc']                     =  $auth_docname;
                if($shelfdocname){
                    $setdata['shelf_doc']                         =  $shelfdocname;
                }
                $setdata['business_country']                  =  $request->country;
                $setdata['business_country_code']             =  $request->country_code;
                $setdata['business_city']                     =  $request->city;
                $setdata['business_main_activity_id']         =  $request->main_activity;
                $setdata['business_sub_activity_id']          =  $request->sub_activity;
                $setdata['business_creation_date']            =  $request->creation_date;
                // $setdata['business_subscriptions_renew_date'] =  $request->establish_date;
                $setdata['business_exp_date']                 =  $request->expiry_date;
                $setdata['token_id']                         	=  Hash::make(uniqid());

                $result = DB::table('business')->where('uni_id',$request->user_id)->update($setdata);;
				$results = DB::table('business')->where('uni_id',$request->user_id)->get();
				if($request->auth_doc!=''){
				    DB::table('authentication_doc')->delete(['business_uni_id'=>$request->user_id]);
				    $authdocfile = $request->auth_doc;
    				foreach($authdocfile as $key => $audoc){

    					$authPath = base_path() . '/images/auth_doc/';
    					$audoc->move($authPath,  '/'.time().$audoc->getClientOriginalName());
    					$multi_doc = '/'.time().$audoc->getClientOriginalName();
    					$result = DB::table('authentication_doc')->insert(['business_uni_id'=>$request->user_id,'document_url'=>$multi_doc]);

    				}
				}
				$data['data'] = $results;
				$data['status'] = "true";
				$data['message'] = "User data Updated successfully";



        }
		}else{
				$data['status'] = "false";
				$data['message'] = " User id is not match";
		}
        return response()->json($data, 200);
    }



	public function edit_user_old(Request $request){

		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();

		if(!empty($checkuser)){
		$validator = Validator::make($request->all(), [
			'user_id' => 'required',
			'name'          =>  'required',
            // 'username'      =>  'required',
            // 'ownername'     =>  'required',
            // 'email_id'      =>  'required|email',
            'phone_no'      =>  'required|numeric|digits_between:1,10',
            // 'address'       =>  'required',
            // 'website'       =>  'required',
            // 'password'      =>  'required|min:6',
            'bio'           =>  'required',
            // 'logo'          =>  'required',
            // 'cover_img'     =>  'required',
            // 'doc_type'      =>  'required',
            // 'auth_doc'      =>  'required',
            // 'shelf_doc'     =>  'required',
            // 'country'       =>  'required',
            // 'country_code'  =>  'required',
            // 'city'          =>  'required',
            // 'main_activity' =>  'required',
            // 'sub_activity'  =>  'required',
            // 'creation_date' =>  'required',
            // 'establish_date'=>  'required',
            // 'expiry_date'   =>  'required',
            // 'device_id'     =>  'required',
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
				$check = DB::table('business')->where('uni_id',$request->user_id)->first();



				// if($request->file('logo')){
				// 	$logofile = $request->logo;
				// 	$Logopath= base_path() . '/images/business_logo/';
				// 	$logofile->move($mainimgPath,  '/'.time().$mainimg->getClientOriginalName());
				// 	$logo_name = '/'.time().$mainimg->getClientOriginalName();
				// }else{
				// 	$profile =$check->business_logo;
				// 	$logo_name= $profile;
				// 	}
				// 	if($request->file('cover_img')){
				// 		$coverfile  = $request->cover_img;
				// 		$coverpath = base_path() . '/images/cover_img/';
				// 		$coverfile->move($mainimgPath,  '/'.time().$mainimg->getClientOriginalName());
				// 		$coverimg_name = '/'.time().$mainimg->getClientOriginalName();
				// 	}else{
				// 		$profile =$check->cover_img;
				// 		$coverimg_name = $profile;
				// 		}
				// 		if($request->file('logo')){
				// 			$shelfdoc = $request->shelf_doc;
                // 			$shelfdocpath = base_path() . '/images/shelf_doc/';
                // 			$shelfdoc->move($shelfdocpath,  '/'.time().$shelfdoc->getClientOriginalName());
                // 			$shelfdocname = '/'.time().$shelfdoc->getClientOriginalName();
				// 		}else{
				// 			$profile =$check->shelf_doc;
				// 			$shelfdocname = $profile;
				// 			}


                // $logofile = $request->logo;
                // $Logopath = base_path() . '/images/business_logo/';
                // $logofile->move($Logopath,  '/'.time().$logofile->getClientOriginalName());
                // $logo_name = '/'.time().$logofile->getClientOriginalName();
                // $coverfile = $request->cover_img;
                // $coverpath = base_path() . '/images/cover_img/';
                // $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());
                // $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                // $shelfdoc = $request->shelf_doc;
                // $shelfdocpath = base_path() . '/images/shelf_doc/';
                // $shelfdoc->move($shelfdocpath,  '/'.time().$shelfdoc->getClientOriginalName());
                // $shelfdocname = '/'.time().$shelfdoc->getClientOriginalName();

                $setdata=   array(

                                'business_name'                     =>  $request->name,
                                // 'business_username'                 =>  $request->username,
                                // 'business_owner'                    =>  $request->ownername,
                                // 'business_email'                    =>  $request->email_id,
                                'business_main_phone_number'        =>  $request->phone_no,
                                // 'business_address'                  =>  $request->address,
                                // 'business_account_status'           =>  true,
                                'business_bio'                      =>  $request->bio,
                                // 'business_logo'                     =>  $logo_name,
                                // 'business_cover_image'              =>  $coverimg_name,
                                // 'doc_type'                          =>  $request->doc_type,
                                // 'shelf_doc'                         =>  $shelfdocname,
                                // 'business_country'                  =>  $request->country,
                                // 'business_country_code'             =>  $request->country_code,
                                // 'business_city'                     =>  $request->city,
                                // 'business_main_activity_id'         =>  $request->main_activity,
                                // 'business_sub_activity_id'          =>  $request->sub_activity,
                                // 'business_creation_date'            =>  $request->creation_date,
                                // 'business_exp_date'                 =>  $request->expiry_date,
                                // 'token_id'                         	=>  Hash::make(uniqid()),

                            );
							$result = DB::table('business')->where('uni_id',$request->user_id)->update($setdata);;
							$results = DB::table('business')->where('uni_id',$request->user_id)->get();

							// $authdocfile = $request->auth_doc;
							// foreach($authdocfile as $key => $audoc){

							// 	$authPath = base_path() . '/images/auth_doc/';
							// 	$audoc->move($authPath,  '/'.time().$audoc->getClientOriginalName());
							// 	$multi_doc = '/'.time().$audoc->getClientOriginalName();
							// 	$result = DB::table('authentication_doc')->insert(['business_uni_id'=>$request->user_id,'document_url'=>$multi_doc]);

							// }
							$data['data'] = $results;
							$data['status'] = "true";
							$data['message'] = "User data Updated successfully";


					}

				}else{
						$data['status'] = "false";
						$data['message'] = " User id is not match";
				}
				echo json_encode($data);

	}

    public function sendmeail(){

		$data['from'] =  "appmactosys@gmail.com";
		$data['to']     =  'appmactosys@gmail.com';
		$data['subject']  =   "check mail";
		$data['message']  =  'hello mail is running';

        // $data = "hellp mail is running";
        Mail::send("ok", $data, "mail complete");
        // $data['status'] = "true";
        // $data['message'] = "Registration successfully";
    }

    public function add_product(Request $request){


		$check = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();
		if(!empty($check)){
			$validator = Validator::make($request->all(), [
				'user_id'       =>  'required',
				'tokenid'       =>  'required',
				'seller_type'   =>  'required',
				'english_name'  =>  'required',
				'arabic_name'   =>  'required',
				'category'      =>  'required',
				'sub_category'  =>  'required',
				'description'   =>  'required',
				'product_mainimg' =>  'required',
				// 'product_image' =>  'required',

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
				if($request->product_mainimg){

					$mainimg = $request->product_mainimg;
					$mainimgPath = base_path() . '/images/product_img/';
					$mainimg->move($mainimgPath,  '/'.time().$mainimg->getClientOriginalName());
					$mainimg = '/'.time().$mainimg->getClientOriginalName();
					$setdata=   array(

									// 'BID'                       =>  $request->bid,
									// 'hs_code'                   =>  $request->username,
									'seller_type'               =>  $request->seller_type,
									'arabic_name'               =>  $request->arabic_name,
									'english_name'              =>  $request->english_name,
									'product_category_id'       =>  $request->category,
									'product_sub_category_id'   =>  $request->sub_category,
									'product_description'       =>  $request->description,
									'product_main_image'        =>  $mainimg,
									'created_by'                =>  $request->user_id,
								);
						$product_id = DB::table('products')->insertGetId($setdata);
						$product = DB::table('products')->where('product_identifier',$product_id)->get();

					$product_img = $request->product_image;
					if($product_img){
						foreach($product_img as $key => $img){
							$imgPath = base_path() . '/images/product_img/';
							$img->move($imgPath,  '/'.time().$img->getClientOriginalName());
							$multi_img = '/'.time().$img->getClientOriginalName();
							$result = DB::table('product_images')->insert(['product_identifier'=>$product_id,'image_path'=>$multi_img]);
						}

					}



					$data['data'] = $product;
					$data['status'] = "true";
					$data['message'] = "Product inserted successfully";

				}else{

					$data['status'] = "false";
					$data['message'] = "Please select Images.";
				}
			}

		}else{

                $data['status'] = "false";
                $data['message'] = "Token id and user id is not match";

		}

		// return response()->json([

		// 	"message" => "Product created successfully",'success'=>1,"data"=>$data

		// ], 201);
          echo json_encode($data);


    }

	public function edit_product(Request $request){

		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($checkuser)){
		$validator = Validator::make($request->all(), [
			'user_id' => 'required',
			'product_id' => 'required',
			// 'token_id' =>'required',
			'seller_type'   =>  'required',
			'english_name'  =>  'required',
			'arabic_name'   =>  'required',
			'category'      =>  'required',
			'sub_category'  =>  'required',
			'description'   =>  'required',
			// 'product_mainimg' =>  'required',
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


			if($request->file('product_mainimg')){
				$mainimg = $request->product_mainimg;
				$mainimgPath = base_path() . '/images/product_img/';
				$mainimg->move($mainimgPath,  '/'.time().$mainimg->getClientOriginalName());
				$mainimg = '/'.time().$mainimg->getClientOriginalName();
			}else{
				$pro = DB::table('products')->where('product_identifier',$request->product_id)->first();
				$profile =$pro->product_main_image;
				$mainimg = $profile;
				}

				$setdata=   array(
								// 'BID'                       =>  $request->bid,
								// 'hs_code'                   =>  $request->username,
								'seller_type'               =>  $request->seller_type,
								'arabic_name'               =>  $request->arabic_name,
								'english_name'              =>  $request->english_name,
								'product_category_id'       =>  $request->category,
								'product_sub_category_id'   =>  $request->sub_category,
								'product_description'       =>  $request->description,
								'product_main_image'        =>  $mainimg,
								'created_by'                =>  $request->user_id,
							);
							$product = DB::table('products')->where('product_identifier',$request->product_id)->update($setdata);
							$products = DB::table('products')->where('product_identifier',$request->product_id)->get();
							// $product_img = $request->product_image;
							// if($product_img){
							// 	foreach($product_img as $key => $img){
							// 		$imgPath = base_path() . '/images/product_img/';
							// 		$img->move($imgPath,  '/'.time().$img->getClientOriginalName());
							// 		$multi_img = '/'.time().$img->getClientOriginalName();
							// 		$result = DB::table('product_images')->update(['product_identifier'=>$request->product_id,'image_path'=>$multi_img]);

							// 	}
							// }
							$data['data'] = $products;
							$data['status'] = "true";
							$data['message'] = "Product Updated successfully";

					}
				}else{
						$data['status'] = "false";
						$data['message'] = "Token id and user id is not match";
				}
        return response()->json($data, 200);

	}
	public function delete_product(Request $request) {

		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();

		if(!empty($checkuser)){
		$validator = Validator::make($request->all(), [

			'user_id' => 'required',
			'product_id' => 'required',

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

			 if(DB::table('products')->where('product_identifier',$request->product_id)->exists()){
// var_dump($request->product_id);
// die();
				$product = DB::table('products')->where('product_identifier',$request->product_id)->delete();


				$data['status'] = "true";
				$data['message'] = "Product delete successfully";
		    }else{
				$data['status'] = "false";
				$data['message'] = "Please select correct product id";
		}
	}

	}else{
		$data['status'] = "false";
		$data['message'] = "Token id and user id is not match";
}
return response()->json($data, 200);

}
    public function product_info(Request $request){

		$validator = Validator::make($request->all(), [
			'user_id' => 'required',
			// 'tokenid' => 'required',
			'product_id' => 'required',
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
			$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
            //->where('token_id',$request->tokenid)
			if(!empty($checkuser)){
				$check = DB::table('products')->where('product_identifier',$request->product_id)->first();
				if(!empty($check)){
					$products = DB::table('products as p')
												->select('p.product_identifier','p.arabic_name as p_arabic','p.english_name as p_english','p.product_description','p.product_main_image','c.category_english_name as c_english','c.category_arabic_name as c_arabic','sc.english_name as s_english','sc.arabic_name as s_arabic','p.created_by as user')
												->join('categories as c','c.category_identifier','=','p.product_category_id')
												->join('sub_categorie as sc','sc.subcategory_id','=','p.product_sub_category_id')
												->where('p.product_identifier',$request->product_id)
												->first();
				// print_r($products);die;
					$product_img  =  DB::table('product_images')
													->select('image_path')
													->where('product_identifier',$request->product_id)
													->get();
					$products->product_main_image   =  url('/images/product_img/').$products->product_main_image;

					$products->user = DB::table('business')->where('uni_id',$products->user)
													->select('business_address','business_name','uni_id','business_logo','business_cover_image')
													->get();
					// var_dump($products);
					// die;
					foreach($products->user as $va){
					$va->business_logo   =  url('/images/business_logo/').$va->business_logo;
					$va->business_cover_image   =  url('/images/cover_img/').$va->business_cover_image;
				}

					foreach($product_img as $val){
						$val->image_path   =  url('/images/product_img/').$val->image_path;
					}

					$data['products'] = $products;
					$data['product_img'] = $product_img;
					$data['status'] = "true";
					$data['message'] = "success";

				}else{
					$data['status'] = "false";
					$data['message'] = "Not found data";

				}
			}else{

				$data['status'] = "false";
				$data['message'] = "Token id and user id is not match";
			}
		}
        return response()->json($data, 200);
       // echo json_encode($data);

    }

	public function add_category(Request $request){

		$check = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();
		if(!empty($check)){
			$validator = Validator::make($request->all(), [
				'user_id'       =>  'required',
				'tokenid'       =>  'required',
				'english_name'  =>  'required',
				'arabic_name'   =>  'required',
				'description'   =>  'required',
				'category_img'  =>'required',

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

				if($request->category_img){

					$mainimg = $request->category_img;
					$mainimgPath = base_path() .'/images/category_img/';
					$mainimg->move($mainimgPath,  '/'.time().$mainimg->getClientOriginalName());
					$mainimg = '/'.time().$mainimg->getClientOriginalName();
					$setdata=   array(
						'category_english_name'  => $request->english_name,
						'category_arabic_name'   =>  $request->arabic_name,
						'category_description'   =>  $request->description,
						'category_img'          =>   $mainimg,
					);

					$product_id = DB::table('categories')->insertGetId($setdata);
						$data['data'] = $product_id ;
						$data['status'] = "true";
						$data['message'] = "Category inserted successfully";

				}else{

					$data['status'] = "false";
					$data['message'] = "Please select Images.";
				}
			}

		}else{
                $data['status'] = "false";
                $data['message'] = "Token id and user id is not match";
		}
          echo json_encode($data);
    }

 	public function add_subcategory(Request $request){
		$check = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();
		if(!empty($check)){
			$validator = Validator::make($request->all(), [
				'user_id'       =>  'required',
				'tokenid'       =>  'required',
				'category'      =>'required',
				'english_name'  =>  'required',
				'arabic_name'   =>  'required',
				'description'   =>  'required',
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

					$setdata=   array(
									'category_id'  => $request->category,
									'english_name'  => $request->english_name,
									'arabic_name'   =>  $request->arabic_name,
									'description'   =>  $request->description,
								);



						$product_id = DB::table('sub_categorie')->insertGetId($setdata);
						$data['data'] = $product_id ;
						$data['status'] = "true";
						$data['message'] = "Sub category inserted successfully";
					}
		}else{

                $data['status'] = "false";
                $data['message'] = "Token id and user id is not match";
		}
          echo json_encode($data);
    }
    public function company_profile(Request $request){

            $validator = Validator::make($request->all(), [
                'business_id' => 'required',
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
                $check = DB::table('business')->where('uni_id',$request->business_id)->first();
                if($check){
                    $profile = DB::table('business')
                                        ->select('business_logo','business_cover_image','business_name','business_bio')
                                        ->where('uni_id',$request->business_id)
                                        ->first();
                    $data['profile'] = $profile;
                    $data['status'] = "true";
                    $data['message'] = "success";
                }else{
                    $data['status'] = "false";
                    $data['message'] = "Not found data";
                }
            }
            echo json_encode($data);
    }


    public function product_list(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();

		if(!empty($checkuser)){
			$product_list = DB::table('products')->where('created_by',$request->user_id)->get();
			if(!$product_list->isEmpty()){
                foreach($product_list as $val){
                    $val->product_main_image   =  url('/images/product_img/').$val->product_main_image;
                }
				$data['product_list'] = $product_list;
				$data['status'] = "true";
				$data['message'] = "success";
			}else{
				$data['status'] = "false";
				$data['message'] = "Not found data";
			}
		}else{
			$data['status'] = "false";
			$data['message'] = "Token id and user id is not match";
		}
        return response()->json($data, 200);
    }


    public function getNewInProduct(Request $request){
        $checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
        //->where('token_id',$request->tokenid)
        if(!empty($checkuser)){
            $product_list = DB::table('products')->inRandomOrder()->limit(100)->get();
            if(!$product_list->isEmpty()){
                foreach($product_list as $val){
                    $val->product_main_image   =  url('/images/product_img/').'/'.$val->product_main_image;
					// $val->product_main_image   =  "https://tenspark.com/collabapi/images/business_logo/1616503492dimond.jfif";
                }

                $data['product_list'] = $product_list;
                $data['status'] = "true";
                $data['message'] = "success";
            }else{
                $data['status'] = "false";
                $data['message'] = "Not found data";
            }
        }else{
            $data['status'] = "false";
            $data['message'] = "User id is not match";
        }
        return response()->json($data, 200);
    }

    public function categorylist(Request $request){
        $checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
        //->where('token_id',$request->tokenid)
        if(!empty($checkuser)){
            $category_list = DB::table('categories')->get();
            foreach ($category_list as $value) {

                    // $value->category_img    =   "https://tenspark.com/collab/images/category_img/".$value->category_img;
					$value->category_img = url('/images/category_img/').$value->category_img;

                }
            if($category_list){
                $data['category_list'] = $category_list;
                $data['status'] = "true";
                $data['message'] = "success";
            }else{
                $data['status'] = "false";
                $data['message'] = "Not found data";
            }
        }else{
            $data['status'] = "false";
            $data['message'] = "Token id and user id is not match";
        }
         return response()->json($data, 200);
    }
    public function collapp_list(Request $request){
        $checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
        //->where('token_id',$request->tokenid)
        if(!empty($checkuser)){

            $category_list = DB::table('categories')->get();
            foreach ($category_list as $value) {
				// $value->category_img    =   "https://tenspark.com/collab/images/category_img/".$value->category_img;
				$value->category_img = url('/images/category_img/').$value->category_img;

                }
            if($category_list){
                $data['category_list'] = $category_list;
                $data['status'] = "true";
                $data['message'] = "success";
            }else{

                $data['status'] = "false";
                $data['message'] = "Not found data";
            }
        }else{

            $data['status'] = "false";
            $data['message'] = "Token id and user id is not match";
        }
         return response()->json($data, 200);
    }
	public function category_products(Request $request){
		$check = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();
		if(!empty($check)){
			$validator = Validator::make($request->all(), [
				'user_id'       =>  'required',
				'tokenid'       =>  'required',
				'category'  =>  'required',
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
				$category_product_list = DB::table('products')->where('product_category_id',$request->category)->get();

				foreach($category_product_list as $val){
                    $val->product_main_image   =  url('/images/product_img/').$val->product_main_image;
                }
					$data['data'] =$category_product_list;
					$data['status'] = "true";
					$data['message'] = "Product inserted successfully";
			}
		}else{
                $data['status'] = "false";
                $data['message'] = "Token id and user id is not match";
		}
          echo json_encode($data);
    }
    public function subcategory_list(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [
				'category_id' => 'required',
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

				$check = DB::table('sub_categorie')->where('category_id',$request->category_id)->first();
				if($check){
					$subcategory_list = DB::table('sub_categorie')
										->select('subcategory_id','category_id','english_name','arabic_name')
										->where('category_id',$request->category_id)
										->get();

					$data['subcategory_list'] = $subcategory_list;
					$data['status'] = "true";
					$data['message'] = "success";
				}else{
					$data['status'] = "false";
					$data['message'] = "Not found data";
				}
			}
		}else{
			$data['status'] = "false";
			$data['message'] = "Token id is required";
		}
        echo json_encode($data);
    }

    public function post(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [
				'user_id' => 'required',
				'feedback' => 'required',
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
					if($request->image){
						$userimg = $request->image;
						$userimgPath = base_path() . '/images/feedback/';
						$userimg->move($userimgPath,  '/'.time().$userimg->getClientOriginalName());
						$userimg = '/'.time().$userimg->getClientOriginalName();
					}else{
						$userimg = "";
					}
					$setfeedback = array(
										'user_id'   =>  $request->user_id,
										'image'     =>  $userimg,
										'story'     =>  $request->feedback,

									);
					$feedback = DB::table('post')->insert($setfeedback);
					$data['status'] = "true";
					$data['message'] = "success";
			}
		}else{
			$data['status'] = "false";
			$data['message'] = "Token id and user id is required";
		}
        echo json_encode($data);
    }

    public function live_feed(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();

		if(!empty($checkuser)){

						$livefeed=DB::table('post')
						->join('business','business.uni_id','=','post.user_id')
						->orderBy('id', 'DESC')
						->get();



                foreach($livefeed as $val){
	                    $val->comment=DB::table('comments')
						->join('business','business.uni_id','=','comments.user_id')
						->select('comments.*','business.business_name','business.business_owner','business.business_logo')
						->where('post_id',$val->id)
						->get();
						foreach($val->comment as $vals){
							$vals->business_logo   =  url('/images/business_logo/').$vals->business_logo;
						}

        				//$val->comment=DB::table('business')->where('uni_id',$val->id)->get();
        				//if($request->user_id){
        				//$val->likes = DB::table('likes')->where('user_id',$val->user_id)->where('post_like',1)->get();
    					$likedCount =  DB::table('likes')->where('user_id',$request->user_id)->where('post_id',$val->id)->where('post_like',1)->first();			// 	}
    				    if($likedCount){
    				        $val->is_liked =true;
    				    }else{
    					    $val->is_liked =false;
    				    }
    					$val->like_count = DB::table('likes')->where('post_id',$val->id)->where('post_like',1)->count();
                        $val->image   =  url('/images/feedback/').$val->image;
    					$val->business_logo   =  url('/images/business_logo/').$val->business_logo;
    					$val->business_cover_image   =  url('/images/cover_img/').$val->business_cover_image;
    					$val->shelf_doc =  url('/images/shelf_doc/').$val->shelf_doc;
    					$followCount =  DB::table('following')->where('user_id',$request->user_id)->where('follower_id',$val->user_id)->first();
    				    if($followCount){
    				        $val->is_follow =true;
    				    }else{
    					    $val->is_follow =false;
    				    }
    					$val->live_feed  = '';
                }
			$data['livefeed'] = $livefeed;

			$data['status'] = "true";
			$data['message'] = "success";
		}else{
			$data['status'] = "false";
			$data['message'] = "User id is required";
		}
         return response()->json($data, 200);
    }

    public function messages(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [
				'user1_id' => 'required',
				'user2_id' => 'required',
				'chat' 	   => 'required',
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
                $sendchat = array(
                                    'user1_id'   =>  $request->user1_id,
                                    'user2_id'   =>  $request->user2_id,
                                    'message'    =>  $request->chat,
                                );

                $sendchat = DB::table('message')->insert($sendchat);
                $data['status'] = "true";
                $data['message'] = "success";
			}
		}else{
			$data['status'] = "false";
			$data['message'] = "Token id and token id is required";
		}
        return response()->json($data, 200);
    }

    public function allchat_data(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		// ->where('token_id',$request->tokenid)
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [
				'user1_id' => 'required',
				'user2_id' => 'required',
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
					$getdata = DB::table('message')
										->join('business','business.uni_id','=','message.user1_id')
										->select('message.*', 'business.business_name','business.business_logo','business.business_owner')
										->where('user1_id',$request->user1_id)
										->Where('user2_id',$request->user2_id)
								    	->orWhere('user2_id',$request->user1_id)
										->Where('user1_id',$request->user2_id)
										->get();
										foreach($getdata as $val){
											// $val->user1=DB::table('business')->where('uni_id',$val->user1_id)->get();
											// $val->user2=DB::table('business')->where('uni_id',$val->user2_id)->get();
											$val->business_logo   =  url('/images/business_logo/').$val->business_logo;
											}

					if(!$getdata->isEmpty()){
						$data['data'] = $getdata;
						$data['status'] = "true";
						$data['message'] = "success";
					}else{

						$data['status'] = false;
						$data['message'] = "No data found";
					}
			}
		}else{

			$data['status'] = "false";
			$data['message'] = "User is required";
		}
        echo json_encode($data);
    }
	function time_string($datetime, $full = false)
	{
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);

		foreach ($string as $k => &$v)
		{
			if ($diff->$k)
			{
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			}
			else
			{
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'Just now';
	}

	public function userchat_data(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [
				'user_id' => 'required',
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

			        $ids  = array();
					$getdata = DB::table('message')
										->join('business','business.uni_id','=','message.user1_id')
										->select('message.*', 'business.business_name','business.business_logo','business.business_owner')
										->where('message.user1_id',$request->user_id)
										->orwhere('message.user2_id',$request->user_id)
										->where('message.user2_id',$request->user_id)
										->orwhere('message.user1_id',$request->user_id)

									 	->get();

										foreach($getdata as $val){
                                            $ids[] = $val->user2_id;
                                            $ids[] = $val->user1_id;
									 	}
									  	$userArray = 	array_unique($ids);

										foreach($userArray as $USval){
								  			if($USval==$request->user_id){
								  				continue;
								  			}else{
								  			    //->select('business_logo','business_name','uni_id')
								 				$valAr = DB::table('business')->select('business_logo','business_name','uni_id')->where('uni_id',$USval)->first();
												$messasge = DB::table('message')->select('message','created_at')->where('user2_id',$USval)->orwhere('user1_id',$request->user_id)->where('user1_id',$USval)->orwhere('user2_id',$request->user_id)->get()->last();
					                            $valAr->last_message =  $messasge->message;
					                            $valAr->created_at =  $messasge->created_at;
												if($valAr->business_logo){
								 					$valAr->business_logo   =  url('/images/business_logo/').$valAr->business_logo;
								 				}
								// 				// $val->user2=DB::table('business')->where('uni_id',$val->user2_id)->get();
								// 				$USval->business_logo   =  url('/images/business_logo/').$val->business_logo;
								 				$result[] = $valAr;
								 			}
										}
					if(!$getdata->isEmpty()){
						$data['data'] = $result;
						$data['status'] = "true";
						$data['message'] = "success";
					}else{

						$data['status'] = false;
						$data['message'] = "No data found";
					}
			}
		}else{

			$data['status'] = "false";
			$data['message'] = "Token id and token id is required";
		}
        echo json_encode($data);
    }

    public function user_list(Request $request){
		$check = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($check)){
			$getdata = DB::table('message')
			->join('business','business.uni_id','=','message.user1_id')
			->get();
					// $getdata = DB::table('business')->get();
					if(!$getdata->isEmpty()){
						$data['data'] = $getdata;
						$data['status'] = "true";
						$data['message'] = "success";
					}else{

						$data['status'] = false;
						$data['message'] = "No data found";
					}
		}else{

			$data['status'] = "false";
			$data['message'] = "Token id and token id is required";
		}
        echo json_encode($data);
	}

	public function user_details(Request $request){
		$check = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($check)){
			$validator = Validator::make($request->all(), [
				'user_id' => 'required',
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
			}
			else{

				$check = DB::table('business')->where('uni_id',$request->user_id)->first();
				if($check){
					$getdata = DB::table('business')->where('uni_id',$request->user_id)->get();

					foreach($getdata as $val){
						$val->business_logo   =  url('/images/business_logo/').$val->business_logo;
						$val->business_cover_image   =  url('/images/cover_img/').$val->business_cover_image;
					}

					$data['user_data'] = $getdata;
					$data['status'] = "true";
					$data['message'] = "success";
				}else{
					$data['status'] = "false";
					$data['message'] = "Not found data";
				}
			}
		}else{
			$data['status'] = "false";
			$data['message'] = "User id is required";
		}
        echo json_encode($data);
    }

	public function company_list(Request $request){
		$check = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($check)){
			$getdata = DB::table('business')->get();


					if(!$getdata->isEmpty()){
						foreach($getdata as $val){
							$val->business_logo   =  url('/images/business_logo/').$val->business_logo;
							$val->business_cover_image   =  url('/images/cover_img/').$val->business_cover_image;
						}
						$data['data'] = $getdata;
						$data['status'] = "true";
						$data['message'] = "success";
					}else{
						$data['status'] = false;
						$data['message'] = "No data found";
					}
		}else{

			$data['status'] = "false";
			$data['message'] = "Token id and token id is required";
		}
        echo json_encode($data);
	}

	public function add_service(Request $request){
		// $service = DB::table('services')->get();
		// echo $service ;
		// die;
		$check = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();
		if(!empty($check)){
			$validator = Validator::make($request->all(), [

				'user_id'       =>  'required',
				'tokenid'       =>  'required',
				'english_name'  =>  'required',
				'category'      =>  'required',
				'description'   =>  'required',
				'service_mainimg' => 'required',
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
				if($request->service_mainimg){
					$mainimg = $request->service_mainimg;
					$mainimgPath = base_path() . '/images/service_img/';
					$mainimg->move($mainimgPath,  '/'.time().$mainimg->getClientOriginalName());
					$mainimg = '/'.time().$mainimg->getClientOriginalName();
					$setdata=   array(

									'english_name'              =>  $request->english_name,
									'category'       =>  $request->category,
									'service_description'       =>  $request->description,
									'service_main_image'        =>  $mainimg,
									'created_by'                =>  $request->user_id,
								);

							$service_id = DB::table('services')->insertGetId($setdata);
							$service = DB::table('services')->where('id',$service_id)->get();
							$service_img = $request->service_image;

							if($service_img){
							foreach($service_img as $key => $img){

								$imgPath = base_path() . '/images/service_image/';

								$img->move($imgPath,  '/'.time().$img->getClientOriginalName());

								$multi_img = '/'.time().$img->getClientOriginalName();
								$result = DB::table('service_image')->insert(['service_id'=>$service_id,'service_image'=>$multi_img]);
							}
						}

					$data['data'] =$service;
					$data['status'] = "true";
					$data['message'] = "Service inserted successfully";
				}else{

					$data['status'] = "false";
					$data['message'] = "Please select Images.";
				}
			}
		}else{

				$data['status'] = "false";
                $data['message'] = "Token id and user id is not match";
		}
          echo json_encode($data);
	}

	public function edit_service(Request $request){

		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();
		if(!empty($checkuser)){
		$validator = Validator::make($request->all(), [
			'user_id'       =>  'required',
			'service_id' => 'required',
			// 'tokenid'       =>  'required',
			'english_name'  =>  'required',
			'category'      =>  'required',
			'description'   =>  'required',
			// 'service_mainimg' => 'required',
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
			if($request->file('service_mainimg')){
				$mainimg = $request->service_mainimg;
				$mainimgPath = base_path() . '/images/service_img/';
				$mainimg->move($mainimgPath,  '/'.time().$mainimg->getClientOriginalName());
				$mainimg = '/'.time().$mainimg->getClientOriginalName();
			}else{
				$pro = DB::table('services')->where('id',$request->service_id)->first();
				// var_dump($pro);
				// die;
				$profile =$pro->service_main_image;
				$mainimg = $profile;
				}

				$setdata=   array(

								'english_name'              =>  $request->english_name,
								'category'       =>  $request->category,
								'service_description'       =>  $request->description,
								'service_main_image'        =>  $mainimg,
								'created_by'                =>  $request->user_id,
							);

						$service_id = DB::table('services')->where('id',$request->service_id)->update($setdata);
						$service = DB::table('services')->where('id',$request->service_id)->get();

						// if($request->file('service_image')){
						// 	$service_img = $request->service_image;
						// 	foreach($service_img as $key => $img){
						// 		$imgPath = base_path() . '/images/service_image/';
						// 		$img->move($imgPath,  '/'.time().$img->getClientOriginalName());
						// 		$multi_img = '/'.time().$img->getClientOriginalName();
						// 		$result = DB::table('service_image')->update(['service_id'=>$service_id,'service_image'=>$multi_img]);
						// 	}
						// }else{
						// 	$result = DB::table('service_image')->where('service_id',$request->service_id)->first()
						// 	$profile =$result->service_image;
						// 	$mainimg = $profile;
						// 	$res = DB::table('service_image')->update(['service_id'=>$service_id,'service_image'=>$mainimg]);
						// 	}

							$data['data'] =$service;
							$data['status'] = "true";
							$data['message'] = "Service Updated successfully";
						// }else{
						// 	$data['status'] = "false";
						// 	$data['message'] = "Please select Images.";
						// }
					}
				}else{
						$data['status'] = "false";
						$data['message'] = "Token id and user id is not match";
				}
        return response()->json($data, 200);

	}

	public function delete_service(Request $request) {

		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();

		if(!empty($checkuser)){
		$validator = Validator::make($request->all(), [

			'user_id' => 'required',
			'service_id' => 'required',

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

			 if(DB::table('services')->where('id',$request->service_id)->exists()){
// var_dump($request->product_id);
// die();
				$product = DB::table('services')->where('id',$request->service_id)->delete();


				$data['status'] = "true";
				$data['message'] = "Service delete successfully";
		    }else{
				$data['status'] = "false";
				$data['message'] = "Please select correct service id";
		}
	}

	}else{
		$data['status'] = "false";
		$data['message'] = "Token id and user id is not match";
}
return response()->json($data, 200);

}

    public function delete_live_feed(Request $request) {

	$checkuser = DB::table('business')->where('uni_id',$request->user_id)->where('token_id',$request->tokenid)->first();

	if(!empty($checkuser)){
	$validator = Validator::make($request->all(), [
		'user_id' => 'required',
		'post_id' => 'required',
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


		 if(DB::table('post')->where('user_id',$request->user_id)->where('id',$request->post_id)->exists()){
// var_dump($request->product_id);
// die();
			$post = DB::table('post')->where('id',$request->post_id)->delete();


			$data['status'] = "true";
			$data['message'] = "Post delete successfully";
		}else{
			$data['status'] = "false";
			$data['message'] = "Please select correct post id";
	}
}

}else{
	$data['status'] = "false";
	$data['message'] = "Token id and user id is not match";
}
return response()->json($data, 200);

}

	public function service_list(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();

		if(!empty($checkuser)){
			$service_list = DB::table('services')->where('created_by',$request->user_id)->get();
			if(!$service_list->isEmpty()){
                foreach($service_list as $val){
                    $val->service_main_image   =  url('/images/service_img/').$val->service_main_image;
					$val->created_by   =  DB::table('business')->where('uni_id',$val->created_by)
					->select('business_address','business_name','uni_id')
					->get();

                }


				$data['service_list'] = $service_list;
				$data['status'] = "true";
				$data['message'] = "success";
			}else{
				$data['status'] = "false";
				$data['message'] = "Not found data";
			}
		}else{

			$data['status'] = "false";
			$data['message'] = "User id is not match";
		}

        return response()->json($data, 200);

    }

	public function post_comment(Request $request){

		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [

				'post_id' => 'required',
				// 'tokenid' =>  'required',
				'user_id' => 'required',
				'comment' => 'required',
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
					  $setdata=   array(
								'post_id'               =>  $request->post_id,
								'user_id'               =>  $request->user_id,
								'comment'              =>  $request->comment,
					);

					$comment_id = DB::table('comments')->insertGetId($setdata);
					$comment = DB::table('comments')->where('id',$comment_id )->get();



					$data['data'] = $comment;
					$data['status'] = "true";
					$data['message'] = "Post Comment successfully";


					}
				}else{
						$data['status'] = "false";
						$data['message'] = "user id is not match";
					}
				return response()->json($data, 200);

	}

	public function post_like(Request $request){

		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [

				'post_id' => 'required',
				// 'tokenid' =>  'required',
				'user_id' => 'required',
				'post_like' => 'required',
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
					  $setdata=   array(
								'post_id'               =>  $request->post_id,
								'user_id'               =>  $request->user_id,
								'post_like'              =>  $request->post_like,
					);

					$like_id = DB::table('likes')->insertGetId($setdata);
					// $like = DB::table('likes')->where('user_id',$request->user_id )
					// 							->where('post_id',$request->post_id)
					// 							->where('post_like',1)
					// 							->get();
				    $like =  DB::table('likes')->where('post_id',$request->post_id)->where('post_like',1)->count();


					$data['total like'] = $like;
					$data['status'] = "true";
					$data['message'] = "Post like successfully";


					}
				}else{
						$data['status'] = "false";
						$data['message'] = "Token id and user id is not match";
					}
				return response()->json($data, 200);

	}

	public function post_follow(Request $request){

		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [
 				'business_id' => 'required',
	 			'user_id' => 'required',
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
					$setdata=   array(
								'follower_id'   =>  $request->business_id,
								'follow_id'     =>  $request->user_id,
								'user_id'       =>  $request->user_id,
				 	);

					$like_id = DB::table('following')->insertGetId($setdata);
				// 	$like =  DB::table('following')->where('user_id',$request->user_id)->where('follower_id',$request->business_id)->count();
			 //		$data['total like'] = $like;
					$data['status'] = "true";
					$data['message'] = "Post Follow Successfully";
	    			}
				}else{
					$data['status'] = "false";
					$data['message'] = "Token id and user id is not match";
				}
				return response()->json($data, 200);

	}

	public function company_category_list(Request $request){
        if($request->page!=''){
            $page  = $request->page*10;
        }else{
            $page = 0;
        }
		$getdata = DB::table('company_categories')->offset($page)->limit(10)->get(['id','name','image']);
		foreach($getdata as $val){
			$val->image   =  url('/images/company_category_img/').$val->image;
			$val->page = $page/10;
 		}
		$data['data'] = $getdata;
		$data['status'] = "true";
		$data['message'] = "success";
		return response()->json($data, 200);

	}

	public function company_subcategory_list(Request $request){


			$validator = Validator::make($request->all(), [
				'category_id' => 'required',
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
			}
			else{

				$check = DB::table('company_subcategories')->where('company_categories_id',$request->category_id)->first();
				if($check){
					$subcategory_list = DB::table('company_subcategories')
										->select('id','company_categories_id','name','description','image')
										->where('company_categories_id',$request->category_id)
										->get();
					foreach($subcategory_list as $val){
						$val->image   =  url('/images/company_subcategory_img/').$val->image;

					}

					$data['subcategory_list'] = $subcategory_list;
					$data['status'] = "true";
					$data['message'] = "success";
				}else{
					$data['status'] = "false";
					$data['message'] = "Not found data";
				}
			}

        echo json_encode($data);
    }

	public function country(Request $request){


		$profile = DB::table('countries')->where('id',101)->get();
		$data['countries'] = $profile;
		$data['status'] = "true";
		$data['message'] = "success";


		echo json_encode($data);
}

	public function state(Request $request){

		$validator = Validator::make($request->all(), [
			'country_id' => 'required',
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
			$check = DB::table('states')->where('country_id',$request->country_id)->first();
			if($check){
				$profile = DB::table('states')
									->orderBy('name')
									->where('country_id',$request->country_id)
									->get();
				$data['states'] = $profile;
				$data['status'] = "true";
				$data['message'] = "success";
			}else{
				$data['status'] = "false";
				$data['message'] = "Not found data";
			}
		}
		echo json_encode($data);
}

    public function city(Request $request){

	$validator = Validator::make($request->all(), [
		'state_id' => 'required',
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
		$check = DB::table('cities')->where('state_id',$request->state_id)->first();
		if($check){
			$profile = DB::table('cities')
								->orderBy('name')
								->where('state_id',$request->state_id)
								->get();
			$data['states'] = $profile;
			$data['status'] = "true";
			$data['message'] = "success";
		}else{
			$data['status'] = "false";
			$data['message'] = "Not found data";
		}
	}
	echo json_encode($data);
}

	public function filter(Request $request){


		// var_dump($request->filter_by);
		// die;
        if($request->filter_by =="product"){
			$profile = DB::table('products')->get();
			foreach($profile as $val){
				$val->product_main_image   =  url('/images/product_img/').$val->product_main_image;
				$val->created_by   =  DB::table('business')->where('uni_id',$val->created_by)
					->select('business_address','business_name','uni_id')
					->get();
			}
			$data['product list'] = $profile;
			$data['status'] = "true";
			$data['message'] = "success";
			// echo json_encode($data);
		}else{
			if($request->filter_by=="service"){
				$profile = DB::table('services')->get();
				foreach($profile as $val){
                    $val->service_main_image   =  url('/images/service_img/').$val->service_main_image;
					$val->created_by   =  DB::table('business')->where('uni_id',$val->created_by)
					->select('business_address','business_name','uni_id')
					->get();

                }
				$data['service list'] = $profile;
				$data['status'] = "true";
				$data['message'] = "success";
			}else{
				$data['status'] = "false";
				$data['message'] = "Not found data";
			}
		}
		echo json_encode($data);
	}

	public function business_list(Request $request){
		$checkuser = DB::table('business')->where('uni_id',$request->user_id)->first();
		if(!empty($checkuser)){
			$validator = Validator::make($request->all(), [
				'user_id' => 'required',
				'business_category_id' => 'required',

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

				$profile = DB::table('business')->where('business_main_activity_id',$request->business_category_id)->get();

				foreach($profile as $val){
					$val->business_logo   =  url('/images/business_logo/').$val->business_logo;
					$val->business_cover_image   =  url('/images/cover_img/').$val->business_cover_image;

                }
				$data['data'] = $profile;
				$data['status'] = "true";
                $data['message'] = "success";
			}
		}else{
			$data['status'] = "false";
			$data['message'] = "User id is required";
		}
        echo json_encode($data);
    }


    public function reset_password(Request $request)
    {

        $user_id = $request->user_id;
        $password = $request->password;

        $customMessages = [

                  'required'  => 'Please fill password.',

            ];

        $validator = Validator::make($request->all(), [

                'password'      => 'required|min:6',
                'user_id'=> 'required',

            ],$customMessages);

         if ($validator->fails()) {

                $data['status'] = "FALSE";
                $data['message'] = "Password is required field enter minimum 6 digit";

        }else{

            if($user_id){

                $Hpassword = bcrypt($request->password);
                $detail = DB::table('users')->where('id', $user_id)->update(['password'=>$Hpassword]);
               /* $data['status'] = "FALSE";
                $data['message'] = "Password is required field";  */

                if($detail)
                {

                 $data['status'] = "True";
                 $data['message'] = "Password changed successfully";

                }else
                {
                     $data['status'] = "false";
                     $data['message'] = "User id does not exist";


                }


            }else{
                 $data['status'] = "FALSE";
                 $data['message'] = "User id  does not exist";

            }

        }

      echo json_encode($data);
     }


     public function sendNotificationCallBYcall($device_token,$msgs){


//AAAAzODils0:APA91bHrxcdk5kefPGA9cv-JCAvVoV-9t0D4CBCDJI3pcD137y0EEKAlG40wF1mrD18sAWCmKgH7EOcmKKqGjP0pC28Co5UZw0DxL2JDWTDFPuDSk4UebmSOc5RHY01zcgsPS5-YaxMW
        $menu_query = DB::table('users')->get();
         if(!defined( 'API_ACCESS_KEY')){
            define( 'API_ACCESS_KEY', '' );
        }

        $msg = array
            (
            'body'  =>$msgs,
            'title' => 'USERKUNDALI',
            'icon'  => 'astro.png',
            'image' =>'https://tenspark.com/astrologer/images/astro2-1619560701.jpg'

        );



        $fields = array
        (
             'to'=>$device_token,
            'notification'    => $msg,
            'priority' => 'high'
        );
        $headers = array
        (
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close( $ch );
    }




    public function Sendotp($device_token,$msgs){

        $menu_query = DB::table('users')->get();
         if(!defined( 'API_ACCESS_KEY')){
            define( 'API_ACCESS_KEY', 'AAAAzODils0:APA91bHrxcdk5kefPGA9cv-JCAvVoV-9t0D4CBCDJI3pcD137y0EEKAlG40wF1mrD18sAWCmKgH7EOcmKKqGjP0pC28Co5UZw0DxL2JDWTDFPuDSk4UebmSOc5RHY01zcgsPS5-YaxMW');
        }

        $msg = array
            (
            'body'  =>$msgs,
            'title' => 'Connectastro ,Please verify your Otp ',
        //    'icon'  => 'astro.png',
        //    'image' =>''

        );



        $fields = array
        (
           'to'=>$device_token,
            'notification'    => $msg,
            'priority' => 'high'
        );
        $headers = array
        (
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close( $ch );
    }


    public function sendNotification($device_token,$msgs){



        $menu_query = DB::table('users')->get();
         if(!defined( 'API_ACCESS_KEY')){
            define( 'API_ACCESS_KEY', 'AAAAzODils0:APA91bHrxcdk5kefPGA9cv-JCAvVoV-9t0D4CBCDJI3pcD137y0EEKAlG40wF1mrD18sAWCmKgH7EOcmKKqGjP0pC28Co5UZw0DxL2JDWTDFPuDSk4UebmSOc5RHY01zcgsPS5-YaxMW' );
        }

        $msg = array
            (
            'body'  =>$msgs,
            'title' => 'Astro - Notification',
            'icon'  => 'astro.png',
            'image' =>''

        );



        $fields = array
        (
           'to'=>$device_token,
            'notification'    => $msg,
            'priority' => 'high'
        );
        $headers = array
        (
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close( $ch );
    }


    public function check_exsists(Request $request){


        if($request->email_id){

           $check = DB::table('users')->where('email',$request->email_id)->first();



            if(empty($check)){



                 $data['status'] = "false";
                 $data['message'] = "Email does not exist";
            }else{


                 $data['status'] = "true";
                 $data['message'] = "Email  already exist";
            }
        }else{
             $data['status'] = "false";
             $data['message'] = "Please enter correct email id";


        }
         echo json_encode($data);

    }



    public function buy_plan(Request $request){
           if(!empty($request)){
			$validator = Validator::make($request->all(), [
				'user_id'       =>  'required',
				'plan_name'       =>  'required',
				'transcation_id'       =>  'required',

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
				if($request->transcation_id){
                $setdata=   array(

                                    'user_id'               =>  $request->user_id,
									'plan_name'               =>  $request->plan_name,
									'plan_start'              =>  $request->plan_start,
									'plan_end'       =>  $request->plan_end,
									'plan_sdate'   =>  $request->plan_sdate,
									'plan_id'       =>  1,
									'transcation_id'        =>  $request->transcation_id,
									'payment_method'        =>  $request->payment_method,
									'payment_status'        =>  $request->payment_status,
									'status'        =>          1,

								);
						$payment = DB::table('user_plan')->insertGetId($setdata);
					    if($payment){
					     $data['user_id'] =  $request->user_id;
					     $data['transcation_id'] =  $request->transcation_id;
					     $data['plan_name'] = $request->plan_name;
					     $data['status'] = "true";
					     $data['message'] = "Your Payment Successfully Done .Plan Buy Successfully New Plana activited";

					}else
					{

                       	$data['status'] = "false";
					    $data['message'] = "Please select Images.";

					}




          echo json_encode($data);


    }
  }

}

}

 public function view_user_buy_plan(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',
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

        $wallet_system = DB::table('wallet_system')->where('user_id',$request->user_id)->get();
        $wallet_system_check=count($wallet_system);
        if($wallet_system_check > 0 )
        {
            $data['status'] = true;
            $data['message'] = "All order list";
            $data['data']=$wallet_system;

        }else{

            $data['status'] = false;
            $data['message'] = "something went wrong";


        }

        echo json_encode($data);
    }








    //       $validator = Validator::make($request->all(), [
    //         'user_id'          =>  'required',


    //     ]);
    //      if ($validator->fails()) {
    //         $error_msg = [];
    //         foreach ($validator->messages()->all() as $key => $value) {
    //             array_push($error_msg, $value);
    //         }
    //         if ($error_msg) {
    //             return array(
    //                 'status' 	=> false,
    //                 'code' 		=> 201,
    //                 'message' 	=> $error_msg[0],
    //                 'data' 		=> $request->all()
    //             );
    //         }

    //     }
    //     else{


    // //$checkuser = DB::table('user_plan')->get();
    //  $checkuser = DB::table('user_plan')->where('user_id',$request->user_id)->get();

	//     if($checkuser)
    //     {

    //     $plans = DB::table('user_plan')->where('user_id',$request->user_id)->get();
    //     if(count($plans)> 0){
    //     $data['data'] = $plans;
	// 	$data['status'] = true;
	// 	$data['message'] = "All plan";
    //     }
    //     else
    //     {
    //             $data['data'] = 'Does not data found';
	// 			$data['status'] = false;
	// 			$data['message'] = "No data found enterd user id";

    //     }

    //     }else
    //     {
    //             $data['data'] = 'Does not data found';
	// 			$data['status'] = false;
	// 			$data['message'] = "No data found enterd user id";

    //     }

    //     echo json_encode($data);
    //     }

    }




public function logoutUpdate(Request $request)
    {


          $validator = Validator::make($request->all(), [
            'user_id'          =>  'required',


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


        $checkuser = DB::table('users')->where('id',$request->user_id)->get();
        if($checkuser)
        {



        $detail = DB::table('users')->where('id', $request->user_id)->update(['device_id'=>"LOGOUT"]);
        if($detail){
		$data['status'] = true;
		$data['message'] = "User Successfully logout";
        }
        else
        {
				$data['status'] = false;
				$data['message'] = "No data found enterd user id";

        }

        }
        else
        {

				$data['status'] = false;
				$data['message'] = "User id does not matched";

        }



        echo json_encode($data);
        }

    }


   public function astro_review(Request $request)
    {
         $validator = Validator::make($request->all(), [
        //    'message'          => 'required',
            'astro_id'      =>  'required',
            'user_id'      =>  'required',
            'rating'     =>  'required',
            'device_id'     =>  'required',

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

        }else{

        $checkuser = DB::table('users')->where('id',$request->user_id)->first();
	   // print_r($checkuser);die;
        if($checkuser)
        {
            $setdata=   array(

                                'astro_id'                     =>  $request->astro_id,
                                'user_id'                 =>  $request->user_id,
                                'review'                    =>  $request->message,
                                'rating'                    =>  $request->rating,

                            );


                $resultlastid = DB::table('astro_review')->insertGetId($setdata);

                if($resultlastid){
                $data['status'] = "true";
                $data['user_id'] =$request->user_id;
                $data['message'] =$request->user_id;
                $data['message'] ='Your Feedback sent to successfully';
                }else
                {

            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Something went wrong";
                }


        }else
        {
            	$data['data'] = '';
				$data['status'] = false;
				$data['message'] = "Data does not found!!!!!!!!!!!!";

        }
        echo json_encode($data);
    }

}



public function astro_review_list(Request $request)
{
$validator = Validator::make($request->all(), [
'astro_id'      =>  'required',


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

        }else{

	  $review =DB::table('astro_review')
						->join('users','users.id','=','astro_review.user_id')
						->select('astro_review.*','users.name','users.user_type','users.address')
						->where('astro_review.astro_id',$request->astro_id)
						->get();



     if(count($review) > 0){
                $data['status'] = "true";
                $data['review'] =$review;
                $data['message'] ='All review';
                }else
                {


				$data['status'] = false;
				$data['message'] = "Data does not found";
                }
              echo json_encode($data);


}
}


  public function astro_rating_calc(Request $request)
    {

        $checkrate = DB::table('astro_review')->where('astro_id',$request->astro_id)->get();

        // print_r($checkrate);
        if(count($checkrate)> 0){


         $total_review = DB::table('astro_review')->sum('rating')->where('astro_id',$request->astro_id);
       // $total_review = DB::table('astro_review')->sum('rating')->where('astro_id',$request->astro_id);
        print_r($total_review);die();

        $count_date = count($checkrate);
        $data['rating'] = $count_date;

      //  $data['count'] = count($checkrate);
		$data['rating_star'] = 4;
		$data['message'] = "All plan";
        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found enterd user id";

        }

        echo json_encode($data);


}


public function live_events(Request $request)
{
$validator = Validator::make($request->all(), [
//'astro_id'      =>  'required',


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

        }else{

	            $liveevents = DB::table('live_events')
              ->select('live_events.*',DB::raw('CONCAT("http://md-54.whb.tempwebhost.net/~democdyb/astrologer/images/event_img", "", event_img) AS img_url'))
              ->where('event_status',0)->get();

               if($liveevents){
                $data['status'] = "true";
                $data['live_events'] =$liveevents;
                $data['message'] ='All events';
                }else
                {


				$data['status'] = false;
				$data['message'] = "Data does not found";
                }
              echo json_encode($data);


}
}


public function client_testimonial(Request $request)
{
$validator = Validator::make($request->all(), [
//'astro_id'      =>  'required',


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

        }else{

	            $client_test = DB::table('client_testtimonial')
              ->select('client_testtimonial.*',DB::raw('CONCAT("https://collabdoor.com/astrology/images/testimonial_users", "", image) AS image_url'),
              DB::raw('CONCAT("https://collabdoor.com/astrology/images/testimonial_thumbnail", "", coverimg) AS cover_url'))->where('status',0)->get();

               if($client_test){
                $data['status'] = "true";
                $data['Client'] =$client_test;
                $data['message'] ='All Client review';
                }else
                {


				$data['status'] = false;
				$data['message'] = "Data does not found";
                }
              echo json_encode($data);


}
}

public function astro_news(Request $request)
{
$validator = Validator::make($request->all(), [
//'astro_id'      =>  'required',


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

        }else{
$result=array();
	            $astro_news = DB::table('astro_news')
              ->select('astro_news.*',DB::raw('CONCAT("https://collabdoor.com/astrology/images/astro_news/", "", video_url) AS image_url'))

              ->where('status',0)->orderBy('id', 'DESC')->get();
              foreach ($astro_news as $astro_new) {
                $value=array('id'=>$astro_new->id,
              'video_url'=>$astro_new->video_url,
              'news_url'=>$astro_new->news_url,
              'news'=>ltrim(str_replace("\n","",strip_tags($astro_new->news))),
              'title'=>strip_tags($astro_new->title),
              'news_date'=>date("d-m-Y",strtotime($astro_new->news_date)),
              'news_author'=>$astro_new->news_author,
            'image_url'=>$astro_new->image_url,
          );
              array_push($result,$value);

              }
               if($astro_news){
                $data['status'] = "true";
                $data['news'] =$result;
                $data['message'] ='News';
                }else
                {


				$data['status'] = false;
				$data['message'] = "Data does not found";
                }
              echo json_encode($data);


}
}


public function call_back_olf(Request $request)
{
    
      $validator = Validator::make($request->all(), [
     'astro_id'      =>  'required',
     'user_id'      =>  'required',
     'call_sid'      =>  'required',
     'call_data'=> 'required',
     'to_number'=>'required',
     'per_minute'=>'required',
     'from_number'=>'required',
    'current_used_bal'=>'required'

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

          }else{

            print_r($request->call_data);die;
              $insert=['astro_id'=>$request->astro_id,'user_id'=>$request->user_id,'call_sid'=>$request->call_sid,'last_id'=>$request->user_id,'call_data'=>$request->call_data,'to_number'=>$request->to_number,'per_minute'=>$request->per_minute,'from_number'=>$request->from_number];
             $result = DB::table('call_details')->insert($insert);   
             $setdata=array(

                'call_status'                    =>  false
             );
            $result = DB::table('call_in_queue')->where('mobile_no',$request->to_number)->update($setdata);
            $otp_msg="Call in check progress for astrologer ".$request->mobile_no;
            $data['status'] = true;
            $data['call_status'] = true;


            $wallet_system = DB::table('wallet_system')->where('user_id',$request->user_id)->get();
            $wallet_system_check=count($wallet_system);
            if($wallet_system_check > 0 ){
               $avble_bal= $wallet_system[0]->wallet_amount;
               $new_bal=$request->current_used_bal;
               $total_bal=$avble_bal - $new_bal;
               $setdataNew['wallet_amount']=  $total_bal;
               $result = DB::table('wallet_system')->where('user_id',$request->user_id)->update($setdataNew);
                // $data['status'] = "true";
                // $data['user_id'] =$request->user_id;
                // $data['wallet_amount'] =$total_bal;
                // $data['message'] ='Your Wallet amount udapted sucessfully';
            }

              
          }      
          
                        	$data['status'] = true;
             				$data['message'] = "Data send successfully";
                            echo json_encode($data);

    
}




public function call_back(Request $request)
{
    
      $validator = Validator::make($request->all(), [
     'astro_id'      =>  'required',
     'user_id'      =>  'required',
     'call_sid'      =>  'required',
    // 'call_data'=> 'required',
  //   'to_number'=>'required',
   //  'per_minute'=>'required',
  //   'from_number'=>'required',
  //  'current_used_bal'=>'required'

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

          }else{
            $chekSid = DB::table('call_details')->where('call_sid',$request->call_sid)->get();
//print_r($chekSid);die;
$checksid= count($chekSid);
               if($checksid > 0 )
               {
                
               
//print_r(json_encode($request->call_data));die;
                $insert=['astro_id'=>$request->astro_id,'user_id'=>$request->user_id,'call_sid'=>$request->call_sid,'last_id'=>$request->user_id,'call_data'=>$request->call_data,'to_number'=>$request->to_number,'per_minute'=>$request->per_minute,'from_number'=>$request->from_number];
                //$result = DB::table('call_details')->insert($insert);   
                $result = DB::table('call_details')->where('call_sid',$request->call_sid)->update($insert);
             

               }else{
            
                $insert=['astro_id'=>$request->astro_id,'user_id'=>$request->user_id,'call_sid'=>$request->call_sid,'last_id'=>$request->user_id,'call_data'=>$request->call_data,'to_number'=>$request->to_number,'per_minute'=>$request->per_minute,'from_number'=>$request->from_number];
                $result = DB::table('call_details')->insert($insert);   
                
               }

            


             $setdata=array(

                'call_status'=>  false
             );
            $result = DB::table('call_in_queue')->where('mobile_no',$request->to_number)->update($setdata);
            $otp_msg="Call in check progress for astrologer ".$request->mobile_no;
            $data['status'] = true;
            $data['call_status'] = true;


            if($request->call_status=='completed') {
            $wallet_system = DB::table('wallet_system')->where('user_id',$request->user_id)->get();
            $wallet_system_check=count($wallet_system);
              if($wallet_system_check > 0 ){
               $avble_bal= $wallet_system[0]->wallet_amount;
               $new_bal=$request->current_used_bal;
               $total_bal=$avble_bal - $new_bal;
               $setdataNew['wallet_amount']=  $total_bal;
               $result = DB::table('wallet_system')->where('user_id',$request->user_id)->update($setdataNew);
            }
                // $data['status'] = "true";
                // $data['user_id'] =$request->user_id;
                // $data['wallet_amount'] =$total_bal;
                // $data['message'] ='Your Wallet amount udapted sucessfully';
            }

              
          }      
          
                        	$data['status'] = true;
             				$data['message'] = "Data send successfully";
                            echo json_encode($data);

    
}


public function call_back_old(Request $request)
{

//  $insert=['astro_id'=>1,'user_id'=>1,'call_sid'=>1,'last_id'=>0,'call_data'=>''];
// $result = DB::table('call_details')->insert($insert);
// print_r($result);die;
            
            
  $login = 'dc2b8a547b67e452601f1fa851a8ac25c758bcf874611d2a';
  $password = 'a986a91a4936f5fa568367752cbc3db0594c33c2bb0453ad';


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

          }else{
              
              
            $cat_details = DB::table('call_details')->orderBy('id', 'DESC')->first();
           
             if(!empty($cat_details))
             {
           for ($i=$cat_details->last_id; $i <= $cat_details->id; $i++) {
                $details_exists=DB::table('call_details')->where('id',$i)->get();
                
                //print_r($details_exists);die;
                
                 $url = 'https://api.exotel.com/v1/Accounts/connectaastro1/Calls/'.$details_exists[0]->call_sid.'.json';
                 $ch = curl_init();
                 curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");

                 DB::table('call_details')->where('id', $i)->update(['last_id' => $cat_details->id,'call_data' => curl_exec($ch)]);
             }
             
             if(!empty($request->astro_id))
             {
             $insert=['astro_id'=>$request->astro_id,'user_id'=>$request->user_id,'call_sid'=>$request->call_sid,'last_id'=>$cat_details->last_id,'call_data'=>''];
             $result = DB::table('call_details')->insert($insert);
             }   
             }
             else
             {
                 if(!empty($request->astro_id)){
             $insert=['astro_id'=>$request->astro_id,'user_id'=>$request->user_id,'call_sid'=>$request->call_sid,'last_id'=>1,'call_data'=>''];
             $result = DB::table('call_details')->insert($insert);}
             }
        

            				$data['status'] = true;
             				$data['message'] = "Data send successfully";
                            echo json_encode($data);


  }
}



// public function call_back(Request $request)
// {

// //  $insert=['astro_id'=>1,'user_id'=>1,'call_sid'=>1,'last_id'=>0,'call_data'=>''];
// // $result = DB::table('call_details')->insert($insert);
// // print_r($result);die;
            
            
//   $login = 'dc2b8a547b67e452601f1fa851a8ac25c758bcf874611d2a';
//   $password = 'a986a91a4936f5fa568367752cbc3db0594c33c2bb0453ad';

//   $validator = Validator::make($request->all(), [
// //     'astro_id'      =>  'required',
// //     'user_id'      =>  'required',
// //   'call_sid'      =>  'required',


//           ]);
//           if ($validator->fails()) {
//               $error_msg = [];
//               foreach ($validator->messages()->all() as $key => $value) {
//                   array_push($error_msg, $value);
//               }
//               if ($error_msg) {
//                   return array(
//                       'status' 	=> false,
//                       'code' 		=> 201,
//                       'message' 	=> $error_msg[0],
//                       'data' 		=> $request->all()
//                   );
//               }

//           }else{
              
              
//             $cat_details = DB::table('call_details')->orderBy('id', 'DESC')->first();
          
//              if(!empty($cat_details))
//              {
                  
//           for ($i=$cat_details->last_id; $i <= $cat_details->id; $i++) {
//         $details_exists=DB::table('call_details')->where('id',$i)->get();
               
//                 $url = 'https://api.exotel.com/v1/Accounts/connectaastro1/Calls/'.$details_exists[0]->call_sid.'.json';
//                  $ch = curl_init();
//                  curl_setopt($ch, CURLOPT_URL,$url);
//                 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//                  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//                 curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");

//                  DB::table('call_details')->where('id', $i)->update(['last_id' => $cat_details->id,'call_data' => curl_exec($ch)]);
//              }
             
//              if(!empty($request->astro_id))
//              {
//              $insert=['astro_id'=>$request->astro_id,'user_id'=>$request->user_id,'call_sid'=>$request->call_sid,'last_id'=>$cat_details->last_id,'call_data'=>''];
//              $result = DB::table('call_details')->insert($insert);
//              }   
//              }
//              else
//              {
//                  if(!empty($request->astro_id)){
//              $insert=['astro_id'=>$request->astro_id,'user_id'=>$request->user_id,'call_sid'=>$request->call_sid,'last_id'=>1,'call_data'=>''];
//              $result = DB::table('call_details')->insert($insert);}
//              }
        

//             				$data['status'] = true;
//              				$data['message'] = "Data send successfully";
//                           echo json_encode($data);


//   }
// }

public function call_history(Request $request)
{
    $DateCreated = '';
    $DateUpdated = '';
    $Status= '';
    $StartTime = '';
    $EndTime ='';
    $Duration = '';

  $validator = Validator::make($request->all(), [
    'user_id'      =>  'required',
     'user_type'      =>  'required',

          ]);
    $user_id=$request->user_id;
    $user_type=$request->user_type;
    $result=[];
    if($user_type==1)
    {
     $call_details=DB::table('call_details')->where('user_id',$request->user_id)->get();
     
    }else
    {
        
     $call_details=DB::table('call_details')->where('astro_id',$request->user_id)->get();
    }

  //  print_r($call_details);die;
 

 //print_r($call_details);die;
     foreach($call_details as $calls)
     {
       
       // print_r($details);die;
       if($calls->call_data!=""){
        $details=json_decode($calls->call_data)->Call;

       // print_r($details);
        $DateCreated = $details->DateCreated;
        $DateUpdated = $details->DateUpdated;
        $Status= $details->Status;
        $StartTime = $details->StartTime;
        $EndTime =$details->EndTime;
        $Duration = $details->Duration;
    }else{

        $DateCreated = '';
        $DateUpdated = '';
        $Status= '';
        $StartTime = '';
        $EndTime ='';
        $Duration = '';
    }
     $call_astro_id=DB::table('users')->where('id',$calls->astro_id)->get();
     $call_user_id=DB::table('users')->where('id',$calls->user_id)->get();
     
     
    // echo count($call_astro_id);die;
     $call_astro_id_name='';
     $varible_count=count($call_astro_id);
     $varible_user=count($call_user_id);
     if($varible_count!=0 ){
        // echo "sdfdsfdsf";die;
       //  echo $call_astro_id_name;die;
          $call_astro_id_name=$call_astro_id[0]->name;
       
     }else{  //echo "sdfdsfdsf";die;
         $call_astro_id_name= 'User1';
     }
     
     $call_user_id_name='';
      if($varible_user!= 0 ){
          $call_user_id_name=$call_user_id[0]->name;
       
     }else{
         $call_user_id_name= 'User2';
     }
     
     
     
     //print_r($call_astro_id);
 // print_r($call_user_id);die;

        $data=array(   
            
     'astro_id' => $calls->astro_id,
     'user_id' => $calls->user_id,
     'DateCreated' => $DateCreated,
     'DateUpdated' => $DateUpdated,
    'To' => $call_user_id_name,
     'From' => $call_astro_id_name,
     'to_number'=>$calls->to_number,
     'from_number'=>$calls->from_number,
     'Status' => $Status,
     'StartTime' => $StartTime,
    'EndTime' => $EndTime,
    'Duration' => $Duration);
    
    
   //  print_r($response);die;
//echo json_encode($response);
    
array_push($result,$data);

  //   print_r($data);die;
       
     }

    $response=array('data'=>$result,'status'=>true,'message'=>"Call History retrived successfully");
   //  print_r($data);die;
echo json_encode($response);
        
}


 public function user_chatlist(Request $request)
{
    
    $user_id=$request->user_id;
      $sql = "SELECT  
       sender.name AS sender_user_name
       ,recipient.name AS recipient_user_name,  sender.id AS sender_id
       ,recipient.id AS recipient_id,sender.profile_image AS recipient_img,
       chat.id as chatId
       ,sent_date,sent_time
       ,message FROM chat INNER JOIN users AS sender ON sender.id = sender_id INNER JOIN users AS recipient ON recipient.id = receiver_id WHERE   sender_id = $user_id OR receiver_id = $user_id group by recipient_id,sender_id ORDER BY sent_date DESC ";
    $users_lists= DB::select($sql);
  //  print_r($users_lists);die;
  $response=array('data'=>$users_lists,'status'=>true,'message'=>"Chat List retrived successfully");
echo json_encode($response);
    
}

public function user_chatlist_old(Request $request)
{
  $result=[];
  $validator = Validator::make($request->all(), [
    'user_id'      =>  'required',
          ]);

$users_lists=DB::table('messagess')->select('message.*','users.*',DB::raw('GROUP_CONCAT(message) AS messages'))->leftjoin('users','users.id','=','message.user2_id')->where('user1_id',$request->user_id)->groupBy('user2_id')->orderBy('message.id', 'DESC')->get();
foreach ($users_lists as $list) {
  $messages=explode(',',$list->messages);
  $data=array('user_id'=>$list->user2_id,'message'=>end($messages),'user_name'=>$list->name);
array_push($result,$data);
}

$response=array('data'=>$result,'status'=>true,'message'=>"Chat List retrived successfully");
echo json_encode($response);
}
public function isLoginUsingOtp(Request $request)
{
   
         date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
         $current_date=date('y-m-d H:i:s');

         //echo $date;die;
         $validator = Validator::make($request->all(), [
            'phone_no'      =>  'required|numeric|digits_between:1,10',
         
            'device_id'=>'required'
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

        }else{

            $check = DB::table('users')->where('phone_no',$request->phone_no)->first();
           
            if(empty($check)){
           
                $setdata=   array(
                                'phone_no'                    =>  $request->phone_no,
                                'device_id'                    =>  $request->device_id,
                                'user_type' =>"1",
                            );

                $otp_msg="Thankyou for registration";
                $resultlastid = DB::table('users')->insertGetId($setdata);
                $id="$resultlastid";
                $data['status'] = "true";
                $data['message'] = "Registration successfully";
                $data['user_id'] =$id;
                $data['user_type'] ="1";
              

            }
            else
            
            {

                $data['status'] = "true";
                $data['message'] = "Already Register";
                $data['user_id'] =$check->id;
                $data['user_type'] =$check->user_type;
                $setdata['device_id']=$request->device_id;
                DB::table('users')->where('phone_no', $request->phone_no)->update($setdata);

            }
        }
        echo json_encode($data);
    
}

//********************************************REDMIES****************************************************************/

public function view_redmi(Request $request)
    {

         $checkuser = DB::table('redmi')->get();
	    if($checkuser)
        {

       
        if($checkuser){
        $data['data'] = $checkuser;
		$data['status'] = true;
		$data['message'] = "All Redmies";
        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found";

        }

        

        echo json_encode($data);
        }

    }


// sendtips
public function send_tips_to_customer(Request $request)
    {
         $msg=$check->tips;
         $user_id=$check->user_id;
         $device_id=$check->device_id;
         
         if($msg)
         {
             
             /* $data['data'] = $checkuser;
	          $data['status'] = true;
		      $data['message'] = "All astrology remedies ";*/
             
         }
         
         
        
       

        // $checkuser = DB::table('redmi')->get();
    }





public function astro_tips(Request $request)
    {

         $checkuser = DB::table('astro_tips')->get();
	    if($checkuser)
        {

       
        if($checkuser){
        $data['data'] = $checkuser;
		$data['status'] = true;
		$data['message'] = "All astrology remedies ";
        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found";

        }

        

        echo json_encode($data);
        }

    }



public function get_banner_images(Request $request)
    {

        $validator = Validator::make($request->all(), [
//'astro_id'      =>  'required',


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

        }else{

	            $liveevents = DB::table('live_events')
              ->select('live_events.*',DB::raw('CONCAT("http://md-54.whb.tempwebhost.net/~democdyb/astrologer/images/event_img", "", event_img) AS img_url'))
              ->where('page_type',1)->get();

               if($liveevents){
                $data['status'] = "true";
                $data['live_events'] =$liveevents;
                $data['message'] ='All events';
                }else
                {


				$data['status'] = false;
				$data['message'] = "Data does not found";
                }
              echo json_encode($data);


    }
}


 public function redmy_list(Request $request)
    {
        $result=[];
         
         if(empty($request->user_id) && empty($request->user_type) )
         {
       
		$data['status'] = false;
		$data['message'] = "required";
             
         }else{
             if($request->user_type==1)
             {
         $checkuser = DB::table('add_remedy')->where('user_id',$request->user_id)->get();
                 
             }
             else{
         $checkuser = DB::table('add_remedy')->where('astro_id',$request->user_id)->get();
                 
             }
             
	    if($checkuser)
        {
            foreach($checkuser as $data)
            {
                
                $astrouser = DB::table('users')->where('id',$data->astro_id)->get();
                $user = DB::table('users')->where('id',$data->user_id)->get();
        
                $array=array('id'=>$data->id,
                'user_id'=>$data->user_id,
                'astro_id'=>$data->astro_id,
                'user_name'=>$user[0]->name,
                'astro_name'=>$astrouser[0]->name,
                'message'=>$data->message,
                'status'=>$data->status,
                'registration_date'=>$data->registration_date);
                
                array_push($result,$array);
              
            }
                  
            

  
$data=array('data'=>$result,'status'=>true,'message'=>"All remedies");

        }
        else
        {
                $data['data'] = 'Does not data found';
				$data['status'] = false;
				$data['message'] = "No data found";

        }

        

        }

         echo json_encode($data);
    

}


public function updateKundaliImage(Request $request)
{
     if(empty($request->id) && empty($request->name) )
         {
       
		$data['status'] = false;
		$data['message'] = "required";
             
         }else{
             $filename='horoscope/'.$request->name.'.jpg';
             
             DB::table('kundli')
        ->where('user_id', $request->id)  
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('generate_kundli_image' => $filename));
        $url=array('url'=>'http://md-54.whb.tempwebhost.net/~democdyb/astrologer/astrofeed/'.$filename);
$data=array('data'=>$url,'status'=>true,'message'=>"Kundali Inserted successfully");
         }
         
         
         echo json_encode($data);
         
         
// $url = "https://tenspark.com/astrologer/astrofeed/horoscope_chart_new.php";

// $curl = curl_init($url);
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_POST, true);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $headers = array(
//   "Content-Type: application/json",
// );
// curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// // $data = '{"login":"my_login","password":"my_password"}';

// // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// //for debug only!
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// $resp = curl_exec($curl);
// curl_close($curl);
// var_dump($resp);
    
}



// chat accpet reqquest

public function send_request(Request $request)
{

 $current_user=$request->sender_id;
 $receiver_id=$request->receiver_id; // login id user ki 
 $sender_id=$request->sender_id;
 $available_balance=DB::table('wallet_system')->where('user_id',$sender_id)->first();
 $astrologer = DB::table('users')->where('id',$request->receiver_id)->first();
 $user_name = DB::table('users')->where('id',$request->sender_id)->first();
 $device_token=$astrologer->device_id;
 $serverKey = 'AAAAzODils0:APA91bF0g4o4uOeS4wUpwpd2oKObETGn4HuKebWQUhLKVDEA9MyA8hS5MXdX-LMKsNJt6UsSnM6PBLtNfs_pS41wC5wrha2olFT7QOcaD5Nhvr_0G--8dgITuse4SXsIXsnt101eE7Om';
 $url1 = 'https://fcm.googleapis.com/fcm/send';
 if($astrologer)
{
    $astro_charge=$astrologer->per_minute * 5;
    if($astro_charge <= $available_balance->wallet_amount )
    {
       
        $insert= ['from_user_id'=>$request->receiver_id,'to_user_id'=>$request->sender_id,'status'=>'Pending'];
        $response= DB::table('chat_requests')->insertGetId($insert);  

        if(!defined( 'API_ACCESS_KEY')){
            define( 'API_ACCESS_KEY',$serverKey );
        }



        $headers = array (
            'Authorization:key=' . $serverKey,
            'Content-Type:application/json'
          );
            // Add notification content to a variable for easy reference
          $notifData = [
            'title' => 'Incoming chat request from '. $user_name->name,
            'body' =>'Incoming chat request from '. $user_name->name,
            'priority' => "high",
            'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
           // 'click_action' => "activities.SinglePostActivity" //Action/Activity - Optional
          ];
          $dataPayload = [
           'id'=> $response, 
           'sender_id'=>$request->sender_id,
           'receiver_id'=>$request->receiver_id,
           'user_name'=> $user_name->name, 
           'per_minute'=>$astrologer->per_minute,
           'user_image'=>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
           'type'=>'astrologer',
           'notification_type'=>'send_request',
           "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
           'title' => 'Incoming chat request from '. $user_name->name,
          'icon'  => 'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
           'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
          'sound'=>'http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Sevish_-__nbsp_.mp3'
          ];
         // echo $tokens;
          $apiBody = array(
            'notification' => $notifData,
            'data' => $dataPayload,
            'to' =>$device_token
         
          );
          $ch = curl_init();
          curl_setopt ($ch, CURLOPT_URL, $url1);
          curl_setopt ($ch, CURLOPT_POST, true);
          curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));
          $result = curl_exec($ch);
          return $result;


        // $msg = array
        //     (
        //     'body'  =>'Chat request from ' . $user_name->name,
        //     'title' => 'Incoming chat request from '. $user_name->name,
        //     'icon'  => 'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
        //     'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
        //  //   'sound'=>'http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Sevish_-__nbsp_.mp3'

        //     )



        // $fields = array
        // (
        //      'to'=>$device_token,
        //      'notification'    => $msg,
        //      'priority' => 'high'
        // );
        // $headers = array
        // (
        // 'Authorization: key=' . API_ACCESS_KEY,
        // 'Content-Type: application/json'
        // );
        // #Send Reponse To FireBase Server
        // $ch = curl_init();
        // curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        // curl_setopt( $ch,CURLOPT_POST, true );
        // curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        // curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        // curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        // curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields));
        // $result = curl_exec($ch);
        // curl_close( $ch );
   
        $data['message'] = 'Send request successfully';
        $data['status'] = true;
        $data['did']=$device_token;
        //     $data['message'] = "list";
    
    }else{

   $message ='Minimum balance of 5 minutes (INR '.$astro_charge.') is required to start chat with '.$astrologer->name;
 //  $response =['status'=>false,'message'=>$message];   
   //return json_encode($response);

        // $data['data'] =$response;
        $data['status'] = false;
        $data['message'] =$message;
        $data['did']=$device_token;
       // return json_encode($data);

    }

   return json_encode($data);




}


    
}

public function chat_accept(Request $request)
{
     $status=[];
     $sender_id= $request->sender_id;
     $receiver_id= $request->receiver_id;
    //   return $request->data;
    $url1 = 'https://fcm.googleapis.com/fcm/send';
   $status= DB::table('chat_requests')->where(['from_user_id'=>$sender_id,'to_user_id'=>$receiver_id,'status'=>'Pending'])->orderBy('id', 'DESC')->first();
   $user_name = DB::table('users')->where('id',$request->sender_id)->first();
   $astro_name = DB::table('users')->where('id',$request->receiver_id)->first();
   $serverKey = 'AAAAzODils0:APA91bF0g4o4uOeS4wUpwpd2oKObETGn4HuKebWQUhLKVDEA9MyA8hS5MXdX-LMKsNJt6UsSnM6PBLtNfs_pS41wC5wrha2olFT7QOcaD5Nhvr_0G--8dgITuse4SXsIXsnt101eE7Om';

   if(!empty($status)){

    if(!defined( 'API_ACCESS_KEY')){
        define( 'API_ACCESS_KEY',$serverKey );
    }

    $headers = array (
        'Authorization:key=' . $serverKey,
        'Content-Type:application/json'
      );
        // Add notification content to a variable for easy reference
      $notifData = [
        'title' => 'Incoming chat request from '. $astro_name->name,
        'body' =>'Incoming chat request from '. $astro_name->name,
        'priority' => "high",
        'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       // 'click_action' => "activities.SinglePostActivity" //Action/Activity - Optional
      ];
      $dataPayload = [
       'id'=> $response, 
       'user_name'=> $astro_name->name, 
       'user_image'=>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       'type'=>'customer',
       'notification_type'=>'accept',
       "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
       'title' => 'Your chat request accpeted from '. $astro_name->name,
      'icon'  => 'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
      'sound'=>'http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Sevish_-__nbsp_.mp3'
      ];
     // echo $tokens;
      $apiBody = array(
        'notification' => $notifData,
        'data' => $dataPayload,
        'to' =>$device_token
     
      );
      $ch = curl_init();
      curl_setopt ($ch, CURLOPT_URL, $url1);
      curl_setopt ($ch, CURLOPT_POST, true);
      curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));
      $result = curl_exec($ch);
      return $result;

    $data['data'] = $status;
    $data['status'] = true;
    $data['message'] = "list";
    }else{

     $data['data'] ="Astrologer does not found while you contact active astrologer";
     $data['status'] = false;
     $data['message'] = "No data found";
    }

    return json_encode($data);

}


public function cancle_request(Request $request)
{


    $url1 = 'https://fcm.googleapis.com/fcm/send';
    $serverKey = 'AAAAzODils0:APA91bF0g4o4uOeS4wUpwpd2oKObETGn4HuKebWQUhLKVDEA9MyA8hS5MXdX-LMKsNJt6UsSnM6PBLtNfs_pS41wC5wrha2olFT7QOcaD5Nhvr_0G--8dgITuse4SXsIXsnt101eE7Om';
    $user_id = DB::table('users')->where('id',$request->receiver_id)->first();
    $astro_name = DB::table('users')->where('id',$request->sender_id)->first();
    if(!defined( 'API_ACCESS_KEY')){
        define( 'API_ACCESS_KEY',$serverKey );
    }


    $headers = array (
        'Authorization:key=' . $serverKey,
        'Content-Type:application/json'
      );
        // Add notification content to a variable for easy reference
      $notifData = [
        'title' => 'Your request has been cancelled from'. $astro_name->name,
        'body' =>'Your request has been cancelled '. $astro_name->name,
        'priority' => "high",
        'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       // 'click_action' => "activities.SinglePostActivity" //Action/Activity - Optional
      ];
      $dataPayload = [
       'id'=> '', 
       'user_name'=> $astro_name->name, 
       'user_image'=>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       'type'=>'customer',
       'notification_type'=>'cancle',
       "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
       'title' => 'Your chat request accpeted from '. $astro_name->name,
      'icon'  => 'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
      'sound'=>'http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Sevish_-__nbsp_.mp3'
      ];
     // echo $tokens;
      $apiBody = array(
        'notification' => $notifData,
        'data' => $dataPayload,
        'to' =>$user_id->device_id
     
      );
      $ch = curl_init();
      curl_setopt ($ch, CURLOPT_URL, $url1);
      curl_setopt ($ch, CURLOPT_POST, true);
      curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));
      $result = curl_exec($ch);
      return $result;


    if($user){
    $data['data'] = $user;
    $data['status'] = true;
    $data['message'] = "list";
    }else{

     $data['data'] = 'Does not data found';
     $data['status'] = false;
     $data['message'] = "No data found";
    }

    return json_encode($data);


}


    public function approve_request(Request $request)
    {

    $serverKey = 'AAAAzODils0:APA91bF0g4o4uOeS4wUpwpd2oKObETGn4HuKebWQUhLKVDEA9MyA8hS5MXdX-LMKsNJt6UsSnM6PBLtNfs_pS41wC5wrha2olFT7QOcaD5Nhvr_0G--8dgITuse4SXsIXsnt101eE7Om';
    $update= ['status'=>'Approve'];
    $url1 = 'https://fcm.googleapis.com/fcm/send';
    $user= DB::table('chat_requests')->where('id',$request->id)->first();
    DB::table('chat_requests')->where(['id'=>$request->id,'status'=>'Pending'])->update($update);
    $user_name = DB::table('users')->where('id',$request->receiver_id)->first();

    //print_r($user_name);die;
    $astro_name = DB::table('users')->where('id',$request->sender_id)->first();

    if(!defined( 'API_ACCESS_KEY')){
        define( 'API_ACCESS_KEY',$serverKey );
    }


    $headers = array (
        'Authorization:key=' . $serverKey,
        'Content-Type:application/json'
      );
        // Add notification content to a variable for easy reference
      $notifData = [
        'title' => 'Your request has been accpeted from '. $astro_name->name,
        'body' =>'Your request has been accpeted from '. $astro_name->name,
        'priority' => "high",
        'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       // 'click_action' => "activities.SinglePostActivity" //Action/Activity - Optional
      ];
      $dataPayload = [
       'id'=> $request->id, 
       'user_name'=> $astro_name->name, 
       'user_image'=>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       'type'=>'customer',
       'sender_id'=>$request->sender_id,
       'receiver_id'=>$request->receiver_id,
       'per_minute'=>$request->per_minute,
       "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
       'notification_type'=>'accept',
       'title' => 'Your chat request accpeted from '. $astro_name->name,
      'icon'  => 'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
       'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
      'sound'=>'http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Sevish_-__nbsp_.mp3'
      ];
     // echo $tokens;
      $apiBody = array(
        'notification' => $notifData,
        'data' => $dataPayload,
        'to' =>$user_name->device_id
     
      );
      $ch = curl_init();
      curl_setopt ($ch, CURLOPT_URL, $url1);
      curl_setopt ($ch, CURLOPT_POST, true);
      curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));
      $result = curl_exec($ch);
      return $result;


    // $msg = array
    //     (
    //     'body'  =>'Chat request from accpeted',
    //     'title' => 'Incoming chat request from ',
    //     'icon'  => 'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
    //     'image' =>'https://collabdoor.com/public/front_img/Logo-removebg-preview%201.png',
    //  //  'sound'=>'http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Sevish_-__nbsp_.mp3'

    // );
    // $fields = array
    // (
    //      'to'=>$user_name->device_id,
    //      'notification'    => $msg,
    //      'priority' => 'high'
    // );
    // $headers = array
    // (
    // 'Authorization: key=' . API_ACCESS_KEY,
    // 'Content-Type: application/json'
    // );
    // #Send Reponse To FireBase Server
    // $ch = curl_init();
    // curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    // curl_setopt( $ch,CURLOPT_POST, true );
    // curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    // curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    // curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    // curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields));
    // $result = curl_exec($ch);
    // curl_close( $ch );

    if($user){
    $data['data'] = $user;
    $data['status'] = true;
    $data['sender_id']=$request->sender_id;
    $data['receiver_id']=$request->receiver_id;
    $data['message'] = "list";
    }else{

     $data['data'] = 'Does not data found';
     $data['status'] = false;
     $data['message'] = "No data found";
     $data['sender_id']=$request->sender_id;
     $data['receiver_id']=$request->receiver_id;
    }

    return json_encode($data);
   // return $user;

}



}




?>
