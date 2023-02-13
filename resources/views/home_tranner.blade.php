

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div id="main-content">
                    <div class="row bar_outer">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="media">
                                    <h3>Total Class Assgined</h3>
                                    <div class="media-body media-text-left">
                                        <h4>{{$classses}}</h4>
                                       <!--  <p><span class="ti-arrow-down"></span> 13.8%</p> -->
                                    </div>
                                    <div class="media-right meida media-middle">
                                        <div class="sparkline-unix">
                                            <div id="sparklinedash17"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="media">
                                   <h3>Total Accessories Assgined</h3>
                                    <div class="media-body media-text-left">
                                        <h4>{{$accessories}}</h4>
                                       <!--  <p><span class="ti-arrow-down"></span> 13.8%</p> -->
                                    </div>
                                    <div class="media-right meida media-middle">
                                        <div class="sparkline-unix">
                                            <div id="sparklinedash18"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="card">
                                <div class="media">
                                   <h3>Pending Accessories Request</h3>
                                    <div class="media-body media-text-left">
                                        <h4>{{$pending}}</h4>
                                       <!--  <p><span class="ti-arrow-down"></span> 13.8%</p> -->
                                    </div>
                                    <div class="media-right meida media-middle">
                                        <div class="sparkline-unix">
                                            <div id="sparklinedash24"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <h2 class="custome_title">today diving assigned classes</h2>
                        <div class="col-lg-8">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Referrer </h4>
                                   
                                </div>
                                <div class="card-body classes_table">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Courses Name</th>
                                                <th>Start Date</th>
                                                <th>Time</th>
                                                <th>Class Location</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                 <?php if($assigend_class){ 
                                                    $i =1;
                                            foreach($assigend_class as $user){ 
                                                      { ?>
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->cour_name}}</td>
                                                <td>{{$user->start_date}}</td>
                                                <td><span>{{$user->start_time}}</span></td>
                                                <td><span>{{$user->location}}</span></td>
                                            </tr>
                                           
                                            <?php  $i++;}}} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                     <?php echo $assigend_class->render(); ?>
                                   <!--  <a href="#">See More</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card alert nestable-cart">
                                <div class="card-header">
                                    <h4>Details On Map</h4>
                                    <div class="card-header-right-icon">
                                       <a href="#">Show All List</a>
                                    </div>
                                </div>
                                <div class="datamap">
                                    <div id="world-datamap"></div>
                                </div>
                                <div class="location_detail">
                                    <ul>
                                        <li><i class="fa fa-circle one"></i> Diving 36 Store <span>100+</span></li>
                                        <li><i class="fa fa-circle two"></i> Diving 36 Location <span>100+</span></li>
                                        <li><i class="fa fa-circle three"></i> Diving 36 instructor <span>100+</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

