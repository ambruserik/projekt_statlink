<?php

    require "config.php";
    require "nav/navbar.php";
    require "ownCS/functions.php";

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

    if(!isset($_GET['id'])){
        header("Location: esports.php");
    }

    $lekerdezes = "SELECT * FROM esports WHERE id=$_GET[id]";
    $talalt_jatekosok = $conn->query($lekerdezes);
    $jatekos = $talalt_jatekosok->fetch_assoc();

?>
<!doctype html>
<html class="no-js " lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bame - Esports & Gaming HTML Template - Player Details</title>
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
                <h1 class="breadcumb-title">Játékos Infók</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Főoldal</a></li>
                    <li>Játékos Infók</li>
                </ul>
            </div>
        </div>
    </div>
<!--==============================
    Teams
==============================-->
    <section >
        <div class="container">
            <div class="row gy-80">
                <div class="col-xl-6">
                    <div class="about-card-img">
                        <img src="assets/img/team/team_inner_1.png" alt="team image">
                    </div>
                    <div>
                    <h3 class="text-white text-center mt-20 mb-20"><?= $jatekos['nickname']; ?> bemutatkozás</h3>
                    <p class="mb-30">Improvizatív, kreatív stílusban játszik, nem fél a váratlan húzásoktól, sőt, ezekből él igazán – gyakran épp az ő váratlansága billenti ki az ellenfelet. A hibáit könnyedén elengedi, mindig a következő lehetőségre koncentrál, és gyakran akkor is mosolyog, amikor más már rég elvesztette volna a fejét. Olyan karakter, akit nehéz nem szeretni – különleges egyensúly van benne lazaság és zsenialitás között.</p>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="widget">
                        <div class="title-area mb-0">
                            <span class="sub-title"># Információk</span>
                            <h2 class="sec-title"><?= $jatekos['nickname']; ?></h2>
                        </div>
                        <p class="about-card_text mt-30 mb-25">Leírás</p>
                        <div class="team-info-list">
                            <ul>
                                <li>Teljes név: <span><?= $jatekos['realname']; ?></span></li>
                                <li>Életkor: <span><?= $jatekos['age']; ?></span></li>
                                <li>Nemzetiség: <span><?= $jatekos['nation']; ?></span></li>
                                <li>Pozíció: <span><?= $jatekos['role']; ?></span></li>
                                <li>Csapat: <span><?= $jatekos['team']; ?></span></li>
                            </ul>
                        </div>
                        
                        <div class="widget widget_categories">
                        <h3 class="widget_title">Statok</h3>
                        <ul>
                            <li>
                                <a href="blog.html">Karakterek</a>
                                <span>(2)</span>
                            </li>
                            <li>
                                <a href="blog.html">Csapattársak</a>
                                <span>(2)</span>
                            </li>
                        </ul>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>

    </section>
<!--==============================
    Táblázat
==============================-->
    <div class="point-table-area-1 overflow-hidden" data-bg-src="assets/img/bg/tournament-table-sec1-bg.png">
        <div class="container">
            <div class="title-area text-center custom-anim-top wow animated" data-wow-duration="1.5s" data-wow-delay="0.2s">
                <span class="sub-title style2"># Csapat</span>
                <h2 class="sec-title"><?= $jatekos['team']; ?> csapat meccsei<span class="text-theme">!</span></h2>
            </div>

            <div class="table-responsive">
                <table class="table tournament-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ellenfél</th>
                            <th scope="col">Best of</th>
                            <th scope="col">Nyert</th>
                            <th scope="col">Vesztett</th>
                            <th scope="col">Dátum</th>
                            <th scope="col">Pont</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        $score = 0;
                        $allScore = 0;
                        $allWon = 0;
                        $allLost = 0;
                        $allPlayed = 0;
                        $lekerdezes = "SELECT * FROM esports_matches WHERE team='$jatekos[team]'";
                        $talalt_meccsek = $conn->query($lekerdezes);
                        while($meccs = $talalt_meccsek->fetch_assoc()){
                            $index++;
                            $score = calcScore($meccs['won'], $meccs['lost'], $meccs['bestof']);
                            $allScore+= $score;
                            $allWon += $meccs['won'];
                            $allLost += $meccs['lost'];
                            $allPlayed += $meccs['won'] + $meccs['lost'];
                        ?>
                        <tr>
                            <th scope="row"><?= $index; ?></th>
                            <td><?= $meccs['against']; ?></td>
                            <td><?= $meccs['bestof']; ?></td>
                            <td><?= $meccs['won']; ?></td>
                            <td><?= $meccs['lost']; ?></td>
                            <td><?= $meccs['date']; ?></td>
                            <td><?= $score; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Összesen játszott</th>
                            <th scope="col"><?= $allPlayed; ?></th>
                            <th scope="col"><?= $allWon; ?></th>
                            <th scope="col"><?= $allLost; ?></th>
                            <th scope="col"><?= date("Y-m-d"); ?></th>
                            <th scope="col"><?= $allScore; ?> pont</th>
                        </tr>
                    </thead>
                </table>
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