@extends('front_end.users.main')

@section('content')
<div class="row">

    <div class="col-sm-4 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6" id="chat_header"><b>Chat Area</b></div>
                    <div class="col col-md-6" id="close_chat_area"></div>
                </div>
            </div>
            <div class="card-body" id="chat_area">

            </div>
        </div>
    </div>

</div>

<style>
#chat_area {
    min-height: 500px;
    /*overflow-y: scroll*/
    ;
}

#chat_history {
    min-height: 500px;
    max-height: 500px;
    overflow-y: scroll;
    margin-bottom: 16px;
    background-color: #ece5dd;
    padding: 16px;
}

#user_list {
    min-height: 500px;
    max-height: 500px;
    overflow-y: scroll;
}
</style>

@endsection('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
var conn = new WebSocket('ws://134.209.229.112:8090/?token={{ auth()->guard("users")->user()->token }}');

var from_user_id = "{{ Auth::guard('users')->user()->id }}";

var to_user_id = {{$id}};

conn.onopen = function(e) {
    load_get_connection_id(from_user_id, to_user_id)
    make_chat_area()
    load_chat_data(from_user_id,to_user_id)

    console.log(from_user_id);
    console.log(to_user_id);

};

conn.onmessage = function(e) {
    var data = JSON.parse(e.data);
    if (data.load_get_connection_id) {
        console.log(data)
    }
    if (data.message) {
       var html = '';
       if(data.from_user_id == from_user_id)
       {
         html +=`<div class="row"> <div class="col col-3">&nbsp;</div>
         <div class="col col-9 alert alert-success text-dark shadow-sm">`+data.message+`</div>
         </div>`;
       }else{
        html +=`<div class="row"> <div class="col col-3">&nbsp;</div>
         <div class="col col-9 alert alert-light text-dark shadow-sm">`+data.message+`</div>
         </div>`;
       }
    console.log(html)
       if(html !='')
       {
        var previous_chat_element = $('#chat_history');
        var chat_history_element = $('#chat_history');

        chat_history_element = previous_chat_element.append(html)
       }
    }

    if(data.chat_history)
    {
        var html =''
        for(var count =0; count < data.chat_history.length;count++)
        {
        if(data.chat_history[count].from_user_id == from_user_id)
        {
            html +=`<div class="row"> <div class="col col-3">&nbsp;</div>
         <div class="col col-9 alert alert-success text-dark shadow-sm">`+data.chat_history[count].chat_message+`</div>
         </div>`;
        }else{
            html +=`<div class="row"> <div class="col col-3">&nbsp;</div>
         <div class="col col-9 alert alert-light text-dark shadow-sm">`+data.chat_history[count].chat_message+`</div>
         </div>`;
        }
            
        }

        $('#chat_history').append(html)
    }
};

function load_get_connection_id(from_user_id, to_user_id) {
    var data = {
        from_user_id: from_user_id,
        to_user_id: to_user_id,
        type: 'load_get_connection_id'
    };

    conn.send(JSON.stringify(data));
}


function make_chat_area() {
    var html ='<div id="chat_history"></div><div class="input-group mb-3"><textarea id="message_area" class="form-control" aria-describedby="send_button"></textarea><button type="button" class="btn btn-success" id="send_button" onclick="send_chat_message()" ><i class="fas fa-paper-plane"></i></button></div>';
        $('#chat_area').append(html)
        $('#close_chat_area').append('<button type="button" id="close_chat" class="btn btn-danger btn-sm float-end" onclick="close_chat()" ><i class="fas fa-times"></i> </button>')  
}

function close_chat()
{
    $('#chat_header').html('Chat Area');
    $('#close_chat_area').html('');
    $('#chat_area').html('');


}

function send_chat_message()
{
    document.querySelector('#send_button').disabled = true;

    var message = $('#message_area').val().trim();
    console.log(message)
    var data= {
        message : message,
        from_user_id: from_user_id,
        to_user_id:to_user_id,
        type: 'request_send_message'
    };
    conn.send(JSON.stringify(data))
    document.querySelector('#message_area').value = '';
    document.querySelector('#send_button').disabled = false;


}

function load_chat_data(from_user_id,to_user_id)
{

    var data={
        from_user_id:from_user_id,
        to_user_id:to_user_id,
        type : 'request_chat_history'
    };

    conn.send(JSON.stringify(data))

}
</script>