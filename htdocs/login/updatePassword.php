<!DOCTYPE html>
<html>
<head>
	<title>Change your password</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
	<link rel="stylesheet" type="text/css" href="style/OTPstyle.css">
</head>
<body id="body">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				    <h2 class="text-center login title" align="center">Change your password</h2>
				<div class="account-wall well">
					<form class="form-signin" name="f1" id="f1" method="post" class="form-horizontal">
						<div class="form-group">	
								<label for="Password">New Password</label>
								<input type="password" name="Password" required id="Password" placeholder="Enter your New Password Here.." class="form-control input-lg">	
						</div>
						<div class="form-group">		
								<label for="cPassword">Confirm your Password</label>
								<input type="password" required name="cPassword" id="cPassword" placeholder="Confirm your Password Here.." class="form-control input-lg">		
						</div>
						<small style="color:indianred" id='err'></small>
						<br><input type="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" name='submit'/>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap-social/4.12.0/bootstrap-social.css">    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>

 	<script type="text/javascript">
	$(document).ready(function () {
		var validator = $("#f1").bootstrapValidator({
			feedbackIcons: {
				valid: "glyphicon glyphicon-ok",
				invalid: "glyphicon glyphicon-remove", 
				validating: "glyphicon glyphicon-refresh"
			},
			live: 'enabled',
			submitButtons: 'button[type="Submit"]',			 
			fields : {						
				Password : {
					validators: {
						notEmpty : {
							message : "Please provide a Password"
						},
						stringLength : {
							min: 8,
							message: "Password must be 8 characters long"
						},
						regexp:{
							regexp: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*+=~`<>,._-]).{8,}$/,
							message: "Password must have atleast 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character"
						}, 						 
					}
				}, 
				cPassword : {
					validators: {
						notEmpty : {
							message: "Confirm password field is required"
						}, 
						identical : {
							field: "Password", 
							message : "Password and confirmation must match"
						}
					}
				}, 				
			}
		});
	
	});
	</script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $pass=$_POST['Password'];
    $cpass=$_POST['cPassword'];
    if($pass!=$cpass)
    {
    	echo "<script>document.getElementById('err').innerHTML='Passwords Do Not Match'</script>";
    }
    else if(empty($pass))
    {
    	echo "<script>document.getElementById('err').innerHTML='Password Can Not Be Empty'</script>";
    }
    else{
    @session_start();
    $pass=md5($pass);
    $email=$_SESSION['email'];
    $query="UPDATE `telecoma_webportal`.`users` SET `password` = '$pass' WHERE `users`.`email` = '$email'";
    if($query_run=mysqli_query($db_link,$query))
    {
        //Password Updated Successfully
        $query="UPDATE `telecoma_webportal`.`resetpassword` SET `status` = 1 WHERE `resetpassword`.`email` = '$email'";
        if($query_run=mysqli_query($db_link,$query))
        {
            //Both The Values Successfully Updated
            $_SESSION['st']=1;
            echo "<script>window.location='changeSuccess.php'</script>";
        }
    }
    }
}
?>