  <!--Container Main end-->
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

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to Logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{url('user/logout')}}" class="btn btn-primary">Logout</a>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
     <!--  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      
     
    </div>
  </div>
</div>

<div id="inprogress"></div>
      <!--  JS Files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('public/astrology_assets/dashboard/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
        <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript">

var url1 = "{{ route('changeLang') }}";
  
  $(".changeLang").change(function(){
      window.location.href = url1 + "?lang="+ $(this).val();
  });
  
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('show')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
        </script>
        <script type="text/javascript">
        // chart colors
       


        var base_url = location.protocol+'//'+location.host

            <?php
   if(Auth::guard('users')->check() == true){
    $loginId = auth()->guard("users")->user()->id;
    ?>
var user_type={{auth()->guard("users")->user()->user_type}}

var intervalId = window.setInterval(function() {
    get_notification_count()
    in_progress()
    incoming_Request()

}, 3000);

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


function incoming_Request()
{
    var url = base_url+'/user/incoming_Request/'+{{$loginId}}
    var html=''
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {                
         console.log('incoming request',result)
         if(result.status==1)
         {
            $('#request').modal('show'); 
            html=`<div class="modal-body text-center">
        <h5 class="modal-title">Incoming `+result.type+` request form  Astrology</h5>
           <div class="request_user mt-5">
                <img src="{{url('/')}}/images/profile_image/`+result.data.profile_image+`" class="chatuserImg">
                <h5>`+result.data.name+`</h5>
                <a href="{{url('user/notification')}}" class="btn btn-primary chatBtn mt-5">`+result.type+` Start</a>
                <p class="text-danger mt-2">Incoming `+result.type+` request</p>
           </div>
      </div>`

           $('#request').find('.modal-content').html(html);
         }
        }
    });
}

<?php }?>

$('.datetimepicker3').datetimepicker({
                    format: 'HH:mm A',
                    collapse:false,
                    sideBySide: true,
    icons: {
        up: "fa fa-angle-up",
        down: "fa fa-angle-down",
        next: 'fa fa-angle-right',
        previous: 'fa fa-angle-left'
    }
                });

                $('.datetimepicker').datetimepicker({
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

  $( ".my_date_picker" ).datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date(),changeMonth: true,
      changeYear: true});
      $(document).on('keyup', '#front-search-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field"));
});   


$('#example').DataTable();

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
            
         console.log('call status',result.Call) 
         if(result.Call.Status=='in-progress')
         {
         document.getElementById('call_status').innerHTML ='<span>'+diff(result.Call.StartTime.split(' ')[1])+'</span>'; 
         }
         if(result.Call.Status=='completed')
         {
            Swal.fire('Call is ended')
            location.href = base_url+'/user/call-history';
         }    

        }
    });
}


function diff(startTime)
                {
        var endTime=getCurrent_time()
        var t1 = hmsToSeconds(startTime);
        var t2 = hmsToSeconds(endTime);

        var diff;
        // if (t2 > t1) {
            diff = secondsToHMS(t2 - t1);

            return diff
                }

                function hmsToSeconds(s) {
    var b = s.split(':');
    return b[0]*3600 + b[1]*60 + (+b[2] || 0);
  }
  
  // Convert seconds to hh:mm:ss
  function secondsToHMS(secs) {
    function z(n){
        var n=(n<10?'0':'') + n
        return n;
    }
    var sign = secs < 0? '-':'';

    secs = Math.abs(secs);

    return  z((secs%3600) / 60 |0) + ':' + z(secs%60);
    // return sign + z(secs/3600 |0) + ':' + z((secs%3600) / 60 |0) + ':' + z(secs%60);
  }

  function getCurrent_time() {

//let parsedDate =  new Date()
//const formattedDate = `${parsedDate.getHours()}:${parsedDate.getMinutes()}`

const nDate = new Date().toLocaleString('en-US', {
    timeZone: 'Asia/Calcutta',
    hour12: false,
});
var formattedDate = nDate.split(', ')[1];
var formattedDate= formattedDate.split(' ')[0]

return formattedDate
}

        </script>

        
    </body>

</html>