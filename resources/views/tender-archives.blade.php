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


<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>
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

         <!-- Services Details Start -->
         <div class="services-details-area" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single-services section-padding2">
                            <div class="details-caption">
                                
                        <blockquote class="generic-blockquote">
							<h4>Archive Tenders</h4>
						</blockquote>
                        <table>
                        <thead>
                            <tr>
                            <th>Start Date</th>
                            <th>Description</th>
                            <th>Documents</th>
                            <th>End Date</th>
                            </tr>
                        </thead>
                        @foreach($tenders as $tender)
                        @if($tender->end_date <= date('Y-m-d'))
                        <tr id="row_tenders_{{ $tender->seq_no}}">
                            <td>{{$tender->start_date}}</td>
                            <td>{{$tender->description}}</td>
                            <td> <a href="{{$tender->document}}"> Tender File </a></td>
                            <td>{{$tender->end_date}}</td>
                            </tr>
                        @endif
                        @endforeach
                            
                            </table>
                            <br><br>
                                
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Details End -->
<!-- JS here -->
<script>
        $(window).on('load', function () {
        $('#loading').hide();
         }) 
    </script>
	
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