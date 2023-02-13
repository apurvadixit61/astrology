@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Notifications List</h3>
  <a href="#" data-toggle="modal" data-target="#add-notification" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Notification</a>
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
                                                    <th>Message</th>
                                                     <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($users){ $i =1;
                                                    foreach($users as $user){ 
                                                    { ?>
                                                    <tr>
                                                     <td>{{ $i;}}</td>
                                                    
                                                     <td>{{$user->message}}</td>
                                                     <td>{{$user->currents_date}}</td>
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
