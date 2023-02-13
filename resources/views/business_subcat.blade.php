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
				  <h3 class="box-title">Business Sub Category List</h3>
				  <a href="#" data-toggle="modal" data-target="#add-subcategory" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Business Category</a>
				</div>
				<!-- /.box-header -->
				<div class="mt-20">
					<div class="table-responsive">
					   <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                                <tr>
                                                   <th>Id</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                </tr>
 </thead>
                                            <tbody>
                                                    <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>
                                                <tr>
                                                <td>{{ $i;}}</td>    
                                                <td><img class="icon_image"src="{{url('/')}}/images/company_subcategory_img/{{ $user->image }}" /></td>
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

@include('layouts.footer')
