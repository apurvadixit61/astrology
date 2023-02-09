<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;

class Customercontroller extends Controller
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

        $users = DB::table('customer')->orderBy('id', 'DESC')->get();
        return view('customer',['users' => $users]);
    }





     public function view_customerprofile(Request $request)
    {
        $id = $request->id;
      
       $details = DB::table('customer')->find($id);
       $orderdetails = DB::table('customer')
            ->join('order_detail', 'order_detail.user_id', '=', 'customer.id')
            ->select('order_detail.*')
            ->get();
         
       
          
        return view('customer_profile', ['details' => $details, 'orderdetails' => $orderdetails]);

        
    }



public function status_change(Request $request)
    {
      /*$data = $request->id;
          Print_r($data); die;  */
      /*  $user = User::find($id);*/
      $id = $request->id;
       $detail = DB::table('customer')->select('status')->find($id);

       if($detail->status == 1){

            $input['status'] = '0';
        $userupdate =DB::table('customer')->where('id', $id)->update($input);
       }else{

           $input['status'] = '1';
        $userupdate =DB::table('customer')->where('id', $id)->update($input);
       }


    if($userupdate){
           return redirect()->back();
           
    }else{
            return redirect()->back();
             
       }    
    }







 public function edit_customerprofile(Request $request)
    {
    
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $user = DB::table('customer')->find($id);
     return view('edit_customerprofile',['users' => $user]);
              
    }



 public function post_edit_customerprofile(Request $request)
    {
       /*$data = $request->input();
          Print_r($data); die;*/
     $id = $request->id;

      $destinationPath = base_path() . '/images/avatar/';
            $photo = $request->img;
            if(!empty($photo)){ 
            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());
             $photo_name = '1_'.time().$photo->getClientOriginalName();

              $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['email'] =$request->email;
              $input['address'] =$request->address;
              $input['mobile'] =$request->mobile;
              $input['city'] =$request->city;
              $input['state'] =$request->state;
              $input['zip_code'] =$request->zip_code;
              $input['image'] =$photo_name;

           $result = DB::table('customer')->where('id', $id)->update($input);

}
else{
              $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['email'] =$request->email;
              $input['address'] =$request->address;
              $input['mobile'] =$request->mobile;
              $input['city'] =$request->city;
              $input['state'] =$request->state;
              $input['zip_code'] =$request->zip_code;

         $result = DB::table('customer')->where('id', $id)->update($input);
     }
        if($result){
             return redirect()->back()->with('message', 'Customer has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Customer not update .');
        }
              
    }


public function edit_customerpassword(Request $request)
    {
       /* $data = $request->input();
          Print_r($data); die;*/ 
           $id = $request->id;
      $customMessages = [
          'required' => 'Please fill passwod.',
          'required' => 'Please confirm fill passwod.',
          'same' => 'Confirm password is not matched.'
         ];


         $validator = Validator::make($request->all(), [
            'password'      => 'required|min:6',
            'cnf_password'      => 'required|same:password',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
          $Hpassword = bcrypt($request->password);
          $doneUpdata = DB::table('customer')->where('id',$id)->update(['password'=>$Hpassword]);
          if($doneUpdata){
           return redirect()->back()->with('message', "Password has been changed");
           
          }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
          }
        }
       
              
    }



     











}
