<?php

include "db-connection.php";
$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM `food-categories` WHERE id = $id");

?>

<script type = "text/javascript"> window.location = "food-categories.php";</script>