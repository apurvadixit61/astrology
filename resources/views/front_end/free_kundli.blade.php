@include('layouts.front_end.header')
<style>
    .match_btn{
    margin-left: 18rem;
    margin-top: 3rem;
    padding-left: 4rem;
    padding-right: 4rem;
    width: 42%;
    font-size: 22px;
    }
</style>
<div class="first-div">
    <span class="banner_heading">Free Kundli</span>    
    <button class="banner_button">
        <p class="banner_para">Home</p> <img src="https://collabdoor.com/public/front_img/Vector%20(1)btn.png" class="" height="20" alt="">
        <h5 class="text-light">Kundli</h5>
    </button>
</div>
<div class="container mt-4">
    <div class="row mt-5">
        <div class="col-md-6"> <button id="free_btn" onclick="freekundli()" class="btn-lg kundli_buttton is_active  float-right ">Free Kundli Online</button>   </div>
        <div class="col-md-6 "> <button id="match_btn" onclick="matchmaking()" class="btn-lg kundli_buttton ">Kundli Matching</button>    </div>
    </div>
       <div class="kundli_div mt-5" id="freekundli">
           <div class="row">
              <div class="col-md-6">

                <div class="card">

                <div class="card-body">
                  <form action="{{route('free-kundli')}}" method="post" id="register-form" >
                  @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">Full Name</label>
                        <input type="text" required class="form-control" name="full_name" id="inputEmail4" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputState">Gender</label>
                        <select id="inputState" name="gender" class="form-control" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="inputPassword4">Birth Date</label>
                        <input type="date" required name="birth_date" class="form-control" id="inputPassword4" placeholder="Birth Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Birth Time</label>
                        <input type="time" required  name="birth_time"  class="form-control" id="inputAddress" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Birth Place</label>
                        <input type="text" required  name="birth_place" class="form-control"  id="front-search-field" placeholder="Birth Place">
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

       <div class="kundli_div mt-5" id="matchmaking" style="display:none;">
        <p style="font-size:18px;font-weight:600;">Fill Up Partner's Detail</p>
        <form action="{{route('match-making')}}" method="post" id="register-form" >

           <div class="row">
              <div class="col-md-6">

                <div class="card">

                <div class="card-body">
                  @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">Full Name</label>
                        <input type="text" required class="form-control" name="f_full_name" id="inputEmail4" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputState">Gender</label>
                        <select id="inputState" name="f_gender" class="form-control" required>
                            <option value="female">Female</option>
                        </select>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="inputPassword4">Birth Date</label>
                        <input type="date" required name="f_birth_date" class="form-control" id="inputPassword4" placeholder="Birth Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Birth Time</label>
                        <input type="time" required  name="f_birth_time"  class="form-control" id="inputAddress" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Birth Place</label>
                        <input type="text" required  name="f_birth_place" class="form-control"  id="front-search-field1" placeholder="Birth Place">
                    </div>
                </div>
                </div>
              </div>
              <div class="col-md-6">

<div class="card">

<div class="card-body">
 
    <div class="form-row">
        <div class="form-group col-md-12">
        <label for="inputEmail4">Full Name</label>
        <input type="text" required class="form-control" name="m_full_name" id="inputEmail4" placeholder="Full Name">
        </div>
        <div class="form-group col-md-12">
        <label for="inputState">Gender</label>
        <select id="inputState" name="m_gender" class="form-control" required>
            <option value="male">Male</option>
        </select>
        </div>

        <div class="form-group col-md-12">
        <label for="inputPassword4">Birth Date</label>
        <input type="date" required name="m_birth_date" class="form-control" id="inputPassword4" placeholder="Birth Date">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Birth Time</label>
        <input type="time" required  name="m_birth_time"  class="form-control" id="inputAddress" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Birth Place</label>
        <input type="text" required  name="m_birth_place" class="form-control"  id="front-search-field2" placeholder="Birth Place">
    </div>
</div>
</div>
</div>
<button type="submit" class="btn is_active match_btn">Match Horoscope</button>

</form>

           </div>
       </div>
</div>

<!-- Footer -->
<!-- Footer -->
@include('layouts.front_end.footer')
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
$(document).on('keyup', '#front-search-field1', function(){
  autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field1")); 
});
$(document).on('keyup', '#front-search-field2', function(){
  autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field2")); 
});

function freekundli()
{
    $('#match_btn').removeClass('is_active')
    $('#free_btn').addClass('is_active')
   $('#matchmaking').hide()
   $('#freekundli').show()
}

function matchmaking()
{
    $('#free_btn').removeClass('is_active')
    $('#match_btn').addClass('is_active')
    $('#freekundli').hide()
    $('#matchmaking').show()

}
</script>
    </html>