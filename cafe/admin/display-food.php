<?php
include "db-connection.php";
include "header.php";
?>

<!-- .content area -->
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Display Foods</h1>
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
        
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">food image</th>
                <th scope="col">food name</th>
                <th scope="col">food category</th>
                <th scope="col">food description</th>
                <th scope="col">food original price</th>
                <th scope="col">food discount price</th>
                <th scope="col">food availibility</th>
                <th scope="col">food veg nonveg</th>
                <th scope="col">food ingredients</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete </th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;
              $res = mysqli_query($conn, "SELECT * FROM `food`");
              while($row = mysqli_fetch_array($res)){
                  $count = $count+1;
                  echo "<tr>";
                  echo "<td>"; echo $count; echo "</td>";
                  echo "<td>"; ?><img src="<?php echo $row["food_image"]; ?>">  <?php echo "</td>";
                  echo "<td>"; echo $row["food_name"]; echo "</td>";
                  echo "<td>"; echo $row["food_category"]; echo "</td>";
                  echo "<td>"; echo $row["food_description"]; echo "</td>";
                  echo "<td>"; echo $row["food_original_price"]; echo "</td>";
                  echo "<td>"; echo $row["food_discount_price"]; echo "</td>";
                  echo "<td>"; echo $row["food_availibility"]; echo "</td>";
                  echo "<td>"; echo $row["food_veg_nonveg"]; echo "</td>";
                  echo "<td>"; echo $row["food_ingredients"]; echo "</td>";
                  echo "<td>";
                  ?> <a href="edit-food.php?id=<?php echo $row["id"]; ?>" style="color: green">Edit</a> <?php echo"</td>";
                  echo "<td>";
                  ?> <a href="delete-food.php?id=<?php echo $row["id"]; ?>" style="color: red" onclick="deleteCategory(<?php echo $row['id']; ?>)">Delete</a> <?php echo"</td>";
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
include "footer.php";
?>
