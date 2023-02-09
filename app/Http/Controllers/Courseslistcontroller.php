<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\User;

use url;

use Validator;

use Auth;

use Session;


use Hesabe\Payment\Payment as HesabePayment;


use App\Http\Controllers\Paymentcontroller;


class Courseslistcontroller extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

   /* public function __construct()

    {

        $this->middleware('auth');



    }*/



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $courses = DB::table('courses')->select('*')->paginate(12);                               

       $banner = DB::table('banner')->get();

        $advertisement = DB::table('advertisement')->where('page_id', 5)

        ->where('status', 1)

        ->get();

        if(@$_GET['a']=='popular' || @$_GET['a'] =='popular#'){

            $courses = DB::table('courses') 
                ->whereRaw('FIND_IN_SET(0,section_type)')
                ->select('*')   
                ->paginate(12);
        }  

        if(@$_GET['a']=='top-courses' || @$_GET['a'] =='top-courses#'){

            $courses = DB::table('courses') 
                ->whereRaw('FIND_IN_SET(1,section_type)')
                ->select('*')   
                ->paginate(12);
        }  

        return view('web.courses', ['courses' => $courses, 'banner' => $banner, 'advertisement' => $advertisement]);

    }

     public function courses_detail(Request $request)

    {

        $id = $request->id;

        /*print_r($id); die;*/

        $detail = DB::table('courses')->where('courses.id', $id)

                        ->join('courses_images', 'courses_images.courses_id', '=', 'courses.id')

                        ->select('courses.*', 'courses_images.image as course_gallery')

                        ->get();



        $get_data = $detail[0]->required_accessories;

        $get_acces = explode(",",$get_data);

        $reuired_accessories=array();

        foreach ($get_acces as $key ) {

            $result = DB::table('product')->where('product.id', $key)

                        ->join('category', 'category.id', '=', 'product.category_id')

                        ->select('product.*', 'category.name as cat_name')

                        ->get();

            array_push($reuired_accessories, $result[0]);

        }

        $user = Auth::guard('customer')->user();

        $review = DB::table('reviews')

                    ->select('reviews.*', 'customer.name', 'customer.last_name')

                    ->join('customer', 'reviews.user_id','=','customer.id')

                    ->where('reviews.pro_id',$id)->get();    

        // echo"<pre>";

        // print_r($review);die;



        $courses = DB::table('courses')->get(); 

        $banner = DB::table('banner')->get();

        $advertisement = DB::table('advertisement')->where('page_id', 6)

                                ->where('status', 1)

                                ->get();

        $certification = DB::table('certification')->get();



        if($user = Auth::guard('customer')->user()){

            $user_id = $user->id;  

            $fav = DB::table('wish_list')->where('user_id', $user_id)

                            ->where('course_id', $id)->first();

        }else{

            return view('web.courses_detail',['proid' => $id, 'review' => $review, 'user' => $user, 'detail' => $detail, 'courses' => $courses, 'reuired_accessories' => $reuired_accessories, 'banner' => $banner, 'advertisement' => $advertisement, 'certification' => $certification]);

        }

        return view('web.courses_detail', ['proid' => $id, 'review' => $review, 'user' => $user, 'detail' => $detail, 'courses' => $courses, 'fav' => $fav, 'reuired_accessories' => $reuired_accessories, 'banner' => $banner, 'advertisement' => $advertisement, 'certification' => $certification]);

    }





    public function search(Request $request)

    {

      /*echo"<pre>";

        $data = $request->input();

        print_r($data); die;*/

        $name = $request->name;

        if($name == null)

        {

                $courses = DB::table('courses')->select('*')->paginate(12); 

                return view('web.courses', ['courses' => $courses]);

        }else{



                 $courses = DB::table('courses')->where('name','like',"%{$name}%")->paginate(12); 

                 return view('web.courses', ['courses' => $courses]);

        }        

    }



    public function reviews(Request $request){

        // echo "<pre>";print_r($_POST);die;

         $customMessages = [

                            'comment.required'     => 'Comment field is required!',

                          ];

        $validator =  Validator::make($request->all(), [

                                            'comment'        =>  'required', 

                                          ],$customMessages);

        if ($validator->fails()) {     

             return redirect()->back()->withErrors($validator);

        }else{

            $review = [

                    'user_id'   =>  $request->userid,

                    'pro_id'    =>  $request->pro_id,

                    'rating'    =>  $request->rating,

                    'comment'   =>  $request->comment

                ];

            $result = DB::table('reviews')->insert($review);

        }

        if($result){

            return redirect()->back()->with('success', 'Review successfully Added.');

        }else{

            return redirect()->back()->with('warning', 'Register not.');

        }

        

    }

 
    public function courses_booking(Request $request)
    { 
        // dd($request->all());
        // die;
        $UserId =Auth::guard('customer')->user()->id;
        $customer_name =Auth::guard('customer')->user()->name;
        if(!$UserId){
           return response()->json(['result' => false,'message'=>"Please login first"]);
        }

        $detail = DB::table('courses')->where('id', $request->courses_id)->get();
        // $price_after_disc = $detail[0]->price - $detail[0]->discount_price;
        $price_after_disc = $detail[0]->discount_price;
        $mem_res = DB::table('order_detail')
                        ->where('user_id',$UserId)
                        ->where('Payment_status','1')
                        ->whereIn('membership_id', [1, 2, 3])
                        ->get();
        if(!empty($mem_res)){
        //   $price_after_discp = round(10 * ($price_after_disc / 100),2);
          $price_after_disc = $price_after_disc;
        }

        $orderData['amount']        = $price_after_disc;
        $orderData['created_at']    = date('Y-m-d h:i:s');
        $orderData['user_id']       = $UserId;
        $orderData['payment_type']  = 'unpaid';


         $ordernumber    = random_int(100, 100000);

         $order_detail =  [

                    'user_id'       =>  $UserId,
                    
                    'order_no'      =>  $ordernumber,

                    'order_id'      =>  '0',
                    'customer_name' =>  $customer_name,
                 
                    'pro_id'        => '0',

                    'course_id'        =>  $request->courses_id,
                    'name'          =>$detail[0]->name,

                    'actual_price'  =>  $detail[0]->price,

                    'price'         =>  $price_after_disc,

                    'quantity'      =>  $request->quantity,
                   
                    'status'        =>  '0',

                    'coupan'        =>  null,

                    'shipping'      =>  null,

                    'Payment_status'=>  1,
                    'type_name'     =>  'course',

                ];

                $result = DB::table('order_detail')->insert($order_detail);
               //$result = true; // DB::table('orders')->insert($orderData);
               if($result == true){

                  $baseUrl        =  url('/');

                  $ivKey          = '5NVdrlPVNnjo2Jy9';

                  $encryptionKey  = 'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg';

                  $accessCode     = 'c333729b-d060-4b74-a49d-7686a8353481';

                  $hesabe         = new HesabePayment($encryptionKey,$ivKey,$accessCode,true);

                  $courses_id         = $request->courses_id;

                  $ordernumber    = random_int(100, 100000);
           
                  $a =   $hesabe->checkout([

                                "merchantCode"  =>  '842217',

                                "amount"    =>  $orderData['amount'] ,

                                "paymentType"   =>  "0",

                                "responseUrl"   =>  url($baseUrl.'/payment_status'),

                                "failureUrl"  =>  url($baseUrl.'/payment_status'),

                                "orderReferenceNumber"=>$ordernumber,

                                "variable1"     =>  $request->courses_id,

                                "variable2"     =>  $UserId,

                                "variable3"     =>  $request->to_date,

                                "variable4"     =>  $request->from_date,

                                "variable5"     =>  'courses',

                                "version"       =>  "2.0",

                            ]);

               // dd($a);

            }else{

                return response()->json(['result' => false,'message'=>"Something went wrong"]);

            }

    }

    
}

