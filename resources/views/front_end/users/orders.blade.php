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
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <!-- <th>Name</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th> -->

                                            <th>Name</th>
                                            <th>Duration[Min]</th>
                                            <th>Start time</th>
                                            <th>End Time</th>
                                            <th>Amount</th>


                                        </tr>

                                        <?php $id=Auth::guard('users')->user()->id;   $user_type=Auth::guard('users')->user()->user_type; ?>
                                        @foreach($messages as $msg)

                                       

                                         
                                        <tr>
                                        
                                            <td>@if($user_type==1)<a href="{{url('/user/chat-history/')}}/{{$msg->astro_id}}">{{$msg->name}}</a>@else <a href="{{url('/user/chat-history/')}}/{{$msg->user_id}}">{{$msg->name}}</a> @endif</td>
                                            <td>{{$msg->duration}}</td>
                                            <td>{{$msg->start_time}}</td>
                                            <td>{{$msg->end_time}} </td>
                                           <?php if($user_type==1) {?>
                                            <td><span class="text-danger"> - {{$msg->deduction_amount}}</span></td>
                                          <?php }  elseif($user_type==2){ ?>
                                            <td><span class="text-success"> + {{$msg->astro_earning_amount}}</span></td>
                                           <?php }?>
                                            
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
