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
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="/img/hero/13.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2> Opportunites</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Careets</a></li>
                                <li class="breadcrumb-item"><a href="#"> Opportunites</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- slider Area End-->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-12 mb-lg-0">
                    <!-- <div class="blog_left_sidebar"> -->
                    @foreach($jobs as $job)    
                    <article class="blog_item">
                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2><a href=" {{$job->link}}">{{$job->title}}</a></h2>
                                </a>
                                <p>{{$job->description}}</p>
                                <ul class="blog-info-link">
                                    <li><a href="{{$job->document}}">Know More</a></li>
                                    <li><a href="#"> March 22, 2022</a></li>
                                </ul>
                            </div>
                        </article>
                    @endforeach
                        
                        <!-- <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
                        <blockquote class="generic-blockquote" style="text-align:center">
                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Get latest news from the hub</h4>
                            <p>Get new content delivered directly to your inbox.</p>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside>
</blockquote>
                    </div>
                </div>
               
    </section>
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