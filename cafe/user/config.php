<?php
    
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "lu-food-hub";
    define('SITEURL','http://localhost/lu-food-hub/');
    $conn = mysqli_connect($serverName,$userName,$password) or die(mysqli_connect_error());
    $db_select = mysqli_select_db($conn, $dbName) or die(mysqli_connect_error());
?>