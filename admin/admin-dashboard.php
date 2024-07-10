<?php
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {
    header("location:admin-login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0px;
        }

        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #204969;
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden */
            overflow-x: hidden;
            padding-top: 20px;
            transition: 0.5s; /* Smooth transition */
        }

        .sidebar a {
            list-style-type: none;
            margin: 10px;
            padding: 15px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        /* Change link color on hover */
        .sidebar a:hover {
            background-color: #d3d3d3;
        }

        /* Style the main content area (push it to the right to make space for the sidebar) */
        #main-content {
            margin-left: 0;
            padding: 20px;
            transition: 0.5s; /* Smooth transition */
        }

        h2 {
            color: white;
        }

        div.header {
            align-items: center;
            display: flex;
            font-family: poppins;
            justify-content: space-between;
            color: white;
            padding: 0px 60px;
            background-color: #204969;
        }

        div.header button {
            background-color: #f0f0f0;
            font-size: 16px;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="sidebar" id="mySidebar">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="users.php">Users</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="admin-dashboard.php">Return to Dashboard</a></li>
    </ul>
</div>

<div class="header" id="main-content">
    <h1>Welcome to the Admin Dashboard - <?php echo $_SESSION['AdminLoginId'] ?></h1>
    <button id="sidebar-toggle">Toggle Sidebar</button>
    <form method="POST">
        <button name='Logout'>Log Out</button>
    </form>
</div>

<script>
    document.getElementById("sidebar-toggle").addEventListener("click", function () {
        var sidebar = document.getElementById("mySidebar");
        var mainContent = document.getElementById("main-content");

        if (sidebar.style.left === "0px") {
            sidebar.style.left = "-250px";
            mainContent.style.marginLeft = "0";
        } else {
            sidebar.style.left = "0px";
            mainContent.style.marginLeft = "250px";
        }
    });
</script>

<?php
if (isset($_POST['Logout'])) {
    session_destroy();
    header("location:admin-login.php");
}
?>

</body>
</html>
