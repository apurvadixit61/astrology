@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Product List</h3>
<!--				  <a href="#" data-toggle="modal" data-target="#add-usertype" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Category</a>
-->				</div>
				<!-- /.box-header -->
				<div class="mt-20">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Sr.no</th>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th> Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                     <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><img style="width:50px;height:50px" class="icon_image"src="{{url('/')}}/images/product_img/{{ $user->product_main_image }}" /></td>
                                                    <td>{{$user->english_name}}</td>
                                                    <td>{{$user->product_description}}</td>
                                       <td>
									<a href="{{url('edit_product/'.$user->product_identifier)}}">
									    <span class="badge badge-success mr-5"><i class="fa fa-pencil"></i></span></a>
									<a href="#" data-toggle="modal" data-target="{{'#delete_product'.$user->product_identifier}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>
								</td>

                                                </tr>
                                                <?php  $i++;}}} ?>
                                            </tbody>
                                        </table>
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

<div class="modal fade none-border" id="add-usertype">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Add Product Category</strong></h4>
        </div>

       

        <form method="POST" action="{{'product-category'}}" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="modal-body">

        <div class="row">

            <div class="col-md-12">

            <label class="control-label">Category English Name</label>

            <input class="form-control form-white" placeholder="Enter english name" type="text" name="category_english_name" required />

            </div>
         
            <div class="col-md-12">

            <label class="control-label">Category Description</label>

            <textarea class="form-control form-white" placeholder="Enter Description" type="text" name="category_description" required></textarea>
            </div>
            <div class="col-md-12">

            <label class="control-label">Category Image</label>

            <input class="form-control form-white"  type="file" name="category_img" required />

            </div>
      </div>
   </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
        </div>
         </form>
    </div>
</div>
</div>

<!--END MODAL -->
 <!-- Sub Category MODAL -->

<div class="modal fade none-border" id="add-subcategory">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Add Sub Category</strong></h4>
        </div>
<form method="POST" action="{{'product-subcategory'}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="row">
        <div class="col-md-12">

            <label class="control-label">Sub Category English Name</label>

            <input class="form-control form-white" placeholder="Enter english name" type="text" name="english_name" required />
            @if ($errors->has('english_name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>

                 
          
            <div class="col-md-6">
                  <label class="control-label">Category</label>
                  <select class="form-control" id="category_id" name="category_id" required="">
                  <option value="">Please select</option>
                  <?php foreach ($product_cat as $key=>$username): ?>
                  <option value="<?php echo $username->category_identifier; ?>" <?php
                  if (isset($category_id) && Input::old('category_id') == $username->category_english_name)

                  {

                  echo 'selected="selected"';

                  }

                  ?>>

                  <?php  echo $username->category_english_name; ?></option>

                  <?php endforeach; ?>

                  </select>
                  @if ($errors->has('category_id'))
                  <span class="text-danger">{{ $errors->first('category_id') }}</span>
                  @endif



                  </div>

            <div class="col-md-12">

            <label class="control-label">Sub Category Arabic Name</label>

            <input class="form-control form-white" placeholder="Enter arabic name" type="text" name="arabic_name" required />

            </div>
            <div class="col-md-12">

            <label class="control-label">Sub Category Description</label>

            <input class="form-control form-white" placeholder="Enter Description" type="text" name="description" required />

            </div>
            

</div>                     





</div>

        <div class="modal-footer">

            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>

        </div>

        </div>

         </form>

    </div>

</div>

</div>


<div style="z-index: 9999;" class="modal fade none-border" id="add-users">

<div class="modal-dialog">

   <div class="modal-content">

      <div class="modal-header">

         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

         <h4 class="modal-title"><strong>Add Product</strong></h4>

      </div>

      <div class="modal-body">

         <form method="POST" action="{{'addproduct'}}" enctype="multipart/form-data">
          @php $user=Auth::user()->id; @endphp
            {{ csrf_field() }}
            <input class="form-control form-white"  type="hidden" name="user_id"  value="{{$user}}" />
            <div class="row">
               <div class="col-md-6">
                  <label class="control-label">English Name</label>
                  <input class="form-control form-white" placeholder="Enter English Name" type="text" name="english_name" required="" />
               </div>
                <div class="col-md-6">
                  <label class="control-label">Arabic Name</label>
                  <input class="form-control form-white" placeholder="Arabic Name" type="text" name="arabic_name" required=""/>
               </div>
             </div>

             <div class="row">
              <div class="col-md-6 disc_prcnt">
                <label class="control-label">Seller Type</label>
                <input class="form-control form-white" placeholder="Seller Type" type="text" name="seller_type" required=""/>
              </div>
            <div class="row">
             <div class="col-md-6">
                <label class="control-label">Description</label>
                <!-- <input class="form-control form-white" placeholder="Enter description" type="text" name="description" required=""/> -->
                 <textarea rows="1" cols="10" class="form-control" placeholder="Enter description" type="text" name="product_description" required="" ></textarea>
             </div>
           </div>
             <div class="row">

               <div class="col-md-6">

                  <label class="control-label">Category</label>

                  <select class="form-control" id="product_category_id" name="product_category_id" required="">

                     <option value="">Please select</option>

                     <?php foreach ($product_cat as $key=>$username): ?>

                     <option value="<?php echo $username->category_identifier; ?>" <?php

                        if (isset($product_category_id) && Input::old('product_category_id') == $username->category_english_name)

                        {

                            echo 'selected="selected"';

                        }

                        ?>>

                        <?php  echo $username->category_english_name; ?>

                     </option>

                     <?php endforeach; ?>

                  </select>

               </div>



                                      



               <div class="col-md-6">

                  <label class="control-label">Sub Category</label>

                  <select class="form-control" id="product_sub_category_id" name="product_sub_category_id" required="">

                     <option value="">Please select</option>

                     <?php foreach ($product_sub as $key=>$username): ?>



                  <option value="<?php echo $username->subcategory_id; ?>" <?php

                        if (isset($product_sub_category_id) && Input::old('product_sub_category_id') == $username->english_name)

                        {

                            echo 'selected="selected"';

                        }

                        ?>>

                        <?php  echo $username->english_name; ?>

                     </option>

                     <?php endforeach; ?>

                  </select>

               </div>

             </div>

                <div class="col-md-6">

                  <label class="control-label">Image</label>

                  <input class="form-control form-white" type="file" name="product_img" required=""/>

               </div>

             </div>

              
               <!-- </div> -->

            <div class="modal-footer">

               <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

               <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Submit</button>

            </div>

         </form>

      </div>

   </div>

</div>

</div>

</div>        
@include('layouts.footer')
