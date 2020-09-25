<?php
	session_start();
	include("inc/db.php");
	include("function/function.php");

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>E Commerce site</title>

        <link rel="stylesheet" href="style/style.css">
        
		<script src="https://kit.fontawesome.com/74f12b28c5.js" crossorigin="anonymous"></script>
        
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>

	<body>
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offer">
                        <a href="#" class="btn btn-success btn-sm">
							<?php
								if(!isset($_SESSION['customer_email'])){
									echo(" Welcome Guest ");
								}else{
									echo("  Welcome: ".$_SESSION['customer_email']." ");
								}
							?>
						</a>
                        <a href="#"> Shopping Cart Total Price: INR <?php totoalPrice() ;?>, Total Items <?php itemInCart();?></a>
                    </div>

                    <div class="col-md-6">
                        <ul class="menu">
                            <li>
                                <a href="customerRegister.php"> Register</a>
                            </li>
                            <li>
                                <a href="checkout.php"> My Account</a>
                            </li>
                            <li>
                                <a href="cart.php"> Cart</a>
                            </li>
                            <li>
                                 <?php
									if(!isset($_SESSION['customer_email'])){
										echo("<a href='checkout.php'> Login</a>");
									}else{
										echo("<a href='logout.php'> Logout</a>");
									}
								?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-default" id="navbar">
            <div class="container">
               <div class="navbar-header">
                    <a class="navbar-brand home" href="index.php">
                        <img src="image/websitelogo/websitelogo.png" class="hidden-xs" alt="ECOGRASS">
                        <img src="image/websitelogo/websitelogosmall.png" class="visible-xs" alt="ECOGRASS">
                    </a>
					
				   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fas fa-align-justify"></i>
					</button>
					
				   <button type="button" class="collapse" data-toggle="navbar-toggle" data-target="#search">
						<span class="sr-only"></span>
						<i class="fas fa-search"></i>
					</button>
                </div>
				<div class="collapse navbar-collapse " id="navigation">
					<div class="padding-nav">
						<ul class=" nav navbar-nav mr-auto">
							<li class="nav-item ">
								<a href="index.php">Home</a>
							</li>
							<li class="nav-item ">
								<a href="shop.php">Shop</a>
							</li>
							<li class="nav-item">
								 <?php
									if(!isset($_SESSION['customer_email'])){
										echo("<a href='checkout.php'> My Account</a>");
									}else{
										echo("<a href='customer/myAccount?myOrder'> My Account</a>");
									}
								
								?>
							</li>
							<li class="nav-item active">
								<a href="cart.php">Shopping Cart</a>
							</li>
							<li class="nav-item">
								<a href="contactus.php">Contact Us</a>
							</li>
						</ul>
					</div>
					<a href="cart.php" class="btn btn-primary navbar-btn right">
						<i class="fas fa-shopping-cart"></i> 
						<span><?php itemInCart();?> items In Cart</span>
					</a>
					<div class="navbar-collapse collapse right">
						<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
							<span class="sr-only">Toggle Search</span>
							<i class="fas fa-search"></i>
						</button>
					</div>
					
					<div class="collapse clearfix" id="search">
						<form class="navbar-form" method="get" action="result.php">
							<div class="input-group" >
								<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
								<span class="input-group-btn">
									<button type="submit" value="Search" name="search" class="btn btn-primary">
										<i class="fas fa-search"></i>
									</button>
								</span>
							</div>
						</form>
					</div> 
				</div>
            </div>
        </nav>
		
		<div id="content">
			<div class="container">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li>Cart</li>
					</ul>
				</div>
				<div class="col-md-9 " id="cart">
					<div class="box">
						<form action="cart.php" method="post" enctype="multipart/form-data">
							<?php 
								$userIP=getUserIP();
								$select_cart="select * from cart where ip_address='$userIP'";
								$run_cart=mysqli_query($con,$select_cart);
								$count=mysqli_num_rows($run_cart);
							
							?>
							<h1>Shopping Cart</h1>
							<p class="text-muted">Currently you have <?php echo $count ;?> item(s) in your cart</p>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th colspan="2">Product</th>
											<th>Quentity</th>
											<th>Unit Price</th>
											<th>Size</th>
											<th colspan="1">Delete</th>
											<th colspan="1">Sub Total</th>
										</tr>
										</tr>
									</thead>
									<tbody>
										<?php 
											$total=0;
											while($row=mysqli_fetch_array($run_cart)){
												$product_id=$row['product_id'];
												$quantity=$row['quantity'];
												$product_size=$row['product_size'];
												
												$get_product="select * from product where product_id='$product_id'";
												$run_product_query=mysqli_query($con,$get_product);
												
												while($row=mysqli_fetch_array($run_product_query)){
													$product_title=$row['product_title'];
													$product_image_1=$row['product_image_1'];
													$product_price=$row['product_price'];
													$product_title=$row['product_title'];
												
													$sub_total=$row['product_price'] * $quantity;
													
													$total += $sub_total;
													
												}
										?>
										<tr>
											<td><img src="admin/image/product_image/<?php echo $product_image_1?>"></td>
											<td><?php echo $product_title?></td>
											<td><?php echo $quantity?></td>
											<td>INR <?php echo $product_price?></td>
											<td><?php echo $product_size?></td>
											<td><input type="checkbox" name="remove[]" value="<?php echo $product_id?>"</td>
											<td>INR <?php echo $sub_total?></td>
										</tr>
										<?php
											}
										?>
									</tbody>
								<tfoot>
									<tr>
										<th colspan="5">Total</th>
										<th colspan="2">INR <?php echo $total?></th>
									</tr>
								</tfoot>
								</table>
							</div>
						<div class="box-footer">
							<div class="pull-left">
								<a href="shop.php" class="btn btn-default"><i class="fas fa-chevron-left"></i> Continue shopping</a>
							</div>
							<div class="pull-right">
								<button type="submit" name="update" value="Update cart" class="btn btn-default"><i class="fas fa-sync-alt"></i> Update Cart</button> 
								<a href="checkout.php" class="btn btn-primary"> Proceed to checkout <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
						</form>
					</div>
				<?php 
					updateCart();
					echo(@$update_cart=updateCart());
				?>
				<div class="row same-height-row">
						<div class="col-md-3 col-sm-6">
							<div class="box same-height headline">
								<h3 class="text-center">Related Product</h3>
							</div>
						</div>
						<?php
							$get_product="select * from product order by 1 LIMIT 0,3";
							$run=mysqli_query($con,$get_product);
							while($row=mysqli_fetch_array($run)){
								$product_id=$row['product_id'];
								$product_title=$row['product_title'];
								$product_price=$row['product_price'];
								$product_image_1=$row['product_image_1'];
								
								echo "
									<div class='center-response col-md-3 col-sm-6'>
										<div class='product same-height'>
											<a href='detail.php?product_id=$product_id'>
												<img src='admin/image/product_image/$product_image_1' class='img-responsive'>
											</a>
											<div class='text' >
												<div class ='text'>
													<h3><a href='detail.php?product_id=$product_id'>$product_title</a></h3
													<center><p class='price'>INR $product_price</p></center>	
												</div>
												
											</div>
										</div>
									</div>

								";
							}
						?>
						
						
					</div>
		</div>
			<div class="col-md-3">
				<div class="box" id="order-summary">
					<div class="box-header">
						<h3> Oredr Summary</h3>
					</div>
					<p class="text-muted"> Shipping and additional cost are calculated based on value you have entered</p>
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>Order Subtotal</td>
									<td>INR <?php echo $total ;?></td>
								</tr>
								<tr>
									<td>Shipping Charges</td>
									<td>INR 0</td>
								</tr>
								<tr>
									<td>TAX</td>
									<td>INR 0</td>
								</tr>
								<tr class="total">
									<td>Total</td>
									<td>INR <?php echo $total ;?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
		<?php include("inc/footer.php")?>
		
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
