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
				<i class="fa fa-dashboard"></i> Dashboard / View Category
			</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fas fa-th-list"></i> View Category
					</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<td> Category ID </td>
								<td> Category Title </td>
								<td> Category Description</td>
								<td> Delete Category</td>
								<td> Edit Category</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_cat="select *from category";
								$run_cat=mysqli_query($con,$get_cat);
								while($row_cat=mysqli_fetch_array($run_cat)){
									$cat_id=$row_cat['cat_id'];
									$cat_title=$row_cat['cat_title'];
									$cat_desc=$row_cat['cat_desc'];
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $cat_title;?></td>
								<td width="300"><?php echo $cat_desc;?></td>
								<td>
									<a href="index.php?deleteCategory=<?php echo $cat_id;?>">
										<i class="fas fa-trash-alt"></i> Delete
									</a>
								</td>
								<td>
									<a href="index.php?editCategory=<?php echo $cat_id;?>">
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