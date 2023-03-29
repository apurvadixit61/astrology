<?php   use App\Http\Controllers\Front_end\UserController; ?>
@include('layouts.dashboard.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" integrity="sha512-MpdEaY2YQ3EokN6lCD6bnWMl5Gwk7RjBbpKLovlrH6X+DRokrPRAF3zQJl1hZUiLXfo2e9MrOt+udOnHCAmi5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {!! \Session::get('success') !!}</strong> 
    </div>
    @endif
<div class="dashboard_cont">
<form action="{{route('profileupdate')}}" method="post" id=""  enctype="multipart/form-data" class="">

    <div class="row mt-4 ">
    
        <div class="col-12">
            <div class="card">
                <div class="card-header with-border">
                    <h4 class="card-title">Profile setting <button type="submit" class="btn btn-primary pull-right">Update
                            Profile</button> <a href="#" class="pull-right me-3 mt-2 text-dark">Reset</a> </h4>

                </div>

  
                @if($profile_update[0]->user_type ==2)
                <!-- /.box-header -->
                <div class="card-body no-padding profile-setting">
                        <div class="form-group">
                            <label>Your Profile Picture</label>
                            <div class="upload customImgUpload">
                                <img src="{{url('/')}}/images/profile_image{{Auth::guard('users')->user()->profile_image}}"
                                   id="blah">
                                <!-- <p>Upload your photo</p> -->
                                <div class="btn btn-primary mt-3"><input type="file"  name="profile_image"  class="customImg" id="imgInp" > Profile Upload
                                        </div>
                            </div>
                       
                          
                        </div>
                       
                        <hr>
                        <?php 
                 // echo $profile_update[0]->id;die;
                  ?>
                        <div class="row">
                            @csrf

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Full Name"
                                        name="name" value="{{$profile_update[0]->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Language</label>
                                    <input type="text" class="form-control" placeholder="Enter Language"
                                        name="user_language" value="{{$profile_update[0]->user_language}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Skills</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Skills"
                                        name="user_expertise" value="{{$profile_update[0]->user_expertise}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Experience </label>
                                    <input type="text" class="form-control" placeholder="Enter your Experience "
                                        name="user_experience" value="{{$profile_update[0]->user_experience}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Call Price </label>
                                            <input type="text" class="form-control" placeholder="Enter Call Price"
                                                name="call_per_minute" value="{{$profile_update[0]->per_minute}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Chat Price </label>
                                            <input type="text" class="form-control" placeholder="Enter your Experience "
                                                name="per_minute" value="{{$profile_update[0]->per_minute}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group customImgUpload">
                                    <label>Upload your Photo </label>
                                    <div class="d-flex  align-items-center">
                                    <div class="gallery"></div>
                                    @if($profile_update[0]->image_url !='')
                                        @foreach(explode('|',$profile_update[0]->image_url) as  $key =>$img)
                                        <div class="upload" id="{{$key}}">
                                            <img src="{{url('/')}}/images/profile_image/cover_img/{{$img}}" ><a class="badge rounded-pill bg-danger" onclick="delete_img({{$key}})" >X</a>
                                        </div>       
                                        @endforeach
                                     @endif   
                                        <div class="btn btn-primary"><input type="file" name="image_url[]" class="customImg" id="gallery-photo-add" multiple> Custom File
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="selectBox" name="gender">
                                        <option @if($profile_update[0]->gender == 'male') selected @endif value="male">Male</option>
                                        <option  @if($profile_update[0]->gender == 'female') selected @endif value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Change Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Password"
                                                name="password" value="">
                                     
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <textarea class="form-control"
                                        name="user_aboutus">{{$profile_update[0]->user_aboutus}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Availabiility</label>
                                    <ul  class="list-group" style="list-style: none;"  id="userTime">
                                        @foreach($astro_availability as $astr_data)
                                        <li class="list-group-item" id="{{$astr_data->days}}"><b>{{$astr_data->days}}</b>   <span class="time">{{$astr_data->start_time}} to
                                                {{$astr_data->end_time}} <input type="hidden" name="week_day[]" value="{{$astr_data->days}}"><input type="hidden" name="week_start_time[]" value="{{$astr_data->start_time}}"> <input type="hidden" name="week_end_time[]" value="{{$astr_data->end_time}}"></span></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="userTimeEnter">
                                    <div class="userTimeHeader form-group">
                                        <select class="selectBox" name="" id="week_day">
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select> <span id="change_time"></span>  </div>

                                    <div class="userTimebox ">
                                        <div class="d-flex align-items-center">
                                            <input type="text" placeholder="Start Time" id="week_start_time" class="form-control datetimepicker3">
                                            <span class="me-2 ms-2">To</span>
                                            <input type="text" placeholder="End Time" id="week_end_time" class="form-control datetimepicker3">
                                        </div>
                                    </div>
                                    <div class="userTimeaction text-end mt-2"> Cancel <a
                                            class="btn btn-primary ms-2" onclick="set_availablity()">OK</a></div>
                                </div>
                            </div>
                            

                        </div>
                        </form>

                </div>

               @endif

               @if($profile_update[0]->user_type ==1)
               <div class="card-body no-padding profile-setting">
                        <div class="form-group">
                            <label>Your Profile Picture</label>
                            <div class="upload customImgUpload">
                                <img src="{{url('/')}}/images/profile_image{{Auth::guard('users')->user()->profile_image}}"
                                   id="blah">
                                <!-- <p>Upload your photo</p> -->
                                <div class="btn btn-primary mt-3"><input type="file"  name="profile_image"  class="customImg" id="imgInp" > Profile Upload
                                        </div>
                            </div>
                       
                          
                        </div>
                       
                        <hr>
                        <?php 
                 // echo $profile_update[0]->id;die;
                  ?>
                            @csrf

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Full Name"
                                        name="name" value="{{$profile_update[0]->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="number" class="form-control" placeholder="Enter Mobile Number"
                                                name="phone_no" value="{{$profile_update[0]->phone_no}}">
                                     
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email Address"
                                        name="email" value="{{$profile_update[0]->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Password"
                                                name="password" value="">
                                     
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Birth Date</label>
                                    <input type="text" name="dob"  value="{{$profile_update[0]->dob}}" class="form-control my_date_picker">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Birth Time</label>
                                    <input type="text" name="birth_time"  value="{{$profile_update[0]->birth_time}}" class="form-control datetimepicker">
                                    
                                </div>
                            </div>

                            

                        </div>     
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Birth Place</label>
                                    <input type="text" class="form-control" name="birth_place" value="{{$profile_update[0]->birth_place}}"  id="front-search-field">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="selectBox" name="gender">
                                        <option @if($profile_update[0]->gender == 'male') selected @endif value="male">Male</option>
                                        <option  @if($profile_update[0]->gender == 'female') selected @endif value="female">Female</option>
                                    </select>
                                </div>
                            </div>                           

                        </div>                      
                        
                        
                        </form>

                </div>
               @endif
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@include('layouts.dashboard.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
function set_availablity()
{
    var week_day =$('#week_day').val()
    var week_start_time =$('#week_start_time').val()
    var week_end_time =$('#week_end_time').val()   
    var a = document.getElementById(week_day);
    if(week_start_time.split(":")[0]>12)
    {
        week_start_time=week_start_time.split(":")[0]-12 +':'+week_start_time.split(":")[1]

    }
    if(week_end_time.split(":")[0]>12)
    {
    week_end_time=week_end_time.split(":")[0]-12 + ':'+week_end_time.split(":")[1]
    }

    document.getElementById('change_time').innerHTML =week_start_time + ' to ' + week_end_time; 

    if(a)
    {        
        var li =`<li id="`+week_day+`" ><b>`+week_day+ `</b><span class="time"> `+week_start_time+` to `+week_end_time+`<input type="hidden" name="week_day[]" value="`+week_day+`"><input type="hidden" name="week_start_time[]" value="`+week_start_time+`"><input type="hidden" name="week_end_time[]" value="`+week_end_time+`"></span></li>`
        $('#'+week_day).empty().html(li)
       
    }
else{
    var li =`<li  class="list-group-item" id="`+week_day+`" ><b>`+week_day+ `</b><span class="time"> `+week_start_time+` to `+week_end_time+`<input type="hidden" name="week_day[]" value="`+week_day+`"><input type="hidden" name="week_start_time[]" value="`+week_start_time+`"><input type="hidden" name="week_end_time[]" value="`+week_end_time+`"></span></li>`
       $('#userTime').append(li)
    }


}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});

var imagesPreview = function(input, placeToInsertImagePreview) {

if (input.files) {
    var filesAmount = input.files.length;

    for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function(event) {
            $($.parseHTML('<img class="upload">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
        }

        reader.readAsDataURL(input.files[i]);
    }
}

};


$('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
function delete_img(key)
{
    
    var url = base_url+'/user/delete_cover_img/'+key

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        data: '',
        dataType: 'json',
        success: function(result) {
         alertify.success("Image deleted Successfully");
         var link = document.getElementById(result);
         link.style.display = 'none';          

        }
    }); 
}
</script>