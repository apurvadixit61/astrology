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


class Boatlistcontroller extends Controller

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

        $boat = DB::table('boat')->select('*')->paginate(12); 

        $banner = DB::table('banner')->get();

         $advertisement = DB::table('advertisement')->where('page_id', 3)

        ->where('status', 1)

        ->get();

        if(@$_GET['a']=='popular' || @$_GET['a'] =='popular#'){

            $boat = DB::table('boat')
              ->whereRaw('FIND_IN_SET(0,section_type)')
              ->select('*')   
              ->paginate(12);
      }  

      if(@$_GET['a']=='top-boats' || @$_GET['a'] =='top-boats#'){

          $boat = DB::table('boat')
              ->whereRaw('FIND_IN_SET(1,section_type)')
              ->select('*')   
              ->paginate(12);
      }  


        return view('web.boat_listing', ['boat' => $boat, 'banner' => $banner, 'advertisement' => $advertisement]);

    }





     public function boat_detail(Request $request)

    {

      $id = $request->id;

      /*print_r($id); die;*/

      $detail = DB::table('boat')->where('id', $id)->get();

      $gallery = DB::table('boat_images')->where('boat_id', $id)->get();



      $boat = DB::table('boat')->get();

      $banner = DB::table('banner')->get();



       $advertisement = DB::table('advertisement')->where('page_id', 4)

        ->where('status', 1)

        ->get();



      return view('web.boat_detail', ['detail' => $detail, 'gallery' => $gallery, 'boat' => $boat, 'banner' => $banner, 'advertisement' => $advertisement]);

    }
  public function book_boat(Request $request)
  { 

    $UserId =Auth::guard('customer')->user()->id;
    $customer_name =Auth::guard('customer')->user()->name;
    if(!$UserId){
       return response()->json(['result' => false,'message'=>"Please login first"]);
    }

    $detail = DB::table('boat')->where('id', $request->boat_id)->get();

    // $price_after_disc = $detail[0]->price - $detail[0]->discount_price;
    $price_after_disc = $detail[0]->discount_price;
    $mem_res = DB::table('order_detail')
                    ->where('user_id',$UserId)
                    ->where('Payment_status','1')
                    ->whereIn('membership_id', [1, 2, 3])
                    ->get();
    if(!empty($mem_res)){
      // $price_after_discp = round(10 * ($price_after_disc / 100),2);
      // $price_after_disc = $price_after_disc - $price_after_discp;
      $price_after_disc = $price_after_disc;
    }

    $orderData['amount'] = $price_after_disc;
    $orderData['created_at'] = date('Y-m-d h:i:s');
    $orderData['user_id']= $UserId;
    $orderData['payment_type']= 'unpaid';


     $ordernumber    = random_int(100, 100000);

     $order_detail =  [

                'user_id'       =>  $UserId,
                'customer_name' =>  $customer_name,
                'name'          =>  $detail[0]->name,
                'order_no'      =>  $ordernumber,

                'order_id'      =>  '0',
       
                'pro_id'        => '0',

                'boat_id'        =>  $request->boat_id,

                'actual_price'  =>  $detail[0]->price,

                'price'         =>  $price_after_disc,

                'quantity'      =>  '0',

                'status'        =>  '0',

                'coupan'        =>  null,

                'shipping'      =>  null,

                'Payment_status'=>  0,
                'type_name'     =>  'boat',

            ];

            $result = DB::table('order_detail')->insert($order_detail);
           //$result = true; // DB::table('orders')->insert($orderData);
           if($result == true){

              $baseUrl        =  url('/');

              $ivKey          = '5NVdrlPVNnjo2Jy9';

              $encryptionKey  = 'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg';

              $accessCode     = 'c333729b-d060-4b74-a49d-7686a8353481';

              $hesabe         = new HesabePayment($encryptionKey,$ivKey,$accessCode,true);

              $boat_id         = $request->boat_id;

              $ordernumber    = random_int(100, 100000);
       
              $a =   $hesabe->checkout([

                            "merchantCode"  =>  '842217',

                            "amount"    =>  $orderData['amount'] ,

                            "paymentType"   =>  "0",

                            "responseUrl"   =>  url($baseUrl.'/payment_status'),

                            "failureUrl"  =>  url($baseUrl.'/payment_status'),

                            "orderReferenceNumber"=>$ordernumber,

                            "variable1"     =>  $request->boat_id,

                            "variable2"     =>  $UserId,

                            "variable3"     =>  $request->to_date,

                            "variable4"     =>  $request->from_date,

                            "variable5"     =>  'boat',

                            "version"       =>  "2.0",

                        ]);

           // dd($a);

        }else{

            return response()->json(['result' => false,'message'=>"Something went wrong"]);

        }

    }
}

