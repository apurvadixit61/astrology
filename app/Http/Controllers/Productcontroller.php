<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use url;
use Validator;
use Auth;
use Session;

class Productcontroller extends Controller

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
      $product_cat = DB::table('categories')->select('*')->get();
      $sub_cat = DB::table('sub_categorie')->select('*')->get();
        
       // $users = DB::table('users')->get();
        $users = DB::table('products')
            ->join('categories', 'categories.category_identifier', '=', 'products.product_category_id')
            ->select('products.*', 'categories.category_english_name as cat_name')->orderBy('products.product_identifier', 'desc')
            ->get();
            
             /*echo "<pre>";
         print_r($users); die;*/
            
        return view('product', ['users' => $users, 'product_cat' => $product_cat,'product_sub'=>$sub_cat]);
    }

    /*public function create_product(Request $request){
      
       
        $destinationPath = base_path() . '/images/category_img/';  
        
        $photo = $request->category_img;    
        echo $photo->getClientOriginalName();die;
        $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
        $photo_name = '/'.time().$photo->getClientOriginalName();
        $result = DB::table('categories')->insert(
     array(
            'category_english_name'   =>   $request->category_english_name,
            'category_arabic_name'   =>   $request->category_arabic_name,
            'category_description'   =>   $request->category_description,
            'category_img'   =>    $photo_name
     )
);

        //print_r($result);die;
        if($result){
             return redirect()->back()->with('message', 'Category type has been Insert successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }*/
    
    
    public function create_product(Request $request){
        $destinationPath = base_path() . '/images/category_img/';  
        $photo = $request->image;           
        $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
        $photo_name = '/'.time().$photo->getClientOriginalName();
        $result = DB::table('blog')->insert(
        array(
                'blog_title'   =>   $request->name,
                'blog_category'   =>   $request->blog_category,
                'blog_description'   =>   $request->blog_description,
                'blog_image'   =>     $request->blog_image
              
         )
        );
        if($result){
             return redirect()->back()->with('message', 'Category type has been added successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }
    
    /************************************update_produc********************************************************/
      public function update_category_product(Request $request)
    {

            $id = $request->id;
            $destinationPath = base_path() . '/images/category_img/';
            $photo = $request->image;
            //$photo_name='';
            if(!empty($photo)){ 
            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
            $photo_name = '/'.time().$photo->getClientOriginalName();
            }
            else
            {
               $photo_name=$request->old_img; 
            }
              
              $name=$request->name;
              $desc=$request->description;
              $pic=$request->$photo_name;
           /*   $input['category_english_name'] =$name;
              $input['category_description'] =$desc;
              $input['category_img'] =$photo_name;*/

            //   'blog_title'   =>   $request->name,
            //   'blog_category'   =>   $request->blog_category,
            //   'blog_description'   =>   $request->blog_description,
            //   'blog_image'   =>     $request->blog_image

              $input['blog_title'] = $request->name;
              $input['blog_category'] = $request->blog_category;
              $input['blog_description'] = $request->blog_description;
              $input['blog_image'] = $photo_name;
             
             //print_r($input);die;

           $result = DB::table('categories')->where('category_identifier', $id)->update($input);
         
           if($result){
             return redirect()->back()->with('message', 'Product has been update successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Product not update .');
        }

}

public function get_subcategory_list(Request $request)
{
    echo "h";die;
    /* $id=$request->cat_id;
     $result = DB::table('sub_categorie')->where('category_id', $id)-get();
     print_r($result);die;*/
  
        
}
    

    public function subcreate(Request $request){
        // $data = $request->all();
        //   Print_r($data); die;
       $customMessages = [
          'requireds' => 'Please fill .',
          'required' => 'Please fill.'
         ];

         $validator = Validator::make($request->all(), [
            'english_name'      => 'required',
            'category_id'  => 'required',
        ],$customMessages);

         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        }else{

              $input['english_name'] =$request->english_name;
              $input['arabic_name'] =$request->arabic_name;
              $input['description'] =$request->description;
              $input['category_id'] =$request->category_id;
              $result = DB::table('sub_categorie')->insert(array($input));
    }    if($result){
             return redirect()->back()->with('message', ' Sub Category type has been Insert successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }

 public function addproduct(Request $request){
      // $data = $request->all();
        //   Print_r($data); die;
            $destinationPath = base_path() . '/images/product_img/';  
            $photo = $request->product_img;           
            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
            $photo_name = '/'.time().$photo->getClientOriginalName();
       
          
            $seller_type=$request->seller_type;
            $english_name=$request->english_name;
            $arabic_name=$request->arabic_name;
            $description=$request->description;

              $input['seller_type'] =$request->seller_type;
              $input['english_name'] =$request->english_name;
              $input['product_category_id'] =$request->product_category_id;
              $input['product_sub_category_id'] =$request->product_sub_category_id;
              $input['arabic_name'] =$request->arabic_name;
              $input['product_description'] =$request->product_description;
              $input['product_main_image'] =$photo_name;
              $input['created_by'] =$request->user_id;
              


            //   $input['img_url']="http://tenspark.com/diving/images/product/";



// print_r($input); die;



           $result = DB::table('products')->insert(
                            array($input));
                    $id = DB::getPdo()->lastInsertId();
 /* print_r($id); die;*/
        if($result){
            return redirect('loadgallery/'.$id)->with('message', ' Product add successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');

        }
    }

public function loadgallery($id){
  return view('uploadgallery', ['id' => $id]);
}


 public function uploadgallery(Request $request){

         /*$data = $request->input();
          Print_r($data); die;*/
          $photo = $request->img; 
          // Print_r($photo); die;
         if($photo){
        foreach ($photo as $key => $galleryphoto) {

            $destinationPath = base_path() . '/images/product_img/';       
            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());
             $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());

             }
          }
            $getgallery = implode(",",$multi);
              $input['image_path'] =$getgallery;
              $input['product_identifier'] = $request->id;
           $result = DB::table('product_images')->insert(
     array($input));
        if($result){
             return redirect('product')->with('message', 'Gallery has been Insert successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }

 public function edit_product(Request $request)
    {
       
      $id = $request->id;
    //   var_dump($id);
    //   die;
      $product_cat = DB::table('categories')->select('*')->get();
      
      
      $sub_cat = DB::table('sub_categorie')->select('*')->get();
      $product = DB::table('products')->where('product_identifier',$id)->first();
     
     return view('edit_product',['product' => $product, 'product_cat' => $product_cat,'product_sub'=>$sub_cat]);
    }

 public function post_edit_product(Request $request)
    {

            $id = $request->id;
            $destinationPath = base_path() . '/images/product_img/';
            $photo = $request->product_img;
           if(!empty($photo)){ 
            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());
             $photo_name = '1_'.time().$photo->getClientOriginalName();

             $input['seller_type'] =$request->seller_type;
              $input['english_name'] =$request->english_name;
              $input['product_category_id'] =$request->product_category_id;
              $input['product_sub_category_id'] =$request->product_sub_category_id;
              $input['arabic_name'] =$request->arabic_name;
              $input['product_description'] =$request->product_description;
              $input['product_main_image'] =$photo_name;
              $input['created_by'] =$request->user_id;

           $result = DB::table('products')->where('product_identifier', $id)->update($input);
}

else{
    $input['seller_type'] =$request->seller_type;
    $input['english_name'] =$request->english_name;
    $input['product_category_id'] =$request->product_category_id;
    $input['product_sub_category_id'] =$request->product_sub_category_id;
    $input['arabic_name'] =$request->arabic_name;
    $input['product_description'] =$request->product_description;
    // $input['product_main_image'] =$photo_name;
    $input['created_by'] =$request->user_id;
           $result = DB::table('products')->where('product_identifier', $id)->update($input);
}
        if($result){
             return redirect()->back()->with('message', 'Product has been update successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Product not update .');
        }
    }
    public function view_category(){

        $users = DB::table('blog')->select('*')->orderBy('id', 'desc')->get();
        $blog_category = DB::table('blog_category')->select('*')->orderBy('id', 'desc')->get();
        return view('product_cat', ['users' =>$users],['blog_category'=>$blog_category]);
    }

    public function view_subcategory(){
 $product_cat = DB::table('categories')->select('*')->get();
       /* $users = DB::table('sub_categorie')->select('*')->orderBy('subcategory_id', 'desc')->get();
        $product_cat = DB::table('categories')->select('*')->get();

        return view('product_subcat', ['users' =>$users],['product_cat'=>$product_cat]);*/
        
         $users = DB::table('sub_categorie')
            ->join('categories', 'categories.category_identifier', '=', 'sub_categorie.category_id')
            ->select('categories.*', 'categories.category_english_name as cat_name','sub_categorie.english_name','sub_categorie.subcategory_id','sub_categorie.description')->orderBy('sub_categorie.subcategory_id', 'desc')
            ->get();
              return view('product_subcat', ['users' =>$users],['product_cat'=>$product_cat]);
           // print_r($users);die;
        
        
    }

    public function delete_product(Request $request){
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('products')->where('id', $id)->delete();
    if($userdelete){
           return redirect()->back()->with('message', "Product has been Delete successfully");
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
       }    
    }







    public function coupan_code_list(){



        $coupan_list = DB::table('coupan_code')->get();



        return view('coupan',['coupan_list' => $coupan_list]);



    }







    public function addcoupan_code(Request $request){



        /*



            $data = $request->name;



            Print_r($data); die;*/



         $customMessages = [



            'requireds' => 'Please fill .',



            'required' => 'Please fill.'



            



           ];



  



           $validator = Validator::make($request->all(), [



                'coupan'            => 'required',



                'flat_discount'     => 'required|numeric',



              



          ],$customMessages);



           if ($validator->fails()) {



               return redirect()->back()->withErrors($validator);



          



            }else{



  



                $input['coupen']            =   $request->coupan;



                $input['discount_percet']   =   $request->discount_per;



                $input['discount_flat']     =   $request->flat_discount;



                $result = DB::table('coupan_code')->insert($input);



            }



            if($result){



               return redirect()->back()->with('message', 'Coupan Code has been Insert successfully .');



            }else{



                return redirect()->back()->with('message', 'Not Insert .');



            }



          return view('coupan');



    }







    public function edit_coupan(Request $request){



        $id = $request->id;



        $coupan = DB::table('coupan_code')->find($id);



        return view('edit_coupan',['coupan' => $coupan]);   



    }







    public function post_edit_coupan(Request $request){



        $customMessages = [



            'requireds' => 'Please fill.',



            'required' => 'Please fill.'



           ];



           $validator = Validator::make($request->all(), [



                'coupan'            => 'required',



                'discount_flat'     => 'required|numeric',



              



          ],$customMessages);



           if ($validator->fails()) {echo "sdf";die;



               return redirect()->back()->withErrors($validator);



            }else{



                $input['coupen']            =   $request->coupan;



                $input['discount_percet']   =   $request->discount_per;



                $input['discount_flat']     =   $request->discount_flat;



                $result = DB::table('coupan_code')->where('id',$request->coupanid)->update($input);



            }



            if($result){



               return redirect()->back()->with('message', 'Coupan Code has been Update successfully .');



            }else{



                return redirect()->back()->with('message', 'Not update .');



            }



            $coupan_list = DB::table('coupan_code')->get();



          return view('coupan',['coupan_list' => $coupan_list]);



    }







    public function delete_coupan(Request $request){



        $id = $request->id;



        $coupandelete =DB::table('coupan_code')->where('id', $id)->delete();



 



        if($coupandelete){



            return redirect()->back()->with('message', "Coupan has been Delete successfully");



        }else{



             return redirect()->back()->with('message', "Something is wrong,try again");



        }    



    }







    public function shipping_charge(){



        $shipping = DB::table('shipping_charge')->first();



        return view('shipping',['shipping' => $shipping]);



    }







    public function post_shipping_charge(Request $request){



        $shipping_update = DB::table('shipping_charge')->where('id',$request->shipping_id)->update(['shipping_charge'=>$request->shippingname]);



        $shipping = DB::table('shipping_charge')->first();



        return view('shipping',['shipping' => $shipping]);



    }



    




}



