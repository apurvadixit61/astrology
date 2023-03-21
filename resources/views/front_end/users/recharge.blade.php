@include('layouts.front_end.header')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container mt-5 mb-5">
      <div class="text-center">
        <h2>Add Money to Wallet</h2>
        <h5>Available balance</h5>
        <h3 id="payment_bal">₹ {{$amount}}</h3>
      </div>
      <div class="mt-5">
        <h4 class="mb-4">Popular Recharge</h4>
        <div class="row row-gap-4 ">
          <div class="col-md-2 text-center buy_now" data-amount="50">
            <div class="card mb-2" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 50</h5>
              </div>
			  
			 
			  
			  
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 50 Extra</h6>
              </div>
            </div>
          </div>
		  
          <div class="col-md-2 text-center buy_now" data-amount="100">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 100</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 100 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now"  data-amount="200">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 200</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 100 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now" data-amount="500">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 500</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now" data-amount="1000">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 1000</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now" data-amount="2000">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 2000</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now" data-amount="3000">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 3000</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now" data-amount="4000">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 4000</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now" data-amount="500">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 5000</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now" data-amount="6000">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 6000</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now" data-amount="7000">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 7000</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-center buy_now"data-amount="8000">
            <div class="card" style="width: 11rem">
              <div class="card-body" >
                <h5 class="card-title">₹ 8000</h5>
              </div>
              <div class="card-footer" style="background-color: #FFF0E0; border: none;">
                <h6 class="card-subtitle mb-2" style="color: #FE870A;">₹ 250 Extra</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@include('layouts.front_end.footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var SITEURL = '{{URL::to('')}}';

console.log(SITEURL)

$('body').on('click', '.buy_now', function(e){
var totalAmount = $(this).attr("data-amount");
var product_id =  $(this).attr("data-id");
var options = {
"key": "rzp_test_DpwiKIPJ835zH3",
"amount": (totalAmount*100), // 2000 paise = INR 20
"name": "ConnectAstro",
"description": "Payment",
"image": "",
"dataType": "json",
"handler": function (response){
	
    
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: SITEURL+'/paysuccess',
        data: {'payment_id':response.razorpay_payment_id,'product_id':1,'amount':totalAmount}, // serializes the form's elements.
        success: function(data)
        {
			console.log("data.amount",data);
            Swal.fire('Your Payment sucessfully completed')
           // $("#payment_bal").text(data.amount); 
           document.getElementById('payment_bal').innerHTML ='₹ '+data.wallet_amount;

          //alert(data); // show response from the php script.
        }
    });

	
//window.location.href = SITEURL +'/'+ 'paysuccess?payment_id='+response.razorpay_payment_id+'&product_id='+product_id+'&amount='+totalAmount;
},
"prefill": {
"contact": '9988665544',
"email":   'tutsmake@gmail.com',
},
"theme": {
"color": "#528FF0"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
});
/*document.getElementsClass('buy_plan1').onclick = function(e){
rzp1.open();
e.preventDefault();
}*/
</script>