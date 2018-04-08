<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>News Aggregator</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="background">
		<div class="page">
			<div class="header">
				<a href="index2.php" id="logo" "><h1> News4You</h1></a>
				<ul>
					<li>
						<a href="news.php">News Feed</a>
					</li>
					<li>
						<a href="newsstream.php">News Stream</a>
					</li>
					<li>
						<a href="account.php">Your Account</a>
					</li>
				
					<li>
						<a href="About.php">About</a>
					</li>
				</ul>
			</div>
			<div class="body home">
				<div>
					<div class="featured">
						<div>
							<h2>Current news feed</h2>
							
								
							
						</div>
					</div>
					<div>
						<div>
							<h3>Latest Videos</h3>
							<span><a href="newsstream.php">View More Videos</a></span>
							<ul>
								<li>
									<a href="videos.html"><img src="images/video1.jpg" alt=""></a>
									<h4>Proin pellentesque convallis sapien a congue.</h4>
									<p>
										Aliquam at neque diam. Nulla facilisi. Donec cursus lacus id urna mattis vestibulum.
									</p>
								</li>
								<li>
									<a href="videos.html"><img src="images/video2.jpg" alt=""></a>
									<h4>Lorem ipsum consectetur adipiscing elit.</h4>
									<p>
										Donec cursus lacus id urna mattis vestibulum. Turpis ac malesuada aliquet, est tellus blandit tellus, eu dignissim arcu diam non orci.
									</p>
								</li>
								<li>
									<a href="videos.html"><img src="images/video3.jpg" alt=""></a>
									<h4>Donec cursus lacus id urna mattis vestibulum.</h4>
									<p>
										Fusce sagittis, turpis ac malesuada aliquet, est tellus blandit tellus, eu dignissim arcu diam non orci.
									</p>
								</li>
							</ul>
						</div>
						<div>
							<h3>Featured</h3>
							<span><a href="news.php">View More Featured</a></span>
							<ul>
								<li>
									<a href="news.php"><img src="images/featured1.jpg" alt=""></a>
									<h4>Proin pellentesque convallis sapien a congue.</h4>
									
										
									
								</li>
								<li>
									<a href="news.php"><img src="images/featured2.jpg" alt=""></a>
									<h4>Lorem ipsum consectetur adipiscing elit.</h4>
									<p>
										Donec cursus lacus id urna mattis vestibulum. Turpis ac malesuada aliquet, est tellus blandit tellus, eu dignissim arcu diam non orci.
									</p>
								</li>
								<li>
									<a href="news.php"><img src="images/featured3.jpg" alt=""></a>
									<h4>Donec cursus lacus id urna mattis vestibulum.</h4>
									<p>
										Fusce sagittis, turpis ac malesuada aliquet, est tellus blandit tellus, eu dignissim arcu diam non orci.
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sidebar">
					<div class="news">
						<span>Latest News</span>
						<ul>
							<li>
								<?php

									require_once 'db/db_config.php';
	
									$query="SELECT * FROM `news`";
									$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
    									{
    									while($row=mysqli_fetch_assoc($query_run))
    										
    										
    	
   										 }
   										 ?>
<a href="news.php">Lorem ipsum dolor sit</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Donec condimentum</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Nulla facilisi</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Nunc nec sem nisi</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Aliquam quam nulla</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Lorem ipsum dolor sit</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Donec condimentum</a> <span>Posted on 23 July 2023</span>
							</li>
						</ul>
						<a href="news.php">Read More</a>
					</div>
					
					<div>
						<span>Latest Tweets</span>
						<ul>
							<li>
								<p>
									<a href="#">Praesent urna odio, vehicula quis placerat nec, feugiat id purus. Proin vitae nibh in est molestie iaculis.</a>
								</p>
							</li>
							<li>
								<p>
									<a href="#">Nunc lacinia mi et quam eleifend ullamcorper scelerisque id tortor.</a>
								</p>
							</li>
							<li>
								<p>
									<a href="#">Mauris lobortis dolor ac ipsum fermentum nec placerat mauris  luctus.</a>
								</p>
							</li>
						</ul>
						<a href="http://freewebsitetemplates.com/go/twitter/">Follow @zztigers <br> on Twitter</a>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>
					<ul>
						<li class="selected">
							<a href="index2.php">Home</a>|
						</li>
						<li>
							<a href="news.ph">News Feed</a>|
						</li>
						<li>
							<a href="newsstream.php">News Stream</a>|
						</li>
						<li>
							<a href="account.php">Your Account</a>|
						</li>
						<li>
							<a href="about.php">About us</a>|
						</li>
						
					</ul>
					<p>
						&#169; News Aggregator 2016. All Rights Reserved
					</p>
				</div>
				<div class="connect">
					<span>Follow Us</span> <a href="http://freewebsitetemplates.com/go/facebook/" id="fb">fb</a> <a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">google+</a> <a href="http://www.freewebsitetemplates.com/misc/contact" id="contact">contact</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>