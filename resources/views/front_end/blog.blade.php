@include('layouts.front_end.header')
<section id="page-title">
    <div class="container">
            <h1>Blog </h1>
            <ul>
                    <li><a href="#"> Home </a></li>
                    <li>Blog </li>
            </ul>
    </div>
</section>

<section id="blog" class="pt-0">
        <div class="container">
            <div class="title text-center">
                <h2>Our Blog</h2>
                <p class="mt-2 mb-5">There are many variations of passages of Lorem Ipsum available, but the <br>
                    majority have suffered alteration in some form, by injected hummer.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-md-2"  style="float:right;" >
                    <select name="" onchange="get_blogs()" class="mt-5 mb-5 form-control" id="category">
                        <option value="0">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                </div>
            </div>
            <div id="blogs">              
            </div>
            
        </div>
    </section>
@include('layouts.front_end.footer')

<script>
    var url = base_url+'/all_blog'
    get_blogs()
    function get_blogs(){
    var html=""
    var category=$('#category').val()
    console.log(category)
    var data={category:category}
    console.log(url)
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        data: data,
        dataType: 'json',
        success: function(results) {
           var result=results.blogs
            html +=`<div class="row">`
            if(result.length<=0)
             {
                html +=`<div class="col-lg-3 col-sm-6 mb-4" style="margin-left: 50%;
    color: #fe870a;
    font-size: 18px;
    font-weight: 600;"><span > No Blog Found</span>   </div></div>`
             document.getElementById('blogs').innerHTML ='';

             $('#blogs').append(html)
             }
             else{
                for (var count = 0; count < result.length; count++) {
                    console.log(result[count])
                    html +=`<div class="col-lg-3 col-sm-6 mb-4">
                    <div class="blogBox">
                        <div class="blogImg"><a href="{{url('/blog/`+result[count].id+`')}}"><img
                                    src="https://collabdoor.com/images/blogs/`+result[count].blog_image+`"></a></div>
                        <div class="blogCont">
                            <h3><a href="{{url('/blog/`+result[count].id+`')}}">`+result[count].blog_title+`</a></h3>
                            <p>`+(result[count].blog_description).substr(0, 150)+`</p>
                            <a href="{{url('/blog/`+result[count].id+`')}}">READ MORE</a>
                        </div>
                    </div>
                </div>`
                }
             }
             html +=`</div>`
             document.getElementById('blogs').innerHTML ='';

             $('#blogs').append(html)

        }
    })

    }
 


</script>