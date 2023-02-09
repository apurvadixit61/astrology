<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;

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

        $getcart = DB::table('cart')->where('user_id', $user_id)->get();

        $subtotal = DB::table('cart')->where('user_id', $user_id)->sum('total_price');
        $type = DB::table('cart')->select('type')->where('user_id', $user_id)->get();

        $store = DB::table('store')->where('status', 1)->get();
        
        return view('web.cart', ['getcart' => $getcart, 'subtotal' => $subtotal, 'type' => $type, 'store' => $store]);
    }


    public function addcart(Request $request)
    {  
// echo "<pre>";print_r($request->pro_id);die;
        if($user = Auth::guard('customer')->user()){ 
            $user_id = $user->id;
        }else{ 
			return redirect()->back()->with('warning', 'Before add to cart login your account .');
		}
// echo $request->pro_id;
// print_r($user_id);
		$checdata = DB::table('cart')
					->where('pro_id', $request->pro_id)
					->where('user_id', $user_id)->get();
		  
 // echo "<pre>";print_r($checdata);die;
          if($checdata != ''){ //echo "sasdf";die;
            $price = $request->price;
            $unit = $request->quantity + $checdata[0]->quantity;
            $total_price =  $price *  $unit;

            $input['quantity'] =$unit;
            $input['total_price'] =$total_price;

            $result = DB::table('cart')->where('id', $checdata[0]->id)->update($input);
          }else{
echo 5;die;
            $price = $request->price;
            $unit = $request->quantity;
            $total_price =  $price *  $unit;
            $input['pro_id'] =$request->pro_id;
            $input['name'] =$request->name;
            $input['unit_price'] =$request->price;
            $input['type'] =$request->type;
            $input['user_id'] =$user_id;
            $input['quantity'] =$request->quantity;
            $input['total_price'] =$total_price;
            $input['image'] =$request->img;
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
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
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
        $id = $request->cardid;

        $input['quantity'] = $request->q_value;
        $input['total_price'] =$request->price;    

        $result = DB::table('cart')->where('id', $id)->update($input);

        return ($result);
       
    }



public function check_out()
    {
       /* echo"<pre>";
       $data = $request->input();
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
     return view('web.thankyou');
    }

   






}
