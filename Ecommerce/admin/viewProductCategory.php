<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>
<div class="row">
	<div class=" col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Product Category
			</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fas fa-th-list"></i> View Product Category
					</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<td> Product Category ID </td>
								<td> Product Category Title </td>
								<td> Product Category Description</td>
								<td> Delete Product Category</td>
								<td> Edit Product Category</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_pro_cat="select *from product_category";
								$run_pro_cat=mysqli_query($con,$get_pro_cat);
								while($row_pro_cat=mysqli_fetch_array($run_pro_cat)){
									$p_cat_id=$row_pro_cat['p_cat_id'];
									$p_cat_title=$row_pro_cat['p_cat_title'];
									$p_cat_desc=$row_pro_cat['p_cat_desc'];
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $p_cat_title;?></td>
								<td width="300"><?php echo $p_cat_desc;?></td>
								<td>
									<a href="index.php?deleteProductCategory=<?php echo $p_cat_id;?>">
										<i class="fas fa-trash-alt"></i> Delete
									</a>
								</td>
								<td>
									<a href="index.php?editProductCategory=<?php echo $p_cat_id;?>">
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
</div>

<?php
}
?>