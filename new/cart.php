<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous" />
</head>
<body>
    <!-- navbar starts -->
    <nav class="navbar navbar-expand-lg navbar-light nav-bg">
            <div class="container-fluid">
                <a style="font-weight: 800; font-size: 25px; color: #ca9236" class="navbar-brand" href="dashboard.php"><span
                        style="color: #ca9236">Car Venture</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="user-product.php"><b>Products</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account-details.php"> <b><i class="fa-solid fa-user"></i><?php echo $_SESSION['l_username']?></b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><b><i class="fa-solid fa-cart-shopping"></i>My Cart</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><b>Logout</b></a>
                        </li>
                        

                </div>
            </div>
        </nav>
        <!-- navbar ends -->    
        
        <!-- car Display container -->
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Book Now</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $id = $_GET['id'];
     $dataFetchQuery = "SELECT * FROM `product` WHERE id='$id'";
     $result = mysqli_query($conn,$dataFetchQuery);
     while($data = mysqli_fetch_array($result)){
        echo"
        <tr>
              <td>{$data['id']}</td>
              <td>{$data['name']}</td>
              <td>৳{$data['price']}</td>            
              <td><img width='150px' height='150px' src=admin/{$data['image']}></td>
              <td><form method='POST'><button class ='btn btn-primary' name='booknow'>Book Now</button></form></td>
        ";
     }

    ?>
    <?php
if (isset($_POST['booknow'])) {
    echo "<script>alert('booking done!')</script>";
}
?>
  </tbody>
</table>
</body>
</html>