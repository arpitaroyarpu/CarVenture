<?php
include "config.php";
session_start();

// Check if the user is logged in (e.g., by checking if the user_id exists in the session)
if (!isset($_SESSION['l_username'])) {
    // Redirect the user to the login page or show an error message
    header("Location: login.php");
}

// Retrieve user data from the session
$username = $_SESSION['l_username'];


