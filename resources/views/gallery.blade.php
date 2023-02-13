@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Gallery</h3>
  <a href="#" data-toggle="modal" data-target="#add-photos" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Photos</a>
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

																				<th>Id</th>						<th>Astrologer</th>
																										<th>Images</th>

                                                        <th> Delete</th>

                                                </tr>
                                                 </thead>
                                                  <tbody>
                                                @foreach($galleries as $key=>$gallery)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                  <td>{{$gallery->name}}</td>
                                                  <td><img height="100" width="100" src="{{asset('images/astro_gallery')}}{{$gallery->image}}" alt=""> </td>

                                                  <td>
                                                    <a class="ac_btn" onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('gallery_delete/'.$gallery->id)}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>

                                                  </td>
                                                </tr>
                                                @endforeach
                                            
                                          
                                          </tbody>
                                        </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
				</div>

			</div><div class="modal fade none-border" id="add-photos">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"><strong>Astrologer Gallery</strong></h4>
              </div>
      <form method="post" action="{{url('uploadgalleries') }}" enctype="multipart/form-data" autocomplete="on">
       {{ csrf_field() }}

       <div class="modal-body">
              <div class="row">

                <div class="col-md-12">

                   <label class="control-label">Name</label>

                   <select class="form-control" name="id" >
                     @foreach($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                     @endforeach

                   </select>
               </div>
      					<div class="container my-5">
      					  <div class="row">
      					      <div class="col">
                  <label class="control-label">Upload images</label>

      					  <input type="file" id="files" name="files[]" multiple class="form-control" accept="image/*"/>
      					      </div>
      					 </div>
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
		</section>
		<!-- /.content -->
	  </div>
  </div>


@include('layouts.footer')


