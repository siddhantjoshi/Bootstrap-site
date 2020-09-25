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
							<li class="nav-item active">
								<a href="index.php">Home</a>
							</li>
							<li class="nav-item">
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
		
		<div class="container" id="slider">
			<div class="col-md-12">
				<div class="carousel slide" id="myCarousel" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="myCarousel" data-slide-to="0" class="action"></li>
						<li data-target="myCarousel" data-slide-to="1" ></li>
						<li data-target="myCarousel" data-slide-to="2" ></li>
						<li data-target="myCarousel" data-slide-to="3" ></li>
					</ol>
					<div class="carousel-inner">
						<?php
							//query to get the data in variable $get_slider_image
							$get_slider_image="select * from slider LIMIT 0,1";
							
							//execute the query and store it in $run_slider
							$run_slider=mysqli_query($con, $get_slider_image);
							
							while($row=mysqli_fetch_array($run_slider)){
								$slider_name=$row['slider_name'];
								$slider_image=$row['slider_image'];
								
								echo "<div class='item active'><img src='admin/image/slider_image/$slider_image'></div>";
							}	
						?>
						<?php
							$get_slider_image="select * from slider LIMIT 1,3";
							$run_slider=mysqli_query($con, $get_slider_image);
							while($row=mysqli_fetch_array($run_slider)){
								$slider_name=$row['slider_name'];
								$slider_image=$row['slider_image'];
								echo "<div class='item'><img src ='admin/image/slider image/$slider_image'></div>";
								
							}
						?>
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
		
		<div id="advantage">
			<div class="container">
				<div class="same-height-row">
					<div class="col-sm-4">
						<div class="box same-height">
							<div class="icon">
								<i class="fas fa-heart"></i>
							</div>
							<h3>
								<a href="#">Best Price</a>
							</h3>	
								<p>dshdsa sdakdjs sdakljsda sadkjdajdjk dsakjasdjka sadkjdsa asdlkjasdsad dlsakjsad aslkj</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="box same-height">
							<div class="icon">
								<i class="fas fa-heart"></i>
							</div>
							<h3>
								<a href="#">Best Price</a>
							</h3>	
								<p>dshdsa sdakdjs sdakljsda sadkjdajdjk dsakjasdjka sadkjdsa asdlkjasdsad dlsakjsad aslkj</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="box same-height">
							<div class="icon">
								<i class="fas fa-heart"></i>
							</div>
							<h3>
								<a href="#">Best Price</a>
							</h3>	
								<p>dshdsa sdakdjs sdakljsda sadkjdajdjk dsakjasdjka sadkjdsa asdlkjasdsad dlsakjsad aslkj</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="hotbox">
			<div class="box">
				<div class="container">
					<div class="col-md-12">
						<h2> Latest This Week</h2>
					</div>
				</div>
			</div>
		</div>
		
		<div id="content" class="container">
			<div class="row">
			<?php getProduct();?>	
			</div>
		</div>
		
		<?php include("inc/footer.php")?>
		
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
