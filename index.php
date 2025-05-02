<?php

    require "config.php";
    require "nav/navbar.php";

    $belep = false;
    if(isset($_COOKIE['id'])){
        $belep = true;
    }

    if($belep == true){
        $lekerdezes = "SELECT * FROM users WHERE id=$_COOKIE[id]";
        $talalt_felh = $conn->query($lekerdezes);
        $felh = $talalt_felh->fetch_assoc();
    }

    //Kilépés
    if(isset($_GET['logout'])){
        setcookie("id", "", time()+3600, "/");
        header("Location: index.php");
    }
?>

<!doctype html>
<html class="no-js " lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>StatLink - főoldal</title>
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

    <!-- hibak -->
    <link rel="stylesheet" href="ownCS/index_hibak.css">

</head>

<body>
<!--********************************
   	Code Start From Here 
******************************** -->

<!--==============================
Hero Area
==============================-->
    <div class="th-hero-wrapper hero-1" id="hero" data-bg-src="img_league/BIG2.jpg">
        <div class="container">
            <div class="hero-style1 text-center">
                <span class="sub-title custom-anim-top wow animated" data-wow-duration="1.2s" data-wow-delay="0.1s">#1 Analízis Weboldal</span>
                <h1 class="hero-title">
                    <span class="title1 custom-anim-top wow animated" data-wow-duration="1.1s" data-wow-delay="0.3s" data-bg-src="assets/img/hero/hero-title-bg-shape1.svg">JÁTÉKOSOK VILÁGA</span>
                    <span class="title2 custom-anim-top wow animated" data-wow-duration="1.1s" data-wow-delay="0.4s">LEAGUE OF LEGENDS</span>
                </h1>
                <div class="btn-group custom-anim-top wow animated" data-wow-duration="1.2s" data-wow-delay="0.7s">
                    <a class="th-btn"><button type="button" style="color: black; font-weight: bold" class="simple-icon searchBoxToggler"><i class="far fa-search"></i> Játékos keresése</button></a>
                    <a href="esports.php" class="th-btn">Esport játékosok</a>
                </div>
            </div>
        </div>
    </div>
<!--======== / Hero Section ========-->

<!--==============================
    Gallery Area  
==============================-->
    <div class="container-fluid p-0 divKisebb">
        <div class="gallery-area-1 overflow-hidden text-center">
            <div class="slider-area gallery-slider1">
                <div class="swiper th-slider" id="gallerySlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}},"effect":"coverflow","coverflowEffect":{"rotate":"0","stretch":"0","depth":"150","modifier":"1"},"centeredSlides":"true"}'>
                    <div class="swiper-wrapper">
<!--==============================
    Gallery Area  
==============================-->
                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/awaken/bg1.png" alt="img">
                                <a href="img_league/awaken/bg1.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>


                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/awaken/bg2.png" alt="img">
                                <a href="img_league/awaken/bg2.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>

                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/awaken/bg3.png" alt="img">
                                <a href="img_league/awaken/bg3.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>

                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/warriors/bg1.png" alt="img">
                                <a href="img_league/warriors/bg1.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>

                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/warriors/bg2.png" alt="img">
                                <a href="img_league/warriors/bg2.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>

                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/warriors/bg6.png" alt="img">
                                <a href="img_league/warriors/bg6.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>

                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/warriors/bg7.png" alt="img">
                                <a href="img_league/warriors/bg7.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>

                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/warriors/bg8.png" alt="img">
                                <a href="img_league/warriors/bg8.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>

                        <div class="swiper-slide gallery-wrap1">
                            <div class="th-video meret808">
                                <img src="img_league/warriors/bg9.png" alt="img">
                                <a href="img_league/warriors/bg9.png" class="play-btn popup-image style3"><i class="fa-solid fa-arrow-up-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <button data-slider-prev="#gallerySlider1" class="slider-arrow slider-prev"><i class="fas fa-angle-left"></i></button>
                <button data-slider-next="#gallerySlider1" class="slider-arrow slider-next"><i class="fas fa-angle-right"></i></button>
            </div>
        </div>
    </div>
    
<!--==============================
Team Area  
==============================-->
<section class="team-sec-1 space-top">
<div class="team-shape1-1 shape-mockup hero-1" data-top="0" data-right="0"><img src="img_league/BIG3.jpg" alt="img"></div>
    <div class="container th-container3">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="title-area text-center custom-anim-top wow animated" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <span class="sub-title">Esport Játékosok - Mini Profilok</span>
                    <h2 class="sec-title">Nézzük mi vár rád!</h2>
                </div>
            </div>
        </div>
        <div class="slider-area team-slider1">
            <div class="swiper th-slider has-shadow" id="teamSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"}}}'>
                <div class="swiper-wrapper">
                    <?php
                    $lekerdezes = "SELECT * FROM esports ORDER BY age DESC";
                    $talalt_jatekosok = $conn->query($lekerdezes);
                    while($jatekos = $talalt_jatekosok->fetch_assoc()){
                    ?>
                    <!-- Single Item -->
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-card-corner team-card-corner1"></div>
                            <div class="team-card-corner team-card-corner2"></div>
                            <div class="team-card-corner team-card-corner3"></div>
                            <div class="team-card-corner team-card-corner4"></div>
                            <a href="esports_details.php?id=<?=$jatekos['id'];?>">
                            <div class="img-wrap">
                                <div class="team-img">
                                    <img src="assets/img/team/1-1.png" alt="Team">
                                </div>
                            </div></a>
                            <div class="team-card-content">
                                <h3 class="box-title"><a href="esports_details.php?id=<?=$jatekos['id'];?>"><?= $jatekos['nickname']; ?></a></h3>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <button data-slider-prev="#teamSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
            <button data-slider-next="#teamSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
</section>

<!--==============================
Join Area  
==============================-->
    <div class="container th-container4">
        <div class="cta-area-1">
            <div class="cta-bg-shape-border">
                <svg width="1464" height="564" viewBox="0 0 1464 564" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1463.5 30V534C1463.5 550.292 1450.29 563.5 1434 563.5H1098H927.426C919.603 563.5 912.099 560.392 906.567 554.86L884.14 532.433C878.42 526.713 870.663 523.5 862.574 523.5H601.426C593.337 523.5 585.58 526.713 579.86 532.433L557.433 554.86C551.901 560.392 544.397 563.5 536.574 563.5H366H30C13.7076 563.5 0.5 550.292 0.5 534V30C0.5 13.7076 13.7076 0.5 30 0.5H366H536.574C544.397 0.5 551.901 3.60802 557.433 9.14034L579.86 31.5668C585.58 37.2866 593.337 40.5 601.426 40.5H862.574C870.663 40.5 878.42 37.2866 884.14 31.5668L906.567 9.14035C912.099 3.60803 919.603 0.5 927.426 0.5H1098H1434C1450.29 0.5 1463.5 13.7076 1463.5 30Z" stroke="url(#paint0_linear_202_547)" />
                    <defs>
                        <linearGradient id="paint0_linear_202_547" x1="0" y1="0" x2="1505.47" y2="412.762" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="var(--theme-color)" />
                            <stop offset="1" stop-color="var(--theme-color2)" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="cta-wrap">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="title-area mb-0 custom-anim-left wow animated" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <span class="sub-title">Top chatting statsite</span>
                            <h2 class="sec-title">Csatlakozz egy nagyszerű közösséghez!</h2>
                            <p class="mt-30 mb-30">A league of Legends legújabb analízis weboldala megfűszerezve barátokkal! Légy részese te is!</p>
                            <a href="#" class="th-btn">Csatlakozz hozzánk! <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--==============================
	Footer Area
==============================-->
    <?php require "nav/footer.php"; ?>


    <!--********************************
			Code End  Here 
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