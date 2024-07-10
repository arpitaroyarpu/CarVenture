<?php
include "header.php";

?>
<section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
			<div class="auto-container">
				<h1>Shoping Cart</h1>
				<ul class="bread-crumb clearfix">
					<li><a href="index-2.html">Home</a></li>
					<li><a href="shop.html">Shop</a></li>
					<li>Cart</li>
				</ul>
			</div>
		</section>

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
								<tr>
									<td class="prod-column">
										<div class="column-box">
											<figure class="prod-thumb"><a href="#"><img
														src="assets/images/resource/products/8.jpg" alt=""></a></figure>
										</div>
									</td>
									<td>
										<h4 class="prod-title">Burger</h4>
									</td>
									<td class="sub-total">$25.00</td>
									<td class="qty">
										<div class="item-quantity"><input class="quantity-spinner" type="text" value="2"
												name="quantity"></div>
									</td>
									<td class="price">$25.00</td>
									<td><a href="#" class="remove-btn"><span class="fa fa-times"></span></a></td>
								</tr>

							</tbody>
						</table>
					</div>

					<div class="cart-options clearfix">
						<div class="pull-left">
							<div class="apply-coupon clearfix">
								<div class="form-group clearfix">
									<input type="text" name="coupon-code" value="" placeholder="Coupon Code">
								</div>
								<div class="form-group clearfix">
									<button type="button" class="theme-btn coupon-btn">Apply Coupon</button>
								</div>
							</div>
						</div>

						<div class="pull-right">
							<button type="button" class="theme-btn btn-style-five cart-btn"><span class="txt">Add to
									cart</span></button>
						</div>

					</div>

					<div class="row clearfix">

						<div class="column col-lg-7 col-md-12 col-sm-12"></div>

						<div class="column pull-right col-lg-5 col-md-12 col-sm-12">
							<!--Totals Table-->
							<ul class="totals-table">
								<li>
									<h3>Cart Totals</h3>
								</li>
								<li class="clearfix"><span class="col">Sub Total</span><span class="col">$25.00</span>
								</li>
								<li class="clearfix total"><span class="col">Total</span><span
										class="col price">$25.00</span></li>
								<li class="text-right"><button type="submit"
										class="theme-btn btn-style-five proceed-btn"><span class="txt">Proceed to
											Checkout</span></button></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!--End Cart Section-->




<?php
include "delivery.php";
include "service.php";
include "footer.php";
?>







