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
    										{
    										foreach($row as $name=>$value)
    										{
    										if($name=='headlines')
    										echo "<li><a href='news.php'>$value</a>";
    										if($name=='type')
    											echo "<span><br>$value news</span>";
    										if($name=='date')
    											echo "<span><br>Posted on $value</span</li>";
    										
    										}
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
					<span>Follow Us</span> <a href="#" id="fb">fb</a> <a href="#" id="twitter">twitter</a> <a href="#" id="googleplus">google+</a> <a href="#" id="contact">contact</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>