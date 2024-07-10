<?php
include 'config.php';
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_FILES['image'];

print_r($image);
$imageLocation = $_FILES['image']['tmp_name'];
$imageName     = $_FILES['image']['name'];
$image_des     = "uploaded_image/". $imageName;

move_uploaded_file($imageLocation,$image_des);

$productUpdateQuery ="UPDATE `product` SET `name`='$name',`price`='$price',`image`='$image_des' WHERE id='$id'";

if(mysqli_query($conn,$productUpdateQuery)){
    // echo "<script>alert('Product Inserted!')</script>";
    echo "<script>location.href='product.php'</script>";
}