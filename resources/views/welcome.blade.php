<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Pengaduan Masyarakat</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="../../landingpage/assets/images/favicon.png" type="image/png">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="../../landingpage/assets/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="../../landingpage/assets/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="../../landingpage/assets/css/LineIcons.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="../../landingpage/assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="../../landingpage/assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="../../landingpage/assets/css/style.css">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== NAVBAR TWO PART START ======-->

    <section class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                       
                        <!-- <a class="navbar-brand" href="#">
                            <img src="../../landingpage/assets/images/logo.svg" alt="">
                        </a> -->

                        <!-- <div class="brand-logo">
                        <img src="../../images/yy2.png" style="height: 40px;
                            width: 150px;" alt="logo">
                        </div> -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item active"><a class="page-scroll" href="/">Home</a></li>
                                @if(auth()->user())
                                @if (auth()->user()->role =="admin" || auth()->user()->role == "petugas")
                                <li class="nav-item">
                                    <a class="page-scroll" href="/beranda">Dashboard</a>
                                </li>
                                @endif
                                @endif


                                <li class="nav-item"><a class="page-scroll" href="#services">TENTANG PENGMAS</a></li>
                              

                                @if(!auth()->user())
                                <li class="nav-item"><a class="page-scroll" href="{{ route('login') }}">Login</a></li>
                                @endif
                            </ul>
                        </div>
                      
                        @if(auth()->user())
                        <div class="navbar-btn d-none d-sm-inline-block">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <br/>
                            <button class="btn btn-outline-primary" style="margin-top: -30px; margin-right: -80px"><font color="white">Logout</font></button>
                        </form>
                        </div>
                        @endif
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== NAVBAR TWO PART ENDS ======-->
    
    <!--====== SLIDER PART START ======-->

    <section id="home" class="slider_area">
        <div id="carouselThree" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h5 class="title">Layanan Pengaduan Masyarakat</h5>
                                    <p class="text">Laporkan Pengaduanmu Sekarang Juga!!</p>
                                    <p class="text">Jangan Lupa Login Sebelum Melapor dan Pastikan Akunmu Sudah Terlogout Kembali Agar Tetap Terjaga!</p>
                                    <ul class="slider-btn rounded-buttons">
                                    @if(auth()->user())
                                    @if (auth()->user()->role =="masyarakat")
                                        <li><a class="main-btn rounded-one" href="/pengaduan/create">Laporkan</a></li>
                                    @endif
                                    @endif
                                        <!-- <li><a class="main-btn rounded-two" href="#">DOWNLOAD</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        <!-- row -->
                    </div> 
                    <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <!-- <img src="../../landingpage/assets/images/2.PNG" style="margin-top: -10px; margin-right: -80px"> -->
                            <img src="../../landingpage/assets/images/slider/1.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->

               <!-- row -->
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <!-- <img src="../../landingpage/assets/images/slider/2.png" alt="Hero"> -->
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->

                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h1 class="title">Based on Bootstrap 4</h1>
                                    <p class="text">We blend insights and strategy to create digital products for forward-thinking organisations.</p>
                                    <ul class="slider-btn rounded-buttons">
                                        <li><a class="main-btn rounded-one" href="#">GET STARTED</a></li>
                                        <li><a class="main-btn rounded-two" href="#">DOWNLOAD</a></li>
                                    </ul>
                                </div> <!-- slider-content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img src="../../landingpage/assets/images/slider/3.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->
            </div>

            
           
        </div>
    </section>

    <!--====== SLIDER PART ENDS ======-->
    
    <!--====== FEATRES TWO PART START ======-->

    <section id="services" class="features-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-10">
                    <h1 class="title">TENTANG PENGMAS</h1>
                        <!-- <p class="text"><h4>Cek Pengaduanmu Dibawah Ini!<h4></p> -->
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
            <section id="home" class="slider_area">
            <div id="carouselThree" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
                <li data-target="#carouselThree" data-slide-to="1"></li>
                <li data-target="#carouselThree" data-slide-to="2"></li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="single-features mt-40">
                        <div class="features-title-icon d-flex justify-content-between">
                        <div class="section-title text-center">
                        <!-- <h4 class="features-title" style="text-align-last: center;">Pengaduan Masyarakat</h4> -->
                         </div> 
                            <!-- <h4 class="features-title"><center>PENGMAS (Pengaduan Masyarakat)</center></h4> -->
                            
                            <!-- <div class="features-icon">
                                <i class="lni lni-brush"></i>
                                <img class="shape" src="../../landingpage/assets/images/f-shape-1.svg" alt="Shape">
                            </div> -->
                        </div>
                        <div class="features-content">
                            <p class="text" style="text-align-last: center;">
                                    Pengmas atau Pengaduan Masyarakat adalah Portal Laporan Pengaduan Masyarakat Online yang merupakan 
                            </p>
                            <p class="text" style="text-align-last: center;">
                                    wujud nyata dari keinginan masyarakat setempat untuk menyampaikan aspirasinya.
                            </p>
                            <p>
                            <center/>
                            <div class="brand-logo">
                            <img src="../../images/riwayat2.png" 
                                style="height: 450px;
                                   width: 700px;
                                   margin-top: 25px;" alt="logo">
                        </div>
                        </p>
                        </div>
                </div>
                
                <!-- <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features mt-40">
                        <div class="features-title-icon d-flex justify-content-between">
                            <h4 class="features-title"><a href="#">Digital Marketing</a></h4>
                            <div class="features-icon">
                                <i class="lni lni-bolt"></i>
                                <img class="shape" src="../../landingpage/assets/images/f-shape-1.svg" alt="Shape">
                            </div>
                        </div>
                        <div class="features-content">
                            <p class="text">Short description for the ones who look for something new. Short description for the ones who look for something new.</p>
                            <a class="features-btn" href="#">LEARN MORE</a>
                        </div>
                    </div>  -->
                    <!-- single features -->
                <!-- </div> -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== TEAM  ENDS ======-->
    <!--====== CONTACT PART ENDS ======-->
    <!--====== FOOTER PART START ======-->

    <section class="footer-area footer-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="footer-logo text-center">
                        <a class="mt-30" href="index.html"></a>
                    </div> <!-- footer logo -->
                    <div class="copyright text-center mt-35">
                        <p class="text">Pengaduan Masyarakat - 2023 by wulanmandam</p>
                    </div> <!--  copyright -->
                    <ul class="social text-center mt-60">
                        <li><a href="https://facebook.com/wulan.mandamsari.9"><i class="lni lni-facebook-filled"></i></a></li>
                        <li><a href="https://instagram.com/wulanmnd"><i class="lni lni-instagram-original"></i></a></li>
                        <li><a href="https://github.com/WulanMandamSari"><i class="lni lni-github-original"></i></a></li>
                    </ul> <!-- social -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->    

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="../../landingpage/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../../landingpage/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="../../landingpage/assets/js/popper.min.js"></script>
    <script src="../../landingpage/assets/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="../../landingpage/assets/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="../../landingpage/assets/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="../../landingpage/assets/js/ajax-contact.js"></script>
    
    <!--====== Isotope js ======-->
    <script src="../../landingpage/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../../landingpage/assets/js/isotope.pkgd.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="../../landingpage/assets/js/jquery.easing.min.js"></script>
    <script src="../../landingpage/assets/js/scrolling-nav.js"></script>
    
    <!--====== Main js ======-->
    <script src="../../landingpage/assets/js/main.js"></script>
    
</body>

</html>
