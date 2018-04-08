<?php
session_start();
if(!isset($_SESSION['user'])||empty($_SESSION['user']))
{
    echo "<script>window.location='login.php'</script>";

}
?>
<!DOCTYPE html>
<div>
<html>
<head>
	<meta charset="UTF-8">
	<title>News </title>
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
			<div class="body news-single">
				<div>
					<span>News</span> <a href="news.php" id="paging">> Back</a>
					
					<?php
					$nid=$_GET['nid'];
					require_once 'db/db_config.php';
	
									$query="SELECT * FROM `news` where nid=$nid";
									$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
    									{
    									$row=mysqli_fetch_assoc($query_run);
    									$headlines=$row['headlines'];
    									$date=$row['date'];
    									$content=$row['content'];
    									echo "<div>";
    									echo "<img src='images/$nid.jpg'
    									style='width:600px; height:300px;' alt=''>";
    									echo "<h3>$headlines</h3><br>";
    									echo "<span>Posted on $date</span></span>";
    									echo "<p>$content</p>";
    									
    									if(isset($_POST['mark']))
    										echo "<a href='marked_news.php'><input type='submit' name='mark' value='Marked'></input></a>";
    									else
    										echo "<a href='news-single.php?nid=$nid'><input type='submit' name='mark' value='Mark this news'></input></a>";	
    									echo "</div>";

    									}

					?>
					<?php
					if(isset($_POST['mark']))
					{
						$user=$_SESSION['user'];
						$query="INSERT INTO marked_news Values('$user','$nid')";
									$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
    									{
    									}

					}
					?>
					<?php					
					if(isset($_POST['submit']))
					{

						$uname=$_POST['select'];
						$cmt=$_POST['cmt'];
						
						$query="INSERT INTO comments(nid,name,cmt) VALUES('$nid','$uname','$cmt')";
						if($query_run=mysqli_query($db_link,$query))
  							{
  								
    						}
					}
					?>
					<div class="section">
						<h5>Comments</h5>
						<?php
							$query="SELECT * FROM `comments` where nid=$nid order by datetme desc";
							$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
    									{
    										while($row=mysqli_fetch_assoc($query_run))
    										{
    										$name=$row['name'];
    										$cmt=$row['cmt'];
    										$datetime=$row['datetme'];
    										echo "<h4>$name</h4>";
    										
    										echo "<p>$cmt</p>";
    										echo "<span>Date:$datetime</span>";
    										}
    									}
						?>
					</div>

					<form action="" method="post">
						<span>Add A Comment</span>
						<label for="name">
							Comment as:  <select name='select'>
							<option>Select</option>
							<option><?php echo $_SESSION['user'];?></option>
							<option>Anonymous</option>
							</select>
							</label>
						
						<textarea name="cmt" id="message" cols="50" rows="10"></textarea>
						<input type="submit" name="submit" value="Comment">
					</form>
					
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
									<a href="#">Follow us latest news from this link:bit.ly/WtqEgGh</a>
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
