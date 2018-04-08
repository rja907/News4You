<?php
@session_start();
?>
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
					<form method='POST'>
					<h3>Search for news 
					<select name='type'>
					<option>Select</option>
					<option>World</option>
					<option>Business</option>
					<option>Tech</option>
					<option>Sports</option>
					<option>Entertainment</option>
					</select>
					<input type='submit' name='search' >
					</h3>
					</form>
					<?php

					?>
					<ul>
						
							<?php

									require_once 'db/db_config.php';
									$db_link=Connect_DB();	
									
    										if(isset($_GET['n']))
    											{	

    												$uname=$_SESSION['user'];
    												$n=$_GET['n'];
    												
    												$query="INSERT INTO marked_news(username,nid) VALUES('$uname',$n)";
    												if($query_run=mysqli_query($db_link,$query)){
    													
    												}

    											}				
									if(isset($_POST['search']))
									{

										$type=$_POST['type'];
										
										$query="SELECT * FROM news where type='$type'";
									}
									else{			
	
									$query="SELECT * FROM `news`";
									}

									
									if($query_run=mysqli_query($db_link,$query))
    									{
    									while($row=mysqli_fetch_assoc($query_run))
    										{
    										$id=$row['nid'];

    											
    										//$query="SELECT * from 'images' where nid=$id";
    										//if($query_run=mysqli_query($db_link,$query))
    										//$r=mysqli_fetch_assoc($query_run);
    										//$img=$r['img'];
    										$arr=$row['headlines'];

    										echo "<li><a href='news-single.php?nid=$id'><img src='images/$id.jpg' style='width:150px;height:150px;'' alt=''></a>
												<div>";
											echo "<p style='font-weight:bold; font-size:20'><a href='news-single.php?nid=$id'>$arr</a></p>";
											$arr=$row['type'];
											echo "<span>$arr News</span>";
											$arr=$row['date'];
    										echo "<span><br>Posted on $arr</span>";
    										if(isset($n)&&$n==$id)
    										{
    										
    										echo "<a href='marked_news.php'>Marked</a>";
    										
    										}
    										else
    										echo "<a href='news.php?n=$id'>Mark to read later</a>";
    										$arr=$row['content'];
    										$stringCut = substr($arr, 0, 300);
    										$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
    										echo "<p>$string</p>";
    										echo "<a href='read_more.php?newsid=$id'>Read More</a>
											";
											echo "</div>
												</li>";
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
    										$nid=$row['nid'];
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
</html>