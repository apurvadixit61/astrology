<div class="table-responsive">
 <table class="table table-bordered"> 

    <div class='row col-md-12'>
    
           <tr>
             <td width="25%"><label>Name</label></td>  
             <td width="25%">{{$users[0]->name;}}</td> 
             <td width="25%"><label>Mobile No</label></td>  
             <td width="25%">{{$users[0]->phone_no;}}</td>
          </tr>
           <tr>
             <td width="25%"><label>Email Id</label></td>  
             <td width="25%">{{$users[0]->email;}}</td>
             <td width="25%"><label>Address</label></td>  
             <td width="25%">{{$users[0]->address;}}</td> 
          </tr>
           <tr>
             <td width="25%"><label>Date of Birth</label></td>  
             <td width="25%">{{$users[0]->dob;}}</td> 
             <td width="25%"><label>Birth Time</label></td>  
             <td width="25%">{{$users[0]->birth_time;}}</td>
          </tr>
           <tr>
             <td width="25%"><label>Birth Place</label></td>  
             <td width="25%">{{$users[0]->birth_place;}}</td> 
          </tr>
    </div>

</table>
</div>  