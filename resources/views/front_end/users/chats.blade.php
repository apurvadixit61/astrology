<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Messenger</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('public/front_end/css/messages_style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" />
</head>

<body style="overflow:hidden !important;">
    <div class="main-wrapper">
        <div class="container">
            <div class="page-content">
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-12 card-stacked">
                            <div class="card shadow-line mb-3 chat chat-panel">
                                <div class="p-3 chat-header">
                                    <div class="d-flex">
                                        <div class="w-100 d-flex pl-0">
                                            <img class="rounded-circle shadow avatar-sm mr-3 chat-profile-picture"
                                                src="https://user-images.githubusercontent.com/35243461/168796877-f6c8819a-5d6e-4b2a-bd56-04963639239b.jpg">
                                            <div class="mr-3">
                                                <a href="!#">
                                                    <p class="fw-400 mb-0 text-light-75">{{ ucfirst($other->name) }}</p>
                                                </a>
                                                <p class="sub-caption text-muted text-small mb-0"><i
                                                        class="la  mr-1"></i>Time left: <span id="timer"></span> </p>
                                                <p class="sub-caption text-muted text-small mb-0"><i
                                                        class="la  mr-1"></i>Chat in progress</p>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 margin-auto">
                                    
                                            <a href="#" class="btn btn-icon btn-light text-dark-75 active text-dark ml-2 p-3">
                                                End
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div id="chat_area"
                                    class="d-flex flex-row mb-3 navigation-mobile scrollable-chat-panel"
                                    style="height:75vh;max-height:75vh;">
                                    <div class="w-100 p-3">
                                        

                                        <div id="chat"></div>

                                    </div>
                                </div>

                                <div class="chat-search pl-3 pr-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Write a message"
                                            id="message_area" value="">
                                        <div class="input-group-append prepend-white">
                                            <span class="input-group-text pl-2 pr-2">
                                                <i
                                                    class="chat-upload-trigger fs-19 bi bi-file-earmark-plus ml-2 mr-2"></i>
                                                <i class="fs-19 bi bi-emoji-smile ml-2 mr-2"></i>
                                                <i class="fs-19 bi bi-camera ml-2 mr-2"></i>
                                                <i onlick="" id="send_button" onclick="send_chat_message()"
                                                    class="fs-19 bi bi-cursor ml-2 mr-2"></i>
                                                <div class="chat-upload">
                                                    <div class="d-flex flex-column">
                                                        <div class="p-2">
                                                            <button type="button"
                                                                class="btn btn-secondary btn-md btn-icon btn-circle btn-blushing">
                                                                <i class="fs-15 bi bi-camera"></i>
                                                            </button>
                                                        </div>
                                                        <div class="p-2">
                                                            <button type="button"
                                                                class="btn btn-success btn-md btn-icon btn-circle btn-blushing">
                                                                <i class="fs-15 bi bi-file-earmark-plus"></i>
                                                            </button>
                                                        </div>
                                                        <div class="p-2">
                                                            <button type="button"
                                                                class="btn btn-warning btn-md btn-icon btn-circle btn-blushing">
                                                                <i class="fs-15 bi bi-person"></i>
                                                            </button>
                                                        </div>
                                                        <div class="p-2">
                                                            <button type="button"
                                                                class="btn btn-danger btn-md btn-icon btn-circle btn-blushing">
                                                                <i class="fs-15 bi bi-card-image"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js">
    </script>
    
    <script>
window.stop()
document.getElementById('timer').innerHTML =
  04 + ":" + 59;
  startTimer();


function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){
    alert('time up')
    location.href = 'http://134.209.229.112/astrology';

    return
  }
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  console.log(m)
  setTimeout(startTimer, 1000);
  
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}


var send_button = document.getElementById("message_area");
send_button.addEventListener("keydown", function (e) {
    if (e.code === "Enter") {  //checks whether the pressed key is "Enter"
        send_chat_message();
    }
});

    (function($) {
        "use strict";
        $('.scrollable-chat-panel').perfectScrollbar();
        var position = $(".chat-search").last().position().top;
        $('.scrollable-chat-panel').scrollTop(position);
        $('.scrollable-chat-panel').perfectScrollbar('update');
        $('.pagination-scrool').perfectScrollbar();

        $('.chat-upload-trigger').on('click', function(e) {
            $(this).parent().find('.chat-upload').toggleClass("active");
        });
        $('.user-detail-trigger').on('click', function(e) {
            $(this).closest('.chat').find('.chat-user-detail').toggleClass("active");
        });
        $('.user-undetail-trigger').on('click', function(e) {
            $(this).closest('.chat').find('.chat-user-detail').toggleClass("active");
        });
    })(jQuery);

    function ScrollToBottom() {
        var d = document.getElementById("chat_area");
        d.scrollTop = d.scrollHeight;
    }



    var url ='ws://134.209.229.112:8443?token={{ auth()->guard("users")->user()->token }}'
    var conn = new WebSocket(url);

    var from_user_id = "{{ Auth::guard('users')->user()->id }}";

    var to_user_id = {{ $id }};

    conn.onopen = function(e) {
        load_get_connection_id(from_user_id, to_user_id)
        // make_chat_area()
        load_chat_data(from_user_id, to_user_id)
        console.log('connection Establish'); 
        

    };

    conn.onmessage = function(e) {
        var data = JSON.parse(e.data);
        if (data.load_get_connection_id) {
        }
        if (data.message) {

            var icon_style = '';
            if (data.message_status == 'Not Send') {
                icon_style = `<div id="chat_status_`+data.chat_message_id+`" ><div class="svg15 double-check"></div></div>`
			}
			
            if (data.message_status == 'Send') {
                icon_style = `<div id="chat_status_`+data.chat_message_id+`" ><div  class="svg15 double-check"></div></div>`
            }

            if (data.message_status == 'Read') {
                icon_style = `<div id="chat_status_`+data.chat_message_id+`"><div class="svg15 double-check-blue"></div></div>`
            }
            var html = '';
            if (data.from_user_id == from_user_id) {
                html += `<div class="d-flex flex-row-reverse mb-2">
                                            <div class="right-chat-message fs-13 mb-2">
                                                <div class="mb-0 mr-3 pr-4">
                                                    <div class="d-flex flex-row">
                                                        <div class="pr-2">` + data.message + `</div>
                                                        <div class="pr-4"> </div>
                                                    </div>
                                                </div>
                                                <div class="message-options dark">
                                                    <div class="message-time">
                                                        <div class="d-flex flex-row">
                                                            <div class="mr-2">06:49</div>
                                                            ` + icon_style + `
                                                        </div>
                                                    </div>
                                                    <div class="message-arrow"><i
                                                            class="text-muted la la-angle-down fs-17"></i></div>
                                                </div>
                                            </div>
                                        </div>`;
            } else {
                if (to_user_id != '') {
                    html += `<div class="left-chat-message fs-13 mb-2">
                                            <p class="mb-0 mr-3 pr-4">` + data.message + `</p>
                                            <div class="message-options">
                                                <div class="message-time">06:52</div>
                                                <div class="message-arrow"><i
                                                        class="text-muted la la-angle-down fs-17"></i></div>
                                            </div>
                                        </div>`;
                    console.log('to_messGE',data.chat_message_id)
                    update_message_status(data.chat_message_id, from_user_id, to_user_id, 'Read')

                }

            }
            if (html != '') {
                var previous_chat_element = document.querySelector("#chat");
                var chat_history_element = document.querySelector("#chat");

                chat_history_element.innerHTML = previous_chat_element.innerHTML + html
                ScrollToBottom()

            } 
        }
        if (data.chat_history) {
            var html = ''

            if (data.chat_history.length > 0) {
                var icon_style = ''
                for (var count = 0; count < data.chat_history.length; count++) {
                    if (data.chat_history[count].from_user_id == from_user_id) {

                        if (data.chat_history[count].message_status == 'Not Send') {
                            icon_style = `<div  id="chat_status_`+data.chat_history[count].id+`" ><div class="svg15 single-check"></div></div>`
                        }
                        if (data.chat_history[count].message_status == 'Send') {
                            icon_style = `<div  id="chat_status_`+data.chat_history[count].id+`" ><div class="svg15 double-check"></div></div>`
                        }

                        if (data.chat_history[count].message_status == 'Read') {
                            icon_style = `<div  id="chat_status_`+data.chat_history[count].id+`" ><div class="svg15 double-check-blue"></div></div>`
                        }

                        html += `<div class="d-flex flex-row-reverse mb-2">
                                            <div class="right-chat-message fs-13 mb-2">
                                                <div class="mb-0 mr-3 pr-4">
                                                    <div class="d-flex flex-row">
                                                        <div class="pr-2">` + data.chat_history[count].chat_message + `</div>
                                                        <div class="pr-4"></div>
                                                    </div>
                                                </div>
                                                <div class="message-options dark">
                                                    <div class="message-time">
                                                        <div class="d-flex flex-row">
                                                            <div class="mr-2">06:49</div>
                                                            ` + icon_style + `
                                                        </div>
                                                    </div>
                                                    <div class="message-arrow"><i
                                                            class="text-muted la la-angle-down fs-17"></i></div>
                                                </div>
                                            </div>
                                        </div>`;
                    } else {
                        if(data.chat_history[count].message_status != 'Read' )
                        {
                            update_message_status(data.chat_history[count].id,data.chat_history[count].from_user_id,data.chat_history[count].to_user_id,'Read')
                        }
                        html += `<div class="left-chat-message fs-13 mb-2">
                                            <p class="mb-0 mr-3 pr-4">` + data.chat_history[count].chat_message + `</p>
                                            <div class="message-options">
                                                <div class="message-time">06:52</div>
                                                <div class="message-arrow"><i
                                                        class="text-muted la la-angle-down fs-17"></i></div>
                                            </div>
                                        </div>`;
                    }

                }

                $('#chat').append(html)
                ScrollToBottom()
            } else {


                <?php if($details->user_type==1) {?>
                var message =
                    `<div>Name: {{$details->name}}<br/>Date: {{$details->dob}}<br/>
                                            Time: {{$details->birth_time}}<br/>Place: {{$details->birth_place}}<br/></div>`;

                message += `<div><a href="viewKundli">View Kundli</a></div>`;

                var data = {
                    message: message,
                    from_user_id: from_user_id,
                    to_user_id: to_user_id,
                    type: 'request_send_message'
                };
                conn.send(JSON.stringify(data))
                <?php } ?>

                ScrollToBottom()

            }


        }

        if (data.update_message_status) {

            var chat_status_element = $('#chat_status_'+data.chat_message_id+'');
         
            console.log(chat_status_element)
      
            if (chat_status_element) {
                if(data.update_message_status == 'Read')
			{
                $(chat_status_element).removeClass().addClass('test')
			}
			if(data.update_message_status == 'Send')
			{
                $(chat_status_element).removeClass().addClass('test')



			}
            }
        }

    }

    function send_chat_message() {
        $('#send_button').disabled = true;

        var message = $('#message_area').val().trim();
        var data = {
            message: message,
            from_user_id: from_user_id,
            to_user_id: to_user_id,
            type: 'request_send_message'
        };
        conn.send(JSON.stringify(data))
        document.querySelector('#message_area').value = '';
        document.querySelector('#send_button').disabled = false;


    }



    function load_get_connection_id(from_user_id, to_user_id) {
        var data = {
            from_user_id: from_user_id,
            to_user_id: to_user_id,
            type: 'load_get_connection_id'
        };

        conn.send(JSON.stringify(data));
    }


    function load_chat_data(from_user_id, to_user_id) {

        var data = {
            from_user_id: from_user_id,
            to_user_id: to_user_id,
            type: 'request_chat_history'
        };

        conn.send(JSON.stringify(data))

    }


    function update_message_status(chat_message_id, from_user_id, to_user_id, chat_message_status) {
        var data = {
            chat_message_id: chat_message_id,
            from_user_id: from_user_id,
            to_user_id: to_user_id,
            chat_message_status: chat_message_status,
            type: 'update_chat_status'
        }
        conn.send(JSON.stringify(data))

    }
    </script>

</body>

</html>