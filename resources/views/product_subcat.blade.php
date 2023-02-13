@include('layouts.header')
@section('head')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection
<div class="content-wrapper">
     <!-- /# column -->
                 @if (Session::has('message'))
                   <div class="alert alert-success">{{ Session::get('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
                @endif
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub Category List</h3>
				  <a href="#" data-toggle="modal" data-target="#add-subcategory" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Business Category</a>

				 
				</div>
				<!-- /.box-header -->
				<div class="mt-20">
					<div class="table-responsive">
					   <table id="example1" class="table table-bordered table-striped">



                                            <thead>
                                                <tr>
                                                   
                                                    <th>Id</th>
                                                      <th>Category Name</th>
                                                    <th>Subcategory Name</th>
                                                  
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>



                                            </thead>
                                            <tbody>
                                                    <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>
                                                <tr>
                                             
                                                <td>{{ $i;}}</td>
                                                <td>{{$user->cat_name}}</td>
                                                <td>{{$user->english_name}}</td>
                                                <td>{{$user->description}}</td>
                                                <td>
									<a href=""  type="button" class="model_edit_subcat" data-id="{{$user->subcategory_id}}" data-name="{{$user->english_name}}" data-desc="{{$user->description}}" >
									    <span class="badge badge-success mr-5"><i class="fa fa-pencil"></i></span></a>
									<a href="#" data-toggle="modal" data-target="" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>
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
  
  <!-- Sub Category MODAL -->

<div class="modal fade none-border" id="add-subcategory">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Add Sub Category</strong></h4>
        </div>
<form method="POST" action="{{'product-subcategory'}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="row">
            
            <div class="col-md-12">
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

            <label class="control-label">Subcategory Name</label>

            <input class="form-control form-white" placeholder="Enter english name" type="text" name="english_name" required />
            @if ($errors->has('english_name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>

                 
          
            

           <!-- <div class="col-md-12">

            <label class="control-label">Sub Category Arabic Name</label>

            <input class="form-control form-white" placeholder="Enter arabic name" type="text" name="arabic_name" required />

            </div>-->
            <div class="col-md-12">

            <label class="control-label">Description</label>

            <textarea class="form-control form-white" placeholder="Enter Description" type="text" name="description" required ></textarea>

            </div>
            

</div>                     





</div>

        <div class="modal-footer">

             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
             <input type="submit" class="btn btn-danger waves-effect waves-light" value="Submit">

        </div>

        </div>

         </form>

    </div>

</div>

</div>

<!--updatemodel-->

<div class="modal fade none-border" id="update-category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Update Category</strong></h4>
                </div>
 <div class="modal-body">
                <form method="POST" action="{{'update_category_product'}}" enctype="multipart/form-data">
                    
                
                <input type="text" value="{{ csrf_field()}}" id="token" class="token">    
                 

               
                <div class="row">
                <div class="col-md-12">
                 <select class="form-control category_id" id="category_id" name="category_id">
                  <option value="">Please select</option>
                  <?php foreach ($product_cat as $key=>$username): ?>
                  <option data-id="$username->category_identifier" value="<?php echo $username->category_identifier; ?>" <?php
                  if (isset($category_id) && Input::old('category_id') == $username->category_english_name)

                  {

                  echo 'selected="selected"';

                  }
                  ?>>

                  <?php  echo $username->category_english_name; ?></option>

                  <?php endforeach; ?>

                  </select>
                                
                               <!-- <label class="control-label">Category Name</label>
                                 <input type="hidden" value="" name="id" id="id">
                                <input class="form-control" placeholder="Enter Name" type="text" name="name" value="" id="names"/>-->
                            </div>
                            <br>
                            
                             <div class="col-md-12">
                                <select id="old_subcategory"  class="form-control">
                                    
                                </select>

                            </div>
                            
                            
                            
                            
                            <div class="col-md-12">
                                <label class="control-label">Description</label>

                            <textarea  class="form-control form-white" placeholder="Enter Description" type="text" name="description" id="desc"></textarea>
                            </div>
                            
                            
                          </div>
                    

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
                        <!--<button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>-->
                        <input type="submit" value="submit" class="btn btn-danger waves-effect waves-light" >
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </div> 


@include('layouts.footer')
<script>
$(".model_edit_subcat").on("click", function(e) {
    alert();
  e.preventDefault();
var name=$(this).attr("data-name"); 
var id=$(this).attr("data-id"); 
alert(id);
var desc=$(this).attr("data-desc"); 
var img=$(this).attr("data-img"); 
 $('#update-category').modal('show');
 $('#names').val(name);
 $('#desc').val(desc);
 $('#id').val(id);



});


$(".category_id").on("change", function(e) 
{
var cat_id = $(this).data('id');
$.ajax
    ({ 
        url: 'get_subcategory_list',
        data: "cat_id="+cat_id,
           headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }

        type: 'post',
        success: function()
        {
            
            /*$('#subcategory_id').html(`<option value="${optionValue}">
                                       ${optionText}
                                  </option>`);*/
            
        }
    });

});

</script>