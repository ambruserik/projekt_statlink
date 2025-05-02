<?php

    require "config.php";
    ob_start();
    require "nav/navbar.php";

    if($belep == false){
        header("Location: https://team05.project.scholaeu.hu/index.php");
        exit;
    }


    if(isset($_POST['create-btn'])){
        $kar = isset($_POST['k_karakter']) ? $_POST['k_karakter'] : '-';
        $kin = isset($_POST['k_kinezet']) ? $_POST['k_kinezet'] : '-';
        $jat = isset($_POST['k_jatekos']) ? $_POST['k_jatekos'] : '-';
        $csa = isset($_POST['k_csapat']) ? $_POST['k_csapat'] : '-';
        $poz = isset($_POST['k_pozicio']) ? $_POST['k_pozicio'] : '-';
        $tar = isset($_POST['k_targy']) ? $_POST['k_targy'] : '-';
        $mod = isset($_POST['k_jatekmod']) ? $_POST['k_jatekmod'] : '-';
        $str = isset($_POST['k_streamer']) ? $_POST['k_streamer'] : '-';

        $about = isset($_POST['about']) ? $_POST['about'] : "";

        $conn->query("INSERT INTO profiles VALUES(id, $_COOKIE[id], '$_POST[riotid]', '$_POST[pfp]', '$_POST[bg]', '$about', '$kar', '$kin', '$jat', '$csa', '$poz', '$tar', '$mod', '$str')");
        $conn->query("UPDATE users SET profile='igen' WHERE id=$_COOKIE[id]");
        header("Location: profile.php?keresett=".$_POST['riotid']);

    }
    
?>

<!doctype html>
<html class="no-js " lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>StatLink - profil létrehozás</title>
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
    <div class="breadcumb-wrapper hatterkep" data-bg-src="img_league/BIG1.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Profil létrehozás</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Főoldal</a></li>
                    <li>Profil</li>
                </ul>
            </div>
        </div>
    </div>
<!--==============================
    BELÉPÉS - checkout
==============================-->
    <div class="th-checkout-wrapper space-top space-extra-bottom">

        <!-- PROFIL -->
        <div class="container" id="reg-form">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="profile_create.php" class="woocommerce-form-login mb-3">
                        <div class="form-group">
                            <label class="text-center display-4">PROFIL LÉTREHOZÁS</label>
                        </div>

                        <div class="form-group">
                            <label>Riot ID *</label>
                            <input type="text" name="riotid" class="form-control" placeholder="Játékos#2222" required>
                        </div>
                        <div class="form-group">
                            <label>Válassz profilképet!</label>
                            <select name="pfp" id="pfp_select" required>
                                <option value="def/pfp_def.jpg">Alap</option>
                                <?php
                                $dir = "img_pfp/";
                                $images = glob($dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

                                foreach ($images as $imgPath):
                                    $fileName = basename($imgPath);
                                ?>
                                    <option value="<?php echo htmlspecialchars($fileName); ?>"><?php echo $fileName; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <div class="mb-3" style="margin: 0 auto;">
                                <img id="pfp_preview" src="img_pfp/def/pfp_def.jpg" alt="Kiválasztott profilkép" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                            </div>

                            <label>Válassz háttérképet!</label>
                            <select name="bg" id="bg_select" required>
                                <option value="Aatrox.jpg">Aatrox</option>
                                <?php
                                $dir2 = "img_bg/";
                                $images2 = glob($dir2 . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

                                foreach ($images2 as $imgPath):
                                    $fileName2 = basename($imgPath);
                                ?>
                                    <option value="<?php echo htmlspecialchars($fileName2); ?>"><?php echo $fileName2; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <label>Leírás magadról</label>
                            <input type="text" name="about" class="form-control" placeholder="Nem kötelező...">
                        </div>

                        <div class="form-group">
                            <label>Kedvencek:</label>
                            <div id="extra-options" class="mb-3">
                                <div class="btn-group" role="group" aria-label="Profil elemek">
                                    <button type="button" class="btn btn-outline-primary toggle-option" data-option="k_karakter">+ Karakter</button>
                                    <button type="button" class="btn btn-outline-primary toggle-option" data-option="k_kinezet">+ Kinézet</button>
                                    <button type="button" class="btn btn-outline-primary toggle-option" data-option="k_jatekos">+ Játékos</button>
                                    <button type="button" class="btn btn-outline-primary toggle-option" data-option="k_csapat">+ Csapat</button>
                                    <button type="button" class="btn btn-outline-primary toggle-option" data-option="k_pozicio">+ Pozíció</button>
                                    <button type="button" class="btn btn-outline-primary toggle-option" data-option="k_targy">+ Tárgy</button>
                                    <button type="button" class="btn btn-outline-primary toggle-option" data-option="k_jatekmod">+ Játékmód</button>
                                    <button type="button" class="btn btn-outline-primary toggle-option" data-option="k_streamer">+ Streamer</button>
                                    
                                </div>
                            </div>

                            <div id="extra-fields"></div>
                        </div>


                        <div class="form-group">
                            <button type="submit" name="create-btn" class="th-btn">Profil létrehozása <span class="icon"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

<!--==============================
	Footer Area
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

    <script src="ownCS/login.js"></script>

    <!-- profilkép -->
    <script>
        const select = document.getElementById('pfp_select');
        const preview = document.getElementById('pfp_preview');

        select.addEventListener('change', function() {
            const selectedFile = this.value;
            preview.src = 'img_pfp/' + selectedFile;
        });
    </script>

    <!-- kedvencek -->
    <script>
        const selectedOptions = {};
        const fieldContainer = document.getElementById('extra-fields');

        const optionLabels = {
            k_karakter: "Karakter",
            k_kinezet: "Kinézet",
            k_jatekos: "Játékos",
            k_csapat: "Csapat",
            k_pozicio: "Pozíció",
            k_targy: "Tárgy",
            k_jatekmod: "Játékmód",
            k_streamer: "Streamer"
        };

        document.querySelectorAll('.toggle-option').forEach(btn => {
            btn.addEventListener('click', () => {
                const option = btn.dataset.option;

                if (selectedOptions[option]) {
                    delete selectedOptions[option];
                    btn.innerText = "+ " + optionLabels[option];
                    const field = document.getElementById('field-' + option);
                    if (field) field.remove();
                } else {
                    selectedOptions[option] = true;
                    btn.innerText = "- " + optionLabels[option];

                    const fieldHTML = `
                        <div class="form-group" id="field-${option}">
                            <label>Kedvenc ${optionLabels[option]}</label>
                            <input type="text" name="${option}" class="form-control" placeholder="${optionLabels[option]}">
                        </div>
                    `;
                    fieldContainer.insertAdjacentHTML('beforeend', fieldHTML);
                }
            });
        });
    </script>

</body>

</html>