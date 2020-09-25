<?php
	session_start();
	include("inc/db.php");
	include("function/function.php");
?>
<?php
	if(isset($_GET['product_id'])){
		
		$product_id=$_GET['product_id'];
		
		$get_product="select * from product where product_id='$product_id'";
		
		$run_product_query=mysqli_query($con,$get_product);
		$row_product=mysqli_fetch_array($run_product_query);
		
		$p_cat_id=$row_product['p_cat_id'];
		$product_title=$row_product['product_title'];
		$product_price=$row_product['product_price'];
		$product_desc=$row_product['product_desc'];
		$product_image_1=$row_product['product_image_1'];
		$product_image_2=$row_product['product_image_2'];
		$product_image_3=$row_product['product_image_3'];
		
		$get_product_cat="select * from product_category where p_cat_id='$p_cat_id'";
		$run_p_cat=mysqli_query($con, $get_product_cat);
		$row_p_cat=mysqli_fetch_array($run_p_cat);
		$p_cat_id=$row_p_cat['p_cat_id'];
		$p_cat_title=$row_p_cat['p_cat_title'];
	}
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
						<li><a href="shop.php">Shop</a></li>
						<li><a href="shop.php?p_cat=<?php echo $p_cat_id;?>"><?php echo $p_cat_title;?></a></li>
						<li><?php echo $product_title ;?></li>
					</ul>
				</div>
				<div class="col-md-3">
					<?php include("inc/sidebar.php");?>
				</div>
				<div class="col-md-9">
					<div id="productmain" class="row">
						<div class="col-sm-6">
							<div id="mainimage">
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="myCarousel" data-slide-to="0" class="active"></li>
										<li data-target="myCarousel" data-slide-to="1" ></li>
										<li data-target="myCarousel" data-slide-to="2" ></li>
										
									</ol>
									<div class="carousel-inner">
										<div class="item active">
											<center><img src="admin/image/product_image/<?php echo $product_image_1?>" class="img-responsive"></center>
										</div>
										<div class="item">
											<center><img src="admin/image/product_image/<?php echo $product_image_2?>" class="img-responsive"></center>
										</div>
										<div class="item">
											<center><img src="admin/image/product_image/<?php echo $product_image_3?>" class="img-responsive"></center>
										</div>
									</div>
									<a href="#myCarousel" class="left carousel-control" data-slide="prev">
										<samp class="glyphicon glyphicon-chevron-left"></samp>
										<span class="sr-only">Previous</span>
									</a>

									<a href="#myCarousel" class="right carousel-control" data-slide="next">
										<samp class="glyphicon glyphicon-chevron-right"></samp>
										<span class="sr-only">Next</span>
									</a>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="box">
								<h1 class="text-center"><?php echo $product_title?></h1>
								<?php addToCart() ;?>
								<form class="form-horizontal" method="post" action="detail.php?add_cart=<?php echo $product_id; ?>">
									<div class="form-group">
										<label class="col-md-5 control-label">Product Quantity</label>
										<div class="col-md-7">
											<select name="product_qty" class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-5 control-label">Product size</label>
										<div class="col-md-7">
											<select name="product_size" class="form-control">
												<option>Select size</option>
												<option>Extra Large</option>
												<option>Large</option>
												<option>Medium</option>
												<option>Small</option>
												<option>Extra Small</option>
											</select>
										</div>
									</div>
									<p class="price">INR <?php echo $product_price?></p>
									<p class="buttons text-center">
										<button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
									</p>
								</form>
							</div>
							<div class="col-xs-4">
									<a class="thumb" href="#">
										<img src="admin/image/product_image/<?php echo $product_image_1?>" class="img-responsive">
									</a>
								</div>
							<div class="col-xs-4">
									<a class="thumb" href="#">
										<img src="admin/image/product_image/<?php echo $product_image_2?>" class="img-responsive">
									</a>
								</div>
							<div class="col-xs-4">
								<a class="thumb" href="#">
									<img src="admin/image/product_image/<?php echo $product_image_3?>" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
					<div class="box" id="details">
						<h4>Product Details</h4>
						<p>
							<?php echo $product_desc ;?>	
						</p>
						<h4>Size</h4>
						<ul>
							<li>Extra Large</li>
							<li>Large</li>
							<li>Medium</li>
							<li>Small</li>
							<li>Extra Small</li>
						</ul>
					</div>
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
		</div>
		
		<?php include("inc/footer.php");?>
		
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
