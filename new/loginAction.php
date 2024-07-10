<?php
include 'config.php';
session_start();

$l_username = $_POST['l_username'];
$l_pass = $_POST['l_pass'];

// Check if the login is for a regular user
$result = mysqli_query($conn, "SELECT * FROM `register` WHERE db_username='$l_username' AND db_pass='$l_pass'");

if (mysqli_num_rows($result)) {
    $_SESSION['l_username'] = $l_username;

    if (isset($_POST['rememberme'])) {
        $encrypted_username = base64_encode($l_username);
        $encrypted_password = base64_encode($l_pass);
        setcookie('emailcookie', $encrypted_username, time() + 86400);
        setcookie('passcookie', $encrypted_password, time() + 86400);
    } else {
        setcookie('emailcookie', '', time() - 86400);
        setcookie('passcookie', '', time() - 86400);
    }

    echo "<script>location.href = 'dashboard.php'</script>";
} else {
    // Check if the login is for an admin
    if ($l_username === 'admin' && $l_pass === 'admin') {
        $_SESSION['username'] = $l_username;
        echo "<script>location.href='admin-dashboard.php'</script>";
    } else {
        echo "<script>alert('Incorrect username or password')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}
?>
