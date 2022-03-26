@extends('master')
@section('content')
<!doctype html>
<html class="no-js" lang="zxx">
<head>
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
        <!-- slider Area Start-->
        <div class="slider-area ">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="/img/hero/1-2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>Tender Invitations</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Tender</a></li>
                                    <!-- <li class="breadcrumb-item"><a href="#">Student Details</a></li>  -->
                                    </ol>
                                </nav>
                            </div>
                        </div>
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
							<h4>Currennt Tenders</h4>
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
                        <tr>
                            <td>16-02-2022</td>
                            <td>NMICPS TiHAN Foundation invites online Tender for Supply, Installation, Commissioning and Training of “Scissor Lift”. <br>
                                <b>Tender Ref.No: TIHAN-IITH/PUR/2021/T029</b></td>
                            <td> <a href="#"> Tender File </a></td>
                            <td>09-03-2022</td>
                            </tr>
                            
                            </table>
                            <br><br>
                            <a href="/archives-tender"> Archives</a></p>
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