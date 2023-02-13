@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Astrologer List</h3>
				  <a href="#" data-toggle="modal" data-target="#add-users" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Astrologer</a>

				</div>
				<!-- /.box-header -->
				<div class="alert alert-success fivshow" style="display:none"><span>User status changed sucessfully!!!!!</span></div>

                 @if (Session::has('message'))

                       <div class="alert alert-success">{{ Session::get('message') }}
                    @endif
</div>
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
                                                    <th>Verify</th>
                                                    <th>Staus</th>
                                                    <th>Date</th>
                                                    

                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $parma='';
                                            if($users){ $i =1;
                                            
                                                    foreach($users as $user){
                                                       $status= $user->status;
                                                      
                                                       if($status==1){
                                        $parma='<span class="badge badge-success">Approved</span>
'  ; 
                                                       }else if($status==0 || $status=="" || $status==null){
                                        $parma='<span class="badge badge-warning">Pending</span>
' ;
                                                       }else if($status==2){
                                                           $parma='<span class="badge badge-danger">Rejected</span>
 ' ;
                                                       } else if($status==3){
                                                            $parma='<span class="badge badge-info">Suspended</span>
 ' ;
                                                       }
                                                    { ?>
                                                    <tr id="{{$user->id}}">
                                                     <td>{{ $i;}}</td>
                                                     <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone_no}}</td>
                                                    
                                                    
<td><?php echo $parma;?></td>
                                                     
 <td><select name="changeStatus" class="form-control changeStatus"><option value="0" <?php if($user->status==0){echo 'selected';}?>>Pending</option><option value="1" <?php if($user->status==1){echo 'selected';}?>>Verify</option><option value="2" <?php if($user->status==3){echo 'selected';}?>>Rejected</option><option value="3" <?php if($user->status==4){echo 'selected';}?>>Suspended</option></select></td>
                                                     <td>{{$user->created_at}}</td>
                                                   <td class="action_btn">



                                                    <a class="ac_btn astroview" type="button" data-toggle="modal" data-target="#myModal" onclick="showUserDetailsAstro({{$user->id}})"><span class="badge badge-primary mr-5"><i class="fa fa-eye"></i></span></a>
                                                    <!--<a class="ac_btn astroview" type="button" data-toggle="modal" data-target="#myModal"><span class="badge badge-primary"><i class="fa fa-edit"></i></span></a>-->
                                                   <a href="#" data-toggle="modal" data-target="#edit-users{{$user->id}}" class="ac_btn astroview" ><span class="badge badge-success"><i class="fa fa-edit"></i></span></a>
                                                    <a class="ac_btn" onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('delete_user/'.$user->id)}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>

                                                    </td>
                                                    </tr>
<div class="modal fade none-border" id="edit-users{{$user->id}}">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Edit User</strong></h4>
        </div>
<form method="POST" action="{{url('edit_user') }}" enctype="multipart/form-data" autocomplete="on">
 {{ csrf_field() }}

 <div class="modal-body">
        <div class="row">

                  <div class="col-md-12">
                  <label class="control-label">User type</label>
                  <select class="form-control" id="user_type" name="user_type" required="">
                <!--  <option value="1">Become Customer</option>-->

                  <option value="2">Become Astrologer</option>
                  </select>
                  </div>

        <div class="col-md-12">

            <label class="control-label" id="name">Name</label>
         <input class="form-control form-white"  type="hidden" name="id"  value="{{$user->id}}" />
            <input class="form-control form-white" placeholder="Please Enter name" type="text" name="name" id="name" value="{{$user->name}}" required />
        </div>

            <div class="col-md-6">
            <label class="control-label">Email</label>
						<input class="form-control form-white check_email"  placeholder="Please Enter Email" type="text" name="email" value="{{$user->email}}" required  />
            <span id="mainmsg"></span>
            </div>

              <div class="col-md-6">
            <label class="control-label">Phone No.</label>
            <input class="form-control form-white" placeholder="Please Enter Phone Number" type="number" name="phone_no" value="{{$user->phone_no}}" required />
            </div>


            <!--<div class="col-md-6">-->
            <!--<label class="control-label">Password</label>-->
            <!--<input  type="password" class="form-control form-white" placeholder="Please Enter Password" type="text" name="password" value="{{$user->password}}" required />-->
            <!--</div>-->

            <!--<div class="col-md-6">-->
            <!--<label class="control-label">Confirm-Password</label>-->
            <!--<input  type="password" class="form-control form-white" placeholder="Please Enter Password" type="text" name="password" value="{{$user->password}}" required />-->
            <!--</div>-->



            <!--<div class="col-md-6">
            <label class="control-label">Dob</label>
            <input class="form-control form-white" type="date" placeholder="Plese Enter Dob" type="text" name="dob" required />
            </div>


            <div class="col-md-6">
            <label class="control-label">Birth time</label>
            <input class="form-control form-white" type="time" placeholder="Plese Enter Birth time" type="text" name="birth_time" required />
            </div>

            <div class="col-md-6">
            <label class="control-label">Birth Place</label>
            <input class="form-control form-white" placeholder="Plese Enter birth place" type="text" name="birth_place" required />
            </div>
            -->

            <div class="col-md-6" style="display:none" id="divamt">
            <label class="control-label">Consulting Amount</label>
            <input class="form-control form-white" type="amount" placeholder="Please Enter Amount" type="text" name="consultant_amt" value="{{$user->device_id}}"  />
            </div>



            <div class="col-md-6">
            <label class="control-label">Expertise</label>
            <input class="form-control form-white" placeholder="Please Enter Expertise" type="text" name="user_expertise" value="{{$user->user_expertise}}" required=""  />
            </div>

            <div class="col-md-6">
            <label class="control-label">Experience</label>
<!--            <input class="form-control form-white" placeholder="Plese Enter Experience" type="text" name="user_experience"  />
-->

<select class="form-control form-white" placeholder="Please Enter Experience" type="text" name="user_experience" value="{{$user->user_experience}}" required="" >
                <option value="0-1">0-1</option>
                <option value="1-3">1-3</option>
                <option value="3-5">3-5</option>
                <option value="5-7">5-7</option>
                <option value="7-10">7-10</option>
                <option value="10+">10+</option>
            </select>

            </div>

             <div class="col-md-6">
            <label class="control-label">Language</label>
            <input class="form-control form-white" placeholder="Please Enter language" type="text" name="user_language" value="{{$user->user_language}}" required="" />
            </div>


            <div class="col-md-6">
            <label class="control-label">Per Minute Charges</label>
            <input class="form-control form-white" placeholder="Please Enter language" type="text" name="per_minute" value="{{$user->per_minute}}" required="" />
            </div>

            <div class="col-md-6">
            <label class="control-label">Avability</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" type="text" name="user_avability" value="{{$user->user_avability}}" required=""  />
            </div>


             <div class="col-md-6">
            <label class="control-label">Education</label>
            <input class="form-control form-white" placeholder="Please Enter Expertise" type="text" name="user_education" value="{{$user->user_education}}" required=""  />
            </div>

            <div class="col-md-6">
            <label class="control-label">Profile image</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" type="file" name="profile_image" value="{{$user->profile_image}}" />
<?php
 $ext = pathinfo($user->profile_image,PATHINFO_EXTENSION);
$allowed = array('doc', 'pdf', 'docx');
if(in_array($ext, $allowed))
{
	?>
	<a href="{{'images/profile_image/'.$user->profile_image}}" target="_blank">View File <i class="fa fa-eye" aria-hidden="true"></i></a>
	<?php
}else if(empty($ext)){
	echo "<span style='color:red;' >No file Uploaded</span>";
}else{
	?>

	<img src="{{'images/profile_image/'.$user->profile_image}}" height="50" weight="50" alt="image">

	<?php
}?>

            </div>

             <div class="col-md-12">
            <label class="control-label">About us</label>
            <textarea class="form-control" name="user_aboutus" value="{{$user->user_aboutus}}">{{$user->user_aboutus}}</textarea>
            </div>

</div>





</div>

        <div class="modal-footer">

             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
             <input type="submit" class="btn btn-danger" value="Update">

        </div>

        </div>

         </form>

    </div>

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


<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
             <input type="button" class="closemmodaling" data-dismiss="modal" style="margin-left: -1%;" value="x">
<!--            <button type="button" class="closemmodaling" data-dismiss="modal" style="margin-left: -1%;">&times;</button>
-->            <h5 class="modal-title text-center">Show Astro Full Detail</h5>
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
$('.changeStatus').on('change', function() {
  //alert( this.value );
  var status =this.value ;
  //trid = $('tr').attr('id');
    var id = $(this).closest('tr').attr('id');
    alert(id);
     $.ajax({
                url : '{{ route("changeAastrostatus") }}',
                type: 'POST',
            //   contentType: "application/json; charset=utf-8",
               dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{status:status,id:id},
                success:function(data){
                   console.log(data.success);
                   if(data.success==true){
                 
                   // $('.fivshow').html(data);
                    $(".fivshow").css("display", "block");
$('.fivshow').delay(5000).fadeOut('slow');

                   }
               // $('.modal-body').html(data)

                },

            });

});

function showUserDetailsAstro(postid){
  $.ajax({
                url : '{{ route("getastrodata") }}',
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>





<script type="text/javascript">
$(document).on('click', '.closemmodaling', function() {
     $("#myModal").modal('hide');
});


</script>



@include('layouts.footer')
