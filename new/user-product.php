<?php
include 'config.php';
$allData = mysqli_query($conn, "SELECT * FROM `product`");
$user = "l_username";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
    <div class="container">
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($allData)) { ?>
                <div class="col-md-3">
                    <div class="card my-5 mx-5" style="width: 18rem;">
                        <img src="admin/<?php echo $row['image']; ?>" class="card-img-top" alt="Product Image" width='267px' height='200px'>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><?php echo $row['price']; ?></p>
                            <a class="btn btn-success" href="cart.php?id=<?php echo $row['id']; ?>" style="text-align: center;">Move to Cart</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>