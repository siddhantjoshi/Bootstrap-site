<div id='bodyleft'>
	<h3>Content Management</h3>
	<ul>
		<li><a href="index.php"> <i class="fas fa-home"></i> Dashboard</a></li>
		<li><a href="index.php?cat"><i class="fas fa-th"></i> View Category </a></li>
		<li><a href="index.php?sub_cat"><i class="fas fa-th-list"></i> Sub Category</a></li>
		<li><a href="index.php?lang"> <i class="fas fa-globe-asia"></i> All Launguages </a></li>
	</ul>
	
	<h3>Course Management</h3>
	<ul>
		<li><a href="#"><i class="far fa-address-book"></i> Active Courses</a></li>
		<li><a href="#"><i class="fas fa-swatchbook"></i> Pending Courses </a></li>
		<li><a href="#"><i class="fas fa-book"></i> UnPublish Courses </a></li>
		<li><a href="#"><i class="fas fa-pencil-ruler"></i> Advance Course Searching</a></li>
	</ul>
	
	<h3>User Management</h3>
	<ul>
		<li><a href="#"><i class="fas fa-user-graduate"></i> View Students </a></li>
		<li><a href="#"><i class="fas fa-chalkboard-teacher"></i> View Teachers </a></li>
		<li><a href="#"><i class="fas fa-search"></i> Advance User Search </a></li>
	</ul>
	
	<h3>Payment Management</h3>
	<ul>
		<li><a href="#"><i class="fas fa-rupee-sign"></i> Teacher's Payment</a></li>
		<li><a href="#"><i class="fas fa-credit-card"></i> Complete Payment </a></li>
		<li><a href="#"><i class="fas fa-cash-register"></i> Advance Payment Searching </a></li>
	</ul>
	
	<h3>Page Management</h3>
	<ul>
		<li><a href="index.php?terms"><i class="fas fa-stream"></i> Term's & Condition </a></li>
		<li><a href="index.php?contact"><i class="fas fa-money-check"></i> Contect Us Page</a></li>
		<li><a href="index.php?about"><i class="fas fa-users"></i> About Us Page </a></li>
		<li><a href="index.php?faqs"><i class="fas fa-question-circle"></i> FAQ Page </a></li>
		<li><a href="#"><i class="fas fa-sliders-h"></i> Edit Slider </a></li>
	</ul>
</div>

<?php
	if(isset($_GET['cat'])){
		include('cat.php');
	}
	
	if(isset($_GET['faqs'])){
		include('faqs.php');
	}

	if(isset($_GET['about'])){
		include('about.php');
	}

	if(isset($_GET['lang'])){
		include('lang.php');
	}
	if(isset($_GET['sub_cat'])){
		include('sub_cat.php');
	}
	
	if(isset($_GET['contact'])){
		include('contact.php');
	}

	if(isset($_GET['terms'])){
		include('terms.php');
	}
?>