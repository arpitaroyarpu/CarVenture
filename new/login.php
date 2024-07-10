<?php if(isset($_COOKIE['emailcookie']) && isset($_COOKIE['passcookie'])){
    $id = base64_decode($_COOKIE['emailcookie']);
    $pass = base64_decode($_COOKIE['passcookie']);
}
else{
    $id = "";
    $pass = "";
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
        <div class="title">Login</div>
        <form action="loginAction.php" method="post">
        <div class="user-details">
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-user"></i> Username</span>
                <input type="text" id="usern" name="l_username" placeholder="Enter username" value="<?php echo $id?>" required> 
            </div>
        
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-eye" aria-hidden="true" style="cursor: pointer" id="eye" onclick="toggle()"></i> Password</span>
                <input type="password" id="passw" name="l_pass" placeholder="Enter Credentials" value="<?php echo $pass;?>" required>
            </div>
            <div>
            <input type="checkbox" name="rememberme" id="checkbox"> 
                <span>Remember Me</span>
            </div>
        </div>
            <div class="button">
                <input type="submit" value="Login">
                <Span>&nbsp;&nbsp;&nbsp;&nbsp;New here? &nbsp;<a href="registration.php">register</a></Span>
            </div>
            <div class="forgot-btn">
              <a href="forgotPassword.php" class="button">Forget Password ?</a>
            </div>
        </form>
        </div>

        <script> 
         var state = false;
         function toggle(){
            if(state){
              document.getElementById("passw").setAttribute("type", "password");
              document.getElementById("eye").style.color='#7a797e';
              state = false;
            }
            else{
              document.getElementById("passw").setAttribute("type", "text");
              document.getElementById("eye").style.color='#5887ef';
              state = true;
            }
         }
        </script>
    </body>
    </html>