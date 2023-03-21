@include('layouts.front_end.header')



<section id="profileOuter">
    <div class="container">
       <div class="row">
            <div class="col-md-4">
                <div class="miniProfile text-center">


                    <div class="miniProfileImg"><img src="{{url('/')}}/images/profile_image/{{$astro[0]->profile_image}}"></div>
                    <h2>{{$astro[0]->name}}</h2>
                    <p>{{$astro[0]->user_expertise}}</p>
                    <p>{{$astro[0]->user_language}}</p>
                    <p>Exp: {{$astro[0]->user_experience}} Years</p>
                    <p class="text-priamry">₹ {{$astro[0]->id}}/min</p>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="#" class="btn btn-outline-primary">
                            <img src="{{url('/')}}/images/chat.png">
                            Start Chat
                            <span>{{$astro[0]->per_minute}}k mins</span>
                        </a>
                        <a href="#" class="btn btn-outline-secondary">
                            <img src="{{url('/')}}/images/call.png">
                            Start Call
                            <span class="text-danger">Currently offline</span>
                        </a>
                    </div>
                </div>
                <div class="availabilityBox mt-4">
                    <h3 class="text-center">Availability</h3>
                    <ul>
                    @foreach($astro_availability as $availability)
                        <li class="d-flex align-items-center">
                            <div class="availTime">
                           {{$availability->days}} <br>
                            </div>
                            <img src="{{url('/')}}/images/colon.png">
                            <div class="availcont">
                                <p>{{$availability->start_time}} - {{$availability->end_time}}</p>
                              
                            </div>
                        </li>
                        @endforeach 
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profileIntro">
                    <h2>About Me</h2>
                    <p>{{$astro[0]->user_aboutus}}</p>
                </div>
                <div class="owl-carousel text-center">
                    <div class="item"> <img src="images/profileImg.png"></div>
                     <div class="item"> <img src="images/profileImg.png"></div>
                     <div class="item"> <img src="images/profileImg.png"></div>
                     <div class="item"> <img src="images/profileImg.png"></div>
                     <div class="item"> <img src="images/profileImg.png"></div>
                     <div class="item"> <img src="images/profileImg.png"></div>
              </div>
              <div class="ratingOuter">
                     <div class="card mt-5">
                <div class="card-body">
                       <h3 class="text-center mb-4">Rating & Reviews</h3>
                       <div class="ratingBox">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-4  text-center">
                                 
                                    <h1 class="rating_circle">4.1</h1>
                                    <div>
                                        <div class="rate">
                                            <i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>
                                          </div>
                                          <h5>From {{count($astro_review)}} reviews</h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                   <div class="progressBox d-flex align-items-center">
                                         5
                                       <div class="progress" style="height:4px">
                                          <div class="progress-bar dark" style="width:70%;height:4px"></div>
                                        </div>
                                        2.8k
                                    </div>
                                     <div class="progressBox d-flex align-items-center">
                                        4
                                            <div class="progress" style="height:4px">
                                                <div class="progress-bar dark" style="width:10%;height:4px"></div>
                                            </div>
                                            2.8k
                                        </div>
                                     <div class="progressBox d-flex align-items-center">
                                         3
                                            <div class="progress" style="height:4px">
                                                <div class="progress-bar dark" style="width:10%;height:4px"></div>
                                            </div>
                                            2.8k
                                        </div>
                                     <div class="progressBox d-flex align-items-center">
                                         2
                                            <div class="progress" style="height:4px">
                                                <div class="progress-bar dark" style="width:5%;height:4px"></div>
                                            </div>
                                            2.8k
                                        </div>
                                     <div class="progressBox d-flex align-items-center">
                                         1
                                            <div class="progress" style="height:4px">
                                                <div class="progress-bar dark" style="width:5%;height:4px"></div>
                                            </div>                
                                            2.8k
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                    <div class="ratingComment">

                    @foreach($astro_review as $review)
                        <div class="ratingCommentBox">
                            <div class="ratingCommentBoxTop d-flex">
                                <img src="{{url('/')}}/images/profile_image/{{$review->profile_image}}" width="50px">
                                <div class="ratingUserInfo">
                                    <h4>{{$review->name}}</h4>
                                    <div class="ratingStar">
                                    <i class="fas fa-star text-priamry"></i> 
                                    <i class="fas fa-star text-priamry"></i>
                                    <i class="fas fa-star text-priamry"></i> 
                                    <i class="far fa-star"></i> 
                                    <i class="far fa-star"></i>
                                  </div>


                                </div>
                              
                                <span class="rateDate ms-auto">{{   date('F, Y', strtotime($review->review_date))}}</span>
                            </div>
                            <p>{{$review->review}}</p>
                         </div>
                         @endforeach
                </div>
            </div>
              </div>

            </div>
       </div>
    </div>
</section>


@include('layouts.front_end.footer')

<div class="modal fade" id="sortModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sort</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <ul class="sort-list">
                <li>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sorting" id="s1">
                      <label class="form-check-label" for="s1">
                      Price : High to Low
                      </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sorting" id="s2" checked>
                      <label class="form-check-label" for="s2">
                      Price : Low to High
                      </label>
                    </div>
                </li>               
            </ul>
      </div>
     
    </div>
  </div>
</div>
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="d-flex align-items-start">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Skill</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Language</button>
            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Gender</button>
            <!-- <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Country</button> -->
            <!-- <button class="nav-link" id="v-pills-Offer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Offer" type="button" role="tab" aria-controls="v-pills-Offer" aria-selected="false">Offer</button> -->
          </div>
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="filterOption text-end">
                        <span class="text-primary"><u>Select All</u></span> <span class="text-primary ms-3"><u>Clear All</u></span>
                    </div>
                    <ul class="filter-list">
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Face Reading" id="face_reading">
                              <label class="form-check-label" for="s1">
                              Face Reading
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Kp" id="kp">
                              <label class="form-check-label" for="s2">
                                Kp
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Life Coach" id="life_coach">
                              <label class="form-check-label" for="s3">
                              Life Coach
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Nadi" id="nadi">
                              <label class="form-check-label" for="s4">
                                Nadi
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Numerology" id="numerology">
                              <label class="form-check-label" for="s4">
                              Numerology
                              </label>
                            </div>
                        </li> <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Palmistry" id="palmistry">
                              <label class="form-check-label" for="s4">
                              Palmistry
                              </label>
                            </div>
                        </li> <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Prashana" id="prashana">
                              <label class="form-check-label" for="s4">
                              Prashana
                              </label>
                            </div>
                        </li> <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Psychic" id="psychic">
                              <label class="form-check-label" for="s4">
                              Psychic
                              </label>
                            </div>
                        </li> 

                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Tarot" id="tarot">
                              <label class="form-check-label" for="s4">
                              Tarot
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Vastu" id="vastu">
                              <label class="form-check-label" for="s4">
                              Vastu
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Vedic" id="vedic">
                              <label class="form-check-label" for="s4">
                              Vedic
                              </label>
                            </div>
                        </li>
                    </ul>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="filterOption text-end">
                        <span class="text-primary"><u>Select All</u></span> <span class="text-primary ms-3"><u>Clear All</u></span>
                    </div>
                      <ul class="filter-list">
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Bengali" id="Bengali">
                              <label class="form-check-label" for="l1">
                              Bengali
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="English" id="English" >
                              <label class="form-check-label" for="l2">
                              English
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Gujarati" id="Gujarati">
                              <label class="form-check-label" for="l3">
                              Gujarati
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Hindi" id="Hindi" >
                              <label class="form-check-label" for="l4">
                              Hindi
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Kannada" id="Kannada" >
                              <label class="form-check-label" for="l4">
                              Kannada
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Marathi" id="Marathi" >
                              <label class="form-check-label" for="l4">
                              Marathi
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Punjabi" id="Punjabi" >
                              <label class="form-check-label" for="l4">
                              Punjabi
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Tamil" id="Tamil" >
                              <label class="form-check-label" for="l4">
                              Tamil
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Telugu" id="Telugu" >
                              <label class="form-check-label" for="l4">
                              Telugu
                              </label>
                            </div>
                        </li>
                    </ul>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="filterOption text-end">
                        <span class="text-primary"><u>Select All</u></span> <span class="text-primary ms-3"><u>Clear All</u></span>
                    </div>
                    <ul class="filter-list">
                        
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="f" id="female" >
                              <label class="form-check-label" for="f2">
                                Female
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="m" id="male">
                              <label class="form-check-label" for="f3">
                             Male
                              </label>
                            </div>
                        </li>                        
                    </ul>
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="filterOption text-end">
                        <span class="text-primary"><u>Select All</u></span> <span class="text-primary ms-3"><u>Clear All</u></span>
                    </div>
                    <ul class="filter-list">
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="c1">
                              <label class="form-check-label" for="c1">
                              India
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="c2" checked>
                              <label class="form-check-label" for="c2">
                                Outside India
                              </label>
                            </div>
                        </li>
                        
                    </ul>
            </div>
            <div class="tab-pane fade" id="v-pills-Offer" role="tabpanel" aria-labelledby="v-pills-Offer-tab">
                    
                    <div class="filterOption text-end">
                        <span class="text-primary"><u>Select All</u></span> <span class="text-primary ms-3"><u>Clear All</u></span>
                    </div>
                    <ul class="filter-list">
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="o1">
                              <label class="form-check-label" for="o1">
                              offer 1
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="o2" checked>
                              <label class="form-check-label" for="o2">
                                offer 2
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="o3">
                              <label class="form-check-label" for="o3">
                              offer 3
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="o4" checked>
                              <label class="form-check-label" for="o4">
                                offer 4
                              </label>
                            </div>
                        </li>
                    </ul>

            </div>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary pull-left" data-bs-dismiss="modal">Reset</button>
        <button type="button" onclick="get_astrologers()" data-bs-dismiss="modal" class="btn btn-primary">Apply</button>
      </div>
    </div>
  </div>
</div>


      <!--  JS Files -->
 
     
   </body>

   <style>

.progress{ width:100%; margin:0 15px }
.progress-bar{background-color: #FE870A;}

img folder me he 

img

#profileOuter .owl-carousel .owl-item img{ width:100% }
.rate {
    float: none;
height: 25px; text-align: center;
padding: 0 10px;
background: ;
width: 170px;
margin: auto;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked  label:hover  label,
.rate > label:hover  input:checked  label {
    color: #c59b08;
}.rating_circle{
    
    font-size: 55px;
  }
  .rating_text{
      margin-top: 38px;
  }
  .progress{ width:100%; margin:0 15px }

.miniProfile,.availabilityBox {
  border: 1px solid #EFEFEF;
  border-radius: 16px;
  padding: 30px;
}
.miniProfileImg img{ border-radius:50%; margin-bottom:15px }
.miniProfile p {
  font-size: 16px;
  line-height: 32px;
}
.miniProfile .btn {
  border-radius: 10px;
  text-align: left;
  position: relative;
  padding: 10px 25px 10px 45px;
  margin: 0 5px;
}
.text-priamry{color: #FE870A;}
.miniProfile .btn img {
  position: absolute;
  left: 11px;
  top: 19px;
  width: 25px;
}
.miniProfile .btn span {
  display: block;
  font-size: 10px;color: #FE870A;
}
.miniProfile .btn.btn-outline-primary {
  color: #000;
  border-color: #FE8302;
  font-size: 18px;
}
.availabilityBox li {margin: 20px 0;
  border: 1px solid #979797;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
  border-radius: 15px;
  padding: 15px;
  justify-content: space-around;
}.availcont {
  color: #979797;
}
.profileIntro h2{font-size: 35px; font-weight: 700}
.profileIntro p {
  font-size: 16px;
  line-height: 32px;
  margin: 15px 0;
}
.rating_circle {
  font-size: 75px;
  color: #FE870A;
  font-weight: 500;
}
.progress-bar{background-color: #FE870A;}



.ratingBox {
  border-bottom: 2px solid #FE870A;
  margin: 0 -15px 10px;
  padding-bottom: 25px;
}
.ratingCommentBox img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 15px;
}.ratingUserInfo h4 {
  font-size: 18px;
}
.rateDate {
  color: #979797;
  font-size: 13px;
}
.ratingCommentBox p {
  color: #979797;
}
.ratingCommentBox {
  border-bottom: 1px solid #ccc;
  padding: 15px;
}
.ratingCommentBox:last-child {
  border: none;
}

.progressBox {
  margin: 5px;
}
.ratingOuter .card {
  border-radius: 16px;
}
#request .modal-content{background: url(../images/bg1.png) #fff; background-size: 100%}
.chatBtn img {
    width: 15px;
    margin-right: 10px;
}.chatBtn {
    width: 100%;
    border-radius: 50px;
    height: 30px;
    padding: 5px !important;
}
.request_user .chatuserImg{ width:80px; height:80px; border-radius:50% }
   </style>
</html>
