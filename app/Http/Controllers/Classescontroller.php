<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use url;

use Validator;

use Auth;

use Session;





class Classescontroller extends Controller

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

      $users = DB::table('classes')

      ->join('courses', 'classes.courses_name', '=', 'courses.id')

      ->join('users', 'classes.tranner_name', '=', 'users.id')

      ->select('classes.*', 'courses.name as cour_name', 'users.name as tra_name')

      ->get();

      $courses = DB::table('courses')->where('status', 1)->get();

      $tranner = DB::table('users')->where('user_type', 1)->get();

     


      return view('classes', ['users' => $users, 'courses' => $courses, 'tranner' => $tranner]);

       

    }





      public function getlocation(Request $request)

    {

        $id = $request->courses_id;

      $getlocatio = DB::table('courses')->where('id', $id)->select('tranning_place')->get();

      return ( $getlocatio);

       

    }









 public function addclasses(Request $request){

      

       /*  $data = $request->img;

          Print_r($data); die;*/

        //   echo"<pre>";

        //  $data =$request->input();

        // Print_r($data); die;



              $input['name'] =$request->class_name;

              $input['courses_name'] =$request->courses_name;

              $input['tranner_name'] =$request->tranner_name;

              $input['location'] =$request->location;

              $input['start_date'] =$request->start_date;

              $input['start_time'] =$request->start_time;

              $input['end_date'] =$request->end_date;

              $input['end_time'] =$request->end_time;



           $result = DB::table('classes')->insert(array($input));

     

        if($result){



           return redirect()->back()->with('message', ' classes add successfully .');



        }

        else{



            return redirect()->back()->with('message', 'Network Error .');

        }

    }







public function status_changecourses(Request $request)

    {

      /*$data = $request->id;

          Print_r($data); die;  */

      /*  $user = User::find($id);*/

      $id = $request->id;

       $detail = DB::table('classes')->select('status')->find($id);



       if($detail->status == 1){



            $input['status'] = '0';

        $userupdate =DB::table('classes')->where('id', $id)->update($input);

       }else{



           $input['status'] = '1';

        $userupdate =DB::table('classes')->where('id', $id)->update($input);

       }





    if($userupdate){

           return redirect()->back();

           

    }else{

            return redirect()->back();

             

       }    

    }











 public function edit_classes(Request $request)

    {

          // $data = $request->id;

          // Print_r($data); die; 

      $id = $request->id;

     // $product = DB::table('classes')->find($id);

       $product = DB::table('classes')->where('classes.id',$id)

      ->join('courses', 'classes.courses_name', '=', 'courses.id')

      ->join('users', 'classes.tranner_name', '=', 'users.id')

      ->select('classes.*', 'courses.name as cour_name', 'users.name as tra_name')

      ->get();



      $courses = DB::table('courses')->where('status', 1)->get();

      $tranner = DB::table('users')->where('user_type', 1)->get();

  

     return view('edit_class',['product' => $product, 'courses' => $courses, 'tranner' => $tranner]);

              

    }





 public function post_edit_classes(Request $request)

    {

            // echo"<pre>";

            // $data = $request->input();

            // Print_r($data); die;

            $id = $request->id;

            

              $input['name'] =$request->class_name;

              $input['courses_name'] =$request->courses_name;

              $input['tranner_name'] =$request->tranner_name;

              $input['location'] =$request->location;

              $input['start_date'] =$request->start_date;

              $input['start_time'] =$request->start_time;

              $input['end_date'] =$request->end_date;

              $input['end_time'] =$request->end_time;



           $result = DB::table('classes')->where('id', $id)->update($input);



        if($result){

             return redirect()->back()->with('message', 'Classes has been update successfully .');

        }

        else{



            return redirect()->back()->with('message', 'Edit at least one value .');

        }

              

    }









 public function delete_classes(Request $request)

    {

       /* $data = $request->id;

          Print_r($data); die;*/  

      /*  $user = User::find($id);*/

      $id = $request->id;

     $userdelete =DB::table('classes')->where('id', $id)->delete();



    if($userdelete){

           return redirect()->back()->with('message', "Courses has been Delete successfully");

           

    }else{

            return redirect()->back()->with('message', "Something is wrong,try again");

             

       }    

    }







        public function get_request()

    {

        $users = DB::table('request_accessories')

        ->join('courses', 'courses.id', '=', 'request_accessories.courses_name')

        ->join('users', 'users.id', '=', 'request_accessories.tranner_id')

        ->select('request_accessories.*', 'courses.name as cour_name', 'users.name as tranner_name')

        ->get();

      

      return view('request_accessories', ['users' => $users]);

       

    }





public function status_changerequst(Request $request)

    {

      /*$data = $request->id;

          Print_r($data); die;  */

      /*  $user = User::find($id);*/

      $id = $request->id;

       $detail = DB::table('request_accessories')->select('status')->find($id);



       if($detail->status == 1){



            $input['status'] = '2';

        $userupdate =DB::table('request_accessories')->where('id', $id)->update($input);

       }elseif($detail->status == 0){



           $input['status'] = '2';

        $userupdate =DB::table('request_accessories')->where('id', $id)->update($input);

       }

       else{



           $input['status'] = '0';

        $userupdate =DB::table('request_accessories')->where('id', $id)->update($input);

       }





    if($userupdate){

           return redirect()->back();

           

    }else{

            return redirect()->back();

             

       }    

    }







}

