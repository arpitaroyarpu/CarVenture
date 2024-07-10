<?php

$conn = mysqli_connect("localhost", "root", "") or die(mysqli_error($conn));
mysqli_select_db($conn, "lu-food-hub") or die(mysqli_error($conn));

?>
