<html>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .fs-10{
    font-size: 20px;
    font-weight:600;
    line-height: 22px;
    margin-left: 40px;
    margin-top:1.5rem;
    }

    .link_active{
    color: #fe870a !important;
    border-bottom: 2px solid #fe870a;
    }

.first-div{
    height: 200px;
    background-image: url(https://collabdoor.com/public//front_img/page-title.png);
    background-size: contain;
    position: relative;
    width: 100%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.banner_heading{
    font-style: normal;
    font-weight: 600;
    font-size: 50px;
}  
.banner_button
{
    width: 258px;
    height: 45px;
    background: rgba(255, 255, 255, 0.235);
    border-radius: 100px;
    border: none;
    margin-top: 0px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}  
.banner_para{
    font-weight: bold;
    color: #fe870a;
    font-size: 18px;
}

.kundli_buttton
{
    /* margin: 10px;
    /* padding: 20px; */
    border-radius: 30px;
    color: #ffffff;
    font-family: "Lato" sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 29px;
    text-transform: capitalize;
    border: none;
    color: #fe870a;
    border: 2px solid #fe870a;
    background-color: #fff; 

}
.is_active{
    background: #fe870a;
    color: #ffffff;

}

.dropbtn {
  background-color: #fff;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdowns {
  position: relative;
  display: inline-block;
}

.dropdowns-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdowns-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdowns-content a:hover {background-color: #f1f1f1}

.dropdowns:hover .dropdowns-content {
  display: block;
}

.dropdowns:hover .dropbtn {
  background-color: #fe870a;
}
.kundli_div{
    background-color: #fff0e0;
    margin: 20px;
    padding: 4rem;
    border-radius:30px;
}
.login-btn{
    background-color:#fe870a;
    border:none;

}
footer{
    background-color: #000;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
    line-height: 3rem;
}
footer a{
    color: #fff;
}
</style>

<nav class="navbar navbar-light navbar-expand-sm">
        <a href="/" class="navbar-brand">
            <img src="https://collabdoor.com/public/front_img/Logo-removebg-preview 1.png " alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-3 px-5">
                <li class="nav-item">
                    <a href="" class="nav-link text-dark fs-10">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/all')}}" class="nav-link text-dark fs-10">
                        Our Astrologer
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/services')}}" class="nav-link text-dark fs-10">
                        Services
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/kundli')}}" class="nav-link text-dark fs-10 link_active">
                        Kundli
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/horoscope')}}" class="nav-link text-dark fs-10">
                        Horoscope
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/blog')}}" class="nav-link text-dark fs-10">
                        Blog
                    </a>
                </li>

                
                <?php  if(Auth::guard('users')->check() == true){ $id=Auth::guard('users')->user()->id;?>

                <li>
                <div class="dropdowns" style="margin-left:40px;float:right;">
                <button class="dropbtn"><img  class="rounded" style="width:50px;height:50px;"; src="{{asset('images/user.jpg')}}" alt=""><span style="margin-left:5px;font-weight:600;">Apurva Dixit</span> </button>
                <div class="dropdowns-content">
                <a href="#">Notification</a>
                <a href="#">Wallet</a>
                <a href="#">Order History</a>
                <a href="{{url('user/logout')}}">Logout</a>
                </div>
              </div>
                </li>

                <?php } else{ ?>
               <li><a href="{{url('/signin')}}" style="margin-left:100px;float:right;"> <button class="btn-lg mt-3 text-light login-btn">Sign In</button> </a></li>
                   <?php } ?>     

            </ul>

            
              
        </div>

        
  </nav>

<div class="first-div">
    <span class="banner_heading">Free Kundli</span>    
    <button class="banner_button">
        <p class="banner_para">Home</p> <img src="https://collabdoor.com/public/front_img/Vector (1)btn.png " class="" height="20" alt="">
        <h5 class="text-light">Kundli</h5>
    </button>
</div>
<div class="container mt-4">
    <div class="row mt-5">
        <div class="col-md-6"> <button class="btn-lg kundli_buttton  is_active float-right ">Free Kundli Online</button>   </div>
        <div class="col-md-6 "> <button class="btn-lg kundli_buttton">Kundli Matching</button>    </div>
    </div>
       <div class="kundli_div mt-5">
           <div class="row">
              <div class="col-md-6">

                <div class="card">

                <div class="card-body">
                  <form action="{{route('getKundli')}}" method="post" id="register-form" novalidate="novalidate">
                  @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">Full Name</label>
                        <input type="text" class="form-control" name="full_name" id="inputEmail4" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputState">Gender</label>
                        <select id="inputState" name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="inputPassword4">Birth Date</label>
                        <input type="date" name="birth_date" class="form-control" id="inputPassword4" placeholder="Birth Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Birth Time</label>
                        <input type="time"  name="birth_time"  class="form-control" id="inputAddress" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Birth Place</label>
                        <input type="text"  name="birth_place" class="form-control"  id="front-search-field" placeholder="Birth Place">
                    </div>
                    <button type="submit" class="btn is_active">Find Kundli</button>
                    </form>
                </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Saved Kundli</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                    </div>
              </div>
           </div>
       </div>
</div>

<!-- Footer -->
<!-- Footer -->
<footer class="page-footer pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
  
      <!-- Grid row -->
      <div class="row mt-5">
  
        <!-- Grid column -->
        <div class="col-md-5 mt-md-0 mt-3">
  
          <!-- Content -->
            <img src="https://collabdoor.com/public/front_img/Logo-removebg-preview 1.png " alt="">
          <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipiscing
            elit ut aliquam, purus sit amet luctus venenatis, lectus
            magna fringilla urna, porttitor rhoncus dolor purus
            non enim praesent elem</p>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none pb-3">
  
        <!-- Grid column -->
        <div class="col-md-2 mb-md-0 mb-3">
  
          <!-- Links -->
          <h4 class="text-uppercase text-light">Our Service</h4>
          <div style="border-bottom: 4px solid #fe870a;width: 80px;" ></div>
  
          <ul class="list-unstyled">
            <li>
              <a href="#!">Horoscope</a>
            </li>
            <li>
              <a href="#!">Gemstones</a>
            </li>
            <li>
              <a href="#!">Numerology</a>
            </li>
            <li>
              <a href="#!">Tarot Cards</a>
            </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
        <!-- Grid column -->
        <div class="col-md-2 mb-md-0 mb-3">
  
          <!-- Links -->
          <h4 class="text-uppercase  text-light"  >Quick Links</h4>
          <div style="border-bottom: 4px solid #fe870a;width: 60px;" ></div>
  
          <ul class="list-unstyled">
            <li>
              <a href="#!">About Us</a>
            </li>
            <li>
              <a href="#!">Blog</a>
            </li>
            <li>
              <a href="#!">Services</a>
            </li>
            <li>
              <a href="#!">Contact US</a>
            </li>
          </ul>
  
        </div>
        <div class="col-md-2 mb-md-0 mb-3">
  
            <!-- Links -->
            <h4 class="text-uppercase  text-light" >Contact Us</h4>
              <div style="border-bottom: 4px solid #fe870a;width: 40px;" ></div>
            <ul class="list-unstyled">
              <li>
                <a href="#!">(406) 555-0120</a>
              </li>
              <li>
                <a href="#!">mangcoding123@gmail.com</a>
              </li>
              <li>
                <a href="#!">2972 Westheimer Rd.</a>
              </li>
              <li>
                <a href="#!">Santa Ana, Illinois 85486</a>
              </li>
            </ul>
    
          </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    <!-- Copyright -->
  
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
<!-- Footer -->
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
        
$(document).on('keyup', '#front-search-field', function(){
  autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field")); 
});
</script>
    </html>