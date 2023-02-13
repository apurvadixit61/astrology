<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Messenger</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
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
                                                    <p class="fw-400 mb-0 text-light-75"></p>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.6.0/socket.io.js" integrity="sha512-rwu37NnL8piEGiFhe2c5j4GahN+gFsIn9k/0hkRY44iz0pc81tBNaUN56qF8X4fy+5pgAAgYi2C9FXdetne5sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<script>
var urlString='http://134.209.229.112:8090';   

var socket = io(urlString, {secure: false});


$('#chat').append('test')
socket.on('connection', function() {
  console.log("Connected to WS server");

  console.log(socket)
socket.emit("message",'test')

 

});

socket.on('message_data', function(data) {
  $('#chat').append(data)
 });


// socket.on('connection', function() {
//   console.log("Connected to WS server");
//   console.log(socket)
// });

</script>

</body>

</html>