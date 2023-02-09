<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\User;

use url;

use Validator;

use Auth;

use Session;

use Paginate;





class Productlistcontroller extends Controller

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



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

            $product = DB::table('product')

            ->join('category', 'product.category_id', '=', 'category.id')

            ->select('product.*', 'category.name as cat_name')

            ->paginate(12);

            $category = DB::table('category')->get(); 

            $banner = DB::table('banner')->get();

           
            if(@$_GET['a']=='newarrival' || @$_GET['a'] =='newarrival#'){
                 $product = DB::table('product')

                    ->join('category', 'product.category_id', '=', 'category.id')
                    ->whereRaw('FIND_IN_SET(0,section_type)')
                    ->select('product.*', 'category.name as cat_name')

                    ->paginate(12);
            }
            if(@$_GET['a']=='popular' || @$_GET['a'] =='popular#'){
                 $product = DB::table('product')

                    ->join('category', 'product.category_id', '=', 'category.id')
                    ->whereRaw('FIND_IN_SET(1,section_type)')
                    ->select('product.*', 'category.name as cat_name')

                    ->paginate(12);
  
                }
            if(@$_GET['a']=='top-products' || @$_GET['a'] =='top-products#'){

                $product = DB::table('product')
                    ->join('category', 'product.category_id', '=', 'category.id')
                    ->whereRaw('FIND_IN_SET(2,section_type)')
                    ->select('product.*', 'category.name as cat_name')
                    ->paginate(12);
            }  

        return view('web.product_listing', ['product' => $product, 'category' => $category, 'banner' => $banner]);

      

    }



    public function main_search(Request $request)
    {

         return view('web.main_search');
    }

    public function search(Request $request)

    {

    // echo"<pre>";

    //     $data = $request->input();

    //     print_r($data); die;

        $cat_id = $request->cat_id;

        $name   =  $request->name;

        if($cat_id == null)

        {

                $product = DB::table('product')->where('product.name', 'like', "%{$name}%")

                ->join('category', 'product.category_id', '=', 'category.id')

                ->select('product.*', 'category.name as cat_name')

                ->paginate(12);

                $banner = DB::table('banner')->get();

                $category = DB::table('category')->get();

                return view('web.product_listing', ['product' => $product, 'category' => $category, 'banner' => $banner]);

        }elseif ($name == null) {

            

                $product = DB::table('product')->where('category_id', $cat_id)

                ->join('category', 'product.category_id', '=', 'category.id')

                ->select('product.*', 'category.name as cat_name')

                ->paginate(12);

                 $banner = DB::table('banner')->get();

                $category = DB::table('category')->get();

                return view('web.product_listing', ['product' => $product, 'category' => $category, 'banner' => $banner]);

        }else{



                $product = DB::table('product')->where('product.name', 'like', "%{$name}%")

                ->where('product.category_id', $cat_id)

                ->join('category', 'product.category_id', '=', 'category.id')

                ->select('product.*', 'category.name as cat_name')

                ->paginate(12);

                 $banner = DB::table('banner')->get();

                $category = DB::table('category')->get();

                return view('web.product_listing', ['product' => $product, 'category' => $category, 'banner' => $banner]);

        }        

    }





   public function search_rent(Request $request)

    {   

       // echo "<pre>";

       // print_r($request->id);

       // die;

      

         $product = DB::table('product')->where('product.type', 0)

            ->join('category', 'product.category_id', '=', 'category.id')

            ->select('product.*', 'category.name as cat_name')

            ->paginate(12);

        $category = DB::table('category')->get(); 

         $banner = DB::table('banner')->get();

         // echo"<pre>";

         // print_r($product); die;

           

        return view('web.product_listing', ['product' => $product, 'category' => $category, 'banner' => $banner]);

    



    }


}

