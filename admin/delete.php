<?php
include 'config.php';
$id = $_GET['id'];
$deleteQuery="DELETE FROM `product` WHERE id='$id'";

try {
   mysqli_query($conn,$deleteQuery);
   header("location:product.php"); 
} catch (\Throwable $th) {
   echo $th;
}