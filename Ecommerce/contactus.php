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
							<li class="nav-item">
								<a href="cart.php">Shopping Cart</a>
							</li>
							<li class="nav-item active">
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
						<li>Contact Us</li>
					</ul>
				</div>
				<div class="col-md-3">
					<?php include("inc/sidebar.php");?>
				</div>
				<div class="col-md-9">
					<div class="box">
						<div class="box-header">
							<center>
								<h2>Contact us</h2>
								<p class="text-muted">Lorem ipsem xala jkass hhiuhsns asjkshd sdjkhsdksad sdkajdsad dksjsadkjas aierwuweoiurwe wreweruiwe kjhwej</p>
							</center>
						</div>
						<form action="contactus.php" method="post">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Subject</label>
								<input type="text" name="subject" required="" class="form-control">
							</div>
							
							<div class="form-group">
								<label>Message</label>
								<textarea style="width: 100%; resize: vertical" name="message" class="form-control"></textarea>
							</div>
							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="fas fa-user"></i> Send Message
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
		$senderName=$_POST['name'];
		$senderEmail=$_POST['email'];
		$senderSubject=$_POST['subject'];
		$senderMessage=$_POST['message'];
		
		$reciverEmail="djhgsd@jhds.jh";
		mail($reciverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail);
		
		$email=$_POST['email'];
		$subject='Welcome to our website';
		$message='WE will get intouch with you !';
		$from='mukadarkasikandar@gmail.com';
		mail($email,$subject,$message,$from);
		
		echo("<h2><center>WE have send your mail</center></h2>");
		
	}
?>