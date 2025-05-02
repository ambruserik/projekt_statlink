<?php

    require "config.php";
    
    if(!isset($_GET['email'])){
        header("Location: login.php");
    }

    $email = $_GET['email'];

    $lekerdezes = "SELECT * FROM users WHERE email='$email'";
    $talalt_email = $conn->query($lekerdezes);
    if(mysqli_num_rows($talalt_email) >= 1){

        $conn->query("UPDATE users SET active='igen' WHERE email='$email'");
        header("Location: https://team05.project.scholaeu.hu/login.php?regActive=1");

    }
    else{
        header("Location: https://team05.project.scholaeu.hu/login.php");
    }

    
?>
