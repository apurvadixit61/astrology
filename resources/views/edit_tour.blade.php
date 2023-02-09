@include('layouts.header')



   <style>

       .img-1{

        width: 100px;

        margin: 0 auto;

       }

       .text-centerr{

        margin: 20px 0px;

       }

       .ex-including input{

         width: 150px !important;

        float: left;

       }

       .disc_per .input-group-prepend{

            display: inline-block;

            float: left;

       }

       .disc_per input{

        width: 80px !important;

        float: left;

       }

       .disc_per .input-group-append{

        display: inline-block;

       }

       .including input{

        width: 200px;

         float: left;



       }

       .inline-block{

        display: inline-block;

       }

       .jinput{

        margin: 0 auto;



       }



       #addMores,#addMore {

    background: #D6050D;

    color: #fff;

    border: none;

    border-radius: 3px;

    padding: 6px 15px;

    }

   </style>



    <div class="content-wrap">

        <div class="main">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-8 p-r-0 title-margin-right">

                       <!--  <div class="page-header">

                            <div class="page-title">

                                <h1>Hello, <span>Welcome Here</span></h1>

                            </div>

                        </div> -->

                    </div>



                    <!-- /# column -->

                    <div class="col-lg-4 p-l-0 title-margin-left">

                        <div class="page-header">

                            <div class="page-title">

                                <ol class="breadcrumb text-right">

                                    <li><a href="{{url('home')}}">Dashboard</a></li>

                                    <li class="active">edit tour</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- /# column -->

                </div>

                 @if (Session::has('message'))

                       <div class="alert alert-success">{{ Session::get('message') }}
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>

                    @endif

                <!-- /# row -->

                <div class="main-content">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card alert">

                                <div class="card-header">

                                    <h4>Edit Tour</h4>

                                   

                                </div>





                                <div class="col-md-12 text-centerr">

                                    <img src="{{url('/images/tour/'.$product->image)}}" class="img-responsive img-circle img-1">

                                </div>

                                <div class="card-body">

                                    <div class="menu-upload-form">

                            <form class="form-horizontal" method="POST" action="{{url('post_edit_tour')}}" enctype="multipart/form-data">

                                 {{ csrf_field() }}



                                 <input type="hidden" name="id" value="{{$product->id}}">

                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Upload Image</label>

                                                <div class="col-sm-10">

                                                <div class="form-control file-input dark-browse-input-box">

                                            <input class="file-name input-flat" type="file" name="img" placeholder="Browse Files">



                                                    </div>

                                                </div>

                                            </div>





                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Name</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="name" class="form-control" placeholder="Type your name" value="{{$product->name}}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Description</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="description" class="form-control" placeholder="enter description" value="{{$product->description}}">

                                                </div>

                                            </div>



                                             <div class="form-group">

                                                <label class="col-sm-2 control-label">Short Description</label>

                                                <div class="col-sm-10">



                                                    <textarea rows="1" cols="10" class="form-control" placeholder="Enter short description" type="text" name="short_description" required="" >{{$product->short_description}}</textarea> 

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Price</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="price" class="form-control" placeholder="enter price" value="{{$product->price}}">

                                                </div>

                                            </div>



                                            <div class="form-group disc_per">

                                                <label class="col-sm-2 control-label">Discount Percentage</label>

                                                <div class="col-sm-3">

                                                    <input type="number" name="discount_percent" class="form-control" placeholder="enter price" value="{{$product->discount_percent}}">

                                                </div>

                                                <div class="form-group col-sm-3">

                                             <label class="col-sm-3 control-label">child</label>

                                             <input class="form-control form-white" type="number" name="child" value="{{$product->child}}" min="0" max="100"  step="1"/>

                                          </div>



                                        <div class="form-group col-sm-3">

                                             <label class="col-sm-3 control-label">Adult</label>

                                             <input class="form-control form-white" type="number" name="adult" value="{{$product->adult}}" min="0" max="100" step="1"/>

                                          </div>

                                            </div>



                                           



                                         <div class="form-group including">

                                            <div id="fieldList">

                                                  <?php 

                                                    $inculde = array();

                                                    $inculde =  explode(',', $product->including);

                                                    ?>

                                                 <label class="col-sm-2 control-label">Including</label>

                                                  <div class="col-sm-10" id="fieldList_inner"> @foreach($inculde as $info)

                                                 <input type="text" name="including[]" id="including" class="form-control" value="{{$info}}" placeholder="title: text">

                                                  @endforeach                                           

                                                </div>

                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-10"> <button id="addMore"><i class="ti-plus"></i> Add More</button></div>

                                             </div>

                                         </div>





                                         <div class="form-group ex-including">

                                              <div id="fieldLists">   

                                                <?php 

                                                    $exculde = array();

                                                    $exculde =  explode(',', $product->exincluding);

                                                    ?>

                                                 <label class="col-sm-2 control-label">Ex-Including</label>

                                                    <div class="col-sm-10" id="fieldLists_inner"> 

                                                  @foreach($exculde as $info)

                                                 <input type="text" name="exincluding[]" id="exincluding" class="form-control" value="{{$info}}" placeholder="title: text">

                                                  @endforeach 

                                            </div>

                                            <div class="col-sm-2"></div>

                                                <div class="col-sm-10"> <button id="addMores"><i class="ti-plus"></i> Add More</button></div>

                                             </div>

                                         </div>









                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Discount Price</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="discount_price" class="form-control" placeholder="enter price" value="{{$product->discount_price}}" readonly="">

                                                </div>

                                            </div>



                                          <!--   <div class="form-group">

                                                <label class="col-sm-2 control-label">Quantity</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="quantity" class="form-control" placeholder="enter quantity" value="{{$product->quantity}}">

                                                </div>

                                            </div> -->



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Trip</label>

                                                <div class="col-sm-10">

                                            <select class="form-control selectpicker form-white" name="trip">

                                                  <option value="{{$product->trip}}">Seleted please</option>

                                                  <option value="Round Trip">Round Trip</option>

                                                  <option value="Single Trip">Single Trip</option>

                                            </select>

                                                </div>

                                            </div>

                                                <?php 

                                                    $multi = array();

                                                    $multi =  explode(',', $product->gallery_img);

                                                    ?>



                                        <div class="form-group">

                                             <label class="col-sm-2 control-label">Gallery Image</label>

                                             <div class="col-sm-10">

                                             <input class="form-control" type="file" name="gallery_img[]" value="{{$product->gallery_img}}" multiple="" />

                                         </div>



                                          </div>



                                     @foreach($multi as $multiimage)

                                        <div class="col-sm-1">

                                         <img src="{{url('/images/tour/gallery'.$multiimage)}}" class="img-responsive img-1">

                                         

                                      </div>

                                       @endforeach 

                                          



                                            <div class="form-group">

                                                <div class="col-sm-offset-2 col-sm-10">

                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>

                                                </div>

                                            </div>

                            </form>

                                    </div>

                                </div>

                            </div>

                            <!-- /# card -->

                        </div>

                        <!-- /# column -->

                    </div>

                    <!-- /# row -->

                </div>

                <!-- /# main content -->

            </div>

            <!-- /# container-fluid -->

        </div>

        <!-- /# main -->

    </div>

    <!-- /# content wrap -->

@include('layouts.footer')



       