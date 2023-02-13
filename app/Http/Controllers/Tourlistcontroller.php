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


class Tourlistcontroller extends Controller

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

        $tours = DB::table('tour')->select('*')->paginate(12); 

       $banner = DB::table('banner')->get();

       $advertisement = DB::table('advertisement')->where('page_id', 7)

        ->where('status', 1)

        ->get();

        if(@$_GET['a']=='popular' || @$_GET['a'] =='popular#'){

          $tours = DB::table('tour')
            ->whereRaw('FIND_IN_SET(0,section_type)')
            ->select('*')   
            ->paginate(12);
    }  

    if(@$_GET['a']=='top-tours' || @$_GET['a'] =='top-tours#'){

      $tours= DB::table('tour')
            ->whereRaw('FIND_IN_SET(1,section_type)')
            ->select('*')   
            ->paginate(12);
    }  

        return view('web.tour_listing', ['tours' => $tours, 'banner' => $banner, 'advertisement' => $advertisement]);

    }





     public function tour_detail(Request $request)

    {

      $id = $request->id;

      /*print_r($id); die;*/

      $detail = DB::table('tour')->where('id', $id)->get();



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



         //  echo"<pre>";

         // print_r($reuired_accessories);die;



      $tours = DB::table('tour')->get(); 

      $banner = DB::table('banner')->get();



        return view('web.tour_detail', ['detail' => $detail, 'tours' => $tours, 'reuired_accessories' => $reuired_accessories, 'banner' => $banner]);

    }



   

  public function search(Request $request)
  {   

        $type = $request->type;
        $name = $request->name;
        if($type){
 
                $tours = DB::table('tour')->where('type','like',"%{$type}%")->get(); 
                 return ($tours);
 
        }else if($type=='' || $type==null){
            $tours = DB::table('tour')->get(); 
            return ($tours);
        }else{

          $name = $request->name;
          if($name == null)
          {
               $tours = DB::table('tour')->select('*')->paginate(12); 
               return view('web.tour_listing', ['tours' => $tours]);
          }else{
                $tours = DB::table('tour')->where('name','like',"%{$name}%")->paginate(12); 
                return view('web.tour_listing', ['tours' => $tours]);
           }  

      }      

    }



    

   public function tour_inquery(Request $request){

   

      $input['name'] =$request->name;

      $input['email'] =$request->email;

      $input['to_date'] =$request->to_date;

      $input['from_date'] =$request->from_date;

      $input['adult'] =$request->adult;

      $input['child'] =$request->child;

      $input['senior'] =$request->senior;

      $input['comment'] =$request->comment; 

      $input['to_tour'] =$request->to_tour;

      $input['from_tour'] =$request->from_tour;

      $input['rout_type'] =$request->wayinq;
      $input['user_id'] = '0';
      $input['type'] = 'null';
      $input['source_lat'] = 'null';
      $input['source_long'] = 'null';
      $input['destination_lat'] = 'null';
      $input['destination_long'] = 'null';

      // echo"<pre>"; print_r($input); die;                              

            $result = DB::table('tour_request')->insert(array($input));

     

        if($result){



           return redirect()->back()->with('message', 'Tour Request add successfully .');



        }

        else{



            return redirect()->back()->with('message', 'Network Problem .');

        }

             

    }





  public function search_tours(Request $request)

    {   

       // echo "<pre>";

       // print_r($request->id);

       // die;

        $id = $request->id;

        $intype = 'Inside Kuwait';

       

        if($id == '1'){ 

              

                $tours = DB::table('tour')->where('type','like',"%{$intype}%")->paginate(12); 

                $banner = DB::table('banner')->get();

                $advertisement = DB::table('advertisement')->where('page_id', 7)

                  ->where('status', 1)

                  ->get();

                  // echo"<pre>";

                  // print_r($tours); die;

              return view('web.tour_listing', ['tours' => $tours, 'banner' => $banner, 'advertisement' => $advertisement]);



        }

        elseif($id == '2'){

                 $outtype = 'Outside Kuwait';

         

                $tours = DB::table('tour')->where('type','like',"%{$outtype}%")->paginate(12); 

                $banner = DB::table('banner')->get();

                $advertisement = DB::table('advertisement')->where('page_id', 7)

                  ->where('status', 1)

                  ->get();



              return view('web.tour_listing', ['tours' => $tours, 'banner' => $banner, 'advertisement' => $advertisement]);



      } else{



           return redirect()->back();



      }





    }



    public function tour_booking(Request $request)
    { 
      $UserId =Auth::guard('customer')->user()->id;
      $customer_name =Auth::guard('customer')->user()->name;
       $userDetail = DB::table('customer')->where('id', $UserId)->get();
        if(!$UserId){
           return response()->json(['result' => false,'message'=>"Please login first"]);
        }

        $detail = DB::table('tour')->where('id', $request->tour_id)->get();
        // $price_after_disc = $detail[0]->price - $detail[0]->discount_price;
        $price_after_disc = $detail[0]->discount_price;
     
        $mem_res = DB::table('order_detail')
                        ->where('user_id',$UserId)
                        ->where('Payment_status','1')
                        ->whereIn('membership_id', [1, 2, 3])
                        ->get();
        if(!empty($mem_res)){
          // $price_after_discp = round(10 * ($price_after_disc / 100),2);
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
                    'customer_name' =>  $customer_name,
                    'name'          =>  $detail[0]->name,
                    'order_id'      =>  '0',

                    'pro_id'        => '0',

                    'tour_id'        =>  $request->tour_id,

                    'actual_price'  =>  $detail[0]->price,

                    'price'         =>  $price_after_disc,
                  
                    'quantity'      =>  '0',

                    'status'        =>  '0',

                    'coupan'        =>  null,

                    'shipping'      =>  null,

                    'Payment_status'=>  1,

                    'type_name'     =>  'tour',

                ];

                $result = DB::table('order_detail')->insert($order_detail);
               
              


                // $tour_request =  [
                //   'name'      => $userDetail[0]->name,
                //   'email'     => $userDetail[0]->email,
                //   'to_date'   => date('Y-m-d'),,
                //   'from_date' => date('Y-m-d'),,
                //   'adult'     => $request->adult,
                //   'child'     => $request->child,
                //   'senior'    => null,
                //   'rout_type' => null,
                //   'type'      => null,
                //   'comment'      => null,
                //   'to_tour'      => null,
                //   'from_tour'      => null,
                //   'source_lat'      => null,
                //   'source_long'      => null,
                //   'destination_lat'      => null,
                //   'destination_long'      => null,
                  
                //   'user_id'   => $UserId,
                //   'created_at'   => date('Y-m-d H:i:s'),

                // ];
                 
                //  $result = DB::table('tour_request')->insert($tour_request);
                
               //$result = true; // DB::table('orders')->insert($orderData);
               if($result == true){

                  $baseUrl        =  url('/');

                  $ivKey          = '5NVdrlPVNnjo2Jy9';

                  $encryptionKey  = 'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg';

                  $accessCode     = 'c333729b-d060-4b74-a49d-7686a8353481';

                  $hesabe         = new HesabePayment($encryptionKey,$ivKey,$accessCode,true);

                  $tour_id         = $request->tour_id;

                  $ordernumber    = random_int(100, 100000);
           
                  $a =   $hesabe->checkout([

                                "merchantCode"  =>  '842217',

                                "amount"    =>  $orderData['amount'] ,

                                "paymentType"   =>  "0",

                                "responseUrl"   =>  url($baseUrl.'/payment_status'),

                                "failureUrl"  =>  url($baseUrl.'/payment_status'),

                                "orderReferenceNumber"=>$ordernumber,

                                "variable1"     =>  $request->tour_id,

                                "variable2"     =>  $UserId,

                                "variable3"     =>  $request->child,

                                "variable4"     =>  $request->adult,

                                "variable5"     =>  'tour',

                                "version"       =>  "2.0",

                            ]);

               // dd($a);

            }else{

                return response()->json(['result' => false,'message'=>"Something went wrong"]);

            }

    }
}

