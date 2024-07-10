<?php
include 'config.php';
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_FILES['image'];

print_r($image);
$imageLocation = $_FILES['image']['tmp_name'];
$imageName     = $_FILES['image']['name'];
$image_des     = "uploaded_image/". $imageName;
echo "$image_des";

move_uploaded_file($imageLocation,$image_des);

$productInsertQuery ="INSERT INTO `product`(`name`, `price`, `image`) VALUES ('$name','$price','$image_des')";

if(mysqli_query($conn,$productInsertQuery)){
    echo "<script>alert('Product Inserted!')</script>";
    echo "<script>location.href='product.php'</script>";
}