@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Testimonial</h3>
  <a href="#" data-toggle="modal" data-target="#add-testimonial" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Testimonial</a>
				</div>
				<!-- /.box-header -->

                 @if (Session::has('message'))

                       <div class="alert alert-success">{{ Session::get('message') }}</div>

                    @endif
				<div class="mt-20">
					<div class="table-responsive">
					 <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>

                                                    <th>Id</th>
																										<th>Images</th>
																										<th>Thumbnail</th>
																										<th>Users</th>
																										<th>Video</th>
                                                    <th>Locations</th>

                                                     <th> Date</th>
                                                        <th> Delete</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($users){ $i =1;
                                                    foreach($users as $user){
                                                    { ?>
                                                    <tr>
                                                     <td>{{ $i;}}</td>
																										 <td> <img height="100" width="100" src="{{url('/images/testimonial_users/')}}{{$user->image}}" alt=""></td>
																										 <td> <img height="100" width="100" src="{{url('/images/testimonial_thumbnail/')}}{{$user->coverimg}}" alt=""></td>
																										 <td>{{ $user->user_name}}</td>
																										 <td>{{ $user->location}}</td>
                                                     <td>{{$user->video_url	}}</td>
                                                     <td>{{$user->created_date}}</td>
                                                  <td>
																										<a class="ac_btn" data-toggle="modal" data-target="#edit-testimonial{{$user->id}}"  title="Edit"><span class="badge badge-info mr-5"><i class="fa fa-pencil-square-o"></i></span></a>
			 <a class="ac_btn" onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('delete_users12/'.$user->id)}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a></td>

                                                    </tr>
																										<div class="modal fade none-border" id="edit-testimonial{{$user->id}}">
																										<div class="modal-dialog">
																										    <div class="modal-content">
																										        <div class="modal-header">
																										            <h4 class="modal-title"><strong>Edit Testimonial</strong></h4>
																										        </div>
																										<form method="post" action="{{url('edit_testimonial') }}" enctype="multipart/form-data" autocomplete="on">
@csrf
																										 <div class="modal-body">
																										        <div class="row">
																															<input type="hidden" name="id" value="{{$user->id}}">

																										            <div class="col-md-6">
																										            <label class="control-label">User Name</label>
																										            <input class="form-control form-white" placeholder="Enter user name" value="{{$user->user_name}}" type="text" name="user_name"  required/>
																										            </div>
																																<div class="col-md-6">
																																<label class="control-label">Image</label>
																																<input class="form-control form-white"  type="file" name="image" />{{$user->image}}
																																</div>
																																<div class="col-md-6">
																																<label class="control-label">Location</label>
																																<input class="form-control form-white"  type="text" name="location"  value="{{$user->location}}"/>
																																</div>
																																<div class="col-md-6">
																																<label class="control-label">Cover Image</label>
																																<input class="form-control form-white"  type="file" name="coverimage" />{{$user->coverimg}}
																																</div>
																																<div class="col-md-6">
																																<label class="control-label">Video</label>
																																<input class="form-control form-white" placeholder="https://example.com" type="url" value="{{$user->video_url}}" name="video_url" pattern="https://.*" size="30" id="url" required/>
																																</div>
																										            <div class="col-md-6">
																										            <label class="control-label">Date</label>
																																<?php
																																	 $s = $user->created_date;
																																	 $dt = new DateTime($s);

																																	 $date = $dt->format('Y-m-d');
																																	 ?>
																										            <input class="form-control form-white" placeholder="Please Enter Date" type="date"  value="{{$date}}" name="created_date" accept="image/*" required="" />
																										            </div>


																										</div>





																										</div>

																										        <div class="modal-footer">

																										             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
																										             <input type="submit" class="btn btn-danger " value="Submit">

																										        </div>

																										        </div>

																										         </form>

																										    </div>

																										</div>
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
