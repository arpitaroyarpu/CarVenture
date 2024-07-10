<?php
include "db-connection.php";
include "header.php";
?>

<!-- .content area -->
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Add/Edit Category</h1>
      </div>
    </div>
  </div>

  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <!-- You can add breadcrumb items here if needed -->
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content mt-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Add/Edit Category</strong>
        </div>
        <div class="card-body">
          <!-- Credit Card -->
          <div id="pay-invoice">
            <div class="card-body">
              <form name="form1" action="" method="post">
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Category Name</label>
                  <input id="food_category" name="food_category" type="text" class="form-control" aria-invalid="false" placeholder="Enter Category" required>
                </div>
                <div>
                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit1">
                    <span id="payment-button-amount">Submit</span>
                  </button>
                </div>
                <br>
                <div class="alert alert-success" role="alert" id="success" style="display: none">
                  Category Inserted Successfully!
                </div>
                <div class="alert alert-danger" role="alert" id="error" style="display: none">
                  Duplicate Category Found
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> 
      <!-- .card -->
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Categories</strong>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Categories</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;
              $res = mysqli_query($conn, "SELECT * FROM `food-categories`");
              while($row = mysqli_fetch_array($res)){
                  $count = $count+1;
                  echo "<tr>";
                  echo "<td>";
                  echo $count;
                  echo "</td>";
                  echo "<td>";
                  echo $row["food-categories"];
                  echo "</td>";
                  echo "<td>";
                  ?> <a href="edit-categories.php?id=<?php echo $row["id"]; ?>" style="color: green">Edit</a> <?php echo"</td>";
                  echo "<td>";
                  ?> <a href="delete-categories.php?id=<?php echo $row["id"]; ?>" style="color: red" onclick="deleteCategory(<?php echo $row['id']; ?>)">Delete</a> <?php echo"</td>";
                  echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- .content area -->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit1"])) {
    $res = mysqli_query($conn, "SELECT * FROM `food-categories` WHERE `food-categories`= '$_POST[food_category]'") or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);
    if($count > 0){
        ?>
        <script type="text/javascript">
          document.getElementById("error").style.display = "block";
          document.getElementById("success").style.display = "none";
        </script>
        <?php
    }
    else{
        mysqli_query($conn, "INSERT INTO `food-categories` VALUES (NULL, '$_POST[food_category]')") or die(mysqli_error($conn));
        ?>
        <script type="text/javascript">
          document.getElementById("error").style.display = "none";
          document.getElementById("success").style.display = "block";     
          setTimeout(function(){
            window.location.href = window.location.href;
          },1000);
        </script>
        <?php
    }
}
?>

<?php
include "footer.php";
?>
