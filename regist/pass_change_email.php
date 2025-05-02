<?php

    $cimzett = $_GET['email'];
    $targy = "StatLink - Jelszó változtatás";
    $datum = date("Y-m-d h:i:s");

    $uzenet = "<div style='margin: 10px auto; padding: 10px; border: none; border-radius: 5px; box-shadow: 0 1px 5px black; display: block; width: 600px;'>
                    <div style='text-align: center; padding: 2px; border: none; border-radius: 5px; background-color: #e1f0ff;'>
                        <h1>Jelszó megváltoztatása</h1>
                    </div>
                    <div style='text-align: center;'>
                        <p>A jelszavad megváltoztatásához kattints a következő linkre: <a href='https://team05.project.scholaeu.hu/pass_change.php?email=".$_GET['email']."' style='text-decoration: none;'>Jelszó változtatás</a></p>
                        <p>Ha nem te igényelted a jelszóváltoztatást, kérlek hagyd figyelmen kívül ezt az üzenetet.</p>
                    </div>
                </div>";

    $fejlec = "From: StatLink - gaming community"."\r\n";
    $fejlec .= "MIME-Version: 1.0"."\r\n";
    $fejlec .= "Content-type: text/html; charset=UTF-8"."\r\n";
    
    if(mail($cimzett, $targy, $uzenet, $fejlec)){
        header("Location: https://team05.project.scholaeu.hu/login.php");
    }
    else{
        echo "<script>alert('Hiba történt...')</script>";
    }

?>