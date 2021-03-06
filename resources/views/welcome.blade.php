<!-- @extends('master') -->
@section('content')
<!DOCTYPE html>
<html>
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
        <div class="slider-active">
            <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="/img/hero/5.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="hero__caption">
                                <div class="hero-text1">
                                   <a href="https://nmicps.gov.in/Home/TechnologyVertical/TechnologyVertical?HostInstitueid=NQ=="> <span data-animation="fadeInUp" data-delay=".3s" >DST NM-ICPS</span></a>
                                </div>
                                <h1 data-animation="fadeInUp" data-delay=".5s">T<span style="text-transform:lowercase">i</span>HAN</h1>
                                <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                    <h2>IIT Hyderabad</h2>
                                    <h2>IIT Hyderabad</h2>  
                                </div>
                                <!-- <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                   <span><a href="services.html">Our Services</a></span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="/img/hero/4.jpeg">
                <div class="container">
                    <div class="row">   
                        <div class="col-lg-11">
                            <div class="hero__caption">
                                <div class="hero-text1">
                                    <span data-animation="fadeInUp" data-delay=".3s">DST NM-ICPS</span>
                                </div>
                                <h1 data-animation="fadeInUp" data-delay=".5s">T<span style="text-transform:lowercase">i</span>HAN</h1>
                                <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                    <h2>IIT Hyderabad</h2>
                                    <h2>IIT Hyderabad</h2>
                                </div>
                                <!-- <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                    <span><a href="services.html">Our Services</a></span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="/img/hero/6.jpg">
                <div class="container">
                    <div class="row">   
                        <div class="col-lg-11">
                            <div class="hero__caption">
                                <div class="hero-text1">
                                    <span data-animation="fadeInUp" data-delay=".3s">DST NM-ICPS</span>
                                </div>
                                <h1 data-animation="fadeInUp" data-delay=".5s">T<span style="text-transform:lowercase">i</span>HAN</h1>
                                <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                    <h2>IIT Hyderabad</h2>
                                    <h2>IIT Hyderabad</h2>
                                </div>
                                <!-- <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                    <span><a href="services.html">Our Services</a></span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- slider Area End-->
    <!-- Services Area Start -->
    <div class="services-area1 section-padding30">
        <div class="container">
            <!-- section tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-55">
                        <div class="front-text">
                            <h2 class="">Latest Events </h2>
                        </div>
                        <span class="back-text">Latest Events</span>
                    </div>
                </div>
            </div>

            
            <div class="row">
            @foreach($events as $event)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    
                    <div class="single-service-cap mb-30">

                        <div class="service-img">

                            <img src="{{$event->url}}" alt="">
                        </div>

                        <div class="service-cap">
                            <h4><a href="{{$event->doc}}">{{$event->title}} </a></h4>
                            <a href="{{$event->doc}}" class="more-btn">Read More <i class="ti-plus"></i></a>
                        </div> 

                        <div class="service-icon">
                            <img src="/img/icon/services_icon1.png" alt="">  
                        </div>
                        
                    </div>

                </div>
                @endforeach  
</div>
                <!-- <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-service-cap mb-30">
                        <div class="service-img">
                            <img src="/img/service/servicess2.png" alt="">
                        </div>
                        <div class="service-cap">
                            <h4><a href="https://tihan.iith.ac.in/2021/12/30/4160/">TiHAN Skill Development Call for Proposal</a></h4>
                            <a href="https://tihan.iith.ac.in/2021/12/30/4160/" class="more-btn">Read More <i class="ti-plus"></i></a>
                        </div>
                        <div class="service-icon">
                            <img src="/img/icon/services_icon1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-service-cap mb-30">
                        <div class="service-img">
                            <img src="/img/service/servicess1.png" alt="">
                        </div>
                        <div class="service-cap">
                            <h4><a href="https://itic.iith.ac.in/ottonomo22/">OTTONOMO???23 Grand Challenge </a></h4>
                            <a href="https://itic.iith.ac.in/ottonomo22/" class="more-btn">Read More <i class="ti-plus"></i></a>
                        </div>
                        <div class="service-icon">
                            <img src="/img/icon/services_icon1.png" alt="">
                        </div>
                    </div>
                </div> -->
                
                
                
                
            </div>
        </div>
    </div>
    <!-- Services Area End -->
    <!-- About Area Start -->
    <section class="support-company-area fix pt-10">
        <div class="support-wrapper align-items-end">
            <div class="left-content">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 class="">Who we are</h2>
                    </div>
                    <span class="back-text">About us</span>
                </div>
                <div class="support-caption"style="padding-bottom:20px;">
                    <p class="pera-top">Technology Innovation Hub on Autonomous Navigation and Data Acquisition Systems (UAVs, ROVs, etc.) at IIT Hyderabad</p>
                    <p>Department of Science and Technology (DST) under the National Mission on Interdisciplinary Cyber-Physical Systems (NM-ICPS), Govt. of India has sanctioned the prestigious Technology Innovation Hub to IIT Hyderabad in the technological vertical of Autonomous Navigation and Data Acquisition Systems (UAVs, ROVs, etc.)

                        <br><br>TiHAN is recognized as a Scientific and Industrial Research Organization (SIRO) by the Department of Scientific and Industrial Research .
                        
                        <br><br>The vision of this hub is to become a global destination for next generation smart mobility technologies that utilize reliable and efficient autonomous navigation and data acquisition systems in the next five years. The mission of this hub is to accelerate the adoption of the autonomous navigation and next generation smart mobility technologies for use in the intelligent transportation and agricultural applications, not only in the Indian but also in global context.
                        
                        </p>
                    <a href="/About-us-Foundation" class="btn red-btn2" >read more</a>
                </div>
            </div>
            <div class="right-content"style="padding-bottom:100px;">
                <!-- img -->
                <div class="right-img" >
                    <img src="/img/gallery/4.jpg" alt="">
                </div>
                <div class="support-img-cap text-center">
                    <span>2020</span>
                    <p>Since</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->


<!-- contact with us Start -->
<section class="contact-with-area" data-background="/img/gallery/section-bg2.jpg">
<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-9 offset-xl-1 offset-lg-1">
            <div class="contact-us-caption">
                <div class="team-info mb-30 pt-45">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle4" style="text-align: center;">
                        <div class="front-text">
                            <h2 class="">Primary Objective of Hub  </h2>
                        </div>
                        <span class="back-text">Primary Goal</span>
                    </div>
                    <p>DST NM-ICPS Technology Innovation Hub on Autonomous Navigation and Data Acquisition Systems (UAVs, ROVs, etc.) ??? TiHAN at IIT Hyderabad will be the source for fundamental knowledge and technologies (IPs, Publications, Products, Commercialization as Licensing, ToTs???) in the technology vertical of Autonomous Navigation and Data Acquisition Systems (UAVs, ROVs, etc.)</p>
                    <p>Primary focus includes:<br><br>
                        <span>&#8226;</span>  Research & Technology development in the area of Autonomous Navigation and Data Acquisition Systems  (UAVs, RoVs)<br>
                        <span>&#8226;</span>  Industry Collaborations<br>
                        <span>&#8226;</span>  Human resource & Skill development:<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>&#8226;</span> Fellowships for Postdocs, PhDs, Masters, Research Staff, Internships<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>&#8226;</span> Chair Professors, Faculty Fellowships, Fellows of Hub, Visiting Faculty<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span>&#8226;</span> New Academic Programs, Workshops, Symposia, Conferencess<br>
                        <span>&#8226;</span> Innovation, Entrepreneurship & Start-up Ecosystem ??? Start-ups and  Incubation in the Technology Vertical, Attracting Private Funding (CSR, VCs and equity based), Technology Commercialization, Accelerator Programs for Early-stage Startups, Promotional Outreach<br>
                        <span>&#8226;</span> International Collaborations ??? Academia & Industry, Faculty/Student Exchange Programs<br>
                    </p>
                    <p>Especially, the R&D focuses on addressing the challenges in realizing the adoption of autonomous vehicles and navigation systems (UAVs, ROVs, etc.) in real-time use cases. The hub aims at translational technology research and development along with commercialization in the areas of autonomous navigation and data acquisition systems. The broad application sectors of the hub include Autonomous Transportation Systems, Agriculture, Infrastructure, Surveillance and Environmental.</p>
                    <p style="text-align: center;"><a href="" class="white-btn">Primary Objectives of the DST NM-ICPS TiHAN at IIT Hyderabad</a>
                    <div class="project-img" >
                        <img src="/img/gallery/image-1.png" class="img-fluid" alt="">
                    </div> 
                </p> 
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- contact with us End-->

<!-- CountDown Area Start -->
<div class="count-area">
<div class="container">
    <div class="count-wrapper count-bg" data-background="/img/gallery/section-bg3.jpg">
        <div class="row justify-content-center" >
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="count-clients">
                    <div class="single-counter">
                        <div class="count-number">
                            <span class="counter">24</span>
                        </div>
                        <div class="count-text">
                            <p>Industrial</p>
                            <h5>Workshops</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="count-clients">
                    <div class="single-counter">
                        <div class="count-number">
                            <span class="counter">39</span>
                        </div>
                        <div class="count-text">
                            <p>Research</p>
                            <h5>Publications</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="count-clients">
                    <div class="single-counter">
                        <div class="count-number">
                            <span class="counter">08</span>
                        </div>
                        <div class="count-text">
                            <p>R & D</p>
                            <h5>Collaborators </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- CountDown Area End -->

    <!-- Project Area Start -->
    <section class="project-area  section-padding30">
        <div class="container">
           <div class="project-heading mb-35">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3">
                            <div class="front-text">
                                <h2 class="">Our Projects</h2>
                            </div>
                            <span class="back-text">Gallery</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="properties__button">
                            
                        </div>
                    </div>
                </div>
           </div>
            <div class="row">
                <div class="col-12">
                    <!-- Nav Card -->
                    <div class="tab-content active" id="nav-tabContent">
                        <!-- card ONE -->
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                            <div class="project-caption">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="/img/gallery/slide6-1.webp" alt="">
                                            </div>
                                            <!-- <div class="project-cap">
                                                <a href="/img/gallery/slide6-1.webp" class="plus-btn"><i class="ti-plus"></i></a>
                                                
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="/img/gallery/slide5-1.webp" alt="">
                                            </div>
                                            <!-- <div class="project-cap">
                                                <a href="" class="plus-btn"><i class="ti-plus"></i></a>
                                               
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="/img/gallery/slide4-1.webp" alt="">
                                            </div>
                                            <!-- <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                               
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="/img/gallery/slide3-1.webp" alt="">
                                            </div>
                                            <!-- <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                                                           </div> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="/img/gallery/slide2-3.webp" alt="">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="/img/gallery/slide1-3.webp" alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </section>
    <!-- Project Area End -->
   
   
    
    <!-- Testimonial Start -->
    <div class="testimonial-area t-bg testimonial-padding">
        <div class="container ">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle6 mb-50">
                        <div class="front-text">
                            <h2 class="">Testimonial</h2>
                        </div>
                        <span class="back-text">Feedback</span>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-xl-10 col-lg-11 col-md-10 offset-xl-1">
                    <div class="h1-testimonial-active">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                             <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <!-- SVG icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"width="86px" height="63px">
                                    <path fill-rule="evenodd"  stroke-width="1px" stroke="rgb(255, 95, 19)" fill-opacity="0" fill="rgb(0, 0, 0)"
                                    d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z"/>
                                    </svg>
                                    <p>The establishment of Technology Innovation Hubs(TIHs) is a crucial milestone for policy in research funding. TiHAN is a testament to the funding progress for academic projects: the advancement in the quality and the timeliness of the deliverables with the continuous engagement of eminent technical experts and senior administrators with the project Pls</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                   <div class="founder-text">
                                        <span> Dr. Balaji Raman, Associate Professor,</span>
                                        <p>Associate Dean (Industry Engagement), Chairman Placements</p>
                                        <p>Indian Institute of Information Technology Sri City</p>
                                   </div>
                                </div>
                            </div>
                        </div>


                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                             <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <!-- SVG icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"width="86px" height="63px">
                                    <path fill-rule="evenodd"  stroke-width="1px" stroke="rgb(255, 95, 19)" fill-opacity="0" fill="rgb(0, 0, 0)"
                                    d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z"/>
                                    </svg>
                                    <p>"IIITDM Kancheepuram is developing Visibility Enhancement Algorithms for Vision Intelligence System based on Environment Visibility Conditions  for Unmanned Air Vehicles (UAVs) navigation. TiHAN IIT Hyderabad helped us to perform psychovisual experiments at IIT Hyderabad and benefited to set up a Multimedia processing lab at IIITDM Kancheepuram."</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                   <div class="founder-text">
                                        <span>  Dr. Appina, Associate Professor,</span>
                                        <p> Department of Electronics and Communication Engineering</p>
                                        <p>Indian Institute of Information Technology, Design and Manufacturing Kancheepuram</p>
                                   </div>
                                </div>
                            </div>
                        </div>


                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                             <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <!-- SVG icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"width="86px" height="63px">
                                    <path fill-rule="evenodd"  stroke-width="1px" stroke="rgb(255, 95, 19)" fill-opacity="0" fill="rgb(0, 0, 0)"
                                    d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z"/>
                                    </svg>
                                    <p>"Outstanding support by TiHAN, IIT Hyderabad team. Excellent presentation by Dr.GVV Sharma sir and outstanding demonstration by team members." <br> It's a good opportunity to experience a live workshop. </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                   <div class="founder-text">
                                        <span>Skill Development Program Workshop on UAV & UGV</span>
                                        <!-- <p>Co Founder</p> -->
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!--latest Nnews Area start -->
    <div class="latest-news-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle7 mb-50">
                        <div class="front-text">
                            <h2 class="">latest news</h2>
                        </div>
                        <span class="back-text">Our Blog</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <!-- single-news -->
                    <div class="single-news mb-30">
                        <div class="news-img">
                            <!-- <img src="/img/david/david_1.png" alt="">
                            <div class="news-date text-center">
                                <span>24</span>
                                <p>Now</p>
                            </div> -->
                        </div>
                        <div class="news-caption">
                            <ul class="david-info">
                                <li> | &nbsp; &nbsp; Field Fellow</li>
                            </ul>
                            <h2><a href="#">Applications are invited for the post of field fellow Job Responsibilities ??? Assist in all technical & maintenance activities in the testbed ???</a></h2>
                            <a href="/careers" class="d-btn">Read more ??</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <!-- single-news -->
                    <div class="single-news mb-30">
                        <div class="news-img">
                            <!-- <img src="/img/david/david_2.png" alt=""> -->
                            <div class="news-date text-center">
                                <!-- <span>24</span>
                                <p>Now</p> -->
                            </div>
                        </div>
                        <div class="news-caption">
                            <ul class="david-info">
                                <li> | &nbsp; &nbsp;  Startup Manager</li>
                            </ul>
                            <h2><a href="#">The primary focus on : Develop overall program strategy, including new initiatives, criteria for participation and details of the offering. Identifying potential Corporates / Enterprises in investing in TiHAN???s Start-ups. </a></h2>
                            <a href="/careers" class="d-btn">Read more ?? </a>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <!--latest News Area End -->

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