@include('layouts.header')

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
				  <h3 class="box-title">Product Category</h3>
		 <a href="#" data-toggle="modal" data-target="#add-usertype" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add  Category</a>
 
				</div>
				<!-- /.box-header -->
				<div class="mt-20">
					<div class="table-responsive">
					   <table id="example1" class="table table-bordered table-striped">



                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Image</th>
                                                    <th> Category Name</th>
                                                    <th>Action</th>
                                               
                                                </tr>



                                            </thead>
                                            <tbody>
                                                    <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                $i++;
                                                       ?>
                                                <tr>
                                                    <td>{{ $i;}}</td>
                                                    <?php
                                                    if($user->category_img!="")
                                                    {
                                                        $img=$user->category_img;
                                                    }
                                                    else
                                                    {
                                                        $img='no_img.png';
                                                    }
                                                    ?>
                                              <td><img  style="width:50px;height:50px" class="icon_image" src="{{url('/')}}/images/category_img/{{ $user->category_img }}" /></td>
                                                <td>{{$user->category_english_name}}</td>
                                                <td>
									<a href=""  type="button" class="model_edit" data-id="{{$user->category_identifier}}" data-name="{{$user->category_english_name}}" data-desc="{{$user->category_description}}" data-img={{$user->category_img }}>
									    <span class="badge badge-success mr-5"><i class="fa fa-pencil"></i></span></a>
									<a href="#" data-toggle="modal" data-target="" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>
								</td>
                                       </tr>
                                                
    
                                                <?php  }  }  ?>
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
  
  
  
 
  
<!-- category MODAL -->

    <div class="modal fade none-border" id="add-usertype">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Add  Category</strong></h4>
                </div>

                <form method="POST" action="{{'create_product'}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Category Name</label>

                                <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" required />
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Description</label>

                            <textarea  class="form-control form-white" placeholder="Enter Description" type="text" name="description" required> </textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Image</label>

                                <input class="form-control form-white" type="file" name="image" required />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
                       <!-- <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>-->
                        <input type="submit" value="submit" class="btn btn-danger waves-effect waves-light" >
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

                <form method="POST" action="{{'update_category_product'}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Category Name</label>
                                 <input type="hidden" value="" name="id" id="id">
                                <input class="form-control" placeholder="Enter Name" type="text" name="name" value="" id="names"/>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Description</label>

                            <textarea  class="form-control form-white" placeholder="Enter Description" type="text" name="description" id="desc"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Image</label>
                                 
                                 <input type="hidden" name="old_img" id="old_img">
                                 <img  style="width:50px;height:40px" id="my_img">
                                <input class="form-control form-white" type="file" name="image"/>
                            </div>
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
    

    <!--END MODAL -->  


@include('layouts.footer')

<script>
$(".model_edit").on("click", function(e) {
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
 $('#old_img').val(img);
 var src="{{url('/')}}/images/category_img/"+img
 $("#my_img").attr("src",src);


});
</script>
