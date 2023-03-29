@include('layouts.front_end.header')

<section class="chatMsg">
    <div class="container">
    @if (\Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> {!! \Session::get('error') !!}</strong> You should check in on some time.    
    </div>
    @endif

    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {!! \Session::get('success') !!}</strong> wait for a while.    
    </div>
    @endif

        <div class="title text-center"><h2>Call Start</h2></div>
        <div class="chatMsg_inner mt-5">
            <form action="{{route('call-intake')}}" method="post">
                @csrf
                    <label> Gender * </label>
                    <input type="hidden" name="to_user" value="{{$id}}">
                    <div class="d-flex">
                        <div class="form-check me-3">
                          <input required class="form-check-input" type="radio" name="gender" value="male">
                          <label class="form-check-label" for="male">
                           Male
                          </label>
                        </div>
                        <div class="form-check">
                          <input  required class="form-check-input" type="radio" name="gender" value="female" checked>
                          <label class="form-check-label" for="female">
                            Female
                          </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="kundli_user_name" required type="text" value="{{Auth::guard('users')->user()->name}}" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input name="birth_date" required type="text" class="form-control my_date_picker " value="{{Auth::guard('users')->user()->dob}}" placeholder="DD/MM/YYYY">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time of Birth</label>
                                <input name="birth_time" required type="text" class="form-control datetimepicker3" value="{{Auth::guard('users')->user()->birth_time}}" placeholder="Time of Birth">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Place of Birth</label>
                                <input name="birth_place" required type="text" value="{{Auth::guard('users')->user()->birth_place}}"  id="front-search-field" class="form-control" placeholder="Place of Birth">
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Marital Status</label>
                                <select name="marital_status" required class="form-select" aria-label="Default select example">
                                  <option value="" selected>Select Marital Status</option>
                                  <option value="Married">Married</option>
                                  <option value="Single">Single</option>
                                  <option value="Widowed">Widowed</option>
                                  <option value="Separated">Separated</option>
                                  <option value="Divorced">Divorced</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Occupation</label>
                                <select name="occupation" required class="form-select" aria-label="Default select example">
                                  <option value="" selected>Select Occupation</option>
                                  <option value="Private">Private</option>
                                  <option value="Business">Business</option>
                                  <option value="Government">Government</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Topic of concern</label>
                                <select name="topic_concern" required class="form-select" aria-label="Default select example">
                                  <option value="" selected>Topic of concern</option>
                                  <option value="Marriage">Marriage</option>
                                  <option value="Business">Business</option>
                                  <option value="Job">Job</option>
                                  <option value="Education">Education</option>
                                  <option value="Exam">Exam</option>
                                  <option value="Home">Home</option>
                                  <option value="Personal">Personal</option>
                                  <option value="Carrier">Carrier</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                         <button class="btn btn-primary" type="submit">Start Call with Astrologer</button>
                     </div>
                 </div>
            </form>
        </div>
    </div>
</section>
@include('layouts.front_end.footer')

      <!--  JS Files -->
     <script type="text/javascript"
    src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>
   
      <script type="text/javascript">


$(document).on('keyup', '#front-search-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field"));
});

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
          
 
      </script>
     
   </body>
</html>
