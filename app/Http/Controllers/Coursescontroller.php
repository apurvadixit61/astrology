<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use url;

use Validator;

use Auth;

use Session;





class Coursescontroller extends Controller

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

      $users = DB::table('courses')->select('*')->get();

      $certification = DB::table('certification')->select('*')->get();

      $required_accessories = DB::table('product')->select('*')->get();

      return view('courses', ['users' => $users, 'required_accessories' => $required_accessories, 'certification' => $certification]);

       

    }













 public function addcourses(Request $request){

          // echo"<pre>";

          // $data = $request->input();

          // Print_r($data); die;



            $destinationPath = base_path() . '/images/courses/';  

            $photo = $request->img;           

            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());

             $photo_name = '/'.time().$photo->getClientOriginalName();



             $discountper = $request->discount_percent;

             $price = $request->price;

             $discount_pr =  ($price * $discountper / 100);

             $discount_price =($price - $discount_pr);



             $required_accessories = implode(",",$request->required_accessories);

             $section_type = implode(',', $request->section_type);

              $input['name'] =$request->name;

              $input['required_accessories'] =$required_accessories;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['tranning_place'] =$request->tranning_place;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['discount_price'] =$discount_price;

              $input['quantity'] =$request->quantity;

             $input['section_type'] = $section_type;

              $input['image'] =$photo_name;



// print_r($input); die;

           $result = DB::table('courses')->insert(

     array($input));

     $id = DB::getPdo()->lastInsertId();

 /* print_r($id); die;*/

     

        if($result){



           return redirect('load_courses_gallery/'.$id)->with('message', ' courses add successfully .');



        }

        else{



            return redirect()->back()->with('message', 'Not Insert .');

        }

    }





public function loadgallery($id){



  return view('courses_gallery', ['id' => $id]);



}







 public function uploadgallery(Request $request){

      

         /*$data = $request->input();

          Print_r($data); die;*/

          $photo = $request->img; 

          // Print_r($photo); die;



         if($photo){

        foreach ($photo as $key => $galleryphoto) {



            $destinationPath = base_path() . '/images/courses/';       

            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());

             $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());



             }

          }

            $getgallery = implode(",",$multi);



              $input['image'] =$getgallery;

              $input['courses_id'] = $request->id;



           $result = DB::table('courses_images')->insert(

     array($input));

     

        if($result){

             return redirect('courses')->with('message', 'Gallery has been Insert successfully .');

        }

        else{



            return redirect()->back()->with('message', 'Not Insert .');

        }

    }







public function status_changecourses(Request $request)

    {

      /*$data = $request->id;

          Print_r($data); die;  */

      /*  $user = User::find($id);*/

      $id = $request->id;

       $detail = DB::table('courses')->select('status')->find($id);



       if($detail->status == 1){



            $input['status'] = '0';

        $userupdate =DB::table('courses')->where('id', $id)->update($input);

       }else{



           $input['status'] = '1';

        $userupdate =DB::table('courses')->where('id', $id)->update($input);

       }





    if($userupdate){

           return redirect()->back();

           

    }else{

            return redirect()->back();

             

       }    

    }











 public function edit_courses(Request $request)

    {

       /* $data = $request->id;

          Print_r($data); die;*/  

      /*  $user = User::find($id);*/

      $id = $request->id;

      $product = DB::table('courses')->find($id);

      $certification = DB::table('certification')->get();



     return view('edit_courses',['product' => $product, 'certification' => $certification]);

              

    }





 public function post_edit_courses(Request $request)

    {

            // echo"<pre>";

            // $data = $request->input();

            //  Print_r($data); die;

            $id = $request->id;

            $discountper = $request->discount_percent;

             $price = $request->price;

             $discount_price =  ($price * $discountper / 100);
         
            

           $destinationPath = base_path() . '/images/courses/';

            $photo = $request->img;

           /* Print_r($photo); die;*/

           if(!empty($photo)){ 

            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());

             $photo_name = '1_'.time().$photo->getClientOriginalName();



                $input['name'] =$request->name;

                //$input['assign_tranner'] =$request->assign_tranner;

                $input['description'] =$request->description;

                $input['short_description'] =$request->short_description; 

                $input['tranning_place'] =$request->tranning_place;

                $input['price'] =$request->price;

                $input['discount_percent'] =$request->discount_percent;

                $input['discount_price'] =$request->price - $discount_price;

                $input['quantity'] =$request->quantity;

                //$input['certification'] =$request->certification;

                $input['image'] =$photo_name;



           $result = DB::table('courses')->where('id', $id)->update($input);

}

else{



              $input['name'] =$request->name;

             // $input['assign_tranner'] =$request->assign_tranner;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['tranning_place'] =$request->tranning_place;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['discount_price'] =$request->price - $discount_price;

              $input['quantity'] =$request->quantity;

             // $input['certification'] =$request->certification;



           $result = DB::table('courses')->where('id', $id)->update($input);



}



        if($result){

             return redirect()->back()->with('message', 'Courses has been update successfully .');

        }

        else{



            return redirect()->back()->with('message', 'Courses not update .');

        }

              

    }









 public function delete_courses(Request $request)

    {

       /* $data = $request->id;

          Print_r($data); die;*/  

      /*  $user = User::find($id);*/

      $id = $request->id;

     $userdelete =DB::table('courses')->where('id', $id)->delete();

     $gallerydelete =DB::table('courses_images')->where('courses_id', $id)->delete();



    if($userdelete){

           return redirect()->back()->with('message', "Courses has been Delete successfully");

           

    }else{

            return redirect()->back()->with('message', "Something is wrong,try again");

             

       }    

    }


    public function course_booked()
    {
    
       $users = DB::table('order_detail')->where('course_id','!=',NULL)
    
       ->join('courses', 'courses.id', '=', 'order_detail.course_id')
     
       ->select('courses.*','order_detail.order_id','order_detail.customer_name','order_detail.payment_status','order_detail.created_at')
    
       ->get();
 
    //   var_dump($users);
    //   die;
           return view('course_register',['users' => $users]);
    }












}

