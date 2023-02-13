<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Validator;

use url;





class Ordercontroller extends Controller

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



        $users = DB::table('order_detail')->select('*')->get();

// print_r($users);
// die;

        return view('order', ['users' => $users]);

       

    }





       public function view_order(Request $request)

    {

           $id = $request->id;

        $order_detail = DB::table('order_detail')->find($id);



        return view('view_order', ['order_detail' => $order_detail]);

       

    }













 public function edit_order(Request $request)

    {

       /* $data = $request->id;

          Print_r($data); die;*/  

      /*  $user = User::find($id);*/

      $id = $request->id;

      $product = DB::table('order_detail')->find($id);

      



     return view('edit_order',['product' => $product]);

              

    }





 public function post_edit_order(Request $request)

    {

     /* $data = $request->input();

         Print_r($data); die;*/

            $id = $request->id;



             /* $input['order_no'] =$request->order_no;

              $input['customer_name'] =$request->customer_name;

              $input['name'] =$request->name;

              $input['address'] =$request->address;

              $input['city'] =$request->city;

              $input['state'] =$request->state;

              $input['zip_code'] = $request->zip_code;*/

              $input['status'] = $request->status;



           $result = DB::table('order_detail')->where('id', $id)->update($input);





        if($result){

             return redirect()->back()->with('message', 'Product has been update successfully .');

        }

        else{



            return redirect()->back()->with('message', 'Product not update .');

        }

              

    }









 public function delete_product(Request $request)

    {

       /* $data = $request->id;

          Print_r($data); die;*/  

      /*  $user = User::find($id);*/

      $id = $request->id;

     $userdelete =DB::table('product')->where('id', $id)->delete();



    if($userdelete){

           return redirect()->back()->with('message', "Product has been Delete successfully");

           

    }else{

            return redirect()->back()->with('message', "Something is wrong,try again");

             

       }    

    }















}

