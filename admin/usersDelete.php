<?php
include 'config.php';
$db_id = $_GET['db_id'];
$deleteQuery="DELETE FROM `register` WHERE db_id='$db_id'";

try {
   mysqli_query($conn,$deleteQuery);
   header("location:users.php"); 
} catch (\Throwable $th) {
   echo $th;
}