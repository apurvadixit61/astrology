function validateEmail(email){
    var reg = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;		
	if (reg.test(email) == false) 
	{
		return false;
	}else{
	}
    return true;
}

$(document).on('submit','#adminlogin',function (e) {
	e.preventDefault();
    var allIsOk = true;
	var email = $("#email").val().trim();
	$('.invalidText').hide();

	if (email == '') {
		$("#email").focus();
		$("#email_err").show().html('Please Enter Your Email Address');
        allIsOk = false;
    }else if(validateEmail(email)==false){
		$("#email").focus();
		$("#email_err").show().html('Please Enter Valid Email Address');
        allIsOk = false;        
    }
    
    var pass = $("#pass").val();
	if (pass == '') {
		$("#pass").focus();
		$("#pass_err").show();
        allIsOk = false;
    }
    
    if(allIsOk){
    	ds = $(this);
		var url = $(this).attr('action');
		var formData = new FormData(ds[0]);
		$.ajax({
			//async: false,
			url: url,
			type: "POST",
			data:formData,
    		dataType: "json",
		    processData: false,
		    contentType: false,			
			beforeSend:function(){
				ajaxindicatorstart();
			},
			success: function(res) {
				//alert(res);
				ajaxindicatorstop();
				if(res.success) {
					window.location.href = res.redirect;
				}else{
					$("#validation_err").show().html(res.msg);
					allIsOk = false;
				}
			}
		});
    }
    return allIsOk    
});

$(document).on('submit','#vendorlogin',function (e) {
	e.preventDefault();
    var allIsOk = true;
	var email = $("#email").val().trim();
	$('.invalidText').hide();

	if (email == '') {
		$("#email").focus();
		$("#email_err").show().html('Please Enter Your Mobile No');
        allIsOk = false;
    }
    
    var pass = $("#pass").val();
	if (pass == '') {
		$("#pass").focus();
		$("#pass_err").show();
        allIsOk = false;
    }
    
    if(allIsOk){
    	ds = $(this);
		var url = $(this).attr('action');
		var formData = new FormData(ds[0]);
		$.ajax({
			//async: false,
			url: url,
			type: "POST",
			data:formData,
    		dataType: "json",
		    processData: false,
		    contentType: false,			
			beforeSend:function(){
				ajaxindicatorstart();
			},
			success: function(res) {
				//alert(res);
				ajaxindicatorstop();
				if(res.success) {
					window.location.href = res.redirect;
				}else{
					$("#validation_err").show().html(res.msg);
					allIsOk = false;
				}
			}
		});
    }
    return allIsOk    
});

//==========forgot password=================//

$('.forgotPassLink').on('click',function(){
	$('#firstStep').hide();
	$('#secondStep').hide();
	$('#forgotSection').show();
})

$(document).on('click','#backStepone',function(){
	$('#firstStep').show();
	$('#secondStep').hide();
	$('#forgotSection').hide();
});

$(document).on('submit','#forgotForm',function (e) {
	e.preventDefault();
    var allIsOk = true;
	var email = $("#femail").val().trim();
	$('.invalidText,#firstStep,#secondStep').hide();
	if (email == '' || validateEmail(email)==false) {
		$("#femail").focus();
		$("#email_err").show();
        allIsOk = false;
    }

    if(allIsOk){
		var url = $(this).attr('action');
		$.ajax({
			async: false,
			url: url,
			type: "POST",
			data:{
				'email':email,
			},
			dataType: "json",
			beforeSend:function(){
				ajaxindicatorstart();
			},
			success: function(res) {
				ajaxindicatorstop();
				if(res.success) {
					$('#fgpassLabel').html('Get a verification code');
					$('#forgotForm').hide();
					$('#msgDiv').html(res.msg).show();
				}else{
					allIsOk = false;
					$("#femail").focus();
					$("#femail_err").html(res.msg).show();					
				}
			}
		});
    }
    return allIsOk    
});