<?php
	function head_link(){
		include("inc/db.php");
		$get_link=$con->prepare("select *from contact");
		$get_link->setFetchMode(PDO:: FETCH_ASSOC);
		$get_link->execute();
		$row=$get_link->fetch();
		
		echo"
			<ul>
				<li><a href='https://www.facebook.com/".$row['facebook']."' target='_blank'><i class='fab fa-facebook-square'></i></a></li>
				<li><a href='https://www.twitter.com/".$row['twitter']."' target='_blank'><i class='fab fa-twitter-square'></i></a></li>
				<li><a href='https://www.google.com/".$row['google_plus']."' target='_blank'><i class='fab fa-google-plus-square'></i></a></li>
				<li><a href='https://www.youtube.com/".$row['youtube']."' target='_blank'><i class='fab fa-youtube'></i></a></li>
				<li><a href='https://www.linkedin.com/".$row['linkedin']."' target='_blank'><i class='fab fa-linkedin'></i> </a></li>
			</ul>
		";
			
	}

	function cat_menu(){
		include("inc/db.php");
		$get_cat=$con->prepare("select *from cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			echo "
				<li><a href=''#''>".$row['cat_icon']."".$row['cat_name']."</a></li>
				";
		endwhile;
	}

	function home_cat(){
		include("inc/db.php");
		$get_cat=$con->prepare("select *from cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			echo "
				<li>
					<a href='#'>
						<center>
						".$row['cat_icon']."
						<h4>".$row['cat_name']."</h4>
						<P>3</P>
						</center>
					</a>
				</li>
			";
		endwhile;
	}

	function cart(){
		include("inc/db.php");
		echo"<div id='wrap'>
				<div id='crumb'>
					<span><a href='index.php'>Home</a></span> <b>></b>
					<span>My cart</span>
				</div>
				<div id='cart'>
				<table cellspacing='0'>
					<tr>
						<th >Name</th>
						<th>Instructor</th>
						<th>Launguage</th>
						<th>Lecture</th>
						<th>Price</th>
					</tr>
					<tr>
						<td id='cart_f'>
							<img src='images/course/2.jpg' />
							<span><a href='#'>Social Networking website Development with PDO </a></span>
							<b><a href='#'><i class='fas fa-trash-alt'></i>Remove</a></b>
						</td>
						<td>Mukadar Ka Sikanadar</td>
						<td>English</td>
						<td>100</td>
						<td>$124</td>
					</tr>
					<tr>
						<td id='cart_f'>
							<img src='images/course/2.jpg' />
							<span><a href='#'>Social Networking website Development hdhd dhdhd dhdh  with PDO </a></span>
							<b><a href='#'><i class='fas fa-trash-alt'></i>Remove</a></b>
						</td>
						<td>Mukadar Ka Sikanadar</td>
						<td>English</td>
						<td>100</td>
						<td>$124</td>
					</tr>
					
					
					<tr>
						<td>
							<button>
								<a href='index.php'>Keep Learning</a>
							</button>

							<button>
								<a href='#' >Checkout</a>
							</button>
						</td>
						<td></td><td></td>
						<td style='text-align:right'>Amount Payable :</td>
						<td>$120</td>
					</tr>
				</table>
				</div><br clear='all'>
			</div>
			";
	}

	function course_detail(){
		include("inc/db.php");
		echo"
		<div id='crumb'>
			<span><a href='index.php'>Home</a></span> <b>></b>
			<span>My cart</span>
		</div>
		<div id='course_left'>
			<img src='images/course/4.jpg'/>
			<div id='course_share'>
				<center>
					<div id='facebook'><a href='#'><i class='fab fa-facebook-square'></i>Share</a></div>
					<div id='google_plus' ><a href='#'><i class='fab fa-google-plus-square'></i>Share</a></div>
					<div id='twitter'><a href='#'><i class='fab fa-twitter-square'></i>Share</a></div>
					<div id='whatsapp'><a href='#'><i class='fab fa-whatsapp-square'></i>Share</a></div>
				</center>
			</div>
		</div>
		
		<div id='course_right'>
			<h2>Node JS for beginners</h2>
			<table>
				<tr>
					<td>Instructor</td>
					<td>Mukandar ka Sikandar</td>
				</tr>
				<tr>
					<td>Endrolled by</td>
					<td>9 Students</td>
				</tr>
				<tr>
					<td>Level</td>
					<td>Beginner</td>
				</tr>
				<tr>
					<td>Launguage</td>
					<td>English</td>
				</tr>
				<tr>
					<td>Lectures</td>
					<td>20</td>
				</tr>
		</table>
		<div id='price'>
			<h3>Price : $21 <span>70%</span> <b>70%</b> Saving $49</h3>
		</div>
		<form>
			<center>
				<button><i class='fas fa-shopping-cart'></i>Add to cart</button> 
				<div><a href='#'><i class='fas fa-bolt'></i>Enroll now</a></div>
			</center>
		</form>
	</div>
	<br clear='all'>
	
	<div id='c_desc'>
		<h2>Course Details</h2>
		
		<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
		
		<h2>What you learn</h2>
		
		<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
		
		<h2>Prerequisit</h2>
		
		<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
		
		<h2>Instructor information</h2>
		<img src='images/course/3.jpg'/>
		
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
		<hr size='2' style='background: #3F5286'>
		<div id='course_share_instr'>
			<center>
				<div id='facebook'><a href='#'><i class='fab fa-facebook-square'></i></a></div>
				<div id='google_plus' ><a href='#'><i class='fab fa-google-plus-square'></i></a></div>
				<div id='twitter'><a href='#'><i class='fab fa-twitter-square'></i></a></div>
				<div id='whatsapp'><a href='#'><i class='fab fa-whatsapp-square'></i></a></div>
		
			</center>
		</div>
		<br clear='all'>
		<h2>Curriculum</h2>
		
		<ul>
			<li><i class='fas fa-file-video'></i><span>1. Intriduction</span></li>
			<li><i class='fas fa-file-video'></i><span>2. Quick over view</span></li>
			<li><i class='fas fa-file-video'></i><span>3. Connection shdsdhdsh sdhsdh</span></li>
			<li><i class='fas fa-file-video'></i><span>4. Hdasjdhsd dshdsgsa hg</span></li>
			<li><i class='fas fa-file-video'></i><span>5. KKSajhsa</span></li>
			<li><i class='fas fa-file-video'></i><span>6. sajshJASHash skjhsjhAS SAJHS</span></li>
			<li><i class='fas fa-file-video'></i><span>7. SAajshjhs </span></li>
		</ul>
		
	</div>
	
	<div id='c_rel'>
		<h2>Related courses</h2>
		<ul>
			<li>
				<a href='#'>
				<img src='images/course/2.jpg'/>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</P>
				</a>
			</li>
			<li>
				<a href='#'>
				<img src='images/course/2.jpg'/>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</P>
				</a>
			</li>
			<li>
				<a href='#'>
				<img src='images/course/2.jpg'/>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</P>
				</a>
			</li>
			<li>
				<a href='#'>
				<img src='images/course/2.jpg'/>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elit</P>
				</a>
			</li>
		
		
		
		</ul>
	</div>
	<br clear='all'>
	




	";
	}
?>