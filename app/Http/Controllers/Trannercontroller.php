<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use url;
use Validator;
use Auth;
use Session;


class Trannercontroller extends Controller
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
      $user = Auth::guard('web')->user();
      $user_id = $user->id;

      $class = DB::table('classes')->where('classes.tranner_name', $user_id)
      ->join('courses', 'courses.id', '=', 'classes.courses_name')
      ->select('classes.*', 'courses.name as cour_name')
      ->get();
      
      return view('tranner.myclass', ['class' => $class]);
       
    }



      public function showmyclass(Request $request)
    {
        $id = $request->id;
        $class = DB::table('classes')->where('classes.id', $id)
        ->join('courses', 'courses.id', '=', 'classes.courses_name')
        ->select('classes.*', 'courses.name as cour_name')
        ->get();

        return ($class);
       
    }


       public function accessories()
    {
      $user = Auth::guard('web')->user();
      $user_id = $user->id;
      
      $users = DB::table('request_accessories')->where('request_accessories.tranner_id', $user_id)
      ->join('courses', 'courses.id', '=', 'request_accessories.courses_name')
      ->select('request_accessories.*', 'courses.name as cour_name')
      ->get();
      $courses = DB::table('classes')->where('classes.tranner_name', $user_id)
      ->join('courses', 'courses.id', '=', 'classes.courses_name')
      ->select('classes.*', 'courses.name as courses_name', 'courses.id as courses_id')
      ->get();
   
      return view('tranner.accessories', ['users' => $users, 'courses' => $courses]);
       
    }




 public function request_accessories(Request $request){
        // echo"<pre>";
        // $data =$request->input();
        // Print_r($data); die;

        $user = Auth::guard('web')->user();
        $user_id = $user->id;

        $input['courses_name'] =$request->courses_name;
        $input['accessories_name'] =$request->accessories_name;
        $input['description'] =$request->description;      
        $input['quantity'] =$request->quantity;
        $input['priority'] =$request->priority;
        $input['tranner_id'] =$user_id;


// print_r($input); die;
           $result = DB::table('request_accessories')->insert(array($input));
     
        if($result){

           return redirect()->back()->with('message', ' Request Send successfully .');

        }
        else{

            return redirect()->back()->with('message', 'Network Error .');
        }
    }



public function tranner_status(Request $request)
    {
         // $data = $request->id;
         // $value = $request->value;
         //  Print_r($data);
         //  Print_r($value);
         //   die;  
        $id = $request->id;
        $value = $request->value;
        $input['tranner_status'] = $value;
        $userupdate =DB::table('classes')->where('id', $id)->update($input);

    if($userupdate){
           return redirect()->back();
           
    }else{
            return redirect()->back();
             
       }    
    }





}
