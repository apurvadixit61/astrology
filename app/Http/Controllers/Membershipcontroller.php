<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use url;
use Validator;
use Auth;
use Session;


class Membershipcontroller extends Controller
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
        $users = DB::table('benefit')->get();
        return view('benefit', ['users' => $users]);
       
    }



    public function create(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/
           $result = DB::table('benefit')->insert(
     array(
            'name'   =>   $request->name
     )
);
        if($result){
             return redirect()->back()->with('message', 'Benefit has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }



 public function edit_benefit(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $benefit = DB::table('benefit')->find($id);
     return view('edit_benefit',['benefit' => $benefit]);
              
    }


 public function post_edit_benefit(Request $request)
    {
       // $data = $request->input();
       //    Print_r($data); die;
            $id = $request->id;

            $input['name'] = $request->name;

           $result = DB::table('benefit')->where('id', $id)->update($input);

          if($result){
             return redirect()->back()->with('message', 'Benefit has been update successfully .');
            }
            else{

                return redirect()->back()->with('message', 'Edit any value .');
            }
              
    }


 public function delete_benefit(Request $request)
    {

      $id = $request->id;
     $userdelete =DB::table('benefit')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Benefit has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }

 /*************** *****************END BENEFIT****************/



 public function packages()
    {
        $users = DB::table('packages')->get();
        $benefit = DB::table('benefit')->get();
        return view('packages', ['users' => $users, 'benefit' => $benefit]);
       
    }


   public function post_packages(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/
           $customMessages = [
          'required' => 'Please fill name.',
          'required' => 'Please fill benefit.',
          'required' => 'Please fill price.',
          'required' => 'Please fill package type.'

         ];


         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'benefit'      => 'required',
            'price'      => 'required',
            'package_type'      => 'required',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

          $benefit = implode(",",$request->benefit);

          $input['name'] = $request->name;
          $input['benefit'] = $benefit;
          $input['price'] = $request->price;
          $input['package_type'] = $request->package_type;

          $result = DB::table('packages')->insert(array($input));
        }
        if($result){
             return redirect()->back()->with('message', 'Packages has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }



 public function edit_packages(Request $request)
    {
      $id = $request->id;
      $package = DB::table('packages')->find($id);
      $benefit = DB::table('benefit')->get();


     return view('edit_packages',['benefit' => $benefit, 'package' => $package]);
               
}


public function post_edit_packages(Request $request){
     
           $customMessages = [
          'required' => 'Please fill name.',
          'required' => 'Please fill benefit.',
          'required' => 'Please fill price.',
          'required' => 'Please fill package type.'

         ];


         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'benefit'      => 'required',
            'price'      => 'required',
            'package_type'      => 'required',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

          $benefit = implode(",",$request->benefit);
          
          $id = $request->id;

          $input['name'] = $request->name;
          $input['benefit'] = $benefit;
          $input['price'] = $request->price;
          $input['package_type'] = $request->package_type;

          $result = DB::table('packages')->where('id', $id)->update($input);

        }
        if($result){
             return redirect()->back()->with('message', 'Packages has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }






}
