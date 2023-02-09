@include('layouts.header')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

<div class="content-wrapper">
      <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                     <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Billings List</h3>

                </div>
                <!-- /.box-header -->

                 @if (Session::has('message'))

                       <div class="alert alert-success">{{ Session::get('message') }}</div>

                    @endif
                <div class="mt-20">
                    <div class="table-responsive">
                     <table id="example3" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>

                                                    <th>Id</th>

                                                    <!--<th>Image</th>-->
                                                    <th>Name</th>
                                                    <th>Order number</th>
                                                    <th>Astrologer</th>
                                                    <th>Amount</th>
                                                    <th>Payment Status</th>
                                                    <th>Date</th>

<th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($users){ 
                                                    foreach($users as $key => $user){
                                                    { ?>
                                                    <tr>
                                                     <td>{{  $key+1}}</td>



                                                     <td>{{$user->username}}</td>
                                                    <td>{{$user->order_id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->plan_amount}}</td>
                                                    <td>{{$user->payment_status}}</td>
                                                    <td>{{$user->payment_date}}</td>
                                                   <td class="action_btn">



                                                    <a class="ac_btn"  data-toggle="modal" data-target="#myModalBilling" onclick="showUserDetailsBilling({{$user->id}})" type="button"><span class="badge badge-primary mr-5"><i class="fa fa-eye"></i></span></a>
                                                    <a class="ac_btn" href="{{url('delete_user/'.$user->id)}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>

                                                    </td>
                                                    </tr>
                                                    <?php  }}} ?>
                                                    </tbody>
                                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
                </div>

            </div>


   <div id="myModalBilling" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-left">Show Billing Full Detail</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
         </div>
         <div class="modal-body">
         
         </div>
      </div>
   </div>
</div>
<script>
    function showUserDetailsBilling(postid){
  $.ajax({
                url : '{{ route("getbillingdata") }}',
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

        </section>
        <!-- /.content -->
      </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>

    <script type="text/javascript">
    $("#example3").DataTable();



</script>
@include('layouts.footer')
