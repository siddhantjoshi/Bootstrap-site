<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black ;text-align:left">
	<div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="=#navbar-ex1-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fas fa-user"></i> <?php echo $admin_name?>
			</a>
			<ul class="dropdown-menu">
				<li >
					<a href="index.php?userProfile=<?php echo $admin_id?>">
						<i class="fas fa-user-alt"></i> Profile
					</a>
				</li>
				<li >
					<a href="index.php?viewProduct">
						<i class="fas fa-tv"></i> View Product
						<span class="badge"><?php echo $count_pro?></span>
					</a>
				</li>
				<li >
					<a href="index.php?customer">
						<i class="fas fa-user-friends"></i> Customer
						<span class="badge"><?php echo $count_cust?></span>
					</a>
				</li>
				<li >
					<a href="index.php?productCategory">
						<i class="fas fa-list"></i> Product Categories
							<span class="badge"><?php echo $count_pro_cat?></span>
					</a>
				</li>
				<li>
					<li class="divider"></li>
					<li>
						<a href="logout.php">
							<i class="fa fa-fw fa-power-off"></i> Logout
						</a>
					</li>
				</li>
			</ul>
		</li>
	</ul>

	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav sidebar-nav">
			<li>
				<a href="index.php?dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#product">
					<i class="fas fa-tv"></i>
					 Product 
					<i class="fas fa-caret-down"></i>
				</a>

				<ul id="product" class="collapse">
					<li><a href="index.php?insert_product"><i class="fas fa-plus"></i> Insert Product</a></li>
					<li><a href="index.php?viewProduct"><i class="fas fa-eye"></i> View Product</a></li>
				</ul>

			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#categoryproduct">
					<i class="fas fa-list"></i>
					 Product Category 
					<i class="fas fa-caret-down"></i>
				</a>

				<ul id="categoryproduct" class="collapse">
					<li><a href="index.php?InsertProductCategory"><i class="fas fa-plus"></i> Insert Product Category</a></li>
					<li><a href="index.php?viewProductCategory"><i class="fas fa-eye"></i> View Product Category</a></li>
				</ul>

			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#category">
					<i class="fas fa-clipboard-list"></i>
					 Category 
					<i class="fas fa-caret-down"></i>
				</a>

				<ul id="category" class="collapse">
					<li><a href="index.php?insertCategory"><i class="fas fa-plus"></i> Insert category</a></li>
					<li><a href="index.php?viewCategory"><i class="fas fa-eye"></i> View category</a></li>
				</ul>

			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#slider">
					<i class="fas fa-sliders-h"></i>
					 Slider 
					<i class="fas fa-caret-down"></i>
				</a>

				<ul id="slider" class="collapse">
					<li><a href="index.php?InsertSlider"><i class="fas fa-plus"></i> Insert Slider</a></li>
					<li><a href="index.php?viewSlider"><i class="fas fa-eye"></i> View Slider</a></li>
				</ul>
			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#user">
					<i class="fas fa-user"></i>
					 User 
					<i class="fas fa-caret-down"></i>
				</a>

				<ul id="user" class="collapse">
					<li><a href="index.php?InsertUser"><i class="fas fa-user-plus"></i> Insert User</a></li>
					<li><a href="index.php?viewUser"><i class="fas fa-eye"></i> View User</a></li>
					<li><a href="index.php?EditUserProfile=<?php echo $admin_id?>"><i class="fas fa-user-edit"></i> Edit User</a></li>
				</ul>
			</li>
			<li> <a href="index.php?viewCustomer"><i class="fas fa-users"></i> View Customer</a></li>
			<li> <a href="index.php?viewOrder"><i class="fas fa-concierge-bell"></i> View Order</a></li>
			<li> <a href="index.php?viewPayment"><i class="fas fa-credit-card"></i> View Payment</a></li>
			
		</ul>
	</div>
</nav>

<?php
		 }
?>