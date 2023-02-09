@include('layouts.header')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Generated Kundli  List</h3>
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
                                                    <th>User Name</th>
                                                    <th>Kundli Image</th>
                                                    <th>Date</th>
                                                    
                                                </tr>
                                            </thead>
                                           <tbody>
                                            <?php
                                            if(!empty($kundli)){ $i =1;
                                                    foreach($kundli as $kund){ 
                                                    { ?>
                                                    <tr>
                                                     <td>{{ $i;}}</td>
                                                    
                                              
                                                    <td><?php $user_id = $kund->user_id;
                                                     $users = DB::table('users')->where('id',$user_id)->get();
                                                    if(!empty($users)){
                                                        foreach($users as $user){ 
                                                    echo $user->name;
                                                    }}
                                                    ?></td>
                                                    <td><img style="width:50px;height:50px" class="icon_image"src="{{ $kund->generate_kundli_image }}" /></td>
                                                    <td>{{$kund->generate_date}}</td>
                                                     
                                                   
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
