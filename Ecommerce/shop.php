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
                                 <?php
									if(!isset($_SESSION['customer_email'])){
										echo("<a href='checkout.php'> My Account</a>");
									}else{
										echo("<a href='customer/myAccount?myOrder'> My Account</a>");
									}
								
								?>
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
							<li class="nav-item active">
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
							<li class="nav-item">
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
						<li>Shop</li>
					</ul>
				</div>
				<div class="col-md-3">
					<?php include("inc/sidebar.php");?>
				</div>
				<div class="col-md-9">
					<?php
					if(!isset($_GET['p_cat']) ){
						if(!isset($_GET['cat_id'])){
							echo "
							<div class='box'>
								<h1>Shop</h1>
								<p>Lorem ipsem xala jkass hhiuhsns asjkshd sdjkhsdksad sdkajdsad dksjsadkjas aierwuweoiurwe wreweruiwe kjhwej djhds sksis sdhjdue duhf euehed duede dndued duedend uhdh</p>
							</div>
							";
						}
					}
					?>
					
					<div class="row">
						<?php
							if(!isset($_GET['p_cat']) ){
								if(!isset($_GET['cat_id'])){
									$per_page=6;
									if(isset($_GET['page'])){
										$page=$_GET['page'];
									}else{
										$page=1;
									}
									
									$start_page=($page-1) * $per_page ;
									$get_product="select * from product order by 1 DESC LIMIT $start_page, $per_page";
									$run_product=mysqli_query($con, $get_product);
									while($row=mysqli_fetch_array($run_product)){
										$product_id=$row['product_id'];
										$product_title=$row['product_title'];
										$product_price=$row['product_price'];
										$product_image_1=$row['product_image_1'];
										
										echo"
											<div class='col-md-4 col-sm-6 center responsive'>
												<div class='product'>
													<a href='detail.php?product_id=$product_id'>
														<img src='admin/image/product_image/$product_image_1' class='img-responsive'>
													</a>
													<div class='text'>
														<h3>
															<a href='detail.php?product_id=$product_id'>$product_title</a>
														</h3>
														<p class='price'>INR $product_price</p>
														<p class='buttons'>
															<a href='detail.php?product_id=$product_id' class='btn btn-default'> View Details</a>
															<a href='detail.php?product_id=$product_id' class='btn btn-primary'> <i class='fas fa-shopping-cart'></i> Add to Cart</a>
														</p>
													</div>
												</div>
											</div>
										";
									}
									
								?>
						
					</div>
					
					<center>
						<ul class="pagination">
							<?php
									$query="select * from product";
									$run_query=mysqli_query($con, $query);
									$total_records=mysqli_num_rows($run_query);
									$total_pages=ceil($total_records/$per_page);
									echo("
										<li><a href='shop.php?page=1'>".'First Page'."</a></li>
									");
									for($i=1;$i<=$total_pages;$i++){
										echo("
											<li><a href='shop.php?page=".$i."'>".$i."</a></li>
										");
									};
									echo("
											<li><a href='shop.php?page=$total_pages'>".'Last Page'."</a></li>
										");
								}
							}
							?>
						</ul>
					</center>
					<?php 
						get_Product_cat();
						get_cat();
					?>
				</div>
			</div>
		</div>
		
		<?php include("inc/footer.php")?>
		
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
