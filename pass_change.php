<?php

    require "config.php";
    ob_start();
    require "nav/navbar_login.php";
    require "ownCS/functions.php";

    if(!isset($_GET['email'])){
        header("Location: pass_forgot.php");
    }

    if(isset($_POST['change-btn'])){
        $lekerdezes = "SELECT * FROM users WHERE email='$_GET[email]";
        $talalt_email = $conn->query($lekerdezes);
        if(mysqli_num_rows($talalt_email) == 1){
            $felhasznalo = $talalt_email->fetch_assoc();
	    if($_POST['pass1'] == $_POST['pass2']){
            	if(isStrong($_POST['pass1'])){
            	   $titkos = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
                   $conn->query("UPDATE users SET password='$titkos' WHERE email='$_GET[email]'");
                   header("Location: login.php");
            	}
		else{
		   echo "<script>alert('Nem el�g er�s a jelsz�!')</script>";
	    	}
	    }
	    else{
		echo "<script>alert('Nem egyezik a k�t jelsz�!')</script>";
	    }
        }
	else{
	    echo "<script>alert('Nincs ilyen emal c�m!')</script>";
	}

    }

    
?>

<!doctype html>
<html class="no-js " lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>StatLink - belépés</title>
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
    <div class="breadcumb-wrapper" data-bg-src="img_league/BIG1.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Jelszó változtatás</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Főoldal</a></li>
                    <li><a href="login.php">Belépés</a></li>
                    <li>Jelszó változtatás</li>
                </ul>
            </div>
        </div>
    </div>
<!--==============================
    BELÉPÉS - checkout
==============================-->
    <div class="th-checkout-wrapper space-top space-extra-bottom">

        <!-- ELFELEJTETT JELSZÓ -->
        <div class="container" id="login-form">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="pass_change.php" class="woocommerce-form-login mb-3">
                        <div class="form-group">
                            <label class="text-center display-6">Jelszó megváltoztatása</label>
                        </div>
                        <div class="form-group">
                            <input id="pass1" type="password" name="pass1" class="form-control" placeholder="Jelszó" required>
                            <label id="pass1_error" class="pass_err"></label>
                        </div>
                        <div class="form-group">
                            <input id="pass2" type="password" name="pass2" class="form-control" placeholder="Jelszó újra" required>
                            <label id="pass2_error" class="pass_err"></label>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="showPass"><label for="showPass">Jelszó megjelenítése</label>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="change-btn" class="th-btn">Jelszó mentése <span class="icon"></span></button>
                        </div>
                    </form>
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

    <script src="ownCS/login.js"></script>

    <script>
        document.getElementById('pass1').addEventListener('input', function() {
            var pass1 = this.value;
            var pass1Error = document.getElementById('pass1_error');
            var pass2 = document.getElementById('pass2');
            var pass2Error = document.getElementById('pass2_error');
            
            var minLength = pass1.length >= 6;
            var hasUpperCase = /[A-Z]/.test(pass1);
            var hasNumber = /[0-9]/.test(pass1);

            //Üzenetek
            var pass1Messages = [];

            if (minLength) {
                pass1Messages.push("<span style='color: green;'>Legyen legalább 6 karakter hosszú!</span>");
            } else {
                pass1Messages.push("<span style='color: red;'>Legyen legalább 6 karakter hosszú!</span>");
            }

            if (hasUpperCase) {
                pass1Messages.push("<span style='color: green;'>Legyen benne nagybetű!</span>");
            } else {
                pass1Messages.push("<span style='color: red;'>Legyen benne nagybetű!</span>");
            }

            if (hasNumber) {
                pass1Messages.push("<span style='color: green;'>Legyen benne szám!</span>");
            } else {
                pass1Messages.push("<span style='color: red;'>Legyen benne szám!</span>");
            }

            if (pass1 === '') {
                pass1Error.style.display = 'none';
                pass2.disabled = true;
            } else {
                pass1Error.style.display = 'block';
                pass1Error.innerHTML = pass1Messages.join('<br>');
                pass2.disabled = false;
            }
        });

        //Ellenőrzés
        document.getElementById('pass2').addEventListener('input', function() {
            var pass1 = document.getElementById('pass1').value;
            var pass2 = this.value;
            var pass2Error = document.getElementById('pass2_error');

            if (pass2 === '') {
                pass2Error.style.display = 'none';
            } else {
                if (pass2 === pass1) {
                    pass2Error.style.color = 'green';
                    pass2Error.innerHTML = 'A két jelszónak egyeznie kell.';
                } else {
                    pass2Error.style.color = 'red';
                    pass2Error.innerHTML = 'A két jelszónak egyeznie kell.';
                }
                pass2Error.style.display = 'block';
            }
        });
</script>

</body>

</html>