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
<body>
	<div class="container" id="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				    <h2 class="text-center login title" align="center">Change your password</h2>
				<div class="account-wall well">
					<form class="form-signin" name="f1" id="f1" method="post" class="form-horizontal">
						<div class="form-group" id="cont">	
								<label for="Email">E-mail Address</label>
								<input type="email" name="Email" required id="Email" placeholder="Enter your E-mail Address Here.." class="form-control input-lg">	
                        <small id="err" style="color:red"></small>

						</div>
						<br>
                        <input type="submit" name='submit' value="Generate Link" class="btn btn-lg btn-primary btn-block"/>
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
				Email :{
					validators : {
						notEmpty : {
							message : "Please provide an Email Address"
						}, 
						stringLength: {
							min : 6, 
							max: 35,
							message: "Email address must be between 6 and 35 characters long"
						},
                       emailAddress: {
                            message: 'The input is not a valid email address'
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
    require_once 'db/db_func.php';
    $email=$_POST['Email'];
    if(empty($email))
    {
        echo "<script>document.getElementById('err').innerHTML='Please Enter Your Email.'</script>";
    }
    else
    {
        if(valueExists($email,'email')) //Checking Whether The User Is Registered With Us Or No
        {
            //Check Wheather Earlier Requested for Password Chnage Or Not
            
            $query="SELECT `id` FROM `resetpassword` WHERE `email` = '$email'";
            
            $db_link=Connect_DB();
            $key=date("Y-m-d H:i:s");
            $key=md5($key);
            if($query_run=mysqli_query($db_link,$query))
            {
                $rows=mysqli_num_rows($query_run);
                if($rows==0)          //Value Doesnt Exists Insert A New Record
                {
                    $query="INSERT INTO `resetpassword` (`email`,`key`) VALUES ('$email','$key')";
                }
                else if($rows==1)
                {
                    $rows=mysqli_fetch_assoc($query_run);
                    $id=$rows['id'];
                    $query="UPDATE `resetpassword` SET `key` = '$key' , `status` = '0' WHERE `id` = '$id'";
                }
                else
                {
                    //Error, Multiple Values In The Data Base Found For The Same Record The Constraint For Out DB 
                }
            }
            
            $url= 'http://'.$_SERVER['HTTP_HOST'];
            $fk=md5(strrev($key));
            $subject="Reset Your $url's Password";

            $msg = "To Reset Your Password Please Click On The Link Below



            $url/resetPassword.php?authkey=$key$fk&email=$email


            If You Have Any Error Opening The Link Copy It To Your Address Bar.

            ";
            
            if(mysqli_query($db_link,$query))
            {
                $msg=wordwrap($msg,70);
                if(mail($email,$subject,$msg))
                {
                    echo"<script>alert('Link Sent');</script>";
                    echo"<script>window.location='$url';</script>";
                }
            }
            else
            {
                //MySql Query Error
            }
            mysqli_close($db_link);
        }
        else
        {
            //When the user does not Exists in the database
            echo "<script>document.getElementById('err').innerHTML='No Such User Is Registered With'</script>";
        }
    }
}

?>