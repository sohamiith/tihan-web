@extends('master')
@section('content')

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TiHAN-IIT Hyderabad</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
	<link rel="shortcut icon" type="image/x-icon" href="/img/logo/logo vector white-02.png">

	<!-- CSS here -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/slicknav.css">
        <link rel="stylesheet" href="/css/animate.min.css">
        <link rel="stylesheet" href="/css/magnific-popup.css">
        <link rel="stylesheet" href="/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="/css/themify-icons.css">
        <link rel="stylesheet" href="/css/slick.css">
        <link rel="stylesheet" href="/css/nice-select.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <link rel="stylesheet" href="/css/gijgo.css">
</head>
   <body>
    
    <main>
    <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="/img/logo/Tihan-removebg-preview.png"  alt="">
            </div>
        </div>
    </div>
</div>
        <div class="services-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single-services section-padding2">
                            <div class="details-img mb-40">
                            <blockquote class="generic-blockquote" style="text-align:center">
                                <h4> Press Releases</h4>
                            </blockquote> 
                                <!-- <img src="/img/gallery/project_details.jpg" alt=""> -->
                            </div>
                            
<div class="whole-wrap">
		<div class="container box_1170">
        @foreach($presss as $press)
			<div class="section-top-border">
            
				<h3 class="mb-30"><a href="{{$press->document}}">{{$press->title}}</a></h3>
				<div class="row">
					<div class="col-md-3">
						<img src="/img/elements/tihan-press.jpeg" alt="" class="img-fluid">
					</div>
					<div class="col-md-9 mt-sm-20">
						<p>{{$press->release_date}}<br>
                            <br><br>{{$press->description}}</p>
                            
                            <div class="header-info-right">
                                <!-- <ul class="header-social">     -->
                                    <a href="{{$press->tw_link}}"><i class="fab fa-twitter"></i></a>&nbsp;&nbsp;
                                    <a href="{{$press->insta_link}}"><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;
                                    <a href="{{$press->fb_link}}"><i class="fab fa-facebook-f"></i></a>&nbsp;&nbsp;
                                    <a href="{{$press->ld_link}}"><i class="fab fa-linkedin-in"></i></a>&nbsp;&nbsp;
                            </div>
                        </div>
                        
				</div>
                @endforeach
			</div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Details End -->
    </main>

	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./js/owl.carousel.min.js"></script>
        <script src="./js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./js/wow.min.js"></script>
		<script src="./js/animated.headline.js"></script>
        <script src="./js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./js/jquery.scrollUp.min.js"></script>
        <script src="./js/jquery.nice-select.min.js"></script>
		<script src="./js/jquery.sticky.js"></script>
               
        <!-- counter , waypoint -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="./js/jquery.counterup.min.js"></script>

        <!-- contact js -->
        <script src="./js/contact.js"></script>
        <script src="./js/jquery.form.js"></script>
        <script src="./js/jquery.validate.min.js"></script>
        <script src="./js/mail-script.js"></script>
        <script src="./js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./js/plugins.js"></script>
        <script src="./js/main.js"></script>
        
    </body>
</html>