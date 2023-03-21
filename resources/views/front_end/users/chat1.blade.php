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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" integrity="sha512-MpdEaY2YQ3EokN6lCD6bnWMl5Gwk7RjBbpKLovlrH6X+DRokrPRAF3zQJl1hZUiLXfo2e9MrOt+udOnHCAmi5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Template Main CSS File -->
      <link href="{{asset('public/astrology_assets/css/message.css')}}" rel="stylesheet" />
      <title>Welcome to Our Astrologer</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   </head>
      <body id="body-pd" class="" onbeforeunload="HandleBackFunctionality()" style="overflow-y: hidden;">
        
        
         <!--Container Main start-->
         <div class="dashboard_cont">
               <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app" style="margin-top:-74px;">
            
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img <?php  if( $to_user->profile_image != NULL){?> src="{{url('/')}}/images/profile_image{{$to_user->profile_image}}" <?php }else{?> src="{{ asset('public/astrology_assets/images/user.jpg')}}"<?php } ?> alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">{{$to_user->name}}</h6>
                                <p>Balance : (<label id="minutes">00</label>
                <label id="colon">:</label>
                <label id="seconds">00</label> mins) <br>
               
            </p>
                                <strong id="typing">Chat in progress</strong>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 hidden-sm text-end">
                            
                          <?php if($from_user->user_type ==1){ ?>  <a href="javascript:void(0);" onclick="end()" class="btn btn-outline-warning">End</a> <?php } ?>
                        </div>
                    </div>
                </div>
                
                <div class="chat-history" id="chat-history">
                    <ul class="m-b-0">
                        <div id="chat"></div>   
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

         <script type="text/javascript">
//     window.onbeforeunload = function(e) {
//         console.log("test");
//         e.preventdefault()
//       //  e.returnValue = ""
//        // return "";
//   }




 




    var base_url = location.protocol+'//'+location.host + '//' + 'astrology'

</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('public/astrology_assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js">
    </script>
    
     <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.6.0/socket.io.js" integrity="sha512-rwu37NnL8piEGiFhe2c5j4GahN+gFsIn9k/0hkRY44iz0pc81tBNaUN56qF8X4fy+5pgAAgYi2C9FXdetne5sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
 
         <script type="text/javascript">
            window.history.pushState(null, null, location.href);
            window.onpopstate = function () {
            history.go(1);
            };
            document.addEventListener("DOMContentLoaded", function(event) {
            
            const showNavbar = (toggleId, navId, bodyId, headerId) =>{
            const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)
            
            // Validate that all variables exist
            if(toggle && nav && bodypd && headerpd){
            toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
            })
            }
            }
            
            showNavbar('header-toggle','nav-bar','body-pd','header')
            
            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')
            
            function colorLink(){
            if(linkColor){
            linkColor.forEach(l=> l.classList.remove('active'))
            this.classList.add('active')
            }
            }
            linkColor.forEach(l=> l.addEventListener('click', colorLink))
            
            // Your code to run since DOM is loaded and ready
            });
               
         </script>
         <script type="text/javascript">
            // chart colors
var colors = ['#FE8302','#f7bb80','#984F01','#c3e6cb','#dc3545','#6c757d'];


            /* bar chart */
var chBar = document.getElementById("chBar");
if (chBar) {
  new Chart(chBar, {
  type: 'bar',
  data: {
    labels: ["S", "M", "T", "W", "T", "F", "S"],
    datasets: [{
      data: [589, 445, 483, 503, 689, 692, 634],
      backgroundColor: colors[0]
    },
    {
      data: [639, 465, 493, 478, 589, 632, 674],
      backgroundColor: colors[1]
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        barPercentage: 0.4,
        categoryPercentage: 0.5
      }]
    }
  }
  });
}

var donutOptions = {
  cutoutPercentage: 55, 
  legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
};

// donut 1
var chDonutData1 = {
    labels: ['Total Call Income', 'Total Chat Income', 'Total Income'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [74, 11, 40]
      }
    ]
};

var chDonut1 = document.getElementById("chDonut1");
if (chDonut1) {
  new Chart(chDonut1, {
      type: 'pie',
      data: chDonutData1,
      options: donutOptions
  });
}
ScrollToBottom()
function ScrollToBottom() {
        var d = document.getElementById("chat-history");
        d.scrollTop = d.scrollHeight;
    }


    

         </script>


<script>
	var date = new Date();
	var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
	var date_time = current_date+" "+current_time;	
   // localStorage.setItem("start_time",date_time);

    
</script>





       <script type="text/javascript">
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = localStorage.getItem("time_counts");
        console.log(localStorage.getItem("time_counts"))

 

        if(typeof(localStorage.getItem("time_counts")) == null)
        {
            var totalSeconds =localStorage.setItem("time_counts", parseInt(0));
        }


        setInterval(setTime, 1000);

        function setTime()
        {
            ++totalSeconds;
            if(totalSeconds>max_time-60)
            {
                        document.getElementById("minutes").style.color = "red";        
                        document.getElementById("seconds").style.color = "red";        
            }
            if(user_type==1){
            if(totalSeconds==max_time-2)
            {
                Swal.fire('You have insuffienct balance')

                var data ={end_id:to_user_id,from_user_id:from_user_id,user_type:user_type,time:totalSeconds}
                socket.emit('endchat',data);
                
                clearStorage()
                localStorage.clear();
                location.href = 'https://collabdoor.com/user/orders';                
            }
            }
            localStorage.setItem("time_counts", totalSeconds)
            secondsLabel.innerHTML = pad(totalSeconds%60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
        }

        function pad(val)
        {
            var valString = val + "";
            if(valString.length < 2)
            {
                return "0" + valString;
            }
            else
            {
                return valString;
            }
        }

     

      

                // a promise
        let promise = new Promise(function (resolve, reject) {
            setTimeout(function () {  
            window.clearInterval(setTime);
            localStorage.clear();
            localStorage.setItem("time_counts", parseInt(-2))

            resolve('Promise resolved')}, 4000); 
        });

        // async function
        async function clearStorage() {
            window.clearInterval(setTime);
            totalSeconds=-2
            localStorage.clear();
            localStorage.setItem("time_counts", parseInt(-2))
            window.clearInterval(setTime);

        // wait until the promise resolves 
        let result = await promise; 
        console.log(result);
        }

        async function wait_response() {
       
        // wait until the promise resolves 
        let result = await promise; 
        console.log(result);
        }

        var from_user_id = {{$from_user->id}};
        var to_user_id = {{$to_user->id}};
        var user_type = {{$from_user->user_type}};
        var astro_charge ={{$astro_charge}}
        var chat_id ={{$chat_id}}
        var wallet_amount ={{$wallet_amount->wallet_amount}}
        var charge=0;
        var max_time={{$max_time}};
        console.log("max_time",max_time) 
        var urlString='http://134.209.229.112:8090';   
        var socket = io(urlString, {secure: false});
        socket.on('connect', function() {
        console.log("Connected to WS server");
        var user_data = {from_user_id:from_user_id,to_user_id:to_user_id,socket_id:socket.id}
        console.log(user_data)

        // setInterval(function() {
            socket.emit("user_data",user_data) 
        // }, 10000);
        socket.emit("chat_history",user_data)
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



// function diff_minutes(dt2, dt1) 
//  {

//   var diff =(dt2.getTime() - dt1.getTime()) / 1000;
//   diff /= 60;
//   return Math.abs(Math.round(diff));
  
//  }







//       function wallet_amt_deduct(data_item){
//         console.log("base_url",data_item);
//         var url = 'http://134.209.229.112/astrology/wallet_deduct_amount'
//         $.ajax({
//        headers: {
//          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//          },
//       url: url,
//       type: 'GET',
//       data:data_item,
//       dataType: 'json',
//       success: function(result) {
//         console.log("result",result);
//     //   if(result.status==true){
//     //     let amounts=result.wallet_amount_dected;
//     //     alertify.success("Your amoubnt deducted for chat ");
//     //   }  
      
   
//  }
// });

// }


function duration_get(t0, t1){
    let d = (new Date(t1)) - (new Date(t0));
    let weekdays     = Math.floor(d/1000/60/60/24/7);
    let days         = Math.floor(d/1000/60/60/24 - weekdays*7);
    let hours        = Math.floor(d/1000/60/60    - weekdays*7*24            - days*24);
    let minutes      = Math.floor(d/1000/60       - weekdays*7*24*60         - days*24*60         - hours*60);
    let seconds      = Math.floor(d/1000          - weekdays*7*24*60*60      - days*24*60*60      - hours*60*60      - minutes*60);
    let milliseconds = Math.floor(d               - weekdays*7*24*60*60*1000 - days*24*60*60*1000 - hours*60*60*1000 - minutes*60*1000 - seconds*1000);
    let t = {};
    ['weekdays', 'days', 'hours', 'minutes', 'seconds', 'milliseconds'].forEach(q=>{ if (eval(q)>0) { t[q] = eval(q); } });
    return t;
}





      function end()
        {
            var date = new Date();
            let duration;
	        var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
            var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
	        var end_time = current_date+" "+current_time;	        
             

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

            
            var data ={end_id:to_user_id,from_user_id:from_user_id,user_type:user_type,time:totalSeconds}


            console.log('endchat',data)
            totalSeconds=-2
            localStorage.setItem("time_counts", parseInt(-2))

            clearStorage()
            clearStorage()
            socket.emit('endchat',data);
            wait_response()
            clearStorage()
            localStorage.clear();
          
            alertify.success("Your chated is be ended and deduction chat histroy showinh into your chat summary ");

            location.href = 'https://collabdoor.com/user/orders';
            }

          })
        }




        socket.on('end_chat_datas', function(data) {
            if(data.end_id==from_user_id)
            {
           
            var datas ={end_id:data.end_id,from_user_id:from_user_id,user_type:user_type,time:totalSeconds}
            console.log('end_chat_datas',datas)

            totalSeconds=-2
            localStorage.setItem("time_counts", parseInt(-2))

            window.clearInterval(setTime);

            clearStorage()
            clearStorage()
            console.log('end function run',datas)

            Swal.fire('Chat is ended by User')

            socket.emit('endchat',datas);   
            wait_response()
            localStorage.clear();
            clearStorage()


            location.href = 'https://collabdoor.com/user/orders';

            }
        })


        var send_button = document.getElementById("message_area");

        send_button.addEventListener("keydown", function (e) {
            if (e.code === "Enter") {  //checks whether the pressed key is "Enter"
                send_chat_message();
            }
        });

        function send_chat_message() {
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

        socket.on("disconnect", () => {       
          
        console.log(socket.id); // undefined
        });

    </script>
   </body>
</html>