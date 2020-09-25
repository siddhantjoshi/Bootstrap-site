<?php
		session_start();
	if(!isset($_SESSION['customer_email'])){
		echo("<script>window.open('../checkout.php','_self')</script>");
	}else{
		include("inc/db.php");
		include("../function/function.php");
		
		if(isset($_GET['order_id'])){
			$order_id=$_GET['order_id'];
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
                                <a href="../customerRegister.php"> Register</a>
                            </li>
                            <li>
                                <a href="myAccount.php"> My Account</a>
                            </li>
                            <li>
                                <a href="../cart.php"> Cart</a>
                            </li>
                            <li>
                                 <?php
									if(!isset($_SESSION['customer_email'])){
										echo("<a href='../checkout.php'> Login</a>");
									}else{
										echo("<a href='../logout.php'> Logout</a>");
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
                        <img src="images/websitelogo/websitelogo.png" class="hidden-xs" alt="ECOGRASS">
                        <img src="images/websitelogo/websitelogosmall.png" class="visible-xs" alt="ECOGRASS">
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
								<a href="../index.php">Home</a>
							</li>
							<li class="nav-item ">
								<a href="../shop.php">Shop</a>
							</li>
							<li class="nav-item active">
								<a href="myAccount.php">My Account</a>
							</li>
							<li class="nav-item">
								<a href="../cart.php">Shopping Cart</a>
							</li>
							<li class="nav-item">
								<a href="../contactus.php">Contact Us</a>
							</li>
						</ul>
					</div>
					<a href="cart.php" class="btn btn-primary navbar-btn right">
						<i class="fas fa-shopping-cart"></i> 
						<span>4 items In Cart</span>
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
		
		<div id="content-----**">
			<div class="container">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li>My Account</li>
					</ul>
				</div>
				<div class="col-md-3">
					<?php include("inc/sidebar.php");?>
				</div>
				<div class="col-md-9">
					<div class="box">
						<h1 align="center">Please Conform your payment</h1>
						<form action="confirm.php?updateid=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Invoice Number</label>
								<input type="number" class="form-control" name="invoice_number" required="">
							</div>
							<div class="form-group">
								<label>Amount</label>
								<input type="number" class="form-control" name="amount" required="">
							</div>
							<div class="form-group">
								<label>Select payment mode</label>
								<select class="form-control" name="payment_mode" >
									<option>Bank Transfer</option>
									<option>PayPal</option>
									<option>PayTM</option>
									<option>PayUMoney</option>
								</select>
							</div>
							<div class="form-group">
								<label>Transection Number</label>
								<input type="text" class="form-control" name="trfr_number" required="">
							</div>
							<div class="form-group">
								<label>Payment Date</label>
								<input type="date" class="form-control" name="date" required="">
							</div>
							<div class="text-center">
								<button class="btn btn-primary btn-lg" type="submit" name="conform_payment">
									Confirm Payment
								</button>
							</div>
						</form>
						<?php
							if(isset($_POST['conform_payment'])){
								$order_id=$_GET['order_id'];
								$invoice_id=$_POST['invoice_number'];
								$amount=$_POST['amount'];
								$payment_mode=$_POST['payment_mode'];
								$trfr_number=$_POST['trfr_number'];
								$payment_date=$_POST['date'];
								$complete="complete";
								
								$insert="insert into payment(invoice_id,amount,payment_mode,reference_no,payment_date) values('$invoice_id','$amount','$payment_mode','$trfr_number','$payment_date')";
								$run=mysqli_query($con,$insert);
								
								$update_customer_order="update customer_order set order_status='$complete' where order_id='$order_id'";
								$run_customer_order=mysqli_query($con,$update_customer_order);
								echo("<script>alert('payment has been conformed')</script>");//								$update_pending_order="update pending_order set order_status='$complete' where order_id='$order_id'";
//								$run_pending_order=mysqli_query($con,$update_pending_order);
//								
								
								
							}
						?>
					</div>
				</div>
				
			</div>
		</div>
		
		<?php include("inc/footer.php")?>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
?>