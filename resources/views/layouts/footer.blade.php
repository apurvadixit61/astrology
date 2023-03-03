<style media="screen">
.imageThumb {
max-height: 75px;
border: 2px solid;
padding: 1px;
cursor: pointer;
}
.pip {
display: inline-block;
margin: 10px 10px 0 0;
}
.remove {
display: block;
background: #444;
border: 1px solid black;
color: white;
text-align: center;
cursor: pointer;
}
.remove:hover {
background: white;
color: black;
}
</style>
<!-- Vendor JS -->
	<script src="{{ URL::to('js/vendors.min.js')}}"></script>
	<script src="{{ URL::to('js/pages/chat-popup.js')}}"></script>
    <script src="{{ URL::to('assets/icons/feather-icons/feather.min.js')}}"></script>
     <script src="{{ URL::to('assets/vendor_components/raphael/raphael.min.js')}}"></script>
     <!--<script src="{{URL::to('assets/vendor_components/morris.js/morris.min.js')}}"></script>-->
	<script src="{{ URL::to('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{ URL::to('assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<!--<script src="{{ URL::to('js/pages/data-table.js')}}"></script>-->
	<!-- EduAdmin App -->
	<script src="{{ URL::to('js/template.js')}}"></script>
	<!--<script src="{{ URL::to('js/pages/dashboard2.js')}}"></script>-->
	<!--<script src="{{ URL::to('js/pages/widget-morris-charts.js')}}"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.js" integrity="sha512-eOUPKZXJTfgptSYQqVilRmxUNYm0XVHwcRHD4mdtCLWf/fC9XWe98IT8H1xzBkLL4Mo9GL0xWMSJtgS5te9rQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
	<script>
    $.noConflict();
   </script>
<div class="modal fade none-border" id="add-users">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Add Astrologer</strong></h4>
        </div>
<form method="post" action="{{url('add_user') }}" enctype="multipart/form-data" onsubmit="return validateFile()" autocomplete="on" name="formuser">
 {{ csrf_field() }}

 <div class="modal-body">
        <div class="row">

                  <div class="col-md-12">
                  <label class="control-label">Astrologer type</label>
                  <select class="form-control" id="user_type" name="user_type" required="">
                <!--  <option value="1">Become Customer</option>-->

                  <option value="2">Become Astrologer</option>
                  </select>
                  </div>
                  <br>
                  <div class="clearfix"></div><br><br><br>
                  <br>
                    <div class="col-md-12">
        <label class="control-label">Category</label>
            <select class="form-control form-white" name="category_name">
                <option>Select option</option>
                <?php
              $option = DB::table('category')->get();
              if($option){
                    foreach($option as $eow){


                ?>
               <option value='<?php echo $eow->id?>'><?php echo $eow->category_name?></option>


                <?php } } ?>
                <option value='ALL'>ALL</option>

           </select>
            </div>

        <div class="col-md-12">

            <label class="control-label">Name</label>
            <input class="form-control form-white" placeholder="Please Enter name" type="text" name="name" id=""value="{{ old('name') }}" required />
            
           <!--  <input class="form-control form-white" placeholder="Please Enter name" type="text" name="name" id="" onchange="validatename(document.formuser.name)" value="{{ old('name') }}" required />-->
             
            <!--<span  class="text-danger" id="names"></span>-->
        </div>
        
        

            <div class="col-md-6">
            <label class="control-label">Email</label>
            <input class="form-control form-white check_email" placeholder="Please Enter Email" type="email" name="email" id="check_email" required  onchange="ValidateEmail(document.formuser.email)" required/>
            <span  class="text-danger" id="emailmsg"></span>
            </div>
            
            
           
            
            

              <div class="col-md-6">
                 
            <label class="control-label">Phone No.</label>
            <input class="form-control form-white" placeholder="Please Enter Phone Number" type="number" name="phone_no" id="phone_no"  value="{{ old('phone_no') }}" onchange="phonenumber(document.formuser.phone_no)" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10" required/>
            <span class="text-danger" id="myform"></span>
          
            </div>
            <div class="col-md-6">
            <label class="control-label">Password</label>
            <input  type="password" class="form-control form-white" placeholder="Please Enter Password" type="text" name="password" id="password" 
        required>
        
            </div>

            <div class="col-md-6">
            <label class="control-label">Confirm-Password</label>
            <input  type="password" class="form-control form-white" placeholder="Please Enter Password" type="text" name="password" onchange="matchPassword()" id="cpassword" required />
              <span class="text-danger" id="passmatch"></span>
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
             <div class="col-md-6">
            <label class="control-label">Per Minute Charges</label>
            <input class="form-control form-white" placeholder="Please Enter amount" type="number" name="per_minute" value="" required="" />
            </div>


            <div class="col-md-6">
            <label class="control-label">Expertise</label>
            <input class="form-control form-white" placeholder="Please Enter Expertise" type="text" id="user_expertise" name="user_expertise" required="" onchange="validateexpertise(document.formuser.user_expertise)" />
             <span  class="text-danger" id="expertise"></span>
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
            <input class="form-control form-white" placeholder="Please Enter language" type="text" name="user_language" id="user_language" required="" onchange="validatelanguage(document.formuser.user_language)"/>
                <span  class="text-danger" id="lang"></span>
            </div>

            <div class="col-md-6">
            <label class="control-label">Availability</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" type="text" name="user_avability" id="user_avability" required="" onchange="validateavalability(document.formuser.user_avability)"/>
              <span  class="text-danger" id="avability"></span>
            </div>


             <div class="col-md-6">
            <label class="control-label">Education</label>
            <input class="form-control form-white" placeholder="Please Enter Education" type="text" name="user_education" id="user_education" onchange="validateeducation(document.formuser.user_education)" required=""  />
             <span  class="text-danger" id="education"></span>
            </div>

            <div class="col-md-6">
            <label class="control-label">Profile image</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" accept="image/jpeg,image/png,application/pdf,application/msword"  type="file" name="profile_image" id="profile_image"  />
            </div>

             <div class="col-md-12">
            <label class="control-label">About us</label>
            <textarea class="form-control" name="user_aboutus" placeholder="write something...."></textarea>
            </div>
</div>
</div>
        <div class="modal-footer">
             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
           
             <input type="submit" class="btn btn-danger waves-effect waves-light" value="Submit" id="submitAstroform"  title="All field required" data-placement="bottom" title="Info" data-toggle="tooltip">

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
         <p id="error_para" ></p>
    </div>
</div>



<div class="modal fade none-border" id="add-notification">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Add Notification</strong></h4>
        </div>

   <form method="post" action="{{url('add_notification') }}" enctype="multipart/form-data" >
 {{ csrf_field() }}
 <div class="modal-body">
        <div class="row">

            <div class="col-md-12">
$result =DB::table('category')->get();
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
				<div class="col-md-12">

					 <label class="control-label">Image</label>
					 <input class="form-control form-white" placeholder="Please Enter Image" type="file" name="image"  accept="image/*"  />


				</div>




        </div>




    </div>

        <div class="modal-footer">

             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
             <input type="submit" class="btn btn-danger waves-effect waves-light" name="submit_form" value="Submit">

        </div>

        </form>
        </div>
     </div>
</div>




</div>


<div class="modal fade none-border" id="add-event">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Add Live Event</strong></h4>
        </div>
<form method="post" action="{{url('add_event') }}" enctype="multipart/form-data" onsubmit="return validate11()" autocomplete="on">
 {{ csrf_field() }}

 <div class="modal-body">
        <div class="row">



        <div class="col-md-12">

            <label class="control-label">Event Name</label>

            <input class="form-control form-white" placeholder="Please Enter name" type="text" name="event_name" id="name" pattern="[a-zA-Z][a-zA-Z ]*" required />
        </div>

            <div class="col-md-6">
            <label class="control-label">Event</label>
            <input class="form-control form-white" placeholder="Please Enter Image" type="file" name="event_img" id="event_img" accept="video/mp4,video/x-m4v,video/*" required="" />
            </div>
						<div class="col-md-6">
						<label class="control-label">Video Url</label>
						<input class="form-control form-white" placeholder="Please Enter Url" type="text" name="video_url"  />
						</div>


            <div class="col-md-6">
            <label class="control-label">Date</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" type="date" name="event_date"  required="" />
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

<div class="modal fade none-border" id="add-testimonial">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Add Testimonial</strong></h4>
        </div>
<form method="post" action="{{url('add_testimonial') }}" enctype="multipart/form-data" autocomplete="on" name="formdata">
 {{ csrf_field() }}

 <div class="modal-body">
        <div class="row">

            <div class="col-md-6">
            <label class="control-label">User Name</label>
           
            
            <input class="form-control form-white" placeholder="Enter user name" type="text" name="user_name" id="user_name" value="" onchange="validateusername(document.formdata.user_name)" required/>
              <span  class="text-danger" id="usernames"></span>
            </div>
						<div class="col-md-6">
						<label class="control-label">Image</label>
						<input class="form-control form-white"  type="file" name="image" required/>
						</div>
						<div class="col-md-6">
						<label class="control-label">Location</label>
						<input class="form-control form-white"  type="text" name="location" id="location" onchange="validatelocation(document.formdata.location)" required/>
						 <span  class="text-danger" id="locations"></span>
						</div>
						<div class="col-md-6">
						<label class="control-label">Cover Image</label>
						<input class="form-control form-white"  type="file" name="coverimage" required/>
						</div>
						<!-- <div class="col-md-6">
						<label class="control-label">Video</label>
						<input class="form-control form-white" name="video_url" pattern=""  id="url" value=""/>
						</div> -->
            <div class="col-md-6">
            <label class="control-label">Date</label>
            <input class="form-control form-white" placeholder="Please Enter Date" type="date" name="created_date" accept="image/*" required="" />
            </div>


</div>

</div>

        <div class="modal-footer">

             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
             <input type="submit" id="submittestmonial"  title="All field required" class="btn btn-danger waves-effect waves-light" value="Submit">

        </div>

        </div>

         </form>

    </div>

</div>

</div>

<div class="modal fade none-border" id="add-news">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><strong>Add News</strong></h4>
        </div>
<form method="post" action="{{url('add_news') }}" enctype="multipart/form-data" autocomplete="on">
 {{ csrf_field() }}

 <div class="modal-body">
        <div class="row">
					<div class="col-md-6">
					<label class="control-label">Title</label>
					<input class="form-control form-white" placeholder="Please Enter Title" type="text" name="title"  required="" />
					</div>
            <div class="col-md-6">
            <label class="control-label">Image</label>
						<input class="form-control form-white"  type="file" name="image" accept="image/*" required/>

            </div>

            <div class="col-md-6">
            <label class="control-label">News Url</label>
            <input class="form-control form-white" placeholder="https://example.com" type="url" name="news_url" pattern="https://.*" size="30" id="url" required/>
            </div>

             <div class="col-md-6">
            <label class="control-label">News</label>
						<textarea class="form-control form-white" name="news" rows="8" cols="80" required placeholder="Eneter your news here..."></textarea>
            </div>

            <div class="col-md-6">
            <label class="control-label">Date</label>
            <input class="form-control form-white" placeholder="Please Enter Date" type="date" name="news_date"  required="" />
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
 $("#example1").DataTable();
$("#example").DataTable();
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
$("#check_email").on("keyup change", function(e) {
	var email = $(this).val();
	checkemail=isEmail(email)
	console.log(checkemail)
	if(checkemail == true) {
          $.ajax({
                url : '{{ route("checkEmailData") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{email:email},
                dataType:"json",
                success: function(data) {
									console.log(data)
                  if(data.status=='true'){
                    $('#emailmsg').html("<span style='color:red';>Email Already Exsists</span>");
                    }else{
                    $('#emailmsg').html("<span style='color:green';>Please Use this Email Id</span>");
                }
               },

            });

	}



})


// function phonenumber(inputtxt)
// {
//   //alert("fhbgjfg");
//   var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
//   if(inputtxt.value.match(phoneno))
//      {
//          document.getElementById('myform').innerHTML=" ";
//          isChecked();
// 	     return true;      
	     
// 	 }
//   else
//      {
// 	  document.getElementById('myform').innerHTML="invalide phone number";
// 	   document.formuser.phone_no.focus();
//      }
// }

// function matchPassword() {  
 
//   var pw1 = document.getElementById("password").value;  
//   var pw2 = document.getElementById("cpassword").value;  
//   if(pw1 != pw2)  
//   {   
//     document.getElementById('passmatch').innerHTML="invalide password"; 
//     document.formuser.password.focus();
   
//   } else {  
//      document.getElementById('passmatch').innerHTML=" ";
//       isChecked();
// 	   return true; 
//   }  
// }
// function ValidateEmail(inputText)
// {
// var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
// if(inputText.value.match(mailformat))
// {
//  document.getElementById('emailmsg').innerHTML=" "; 
// document.formuser.email.focus();
// isChecked();
// return true;

// }
// else
// {
// document.getElementById('emailmsg').innerHTML="Valid email address!"; 
// document.formuser.email.focus();
// return false;
// }
// }
// function isEmail(email) {
//   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//   return  regex.test(email);
// }

// function validatename(inputText){
//     var regName =  /^[a-zA-Z]+ [a-zA-Z]+$/;
  
//   if(inputText.value.match(regName))
//      {
//       /// alert('ewrwerewrwer');
//          document.getElementById('names').innerHTML=" ";
//          this.isChecked();
// 	     return true;  
	     
	    
// 	 }
//   else
//      {
         
// 	  document.getElementById('names').innerHTML="invalide name";
// 	  return false; 
	  
//      }
    
   
// }

// function validateexpertise(inputText){
//     var regName = /^[a-zA-Z]+$/;
  
//   if(inputText.value.match(regName))
//      {
       
//          document.getElementById('expertise').innerHTML=" ";
//     isChecked();
// 	   return true;      

// 	 }
//   else
//      {
        
// 	  document.getElementById('expertise').innerHTML="invalide expertise";
// 	   return false; 
//      }
    
   
// }

// function validatelanguage(inputText){
//     var regName = /^[a-zA-Z]+$/;
  
//   if(inputText.value.match(regName))
//      {
       
//          document.getElementById('lang').innerHTML=" ";
//          isChecked();
// 	   return true;      
	   
// 	 }
//   else
//      {
        
// 	  document.getElementById('lang').innerHTML="invalide Language";
// 	    return false; 
//      }
    
   
// }
// function validateavalability(inputText){
//     var regName = /^(?!-)(?!.*-$)[a-zA-Z-]+$/;
  
//   if(inputText.value.match(regName))
//      {
       
//          document.getElementById('avability').innerHTML=" ";
//           isChecked();
// 	   return true;    
	  
// 	 }
//   else
//      {
        
// 	  document.getElementById('avability').innerHTML="invalide avability";
// 	     return false; 
//      }
    
   
// }

// function validateeducation(inputText){
//     var regName = /^([a-zA-Z0-9_.+-])/;
  
//   if(inputText.value.match(regName))
//      {
       
//          document.getElementById('education').innerHTML=" ";
//           isChecked();
// 	   return true;      
	  
// 	 }
//   else
//      {
        
// 	  document.getElementById('education').innerHTML="invalide Education";
// 	     return false; 
//      }
    
   
// }
// function validateusername(inputText){
//     var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
  
//   if(inputText.value.match(regName))
//      {
//          document.getElementById('usernames').innerHTML=" ";
//          isTeatmonial();
// 	   return true;     
	   
// 	 }
//   else
//      {
// 	  document.getElementById('usernames').innerHTML="invalide name";
// 	  return false; 
//      }
// }

// function validatelocation(inputText){
//     var regName = /^[a-zA-Z]+$/;
  
//   if(inputText.value.match(regName))
//      {
//          document.getElementById('locations').innerHTML=" ";
// 	   return true;      
// 	 }
//   else
//      {
// 	  document.getElementById('locations').innerHTML="invalide Location";
// 	  return false; 
//      }
// }


$(document).ready(function(){
  // alert('jj');
   //  $("#submitAstroform").prop('disabled', false); 
  
});

function isTeatmonial(){
    //alert();
      var usernamess =  document.getElementById('user_name').value;
      
       if(usernamess!=""){
    // $("#submittestmonial").prop('disabled', false); 
    //submittestmonial
}

}
function isChecked(){
    // alert('funccall');
   var namess =  document.getElementById('name').value;
   var emails = document.getElementById('check_email').value;
   var phones = document.getElementById('phone_no').value;
   var cpassword =  document.getElementById('cpassword').value;
   var passwords =  document.getElementById('password').value;
   var education = document.getElementById('user_education').value;
   var avabilitys =document.getElementById('user_avability').value;
   var langs =document.getElementById('user_language').value;
   var expertises = document.getElementById('user_expertise').value;
  
   
   if(namess!="" && emails!="" && phones!="" && passwords!="" && education!="" && avabilitys!="" && langs!="" && expertises!="" && cpassword!=""){
    //   alert("everyonetrue");
   
   
   //    $("#submitAstroform").prop('disabled', true);

   }    
    
}






  $('#first_form').submit(function(e) {
    
 //  e.preventDefault();
    // var name = $('#name').val();
    // var email = $('#email').val();
    // var phone_no = $('#phone_no').val();
     //alert(phone_no);
   // var password = $('#password').val();


 //   $(".error").remove();

    // if (name=="") {
    //   $('#name').after('<span class="error"  style="color: red;" >This field is required</span>');

    //  }
    //  if (phone_no.length < 10) {
       
    //   $('#phone_no').after('<span class="error" style="color: red;">valid mobile number</span>');
    // }
//     if (password.length < 8) {
//       $('#password').after('<span class="error" style="color: red;">Password must be at least 6 characters long</span>');
//     }
    
//   });

	var list = $("#notification_content").append('<ul class="menu sm-scrol"></ul>').find('ul');
	$.ajax({
				url : '{{ url("checknotificationdata") }}',
				type: 'GET',
				dataType:"json",
				success: function(data) {
					console.log(data)
					if(data.status=='true'){
						console.log(data.result)
						for (var i = 0; i < 10; i++)
						    list.append('<li><a href="#"><i class="fa fa-users text-info"></i> '+data.result[i].message+'.</a></li>');

						}
			 },

		});


});
$('.search_field').on('keyup', function() {
  var value = $(this).val();
  var patt = new RegExp(value, "i");

  $('.fid_table').find('tr').each(function() {
    var $table = $(this);

    if (!($table.find('td').text().search(patt) >= 0)) {
      $table.not('.t_head').hide();
    }
    if (($table.find('td').text().search(patt) >= 0)) {
      $(this).show();
    }

  });

});

$('.search_fields').on('keyup', function() {
  var value = $(this).val();
  var patt = new RegExp(value, "i");

  $('.fid_table1').find('tr').each(function() {
    var $table = $(this);

    if (!($table.find('td').text().search(patt) >= 0)) {
      $table.not('.t_head').hide();
    }
    if (($table.find('td').text().search(patt) >= 0)) {
      $(this).show();
    }

  });

});
</script>
<script>
function checkFileType()
{
	this.src='Default.jpg';
}
// function validateFile()
//         {
//             var allowedExtension = ['jpeg', 'jpg', 'png'];
//             var fileExtension = document.getElementById('profile_image').value.split('.').pop().toLowerCase();
//             var isValidFile = false;
//
//                 for(var index in allowedExtension) {
//
//                     if(fileExtension === allowedExtension[index]) {
//                         isValidFile = true;
//                         break;
//                     }
//                 }
//
//                 if(!isValidFile) {
//                     alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
//                 }
//
//                 return isValidFile;
//         }
        </script>
        <script>
function validate11()
        {

            var allowedExtension = ['jpeg', 'jpg', 'png'];
            var fileExtension = document.getElementById('event_img').value.split('.').pop().toLowerCase();
            var isValidFile = false;

                for(var index in allowedExtension) {

                    if(fileExtension === allowedExtension[index]) {
                        isValidFile = true;
                        break;
                    }
                }

                if(!isValidFile) {
                    alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
                }

                return isValidFile;
        }

				$(document).ready(function() {
				  if (window.File && window.FileList && window.FileReader) {
				    $("#files").on("change", function(e) {
				      var files = e.target.files,
				        filesLength = files.length;
				      for (var i = 0; i < filesLength; i++) {
				        var f = files[i]
				        var fileReader = new FileReader();
				        fileReader.onload = (function(e) {
				          var file = e.target;
				          $("<span class=\"pip\">" +
				            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
				            "<br/><span class=\"remove\">Remove image</span>" +
				            "</span>").insertAfter("#files");
				          $(".remove").click(function(){
				            $(this).parent(".pip").remove();
				          });

				          // Old code here
				          /*$("<img></img>", {
				            class: "imageThumb",
				            src: e.target.result,
				            title: file.name + " | Click to remove"
				          }).insertAfter("#files").click(function(){$(this).remove();});*/

				        });
				        fileReader.readAsDataURL(f);
				      }
				      console.log(files);
				    });
				  } else {
				    alert("Your browser doesn't support to File API")
				  }
				});
        </script>
        <script>  
function validateFile(){  
  
 var regName = /^[a-zA-Z]+$/;
  
  if(inputText.value.match(regName))
     {
       
         document.getElementById('names').innerHTML=" ";
	   return true;      
	 }
  else
     {
         
	  document.getElementById('names').innerHTML="invalide name";
	  return false; 
     }
    
}  
</script>  
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        document.getElementById('navbar_top').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('navbar_top').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
}); 
</script>