<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>

    <style>
    body {
            background: linear-gradient(100deg, #cfe2f3,#eaf3bb);
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 4px ;
            padding: 20px;
            text-align: center;
        }
        input[type="password"] {
            width: 50%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
            margin:20px;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
</style>
</head>
<body>
    
<?php
    include 'config.php';
    if(isset($_GET['email']) && isset($_GET['reset_token'])){
        date_default_timezone_set('Asia/Dhaka');
        $date=date("Y-m-d");
        $query="SELECT * FROM `register` WHERE `db_email` = '$_GET[email]' AND `resettoken` = '$_GET[reset_token]' AND `resettokenexpire` = '$date'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
          if(mysqli_num_rows($result)==1)
          {
            echo"
            <div class='container'>
            <form method='POST'>
            <h2>Create New Password</h2>
            <p>Please enter your new your password.</p>
            <input type='password'  placeholder='New Password' name = 'password' > 
            <button type='submit' name='updatepassword'>Update</button>
            <input type='hidden' name='email' value='$_GET[email]'>
            </form>
            </div>"
            ;
            
          }
          else
          {
            echo "<script>alert('Invalid or Expired Link'); window.location.href='forgotPassword.php';</script>";
          }
        }
        else
        {
            echo "<script>alert('Server Down!Try Again later'); window.location.href='forgotPassword.php';</script>";
        }
    }
?>

<?php
if(isset($_POST['updatepassword']))
{
    $pass= $_POST['password'];
    $update= "UPDATE `register` SET `db_pass`='$pass',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `db_email`='$_POST[email]'";
    if(mysqli_query($conn,$update))
    {
        echo "<script>alert('Password Updated Successfully'); window.location.href='login.php';</script>";
    }
    else
    {
        echo "<script>alert('Server Down!Try Again later'); window.location.href='forgotPassword.php';</script>";
    }
}

?>

</body>
</html>