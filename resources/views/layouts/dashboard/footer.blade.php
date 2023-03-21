  <!--Container Main end-->
  <style>
    .footer {
  position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #efefef;
  text-align: center;
}
  </style>
  <!-- <div class="footer">Your chat is still running cancel it otherwise your full amount will be deducted <button class="btn btn-primary">Back to Chat</button>.</div> -->
        <!--  JS Files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('public/astrology_assets/dashboard/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
        <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


        <script type="text/javascript">
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
        var colors = ['#FE8302', '#f7bb80', '#984F01', '#c3e6cb', '#dc3545', '#6c757d'];


        /* bar chart */
        var chBar = document.getElementById("chBar");
        if (chBar) {
            new Chart(chBar, {
                type: 'bar',
                data: {
                    labels: ["S", "M", "T", "W", "T", "F", "S"],
                    datasets: [{
                            data: [589, 445, 483, 503, 689, 692, 634],
                            backgroundColor: colors[0]
                        },
                        {
                            data: [639, 465, 493, 478, 589, 632, 674],
                            backgroundColor: colors[1]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            barPercentage: 0.4,
                            categoryPercentage: 0.5
                        }]
                    }
                }
            });
        }

        var donutOptions = {
            cutoutPercentage: 55,
            legend: {
                position: 'bottom',
                padding: 5,
                labels: {
                    pointStyle: 'circle',
                    usePointStyle: true
                }
            }
        };

        // donut 1
        var chDonutData1 = {
            labels: ['Total Call Income', 'Total Chat Income', 'Total Income'],
            datasets: [{
                backgroundColor: colors.slice(0, 3),
                borderWidth: 0,
                data: [74, 11, 40]
            }]
        };

        var chDonut1 = document.getElementById("chDonut1");
        if (chDonut1) {
            new Chart(chDonut1, {
                type: 'pie',
                data: chDonutData1,
                options: donutOptions
            });
        }


        var base_url = location.protocol+'//'+location.host

            <?php
   if(Auth::guard('users')->check() == true){
    $loginId = auth()->guard("users")->user()->id;
    ?>
var user_type={{auth()->guard("users")->user()->user_type}}

var intervalId = window.setInterval(function() {
    get_notification_count()
}, 5000);

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
        </script>

        
    </body>

</html>