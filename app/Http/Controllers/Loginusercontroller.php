<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Customer;

use url;

use Validator;

use Auth;

use Session;

use Hash;



class Loginusercontroller extends Controller

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



    //use AuthenticatesUsers;



     protected $redirectTo = 'product_listing';

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */


 public function login(Request $request)

    { 
        return view('home');
    }


    public function do_login(Request $request)

    { 
          // dd($request->all());  
        $customMessages = [

          'required' => 'Please fill email id.',

          'password.required' => 'Please fill password.',

         ];
         $validator = Validator::make($request->all(), [

            'email'      => 'required',

            'password'      => 'required|min:6',

        ],$customMessages);

         if ($validator->fails()) {

             return redirect()->back()->withErrors($validator);

        

        }else{

           

        $customer_auth = auth()->guard('customer');

        $credentials = array('email' => Input::get('email'), 'password' => Input::get('password'));

       

        if ($customer_auth->attempt($credentials)) {

            

                return redirect('/')->with('success', 'Login successfully.'); 

          }else{  

              return redirect()->back()->with('warning', "Invalid email or password. Try again!.");           

            } 



        }

            

    }



    public function redirectToProvider()

    {

        return Socialite::driver('google')->redirect();

    }



    /**

     * Obtain the user information from google.

     *

     * @return \Illuminate\Http\Response

     */

    public function handleProviderCallback()
    {

        $user = Socialite::driver('google')->user();

        $id = $user->id;

        $email = $user->email;

        $avatar = $user->avatar;

        $name = $user->name;

         $value = Customer::where('email', $email)->first();

        if($value){

                $customer_auth = auth()->guard('customer'); 

    // echo "<pre>";print_r($customer_auth);die;

                if($customer_auth->loginUsingId($value->id)){

                    return redirect('product_listing')->with('message', 'Login successfully.');

                }

                else{

                    return redirect()->back()->with('message', 'Wrong .');

                }

            }

            else{

    // echo "dsafsdf";die;

                $input['google_id'] = $id;

                $input['email'] = $email;

                $input['image'] = $avatar;

                $input['name'] = $name;

              

                $result = DB::table('customer')->insert(array($input));

                 // print_r($result); die;

                $customer_auth = auth()->guard('customer');

                $credentials = array('email' => $email);

                if($customer_auth->attempt($credentials)) {

                    return redirect('product_listing')->with('message', 'Login successfully.'); 

                }else{                   

                   return redirect()->back()->with('message', 'Wrong .');           

                } 

         

    }

}



    public function redirectToProviderfacebook()

    {

        // echo "facebook";die;

        return Socialite::driver('facebook')->redirect();

    }



    /**

     * Obtain the user information from facebook.

     *

     * @return \Illuminate\Http\Response

     */

    public function handleProviderCallbackfacebook()

    {

        $user = Socialite::driver('facebook')->user();

        $id = $user->id;

        $email = $user->email;

        $avatar = $user->avatar;

        $name = $user->name;

         $value = Customer::where('email', $email)->first();

        if($value){

                $customer_auth = auth()->guard('customer'); 

                if($customer_auth->loginUsingId($value->id)){

                    return redirect('product_listing')->with('message', 'Login successfully.');

                }

                else{

                    return redirect()->back()->with('message', 'Wrong .');

                }

            }

            else{

                $input['facebook_id'] = $id;

                $input['email'] = $email;

                $input['image'] = $avatar;

                $input['name'] = $name;

              

                $result = DB::table('customer')->insert(array($input));

                 // print_r($result); die;

                $customer_auth = auth()->guard('customer');

                $credentials = array('email' => $email);

                if($customer_auth->attempt($credentials)) {

                    return redirect('product_listing')->with('message', 'Login successfully.'); 

                }else{                   

                   return redirect()->back()->with('message', 'Wrong .');           

                }

            }

        //  print_r($user); die;

    }





public function __construct()

    {

        $this->middleware('guest:customer')->except('logout');

    }

}

