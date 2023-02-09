<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Validator;

use url;





class Financecontroller extends Controller

{

    /**

     * Create a new controller instance.

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

        // echo "<pre>";

        // print_r($users_type); die;

       // $users = DB::table('users')->get();



        $users = DB::table('payment_history')->select('*')->get();

     

        return view('finance', ['users' => $users]);



       

    }





       public function view_invoice(Request $request)

    {

        



           $id = $request->id;

          $order_detail = DB::table('payment_history')->find($id);

          $detail = DB::table('payment_history')

            ->join('customer', 'customer.id', '=', 'payment_history.user_id')

            ->join('order_detail', 'order_detail.order_no', '=', 'payment_history.order_no')

            ->select('customer.*', 'order_detail.price', 'order_detail.quantity', 'order_detail.name as pro_name')->get();





              foreach($detail as $details){ 

                  

              }


// echo"<pre>";

// print_r($order_detail);

// print_r($details);

//  die;



        return view('invoice', ['order_detail' => $order_detail, 'details' => $details]);

        

    }











}

