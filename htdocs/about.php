<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>About</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="background">
		<div class="page">
			<div class="header">
				<a href="index.php" id="logo" "><h1> News4You</h1></a>
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
			<div class="body about">
				<div>
					<span>About</span>
					<div>
						<img src="images/logo.png" alt="">
						<h3>News4You is a news aggregator website.</h3>
						<p>
							Our website  which brings you the most viewed news of all genres from around the internet.
						</p>
						<h3>Follow us</h3>
						<p>
							Got any queries?
							Here is the link for FAQs:<br>
							<a href="news4you.com/faq.php">Frequently asked questions</a> 
							

						</p>
						<h3>Be Part of Our Community</h3>
						<p>
							Follow us on social media for latest news updates and videos.							
							<br> Facebook:<a href="http://www.facebook.com/news4you">http://www.facebook.com/news4you</a><br>
							Twitter:<a href="http://www.twitter.com/WrewQE4">http://www.twitter.com/WrewQE4</a>
						</p>
					</div>
				</div>
				<div class="sidebar">
					<div class="news">
						<span>Latest News</span>
						<ul>
							<li>
								<?php

									require_once 'db/db_config.php';
									$count=0;
									$query="SELECT * FROM `news` order by date";
									$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
    									{
    									while($row=mysqli_fetch_assoc($query_run))
    										{$nid=$row['nid'];
    										$arr=$row['headlines'];
    										echo "<li><a  href='news-single.php?nid=$nid'>$arr</a>";
    										$arr=$row['type'];
    										echo "<span><br>$arr News</span>";
    										$arr=$row['date'];
    										echo "<span><br>Posted on $arr</span></li>";
    										$count=$count+1;
    										if($count>6)
    										break;	
   										 }}
   										 ?>
							</li>
							
						</ul>
						<a href="news.php">Read More</a>
					</div>
					<div>
						<span>Latest Tweets</span>
						<ul>
							<li>
								<p>
									<a href="#">Presenting you with our new app. Now available on Playstore Apple appstore, and windows store!
									LINK:bit.ly/asFgweR</a>
								</p>
							</li>
							<li>
								<p>
									<a href="#">Follow us elections news from this link:bit.ly/WtqEgGh</a>
								</p>
							</li>
							
						</ul>
						<a href="http://freewebsitetemplates.com/go/twitter/">Follow @News4You <br> on Twitter</a>
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
							<a href="news.php">News Feed</a>|
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
						<li>
							<a href="signout.php">Sign Out</a>|
						</li>
					</ul>
					<p>
						&#169; News Aggregator 2016. All Rights Reserved
					</p>
				</div>
				<div class="connect">
					<span>Follow Us</span> <a href="#" id="fb">fb</a> <a href="#" id="twitter">twitter</a> <a href="#" id="googleplus">google+</a> <a href="#" id="contact">contact</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>