<?php

include "db-connection.php";
$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM `food` WHERE id = $id");

?>

<script type = "text/javascript"> window.location = "display-food.php";</script>