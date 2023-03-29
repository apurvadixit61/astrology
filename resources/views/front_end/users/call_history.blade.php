<?php   use App\Http\Controllers\Front_end\UserController; ?>
@include('layouts.dashboard.header')
<div class="dashboard_cont">
           
            <div class="row mt-4 ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Call History<a href="#" class="pull-right"></a>
                            </h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table   class="table table-hover">
                                    <thead>
                                        <tr>
                                            <!-- <th>Name</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th> -->

                                            <th>S No.</th>
                                            <th>Name</th>
                                            <th>Duration[Min]</th>
                                            <th>Start time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Amount</th>


                                        </thead>
                                        <tbody>

                                        <?php $id=Auth::guard('users')->user()->id;   $user_type=Auth::guard('users')->user()->user_type; ?>
                                        @foreach($details as $key=>$msg)                                     

                                        <tr>
                                        @if($msg->duration != 0)
                                            <td>{{$key+1}}</td>

                                            <td> <a  href="#">{{$msg->name}}</a></td>
                                            <td>{{$msg->duration}}</td>
                                            <td>{{$msg->start_time}}</td>
                                            <td>{{$msg->end_time}} </td>
                                            <td class="text-success">Completed</td>

                                           <?php if($user_type==1) {?>
                                            <td><span class="text-danger"> -  {{$msg->deduction_amount}}</span></td>
                                          <?php }  elseif($user_type==2){ ?>
                                            <td><span class="text-success"> + {{$msg->astro_earning_amount}}</span></td>
                                           <?php }?>
                                           <td></td>

                                           @else 
                                           <td>{{$key+1}}</td>

                                            <td> <a  href="#">{{$msg->name}}</a></td>
                                            <td class="text-danger"  style="text-align: center;" colspan="6">{{$msg->call_data}}</td>                                           

                                           @endif
                                            
                                        </tr>
                                       
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
@include('layouts.dashboard.footer')
