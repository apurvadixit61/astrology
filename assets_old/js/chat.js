//document.querySelector('.selectVendor').click();
$('.selectVendor').click(function(){
//	ChatSection(1);
//alert($(this).attr('title'));
      var receiver_id = $(this).attr('id');
       $('#ReciverId_txt').val(receiver_id);
	  $('#ReciverName_txt').html($(this).attr('title'));
	  /*var imgreal = $(this).attr('image');
	  star='<img class="direct-chat-img" src="<?php echo base_url(); ?>upload/profile_image/'+imgreal+'" alt="">';
       $('#ReciverImg_txt').html(star)*/
	  GetChatHistory(receiver_id);
 				
});



$( ".selectVendor" ).trigger( "click" );

$('.btnSend').click(function(){
   
       sendTxtMessage($('.message').val());

});

function sendTxtMessage(message){
	var messageTxt = message.trim();
	// alert(messageTxt);
	if(messageTxt!=''){
		console.log(message);
 		//DisplayMessage(messageTxt);
		var receiver_id = $('#ReciverId_txt').val();
		var url = $('#url').val();
		$.ajax({
				  dataType : "json",
				  type : 'post',
				  data : {messageTxt : messageTxt, receiver_id : receiver_id },
				  url: url+"vendor/sendMessage",
				  success:function(data)
				  {
				     GetChatHistory(receiver_id)		 
				  },
				  error: function (jqXHR, status, err) {
 					 // alert('Local error callback');
				  }
 			});
		        $(".contentchat").stop().animate({ scrollTop: $(".contentchat")[0].scrollHeight}, 1000);

		$('.message').val('');
		$('.message').focus();
	}else{
		$('.message').focus();
	}
}

function DisplayMessage(message){
	//alert('hgfhfg');
	var Sender_Name = $('#Sender_Name').val();
//	var Sender_ProfilePic = $('#Sender_ProfilePic').val();
	
		var str = '<div class="direct-chat-msg replies">';
				str+='<div class="direct-chat-info clearfix">';
				 str+='<span class="direct-chat-name pull-right">';
				 str+='</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
				//  str+='</div><img class="direct-chat-img" src="'+Sender_ProfilePic+'" alt="">';
                   str+='<div class="direct-chat-text">'+message;
				 str+='</div></div>';
	        	$('#dumppy').append(str);
}
function GetChatHistory(receiver_id){
    var url = $('#url').val();
    $.ajax({
			  //dataType : "json",
			  url: url+"vendor/get_chat_history_by_vendor?receiver_id="+receiver_id,
			  success:function(data)
			  {
			      console.log(data);
				$('#dumppy').html(data);
				        $(".contentchat").stop().animate({ scrollTop: $(".contentchat")[0].scrollHeight}, 1000);
 
			  },
			  error: function (jqXHR, status, err) {
				 // alert('Local error callback');
			  }
		});
}
setInterval(function(){ 
	var receiver_id = $('#ReciverId_txt').val();
	if(receiver_id!=''){
	    GetChatHistory(receiver_id);
	    
	}
}, 3000);