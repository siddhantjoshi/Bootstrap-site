
<?php include("inc/function.php");?>
<div id="header">
	<div id="up_head">
		<div id="link">
			<?php echo head_link();?>
		</div>
		
		<div id="date">
			<p><?php echo date('l, d F Y');?></p>
		</div>
		
		<div id="slog">
			<p>India's No.1 E Learning Site</p>
		</div>
		<div id="title">
			<h3><a href="index.php"> E-Learner's</a></h3>	
		</div>
		<div id="menu">
			<h2><i class="fas fa-bars"></i></h2>
			<?php include("inc/cat_menu.php")?>
		</div>
		<div id="head_search">
			<form method="post" enctype="multipart/form-data">
				<input type="search" name="query" placeholder="Search courses"></input>
				<button name="search"><i class="fas fa-search"></i></button>
			</form> 
		</div>
		<div id="head_cart">
			<a href="cart.php"><i class="fas fa-shopping-cart"></i> <span>0</span></a>
		</div>
		<div id="head_login">
			<h4><i class="fas fa-user"></i> Login in</h4>
			<form method="post">
				<center>
					<h3><i class="fas fa-user"></i></h3>
					<h4>Login in</h4>				
					</center>
				<div id="input_f">
					<i class="fas fa-envelope"></i>
					<input type="email" placeholder="Enter user email" name="u_email">
				</div>
				<div id="input_f">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Enter user password" name="u_pass">
				</div>
				<h5>Forgot Password ?</h5>
				<br clear="all">
				<center><button name="login">Login</button></center>
			</form>
		</div>
	
		<div id="head_signup">
			<h4><i class="fas fa-user-plus"></i> Sign up</h4>
			<form method="post">
				<center>
					<h3><i class="fas fa-user-plus"></i></h3>
					<h4>Sign up</h4>				
				</center>
				<div id="input_f">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Enter user name" name="s_name">
				</div>
				
				<div id="input_f">
					<i class="fas fa-envelope"></i>
					<input type="email" placeholder="Enter user email" name="s_email">
				</div>
				
				<div id="input_f">
					<i class="fas fa-phone-alt"></i>
					<input type="tel" placeholder="Enter user mobile no" name="s_phn">
				</div>
				
				<div id="input_f">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Enter user password" name="u_pass">
				</div>
				
				<div id="input_f">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Re-enter user password" name="u_pass">
				</div>
				<br clear="all">
				<center><button name="s_signup">Sign in</button></center>
			</form>
		</div>
	</div>
</div>