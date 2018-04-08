<!DOCTYPE html>
<html>
<head>
	<title>Sign in through OTP</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
	<link rel="stylesheet" type="text/css" href="style/OTPstyle.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<center><h2>Register Your Details</h2></center>
				<div class="account-wall well">
					<form class="form-signin" name="f1" id="f1" method="post" class="form-horizontal">
						<div class="form-group">	
								<label for="First Name">First Name</label>
								<input type="text" name="FirstName" id="FirstName" placeholder="Enter Your First Name Here.." class="form-control" required>	
						</div>
						<div class="form-group">	
								<label for="Last Name">Last Name</label>
								<input type="text" name="LastName" id="LastName" placeholder="Enter Your Last Name Here.." class="form-control" required>	
						</div>												
						<div class="form-group">	
								<label for="Email">Email Address</label>
								<input type="email" name="Email" required id="Email" placeholder="Enter Your Email Here.." class="form-control">	
						</div>
						<div class="form-group">
							<label for="Password">Password</label>
								<input type="password" name="Password" required id="Password" placeholder="Enter Password Here.." class="form-control">	
						</div>
						<div class="form-group">
							<label for="cPassword">Confirm Password</label>
								<input type="password" name="cPassword" required id="cPassword" placeholder="Confirm Your Password Here.." class="form-control">	
						</div>							
						<br><button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>		
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">  
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
						different : {
							field : "Email", 
							message: "Email address and password can not match"
						}
					}
				}, 				
				LastName :{
					validators : {
						regexp:{
							regexp: /^[a-zA-Z]/,
                        	message: 'Last Name can only consists of alphabets'
						},
						notEmpty : {
							message : "Please provide an Last Name"
						}, 
					}
				},
				FirstName :{
					validators : {
						regexp:{
							regexp: /^[a-zA-Z]/,
                        	message: 'First Name can only consists of alphabets'
						},
						notEmpty : {
							message : "Please provide an First Name"
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