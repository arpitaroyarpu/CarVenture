<?php
session_start();
include "header.php";
include "../admin/db-connection.php";
?>

<link href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  rel = "stylesheet">

<section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
    <div class="auto-container">
        <h1>View Cart</h1>

    </div>
</section>

<?php

if (load_cart_data() > 0) {



?>

    <!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">

            <!--Cart Outer-->
            <div class="cart-outer">
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                                <th>Preview</th>
                                <th class="prod-column">product</th>
                                <th class="price">Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $max = 0;
                            $count = 0;
                            $grand_total = 0;

                            if (isset($_SESSION["cart"])) {
                                $max = sizeof($_SESSION["cart"]);
                            }

                            for ($i = 0; $i < $max; $i++) {
                                if (isset($_SESSION['cart'][$i])) {
                                    $img_session = "";
                                    $nm_session = "";
                                    $price_session = "";
                                    $qty_total_session = "";
                                    $tb_id_session = "";
                                    $unit_session = "";


                                    foreach ($_SESSION['cart'][$i] as $key => $val) {

                                        if ($key == "img1") {
                                            $img_session = $val;
                                        }
                                        if ($key == "nm") {
                                            $nm_session = $val;
                                        }
                                        if ($key == "price") {
                                            $price_session = $val;
                                        }

                                        if ($key == "qty_total") {
                                            $qty_total_session = $val;
                                        }
                                        if ($key == "tb_id") {
                                            $tb_id_session = $val;
                                        }
                                        if ($key == "unit") {
                                            $unit_session = $val;
                                        }
                                    }






                            ?>
                                    <?php

                                    if ($img_session != "" && $img_session != null) {
                                        $count = $count + 1;
                                        $grand_total = $grand_total + ($price_session * $qty_total_session);



                                    ?>

                                        <tr>
                                            <td class="prod-column">
                                                <div class="column-box">
                                                    <figure class="prod-thumb"><a href="#"><img src="../admin/<?php echo $img_session ?>" alt=""></a></figure>
                                                </div>
                                            </td>
                                            <td>
                                                <h4 class="prod-title"><?php echo $nm_session ?></h4>
                                            </td>
                                            <td class="sub-total">৳<?php echo $price_session ?></td>

                                            <td class="qty">
                                                <div class="item-quantity"><input class="quantity-spinner" type="text" id="qty<?php echo $i;?>" value="<?php echo $qty_total_session ?>" name="quantity"></div>
                                            </td>

                                            <td class="price">৳<?php echo $price_session * $qty_total_session; ?></td>

                                            <td> 
                                                <a href="#" class="remove-btn" 
                                                 onclick="delete_product('<?php echo $tb_id_session ?>')">
                                                        <span class="fa fa-times"></span>
                                                    </a>
                                                <a href="#" class="remove-btn" style="color:green" 
                                                onclick="update_product('<?php echo $tb_id_session ?>','<?php echo $i ?>')">
                                                <span class="fa fa-refresh"></span>
                                            </a>

                                            
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                            <?php


                                }
                            }


                            ?>


                        </tbody>
                    </table>
                </div>



                <div class="row clearfix">

                    <div class="column col-lg-7 col-md-12 col-sm-12"></div>

                    <div class="column pull-right col-lg-5 col-md-12 col-sm-12">
                        <!--Totals Table-->
                        <ul class="totals-table">
                            <li>
                                <h3>Cart Totals</h3>
                            </li>

                            <li class="clearfix total"><span class="col">Grand Total</span><span class="col price">৳<?php echo $grand_total ?></span></li>
                            <form id="checkoutForm" action="order.php" method="post">
											<!-- Your form fields here -->
											<!-- ... -->
										
											<li class="text-right">
												<button type="submit" class="theme-btn btn-style-five proceed-btn">
													<span class="txt">Proceed to Checkout</span>
												</button>
											</li>
										</form>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Cart Section-->
<?php
} else {
    echo "<div style = 'hight:200px; width: 100%; text-align: center'>";
    echo "<h4>No Quantity Available</h4>";
}

?>

<?php
function load_cart_data()
{
    $count = 0;
    $max = 0;
    if (isset($_SESSION['cart'])) {
        $max = sizeof($_SESSION['cart']);
    }
    for ($i = 0; $i < $max; $i++) {
        if (isset($_SESSION['cart'][$i])) {
            $img1_session = "";
            foreach ($_SESSION['cart'][$i] as $key => $val) {
                if ($key == "img1") {
                    $img1_session = $val;
                }
            }

            if ($img1_session != "" && $img1_session != null) {
                $count = $count + 1;
            }
        }
    }
    return $count;
}

?>

<script type = "text/javascript">
function delete_product(tb_id, qtyid){
    var xmlhttp1 = new XMLHttpRequest();
        xmlhttp1.onreadystatechange = function () {
            if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                window.location = "view-cart.php";
            }
        };
        xmlhttp1.open("GET", "delete_from_cart.php? tb_id=" +tb_id, true);
        xmlhttp1.send();

}

function update_product(tb_id, qtyid) {
    var qty = "qty" + qtyid;
    var qtyInput = document.getElementById(qty);
    var newQty = qtyInput.value;

    var xmlhttp1 = new XMLHttpRequest();

    xmlhttp1.onreadystatechange = function () {
        if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
            alert("Cart updated successfully");

            // Update the total price in the table
            var totalPriceCell = document.getElementById("totalPrice" + qtyid);
            var pricePerItem = parseFloat(<?php echo $price_session ?>); // Price per item from PHP
            var newTotalPrice = pricePerItem * newQty;
            totalPriceCell.textContent = '৳' + newTotalPrice.toFixed(2);
        }
    };

    xmlhttp1.open("GET", "update_from_cart.php?id=" + id + "&qty=" + newQty, true);
    xmlhttp1.send();
}



</script>




<?php

include "footer.php";
?>

<script>
		document.getElementById('checkoutForm').addEventListener('submit', function (event) {
			// Prevent the default form submission behavior
			event.preventDefault();
	
			// Redirect to the "order.php" page
			window.location.href = 'checkout.html';
		});
	</script>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.fancybox.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/jquery.bootstrap-touchspin.js"></script>
<script src="assets/js/appear.js"></script>
<script src="assets/js/script.js"></script>