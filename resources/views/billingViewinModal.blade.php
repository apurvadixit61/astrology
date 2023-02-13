<div class="table-responsive">
 <table class="table table-bordered"> 

    <div class='row col-md-12'>
    
           <tr>
             <td width="25%"><label>Order Id</label></td>  
             <td width="25%">{{$billing[0]->order_id;}}</td>
             <td width="25%"><label>User Name</label></td>  
             <td width="25%"><?php $userid = $billing[0]->user_id;
$users = DB::table('users')->where('id',$userid)->get();
            // dd($users);
           // echo  $users[0]->name;
             
             ?></td>
          </tr>
          <tr>
             <td width="25%"><label>Astro Name</label></td>  
             <td width="25%">{{$billing[0]->astro_name;}}</td> 
             <td width="25%"></td>  
             <td width="25%"></td>
          </tr>
          <tr>
              <td width="25%"><label>Email Id</label></td>  
             <td width="25%">{{$billing[0]->email;}}</td>
             <td width="25%"><label>Plan Amount</label></td>  
             <td width="25%">{{$billing[0]->plan_amount;}}</td> 
           
          </tr>
          <tr>
             <td width="25%"><label>Invoice No</label></td>  
             <td width="25%">{{$billing[0]->invoice_number;}}</td> 
            <td width="25%"><label>Approve Date</label></td>  
             <td width="25%">{{$billing[0]->approve_date;}}</td>
          </tr>
          
           <tr>
              
              <td width="25%"><label>Payment Date</label></td>  
             <td width="25%">{{$billing[0]->payment_date;}}</td>
             
             <td width="25%"><label>Payment Method</label></td>  
             <td width="25%">{{$billing[0]->payment_method;}}</td>
          </tr>
           <tr>
             <td width="25%"><label>Payment Type</label></td>  
             <td width="25%">{{$billing[0]->payment_type;}}</td> 
             <td width="25%"><label>Payment Status</label></td>  
             <td width="25%">{{$billing[0]->payment_status;}}</td>
        </tr>
          
          
          
    </div>

</table>
</div>  