<?php
include "db-connection.php";
include "header.php";
?>

<!-- .content area -->
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Add/Edit Ingredients</h1>
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
          <strong class="card-title">Add/Edit Ingredients</strong>
        </div>
        <div class="card-body">
          <!-- Credit Card -->
          <div id="pay-invoice">
            <div class="card-body">
              <form name="form1" action="" method="post">
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Ingredients Name</label>
                  <input id="food_category" name="ingredients_name" type="text" class="form-control" aria-invalid="false" placeholder="Enter Category" required>
                </div>
                <div>
                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit1">
                    <span id="payment-button-amount">Submit</span>
                  </button>
                </div>
                <br>
                <div class="alert alert-success" role="alert" id="success" style="display: none">
                  Ingredients Inserted Successfully!
                </div>
                <div class="alert alert-danger" role="alert" id="error" style="display: none">
                  Duplicate Ingredients Found
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
          <strong class="card-title">Ingredients</strong>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;
              $res = mysqli_query($conn, "SELECT * FROM `food_ingredients`");
              while($row = mysqli_fetch_array($res)){
                  $count = $count+1;
                  echo "<tr>";
                  echo "<td>";
                  echo $count;
                  echo "</td>";
                  echo "<td>";
                  echo $row["food_ingredients"];
                  echo "</td>";
                  echo "<td>";
                  ?> <a href="edit-ingredients.php?id=<?php echo $row["id"]; ?>" style="color: green">Edit</a> <?php echo"</td>";
                  echo "<td>";
                  ?> <a href="delete-ingredients.php?id=<?php echo $row["id"]; ?>" style="color: red" onclick="deleteCategory(<?php echo $row['id']; ?>)">Delete</a> <?php echo"</td>";
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
    $res = mysqli_query($conn, "SELECT * FROM `food_ingredients` WHERE `food_ingredients`= '$_POST[ingredients_name]'") or die(mysqli_error($conn));
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
        mysqli_query($conn, "INSERT INTO `food_ingredients` VALUES (NULL,'$_POST[ingredients_name]')") or die(mysqli_error($conn));
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




    