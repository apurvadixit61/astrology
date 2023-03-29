@include('layouts.front_end.header')

<section id="page-title">
    <div class="container">
            <h1>{{ __('message.our_astrologer') }}</h1>
            <ul>
                    <li><a href="#"> {{ __('message.home') }} </a></li>
                    <li>{{ __('message.our_astrologer') }}</li>
            </ul>
    </div>
</section>
<section id="filter">
    <div class="container">
        <div class="row filterBar">
            <div class="col-md-3">
                 <?php if(Auth::guard('users')->check()==1){if(Auth::guard('users')->user()->user_type==1 ){?>
                <div class="d-flex align-items-center">
                   <a href="{{url('user/recharge')}}" class="btn btn-primary">Recharge</a> 
                    <span class="ms-2">Rs. {{$wallets}}</span>
                </div>
                <?php }} ?>
            </div>
            
             <div class="col-md-6 col-sm-8">
                 <div class="d-flex align-items-center justify-content-center">
                    <div class="seachBox"><input type="text" class="form-control" onkeyup="get_astrologers()" id="search" placeholder="Search Name"><button><i class="fas fa-search"></i></button></div>
                    <button class="btn btn-outline-secondary ms-3" data-bs-toggle="modal" data-bs-target="#filterModal"><i class="fas fa-filter"></i> Filter</button>
                 </div>
             </div>
              <div class="col-md-3 text-end col-sm-4">
                  <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#sortModal"><i class="fas fa-sort-amount-down"></i> Sort by</button>
              </div>
        </div>
    </div>
</section>
<section id="ourAstrologer" class="pt-0">
  <div class="container">
        
        <div class="astrologerList">
            <div class="row">
                <div id="astrologers"></div>                
            </div>
        </div>
        <button style=" 
    padding: 1%;
    border-radius: 10px 10px 10px 10px;
    color: #fff;
    border: none;
    background: #fe870a;
}"  id="UpButton" onclick="UpAstrologers()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</button>
        <button style=" float:right;
    padding: 1%;
    border-radius: 10px 10px 10px 10px;
    color: #fff;
    border: none;
    background: #fe870a;
}" onclick="changelimit()" id="load_more"><i class="fa fa-arrow-right" aria-hidden="true"></i> Next</button>

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
                      <input class="form-check-input" type="radio" name="sorting" value="1" id="high_low">
                      <label class="form-check-label" for="s1">
                      Price : High to Low
                      </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="-1" name="sorting" id="low_high" >
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

<input type="hidden" name="limit" id="limit" value="0">
<input type="hidden" name="offset" id="offset" value="4">
      <!--  JS Files -->
      <script type="text/javascript">
        var id=0;
<?php if(Auth::guard('users')->check()==true ){?>  id={{Auth::guard('users')->user()->id; }} <?php } ?>

         $(function() {
         // Owl Carousel
         var owl = $(".owl-carousel");
         owl.owlCarousel({
         items: 2,
         margin: 20,
         loop: true,
         nav: true,
          responsiveClass: true,
                responsive: {
                    0:{
                      items: 1
                    },
                    480:{
                      items: 1
                    },
                    769:{
                      items: 2
                    }
                }
         });

         });
         setInterval(get_astrologers, 1000);
        //  get_astrologers()
   function get_astrologers()
   {
    var html=''  
    var skill=[]  
    var languagecheck=[]  
    var gender=[]  
    var face_reading =0
    
    var limit=$('#limit').val()
    var offset=$('#offset').val()
    var search=$('#search').val()
    
    if($("#face_reading").is(':checked')) { face_reading = $("#face_reading").val();
        limit=0;
        skill.push(face_reading);}  
    var kp =0
    
    
    if($("#kp").is(':checked')) { kp = $("#kp").val();
        limit=0; 
        skill.push(kp)}  
    var life_coach =0
    
    
    if($("#life_coach").is(':checked')) { life_coach = $("#life_coach").val();
        limit=0; 
        skill.push(life_coach)}  
    var nadi =0
    
    
    if($("#nadi").is(':checked')) { nadi = $("#nadi").val();
        limit=0; 
        skill.push(nadi)}  
    var numerology =0
    
    
    if($("#numerology").is(':checked')) { numerology = $("#numerology").val();
        limit=0; 
        skill.push(numerology)}  
    var palmistry =0
    
    
    if($("#palmistry").is(':checked')) { palmistry = $("#palmistry").val();
        limit=0; 
        skill.push(palmistry)}  
    var prashana =0
    
    
    if($("#prashana").is(':checked')) { prashana = $("#prashana").val();
        limit=0; 
        skill.push(prashana)}  
    var psychic =0
    
    
    if($("#psychic").is(':checked')) { psychic = $("#psychic").val();
        limit=0; 
        skill.push(psychic)}  
    var tarot =0
    
    
    if($("#tarot").is(':checked')) { tarot = $("#tarot").val();
        limit=0; 
        skill.push(tarot)}  
    var vastu =0
    
    
    if($("#vastu").is(':checked')) { vastu = $("#vastu").val();
        limit=0; 
        skill.push(vastu)}  
    var vedic =0
    
    
    if($("#vedic").is(':checked')) { vedic = $("#vedic").val();
        limit=0; 
        skill.push(vedic)}  

     console.log(skill)

         var Bengali=0;
         var English=0;
         var Gujarati=0;
         var Hindi=0;
         var Kannada=0;
         var Marathi=0;
         var Punjabi=0;
         var Tamil=0;
         var Telugu=0;
         var female=0;
         var male=0;
         var price=0;
    if($("#Bengali").is(':checked')) { Bengali = $("#Bengali").val();
        limit=0 
        languagecheck.push(Bengali)} 
             
    if($("#English").is(':checked')) { English = $("#English").val();
        limit=0 
        languagecheck.push(English)} 
             
    if($("#Gujarati").is(':checked')) { Gujarati = $("#Gujarati").val();
        limit=0 
        languagecheck.push(Gujarati)} 
             
    if($("#Hindi").is(':checked')) { Hindi = $("#Hindi").val();
        limit=0 
        languagecheck.push(Hindi)} 
             
    if($("#Kannada").is(':checked')) { Kannada = $("#Kannada").val();
        limit=0 
        languagecheck.push(Kannada)} 
             
    if($("#Marathi").is(':checked')) { Marathi = $("#Marathi").val();
        limit=0 
        languagecheck.push(Marathi)} 
             
    if($("#Punjabi").is(':checked')) { Punjabi = $("#Punjabi").val();
        limit=0 
        languagecheck.push(Punjabi)} 
             
    if($("#Tamil").is(':checked')) { Tamil = $("#Tamil").val();
        limit=0 
        languagecheck.push(Tamil)} 
             
    if($("#Telugu").is(':checked')) { Telugu = $("#Telugu").val();
        limit=0 
        languagecheck.push(Telugu)} 
             
        if($("#female").is(':checked')) { female = $("#female").val();
        limit=0 
        gender.push(female)} 

        if($("#male").is(':checked')) { male = $("#male").val();
        limit=0 
        gender.push(male)} 


        if ($("#low_high").prop("checked")) {
        // do something
        price =$("#low_high").val();
        }

        if ($("#high_low").prop("checked")) {
        // do something
        price =$("#high_low").val();
        }

    var url = base_url+'/all_astro'
    var data={limit:limit,offset:offset,search:search,skill:skill,language:languagecheck,gender:gender,price:price}
    console.log(data)
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(results) {
            html +=`<div class="row">`
             var result=results.users
             console.log("count",results.count)
             if(result.length<=0)
             {
                document.getElementById('astrologers').innerHTML ='';
                $('#load_more').hide()
                $('#UpButton').show()

               $('#astrologers').append('<div style="margin-left:40%;font-weight:600;color:#fe870a;">No Astrologer Found</div>')

             }else{

              if(limit==0)
              {
                $('#UpButton').hide()

              }  
            for (var count = 0; count < result.length; count++) {
                console.log(result[count])
                var user_expertise='--'
                var user_language='--'
                var user_experience='0'
                var per_minute='0'
                var style=''
                var wait=''
                
                var tel="{{ asset('public/astrology_assets/images/tel.png') }}"
                var msg="{{ asset('public/astrology_assets/images/msg.png') }}"

                var send_request="send_request(this,"+id+","+result[count].id+",'"+result[count].user_status+"')"
                var call_request="call_request(this,"+id+","+result[count].id+",'"+result[count].user_status+"')"
                var image="{{ asset('public/front_img/elem.png') }}"
                if(result[count].is_busy==1)
                {
                    wait=`<span style="color:red;">wait ~ `+(result[count].is_login/60)+` min</span>`
                    style="style='border:2px solid red;border-radius:50%;padding:3%;'"

                    send_request='is_busy()'
                    call_request='is_busy()'

                }
               
                if(user_type==2){ 
                    msg ="{{ asset('public/astrology_assets/images/msg_disable.png') }}"  
                    tel ="{{ asset('public/astrology_assets/images/tel_disable.png') }}"
                    
                    wait=``
                    style=""

                    send_request=''
                    call_request=''
                 }
               

                if(result[count].profile_image!=null)
                {
                    profile_image="{{url('/')}}/images/profile_image"+result[count].profile_image
                }

                if(result[count].user_expertise!=null)
                {
                    user_expertise=result[count].user_expertise
                }
                if(result[count].user_language!=null)
                {
                    user_language=result[count].user_language
                }
                if(result[count].user_experience!=null)
                {
                    user_experience=result[count].user_experience
                }
                if(result[count].per_minute!=null)
                {
                    per_minute=result[count].per_minute
                }
                html +=`<div class="col-lg-4 col-sm-6">
                    <div class="astrologerListBox">
                        <div class="astroBoxTop">
                            <a href="profile/`+result[count].id+`" >   <div class="astroBoximg"><img width="50" height="120" src="`+profile_image+`">
                            <span class="`+result[count].user_status+`"></span>

                                <div class="reviewBox">
                                    <i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star"></i> 4.5
                                </div>
                            </div></a>
                            <div class="astroBoxcont">
                                <span class="checkicon"><img src="{{ asset('public/astrology_assets/images/check.png')}}"></span>
                                <h4>`+result[count].name+`</h4>
                                <h5>`+user_expertise+`</h5>
                                <p>`+user_language+` <br> Exp: `+user_experience+` Year</p>`+wait+`
                                <div class="metaInfo">
                                    <span class="text-primary fw-bold">₹ `+per_minute+`/min</span>
                                    <a `+style+` class="ms-auto" onclick="`+send_request+`"><img src="`+msg+`" width="20" ></a> 
                                    <a `+style+` class="ms-2" onclick="`+call_request+`"><img src="`+tel+`" width="20" ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`

            }
            html +=`</div>`
            document.getElementById('astrologers').innerHTML ='';
            $('#load_more').show()
            if(limit > 0)
            {
                $('#UpButton').show()

            }
            

            if(result.length<=offset-1 || result.length==result.count )
             {
            $('#load_more').hide()
            $('#UpButton').show()

             }
            
            $('#astrologers').append(html)
             }

        }
    });

   }

   function is_busy()
   {
    Swal.fire('Astrologer is busy right now')

   }

   var user_type=0;
   <?php
   if(Auth::guard('users')->check() == true){
    $loginId = auth()->guard("users")->user()->id;
    ?>
 user_type={{auth()->guard("users")->user()->user_type}}


function send_request(element, from_user_id, to_user_id,status) {
    console.log(from_user_id)
    console.log(to_user_id)
    console.log(status)

  if(user_type == 2){
    // Swal.fire('Login with User')
  }else{

    if(status=='Offline')
    {
    Swal.fire('Astrologer is not available for now')

    }
    else{
    var url = base_url+'/user/send_request'
    var data = {
        from_user_id: from_user_id,
        to_user_id: to_user_id
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        data: data,
        dataType: 'json',
        success: function(result) {
            if (result.status == 0) {
                // alert(result.message)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: result.message,
                    })
                    .then((result) => {
                    if (result.isConfirmed) {
                    location.href = base_url+'/user/recharge';

                    }

                    })
                    // location.href = base_url+'/user/recharge';

            } else {
                location.href = base_url+'/kundli-detail/'+ to_user_id;

               
            }

        }
    });

}

  }
}

function call_request(element, from_user_id, to_user_id,status)
{
    if(user_type == 2){
    // Swal.fire('Login with User')
  }else{
if(status=='Offline')
    {
    Swal.fire('Astrologer is not available for now')

    }
    else{

        var url = base_url+'/user/call_request'
        var data = {
            from_user_id: from_user_id,
            to_user_id: to_user_id
        }

        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        data: data,
        dataType: 'json',
        success: function(result) {
            if (result.status == 0) {
                // alert(result.message)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: result.message,
                    })
                    .then((result) => {
                    if (result.isConfirmed) {
                    location.href = base_url+'/user/recharge';

                    }

                    })
                    // location.href = base_url+'/user/recharge';

            } else {
                location.href = base_url+'/call-detail/'+ to_user_id;

               
            }

        }
    });
    }
  }
}

function approve_request() {


    var url = base_url+'/user/approve_request'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'POST',
        data: '',
        dataType: 'json',
        success: function(result) {
            console.log(result)
            location.href = url+'/user/chat/' + result;

        }
    });

}

<?php
   }else{
    ?>

function send_request() {
    console.log(base_url+'/signin')
    location.href = base_url+'/signin'
}

function call_request()
{
    location.href = base_url+'/signin'
}
<?php
   } ?>

function changelimit()
{
    var limit=$('#limit').val()
    var offset=$('#offset').val()

    $('#limit').val(parseInt(limit)+parseInt(offset))
    get_astrologers()
}   


function UpAstrologers()
{
    var limit=$('#limit').val()
    var offset=$('#offset').val()
    console.log(limit)
    console.log(offset)
    if(limit >= offset)
    {        
        $('#limit').val(parseInt(limit)-parseInt(offset))
        get_astrologers()
    }
}
      </script>
     
   </body>
</html>
