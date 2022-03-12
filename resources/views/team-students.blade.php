@extends('master')
@section('content')
<!doctype html>
<html class="no-js" lang="zxx">
   <body>
    <main>
        <!-- slider Area Start-->
        <div class="slider-area ">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="/img/hero/7-1.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>TiHAN Student Details</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Team</a></li>
                                    <li class="breadcrumb-item"><a href="#">Student Details</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="project-area  section-padding30">
            <div class="container">
               <div class="project-heading mb-35">
                    <div class="row align-items-end">
                        <div class="col-lg-5">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle3">
                                <div class="front-text">
                                    <h2 class="">Our Students</h2>
                                </div>
                                <!-- <span class="back-text">Gellary</span> -->
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="properties__button">
                                <!--Nav Button  -->                                            
                                <nav> 
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false"> Show  all </a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Post Graguate</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Doctoral</a>
                                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Post Doctoral</a>
                                        <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Aluminis</a>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
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
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/1.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Soham Bhatt</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/2.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h8><a href="project_details.html">SM21MTECH11001</a></h8>
                                                    <h6><a href="project_details.html">Lakshmi Gayathri Gudupudi</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card TWO -->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="project-caption">
                                    <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/1.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Soham Bhatt</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/2.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h8><a href="project_details.html">SM21MTECH11001</a></h8>
                                                    <h6><a href="project_details.html">Lakshmi Gayathri Gudupudi</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Card THREE -->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="project-caption">
                                    <div class="row">
                                        <<div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/1.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Soham Bhatt</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/2.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h8><a href="project_details.html">SM21MTECH11001</a></h8>
                                                    <h6><a href="project_details.html">Lakshmi Gayathri Gudupudi</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card FUR -->
                            <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                <div class="project-caption">
                                    <div class="row">
                                    <<div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/1.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Soham Bhatt</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/2.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h8><a href="project_details.html">SM21MTECH11001</a></h8>
                                                    <h6><a href="project_details.html">Lakshmi Gayathri Gudupudi</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card FIVE -->
                            <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                                <div class="project-caption">
                                    <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/1.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Soham Bhatt</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/2.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h8 ><a href="project_details.html">SM21MTECH11001</a></h8>
                                                    <h6><a href="project_details.html">Lakshmi Gayathri Gudupudi</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- End Nav Card -->
                    </div>
                </div>
            </div>
        </section>
</main>
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
</hht