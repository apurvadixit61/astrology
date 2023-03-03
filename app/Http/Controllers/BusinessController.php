<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;

class BusinessController extends Controller

{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = DB::select('select * from users where `user_type`=1');

        return view('users', ['users' => $users]);

    }

    
    public function gallery()
    {

      $users = DB::select('select * from users where `user_type`=2');
      $galleries=DB::table('astro_gallery')
      ->select('astro_gallery.*', 'users.name')
      ->leftJoin('users', 'astro_gallery.userid', 'users.id')
      ->get();

        return view('gallery', ['galleries' => $galleries,'users'=>$users]);

    }

public function uploadgalleries(Request $request)
{

    $input=$request->all();
    $images=array();
    if($files=$request->file('files')){
        foreach($files as $file){

            $coverpath = base_path() . '/images/astro_gallery/';

            $file->move($coverpath,  '/'.time().$file->getClientOriginalName());

            $event_img = '/'.time().$file->getClientOriginalName();

            DB::table('astro_gallery')->insert(array('userid'=>$request->id,'image'=>$event_img));

        }
    }

    return redirect()->back()->with('message', 'Gallery added successfully.');

}

public function gallery_delete($id)
{

  $userdelete =DB::table('astro_gallery')->where('id', $id)->delete();

  return redirect()->back()->with('message', 'Photo deleted successfully.');


}

    public function generated_kundli()
    {

        $kundli = DB::table('kundli')->select('*')->orderBy('id', 'desc')->get();

        return view('generated_kundli', ['kundli' => $kundli]);

    }

    public function getuserdata(Request $request){

     $postid = $request->postid;

      $users = DB::table('users')->where('id',$postid)->get();


         return view('getuserdata',['users' => $users]);
    }

      public function getastrodata(Request $request){

     $postid = $request->postid;

      $users = DB::table('users')->where('id',$postid)->get();


         return view('astroView',['users' => $users]);
    }


       public function getbillingdata(Request $request){

        $postid = $request->postid;

        $billing = DB::table('billing_tbl')->where('id',$postid)->get();


         return view('billingViewinModal',['billing' => $billing]);
    }



     public function changeWithdrawStatusData(Request $request){

       $status = $request->status;
        $data_id = $request->data_id;
           $date= date('Y-m-d');
       $changeStatus = DB::table('billing_tbl')->where('id',$data_id)->update(['status' => $status , 'approve_date' => $date]);

       if($changeStatus){
                $data['status'] = "true";
                $data['message'] = "success";
            }else{

               $data['status'] = "false";
               $data['message'] = "error";

            }
            echo json_encode($data);
     }

     public function checkEmailData(Request $request){

      $email = $request->input('email');
    $isExists =  DB::table('users')->where('email',$email)->first();

    if($isExists){
                $data['status'] = "true";
                $data['message'] = "success";
            }else{

               $data['status'] = "false";
               $data['message'] = "error";

            }
      echo json_encode($data);
}

    // public function billing()
    // {

    //     $users = DB::table('billing_tbl')->select('*')->orderBy('id', 'desc')->get();

    //     return view('billing', ['users' => $users]);

    // }
    
    public function billing()
    {

        $users = DB::table('billing_tbl')->select('billing_tbl.*','u.name','n.name as username')->leftJoin('users as u', 'billing_tbl.astrologer_id','u.id')->leftJoin('users as n', 'billing_tbl.user_id','n.id')->orderBy('id', 'desc')->get();

        return view('billing', ['users' => $users]);

    }

     public function withdrawal_request()
    {

        $users = DB::table('billing_tbl')->select('*')->orderBy('id', 'desc')->get();

        return view('withdrawal_request', ['users' => $users]);

    }


    public function live_events()
    {

        $users = DB::table('live_events')->select('*')->orderBy('id', 'desc')->get();
       //$option = DB::table('users')->get();

        return view('live_events', ['users' => $users]);

    }
     public function client_testimonial()
    {

        $users = DB::table('client_testtimonial')->select('*')->orderBy('id', 'desc')->get();
      $option = DB::table('users')->get();

        return view('client_testimonial', ['users' => $users,'option'=>$option]);

    }
     public function astro_news()
    {

        $users = DB::table('astro_news')->select('*')->orderBy('id', 'desc')->get();
        $option = DB::table('users')->get();

        return view('astro_news', ['users' => $users,'option'=>$option]);

    }
     public function notification()
    {

        $users = DB::table('notification')->select('*')->orderBy('id', 'desc')->get();
        $option = DB::table('users')->get();

        return view('notification', ['users' => $users,'option'=>$option]);

    }

   public function checknotificationdata()
   {
     $isExists =  DB::table('notification')->orderBy('id', 'desc')->get();

     if($isExists){
                 $data['status'] = "true";
                 $data['message'] = "success";
                 $data['result'] = $isExists;
             }else{

                $data['status'] = "false";
                $data['message'] = "error";

             }
       echo json_encode($data);
   }

     public function astrologer()
    {
  
        //$users = DB::table('users')->select('*')->orderBy('id', 'desc')->get();
       	$users = DB::table('users')->where('user_type',2)->latest()->get();

       return view('astro', ['users' => $users]);

    }

    public function edit_events(Request $request)
    {
      $id = $request->id;


      $events=DB::table('live_events')->where('id',$id)->get();

      $event_name=$events[0]->event_name;
      $video_url=$events[0]->video_url;
      $event_date=$events[0]->event_date;
      $event_img=$events[0]->event_img;
      if($request->event_name!=''){
        $event_name=$request->event_name;

      }
      if($request->video_url!=''){
        $video_url=$request->video_url;

      }
      if($request->event_date!=''){
        $event_date=$request->event_date;

      }

      if($request->event_img!=''){
         $coverfile = $request->event_img;


         $coverpath = base_path() . '/images/event_img/';

         $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

         $event_img = '/'.time().$coverfile->getClientOriginalName();

         // print_r($coverimg_name);die();
     }

     $changeStatus = DB::table('live_events')->where('id',$id)->update(['event_name' => $event_name , 'video_url' => $video_url,
     'event_date' => $event_date , 'event_img' => $event_img,]);

     return redirect()->back()->with('message', 'Event updated successfully.');





    }

     public function sendNotificationBYID($did,$msgs,$imgs=''){

          $menu_query = DB::table('users')->get();
         if(!defined( 'API_ACCESS_KEY')){
            define( 'API_ACCESS_KEY', 'AAAAzODils0:APA91bHrxcdk5kefPGA9cv-JCAvVoV-9t0D4CBCDJI3pcD137y0EEKAlG40wF1mrD18sAWCmKgH7EOcmKKqGjP0pC28Co5UZw0DxL2JDWTDFPuDSk4UebmSOc5RHY01zcgsPS5-YaxMW' );
        }
 if(empty($imgs))
 {
   $msg = array
       (
       'body'  =>$msgs,
       'title' => 'Astro - Notification',
       'icon'  => 'astro.png'
   );
 }
 else{
   // $url='http://tenspark.com/astrologer/images/notification_imgs'.$imgs;


   $msg = array
       (
       'body'  =>$msgs,
       'title' => 'Astro - Notification',
       'icon'  => 'astro.png',
       'image'=>'http://tenspark.com/astrologer/images/astro_news/news_logo.png',
   );

 }


        //foreach($menu_query as $val){
        $fields = array
        (
           'to'=>$did,
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


    public function sendNotification($msgs){



        $menu_query = DB::table('users')->get();
         if(!defined( 'API_ACCESS_KEY')){
            define( 'API_ACCESS_KEY', 'AAAAzODils0:APA91bHrxcdk5kefPGA9cv-JCAvVoV-9t0D4CBCDJI3pcD137y0EEKAlG40wF1mrD18sAWCmKgH7EOcmKKqGjP0pC28Co5UZw0DxL2JDWTDFPuDSk4UebmSOc5RHY01zcgsPS5-YaxMW' );
        }

        $msg = array
            (
            'body'  =>$msgs,
            'title' => 'Astro - Notification',
            'icon'  => 'astro.png'
        );


        foreach($menu_query as $val){
        $fields = array
        (
           'to'=>$val->device_id,
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
}


    public function add_notification(Request $request){

        $date = date('Y-m-d H:i:s');

        $result='';
        $coverimg_name='';
        if($request->user_name!='ALL')
        {
        $val=explode("/",$request->user_name);
        $dev=$val[0];
        $user_id=$val[1];

        if($request->image!=''){
           $coverfile = $request->image;


           $coverpath = base_path() . '/images/notification_imgs/';

           $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

           $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
           // print_r($coverimg_name);die();
       }

        $result = DB::table('notification')->insert(
         array(
                'message'   =>   $request->message,
                'user_id'   =>   $user_id,
                'image'=>$coverimg_name
                )
        );

        }
        else
        {
              //   $val=explode("/",$request->user_name);
            //   $dev=$val[0];
            //   $user_id=$val[1];


        $result = DB::table('notification')->insert(
         array(
                'message'   =>   $request->message,
                 'type'=>'ALL',
               // 'user_id'   =>   '',
                )
        );



        }

        if($result){
            $msgs="$request->message";
            if($request->user_name!="ALL")
            {
              if($request->image!=''){

                $datas=$this->sendNotificationBYid($dev,$msgs,$coverimg_name);

                }
                else{
                  $datas=$this->sendNotificationBYid($dev,$msgs);

                }

               $val=explode("/",$request->user_name);
               $dev=$val[0];
               $user_id=$val[1];

            // $datas=$this->sendNotificationBYid($dev,$msgs);
            }elseif($request->user_name=='ALL')
            {
                $datas=$this->sendNotification($msgs);

            }

            return redirect()->back()->with('message', 'Notification has been added successfully.');
        }
        else
        {
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }



    /**
    * @fucntion for create business category.
    *
    */
    public function create(Request $request){

        $destinationPath = base_path() . '/images/company_category_img/';
        $photo = $request->image;
        $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
        $photo_name = '/'.time().$photo->getClientOriginalName();
        $result = DB::table('company_categories')->insert(
         array(
                'name'   =>   $request->name,
                'description'   =>  $request->description,
                'image'   =>    $photo_name
         )
        );
        if($result){
             return redirect()->back()->with('message', 'Category type has been added successfully.');
        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }
    /**
    * @fucntion for create business Sub category.
    *
    */
    public function subcreate(Request $request){

       $customMessages = [
          'requireds' => 'Please fill .',
          'required' => 'Please fill.'
         ];

         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'company_categories_id'  => 'required',
        ],$customMessages);

         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        }else{
            $destinationPath = base_path() . '/images/company_subcategory_img/';
            $photo = $request->image;
            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
            $photo_name = '/'.time().$photo->getClientOriginalName();

              $input['name'] =$request->name;
              $input['description'] =$request->description;
              $input['company_categories_id'] =$request->company_categories_id;
              $input['image']= $photo_name;
              $result = DB::table('company_subcategories')->insert(array($input));
        }
        if($result){
             return redirect()->back()->with('message', 'Sub Category type has been added successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }
    /**
    * @fucntion for VIew category.
    *
    */
    public function view_category(){

        $users = DB::table('company_categories')->select('*')->orderBy('id', 'desc')->get();
        return view('business_cat', ['users' =>$users]);
    }
    /**
    * @fucntion for  view Sub category.
    *
    */
    public function view_subcategory(){

        $users = DB::table('company_subcategories')->select('*')->get();
        $product_cat = DB::table('company_categories')->select('*')->orderBy('id', 'desc')->get();

        //print_r($product_cat);die;

        return view('business_subcat', ['users' =>$users,'product_cat'=>$product_cat]);
    }


     public function add_event(Request $request)
  {


                $check = DB::table('live_events')->where('id',$request->id)->first();


                if(empty($check)){
                $digits = 5;
                $otp= rand(pow(10, $digits-1), pow(10, $digits)-1);


                $coverimg_name='';


                if(!empty($request->event_img))
                {

                     $coverimg_name= $request->event_img;

                   // print_r($coverimg_name);die();


                }


                 if($request->event_img!=''){
                    $coverfile = $request->event_img;


                    $coverpath = base_path() . '/images/event_img/';

                    $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

                    $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                    // print_r($coverimg_name);die();
                }

                //echo $coverimg_name;die;


                $current_date=date('y-m-d H:i:s');
                $result = DB::table('live_events')->insert(
                array(

                                'event_name'                     =>  $request->event_name,
                                'event_img'                =>  $coverimg_name,
                                'event_date'                => $current_date ,
                                'video_url' => $request->video_url

                )




        );

        if($result){
             return redirect()->back()->with('message', 'New Event added successfully');
             // echo $result;die();

        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }
    // else
    // {
    //                  return redirect()->back()->with('message', 'This Email already exist with another user');

    // }


}


    public function add_testimonial(Request $request)
  {


                $check = DB::table('client_testtimonial')->where('id',$request->id)->first();


                if(empty($check)){
                $digits = 5;
                $otp= rand(pow(10, $digits-1), pow(10, $digits)-1);


                $coverimg_name='';


                // if(!empty($request->video_url))
                // {

                //      $coverimg_name= $request->video_url;

                //   // print_r($coverimg_name);die();


                // }


                 if($request->image!=''){
                    $coverfile = $request->image;

                    $coverpath = base_path() . '/images/testimonial_users/';

                    $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

                    $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                    // print_r($coverimg_name);die();
                }

                if($request->coverimage!=''){
                   $file = $request->coverimage;

                   $path = base_path() . '/images/testimonial_thumbnail/';

                   $file->move($path,  '/'.time().$file->getClientOriginalName());

                   $img_name = '/'.time().$file->getClientOriginalName();
                   // print_r($coverimg_name);die();
               }

                //echo $coverimg_name;die;


                $current_date=date('y-m-d H:i:s');
                $result = DB::table('client_testtimonial')->insert(
                array(


                  'user_name'                =>  $request->user_name,
                  'location'                =>  $request->location,
                  'image'                =>  $coverimg_name,
                  'coverimg'                =>  $img_name,
                                   'video_url'                =>  $request->video_url,

                                'created_date'                => $current_date ,

                )




        );

        if($result){
             return redirect()->back()->with('message', 'New Testmonial added successfully');
             // echo $result;die();

        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }
    // else
    // {
    //                  return redirect()->back()->with('message', 'This Email already exist with another user');

    // }


}

public function edit_testimonial(Request $request)
{


            $check = DB::table('client_testtimonial')->where('id',$request->id)->first();
$user_name=$request->user_name;
$location=$request->location;
$video_url=$request->video_url;
$created_date=$request->created_date;

              if($request->user_name==''){

                $user_name=$check->user_name;
              }
              if($request->location==''){
                $location=$check->location;

              }

              if($request->video_url==''){
                $video_url=$check->video_url;

              }

              if($request->created_date==''){
                $created_date=$check->created_date;

              }
              $coverimg_name=$check->image;
               $img_name=$check->coverimg;


           if($request->image!=''){
                $coverfile = $request->image;

                $coverpath = base_path() . '/images/testimonial_users/';

                $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

                $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                // print_r($coverimg_name);die();
            }

            if($request->coverimage!=''){
               $file = $request->coverimage;

               $path = base_path() . '/images/testimonial_thumbnail/';

               $file->move($path,  '/'.time().$file->getClientOriginalName());

               $img_name = '/'.time().$file->getClientOriginalName();
               // print_r($coverimg_name);die();
           }

            //echo $coverimg_name;die;


            $current_date=date('y-m-d H:i:s');
            $result = DB::table('client_testtimonial')->where('id',$request->id)->update(
            array(


              'user_name'                =>  $user_name,
              'location'                =>  $location,
              'image'                =>  $coverimg_name,
              'coverimg'                =>  $img_name,
                               'video_url'                =>  $video_url,

                            'created_date'                => $created_date ,

            )




    );

         return redirect()->back()->with('message', 'Testmonial edited successfully');




}


 public function add_news(Request $request)
  {


                $check = DB::table('astro_news')->where('id',$request->id)->first();


                if(empty($check)){
                $digits = 5;
                $otp= rand(pow(10, $digits-1), pow(10, $digits)-1);


                // $coverimg_name='';


                // if(!empty($request->video_url))
                // {

                //      $coverimg_name= $request->video_url;

                //   // print_r($coverimg_name);die();


                // }


                 if($request->image!=''){
                    $coverfile = $request->image;

                    $coverpath = base_path() . '/images/astro_news/';

                    $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

                    $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                    // print_r($coverimg_name);die();
                }

                //echo $coverimg_name;die;


                $current_date=date('y-m-d H:i:s');
                $result = DB::table('astro_news')->insert(
                array(


                                'video_url'                =>  $coverimg_name,
                                'news_url'                =>  $request->news_url,
                                  'news'                 =>  $request->news,
                                  'title' => $request->title,
                                'created_date'                => $current_date ,
                                'news_image'=> 'news_logo.jpg',
                                'news_author'=>'By Admin'

                )




        );

        if($result){
             return redirect()->back()->with('message', 'New News added successfully');
             // echo $result;die();

        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }
    // else
    // {
    //                  return redirect()->back()->with('message', 'This Email already exist with another user');

    // }


}


 public function edit_news(Request $request)
  {


                $check = DB::table('astro_news')->where('id',$request->id)->first();


                  $title=$check->title;
                  $news_url=$check->news_url;
                  $news=$check->news;
                  $coverimg_name=$check->video_url;
                  $news_date=$check->created_date;

                  if($request->title!=''){

                    $title=$request->title;
                  }
                  if($request->news_url!=''){

                    $news_url=$request->news_url;
                  }
                  if($request->news!=''){

                    $news=$request->news;
                  }

                  if($request->news_date!=''){

                    $news_date=$request->news_date;
                  }


                 if($request->image!=''){
                    $coverfile = $request->image;

                    $coverpath = base_path() . '/images/astro_news/';

                    $coverfile->move($coverpath,  '/'.time().$coverfile->getClientOriginalName());

                    $coverimg_name = '/'.time().$coverfile->getClientOriginalName();
                    // print_r($coverimg_name);die();
                }

                //echo $coverimg_name;die;

                $result = DB::table('astro_news')->where('id',$request->id)->update(
                array(


                                'video_url'                =>  $coverimg_name,
                                'news_url'                =>  $news_url,
                                  'news'                 =>  $news,
                                  'title' => $title,
                                'created_date'                => $news_date ,
                                'news_image'=> 'news_logo.jpg',
                                'news_author'=>'By Admin'

                )




        );

             return redirect()->back()->with('message', ' News updated successfully');
             // echo $result;die();

    // else
    // {
    //                  return redirect()->back()->with('message', 'This Email already exist with another user');

    // }


}

 	public function delete_users123(Request $request){
   	  // echo $request;die();
   	          $id = $request->id;

   	        //   echo $id; die();
              $userdelete =DB::table('live_events')->where('id', $id)->delete();

  //echo $userdelete; die();

    if($userdelete){

           return redirect()->back()->with('message', "User has been Delete successfully");

            }else{

            return redirect()->back()->with('message', "Something is wrong,try again");



       }





	/*	 if(!empty($this->input->post()) && $this->input->is_ajax_request()){
	     $id= $this->input->post('id');
	     $query = $this->generalmodel->updaterecord('sub_category',array('delete_status'=>'1'),array('id'=>$id));
		// echo $this->db->last_query(); die;
	     if(!empty($query)){
	          $return= array('success'=>true,'msg'=>'Added successfully');
	     }else{
	        $return= array('success'=>false,'msg'=>'Something went wrong');
	     }
		  echo json_encode($return);
		 }  */
	}

		public function delete_users12(Request $request){
   	  // echo $request;die();
   	          $id = $request->id;

   	        //   echo $id; die();
              $userdelete =DB::table('client_testtimonial')->where('id', $id)->delete();

  //echo $userdelete; die();

    if($userdelete){

           return redirect()->back()->with('message', "User has been Delete successfully");

            }else{

            return redirect()->back()->with('message', "Something is wrong,try again");



       }





	/*	 if(!empty($this->input->post()) && $this->input->is_ajax_request()){
	     $id= $this->input->post('id');
	     $query = $this->generalmodel->updaterecord('sub_category',array('delete_status'=>'1'),array('id'=>$id));
		// echo $this->db->last_query(); die;
	     if(!empty($query)){
	          $return= array('success'=>true,'msg'=>'Added successfully');
	     }else{
	        $return= array('success'=>false,'msg'=>'Something went wrong');
	     }
		  echo json_encode($return);
		 }  */
	}

		public function delete_users1(Request $request){
   	  // echo $request;die();
   	          $id = $request->id;

   	        //   echo $id; die();
              $userdelete =DB::table('astro_news')->where('id', $id)->delete();

  //echo $userdelete; die();

    if($userdelete){

           return redirect()->back()->with('message', "User has been Delete successfully");

            }else{

            return redirect()->back()->with('message', "Something is wrong,try again");



       }





	/*	 if(!empty($this->input->post()) && $this->input->is_ajax_request()){
	     $id= $this->input->post('id');
	     $query = $this->generalmodel->updaterecord('sub_category',array('delete_status'=>'1'),array('id'=>$id));
		// echo $this->db->last_query(); die;
	     if(!empty($query)){
	          $return= array('success'=>true,'msg'=>'Added successfully');
	     }else{
	        $return= array('success'=>false,'msg'=>'Something went wrong');
	     }
		  echo json_encode($return);
		 }  */
	}


}
