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
        <!-- slider Area Start-->
        <div class="slider-area ">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="/img/hero/18.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>Skill Development</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Activity</a></li>
                                    <li class="breadcrumb-item"><a href="#">Skill Development</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Services Details Start -->
      
        <div class="services-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single-services section-padding2">
                            <div class="details-img mb-40">
                            <!-- <blockquote class="generic-blockquote" style="text-align:center">
                                <h4>“ Autonomous System and Technologies ” by March 23rd to 25th March 2022</h4>
                            </blockquote>     -->
                            <img src="/img/gallery/1.webp" alt="">
                            </div>
                            <div class="details-caption" style="text-align:center">
                            <p >Registration Link: <b> <a href="https://t.ly/SRRt"> https://t.ly/SRRt</a></b></p>
                            </div>
                            <br><br>
                             <blockquote class="generic-blockquote" style="text-align:center">
                                <h4>Skill Development Programs – Workshops</h4>
                            </blockquote>
                                            <table>
                                            <thead>
                                                <tr >
                                                <th>Date & Time</th>
                                                <th>Name of Seminar/Workshop</th>
                                                <th>For More Information</th>
                                                <th>No. of Participants</th>
                                                </tr>
                                                
                                            </thead>
                                            <?php
        $total = 0;
        $total1=0;
        $start=$skills->last() ;
        $start1=$start['start_date'];
        $end = $skills[0];
        $end1=$end['end_date'];
    ?>
                                            @foreach($skills as $skill)
                        
                                            <tr id="row_skills_{{ $skill->seq_no}}">
                                                <td>{{$skill->start_date}} to {{$skill->end_date}} </td>
                                                <td>{{$skill->title}}</td>
                                                <?php
                                                 $total1 +=1;
                                                 ?>
                                                <td> <a href="{{$skill->document}}"> click here	 </a></td>
                                                <td>{{$skill->participants}}</td>
                                                <?php
                                                 $total += ($skill->participants);
                                                 ?>
                                                </tr>
                                                @endforeach    
                                                

                                                <tr id="row_skills_{{ $skill->seq_no}}">
                                                <td>{{$start1 }} to {{$end1}}  </td>
                                                <td><b>  Total Seminar/Workshop = {{$total1}}</b></td>
                                                <td> </td>
                                                <td>{{$total}}</td>
                                                <!-- total::where('participants',$participants)->sum('participants'); -->
                                                                                                </tr>
                                                </table>
                                                <br><br>
        <!-- Services Details End -->



                        </div>
                    </div>
                </div>
                
            </div>
        </div>

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