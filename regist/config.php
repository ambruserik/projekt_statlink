<?php

    $conn = new mysqli("localhost", "team05", "yxkh26T4NmBg38M7YRfZdszj", "team05");
        
    if($conn->connect_error){
    die("Connection failed! ".$conn->connect_error);
    }

?>