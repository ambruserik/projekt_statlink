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
    <title>Bame - Esports & Gaming HTML Template - PLAYERS</title>
    <meta name="author" content="Bame">
    <meta name="description" content="Bame - Esports & Gaming HTML Template">
    <meta name="keywords" content="Bame - Esports & Gaming HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

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
   Start
******************************** -->



<!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper hatterkep" data-bg-src="img_league/BIG3.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">PLAYERS</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>PLAYERS</li>
                </ul>
            </div>
        </div>
    </div>
<!--==============================
Team
==============================-->
    <section class="space-top space-extra2-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="title-area text-center">
                        <span class="sub-title style2">#Esports</span>
                        <h2 class="sec-title">Itt találod az összes aktív <span class="text-theme">profi játékosainkat!</span></h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4">

                <?php
                    $lekerdezes = "SELECT * FROM esports";
                    $talalt_jatekosok = $conn->query($lekerdezes);
                    while($jatekos = $talalt_jatekosok->fetch_assoc()){
                ?>
                <!-- TEMP DIV-->
                <!-- Single Item -->
                <div class="col-lg-3 col-sm-6">
                    <div class="th-team team-card">
                        <!-- DIV SARKOK -->
                        <div class="team-card-corner team-card-corner1"></div>
                        <div class="team-card-corner team-card-corner2"></div>
                        <div class="team-card-corner team-card-corner3"></div>
                        <div class="team-card-corner team-card-corner4"></div>
                        <a href="esports_details.php?id=<?=$jatekos['id'];?>">
                        <div class="img-wrap">
                            <!-- NAGY KÉP -->
                            <div class="team-img">
                                <img src="assets/img/team/1-1.png" alt="Team">
                            </div>
                            <!-- KIS KÉP / LOGÓ -->
                             <!--
                            <img class="game-logo" src="assets/img/team/game-logo1-1.png" alt="Team">
                            -->
                        </div></a>
                        <div class="team-card-content">
                            <h3 class="box-title"><a href="esports_details.php?id=<?=$jatekos['id'];?>"><?= $jatekos['nickname']; ?></a></h3>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- TEMP DIV VÉGE -->

                <!-- Single Item -->
                <!--
                <div class="col-lg-3 col-sm-6">
                    <div class="th-team team-card">
                        <div class="team-card-corner team-card-corner1"></div>
                        <div class="team-card-corner team-card-corner2"></div>
                        <div class="team-card-corner team-card-corner3"></div>
                        <div class="team-card-corner team-card-corner4"></div>
                        <div class="img-wrap">
                            <div class="team-img">
                                <img src="assets/img/team/1-2.png" alt="Team">
                            </div>
                            <img class="game-logo" src="assets/img/team/game-logo1-2.png" alt="Team">
                        </div>
                        <div class="team-card-content">
                            <h3 class="box-title"><a href="team-details.html">Wilium Lili</a></h3>
                        </div>
                    </div>
                </div>-->
                

            </div>

            <!-- ALSÓ OLDALAK -->
            <!--
            <div class="pt-60 text-center">
                <div class="th-pagination ">
                    <ul>
                        <li><a href="blog.html"><span class="btn-border"></span> 1</a></li>
                        <li><a href="blog.html"><span class="btn-border"></span> 2</a></li>
                        <li><a href="blog.html"><span class="btn-border"></span> 3</a></li>
                        <li><a href="blog.html"><span class="btn-border"></span><i class="far fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
            -->
        </div>
    </section>


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