@include('layouts.header')

<div class="content-wrapper">
     <!-- /# column -->

	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Profile</h3>

				</div>
                  </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}

                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
                    @endif



				<!-- /.box-header -->
				<div class="mt-20">
				<div class="main-content">
                    <div id="main-content">

                    <div class="row">

                        <div class="col-lg-10">

                            <div class="card alert">

                                <div class="card-body">

                                    <div class="user-profiles">

                                        <div class="row">

                                            <div class="col-lg-2">

                                                <div class="user-photo m-b-30">

                             <img class="img-responsive img-fluid"  src="images/profile_image/{{ Auth::user()->profile_image }}" alt="" />

                                                </div>



                                            </div>

                                            <div class="col-lg-10">

                                        <div class="user-profile-name"><h3>{{ Auth::user()->name }}</h3></div>

                                                <!--<div class="user-Location"><i class="ti-location-pin"></i>{{ Auth::user()->city }}</div>-->


                                              <div class="custom-tab user-profile-tab">

                                                    <ul class="nav nav-tabs" role="tablist" style="border:none;">

                                                        <!--<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a></li>-->

                                                    </ul>

                                                    <div class="tab-content">

                                                        <div role="tabpanel" class="tab-pane active" id="1">

                                                            <div class="contact-information">

                                                                <h4>Contact information</h4>

                                                                <div class="phone-content">

                                                                    <span class="contact-title">Phone:</span>

                                                                    <span class="phone-number">{{ Auth::user()->phone_no }}</span>

                                                                </div>



                                                                <div class="address-content">

                                                                    <span class="contact-title">Address:</span>

                                                                    <span class="mail-address">{{ Auth::user()->address }}</span>

                                                                </div>



                                                                <div class="email-content">

                                                                    <span class="contact-title">Email:</span>

                                                                    <span class="contact-email">{{ Auth::user()->email }}</span>

                                                                </div>



                                                                <div class="address-content">

                                                                    <span class="contact-title">City:</span>

                                                                    <span class="mail-address">{{ Auth::user()->city }}</span>

                                                                </div>



                                                                <div class="website-content">

                                                                    <span class="contact-title">State:</span>

                                                                    <span class="contact-website">{{ Auth::user()->state }}</span>

                                                                </div>



                                                            </div>



                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- /# column -->

                      <!--   <div class="col-lg-6">

                            <div class="row">

                                <div class="col-lg-3">

                                    <div class="card">

                                        <div class="stat-widget-one">

                                            <div class="profile-widget">

                                                <div class="stat-text">Job Done</div>

                                                <div class="stat-digit">19</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="card">

                                        <div class="stat-widget-one">

                                            <div class="profile-widget">

                                                <div class="stat-text">Ongoing Job</div>

                                                <div class="stat-digit">6</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="card">

                                        <div class="stat-widget-one">

                                            <div class="profile-widget">

                                                <div class="stat-text">Reject</div>

                                                <div class="stat-digit">6</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="card">

                                        <div class="stat-widget-one">

                                            <div class="profile-widget">

                                                <div class="stat-text">Upcomming</div>

                                                <div class="stat-digit">29</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>



                        </div> -->

                        <!-- /# column -->

                    </div>





                </div>




                    <!-- /# row -->



                </div>



                <!-- /# main content -->



            </div>

				</div>
				<!-- /.box-body -->
			  </div>
				</div>

			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>


@include('layouts.footer')
