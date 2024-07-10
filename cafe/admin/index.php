<?php
include 'db-connection.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restaurant Admin</title>
    <meta name="description" content="Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href=""> Admin Panel </a>
                </div>
                <div class="login-form">
                    <form name="form1" action="" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        
                        <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        
                        <div class="alert alert-danger" id="invalidusernameorpassword" role="alert" style="margin-top: 15px; display: none">
                            Invalid Username Or Password!
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <?php 
    if(isset($_POST["submit1"])){
        $count = 0;
        $res = mysqli_query($conn, "SELECT * FROM `admin-login` WHERE username = '$_POST[username]' && password = '$_POST[password]'");
        $count = mysqli_num_rows($res);
    
        if($count == 0){
            ?>
            <script type="text/javascript"> document.getElementById("invalidusernameorpassword").style.display = "block";</script>
            <?php
        } else {
            ?>
            <script type="text/javascript"> window.location.href = "admin-dashboard.php"; </script>
            <?php
        }
    }
?>

</body>
</html>
