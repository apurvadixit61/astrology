@include('layouts.front_end.header')
<style type="text/css">
  .background-img {
    animation: rotation 17s infinite linear;
    left: 40px;
    border-radius: 50%;
}@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}
</style>
  <section class=" new-kundli-matching">
    <div class="container">
      <div class="row">
          <div class="col-md-6">
            <img class="background-img" src="{{ asset('public/front_img/background-imgg.png') }}" height="570" alt="">
          </div>
           <div class="col-md-6">
            <div class="loginForm">
           
             <form action="{{route('doSignup')}}" method="post">
                @csrf
                      <div class="content">
                      @if (\Session::has('error'))
                          <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                          </div>
                        @endif
                       
                          <h2 class="mb-3">Sign Up</h2>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Full Name</label>
                                <input placeholder="Full Name" required value="{{ old('name') }}"   name="name" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                                <label>Phone</label>
                                 <input placeholder="Phone" required value="{{ old('phone') }}"  name="phone" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input placeholder="Email" required value="{{ old('email') }}"  name="email" type="email" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Password</label>
                                      <input placeholder="Password" required value="{{ old('password') }}" type="password"  name="password" class="form-control">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                    <label>Birth Date</label>
                                      <input placeholder="Birth Date" required value="{{ old('dob') }}"  name="dob" type="text" class="form-control my_date_picker ">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label> Birth Time</label>
                                   <input placeholder="Birth Time" required value="{{ old('birth_time') }}"  name="birth_time" type="text" class="form-control datetimepicker3">
                                  </div>
                                </div>
                         <div class="form-group">
                            <label>Birth Place</label>
                               <input placeholder="Birth Place" id="front-search-field" required value="{{ old('birth_place') }}"  id="front-search-field" name="birth_place" type="text" class="form-control">
                          </div>
                           <button type="submit" class="Sing-up-btn btn btn-primary">Sign Up</button>
                         
                        
                          
                          
                </form>
               

                <p class="mt-4">Already have an Account? <a href="{{url('/signin')}}">Sign In</a></p>

              </div>
            </div>
          </div>
        </div>
  </div>
  </section>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript"
    src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <script src="{{ asset('public/front_end/js/login.js') }}"></script>
  <script>
    $(document).on('keyup', '#front-search-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field"));
});
$( ".my_date_picker" ).datepicker({dateFormat: 'yy-mm-dd',maxDate: '0',showButtonPanel: true,
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
</body>

</html>