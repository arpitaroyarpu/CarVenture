<?php
include "header.php";
// include "hero.html";
include "slider.php";
include "../admin/db-connection.php";
?>

<title>Home Page</title>

<!-- Products Section -->
<section class="products-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>Our Products</h2>
        </div>

        <!-- MixitUp Galery -->
        <div class="mixitup-gallery">

            <!-- Filter -->
            <div class="filters clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all">All</li>

                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM `food-categories`");

                    while ($row = mysqli_fetch_array($res)) {
                        $data_filter = "." . $row["food-categories"];
                        ?>
                        <li class="filter" data-role="button" data-filter="<?php echo $data_filter; ?>"><?php echo $row["food-categories"]; ?> </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="filter-list row clearfix">

                <?php
                $res = mysqli_query($conn, "SELECT * FROM `food`");

                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <!-- Products Block -->
                    <div class="product-block all mix <?php echo $row["food_category"]; ?> fest wraps fries col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="../admin/<?php echo $row["food_image"]; ?>" alt="">
                            </figure>
                            <div class="lower-content">
                                <h4><a href="food-description.php?id=<?php echo $row["id"]; ?>"> <?php echo $row["food_name"]; ?></a></h4>
                                <div class="text"><?php echo substr($row["food_description"], 0, 30); ?>..</div>
                                <div class="price">৳<?php echo $row["food_discount_price"]; ?></div>
                                <div class="lower-box">
                                    <a href="food-description.php?id=<?php echo $row["id"]; ?>" class="theme-btn btn-style-five"><span class="txt">Order Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Products Section -->

    <?php
    include "delivery.php";
    // include "service.php";
    include "footer.php";
    ?>
