<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Astro</title>

	<!-- Vendors Style-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--	 Style-->
<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap-->
<!--">-->
<link rel="stylesheet" href="{{ URL::to('assets/icons/font-awesome/css/font-awesome.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/Ionicons/css/ionicons.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/linea-icons/linea.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/glyphicons/glyphicon.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/material-design-iconic-font/css/materialdesignicons.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/simple-line-icons/css/simple-line-icons.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/cryptocoins-master/cryptocoins.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/icons/weather-icons/css/weather-icons.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/iconsmind/style.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/icons/icomoon/style.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/animate/animate.css')}}">

<link rel="stylesheet" href="{{ URL::to('css/color_theme.css')}}">
<link rel="stylesheet" href="{{ URL::to('css/style_rtl.css')}}">
<link rel="stylesheet" href="{{ URL::to('css/skin_color.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/perfect-scrollbar/css/perfect-scrollbar.css')}}">
<!--<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/morris.js/morris.css')}}">-->
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/OwlCarousel2/dist/assets/owl.carousel.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/OwlCarousel2/dist/assets/owl.theme.default.min.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/horizontal-timeline/css/horizontal-timeline.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/flexslider/flexslider.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/prism/prism.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/datatable/datatables.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/gallery/css/animated-masonry-gallery.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/lightbox-master/dist/ekko-lightbox.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/sweetalert/sweetalert.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/bootstrap-markdown-master/css/bootstrap-markdown.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/ion-rangeSlider/css/ion.rangeSlider.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/gridstack/gridstack.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css')}}">

<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/nestable/nestable.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/bootstrap-switch/switch.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/chartist-js-develop/chartist.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_plugins/bootstrap-slider/slider.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_plugins/iCheck/flat/blue.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_plugins/iCheck/all.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_plugins/pace/pace.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/fullcalendar/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('assets/vendor_components/weather-icons/weather-icons.css')}}">
<link rel="stylesheet" href="{{ URL::to('css/style.css')}}">


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
	<div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>
		<!-- Logo -->
		<a href="#" class="logo" style="">
		  <!-- logo-->
		  <div class="logo-lg" style="">
		      <h5>Astrology</h5>
			 <!-- <span class="light-logo"><img src="{{ URL::to('images/logo-dark-text.png')}}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{ URL::to('images/logo-dark-text.png')}}" alt="logo"></span>-->
		  </div>
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item d-md-none">
				<a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
					<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
			    </a>
			</li>
			<!--<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="#" class="waves-effect waves-light nav-link svg-bt-icon" title="Chat">
					<i class="icon-Chat"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="#" class="waves-effect waves-light nav-link svg-bt-icon" title="Mailbox">
					<i class="icon-Mailbox"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="#" class="waves-effect waves-light nav-link svg-bt-icon" title="Taskboard">
					<i class="icon-Clipboard-check"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
			    </a>
			</li>-->
		</ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
					<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<!-- <li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">
						<form>
							<div class="input-group">
							  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
							  <div class="input-group-append">
								<button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</li> -->
		  <!-- Notifications -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="Notifications">
			  <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
			</a>
			<ul class="dropdown-menu animated bounceIn">

			  <li class="header">
				<div class="p-20 row">
					<div class="flexbox">
						<div class="col-md-6">
							<h4 class="mb-0 mt-0" style="font-size:16px;">Notifications</h4>
							
						</div>
						<div class="col-md-6 float-right">
						<a href="{{url('clearall')}}" class="text-danger">Clear All</a>
						</div>
					</div>
				</div>
			  </li>

			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu sm-scrol" id="notification_content">
				</ul>
			  </li>
			  <li class="footer">
				  <a href="{{url('notification')}}">View all</a>
			  </li>
			</ul>
		  </li>
	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
				<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="{{url('profile')}}"><i class="ti-user text-muted mr-2"></i> Profile</a>
<!--				 <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My Wallet</a>
<!---		 <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>-->


			 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{ url('/admin/logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
              </li>
            </ul>
          </li>
          <li  class="dropdown user user-menu" >    
                  <a href="{{ url('/admin/logout') }}" title="User">
				<i class="icon-Sign-out"><span class="path1"></span><span class="path2"></span></i>
            </a>
    </li>
    <!--      <li class="dropdown user user-menu">-->
    <!--        <a href="{{ url('/admin/logout') }}" class="waves-effect waves-light" data-toggle="dropdown" title="User">-->
				<!--<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>-->
    <!--        </a>-->
            
    <!--      </li>-->


        </ul>
      </div>
    </nav>
  </header>

 @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>

		</ul>
    </div>
	  &copy; 2020 <a href="#"> Astro</a>. All Rights Reserved.
  </footer>


  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

	<!-- ./side demo panel -->

	<!-- Sidebar -->

	<!-- Page Content overlay -->






</body>

</html>
