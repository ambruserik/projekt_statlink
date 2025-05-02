<?php

    require "config.php";

    require "nav/navbar.php";
    require "ownCS/functions.php";

    /*
    if($belep == false){
        header("Location: index.php");
    }*/

    if(isset($_POST['add-friend-btn'])){
        $lekerdezes = "SELECT * FROM friend_requests WHERE sender_id=$_COOKIE[id] AND receiver_id=$_GET[baratid] OR sender_id=$_GET[baratid] AND receiver_id=$_COOKIE[id]";
        $talalt_felkeres = $conn->query($lekerdezes);
        if(mysqli_num_rows($talalt_felkeres) < 1){
            $conn->query("INSERT INTO friend_requests VALUES(id, $_COOKIE[id], $info[userid])");
            $conn->query("INSERT INTO friend_requests VALUES(id, $info[userid]), $_COOKIE[id]");
        }
    }

    if(isset($_POST['friends-btn'])){
        header("Location: friends.php");
        exit();
    }

    if(isset($_POST['edit-btn'])){
        header("Location: profile_edit.php");
        exit();
    }

    if($belep){
        if(isset($_GET['keresett'])){
            //KERESETT PROFIL
            $lekerdezes = "SELECT * FROM profiles WHERE riotid='$_GET[keresett]'";
            $talalt_info = $conn->query($lekerdezes);
            if(mysqli_num_rows($talalt_info) == 1){
                $info = $talalt_info->fetch_assoc();

                $lekerdezes = "SELECT * FROM users WHERE id=$info[userid]";
                $talalt_user = $conn->query($lekerdezes);
                $felh = $talalt_user->fetch_assoc();
            }
            //-------------
        }
        else{
            if($user['profile'] == 'igen'){
                $lekerdezes = "SELECT * FROM profiles WHERE userid=$user[id]";
                $talalt_info = $conn->query($lekerdezes);
                $info = $talalt_info->fetch_assoc();
                header("Location: profile.php?keresett=".$info['riotid']);
                exit();
            }
            else{
                header("Location: profile_create.php");
                exit();
            }
        }
    }
    else{
        if(isset($_GET['keresett'])){
            //KERESETT PROFIL
            $lekerdezes = "SELECT * FROM profiles WHERE riotid='$_GET[keresett]'";
            $talalt_info = $conn->query($lekerdezes);
            if(mysqli_num_rows($talalt_info) == 1){
                $info = $talalt_info->fetch_assoc();

                $lekerdezes = "SELECT * FROM users WHERE id=$info[userid]";
                $talalt_user = $conn->query($lekerdezes);
                $felh = $talalt_user->fetch_assoc();
            }
            //-------------
        }else{
            header("Location: index.php");
            exit();
        }
    }
    

    

?>

<!doctype html>
<html class="no-js " lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>StatLink - profil</title>
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

<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper hatterkep" data-bg-src="img_league/BIG1.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Profilok</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Profilok</li>
                </ul>
            </div>
        </div>
    </div>

<!--==============================
    Stat
============================== -->
    <section >
        <div class="container">
            <div class="row gy-80">
                <div class="col-xl-6">
                    <div>
                    <h3 class="text-white text-center mt-20 mb-20"><?= $felh['username']; ?> bemutatkozás</h3>
                    <p class="mb-50 mt-30">
                    <?php
                    if($info['about'] == ""){
                        echo "Ennek a felhasználónak nincs leírása...";
                    }
                    else{
                        echo $info['about'];
                    }
                    ?>
                    </p>

                    <?php
                    if($belep && isset($_GET['keresett'])){
                        if($info['userid'] != $_COOKIE['id']){
                        ?>
                        <form method="post" action="profile.php?keresett=<?= $info['riotid']; ?>&baratid=<?= $info['userid'];?>">
                            <div class="form-group">
                                <button type="submit" name="add-friend-btn" class="th-btn">Ismerősnek jelölés <span class="icon"></span></button>
                            </div>
                        </form>
                        <?php } else if($info['userid'] == $_COOKIE['id']){ ?>
                        <form method="post" action="profile.php">
                            <div class="form-group">
                            <a class="sec-title" style="font-size: 30px; margin: 10px;">Barátok</a>
                                <button type="submit" name="friends-btn" class="th-btn">Barátok kezelése <span class="icon"></span></button>
                            </div>
                        </form>
                        <div class="team-info-list">
                            <ul>
                                <?php
                                $lekerdezes = "SELECT * FROM friends WHERE userid=$_COOKIE[id]";
                                $talalt_baratok = $conn->query($lekerdezes);
                                if(mysqli_num_rows($talalt_baratok) == 0){
                                    echo "<p style='font-size: 20px;'>Még nincsenek barátadid...</p>";
                                }else{
                                    while($baratok = $talalt_baratok->fetch_assoc()){
                                        $lekerdezes = "SELECT * FROM users WHERE id=$baratok[friendid] AND profile='igen'";
                                        $talalt_userinfo = $conn->query($lekerdezes);
                                        if(mysqli_num_rows($talalt_userinfo) != 0){
                                            $userinfo = $talalt_userinfo->fetch_assoc();

                                            $lekerdezes = "SELECT * FROM profiles WHERE userid=$baratok[friendid]";
                                            $talalt_baratinfo = $conn->query($lekerdezes);
                                            $baratinfo = $talalt_baratinfo->fetch_assoc();
                                            echo "<li>".$baratinfo['riotid']." - ".$userinfo['username']."</li>";
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    <?php } }?>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="widget">
                        <div class="title-area mb-5">
                            <span class="sub-title"># Információk</span>
                            <h2 class="sec-title"><?= $info['riotid'];?> - <?= $felh['username']; ?></h2>
                            <div style="display: block; width: 150px; text-align: center; position: relative;">
                                <img style="border-radius: 20px;" src="img_pfp/<?= $info['pfp'];?>" alt="Profilkép">
                                <p style="text-align: center;">100 szint</p>
                            </div>
                        </div>
                        <div><h3 class="sec-title mb-10">Kedvencek:</h3></div>
                        <div class="team-info-list">
                            <?php
                            if($info['karakter'] == '-' && $info['kinezet'] == '-' && $info['jatekos'] == '-' && $info['csapat'] == '-' && $info['pozicio'] == '-' && $info['targy'] == '-' && $info['jatekmod'] == '-' && $info['streamer'] == '-'){
                                echo "<p style='font-size: 20px;'>Ennek felhasználónak nincsenek kedvencei..<p>";
                            } else{
                            ?>
                            <ul class="mt-10 mb-25">
                                <?php if($info['karakter'] != "-"){?>
                                <li>Karakter: <span><?= $info['karakter']; ?></span></li>
                                <?php } if($info['kinezet'] != "-"){?>
                                <li>Kinézet: <span><?= $info['kinezet']; ?></span></li>
                                <?php } if($info['jatekos'] != "-"){?>
                                <li>Profi játékos: <span><?= $info['jatekos']; ?></span></li>
                                <?php } if($info['csapat'] != "-"){?>
                                <li>Profi csapat: <span><?= $info['csapat']; ?></span></li>
                                <?php } if($info['pozicio'] != "-"){?>
                                <li>Pozíció: <span><?= $info['pozicio']; ?></span></li>
                                <?php } if($info['targy'] != "-"){?>
                                <li>Tárgy: <span><?= $info['targy']; ?></span></li>
                                <?php } if($info['jatekmod'] != "-"){?>
                                <li>Játékmód: <span><?= $info['jatekmod']; ?></span></li>
                                <?php } if($info['streamer'] != "-"){?>
                                <li>Kontentkreátor: <span><?= $info['streamer']; ?></span></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </div>

                        <?php
                        if($belep && $info['userid'] == $_COOKIE['id']){
                        ?>
                        <form method="post" action="profile.php?keresett=<?= $info['riotid']; ?>">
                            <div class="form-group">
                                <button type="submit" name="edit-btn" class="th-btn mt-20">Adatok szerkesztése <span class="icon"></span></button>
                            </div>
                        </form>
                        <?php } ?>
                        
                        <div class="widget widget_categories">
                        <h3 class="widget_title">Statok</h3>
                        <ul>
                            <li>
                                <a href="">Karakterek</a>
                            </li>
                        </ul>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>

    </section>

<!--==============================
	Footer Area
==============================-->
    <?php 
        //ob_end_flush();
        require "nav/footer.php";
    ?>


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