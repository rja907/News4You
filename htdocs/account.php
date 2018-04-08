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
	<title>Team - Football Website Template</title>
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
			<div class="body team">
				<div>
					<span>Manage Your Account</span>
					
					<div class="section">
						<span>Update User Details</span>
						<ul>
							<li>
							<?php

									require_once 'db/db_config.php';
									$count=0;

									$uname=$_SESSION['user'];
									
									$query="SELECT * FROM users where username='$uname'";
									$db_link=Connect_DB();
									if($query_run=mysqli_query($db_link,$query))
										{
										$row=mysqli_fetch_assoc($query_run);
    									$mail=$row['email'];
    									$fname=$row['fname'];
    									$lname=$row['lname'];
    									$fname=$row['fname'];
    									$uname=$row['username'];
    									}
    									?>
								<?php
								echo "
								<br><div><li>Email Id <input name='em' type='email' value='$mail'></li></div>
								<div><li>First name <input name='f' type='text' value='$fname'></li></div><br>
								<div><li>Last name <input name='l' type='text'
								value='$lname'></li></div><br>
								<div><li>Password <input name ='pass' type='password'
								></li></div> <br>
								<div><li>Confirm password <input name='cpass' type='password'></li></div>
								" ?>
							</li>
							
						</ul>
					
					<input type="submit" name='s'>
					</div>
				</div>

				<?php
				if(isset($_POST['s']))
				{
				if(isset($_POST['pass'])&&isset($_POST['cpass']))
				{
					$pass=$_POST['pass'];
					$cpass=$_POST['cpass'];
					if($pass!=cpass)
						echo "<h2>Entered password do not match.</h2>";
					else
					{
						$pass=md5($pass);
						$query="UPDATE `users` SET password='$pass' where username='$uname'";
						if($query_run=mysqli_query($db_link,$query))
							echo "<h2>Details updated</h2>";
						else
							echo "Error";
					}

				}
				
				}
				?>
					
					
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