 $(document).on('submit','#add_category',function(e){
	
        e.preventDefault();
         $('.error').hide();
        if($('#cat').val().trim()==''){
            $('#cat').focus();
            $('#cat_err').show();
            return false;
        }
       
        ds = $(this);
		var url = $(this).attr('action');
		// alert(url);
		var formData = new FormData(ds[0]);
		$.ajax({
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
			//	alert(res);
				ajaxindicatorstop();
				if(res.success==true){
    				$('#add_cat').modal('hide');
                    swal('', "Added Successfully", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
				}else{
			        $('#cat_err').html(res.msg).show();	    
				}
			}
		});
    });
	
	$('.edit_category_modal').on('click',function(e){
		
        e.preventDefault();
        var id = $(this).data('id');
         var cat_id = $(this).data('type');
		  var name = $(this).parents('tr').find('.name').html();
       
        
        $('#edit_category_modal').find('#id').val(id);
        $('#edit_category_modal').find('#cat_id').val(cat_id);
		 $('#edit_category_modal').find('#edit_cate').val(name);
        
        $('#edit_category_modal').modal('show');
    });
    
    
    
$(document).on('submit','#edit_category',function(e){
	
        e.preventDefault();
         $('.error').hide();
        if($('#edit_cate').val().trim()==''){
            $('#edit_cate').focus();
            $('#edit_cate_err').show();
            return false;
        }
       
        ds = $(this);
		var url = $(this).attr('action');
		// alert(url);
		var formData = new FormData(ds[0]);
		$.ajax({
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
			//	alert(res);
				ajaxindicatorstop();
				if(res.success==true){
    				$('#edit_category_modal').modal('hide');
                    swal('', "Updated Successfully", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
				}else{
			        $('#edit_cate_err').html(res.msg).show();	    
				}
			}
		});
    });
	
 function deletedata(id)
  {
	  //alert(id);
   document.getElementById('idrem').value=id;
  }
 
  $(document).on('submit','#delete_category',function(e){
	
        e.preventDefault();
        
       
        ds = $(this);
		var url = $(this).attr('action');
		// alert(url);
		var formData = new FormData(ds[0]);
		$.ajax({
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
			//	alert(res);
				ajaxindicatorstop();
				if(res.success==true){
    				$('#myModal').modal('hide');
                    swal('', "Deleted Successfully", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
				}else{
			        swal('', "Failed", "fail");	    
				}
			}
		});
    });
    
    $(document).on('submit','#add_shop',function(e){
    e.preventDefault();
    $('.error').hide();

    if($('#name').val().trim()==''){
        $('#name').focus();
        $('#name_err').show();
        return false;
    }
    if($('#email').val().trim()==''){
        $('#email').focus();
        $('#email_err').show();
        return false;
    }
    if($('#pass').val().trim()==''){
        $('#pass').focus();
        $('#pass_err').show();
        return false;
    }
    if($('#contact').val().trim()==''){
        $('#contact').focus();
        $('#contact_err').show();
        return false;
    }
    
    if($('#sname').val().trim()==''){
        $('#sname').focus();
        $('#sname_err').show();
        return false;
    }
    
    if($('#saddress').val().trim()==''){
        $('#saddress').focus();
        $('#address_err').show();
        return false;
    }
     if($('#saddress_lat').val().trim()==''){
        $('#saddress_lat').focus();
        $('#address_errg').show();
        return false;
    }
    if($('#saddress_lng').val().trim()==''){
        $('#saddress_lng').focus();
        $('#address_errg').show();
        return false;
    }
    
    if($('#scontact').val().trim()==''){
        $('#scontact').focus();
        $('#scontact_err').show();
        return false;
    }
    
   if($('#no_worker').val().trim()==''){
        $('#no_worker').focus();
        $('#no_worker_err').show();
        return false;
    }
    
    /*if(validatemobile(mobile)==false){
        $('#branch_contact').focus();
        $('#branch_contact_err').html('Please Enter Valid Contact Number').show();
        return false;        
    }*/

    
    //if($('#start_time').val()=='00:00:00' || $('#start_time').val()==''){
    if($('#start_time').val()==''){
        $('#start_time').focus();
        $('#start_time_err').show();
        return false;        
    }else{
        $('#start_time_err').hide();
    }


    //if($('#end_time').val()=='00:00:00' || $('#end_time').val()==''){
    if($('#end_time').val()==''){
        $('#end_time').focus();
        $('#end_time_err').show();
        return false;        
    }else{
        $('#end_time_err').hide();
    }    

var branches = $('#multiselect_branch').val().length;

    if(branches<=0){
        $('#multiselect_branch').focus();
        $('#branch_err').show();
        return false;        
    }
    
   /* var service = false;
    $(".services" ).each(function(i,v) {
      if($(this).is(':selected')){
        service = true;
      }
    });

    if(service) {
        $('#service_err').hide();
    }else{
        $('#service_err').show();
        return false;
    }*/

    ds = $(this);
    var url = $(this).attr('action');
    var formData = new FormData(ds[0]);
    $.ajax({
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
            ajaxindicatorstop();
           // console.log(res);
            if(res.success==true){
              
                
                 swal('', "Added Successfully", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                    
                /*setTimeout(function() {
                    window.location.href = site_url+'vendor/branches';
                }, 2000);*/

            }else{
                $('#php_error').html(res.msg).show();       
            }
        }
    });
});
$('.vendor_status').on('click',function(){
   var vid = $(this).parents('tr').attr('vid');
  var status = $(this).attr('st');
  $('#shop_status_form').find('#vendor_id').val(vid);
  $('#shop_status_form').find('#status').val(status);

  $('#v_status_modal').modal('show');
});

$(document).on('submit','#shop_status_form',function(e){
	
        e.preventDefault();
        
       
        ds = $(this);
		var url = $(this).attr('action');
		// alert(url);
		var formData = new FormData(ds[0]);
		$.ajax({
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
			//	alert(res);
				ajaxindicatorstop();
				if(res.success==true){
    				$('#v_status_modal').modal('hide');
                    swal('', "Updated Successfully", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
				}else{
			        $('#name_err').html(res.msg).show();	    
				}
			}
		});
    });
    
     $('.status_change').on('click',function(e){
//alert('dd');
        event.preventDefault();

        var ac = $(this).attr('action');

        $('#status_change_modal').find('#status_change_delete').attr('link',ac);

        $('#status_change_modal').modal('show');

    });
    
           $(document).on('click','#status_change_delete',function(){

        var url  = $(this).attr('link');
//alert(url);
        $.ajax({

      url: url,
      dataType:'json',
      beforeSend:function(){

        ajaxindicatorstart();

      },

      success: function(res) {
//alert(res);
        ajaxindicatorstop();
        if(res.success){

          $('#status_change_modal').modal('hide');

                    swal('', "Done", "success");

                                    setTimeout(function() {

                    location.reload();

                }, 2000);
        }

                    

               

      }

    });

    });
   
  $(document).on('submit','#update_subs_amount_form',function(e){
    e.preventDefault();
    
   
        if($('#planaa').val().trim()==''){
            $('#planaa').focus();
            $('#planaa_err').show();
            return false;
        }
         if($('#charges').val().trim()==''){
            $('#charges').focus();
            $('#charges_err').show();
            return false;
        }
    ds = $(this);
    var url = $(this).attr('action');
    var formData = new FormData(ds[0]);
    $.ajax({
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
            ajaxindicatorstop();
            if(res.success==true){
              $('#edit_subs_modal').modal('hide');
                
                 swal('', "Updated Successfully", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                    
                /*setTimeout(function() {
                    window.location.href = site_url+'vendor/branches';
                }, 2000);*/

            }else{
                $('#common_err').html(res.msg).show();       
            }
        }
    });
});
 