    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;
}
body{
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: linear-gradient(135deg, #cfe2f3,#eaf3bb);
}
.container{
    max-width: 700px;
    width: 100%;
    background: #fff;
    padding: 25px 30px;
    border-radius: 20px;
}
.container .title{
    font-size:40px;
    font-weight: 1000;
    position: relative;
}
.container .user-details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
form .user-details .input-box{
    margin: 12px 0px 12px 0;
    width: calc(100% - 20px);
}
.user-details .input-box input{
    height: 40px;
    width: 100%;
    outline: none;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding-left: 15px;
    font-size: 16px;
}
.user-details .input-box .details{
    display: block;
    font-weight: 1000;
    margin-bottom: 5px;
}
.href{
    height: 45px;
    margin: 45px,0;
    height: 49%;
    width: 49%;
    font-weight: 1000;
    background-color: #9b59b6;
}
form .button{
    height: 60px;
    margin: 45px, 0;
}
form .button input{
    height: 50%;
    width: 100%;
    font-weight: 1000;
    background-color: #9b59b6;
    cursor: pointer;
}
a{
    text-decoration: none;
}
#admin-login{
    font-weight: 1000;
    background-color: #9b59b6;
    cursor: pointer;
    width: calc(100% - 20px);
}
</style>
    <body>
        <div class="container">
        <div class="title">Admin Login</div>
        <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="user-details">
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-user"></i> Admin Name</span>
                <input type="text" id="usern" name="AdminName" placeholder="Enter Admin Name"  required> 
            </div>
        
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-eye" aria-hidden="true" style="cursor: pointer" id="eye" onclick="toggle()"></i> Password</span>
                <input type="password" id="passw" name="AdminPass" placeholder="Enter Credentials"  required>
            </div>
    
        </div>
            <div class="button">
            <button id="admin-login" type="submit" name="Login">Login</button>
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

        <?php
        include 'config.php';
             function input_filter($data)
                {
                     $data=trim($data);
                     $data=stripcslashes($data);
                     $data=htmlspecialchars($data);
                     return $data;
                }
        if(isset($_POST['Login']))
        { //Filtering user input
            $AdminName =input_filter($_POST['AdminName']);
            $AdminPass =input_filter($_POST['AdminPass']);

          //escaping special symbols used in SQL statement
           $AdminName=mysqli_real_escape_string($conn,$AdminName);
           $AdminPass=mysqli_real_escape_string($conn,$AdminPass);

         //query template
           $query="SELECT * FROM `admin_login` WHERE admin_name=? AND admin_password=?";
         //prepared statement(considered safe for preventing SQL injection)
           if($stmt=mysqli_prepare($conn,$query))
           {
            mysqli_stmt_bind_param($stmt,"ss",$AdminName,$AdminPass); //binding values to template
            mysqli_stmt_execute($stmt); //execute prepaped statement
            mysqli_stmt_store_result($stmt); //transferring the result of execution in $stmt
            if(mysqli_stmt_num_rows($stmt)==1)
            {
                session_start();
                $_SESSION['AdminLoginId']=$_POST['AdminName'];
                header("location:admin-dashboard.php");
            }
            else 
            {
               echo "<script>alert('Invalid Admin Name or Password');</script>";
            }
            mysqli_stmt_close($stmt);
           }
           else
           {
            echo "<script>alert('SQL Query cannot be built');</script>";
            
           }
        }
        
        ?>
    </body>
    </html>