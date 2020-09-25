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
							<li class="nav-item">
								<a href="cart.php">Shopping Cart</a>
							</li>
							<li class="nav-item ">
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
						<li>Registratation</li>
					</ul>
				</div>
				<div class="col-md-3">
					<?php include("inc/sidebar.php")?>
				</div>
				<div class="col-md-9">
					<div class="box">
						<div class="box-header">
							<center>
								<h2>Customer registratation</h2>
							</center>
						</div>
						<form action="customerRegister.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Customer Name</label>
								<input type="text" name="c_name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Customer Email</label>
								<input type="email" name="c_email" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Customer Password</label>
								<input type="password" name="c_password" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Country</label>
								<input type="text" name="c_country" required="" class="form-control">
							</div>
							
							<div class="form-group">
								<label>City</label>
								<input type="text" name="c_city" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Contact Number</label>
								<input type="tel" name="c_number" required="" class="form-control">
							</div>
							
							<div class="form-group">
								<label>Address</label>
								<textarea style="width: 100% ;resize: vertical;" name="c_address" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="c_image" required="" class="form-control">
							</div>
							
							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="fas fa-user"></i> Register
								</button>
							</div>
							
						</form>
					</div>
				</div>
				
			</div>
		</div>
		
		<?php include("inc/footer.php")?>
		
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_password=$_POST['c_password'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_number=$_POST['c_number'];
	$c_address=$_POST['c_address'];
	$c_image=$_FILES['c_image']['name'];
	$c_temp_image=$_FILES['c_image']['tmp_name'];
	$userIP=getUserIP();
	
	move_uploaded_file($c_temp_image,"customer/customer_image/$c_image");
	$insert_new_customer="insert into customer(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_number','$c_address','$c_image','$userIP')";
	
	$run_customer_query=mysqli_query($con,$insert_new_customer);
	$select_cart="select * from cart where ip_address='$userIP'";
	
	$run_select_cart_query=mysqli_query($con,$select_cart);
	
	$check_cart=mysqli_num_rows($run_select_cart_query);
	
	if($check_cart > 0){
		$_SESSION['customer_email']=$c_email;
		echo("
			<script>alert('You are register sucessfully')</script>
			<script>window.open('checkout.php','_self')</script>
		");
		
	}else{
		$_SESSION['customer_email']=$c_email;
		echo("
			<script>alert('You are register sucessfully')</script>
			<script>window.open('index.php','_self')</script>
		");
	}
}
?>