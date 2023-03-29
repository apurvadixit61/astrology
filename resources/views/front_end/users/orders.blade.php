<?php   use App\Http\Controllers\Front_end\UserController; ?>
@include('layouts.dashboard.header')
<div class="dashboard_cont">
           
            <div class="row mt-4 ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Chat History<a href="#" class="pull-right"></a>
                            </h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table  class="table table-hover">
                                 
                                        <thead>                                         
                                            <th>S No.</th>

                                            <th>Name</th>
                                            <th>Duration[Min]</th>
                                            <th>Start time</th>
                                            <th>End Time</th>
                                            <th>Amount</th>


                                        </thead>
                                        <tbody>
                                        <?php $id=Auth::guard('users')->user()->id;   $user_type=Auth::guard('users')->user()->user_type; ?>
                                        @foreach($messages as $key=>$msg)

                                       

                                         
                                        <tr>
                                           <td>{{$key+1}}</td>
                                            <td>@if($user_type==1)<a href="{{url('/user/chat-history/')}}/{{$msg->astro_id}}">{{$msg->name}}</a>@else <a href="{{url('/user/chat-history/')}}/{{$msg->user_id}}">{{$msg->name}}</a> @endif</td>
                                            <td>{{$msg->duration}}</td>
                                            <td>{{$msg->start_time}}</td>
                                            <td>{{$msg->end_time}} </td>                                           
                                            <td><?php if($user_type==1) {?><span class="text-danger"> - {{$msg->deduction_amount}}</span><?php }  elseif($user_type==2){ ?><span class="text-success"> + {{$msg->astro_earning_amount}}</span><?php }?></td>
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
