@extends('master')
@section('content')
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
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Post Graguate</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Doctoral</a>
                                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Post Doctoral</a>
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
                                    <?php $count = 0; ?>
                                    @foreach($students as $student)
                                        <?php $count = $count + 1;
                                    
                                        if($count == 1)
                                        {?>
                                            <div class="row">
                                        <?php }?>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="{{url('/$student->photo')}}" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="#" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h8><a href="#">{{$student->full_name}}</a></h8><br>
                                                    <h8><a href="#">{{$student->roll_no}}@iith.ac.in</a></h8>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($count == 4)
                                        {
                                            $count = 0;?>
                                            </div>
                                        <?php }?>
                                    @endforeach
                                    <!-- <div class="row">
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/1.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="https://www.linkedin.com/in/soham-bhatt-8b3473101" class="plus-btn" target="_blank"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Soham Bhatt</a></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/gallery/001-1-e1634807925191-edited.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h8><a href="project_details.html">SM21MTECH11003</a></h8>
                                                    <h6><a href="project_details.html">Shridharam Tiwari</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/gallery/tihan_passport_pic.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Prakriti Sahu</a></h6>
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
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/david/1.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="https://www.linkedin.com/in/soham-bhatt-8b3473101" class="plus-btn" target="_blank"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Soham Bhatt</a></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/gallery/001-1-e1634807925191-edited.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                   <h8><a href="project_details.html">SM21MTECH11003</a></h8>
                                                    <h6><a href="project_details.html">Shridharam Tiwari</a></h6>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-lg-3 col-md-3">
                                            <div class="single-project mb-30">
                                                <div class="project-img">
                                                    <img src="/img/gallery/tihan_passport_pic.jpg" alt="">
                                                </div>
                                                <div class="project-cap">
                                                    <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                    <h8><a href="project_details.html">SM21MTECH14004</a></h8>
                                                    <h6><a href="project_details.html">Prakriti Sahu</a></h6>
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
                                        </div> -->
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
