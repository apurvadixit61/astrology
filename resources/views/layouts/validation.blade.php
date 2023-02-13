<form method="POST" action="{{url('edit_user') }}" enctype="multipart/form-data" id="commentForm" autocomplete="on">
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
        
            <input class="form-control form-white" placeholder="Please Enter name" type="text" name="name" value="" required />
        </div>
   
            <div class="col-md-6">
            <label class="control-label">Email</label>
            <input class="form-control form-white check_email" placeholder="Please Enter Email" type="text" name="email" value="" required  />
            <span id="mainmsg"></span>
            </div>
            
              <div class="col-md-6">
            <label class="control-label">Phone No.</label>
            <input class="form-control form-white" placeholder="Please Enter Phone Number" type="number" name="phone_no" value="" required />
            </div>
            
            
            <!--<div class="col-md-6">-->
            <!--<label class="control-label">Password</label>-->
            <!--<input  type="password" class="form-control form-white" placeholder="Please Enter Password" type="text" name="password" value="" required />-->
            <!--</div>-->
            
            <!--<div class="col-md-6">-->
            <!--<label class="control-label">Confirm-Password</label>-->
            <!--<input  type="password" class="form-control form-white" placeholder="Please Enter Password" type="text" name="password" value="" required />-->
            <!--</div>-->
            
            
            
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
            <input class="form-control form-white" type="amount" placeholder="Please Enter Amount" type="text" name="consultant_amt" value=""  />
            </div>
            
            
              
            <div class="col-md-6">
            <label class="control-label">Expertise</label>
            <input class="form-control form-white" placeholder="Please Enter Expertise" type="text" name="user_expertise" value="" required=""  />
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Experience</label>
<!--            <input class="form-control form-white" placeholder="Plese Enter Experience" type="text" name="user_experience"  />
-->            

<select class="form-control form-white" placeholder="Please Enter Experience" type="text" name="user_experience" value="" required="" >
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
            <input class="form-control form-white" placeholder="Please Enter language" type="text" name="user_language" value="" required="" />
            </div>
            
            <div class="col-md-6">
            <label class="control-label">Avability</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" type="text" name="user_avability" value="" required=""  />
            </div>
            
            
             <div class="col-md-6">
            <label class="control-label">Education</label>
            <input class="form-control form-white" placeholder="Please Enter Expertise" type="text" name="user_education" value="" required=""  />
            </div>
             
            <div class="col-md-6">
            <label class="control-label">Profile image</label>
            <input class="form-control form-white" placeholder="Please Enter Avability" type="file" name="profile_image" value="" />
         
            </div>
            
             <div class="col-md-12">
            <label class="control-label">About us</label>
            <textarea class="form-control" name="user_aboutus" value=""></textarea>
            </div>
            
</div>                     





</div>

        <div class="modal-footer">

             <input type="button" class="btn btn-default waves-effect" data-dismiss="modal" value="Close">
             <input type="submit" class="btn btn-danger" value="Update">

        </div>

        </div>

         </form>
         
         
         <script>
$("#commentForm").validate();
</script>

<script>$("#myform").validate({
  submitHandler: function(form) {
    form.submit();
  }
 });</script>
 
 <!--<script>$("#myform").validate({-->
 <!-- submitHandler: function(form) {-->
    <!--// some other code-->
    <!--// maybe disabling submit button-->
    <!--// then:-->
 <!--   $(form).submit();-->
 <!-- }-->
 <!--});</script>-->