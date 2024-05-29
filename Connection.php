<?php
$Connection = mysqli_connect("localhost:3307","root","","cart_db");
    if (mysqli_connect_errno()){

    echo "Failed to Connect in Mysql" . mysql_connect_error();

    }else{
        echo "Connected";
    }
    
?>
    