<?php

    require "config.php";

    $belep = false;
    if(isset($_COOKIE['id'])){
        $belep = true;
    }

    if($belep == true){
        $lekerdezes = "SELECT * FROM users WHERE id=$_COOKIE[id]";
        $talalt_felh = $conn->query($lekerdezes);
        $user = $talalt_felh->fetch_assoc();
    }

    //Kilépés
    if(isset($_GET['logout'])){
        setcookie("id", "", time()+3600, "/");
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['search-btn'])){
        $lekerdezes = "SELECT * FROM profiles WHERE riotid LIKE '$_POST[searchName]'";
        $talalt_keresett = $conn->query($lekerdezes);
        if(mysqli_num_rows($talalt_keresett) == 0){
            echo "<script>alert('Nincs ilyen nevű játékos, kérlek ellenőrizd, hogy helyesen adtad meg a Riot ID-t (Játékos#2222)!')</script>";
        }
        else{
            header("Location: profile.php?keresett=".$_POST['searchName']);
            exit();
        }
        
    }
?>

<!-- KERESŐ -->
<div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form id="searchForm" method="post" action="#">
            <input type="text" id="searchName" name="searchName" placeholder="Játékos neve...">
            <button type="submit" name="search-btn"><i class="fal fa-search"></i></button>
        </form>
    </div>

<!--==============================
    Mobil
============================== -->
<div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.php"><span data-mask-src="img_league/LOGO.png" class="logo-mask"></span><img style="width: 60;" src="img_league/LOGO.png" alt="StatLink"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li>
                        <a href="index.php">Főoldal</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="community.php">Közösség</a>
                            <ul class="sub-menu">
                                <li><a href="#">Hírek</a></li>
                                <?php
                                    if($belep == true){
                                ?>
                                <li><a href="#">Fórumok</a></li>
                                <li><a href="friends.php">Barátok</a></li>
                                <li><a href="chat.php">Chat</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="esports.php">Esports</a>
                        </li>
                        <?php
                            if($belep == true){
                        ?>
                        <li class="menu-item-has-children">
                            <a href=
                            <?php if($user['profile'] == "igen"){

                                $lekerdezes = "SELECT * FROM profiles WHERE userid=$user[id]";
                                $talalt_profil = $conn->query($lekerdezes);
                                $profil = $talalt_profil->fetch_assoc();

                                echo "profile.php?keresett=".urlencode($profil['riotid']);
                            }
                            else{
                                echo "profile_create.php";
                            }
                            ?>
                            ><?= $user['username']; ?> Profil</a>
                            <ul class="sub-menu">
                            <?php
                                if($user['profile'] == "igen"){
                            ?>
                            <li><a href="profile_edit.php">Adatok szerkesztése</a></li>
                            <li><a href="#">Meccselőzmények</a></li>
                            <li><a href="#">Hősismeretek</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">Kedvencek</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Karakter</a></li>
                                    <li><a href="#">Kinézet</a></li>
                                    <li><a href="#">Tárgyak</a></li>
                                    <li><a href="#">Meccsek</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Statisztika</a></li>
                            <?php }else{ ?>
                            <li><a href="profile_create.php">Profil létrehozása</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php">Kilépés</a>
                    </li>
                    <?php
                        }
                        else{
                    ?>
                    <li>
                        <a href="login.php">Belépés</a>
                    </li>
                    <?php
                        }
                    ?>

                </ul>
            </div>
        </div>
    </div>

<!--==============================
	Header
==============================-->
    <header class="th-header header-layout1">
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="index.php">
                                    <span data-mask-src="img_league/LOGO.png" ></span>
                                    <!--<img style="width: 130;" src="img_league/LOGO.png" alt="StatLink">-->
                                    <h2 style="color: white; display: flex; align-items: center; font-size: 38px;">
					<img style="width: 60; margin-right: 8px;" src="img_league/LOGO.png" alt="StatLink">
					StatLink
				    </h2>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="index.php">Főoldal</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="community.php">Közösség</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Hírek</a></li>
                                            <?php
                                                if($belep == true){
                                            ?>
                                            <li><a href="#">Fórumok</a></li>
                                            <li><a href="friends.php">Barátok</a></li>
                                            <li><a href="chat.php">Chat</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="esports.php">Esports</a>
                                    </li>
                                    <?php
                                        if($belep == true){
                                    ?>
                                    <li class="menu-item-has-children">
                                        <a href=
                                        <?php if($user['profile'] == "igen"){

                                            $lekerdezes = "SELECT * FROM profiles WHERE userid=$user[id]";
                                            $talalt_profil = $conn->query($lekerdezes);
                                            $profil = $talalt_profil->fetch_assoc();
                                            
                                            echo "profile.php?keresett=".urlencode($profil['riotid']);
                                        }
                                        else{
                                            echo "profile_create.php";
                                        }
                                        ?>
                                        ><?= $user['username']; ?> Profil</a>
                                        <ul class="sub-menu">
                                            <?php
                                            if($user['profile'] == "igen"){
                                            ?>
                                            <li><a href="profile_edit.php">Adatok szerkesztése</a></li>
                                            <li><a href="#">Meccselőzmények</a></li>
                                            <li><a href="#">Hősismeretek</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Kedvencek</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Karakter</a></li>
                                                    <li><a href="#">Kinézet</a></li>
                                                    <li><a href="#">Tárgyak</a></li>
                                                    <li><a href="#">Meccsek</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Statisztika</a></li>
                                            <?php }else{ ?>
                                            <li><a href="profile_create.php">Profil létrehozása</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="logout.php">Kilépés</a>
                                    </li>
                                    <?php }else{ ?>
                                    <li>
                                        <a href="login.php">Belépés</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                            <div class="header-button d-flex d-lg-none">
                                <button type="button" class="th-menu-toggle"><span class="btn-border"></span><i class="far fa-bars"></i></button>
                            </div>
                        </div>
						<!-- NAVBAR KERESÉS -->
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                <button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-bg"></div>
            </div>
        </div>
    </header>