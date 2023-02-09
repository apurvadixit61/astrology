@include('layouts.header')

<div class="content-wrapper">
     <!-- /# column -->
              
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub Category List</h3>
				 
				</div>
                  </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}

                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
                    @endif



				<!-- /.box-header -->
				<div class="mt-20">
				<div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Edit Product</h4>
                                </div>











                                <div class="col-md-12 text-centerr">
<img src="{{url('/images/product_img/'.$product->product_main_image)}}" style="width:50px;height:50px" class="img-responsive img-circle img-1">



                                </div>



                <div class="card-body">
                    <div class="menu-upload-form">
                            <form class="form-horizontal" method="POST" action="{{url('post_edit_product')}}" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 @php $user=Auth::user()->id; @endphp

                                <input class="form-control form-white"  type="hidden" name="user_id"  value="{{$user}}" />
                                 <input type="hidden" name="id" value="{{$product->product_identifier}}">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Upload Product</label>
                                                <div class="col-sm-10">
                                                    <div class="form-control file-input dark-browse-input-box">
                                            <input class="file-name input-flat" type="file" name="product_img" placeholder="Browse Files">

                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group">



                                                <label class="col-sm-2 control-label">English Name</label>



                                                <div class="col-sm-10">


                                                
                                                    <input class="form-control form-white" placeholder="Enter English Name" type="text" name="english_name" value="{{$product->english_name}}">
                                                   



                                                </div>



                                            </div>







                                       <!--     <div class="form-group">



                                             <label class="col-sm-2 control-label">Arabic Name</label>



                                              <div class="col-sm-10">



                                             <input class="form-control form-white" placeholder="Arabic Name" type="text" name="arabic_name" value="{{$product->arabic_name}}" required=""/>



                                          </div>-->
                                          
                                          
                                          <div class="form-group">



                                            <label class="col-sm-2 control-label">Seller Type</label>



                                            <div class="col-sm-10">



                                            <input class="form-control form-white" placeholder="Seller Type" type="text" name="seller_type" value="{{$product->seller_type}}" required=""/>



                                            </div>



                                      </div>







                                            <div class="form-group">



                                                <label class="col-sm-2 control-label">Description</label>



                                                <div class="col-sm-10">







                                                     <textarea rows="1" cols="10" class="form-control" placeholder="Enter description" type="text" name="product_description" required="" >{{$product->product_description}}</textarea> 



                                                </div>



                                            </div>



                                            <div class="form-group">



                                                <label class="col-sm-2 control-label">Category</label>



                                                <div class="col-sm-10">



                                                <select class="form-control" id="product_category_id" name="product_category_id" required="">



                                    <option value="{{$product->product_category_id}}">Please select</option>



                                        <?php foreach ($product_cat as $key=>$username): ?>



                                        <option value="<?php echo $username->category_identifier; ?>" 

                                        

                                        {{  $product->product_category_id == $username->category_identifier ? 'selected' : '' }}

                                        >



                                        <?php  echo $username->category_english_name; ?></option>



                                        <?php endforeach; ?>



                                </select>



                                                </div>



                                            </div>















                                            <div class="form-group">



                                                <label class="col-sm-2 control-label">Sub Category</label>



                                                <div class="col-sm-10">



                                 <select class="form-control" id="product_sub_category_id" name="product_sub_category_id" >



                                    <option value="{{$product->product_sub_category_id}}">Please select</option>



                                        <?php foreach ($product_sub as $key=>$username): ?>



                                        <option value="<?php echo $username->subcategory_id; ?>" 

                                         {{ $product->product_category_id == $username->subcategory_id ? 'selected' : '' }}

                                      



                                       >



                                        <?php  echo $username->english_name; ?></option>



                                        <?php endforeach; ?>



                                </select>



                                                </div>



                                            </div>



                                          







                                            <div class="form-group">
                                              <div class="col-sm-offset-2 col-sm-10">
                                                  <input type="submit" value="Update" class="btn btn-lg btn-primary">



<!--                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
-->


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

				</div>
				<!-- /.box-body -->
			  </div>
				</div>
				
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>


@include('layouts.footer')
