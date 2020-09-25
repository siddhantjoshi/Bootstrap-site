
<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>

<div class="row" style="align-content: ">
	<div class="col-lg-12">
		<h1 class="page-header"> Dashboard</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fas fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pro ;?></div>
						<div>Product</div>
					</div>
				</div>
			</div>
			<a href="index.php?viewProduct">
				<div class="panel-footer">
				<span class="pull-left"> View Details</span>
				<span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fas fa-comments fa-5x" style="padding: 2px"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_cust ;?></div>
						<div>Customer</div>
					</div>
				</div>
			</div>
			<a href="index.php?viewCustomer">
				<div class="panel-footer">
				<span class="pull-left"> View Details</span>
				<span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fas fa-shopping-cart fa-5x" style="padding: 2px"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pro_cat ;?></div>
						<div>Product Categories</div>
					</div>
				</div>
			</div>
			<a href="index.php?viewProductCat">
				<div class="panel-footer">
				<span class="pull-left"> View Details</span>
				<span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fas fa-life-ring fa-5x" style="padding: 2px"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_cust_order ;?></div>
						<div>Order's</div>
					</div>
				</div>
			</div>
			<a href="index.php?viewOrder">
				<div class="panel-footer">
				<span class="pull-left"> View Details</span>
				<span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-8">
		<div class=" panel panel-primary">
			<div class="panel-heading">
			<h3 class="panel-title"><i class="fas fa-money fa-fw"></i> New Order's </h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Order No :</th>
								<th>Customer Email :</th>
								<th>Invoice No :</th>
								<th>Product ID :</th>
								<th>Quantity :</th>
								<th>Size :</th>
								<th>Status :</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
		  						$get_order="select * from customer_order order by 1 DESC LIMIT 0,5";
		  						$run_order=mysqli_query($con,$get_order);
		  						while($row_order=mysqli_fetch_array($run_order)){
									$order_id=$row_order['order_id'];
									$customer_id=$row_order['customer_id'];
									$product_id=$row_order['product_id'];
									$invoice_no=$row_order['invoice_no'];
									$quantity=$row_order['quantity'];
									$size=$row_order['size'];
									$order_status=$row_order['order_status'];
									$i++;
							?>
							<tr>
								
								<td><?php echo $i ?></td>
								<td><?php
										$get_cust="select * from customer where customer_id='$customer_id'";
										$run_cust=mysqli_query($con,$get_cust);
										$row_cust=mysqli_fetch_array($run_cust);
										echo $row_cust['customer_email'];
									?>
								</td>
								<td><?php echo $product_id ;?></td>
								<td><?php echo $invoice_no ;?></td>
								<td><?php echo $quantity ;?></td>
								<td><?php echo $size ;?></td>
								<td><?php echo $order_status ;?></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="text-right">
					<a href="index.php?viewOrder"> View all order's  <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel">
			<div class="panel-body">
				<div class="thumb-info mb-md">
					<img src="image/admin_image/<?php echo $admin_image?>" class="img-responsive img-rounded">
					<div class="page-header">
						<h3>
							<?php echo($admin_name)?> 
							<small><?php echo($admin_level)?></small>
						</h3>
					</div>
				</div>
				<div class="mb-md">
					<div class="widget-content-expanded">
						<i class="fas fa-user"></i><span> Email :</span> <?php echo($admin_email)?><br>
						<i class="fas fa-globe-asia"></i><span> Country :</span> <?php echo($admin_country)?><br>
						<i class="fas fa-phone-alt"></i><span> Contact :</span> <?php echo($admin_contact)?><br>
					</div>
					<hr class="dotted short">
					<h5 class="text-muted"> About </h5>
					<p>
						<?php echo($about_admin)?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

		 }
?>