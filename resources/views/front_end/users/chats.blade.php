<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link href="{{asset('public/astrology_assets/images/favicon.png')}}" rel="icon">
      <!--  CSS Files -->
      <link href="{{asset('public/astrology_assets/css/bootstrap.min.css')}}" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
      <!-- Template Main CSS File -->
      <link href="{{asset('public/astrology_assets/css/message.css')}}" rel="stylesheet" />
      <title>Welcome to Our Astrologer</title>
   </head>
      <body id="body-pd" class="" style="overflow-y: hidden;">
        
        
         <!--Container Main start-->
         <div class="dashboard_cont">
               <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <?php $id=Auth::guard('users')->user()->id; ?>
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img <?php  if( $to_user->profile_image != NULL){?> src="{{url('/')}}/images/profile_image{{$to_user->profile_image}}" <?php }else{?> src="{{ asset('public/astrology_assets/images/user.jpg')}}"<?php } ?> alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">{{$to_user->name}}</h6>
                                
                                <strong id="typing">Chat Ended</strong>
                            </div>
                        </div>
                        <div class="col-lg-6 hidden-sm text-end">
                            
                        </div>
                    </div>
                </div>
                <div class="chat-history" id="chat-history">
                    <ul class="m-b-0">
                        @foreach($chats as $chat)

                        @if($chat->from_user_id == $id)


                        <li class="clearfix">
                           
                           <div class="message other-message pull-right"> {!! $chat->chat_message!!}<span class="message-data-time">{{$chat->message_time}}<span class="check"><i class="fas fa-check-double" style="color:#09c9de;" aria-hidden="true"></i></span></span> </div>
                        </li>
                        @else 

                        <li class="clearfix">
                           
                           <div class="message my-message">{!! $chat->chat_message!!}<span class="message-data-time">{{$chat->message_time}}</span></div>                                    
                       </li>
                        @endif                      
                   
                    
                        @endforeach
                        <li style="margin-left:50%;color:#fe870a;font-weight:800;">Chat Ended</li>

                    </ul>

                </div>
                <div class="chat-message clearfix">
                   <div class="chatInput"> <input type="text" id="message_area" class="form-control" placeholder="Write Message Here...">
                         <span class="attachment">
                              <input type="file"><i class="fas fa-link"></i></span></div>
                          <span class="micke"><i class="fas fa-microphone"></i></span> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
           <!-- /.box -->
         </div>
            </div>
         </div>
         <!--Container Main end-->
         <!--  JS Files -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <script src="{{asset('public/astrology_assets/js/bootstrap.bundle.min.js')}}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js">
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.6.0/socket.io.js" integrity="sha512-rwu37NnL8piEGiFhe2c5j4GahN+gFsIn9k/0hkRY44iz0pc81tBNaUN56qF8X4fy+5pgAAgYi2C9FXdetne5sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
     <script>
        ScrollToBottom()
function ScrollToBottom() {
        var d = document.getElementById("chat-history");
        d.scrollTop = d.scrollHeight;
    }
     </script>
       

     
   </body>
</html>