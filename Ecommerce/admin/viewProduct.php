<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb"> 
			<li class="active">
				<i class=" fa fa-dashboard"></i> Dashboard / View Product
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class=" panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fas fa-swatchbook"></i> View Product's
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<td> Product ID </td>
								<td> Product Title </td>
								<td> Product Image</td>
								<td> Product Price</td>
								<td> Product Keyword</td>
								<td> Product Date </td>
								<td> Product Delete </td>
								<td> Product Edit</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_pro="select *from product";
								$run_pro=mysqli_query($con,$get_pro);
								while($row_pro=mysqli_fetch_array($run_pro)){
									$product_id=$row_pro['product_id'];
									$product_title=$row_pro['product_title'];
									$product_image_1=$row_pro['product_image_1'];
									$product_price=$row_pro['product_price'];
									$product_keyword=$row_pro['product_keyword'];
									$date=$row_pro['date'];
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $product_title;?></td>
								<td><img src="image/product_image/<?php echo $product_image_1;?>" width="50" height="40"></td>
								<td><?php echo $product_price;?></td>
								<td><?php echo $product_keyword;?></td>
								<td><?php echo $date;?></td>
								<td>
									<a href="index.php?deleteProduct=<?php echo $product_id;?>">
										<i class="fas fa-trash-alt"></i> Delete
									</a>
								</td>
								<td>
									<a href="index.php?editProduct=<?php echo $product_id;?>">
										<i class="fas fa-pencil-alt"></i> Edit
									</a>
								</td>
								<?php
								}
								?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
		 }
?>