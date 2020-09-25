<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<h4>Pages</h4>
				<ul>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="checkout.php">My Account</a></li>
				</ul>
				<hr><h4>User Section</h4>
				<ul>
					<li><a href="checkout.php">Login</a></li>
					<li><a href="customerRegister.php">Register</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Top Categories</h4>
				<ul>
					<?php
						$get_product_cat="select * from product_category";
						$run_product_cat=mysqli_query($con, $get_product_cat);
						while($row=mysqli_fetch_array($run_product_cat)){
							$product_cat_id=$row['p_cat_id'];
							$product_cat_title=$row['p_cat_title'];
							
							echo "
								<li><a href='shop.php?product_cat_id$product_cat_id'>$product_cat_title</a></li>
							";
						}
					?>	
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Find Us</h4>
				<p>
					<strong>mukandarkasikandar.com</strong>
					<br>Mukandar
					<br>Sikandar
					<br>LoremIpsem@mukandarkasikandar.com
				</p>
				<a href="contact.php">Contact Us</a>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Get News</h4>
				<p class="text-muted">Subscribe to get news and sdkajdajd</p>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" name="email" class="form-control">
						<span class="input-group-btn">
							<input type="submit"class="btn btn-default" value="Subscribe">
						</span>
					</div>
				</form>
				<hr>
				<h4>Stay in touch with us</h4>
				<p class="social">
					<a href="#" ><i class="fab fa-facebook-square"></i></a>
					<a href="#" ><i class="fab fa-twitter-square"></i></a>
					<a href="#" ><i class="fab fa-instagram"></i></a>
					<a href="#" ><i class="fas fa-envelope"></i></a>
				</p>
			</div>
		</div>
	</div>
</div>

<div id="copyright">
	<div class="container">
		<div class="col-md-6">
			<p class="pull-left">&copy; 2020 Mukandar Ka Sikandar</p>
		</div>
	<div class="col-md-6">
			<p class="pull-right">Templete by: <a href="#">mukandarkasikandar.com</a></p>
		</div>

	</div>
</div>