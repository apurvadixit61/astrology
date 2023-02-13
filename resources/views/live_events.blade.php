@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">List</h3>
  <a href="#" data-toggle="modal" data-target="#add-event" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Add Media</a>
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
                                                    <th> Name</th>
                                                     <th> Url</th>
                                                     <th> image</th>
                                                     <th> Date</th>
                                                       <th>Delete</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($users){ $i =1;
                                                    foreach($users as $user){
                                                    { ?>
                                                    <tr>
                                                     <td>{{ $i;}}</td>

                                                     <td>{{$user->event_name}}</td>
                                                     <td>{{$user->video_url}}</td>
																										 <td><img height="100" src="https://tenspark.com/astrologer/images/event_img{{$user->event_img}}" alt=""> </td>
                                                     <td>{{$user->event_date}}</td>
                                                     <td>
																											 <a class="ac_btn" data-toggle="modal" data-target="#edit-event{{$user->id}}"  title="Edit"><span class="badge badge-info mr-5"><i class="fa fa-pencil-square-o"></i></span></a>
																											 <a class="ac_btn" onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('delete_users123/'.$user->id)}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>
																										 	</td>

                                                      </tr>

																											<!-- Modal -->
																											<div class="modal fade none-border" id="edit-event{{$user->id}}">
																											<div class="modal-dialog">
																											    <div class="modal-content">
																											        <div class="modal-header">
																											            <h4 class="modal-title"><strong>Add Live Event</strong></h4>
																											        </div>
																											<form method="post" action="{{url('edit_events') }}" enctype="multipart/form-data" >
																											 @csrf

																											 <div class="modal-body">
																												 <div class="row">



																												 <div class="col-md-12">

																														 <label class="control-label">Event Name</label>

																														 <input class="form-control form-white" placeholder="Please Enter name" type="text" name="event_name" value="{{$user->event_name}}" pattern="[a-zA-Z][a-zA-Z ]*" required />
																												 </div>
																												 <input type="hidden" name="id" value="{{$user->id}}">

																														 <div class="col-md-6">
																														 <label class="control-label">Event</label>
																														 <input class="form-control form-white" placeholder="Please Enter Image" type="file" name="event_img"  accept="video/mp4,video/x-m4v,video/*"  />
																														 {{$user->event_img}}
																														 </div>
																														 <div class="col-md-6">
																														 <label class="control-label">Video Url</label>
																														 <input class="form-control form-white" placeholder="Please Enter Url" type="url" name="video_url" value="{{$user->video_url}}" required="" />

																														 </div>


																														 <div class="col-md-6">
																														 <label class="control-label">Date</label>
																														 <?php
																																$s = $user->event_date;
																																$dt = new DateTime($s);

																																$date = $dt->format('Y-m-d');
																																?>
																																			 <input class="form-control form-white" placeholder="Please Enter Avability" type="date" value="{{$date}}" name="event_date"  required="" />
																														 </div>


																								 </div>




																											</div>

																											        <div class="modal-footer">
																																<input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
																																<input type="submit" class="btn btn-danger" name="" value="Submit">
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
