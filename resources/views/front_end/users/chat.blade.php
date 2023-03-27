<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link href="images/favicon.png" rel="icon">
      <!--  CSS Files -->
      <link href="{{asset('public/astrology_assets/css/bootstrap.min.css')}}" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
      <!-- Template Main CSS File -->
      <title>Welcome to Our Astrologer</title>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

:root {
    --header-height: 3rem;
    --nav-width: 68px;
    --first-color: #FE8302;
    --first-color-light: #AFA5D9;
    --white-color: #F7F6FB;
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100
}

*,
::before,
::after {
    box-sizing: border-box
}


a,a:focus,a:hover {
    text-decoration: none; color: #FE8302;
}
img{ max-width:100% }

.header {
    width: 100%;
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    padding: 0 1rem;
    background-color: #fff;
    z-index: var(--z-fixed);
    transition: .5s
}
.dashboard_cont .card {
    background: #FFFFFF;
    border: 1px solid #EFEFEF;
    box-shadow: 0px 13px 48px rgb(0 0 0 / 5%);
    border-radius: 12px;
}
.dashboard_cont{ padding:10px 0 50px}
.searchPanel input {
    background: rgba(239, 240, 242, 0.5);
    border: 1px solid #CCCCCC;
    border-radius: 30px;
    font-size: 14px;
    padding: 7px;
    height: 35px;
    width: 260px; background: url(../images/search.png) no-repeat 12px 9px;
    padding-left: 35px;

    background-size: 15px;
}
.searchPanel input:focus{border: none;}
.header_toggle {
    color: var(--first-color);
    font-size: 1.5rem;
    cursor: pointer; display: none;
}

.header_img {
  
    display: flex;
    justify-content: center; align-items: center;
    
}

.header_img img {
    width: 40px ; border-radius: 50%; margin-right: 15px;
}

.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background-color: var(--first-color);
    padding: .5rem 1rem 0 0;
    transition: .5s;
    z-index: var(--z-fixed)
}

.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden
}

.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: .5rem 0 .5rem 1.5rem
}
.nav_list{ width: 92%}
.nav_logo {
    margin-bottom: 2rem
}

.nav_logo-icon {
    font-size: 1.25rem;
    color: var(--white-color)
}

.nav_logo-name {
    color: var(--white-color);
    font-weight: 700
}

.nav_link {
       position: relative;
    color: #fff;
    margin-bottom: 1.5rem;
    transition: .3s;
    border: 2px solid #fff;
    border-radius: 10px;
    padding: 15px;font-size: 18px;
    font-weight: 600;
}
#logoutBtn{ width:100% }



.nav_icon {
    font-size: 1.25rem
}

.show {
    left: 0
}

.nav_link:hover ,.nav_link.active {
    color: #FE8302;
    background: #fff;
}
.header button {
    border: none; width: 200px;
    white-space: nowrap;
    background: no-repeat;
    padding: 10px;
}
.header button img {
    width: 40px;
    border-radius: 50%;
}
.header ul.dropdown-menu.show {
    width: 200px;
}


.height-100 {
    height: 100vh
}
.dicon {
    background: linear-gradient(135.78deg, #FE8302 0%, #FDB76E 84.38%);
    border-radius: 15px;
    padding: 10px;
    width: 70px;
    height: 70px;
}
@media screen and (min-width: 768px) {
 

    

    .header_img img {
        width: 45px
    }

    .l-navbar {
        left: 0;
        padding: 15px
    }

    .show {
        width: calc(var(--nav-width) + 200px)
    }

    
}

.card-header .card-title {
   font-weight: 600;
    font-size: 24px; margin: 0;
}
.card-header{ background:#fff; padding:15px  }
 .badge-danger {
    background-color: #ff562f;
    color: #ffffff;
} .badge-warning {
    background-color: #ff9920;
    color: #ffffff;
}
.badge-success {
    background-color: #04a08b;
    color: #ffffff;
}.pull-right {
    float: right;
}
.card-title a,.card-title span{font-size: 16px; color: #FE8302 !important}
.card-title span i{font-size: 10px}
.dropdown-item:focus, .dropdown-item:hover {
    color: #1e2125;
    background-color: #fff1e1;
}
.card-title span.user-color{color: #FE830280 !important}


.chat-app .input-group-text {
    height: 100%;
    background: #FE8302;
    border-color: #FE8302;
    color: #fff;
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-about p, .chat-about h6 {
    margin: 0;
}
.chat-about h6 {
    font-size: 14px;
    font-weight: 800;margin-bottom: 5px;
}
.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}
.chat-message span{display: block;}
.chat-message input.form-control {
    border-radius: 50px !important;
}
.chatInput{width: 90%; position: relative;}
span.attachment input {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    left: 0;
    top: 0;
}
.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}
.chat-message span.micke {
    position: absolute;
    right: 20px;
    top: 29px;
    opacity: .5;
}
.chat-message span.attachment {
    right: 20px;
    position: absolute;
    top: 5px;
    opacity: .5;
}
.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}
.chat-about p {
    color: #000;
    font-size: 13px;
    font-weight: 600;
    line-height: 15px;
}.chat-about strong {
    font-size: 13px;
    line-height: 15px;
}
.chat-header a.btn.btn-outline-warning {
    background: #fff;
}
.people-list .status {
    color: #999;
    font-size: 13px;
}

.chat .chat-header {
    padding: 10px 10px 5px;
    border-bottom: 2px solid #f4f7f6;background: #FE8302;
    border-radius: 10px 10px 0 0; color: #fff;
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 55px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff; background: url({{asset('public/astrology_assets/images/chatBg.png')}});height: 450px;background-size: 160px;
    overflow: auto;
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}
.message .check {
    font-size: 9px;
  
}
.message .check.read{    color: #09c9de;}
.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
   color: #8e8d8d;
    padding-left: 6px;
    font-size: 12px;
    position: absolute;
    width: 100%;
    left: 11px;
    bottom: 0;
    text-align: left;
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;max-width: 60%;
    display: inline-block;
    position: relative; border-radius: 15px;box-shadow: 0 2px 7px -0.125em rgb(10 10 10 / 10%);
}


.chat .chat-history .my-message {
    background: #fff
}



.chat .chat-history .other-message {
    background: #fff5eb;
    text-align: right;
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px; position: relative;
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}


.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
      </style>
   </head>
   <body>
         
    
         <!--Container Main start-->
         <div class="dashboard_cont">
               <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img @if($user_type==1) src="{{url('/')}}/images/profile_image/{{$astro->profile_image}}"  @endif @if($user_type==2) src="{{url('/')}}/images/profile_image/{{$user->profile_image}}" @endif alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">@if($user_type==1){{$astro->name}}@else {{$user->name}} @endif</h6>
                                <p>Balance : (<span id="timer"></span> mins)</p>
                                <strong id="typing">Chat in progress</strong>
                            </div>
                        </div>
                        @if($user_type==1)
                        <div class="col-lg-6 hidden-sm text-end">                            
                            <a href="javascript:void(0);" onclick="end()" class="btn btn-outline-warning">End</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="chat-history" id="chat-history">
                    <ul class="m-b-0">
                       <div  id="chat" > </div>
                    </ul>
                </div>
                <div class="chat-message clearfix">
                   <div class="chatInput"> <input type="text" id="message_area" class="form-control" placeholder="Enter text here...">
                         </div>                                                   
                          <span class="micke" onclick="send_chat_message()"><i class="fas fa-paper-plane fa-2x"></i></span> 
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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


            var send_button = document.getElementById("message_area");

            send_button.addEventListener("keydown", function (e) {
                if (e.code === "Enter") {  //checks whether the pressed key is "Enter"
                    send_chat_message();
                }
            });

           
     </script>
     <script>
        var from_user_id={{$from_user->id}}
        var to_user_id={{$to_user->id}}
        var userid={{$user->id}}
        var user_amount={{$user_amount}}
        var astroid={{$astro->id}}
        var astro_charge={{$astro_charge}}

        var urlString='http://134.209.229.112:8090';   
        var socket = io(urlString, {secure: false});
        socket.on('connect', function() {
        console.log("Connected to WS server");
        var user_data={from_user_id:from_user_id,to_user_id:to_user_id,socket_id:socket.id,userid:userid,astroid:astroid,astro_charge:astro_charge,user_amount:user_amount}   
        socket.emit("user_data",user_data) 
        socket.emit("chat_history",user_data)

        setInterval(timer, 1300);

        })

        socket.on('user_status', function(data) {
        console.log('my user data status',data)
        })

        socket.on('chat_data', function(datas) {
       if(datas.from_user_id ==from_user_id && datas.to_user_id==to_user_id)
       {
        var data =datas.data
        var html=''
        var icon=''
        console.log('Chat History',data)
        for (var count = 0; count < data.length; count++) {
            if (data[count].message_status == 'Not Send') {
                icon=`<i class="fa fa-check" aria-hidden="true"></i>`
            }
            if (data[count].message_status == 'Send') {
                icon=`<i class="fas fa-check-double" aria-hidden="true"></i>`
            }
            if (data[count].message_status == 'Read') {
                icon=`<i class="fas fa-check-double" style="color:#09c9de;" aria-hidden="true"></i>`
            }
            if (data[count].from_user_id == from_user_id) {
                html +=`<li class="clearfix">
                           
                           <div class="message other-message pull-right"> ` + data[count].chat_message + ` <span id="`+data[count].id+`" class="message-data-time">`+data[count].message_time+`<span class="check">`+icon+`</span></span> </div>
                       </li>`
            }
            else{

                var status={id:data[count].id,action:'Read'}  
    
                 socket.emit('update_message_status',status)

                html +=`<li class="clearfix">
                           
                           <div class="message my-message">` + data[count].chat_message + `   <span id="`+data[count].id+`" class="message-data-time">`+data[count].message_time+`</span></div>                                    
                       </li>`

            }
        }

      
        $('#chat').append(html)
                ScrollToBottom()

       } 

      })
        
        function timer()
        {
            socket.emit("timer",{id:from_user_id,userid:userid,astroid:astroid})  
        }

        socket.on('timer_value', function(data) {

            if(data.id==from_user_id)
            {
                if(data.time.split(':')[0] >=(Math.floor(user_amount/astro_charge)-1) )
                {
                    document.getElementById("timer").style.color = 'red';

                }
                document.getElementById("timer").innerHTML = data.time;

            }
        console.log('timer_value',data)
        })
        socket.on('disconnect', function(data) {
        console.log('my user data status',data)
        })

        socket.on('end_chat', function(data) {
            console.log('chat end',data)
            if(data.to_user==from_user_id && data.from_user==to_user_id)
            {
                Swal.fire('Chat is ended by User')
                clearInterval(timer)
                location.href = 'https://collabdoor.com/user/orders';                

            }
        })

        function end()
        {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, End it!'
            }).then((result) => {
             if (result.isConfirmed) {
            clearInterval(timer)
            var data={from_user:from_user_id,to_user:to_user_id}


            socket.emit("forceDisconnects",data)  

            location.href = 'https://collabdoor.com/user/orders';                

            console.log(data)
             }
            })
        }

        
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };

    function send_chat_message()
            {
                var message = $('#message_area').val().trim();
                if(message !=''){
                    var messages={from_user_id:from_user_id,to_user_id:to_user_id,message:message};
                    socket.emit("message",messages)
                    document.querySelector('#message_area').value = '';

                }

            }

            socket.on('message_data', function(data) {
            console.log("message_data",data)
            var html=''

            if(data.from_user_id ==from_user_id && data.to_user_id==to_user_id)
            {
                var status={id:data.id,action:'Send'}  
                socket.emit('update_message_status',status)

                html =`<li class="clearfix">
                           
                           <div class="message other-message pull-right"> ` + data.message + ` <span id="`+data.id+`" class="message-data-time">`+data.message_time+`<span id="`+data.id+`" class="check read"><img src="{{asset('public/astrology_assets/images/checks.png')}}" width="13px"></span></span> </div>
                       </li>`
            }

            if(data.from_user_id ==to_user_id && data.to_user_id==from_user_id)
            {
                var status={id:data.id,action:'Read'}  
    
                socket.emit('update_message_status',status)
                html =`<li class="clearfix">
                           
                           <div class="message my-message">` + data.message + `   <span class="message-data-time">`+data.message_time+`</span></div>                                    
                       </li>`
            }

            if (html != '') {
                var previous_chat_element = document.querySelector("#chat");
                var chat_history_element = document.querySelector("#chat");

                chat_history_element.innerHTML = previous_chat_element.innerHTML + html

                var user_data={from_user_id:from_user_id,to_user_id:to_user_id,socket_id:socket.id,userid:userid,astroid:astroid,astro_charge:astro_charge,user_amount:user_amount}   
                socket.emit("user_data",user_data) 
                setInterval(timer, 1300);
                ScrollToBottom()
            }
        })

        $( "#message_area" ).focus(function() {
            var data={from_user_id:from_user_id,to_user_id:to_user_id,is_type:1}
            console.log(data)
            socket.emit('typing',data)

        // alert( "Handler for .focus() called." );
        });

        $( "#message_area" ).blur(function() {
            var data={from_user_id:from_user_id,to_user_id:to_user_id,is_type:0}
            console.log(data)
            socket.emit('typing',data)

        // alert( "Handler for .focus() called." );
        });
        socket.on('time_up', function(data) {
           console.log('time_up',data)

           if(data.userid==from_user_id || data.astroid==from_user_id)
           {
            Swal.fire('Chat is ended due to insufficient balance')

            clearInterval(timer)
            var data={from_user:from_user_id,to_user:to_user_id}
            socket.emit("forceDisconnects",data)  
            location.href = 'https://collabdoor.com/user/orders';  


           }
        }) 

        socket.on('typingResponse', function(data) {
            console.log(data)
            if(data.from_user_id ==to_user_id && data.to_user_id==from_user_id && data.is_type==1)
            {
               document.getElementById('typing').innerHTML ='typing....'; 
            }else{
               document.getElementById('typing').innerHTML ='Chat in Progress'; 
            }
        })

        socket.on('update_message_data', function(data) {
            console.log('update_message_data',data)
        })

     </script>
         
   </body>
</html>