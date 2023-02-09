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
				  <h3 class="box-title">Business Category List</h3>
				  <a href="#" data-toggle="modal" data-target="#add-usertype" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Business Category</a>
				</div>
				<!-- /.box-header -->
				<div class="mt-20">
					<div class="table-responsive">
					   <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Image</th>
                                                    <th>Category Name</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>
                                                <tr>
                                                    <td>{{$i;}}</td>
                                                    <td><img class="icon_image" src="{{url('/')}}/images/company_category_img/{{ $user->image }}" /></td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->description}}</td>
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



<!-- category MODAL -->

    <div class="modal fade none-border" id="add-usertype">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Add Business Category</strong></h4>
                </div>

                <form method="POST" action="{{'create'}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Business Category Name</label>

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

    <!--END MODAL -->

   

</div>

@include('layouts.footer')
