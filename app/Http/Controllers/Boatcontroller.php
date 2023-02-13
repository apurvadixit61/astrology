<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use url;

use Validator;

use Auth;

use Session;





class Boatcontroller extends Controller

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



      $users = DB::table('boat')->select('*')->get();



        return view('boat', ['users' => $users]);

       

    }





       public function add_boat()

    {



        return view('add_boat');

       

    }









 public function addboat(Request $request){

    

        // echo"<pre>";

        // $data =$request->input();

        // Print_r($data); die;



            $destinationPath = base_path() . '/images/boat/';  

            $photo = $request->img;           

            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());

             $photo_name = '/'.time().$photo->getClientOriginalName();





             $discountper = $request->discount_percent;

             $price = $request->price;

             $discount_pr =  ($price * $discountper / 100);

             $discount_price =($price - $discount_pr);



              $specifications = implode(",",$request->specifications);

              $section_type = implode(',', $request->section_type);


 

              $input['name'] =$request->name;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['discount_price'] =$discount_price;

              $input['size'] =$request->size;

              $input['image'] =$photo_name;

              $input['location'] =$request->location;

              $input['specifications'] =$specifications;

              $input['speed'] =$request->speed;

              $input['chair'] =$request->chair;      

              $input['person'] =$request->person;
              $input['section_type'] = $section_type;
        



// echo"<pre>";

//   print_r($input); die;

           $result = DB::table('boat')->insert(array($input));

             $id = DB::getPdo()->lastInsertId();

  // print_r($id); die;

     

        if($result){



           return redirect('load_boat_gallery/'.$id)->with('message', ' Boat add successfully .');



        }

        else{



            return redirect()->back()->with('message', 'Not Insert .');

        }

    }





public function loadgallery($id){



  return view('boat_gallery', ['id' => $id]);



}



public function uploadgallery(Request $request){

      

         /*$data = $request->input();

          Print_r($data); die;*/

          $photo = $request->img; 

          // Print_r($photo); die;



         if($photo){

        foreach ($photo as $key => $galleryphoto) {



            $destinationPath = base_path() . '/images/boat/';       

            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());

             $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());



             }

          }

            $getgallery = implode(",",$multi);



              $input['image'] =$getgallery;

              $input['boat_id'] = $request->id;



           $result = DB::table('boat_images')->insert(

     array($input));

     

        if($result){

             return redirect('boat')->with('message', 'Gallery has been Insert successfully .');

        }

        else{



            return redirect()->back()->with('message', 'Not Insert .');

        }

    }







public function status_changeboat(Request $request)

    {

      /*$data = $request->id;

          Print_r($data); die;  */

      /*  $user = User::find($id);*/

      $id = $request->id;

       $detail = DB::table('boat')->select('status')->find($id);



       if($detail->status == 1){



            $input['status'] = '0';

        $userupdate =DB::table('boat')->where('id', $id)->update($input);

       }else{



           $input['status'] = '1';

        $userupdate =DB::table('boat')->where('id', $id)->update($input);

       }





    if($userupdate){

           return redirect()->back();

           

    }else{

            return redirect()->back();

             

       }    

    }











 public function edit_boat(Request $request)

    {

      $id = $request->id;

      $product = DB::table('boat')->find($id);

      $gallery = DB::table('boat_images')->where('boat_id', $id)->get();



     return view('edit_boat',['product' => $product, 'gallery' => $gallery]);

              

    }





 public function post_edit_boat(Request $request)

    {

       //  echo"<pre>";

       // $data = $request->input();

       // Print_r($data); die;



            $id = $request->id;

            $discountper = $request->discount_percent;

            $price = $request->price;

            $discount_pr =  ($price * $discountper / 100);

            $discount_price =($price - $discount_pr);



            $specifications = implode(",",$request->specifications);



           $destinationPath = base_path() . '/images/boat/';

            $photo = $request->img;

           if(!empty($photo)){ 

            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());

             $photo_name = '1_'.time().$photo->getClientOriginalName();



              $input['name'] =$request->name;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['discount_price'] =$discount_price;

              $input['size'] =$request->size;

              $input['image'] =$photo_name;

              $input['location'] =$request->location;

              $input['specifications'] =$specifications;

              $input['speed'] =$request->speed;

              $input['chair'] =$request->chair;      

              $input['person'] =$request->person;



           $result = DB::table('boat')->where('id', $id)->update($input);

}

else{



              $input['name'] =$request->name;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['discount_price'] =$discount_price;

              $input['size'] =$request->size;

              $input['location'] =$request->location;

              $input['specifications'] =$specifications;

              $input['speed'] =$request->speed;

              $input['chair'] =$request->chair;      

              $input['person'] =$request->person;

    

           $result = DB::table('boat')->where('id', $id)->update($input);



}



        if($result){

             return redirect()->back()->with('message', 'Boat has been update successfully .');

        }

        else{



            return redirect()->back()->with('message', 'Boat not update .');

        }

              

    }





public function post_edit_gallery(Request $request){

      

          // $data = $request->input();

          // Print_r($data); die;

          $photo = $request->img; 

          $id    = $request->id;





         if($photo){

        foreach ($photo as $key => $galleryphoto) {



            $destinationPath = base_path() . '/images/boat/';       

            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());

             $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());



             }

          }

            $getgallery = implode(",",$multi);



              $input['image'] =$getgallery;



           $result = DB::table('boat_images')->where('id', $id)->update($input);

     

        if($result){

             return redirect()->back()->with('message', 'Gallery has been Update successfully .');

        }

        else{



            return redirect()->back()->with('message', 'Not Insert .');

        }

    }









 public function delete_boat(Request $request)

    {

       /* $data = $request->id;

          Print_r($data); die;*/  

      /*  $user = User::find($id);*/

      $id = $request->id;

     $userdelete =DB::table('boat')->where('id', $id)->delete();



    if($userdelete){

           return redirect()->back()->with('message', "Boat has been Delete successfully");

           

    }else{

            return redirect()->back()->with('message', "Something is wrong,try again");

             

       }    

    }

    public function boat_booked(){

        $users = DB::table('order_detail')->where('boat_id','!=',NULL)

        ->join('boat', 'boat.id', '=', 'order_detail.boat_id')
     
        ->select('boat.*')
     
        ->get();
       
            return view('boat_booked',['users' => $users]);
    }









}

