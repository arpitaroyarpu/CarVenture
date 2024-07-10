<?php
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if (isset($_POST['register'])) {
    $_r_username = mysqli_real_escape_string($conn, $_POST['r_username']);
    $_r_email = mysqli_real_escape_string($conn, $_POST['r_email']);
    $_r_mobile = mysqli_real_escape_string($conn, $_POST['r_mobile']);
    $_r_pass = mysqli_real_escape_string($conn, $_POST['r_pass']);
    $_r_conpass = mysqli_real_escape_string($conn, $_POST['r_conpass']);
    $code = bin2hex(random_bytes(16));


    $duplicateEmailQuery = "SELECT * FROM `register` WHERE db_email = '$_r_email'";
    $duplicate_email = mysqli_query($conn, $duplicateEmailQuery);

    $duplicate_email_count = mysqli_num_rows($duplicate_email);

    $username_pattern = "/[A-Za-z .]{3,20}/";
    $phone_pattern = "/(\+88)?-?01[3-9]\d{8}/";
    //$email_pattern = "/(cse|eee|law)_\d{10}@lus\.ac\.bd/";
    $email_pattern = "/^[^@]+@(?:lus\.ac\.bd|gmail\.com)$/";

    // $pass_pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$!%&*_+><]).+$/";
    $pass_pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$!%&*_+><]).{8,}$/";


    if (empty($_r_username) || empty($_r_email) || empty($_r_mobile) || empty($_r_pass) || empty($_r_conpass)) {
        $_SESSION['register_error'] = "Please fill in all the fields"; // Error message for empty fields
    } else if (mysqli_num_rows($duplicate_email) > 0) {
        // echo "email already exists";
        echo "<script> alert('Email already taken!!')</script>";
    } else if (!preg_match($username_pattern, $_r_username)) {
        echo "<script> alert('User Name is Only char (3-20)!!')</script>";
    } else if (!preg_match($email_pattern, $_r_email)) {
        echo "<script> alert('Wrong Email!!')</script>";
    } else if (!preg_match($phone_pattern, $_r_mobile)) {
        echo "<script> alert('Wrong Phone No!!')</script>";
    } else if (!preg_match($pass_pattern, $_r_pass)) {
        echo "<script> alert('Provide a proper password!!')</script>";
    } else {
        if ($_r_pass === $_r_conpass) {
            $pass = password_hash($_r_pass, PASSWORD_BCRYPT);

            $insertQuery = "INSERT INTO `register`( `db_username`, `db_email`, `db_mobile`, `db_password`, `code` ) VALUES ('$_r_username','$_r_email','$_r_mobile','$pass','$code')";
            $result = mysqli_query($conn, $insertQuery);

            if ($result) {
                echo "<div style='display: none;'>";
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'kawserahmedpk2017@gmail.com';                     //SMTP username
                    $mail->Password   = 'nsrkhvuoegfhjhtl';  //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('kawserahmedpk2017@gmail.com');
                    $mail->addAddress($_r_email);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Email verification from Sylhet Food Hub';
                    $mail->Body    = 'Here is the verification link <b><a href="http://localhost/CarVenture/cafe/user/loginAction.php?verification=' . $code . '">http://localhost/CarVenture/cafe/user/loginAction.php?verification=' . $code . '</a></b>';
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
            } else {
                $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
        }
    }
}
