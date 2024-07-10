<?php
session_start();
if(isset($_SESSION['l_username'])){
    session_destroy();
    // setcookie('emailcookie','',time()-86400);
    // setcookie('passcookie','',time()-86400);
    echo "<script>location.href = 'login.php' </script>";  
}
else{
    echo "<script>alert('dont access from URL!! Login First') </script>";
    echo "<script>location.href = 'login.php' </script>";
}

?>