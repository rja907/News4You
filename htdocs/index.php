<?php
session_start();
if(!isset($_SESSION['user'])||empty($_SESSION['user']))
{
    echo "<script>window.location='login.php'</script>";

}
?>
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
			<div class="body home">
				<div>
					<div >
					<img src="images/logo.png" style="width:500px; height:300px">
						<div>
							<h1 style="color:red;">CURRENT NEW FEED</h1>
							
								
							
						</div>
					</div>
					<div>
						<div>
							<h3>Latest Videos</h3>
							<span><a href="newsstream.php">View More Videos</a></span>
							<ul>
								<li>
									<a href="videos.php"><img src="images/asa.jpg" style="height:150px; width:200px;" alt=""></a>
									<h4>Headlines of the news</h4>
									<p>
										Description of the news video
									</p>
								</li>
								<li>
									<a href="videos.php"><img src="images/asa.jpg" style="height:150px; width:200px;" alt=""></a>
									<h4>Headlines of the news</h4>
									<p>
										Description of the news video
									</p>
								</li>
								<li>
									<a href="videos.php"><img src="images/asa.jpg" style="height:150px; width:200px;" alt=""></a>
									<h4>Headlines of the news</h4>
									<p>
										Description of the news video
									</p>
								</li>

							</ul>
						</div>
						<div>
							<h3>Featured</h3>
							<span><a href="news.php">View More Featured</a></span>
							<ul>
								<?php

									require_once 'db/db_config.php';
									$count=0;
									$query="SELECT * FROM `news`";
									$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
    									{
    									while($row=mysqli_fetch_assoc($query_run))
    										{
    										
    										
    										if($count==14||$count==8||$count==9)
    										{
    										$id=$row['nid'];
    										echo "<li><a href='news-single.php?nid=$id'><img src='images/$id.jpg' style='height:100px; width:100px;' alt=''></a>";
    										$arr=$row['headlines'];
    										echo "<a href='news-single.php?nid=$id'><h4>$arr</h4></a><br>";
    										$arr=$row['content'];
    										$stringCut = substr($arr, 0, 300);
    										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
    										echo "<p>$string</p>";
    										echo "<a href='news-single.php?nid=$id'>Read More</a>
											
												</li>";
    										}
    										$count++;
    										}
    									}
    									?>
								
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
						<a href="#">Follow @News4You <br> on Twitter</a>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>
					<ul>
						<li class="selected">
							<a href="index.php">Home</a>|
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
