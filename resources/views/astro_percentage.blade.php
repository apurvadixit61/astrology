@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Astro Percentages</h3>
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
																				<th>Percentage</th>
                                                                                <th> Action</th>

                                                </tr>
                                                 </thead>
                                                 <tbody>
                                                @foreach($astro_percentage as $key=>$astro_percentage)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                  <td>{{$astro_percentage->title}}</td>
                                                  <td>{{$astro_percentage->percentage}}</td>

                                                  <td>
                                                  <a href="#" data-toggle="modal" data-target="#add-photos" class="btn btn-primary pull-right">Update</a>
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
                  <h4 class="modal-title"><strong>Astrologer Percentage</strong></h4>
              </div>
      <form method="post" action="{{url('update_astro_percentage') }}" enctype="multipart/form-data" autocomplete="on">
       {{ csrf_field() }}
       
       <div class="modal-body">
              <div class="row">
                 <div class="col-md-12">
                <label class="control-label">Title</label>
                <input type="text" id="" value="{{$astro_percentage->title}}" class="form-control" name="title">

               </div>
      					<div class="container my-5">
      					  <div class="row">
      					      <div class="col">
                  <label class="control-label">Percentage (%)</label>
                  <input type="number" id="" value="{{$astro_percentage->percentage}}" class="form-control" name="percentage">

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


