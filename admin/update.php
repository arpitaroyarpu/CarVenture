<?php
$user = "l_username"|| "admin";
session_start();
if(isset($_SESSION['l_username'])|| $user = 'admin'){
  
}
else{
    echo "<script>alert('dont access from URL!! Login First') </script>";
    echo "<script>location.href = 'login.php' </script>";
}

include 'config.php';
$id = $_GET['id'];

    $dataFetchQuery = "SELECT * FROM `product` WHERE id='$id'";
    $result = mysqli_query($conn,$dataFetchQuery);
    $data = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        form{
            background-color: #fff;
            padding : 15px;
            box-shadow: 0px 0px 10px 0px;
            border-radius: 10px;
        }
        body{
          background: linear-gradient(135deg, #cfe2f3,#eaf3bb);
        }
        h3{
          text-align: center;
        }
    </style>
</head>
<body>
    <div class="conatiner-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <form action="updateAction.php" method="post" enctype='multipart/form-data'>
                    <div class="mb-3">
                           <h3>Update Product</h3> 
                    </div>
                    <div class="mb-3">
                      Update Product Name : 
                      <input type="text" class="form-control" name = "name" placeholder="Aa" value="<?php echo $data['name'] ?>">
                      
                    </div>
                    <div class="mb-3">
                    Update Product Price :
                      <input type="text" class="form-control" placeholder="৳" name="price" value="<?php echo $data['price'] ?>">
                    </div>
                    <div class="mb-3">
                    Update Product Image :
                      <input type="file" class="form-control" name="image" value="<?php echo $data['image'] ?>">
                    </div>
                    <div class="mb-3">
                    <img width='150px' height='90px' src="<?php echo $data['image']?>">
                    </div>
                    <input type="hidden" name="id"  value="<?php echo $data['id'] ?>" >
                    <button type="submit" class="btn btn-primary col-12" >Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

