<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Meta -->
    <title>Landing | BKita</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('landing/images/apple-touch-icon.png') }}">

	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">

    <!-- Custom & Default Styles -->
	<link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/style.css') }}">

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
	<![endif]-->

</head>
<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{ asset('landing/images/loader.gif') }}" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="What you are looking for?" required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

        <header class="header">
            <div class="topbar clearfix">
                <div class="container">
                    <div class="row-fluid">
                        <div class="col-md-6 col-sm-6 text-left">
                            <p>
                                <strong><i class="fa fa-phone"></i></strong> +90 543 123 45 67 &nbsp;&nbsp;
                                <strong><i class="fa fa-envelope"></i></strong> <a href="mailto:#">info@yoursite.com</a>
                            </p>
                        </div><!-- end left -->
                        <div class="col-md-6 col-sm-6 hidden-xs text-right">
                            <div class="social">
                                <a class="facebook" href="#" data-tooltip="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a class="twitter" href="#" data-tooltip="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a class="google" href="#" data-tooltip="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                <a class="linkedin" href="#" data-tooltip="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                <a class="pinterest" href="#" data-tooltip="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            </div><!-- end social -->
                        </div><!-- end left -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end topbar -->

            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo-normal">
                            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="" width="50"></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.html">Home</a></li>
                            <li class="dropdown yamm-fw yamm-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle active">Mega Menu <b class="fa fa-angle-down"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="yamm-content clearfix">
                                            <div class="row-fluid">
                                                <div class="col-md-6 col-sm-6">
                                                    <h4>Course Pages</h4>
                                                    <ul>
                                                        <li><a href="#">Courses Name 01</a></li>
                                                        <li><a href="#">Courses Name 02</a></li>
                                                        <li><a href="#">Courses Name 03</a></li>
                                                        <li><a href="#">Courses Name 04</a></li>
                                                        <li><a href="#">Courses Name 05</a></li>
                                                        <li><a href="#">Courses Name 06</a></li>
                                                        <li><a href="#">Courses Name 07</a></li>
                                                        <li><a href="#">Courses Name 08</a></li>
                                                        <li><a href="#">Courses Name 09</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="menu-widget text-center">
                                                        <div class="image-wrap entry">
                                                            <img src="{{ asset('landing/upload/course_01.jpg') }}" alt="" class="img-responsive">
                                                            <div class="magnifier">
                                                                 <a href="#" title=""><i class="flaticon-add"></i></a>
                                                            </div>
                                                        </div><!-- end image-wrap -->
                                                        <h5><a href="#">Learning Bootstrap Framework</a></h5>
                                                        <small>$22.00</small>
                                                        <a href="#" class="menu-button">View Course</a>
                                                    </div><!-- end widget -->
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="events.html">Events</a></li>
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shop <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="shop.html">Shop Layout</a></li>
                                    <li><a href="shop-single.html">Shop Single</a></li>
                                </ul>
                            </li>
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="blog.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-1.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-2.html">Blog Grid Sidebar</a></li>
                                    <li><a href="blog-3.html">Blog Grid Fullwidth</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="page-contact.html">Contact</a></li>
                            <li class="iconitem"><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-search"></i></a></li>
                            <li class="iconitem"><a class="btn btn-primary" href="/login">Login / Masuk</a></li>
                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>

        <section id="home" class="video-section js-height-full">
            <div class="overlay"></div>
            <div class="home-text-wrapper relative container">
                <div class="home-message">
                    <p>Learning Management System</p>
                    <small>Edulogy is the ideal choice for your organization, your business and your online education system. Create your online course now with unlimited page templates, color options, and menu features.</small>
                    <div class="btn-wrapper">
                        <div class="text-center">
                            <a href="#" class="btn btn-primary wow slideInLeft">Read More</a> &nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-default wow slideInRight">Buy Now</a>
                        </div>
                    </div><!-- end row -->
                </div>
            </div>
            <div class="slider-bottom">
                <span>Explore <i class="fa fa-angle-down"></i></span>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 hidden-sm hidden-xs">
                        <div class="custom-module">
                            <img src="{{ asset('landing/upload/device_01.png') }}" alt="" class="img-responsive wow slideInLeft">
                        </div><!-- end module -->
                    </div><!-- end col -->
                    <div class="col-md-8">
                        <div class="custom-module p40l">
                            <h2>We are a passionate <mark>learning system</mark> from<br>
                            London. Do beautiful and easy-to-use digital <br>
                            design & web development</h2>

                            <p>Nam dictum sem, ipsum aliquam . Etiam sit amet fringilla lacus. Pellentesque suscipit ante at ullamcorper pulvinar neque porttitor. Integer lectus. Praesent sed nisi eleifend, fermentum orci amet, iaculis libero.</p>

                            <hr class="invis">

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 first">
                                    <ul class="check">
                                        <li>Custom Shortcodes</li>
                                        <li>Visual Page Builder</li>
                                        <li>Unlimited Shortcodes</li>
                                        <li>Responsive Theme</li>
                                        <li>Tons of Layouts</li>
                                    </ul><!-- end check -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <ul class="check">
                                        <li>Font Awesome Icons</li>
                                        <li>Pre-Defined Colors</li>
                                        <li>AJAX Transitions</li>
                                        <li>High Quality Support</li>
                                        <li>Unlimited Options</li>
                                    </ul><!-- end check -->
                                </div><!-- end col-lg-4 -->
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 last">
                                    <ul class="check">
                                        <li>Shopping Layouts</li>
                                        <li>Pre-Defined Fonts</li>
                                        <li>Style Changers</li>
                                        <li>Footer Styles</li>
                                        <li>Header Styles</li>
                                    </ul><!-- end check -->
                                </div><!-- end col-lg-4 -->
                            </div><!-- end row -->

                            <hr class="invis">

                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-primary">Learn More About us</a>
                            </div>

                        </div><!-- end module -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <section class="section gb">
            <div class="container">
                <div class="section-title text-center">
                    <h3>Recent Courses</h3>
                    <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                </div><!-- end title -->

                <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('landing/upload/course_01.jpg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>Javascript</small>
                                    <a href="#" title="">Modern JavaScript Linting With ESLint</a>
                                </h4>
                                <p>Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.</p>
                            </div><!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-user"></i> 21</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 15 Min.</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$22.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('landing/upload/course_02.jpg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>Design</small>
                                    <a href="#" title="">Designing Game UI Assets in Adobe Illustrator</a>
                                </h4>
                                <p>Curabitur condimentum velit non odio mattis tristique. Nam vitae orci aliquam. </p>
                            </div><!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-user"></i> 41</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 33 Min.</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$55.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('landing/upload/course_03.jpg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>PHP Coding</small>
                                    <a href="#" title="">How to Become a Web Developer: Learn PHP</a>
                                </h4>
                                <p>Donec auctor nec nibh sit amet pulvinar. Mauris nulla elit, lacinia ac facilisis mattis.</p>
                            </div><!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-user"></i> 35</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 1 Hrs.</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$51.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('landing/upload/course_04.jpg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>PHP Coding</small>
                                    <a href="#" title="">How to Build a Custom Theme for Drupal 8</a>
                                </h4>
                                <p>Pellentesque ut enim dictum, interdum lorem eget, vulputate eros sed felis euismod.</p>
                            </div><!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-user"></i> 35</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 45 Min.</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$51.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('landing/upload/course_01.jpg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small>Javascript</small>
                                    <a href="#" title="">Modern JavaScript Linting With ESLint</a>
                                </h4>
                                <p>Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.</p>
                            </div><!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-user"></i> 21</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 15 Min.</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$22.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis">

                <div class="section-button text-center">
                    <a href="#" class="btn btn-primary">View All Courses</a>
                </div>
            </div><!-- end container -->
        </section>

        <section class="section">
            <div class="container">
                <div class="section-title text-center">
                    <h3>Testimonials</h3>
                    <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                </div><!-- end title -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="box testimonial">
                            <p class="testiname"><strong><img src="{{ asset('landing/upload/testimonial_01.png') }}" alt="" class="img-circle"> Jenny LUXURY</strong></p>
                            <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div><!-- end testimonial -->
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="box testimonial">
                            <p class="testiname"><strong><img src="{{ asset('landing/upload/testimonial_02.png') }}" alt="" class="img-circle"> Martin LEO</strong></p>
                            <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div><!-- end testimonial -->
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="box testimonial">
                            <p class="testiname"><strong><img src="{{ asset('landing/upload/testimonial_03.png') }}" alt="" class="img-circle"> John DOE</strong></p>
                            <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div><!-- end testimonial -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <section class="section gb">
            <div class="container">
                <div class="section-title text-center">
                    <h3>Recent News</h3>
                    <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                </div><!-- end title -->

                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="blog-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('landing/upload/blog_01.jpeg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->

                            <div class="blog-desc">
                                <h4><a href="blog-single.html">How to learn perfect code with Javascript</a></h4>
                                <p>Praesent at suscipit ligula. Suspendisse pre neque, quis suscipit enim. sed maximus, mia auctor.</p>
                            </div><!-- end blog-desc -->

                            <div class="post-meta">
                                <ul class="list-inline">
                                    <li><a href="#">21 March 2017</a></li>
                                    <li><a href="#">by WP Destek</a></li>
                                    <li><a href="#">14 Share</a></li>
                                </ul>
                            </div><!-- end post-meta -->
                        </div><!-- end blog -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12">
                        <div class="blog-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('landing/upload/blog_02.jpeg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->

                            <div class="blog-desc">
                                <h4><a href="blog-single.html">The most suitable web design & development tutorials</a></h4>
                                <p>Sed suscipit neque in erat posuere tristique aliquam porta vestibulum. Cras placerat tincidunt. </p>
                            </div><!-- end blog-desc -->

                            <div class="post-meta">
                                <ul class="list-inline">
                                    <li><a href="#">20 March 2017</a></li>
                                    <li><a href="#">by WP Destek</a></li>
                                    <li><a href="#">11 Share</a></li>
                                </ul>
                            </div><!-- end post-meta -->
                        </div><!-- end blog -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12">
                        <div class="blog-box">
                            <div class="image-wrap entry">
                                <img src="{{ asset('landing/upload/blog_03.jpeg') }}" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->

                            <div class="blog-desc">
                                <h4><a href="blog-single.html">Design for all mobile devices! This is name "responsive"</a></h4>
                                <p>Suspendisse scelerisque ex ac mattis molestie vel enim ut massa placerat faucibus sed ut dui vivamus. </p>
                            </div><!-- end blog-desc -->

                            <div class="post-meta">
                                <ul class="list-inline">
                                    <li><a href="#">19 March 2017</a></li>
                                    <li><a href="#">by WP Destek</a></li>
                                    <li><a href="#">44 Share</a></li>
                                </ul>
                            </div><!-- end post-meta -->
                        </div><!-- end blog -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <section class="section bgcolor1">
            <div class="container">
                <a href="#">
                <div class="row callout">
                    <div class="col-md-4 text-center">
                        <h3><sup>$</sup>49.99</h3>
                        <h4>Start your awesome course today!</h4>
                    </div><!-- end col -->

                    <div class="col-md-8">
                        <p class="lead">Limited time offer! Your profile will be added to our "Students" directory as well. </p>
                    </div>
                </div><!-- end row -->
                </a>
            </div><!-- end container -->
        </section>

        <footer class="section footer noover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="widget clearfix">
                            <h3 class="widget-title">Subscribe Our Newsletter</h3>
                            <div class="newsletter-widget">
                                <p>You can opt out of our newsletters at any time.<br> See our <a href="#">privacy policy</a>.</p>
                                <form class="form-inline" role="search">
                                    <div class="form-1">
                                        <input type="text" class="form-control" placeholder="Enter email here..">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </form>
                                <img src="{{ asset('landing/images/payments.png') }}" alt="" class="img-responsive">
                            </div><!-- end newsletter -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-3">
                        <div class="widget clearfix">
                            <h3 class="widget-title">Join us today</h3>
                            <p>Would you like to earn your profits by joining our team? Join us without losing time.</p>
                            <a href="#" class="readmore">Became a Teacher</a>
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-3">
                        <div class="widget clearfix">
                            <h3 class="widget-title">Popular Tags</h3>
                            <div class="tags-widget">
                                <ul class="list-inline">
                                    <li><a href="#">course</a></li>
                                    <li><a href="#">web design</a></li>
                                    <li><a href="#">development</a></li>
                                    <li><a href="#">language</a></li>
                                    <li><a href="#">teacher</a></li>
                                    <li><a href="#">speaking</a></li>
                                    <li><a href="#">material</a></li>
                                    <li><a href="#">css3</a></li>
                                    <li><a href="#">html</a></li>
                                    <li><a href="#">learning</a></li>
                                </ul>
                            </div><!-- end list-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-2 col-md-2">
                        <div class="widget clearfix">
                            <h3 class="widget-title">Support</h3>
                            <div class="list-widget">
                                <ul>
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Copyrights</a></li>
                                    <li><a href="#">Create a Ticket</a></li>
                                    <li><a href="#">Pricing & Plans</a></li>
                                    <li><a href="#">Carrier</a></li>
                                    <li><a href="#">Trademark</a></li>
                                </ul>
                            </div><!-- end list-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="copyrights">
            <div class="container">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="cop-logo">
                            <a href="#"><img src="{{ asset('landing/images/logo.png') }}" alt=""></a>
                        </div>
                    </div>

                    <div class="pull-right">
                        <div class="footer-links">
                            <ul class="list-inline">
                                <li>Design : <a href="https://html.design">HTML.Design</a></li>
                                <li>Distributed by : <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end container -->
        </div><!-- end copy -->
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/carousel.js') }}"></script>
    <script src="{{ asset('landing/js/animate.js') }}"></script>
    <script src="{{ asset('landing/js/custom.js') }}"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="{{ asset('landing/js/videobg.js') }}"></script>

</body>
</html>
