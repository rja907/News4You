<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>News</title>
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
			<div class="body news">
				<div>
					<span>News</span>
					<ul>
						
							<?php

									require_once 'db/db_config.php';
	
									$query="SELECT * FROM `news`";
									$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
    									{
    									while($row=mysqli_fetch_assoc($query_run))
    										{$id=$row['nid'];
    										$arr=$row['headlines'];
    										echo "<li><a href='news-single.php'><img src='images/$id.jpg' style='width:150px;height:150px;'' alt=''></a>
												<div>";
											$arr=$row['type'];
											echo "<span>$arr News</span>";
											$arr=$row['date'];
    										echo "<span><br>Posted on $arr</span>";
    										$id=$row['nid'];
    										$nid=$_GET['newsid'];
    										$arr=$row['content'];
    										if($id==$nid)
    										{
    										echo "<p>$arr</p>";
    										}
    										else{
    										$stringCut = substr($arr, 0, 300);
    										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
    										echo "<p>$string</p>";
    										echo "<a href='read_more.php?newsid=$id'>Read More</a>
											</div>
												</li>";
    										}
    										}
   										 
   										 }
   										 ?>
   							
						
						
					</ul>
				</div>
				<div class="sidebar">
					<div class="news">
						<span>Latest News</span>
						<ul>
							<li>
								<?php

									require_once 'db/db_config.php';
									$count=0;
									$query="SELECT * FROM `news`";
									$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
    									{
    									while($row=mysqli_fetch_assoc($query_run))
    										{
    										$arr=$row['headlines'];
    										echo "<li><a  href='news.php'>$arr</a>";
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