@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Withdrawal Amount List</h3>

				</div>
				<!-- /.box-header -->
				
                 @if (Session::has('message'))

                       <div class="alert alert-success">{{ Session::get('message') }}</div>

                    @endif
                    
                     <div class="alert alert-success" id="withdrawMsg" role="alert" style="display:none;">
                        <p>Status has been Updated Successfully</p>
                     </div>
				<div class="mt-20">
					<div class="table-responsive">
					
					 <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Request Amount</th>
                                                    <th>Approve Amount</th>
                                                    <th>Request Date</th>
                                                    <th>Approve Date</th>
                                                    <th>Go to Pay</th>
                                                    <th>Outstading Amount</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($users){ $i =1;
                                                    foreach($users as $user){ 
                                                    { ?>
                                                    <tr>
                                                     <td>{{ $i;}}</td>
                                                     <td>Test</td>
                                                     <td>500</td>
                                                     <td>300</td>
                                                     <td>2021-12-5</td>
                                                     <td>{{$user->approve_date}}</td>
                                                     <td>
                                                    <select class="change_status" data-id="<?php echo $user->id;?>" >
                                                        <option value="1"<?php if($user->status == 1) echo"selected"; ?> >APPROVED</option>     
                                                     <option value="2"<?php if($user->status=="2"){echo "selected";} ?>>CANCEL</option>     
                                                     <option value="3"<?php if($user->status=="3"){echo "selected";} ?>>DECLIND</option>     
                                                     <option value="4"<?php if($user->status=="4"){echo "selected";} ?>>ON HOLD</option>
                                                        
                                                    </select>            
                                                     </td>
                                                     <td>200</td>
                                                     <td>1200</td>
                                                     <td>
                                                         <?php if($user->status=="1"){echo '<span class="badge badge-success">Approve</span>';} ?>
                                                         <?php if($user->status=="2"){echo '<span class="badge badge-danger">CANCEL</span>';} ?>
                                                         <?php if($user->status=="3"){echo '<span class="badge badge-warning">DECLIND</span>';} ?>
                                                         <?php if($user->status=="4"){echo '<span class="badge badge-info">ON HOLD</span>';} ?>
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
		</section>
		<!-- /.content -->
	  </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).on('change', '.change_status', function() {
  
  var status= $(this).val();
  var data_id = $(this).attr("data-id") 

          $.ajax({
                url : '{{ route("changeWithdrawStatusData") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{status:status,data_id:data_id},
                dataType:"json",
                success:function(data){
                if(data.status=='true'){
                  $("#withdrawMsg").css("display", "block");
                  $("#withdrawMsg").fadeIn().delay(5000).fadeOut();
                   location.reload();
                 }   
                },

            });

});

</script>

@include('layouts.footer')
