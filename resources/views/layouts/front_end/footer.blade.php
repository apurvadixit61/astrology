<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="#"><img src="{{ asset('public/astrology_assets/images/logo.png')}}"></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus
                        venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elem</p>
                </div>
                <div class="col-lg-2 ms-auto">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Horoscope</a></li>
                        <li><a href="#">Gemstones</a></li>
                        <li><a href="#">Numerology</a></li>
                        <li><a href="#">Tarot Cards</a></li>
                        <li><a href="#">Birth Journal</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact US</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Contact</h4>
                    <ul class="contactInfo">
                        <li><i class="fas fa-phone-alt"></i> <a href="#">(406) 555-0120</a></li>
                        <li><i class="fas fa-envelope"></i><a href="#">mangcoding123@gmail.com</a></li>
                        <li><i class="fas fa-map-marker-alt"></i> 2972 Westheimer Rd. Santa Ana, Illinois 85486 </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <style>
    .footer {
    position: fixed;
    right: 0;
    bottom: 0;
    left:0;
    padding: 1rem;   
    text-align: center;

}
  </style>

  <div id="inprogress"></div>
  
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('public/astrology_assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript"
    src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script>

        
var base_url = location.protocol+'//'+location.host

            <?php
   if(Auth::guard('users')->check() == true){
    $loginId = auth()->guard("users")->user()->id;
    ?>
var user_type={{auth()->guard("users")->user()->user_type}}

var intervalId = window.setInterval(function() {
    get_notification_count()
    in_progress()
}, 3000);

function in_progress()
{
    var url = base_url+'/user/in-progress/'+{{$loginId}}

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log(result)
            if(result.is_busy==1 )
            {
                if(result.type=='Chat'){
                    document.getElementById('inprogress').innerHTML =`<div class="footer">     
                            <div class="row mx-5" style="justify-content: center; background-color: #efefef;padding-top:2rem;padding-bottom:2rem;">
                                <div class="col-md-2">
                                <img src="{{url('/')}}/images/profile_image`+result.profile_image+`" width="50px">
                                </div>
                                <div class="col-md-2"> <h5>`+result.name+`</h5> <p>₹ 70/mins</p><p class="text-success">Chat is in progress </p> </div>
                                <div class="col-md-1"><a href="`+result.link+`"class="btn btn-primary">Chat</a></div>
                            </div>
                            </div>`; 
                }
                if(result.type=='Call'){
                    document.getElementById('inprogress').innerHTML =`<div class="footer">     
                            <div class="row mx-5" style="justify-content: center; background-color: #efefef;padding-top:2rem;padding-bottom:2rem;">
                                <div class="col-md-2">
                                <img src="{{url('/')}}/images/profile_image`+result.profile_image+`" width="50px">
                                </div>
                                <div class="col-md-2"> <h5>`+result.name+`</h5> <p>₹ 70/mins</p><p class="text-success">Call is in progress </p> <span id="call_status"></span> </div>
                                <div class="col-md-1"><a href="#"class="btn btn-primary">Call</a></div>
                            </div>
                            </div>`; 
                    get_call_details()        
                }

          


            }else{
            document.getElementById('inprogress').innerHTML =''; 

            }

        }
    });

}

function get_call_details()
{
    var url = base_url+'/user/call_status/'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
         console.log('call status',result) 
         document.getElementById('call_status').innerHTML =result; 

         if(result=='completed')
         {
            location.href = base_url+'/user/call-history';

         }    

        }
    });
}

function get_notification_count(){

    var url = base_url+'/user/get_notification_count/'+{{$loginId}}
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
         console.log(result)
         $('#count').append('')
         $('#count').append(result)         
         var count = document.querySelector("#count");
         count.innerHTML =result

        }
    });

}

<?php }?>

$( ".my_date_picker" ).datepicker({dateFormat: 'yy-mm-dd',maxDate: '0',showButtonPanel: true,
            changeMonth: true,
      changeYear: true});
      $( ".my_date_picker1" ).datepicker({dateFormat: 'yy-mm-dd',showButtonPanel: true,
            changeMonth: true,
      changeYear: true});
      $( ".my_date_picker2" ).datepicker({dateFormat: 'yy-mm-dd',showButtonPanel: true,
            changeMonth: true,
      changeYear: true});

           
$('.datetimepicker3').datetimepicker({
                    format: 'HH:mm',
                    collapse:false,
                    sideBySide: true,
    icons: {
        up: "fa fa-angle-up",
        down: "fa fa-angle-down",
        next: 'fa fa-angle-right',
        previous: 'fa fa-angle-left'
    }
                });
    </script>
      