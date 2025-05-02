<?php
    require "config.php";
    require "nav/navbar.php";
    require "ownCS/functions.php";

    $friendid=$_GET['friendid'];

    if(isset($_POST['kuldes'])){
        $conn->query("INSERT INTO messages VALUES(id, $_COOKIE[id], $_GET[friendid], '$_POST[text]')");
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
                <h1 class="breadcumb-title">Csevegés</h1>
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
                <h3 class="uk-text-lead">Chats</h3>
                <div class="uk-grid uk-grid-small" data-uk-grid>
                    <div class="uk-width-2-3@l">
                        <div class="chat-messages-box">
                            <div class="chat-messages-head">
                                <div class="user-item">
                                    <div class="user-item__avatar"><img src="img/user-list-4.png" alt="user"></div>
                                    <div class="user-item__desc">
                                        <div class="user-item__name">Sofia Dior</div>
                                    </div>
                                </div>
                                <div><a class="ico_call" href="#!"></a><a class="ico_info-circle" href="#!"></a></div>
                            </div>
                            <div class="chat-messages-body">
                            <?php 
                                $lekerdezes = "SELECT * FROM messages WHERE senderid=$_COOKIE[id] OR receiverid=$_COOKIE[id]";
                                $talalt_uzenetek = $conn->query($lekerdezes);
                                while($uzenet=$talalt_uzenetek->fetch_assoc()){
                                    
                                    if($uzenet['senderid'] == $friendid && $uzenet['receiverid'] == $_COOKIE['id']){
                                        
                            ?>
                                <div class="messages-item --your-message">
                                    <div class="messages-item__avatar"><img src="img/user-list-4.png" alt="user"></div>
                                    <div class="messages-item__text"><?= $uzenet['message']; ?></div>
                                </div>
                                <?php }else if($uzenet['senderid'] == $_COOKIE['id'] && $uzenet['receiverid']==$friendid){ ?>
                                <div class="messages-item --friend-message">
                                    <div class="messages-item__text"><?= $uzenet['message']; ?></div>
                                    <div class="messages-item__avatar"><img src="img/user-list-3.png" alt="user"></div>
                                </div>
                            <?php } }?>
                            </div>
                            <div class="chat-messages-footer">
                                <form method='post' action="chat.php?friendid=<?= $friendid ?>">
                                    <div class="chat-messages-form">
                                        <div class="chat-messages-form-controls"><input class="chat-messages-input" type="text" name="text" placeholder="Írj egy üzenetet!"></div>
                                        <div class="chat-messages-form-btn"><input class="chat-messages-input" type="submit" name="kuldes" value="Küldés"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
		</div>

<!--==============================
	Footer Area
==============================-->
    

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