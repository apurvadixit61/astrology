@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Live News List</h3>
  <a href="#" data-toggle="modal" data-target="#add-news" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add News</a>
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
																										<th>Title</th>
                                                    <th>Image</th>
                                                     <th>News Url</th>
                                                     <th>News</th>
                                                     <th>Created Date</th>
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
                                                     <td>{{$user->title}}</td>

                                                     <td><img width="200" height="100" src="images/astro_news{{$user->video_url}}" alt=""> </td>
                                                     <td>{{$user->news_url}}</td>
                                                     <td>{{$user->news}}</td>
                                                     <td>{{$user->created_date}}</td>
                                                    <td>
																											<a class="ac_btn" data-toggle="modal" data-target="#edit-news{{$user->id}}"  title="Edit"><span class="badge badge-info mr-5"><i class="fa fa-pencil-square-o"></i></span></a>

																											<a class="ac_btn" onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('delete_users1/'.$user->id)}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a></td>
                                                    </tr>
																										<div class="modal fade none-border" id="edit-news{{$user->id}}">
																										<div class="modal-dialog">
																										    <div class="modal-content">
																										        <div class="modal-header">
																										            <h4 class="modal-title"><strong>Edit News</strong></h4>
																										        </div>
																										<form method="post" action="{{url('edit_news') }}" enctype="multipart/form-data" autocomplete="on">
																										 {{ csrf_field() }}

																										 <div class="modal-body">
																										        <div class="row">
																															<div class="col-md-6">
																															<label class="control-label">Title</label>
																															<input class="form-control form-white" placeholder="Please Enter Title" type="text" name="title" value="{{$user->title}}"  required="" />
																															</div>
																										            <div class="col-md-6">
																										            <label class="control-label">Image</label>
																																<input class="form-control form-white"  type="file" name="image" accept="image/*" />{{$user->video_url}}
																																<input type="hidden" name="id" value="{{$user->id}}">

																										            </div>

																										            <div class="col-md-6">
																										            <label class="control-label">News Url</label>
																										            <input class="form-control form-white" placeholder="https://example.com" type="url" name="news_url" pattern="https://.*" size="30" id="url" value="{{$user->news_url}}"/>
																										            </div>

																										             <div class="col-md-6">
																										            <label class="control-label">News</label>
																																<textarea class="form-control form-white" name="news" rows="8" cols="80" required placeholder="Eneter your news here...">{{$user->news}}</textarea>
																										            </div>

																										            <div class="col-md-6">
																										            <label class="control-label">Date</label>
																																<?php
																																	 $s = $user->created_date;
																																	 $dt = new DateTime($s);

																																	 $date = $dt->format('Y-m-d');
																																	 ?>
																										            <input class="form-control form-white" placeholder="Please Enter Date" type="date" name="news_date"  value="{{$date}}" />
																										            </div>



																										</div>





																										</div>

																										        <div class="modal-footer">

																										             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
																										             <input type="submit" class="btn btn-danger" value="Submit">

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
