<?php

include "db-connection.php";
$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM `food_ingredients` WHERE id = $id");

?>

<script type = "text/javascript"> window.location = "food-ingredients.php";</script>