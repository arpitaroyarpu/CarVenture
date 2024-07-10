<?php
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location:admin-login.php");
}
include 'admin-dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
<body>
<div class="container-fluid mt-3">
        <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">UserName</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'config.php';
        $allData = mysqli_query($conn,"SELECT * FROM `register`");
        while($row = mysqli_fetch_array($allData)){
          echo "
             <tr>
              
              <td>{$row['db_username']}</td>
              <td>{$row['db_email']}</td>
              <td>{$row['db_mobile']}</td>
              <td><a class='btn btn-danger' href='usersDelete.php? db_id={$row['db_id']}'>Delete</a></td>
          ";
        }
        ?>
        
      </tbody>
      </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>