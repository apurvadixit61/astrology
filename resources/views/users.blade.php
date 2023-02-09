@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Customers List</h3>
<!--				  <a href="#" data-toggle="modal" data-target="#add-users" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add User</a>
-->
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

                                                    <!--<th>Image</th>-->
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($users){ $i =1;
                                                    foreach($users as $user){
                                                    { ?>
                                                    <tr>
                                                     <td>{{ $i;}}</td>


                                                  <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone_no}}</td>
                                                     <td>{{$user->created_at}}</td>
                                                   <td class="action_btn">


                                                    <a class="ac_btn astroview" type="button" data-toggle="modal" data-target="#myModal" onclick="showUserDetails({{$user->id}})"><span class="badge badge-primary mr-5"><i class="fa fa-eye"></i></span></a>
                                                    <!-- <a class="ac_btn" href="{{url('edit_/'.$user->id)}}" title="Edit"><span class="badge badge-info mr-5"><i class="fa fa-pencil-square-o"></i></span></a> -->

                                                    <a class="ac_btn" onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('delete_user/'.$user->id)}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>


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



<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
                          <input type="button" class="closemmodaling" data-dismiss="modal" style="margin-left: -1%;" value="x">

<!--            <button type="button" class="closemmodaling" data-dismiss="modal" style="margin-left: -1%;">&times;</button>
-->            <h5 class="modal-title text-center">Show User Full Detail</h5>
         </div>
         <div class="modal-body">

         </div>
      </div>
   </div>
</div>


		</section>
		<!-- /.content -->
	  </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).on('click', '.closemmodaling', function() {
     $("#myModal").modal('hide');
});

function showUserDetails(postid){
   console.log(postid);
           $.ajax({
                url : '{{ route("getuserdata") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{postid:postid},
                success:function(data){
                   console.log(data);
                $('.modal-body').html(data)

                },

            });

}

</script>


@include('layouts.footer')
