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

use Hesabe\Payment\HesabeCrypt as HesabeCrypt;

use App\Http\Controllers\Paymentcontroller;



class Cartcontroller extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

  /*public function __construct()

    {

        Auth::guard('customer')->check();



        

    }*/



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    { 

        if($user = Auth::guard('customer')->user())

        {

            $user_id = $user->id;

        }else{

            return redirect()->back()->with('message', 'Login Please .');

        }

        $getcart = DB::table('cart')

					->select('cart.*','product.quantity as pro_qant','product.type as type')

					->join('product','cart.pro_id','=','product.id')

					->where('cart.user_id', $user_id)

                    // ->where('cart.quantity','<=','product.quantity')

					->get();
                    // foreach($getcart as $cartlist){ 

                    // }
                    // var_dump($getcart[1]->type);
                    // die();

        $coupan_coad = DB::table('coupan_code')->get();

        $shipping_charge = DB::table('shipping_charge')->first();

        $subtotal = DB::table('cart')->where('user_id', $user_id)->sum('total_price');

        $type = DB::table('cart')->select('type')->where('user_id', $user_id)->get();

        $store = DB::table('store')->where('status', 1)->get();

        return view('web.cart', ['getcart'=>$getcart, 'subtotal'=>$subtotal, 'type'=>$type, 'store'=>$store, 'coupan'=>$coupan_coad, 'shipping'=>$shipping_charge]);

    }





    public function addcart(Request $request)

    { 

        if($user = Auth::guard('customer')->user()){ 

            $user_id = $user->id;

        }else{ 

			return redirect()->back()->with('warning', 'Before add to cart login your account .');

		}

		$check = DB::table('cart')->where('pro_id', $request->pro_id)->where('user_id', $user_id)->count();

            if($check > 0){

                $checdata = DB::table('cart')->where('pro_id', $request->pro_id)->where('user_id', $user_id)->first();

                $price = $request->price;
                
                $unit = $request->quantity;

                $total_price =  $price *  $unit;

                $input['quantity'] = $unit;

                $input['total_price'] = $total_price;

                $result = DB::table('cart')->where('id', $checdata->id)->update($input);

            }else{

                $price              =   $request->price;

                $unit               =   $request->quantity;

                $total_price        =   $price *  $unit;

                $input['pro_id']    =   $request->pro_id;

                $input['name']      =   $request->name;

                $input['unit_price']=   $request->price;

                $input['type']      =   $request->type;

                $input['user_id']   =   $user_id;

                $input['quantity']  =   $request->quantity;

                $input['total_price']=  $total_price;

                $input['image']     =   $request->img;
                $input['product_color'] = 'NULL';
                 $input['product_size'] = 'NULL';
                   $input['number_of_day'] = 'NULL';
                $result = DB::table('cart')->insert(array($input));

        }

        if($result){

           return redirect()->back()->with('success', ' Product add to cart .');

        }

        else{

            return redirect()->back()->with('warning', 'Not add .');

        }

    }



	public function delete_cart(Request $request)

    {

		$id = $request->id;

		$userdelete =DB::table('cart')->where('id', $id)->delete();

		if($userdelete){

           return redirect()->back()->with('message', "Remove item successfully");

		}else{

            return redirect()->back()->with('message', "Something is wrong,try again");

		}    

    }



	public function updatecart(Request $request)

    {

        $id = $request->cartid;

		$price = $request->quant * $request->price * $request->day;

        $input['quantity'] =   $request->quant;

        $input['total_price'] =  $price;  

        $result = DB::table('cart')->where('id', $id)->update($input);

        return ($result);

    }



	public function check_out(Request $request)

    { 

        //    echo "<pre>";print_r($_POST);
        //     die();
		$id =Auth::guard('customer')->user()->id;
        $customer_name =Auth::guard('customer')->user()->name;
     
		if(!$id){

		   return response()->json(['result' => false,'message'=>"Please login first"]);

		}


        $ordernumber    = random_int(100, 100000);
        for ($i = 0; $i < count($request->quantity); $i++) {

            $order_detail = [

                'user_id'       =>  $id,
                
                'order_no'      =>  $ordernumber,

                'order_id'      =>  $request->card_id[$i],
                'customer_name' =>  $customer_name,
                'name'          =>  $request->product_name[$i],

                'pro_id'        =>  $request->pro_id[$i],

                'actual_price'  =>  $request->actual_price[$i],

                'price'         =>  $request->calprice[$i],

                'quantity'      =>  $request->quantity[$i],

                'status'        =>  $request->option,

                'coupan'        =>  $request->app_coupan,

                'shipping'      =>  $request->shipping,

                'Payment_status'=>  1,
                'type_name'     =>  'product',


            ];

            $result = DB::table('order_detail')->insert($order_detail);

        }



		if($result == true){

            $baseUrl        =  url('/');

		    $ivKey          = '5NVdrlPVNnjo2Jy9';

		    $encryptionKey  = 'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg';

		    $accessCode     = 'c333729b-d060-4b74-a49d-7686a8353481';

		    $hesabe         = new HesabePayment($encryptionKey,$ivKey,$accessCode,true);

            $pro_id         = implode(',',$request->pro_id);

            

            // echo "<pre>"; print_r($ordernumber);die;

			// $hesabe = new HesabePayment(

            //         'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg',

            //         '5NVdrlPVNnjo2Jy9',

            //         'c333729b-d060-4b74-a49d-7686a8353481',

            //         true

            //     );


// print_r($hesabe);
// die;
			$a =   $hesabe->checkout([

				            "merchantCode" 	=>  '842217',

                            "amount" 		=>  $request->total,

                            "paymentType" 	=>  "0",

                            "responseUrl" 	=>  url($baseUrl.'/payment_status'),

                            "failureUrl" 	=>  url($baseUrl.'/payment_status'),

                            "orderReferenceNumber"=>$ordernumber,

                            "variable1"     =>  $pro_id,

                            "variable2"     =>  $id,

                            "variable3"     =>  null,

                            "variable4"     =>  null,

                            "variable5"     =>  null,

                            "version"       =>  "2.0",

                        ]);

         

		$userdelete =DB::table('cart')->where('user_id', $id)->delete();

        }else{

            return response()->json(['result' => false,'message'=>"Something went wrong"]);

        }

    }

	

	public function payment_status(Request $request){
 		$input_ = $request->except("_token");
  	    /*  for testing card detail is 4012 8888 8888 1881  */
 		$ivKey = '5NVdrlPVNnjo2Jy9';
 		$encryptionKey = 'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg';
 		$accessCode = 'c333729b-d060-4b74-a49d-7686a8353481';
 		$hesabe = new HesabePayment($encryptionKey,$ivKey,$accessCode,false);
 		$encryptedData = $this->decrypt($input_['data'], $encryptionKey, $ivKey); 
        $responceData  =     json_decode($encryptedData);
        //  echo  '<pre>';
        //  print_r($responceData);

        // die;
        if($responceData->code!=1){
               return redirect('/failed');
                 //return response()->json(['result' => false,'message'=>$responceData->message]);
        }else{
            $input =  $responceData->response;
            $pro_id = explode(',',$input->variable1);
            if($responceData->status==''){
                $payment_status = 'Failed';
            }else{
                $payment_status = $responceData->status;
            }
            $save = [

                'order_no'      =>  $input->orderReferenceNumber,
                'transction_id' =>  $input->paymentId,
                'Payment_status'=>	$payment_status,
                'status'        =>  $payment_status,
                'updated_at'    =>  $input->paidOn 

            ];
// print_r( $save);
//             echo "<pre>";print_r(count($pro_id));
//             print_r($pro_id);

// die;
// dd();
            for($i=0; $i< count($pro_id); $i++){

                $check = DB::table('order_detail')->where('pro_id',$pro_id[$i])
                                                ->where('order_no',$input->orderReferenceNumber)
                                                ->where('user_id',$input->variable2)
                                                ->update($save);

             }   
        
            $order = [

                        'user_id'       =>  $input->variable2,

                        'transction_id' =>  $input->paymentToken,

                        'amount'        =>  $input->amount,

                        'payment_type'  =>  'paid',

                        'payment_id'    =>  1,

                        'created_at'    =>  $input->paidOn,

                        'paid_on'      =>  $input->paidOn,

                        'pay_response'  =>  $input->orderReferenceNumber,

                    ];
                    
            $payment=[
                'order_no' =>$input->orderReferenceNumber,
                'user_id' =>$input->variable2,
                'transction_id'=> $input->paymentId,
                'amount'=>$input->amount,
                'payment_type'=>'paid'
            ];
            $paymentdetail= DB::table('payment_history')->insert($payment);
            $completeorder = DB::table('orders')->insert($order);

             return redirect('/success');
        }

	}



public function get_membership(Request $request)

    { 

	
		$id =Auth::guard('customer')->user()->id;
        $customer_name =Auth::guard('customer')->user()->name;
// echo "<pre>";print_r($customer_name);
//     die();

		if(!$id){

		   return response()->json(['result' => false,'message'=>"Please login first"]);

		}

        
        $ordernumber    = random_int(100, 100000);
        $order_detail = [

            'user_id'       =>  $id,
            
            'order_no'      =>  $ordernumber,

            'order_id'      =>   $request->id,

            'pro_id'        =>  0,
            'membership_id' => $request->id,
            'actual_price'  => $request->price ,
            'customer_name' =>  $customer_name,
            'name'          =>$request->package_type,
            'price'         =>  $request->price,

            'quantity'      => '',

            'Payment_status'=>  1,
            'type_name'     =>  'membership',


        ];

        $result = DB::table('order_detail')->insert($order_detail);

    


		if($result == true){ //echo "ok";die;

            $baseUrl        =  url('/');

		    $ivKey          = '5NVdrlPVNnjo2Jy9';

		    $encryptionKey  = 'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg';

		    $accessCode     = 'c333729b-d060-4b74-a49d-7686a8353481';

		    $hesabe         = new HesabePayment($encryptionKey,$ivKey,$accessCode,true);

           

          

			$a =   $hesabe->checkout([

				            "merchantCode" 	=>  '842217',

                            "amount" 		=>  $request->price,

                            "paymentType" 	=>  "0",

                            "responseUrl" 	=>  url($baseUrl.'/mambership_status'),

                            "failureUrl" 	=>  url($baseUrl.'/mambership_status'),

                            "orderReferenceNumber"=>$ordernumber,

                            "variable1"     =>  $request->package_type,

                            "variable2"     =>  $id,

                            "variable3"     =>  null,

                            "variable4"     =>  null,

                            "variable5"     =>  null,

                            "version"       =>  "2.0",

                        ]);

            dd($a);

        }else{

            return response()->json(['result' => false,'message'=>"Something went wrong"]);

        }

    }

	

	public function mambership_status(Request $request){

		
        $input_ = $request->except("_token");
        /*  for testing card detail is 4012 8888 8888 1881  */
        $ivKey = '5NVdrlPVNnjo2Jy9';
        $encryptionKey = 'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg';
        $accessCode = 'c333729b-d060-4b74-a49d-7686a8353481';
        $hesabe = new HesabePayment($encryptionKey,$ivKey,$accessCode,false);
        $encryptedData = $this->decrypt($input_['data'], $encryptionKey, $ivKey); 
        $responceData  =     json_decode($encryptedData);
         //  echo  '<pre>';
         //  print_r($responceData);

         // die;
        if($responceData->code!=1){
               return redirect('/failed');
                 //return response()->json(['result' => false,'message'=>$responceData->message]);
        }else{
            $input =  $responceData->response;
            $pro_id = explode(',',$input->variable1);
            if($responceData->status==''){
                $payment_status = 'Failed';
            }else{
                $payment_status = $responceData->status;
            }
            $save = [

                'order_no'      =>  $input->orderReferenceNumber,
                'transction_id' =>  $input->paymentId,
                'Payment_status'=>  $payment_status,
                'status'        =>  $payment_status,
                'updated_at'    =>  $input->paidOn 

            ];
// print_r( $save);
//             echo "<pre>";print_r(count($pro_id));
//             print_r($pro_id);

// die;
// dd();
            for($i=0; $i< count($pro_id); $i++){

                $check = DB::table('order_detail')->where('pro_id',$pro_id[$i])
                                                ->where('order_no',$input->orderReferenceNumber)
                                                ->where('user_id',$input->variable2)
                                                ->update($save);

             }   
        
            $order = [

                        'user_id'       =>  $input->variable2,

                        'transction_id' =>  $input->paymentToken,

                        'amount'        =>  $input->amount,

                        'payment_type'  =>  'paid',

                        'payment_id'    =>  1,

                        'created_at'    =>  $input->paidOn,

                        'paid_on'      =>  $input->paidOn,

                        'pay_response'  =>  $input->orderReferenceNumber,

                    ];
                    $payment=[
                        'order_no' =>$input->orderReferenceNumber,
                        'user_id' =>$input->variable2,
                        'transction_id'=>  $input->paymentToken,
                        'amount'=>$input->amount,
                        'payment_type'=>'paid'
                    ];
            $paymentdetail= DB::table('payment_history')->insert($payment);

            $completeorder = DB::table('orders')->insert($order);

             return redirect('/success');
        }


		// $users_plan = [

		// 			'mambership'      	=>  $input['response']['variable1'],

		// 			'plan' 				=>  $input['response']['amount'],

		// 		];

        // echo "<pre>";print_r(count($pro_id));die;

			// $check1 = DB::table('customer')->where('id',$id)->update();

             

	}



    public function checkcoupan(Request $request){

        $coupen_code = $request->code;

        $discount = DB::table('coupan_code')->where('coupen',$coupen_code)->first();

        // $discount->discount_flat;

        // print_r($discount->discount_flat);die;

        // return $discount;

        return response()->json($discount->discount_flat);

    }


    function decrypt($code, $key, $ivKey): string{

         if (!(ctype_xdigit($code) && strlen($code) % 2 === 0)) {
            return false;
        }
        $code = $this->hex2ByteArray(trim($code));
        $code = $this->byteArray2String($code);
        $code = base64_encode($code);
        $decrypted = openssl_decrypt($code, 'AES-256-CBC', $key, OPENSSL_ZERO_PADDING, $ivKey);
        return $this->pkcs5Unpad($decrypted);
    }

     private static function hex2ByteArray($hexString)
    {
        $string = hex2bin($hexString);
        return unpack('C*', $string);
    }


    private static function byteArray2String($byteArray): string
    {
        $chars = array_map("chr", $byteArray);
        return implode($chars);
    }
    private static function pkcs5Unpad($text)
    {
        $pad = ord($text[strlen($text) - 1]);
        if ($pad > strlen($text)) {
            return false;
        }
        if (strspn($text, chr($pad), strlen($text) - $pad) !== $pad) {
            return false;
        }
        return substr($text, 0, -1 * $pad);
    }
                           
    function success(){
         return view('web.thankyou');
    }
    function failed(){
         return view('web.failedpayment');
    }
}

