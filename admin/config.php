<?php
    $serverName="localhost";
    $username="root";
    $password="";
    $dbname="inventory_project";
    
    $conn = mysqli_connect($serverName,$username,$password,$dbname);

    if(!$conn){
        die("connection failed!!".mysqli_connect_error());
    }
    else{
        //echo "<script>alert('DB Connected!!')</script>";
    }
    ?>