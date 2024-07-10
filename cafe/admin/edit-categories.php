

<?php
include "db-connection.php";
include "header.php";

$id = $_GET["id"];
$category_name = "";
$res = mysqli_query($conn, "SELECT * FROM `food-categories` where id= $id");
while($row = mysqli_fetch_array($res))
{
    $category_name = $row["food-categories"];
}
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
                  <input id="food_category" name="food_category" type="text" class="form-control" aria-invalid="false" placeholder="Enter Category" required value="<?php echo $category_name;?>">
                </div>
                <div>
                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit1">
                    <span id="payment-button-amount">Update</span>
                  </button>
                </div>
                <br>
                <div class="alert alert-success" role="alert" id="success" style="display: none">
                  Category Updated Successfully!
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
        mysqli_query($conn, "UPDATE `food-categories` SET `food-categories`='$_POST[food_category]' WHERE id = $id") or die(mysqli_error($conn));
        ?>
        <script type="text/javascript">
          document.getElementById("error").style.display = "none";
          document.getElementById("success").style.display = "block";     
          setTimeout(function(){
            window.location.href = "food-categories.php";
          },1000);
        </script>
        <?php
    }
}
?>

<?php
include "footer.php";
?>
