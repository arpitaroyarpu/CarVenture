<?php
 include 'config.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

 function sendMail($email,$reset_token)
 {
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'ayonshirsho@gmail.com';
            $mail->Password   = 'ehjducqqyyexafme';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
            $mail->Port       = 465;                                     
        
            $mail->setFrom('lu.velocity@gmail.com', 'DEB');
            $mail->addAddress($email);
        
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset from DEB';
            $mail->Body    = "Your Password Reset Link is here!
            Click the link below to reset password.
            <a href='http://localhost/4THYEAR/updatePassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
        
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
 }
if(isset($_POST["send-reset-link"]))
{
$query="SELECT * FROM `register` WHERE `db_email` = '$_POST[email]'";
$result=mysqli_query($conn,$query);
if($result)
{
if(mysqli_num_rows($result)==1)
{
    /*if email is found */
$reset_token=bin2hex(random_bytes(16));
date_default_timezone_set('Asia/Dhaka');
$date=date("Y-m-d");
$query="UPDATE `register` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `db_email`='$_POST[email]'";
if(mysqli_query($conn,$query) && sendMail($_POST['email'],$reset_token))
{
    echo "<script>alert('Password Reset Sent to mail'); window.location.href='forgotPassword.php';</script>";
}
else
{
    echo "<script>alert('Server Down!Try Again later'); window.location.href='forgotPassword.php';</script>";
}

}
else
{
    echo "<script>alert('Email Not Found'); window.location.href='forgotPassword.php';</script>";
}
}
else
{
    echo "<script>alert('cannot run query'); window.location.href='forgotPassword.php';</script>";
}
}

