<?php
	require "config.php";
	require "nav/navbar.php";
    require "ownCS/functions.php";
	
	if(!isset($_COOKIE['id'])){
		header("Location: login.php");
	}
	if(isset($_POST['delete-friend'])){
		$conn->query("DELETE FROM friends WHERE id=$_COOKIE[id] AND friendid=$_GET[friendid]");
        $conn->query("DELETE FROM friends WHERE id=$_GET[friendid] AND friendid=$_COOKIE[id]");
	}
    if(isset($_POST['message'])){
        header("Location: chat.php?friendid=$_GET[friendid]");
    }
    if(isset($_POST['accept'])){
        $conn->query("INSERT INTO friends VALUES(id, $_COOKIE[id], $_GET[id])");
        $conn->query("INSERT INTO friends VALUES(id, $_GET[id], $_COOKIE[id])");
        $conn->query("DELETE FROM friend_requests WHERE sender_id=$_GET[id]");
    }
    if(isset($_POST['deny'])){
        $conn->query("DELETE FROM friend_requests WHERE sender_id=$_GET[id]");
    }
?>
<!doctype html>
<html class="no-js " lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bame - Esports & Gaming HTML Template - Checkout</title>
    <meta name="author" content="Bame">
    <meta name="description" content="Bame - Esports & Gaming HTML Template">
    <meta name="keywords" content="Bame - Esports & Gaming HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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
	<link rel="stylesheet" href="assets/css/communitystyle.css">
    <link rel="stylesheet" href="assets/css/chat.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>

</head>
<body>

    <!--********************************
   		Code Start From Here 
	******************************** -->

    <!--==============================
     Preloader
  ==============================-->
    <div class="preloader ">
        <button class="th-btn preloaderCls">CANCEL PRELOADER </button>
        <div class="preloader-inner">
            <span class="loader"></span>
        </div>
    </div>
    
<!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper " data-bg-src="img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Barátok</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Főoldal</a></li>
                </ul>
            </div>
        </div>
    </div>
<!--==============================
    BELÉPÉS - checkout
==============================-->
		<div class="page-wrapper">
			<main class="page-main">
                <div class="uk-grid" data-uk-grid>
                    <div class="uk-width-2-3@xl">
                        <div class="widjet --filters">
                            <div class="widjet__head">
                                <h3 class="uk-text-lead">Friends</h3>
                            </div>
                        </div>
                        <div class="friends-container">
                            <div class="friend-card">
                                <div class="user-item --active">
									<?php
										$lekerdezes = "SELECT * FROM friends WHERE userid=$_COOKIE[id]";
                                        $talalt_baratok = $conn->query($lekerdezes);
                                        while($baratok = $talalt_baratok->fetch_assoc()){
                                            $lekerdezes = "SELECT * FROM users WHERE id=$baratok[id]";
											$talalt_felhasznalok = $conn->query($lekerdezes);
											while($felhasznalok = $talalt_felhasznalok->fetch_assoc()){
												echo "<div class='user-item__avatar'><img src='img/user-list-1.png' alt='user'></div>
													<div class='user-item__box'>
														<div class='user-item__name'>$felhasznalok[username]</div>
														<div class='manage'>
															<form method='post' action='friends.php?friendid=$felhasznalok[id]'>
                                                                <input type='submit' name='message' value='Üzenet'>
																<input type='submit' name='delete-friend' value='Törlés'>
															</form>
														</div>
													</div>
													<div class='user-item__more'><a class='ico_more' href='#!'></a></div>";
											}
                                        }
									?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="friends-container">
                        <div class="friend-card">
                            <div class="widjet__head">
                                <h3 class="uk-text-lead">Friend Requests</h3>
                            </div>
                            <div class="widjet__body">
                                <ul class="friend-requests-list">
                                    <li class="friend-requests-item">
                                    <?php
										$lekerdezes = "SELECT * FROM friend_requests WHERE receiver_id=$_COOKIE[id]";
                                        $talalt_baratkerelmek = $conn->query($lekerdezes);
                                        while($baratkerelmek = $talalt_baratkerelmek->fetch_assoc()){
                                            $lekerdezes = "SELECT * FROM users WHERE id=$baratkerelmek[sender_id]";
											$talalt_felhasznalok = $conn->query($lekerdezes);
											while($felhasznalok = $talalt_felhasznalok->fetch_assoc()){
												echo "<div class='friend-requests-item__avatar'><img src='img/user-list-1.png' alt='user'></div>
														<div class='friend-requests-item__name'>$felhasznalok[username]</div>
														<div class='manage'>
															<form method='post' action='friends.php?id=$felhasznalok[id]'>
                                                                <input type='submit' name='accept' value='Elfogad'>
																<input type='submit' name='deny' value='Elutasít'>
															</form>
														</div>
													<div class='user-item__more'><a class='ico_more' href='#!'></a></div>";
											}
                                        }
									?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
		</div>

<!--==============================
	Footer Area
==============================-->
    <footer class="footer-wrapper footer-layout1">
        <div class="container">
            <div class="footer-top text-center">
                <div class="footer-logo bg-repeat" data-bg-src="assets/img/bg/jiji-bg.png">
                    <a href="index.html">
                        <span data-mask-src="assets/img/logo.svg" class="logo-mask"></span>
                        <img src="assets/img/logo.svg" alt="Bame">
                    </a>
                </div>
                <div class="footer-links">
                    <ul>
                        <li><a href="index.html">Főoldal</a></li>
                        <li><a href="#">Közösség</a></li>
                        <li><a href="pros.html">Pros</a></li>
                        <li><a href="#">Profil</a></li>
                        <li><a href="login.html">Belépés</a></li>
                        <li><a href="help.html">Segítség</a></li>
                    </ul>
                </div>

                <!--
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-xl-auto">
                            <div class="widget widget_nav_menu footer-widget">
                                <h3 class="widget_title">Támogatás</h3>
                                <div class="menu-all-pages-container">
                                    <ul class="menu">
                                        <li><a href="#"><i class="far fa-angle-right"></i> Segítség és Ügyintézés</a></li>
                                        <li><a href="#"><i class="far fa-angle-right"></i> Beállítások és Biztonság</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                
            </div>
            
            <div style="margin-top: 100px;" class="copyright-wrap text-center bg-repeat" data-bg-src="assets/img/bg/jiji-bg.png">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6">
                            <p class="copyright-text bg-repeat" data-bg-src="assets/img/bg/jiji-bg.png">
                                <i class="fal fa-copyright"></i> Copyright 2024 <a href="index.html">StatLink.</a> Minden jog fenntartva.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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