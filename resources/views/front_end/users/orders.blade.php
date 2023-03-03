<?php   use App\Http\Controllers\Front_end\UserController; ?>
@include('layouts.dashboard.header')
<div class="dashboard_cont">
           
            <div class="row mt-4 ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Chat History<a href="#" class="pull-right">See All</a>
                            </h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>


                                        </tr>

                                        <?php $id=Auth::guard('users')->user()->id; ?>
                                        @foreach($messages as $msg)

                                         @if($msg->from_user_id ==$id || $msg->to_user_id ==$id)

                                         
                                        <tr>
                                        
                                            <td><a href="{{url('/user/chat-history/')}}/{{$msg->to}}">{{$msg->name}}</a></td>
                                            <td>{!!$msg->chat_message!!}</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$msg->message_date}}</span> </td>
                                            <td>{{$msg->message_time}}</td>
                                            <td>{{$msg->message_status}}</td>                                           
                                            

                                        </tr>
                                        @endif
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
