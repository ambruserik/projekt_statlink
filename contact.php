<?php

    require "config.php";
    ob_start();
    require "nav/navbar.php";

    if(isset($_POST['send-btn'])){
        if(isset($_COOKIE['contacting'])){
            echo "<script>alert('Már küldtél üzenetet, kérlek várj pár percet!')</script>";
        }
        else{
            $conn->query("INSERT INTO contacting VALUES(id, '$_POST[sender]', '$_POST[email]', '$_POST[phone]', '$_POST[subject]', '$_POST[text]', 'nem')");
            echo "<script>alert('Üzenet sikeresen elküldve!')</script>";
            setcookie("contacting", "true", time()+300);
        }
        
    }
?>

<!doctype html>
<html class="no-js " lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>StatLink - Kapcsolat</title>
<meta name="author" content="Ambrus Erik, Gyuricza Máté">
<meta name="description" content="StatLink - statisztikai közösség oldal">
<meta name="keywords" content="StatLink">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--==============================
  Google Fonts
============================== -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!--==============================
    All CSS File
============================== -->
<!-- Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Fontawesome Icon -->
<link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!-- Magnific Popup -->
<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
<!-- Swiper Js -->
<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
<!-- Theme Custom CSS -->
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
<!--********************************
   Start
******************************** -->



<!--==============================
Breadcumb
============================== -->
<div class="breadcumb-wrapper " data-bg-src="img_league/BIG1.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">KÖZÖSSÉG</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.html">Főoldal</a></li>
                <li>Közösség</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Contact
==============================-->
<div class="contact-page-1 space">
        <div class="contact-sec-1 space bg-repeat overflow-hidden" data-bg-src="assets/img/bg/jiji-bg2.png">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-6 pe-xxl-5">
                        <div class="title-area">
                            <h2 class="sec-title text-white">Lépj kapcsolatba velünk <span class="text-theme">!</span></h2>
                        </div>
                        <form action="contact.php" method="POST" class=" pb-xl-0 space-bottom">
                            <div class="row">
                                <div class="form-group style-border2 col-md-6">
                                    <input type="text" class="form-control" name="sender" placeholder="Feladó">
                                    <i class="fal fa-user"></i>
                                </div>
                                <div class="form-group style-border2 col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Email cím" required>
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="form-group style-border2 col-md-6">
                                    <input type="text" class="form-control" name="phone" placeholder="Telefonszám">
                                    <i class="fal fa-phone"></i>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group style-border2 col-md-6">
                                        <input type="text" class="form-control" name="subject" placeholder="Tárgy">
                                    </div>
                                </div>
                                <div class="col-12 form-group style-border2">
                                    <textarea placeholder="Üzenet írása..."  name="text" class="form-control" required></textarea>
                                    <i class="far fa-pencil"></i>
                                </div>
                                <div class="form-btn col-12">
                                    <button class="th-btn" name="send-btn">Küldés <i class="fa-solid fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                    <div class="col-xl-6 ps-xxl-5">
                        <div class="title-area">
                            <span class="sub-title style2"># Információk</span>
                        </div>
                        <div class="contact-feature">
                            <div class="contact-feature-icon icon-masking">
                                <span class="mask-icon" data-mask-src="assets/img/icon/contact-map-icon1.svg"></span>
                                <img src="assets/img/icon/contact-map-icon1.svg" alt="img">
                            </div>
                            <div class="media-body">
                                <h4 class="box-title">CÍM:</h4>
                                <a href="#" class="contact-feature_link">Budapest, Magyarország</a>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="contact-feature-icon icon-masking">
                                <span class="mask-icon" data-mask-src="assets/img/icon/contact-phone-icon1.svg"></span>
                                <img src="assets/img/icon/contact-phone-icon1.svg" alt="img">
                            </div>
                            <div class="media-body">
                                <h4 class="box-title">TELEFONSZÁM:</h4>
                                <a href="tel:16365981254" class="contact-feature_link">Mobil: +163 6598 1254</a>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="contact-feature-icon icon-masking">
                                <span class="mask-icon" data-mask-src="assets/img/icon/contact-envelope-icon1.svg"></span>
                                <img src="assets/img/icon/contact-envelope-icon1.svg" alt="img">
                            </div>
                            <div class="media-body">
                                <h4 class="box-title">EMAIL CÍM:</h4>
                                <a href="mailto:info@bame.com" class="contact-feature_link">projekt.statlink@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--==============================
Footer
==============================-->
<?php 
    ob_end_flush();
    require "nav/footer.php";
?>


<!--********************************
    End 
******************************** -->

<!-- Scroll To Top -->
<div class="scroll-top">
<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
</svg>
</div>

<!--==============================
All Js File
============================== -->
<!-- Jquery -->
<script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
<!-- Swiper Js -->
<script src="assets/js/swiper-bundle.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Magnific Popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- Counter Up -->
<script src="assets/js/jquery.counterup.min.js"></script>
<!-- Range Slider -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Isotope Filter -->
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<!-- gsap -->
<script src="assets/js/gsap.min.js"></script>

<script src="assets/js/waypoints.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/smooth-scroll.js"></script>

<!-- Main Js File -->
<script src="assets/js/main.js"></script>

</body>
</html>