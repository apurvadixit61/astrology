@include('layouts.front_end.header')
<style>
    .timepicker table .btn span { background-color: #f6a828 ;}
</style>
<section id="page-title">
    <div class="container">
            <h1>Kundli</h1>
            <ul>
                    <li><a href="#"> Home </a></li>
                    <li>Kundli</li>
            </ul>
    </div>
</section>
<section id="freeKundli">
<div class="container mt-4">
    <div class="btnPanel">
        <button id="free_btn" onclick="freekundli()" class="btn btn-primary is_active  ">Free Kundli Online</button>
         <button id="match_btn" onclick="matchmaking()" class="btn btn-primary ">Kundli Matching</button>
    </div>
    
    <div class="kundli_div mt-5" id="freekundli">
        <div class="row">
            <div class="col-md-6">

                <div class="card">

                    <div class="card-body">
                        <form action="{{route('free-kundli')}}" method="post" id="register-form">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" required class="form-control" name="full_name" id="inputEmail4"
                                        placeholder="Full Name">
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
                                    <input type="text"  required name="birth_date" class="form-control my_date_picker"
                                        id="inputPassword4" placeholder="Birth Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Birth Time</label>
                                <input type="text" required name="birth_time"  placeholder="Birth Time" class="form-control datetimepicker3" id="inputAddress"
                                   >
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Birth Place</label>
                                <input type="text" required name="birth_place" class="form-control"
                                    id="front-search-field" placeholder="Birth Place">
                            </div>
                            <button type="submit" class="btn btn-primary is_active">Find Kundli</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Saved Kundli</h2>

                        <div class="form-row mt-3">
                            <div class="form-group col-md-12">
                                <input type="text" required class="form-control" name="f_full_name" id="inputEmail4"
                                    placeholder="Search Kundli">

                                <ul class="kundli-list-group mt-2">
                                     @if(empty($kundlis)) 
                                    <li >No Kundli Found</li>

                                      @else
                                      @foreach($kundlis as $data)
                                       <li>
                                        <div class="d-flex align-items-center">

                                          
                                           <a id="{{$data->id}}" onclick="form_submit(this.id)" style="background: <?php echo sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>;" class="kundliUserimg"><form class="{{$data->id}}" action="{{route('free-kundli')}}" method="post">@csrf<input type="hidden" name="full_name" value="{{$data->kundli_user_name}}" ><input type="hidden" name="birth_date" value="{{$data->birthday_year}}-{{$data->birth_month}}-{{$data->birth_day}}" ><input type="hidden" name="birth_time" value="{{$data->birth_time}}" ><input type="hidden" name="birth_place" value="{{$data->birth_place}}" ></form>

                                            {{ucfirst(substr($data->kundli_user_name, 0, 1))}}
                                            </a>
                                            <div class="kundliUserCont">
                                                <h4>{{ucfirst($data->kundli_user_name)}}</h4>
                                                <p> {{$data->birth_day}}-{{$data->birth_month}}-{{$data->birthday_year}} , {{$data->birth_time}}
                                           {{$data->birth_place}} </p>
                                           </div>
                                          
                                           
                                           <a href="{{url('user/delete_kundli/')}}/{{$data->id}}" class="ms-auto"><i class="fa fa-trash" style="color:red;" aria-hidden="true"></i></a>
                                           
                                        </div>
                                        
                                        
                                         </li>
                                      @endforeach

                                      @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="kundli_div mt-5" id="matchmaking" style="display:none;">
        <h3 class="text-center mb-5">Fill Up Partner's Detail</h3>
        <form action="{{route('match-making')}}" method="post" id="register-form">

            <div class="row">
                <div class="col-md-6">

                    <div class="card">

                        <div class="card-body">
                            <i class="fa fa-female fa-2x" aria-hidden="true"></i> <span
                                style="font-size:16px;font-weight:600;">Bride's Details</span>

                            @csrf
                            <div class="form-row mt-3">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" required class="form-control" name="f_full_name" id="inputEmail4"
                                        placeholder="Full Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Gender</label>
                                    <select id="inputState" name="f_gender" class="form-control" required>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Birth Date</label>
                                    <input type="text" required name="f_birth_date" class="form-control my_date_picker"
                                        id="inputPassword4" placeholder="Birth Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Birth Time</label>
                                <input type="text" required name="f_birth_time" class="form-control datetimepicker3" id="inputAddress"
                                    placeholder="Birth Time">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Birth Place</label>
                                <input type="text" required name="f_birth_place" class="form-control"
                                    id="front-search-field1" placeholder="Birth Place">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card">

                        <div class="card-body">
                            <i class="fa fa-male fa-2x" aria-hidden="true"></i> <span
                                style="font-size:16px;font-weight:600;">Groom's Details</span>

                            <div class="form-row mt-3">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" required class="form-control" name="m_full_name" id="inputEmail4"
                                        placeholder="Full Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Gender</label>
                                    <select id="inputState" name="m_gender" class="form-control" required>
                                        <option value="male">Male</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Birth Date</label>
                                    <input type="text"  required name="m_birth_date" class="form-control my_date_picker"
                                        id="inputPassword4" placeholder="Birth Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Birth Time</label>
                                <input type="text" id="" required name="m_birth_time" class="form-control datetimepicker3" id="inputAddress"
                                    placeholder="Birth Time">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Birth Place</label>
                                <input type="text" required name="m_birth_place" class="form-control"
                                    id="front-search-field2" placeholder="Birth Place">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center mt-4"><button type="submit" class="btn btn-primary is_active match_btn">Match Horoscope</button></div>

        </form>

    </div>
</div>
</div>
</section>

<!-- Footer -->
<!-- Footer -->
@include('layouts.front_end.footer')
<!-- Footer -->
<!-- Footer -->
<script type="text/javascript"
    src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
$(document).on('keyup', '#front-search-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field"));
});
$(document).on('keyup', '#front-search-field1', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field1"));
});
$(document).on('keyup', '#front-search-field2', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field2"));
});

function freekundli() {
    $('#match_btn').removeClass('is_active')
    $('#free_btn').addClass('is_active')
    $('#matchmaking').hide()
    $('#freekundli').show()
}

function matchmaking() {
    $('#free_btn').removeClass('is_active')
    $('#match_btn').addClass('is_active')
    $('#freekundli').hide()
    $('#matchmaking').show()

}


var colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"];

var avatarElement = $('.avatar-initials'),
    avatarWidth = avatarElement.attr('width'),
    avatarHeight = avatarElement.attr('height'),
    
    name = avatarElement.data('name'),
    initials = name.split(' ')[0].charAt(0).toUpperCase() + name.split(" ")[1].charAt(0).toUpperCase(),

    charIndex = initials.charCodeAt(0) - 65,
    colorIndex = charIndex % 19;

avatarElement.css({
  'background-color': colors[colorIndex],
  'width': avatarWidth,
  'height': avatarHeight,
  'font' : avatarWidth / 2 + "px Arial",
  'color': '#FFF',
  'textAlign': 'center',
  'lineHeight': avatarHeight + 'px',
  'borderRadius': '50%'
})
.html(initials);
function  form_submit(clicked_id)
{
  console.log(clicked_id)
  $("."+clicked_id).submit();
}

</script>

</html>