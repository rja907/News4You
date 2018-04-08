<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Set the page to the width of the device and set the zoom level --> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title>Registration Form</title>

    <script src='https://www.google.com/recaptcha/api.js'></script>

	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <link rel="stylesheet" type="text/css" href="style/RegStyle.css">
    <script src="js/jsFunctions.js" type="text/javascript"></script>
    <script src="js/myValidator.js" type="text/javascript"></script>
</head>
<body onload="initialize()">
    <div class="container">
        <h1 class="well">Registration Form</h1>
	   <div class="col-lg-12 well">
	       <div class="row">
				<form name="f1" id="f1" method="POST" class="form-horizontal">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="col-sm-6">
								<label for="FirstName">First Name</label>
								<input type="text" name="FirstName" onblur="validate()" id="FirstName" placeholder="Enter First Name Here.." class="form-control" required>
								<small id="FirstName_err" style="color:#a94442"></small>
							</div>
							<div class="col-sm-6">
								<label for="LastName">Last Name</label>
								<input type="text" name="LastName" id="LastName" onblur="validate()" placeholder="Enter Last Name Here.." class="form-control" required>
								<small id="LastName_err" style="color:#a94442"></small>
							</div>
						
                        </div>					
						
                        <div class="form-group">
							<div class="col-sm-12">
                        
                                <label for="Address">Address</label>
							
                                <textarea placeholder="Enter Address Here.." onblur="validate()" name="Address" id="Address" rows="3" class="form-control" required></textarea>
							
                                <small id="Address_err" style="color:#a94442"></small>
							
                            </div>
						
                        </div>	
						
                        <div class="form-group">
							
                            <div class="col-sm-4">
								
                                <label for="district">City/District</label>
								
                                <input type="text" name="city" id="city" placeholder="City" class="form-control" readonly>
								<small id="city_err" style="color:#a94442"></small>
							
                            </div>	
							
                            <div class="col-sm-4">
								<label>State</label>
								<input type="text" name="state" id="state" placeholder="State" class="form-control" readonly>
								<small id="state_err" style="color:#a94442"></small>
							</div>	
							
                            <div class="col-sm-4">
								<label>Pin code</label>
								<input type="tel" name="pincode" id="pincode" maxlength="6" onkeypress="clearErrorField('pincode')" placeholder="Pin Code" class="form-control" onblur="getPincode()" required>
								
                                <small id="pincode_err" style="color:#a94442"></small>
							
                            </div>		
						
                        </div>
				
                        <div class="form-group">
						
                            <div class="col-sm-6">
                            
                                <label for="Mobile">Mobile Number</label>
							
                                <div class="input-group input-group-md">
								
                                    <span class="input-group-addon">+91</span>
                                    <input type="number" maxlength="10" name="Mobile" onkeypress="clearErrorField('Mobile')" id="Mobile" placeholder="Enter Your Mobile Number Here.." class="form-control" required onblur='isUnique("Mobile","mob")'>
                        	
                                </div>
                        		
                                <small id="Mobile_err" class='help-block' style="color:#a94442"></small>
                        	
                            </div>
						
                            <div class="col-sm-6">
							
                                <label for="Email">E-mail Address </label>
							
                                <div class="input-group input-group-md">
								
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input type="text" name="Email" onkeypress="clearErrorField('Email')" id="Email" placeholder="Enter Your E-mail Address Here.." class="form-control" required onblur="isUnique('Email','email');">
       			
                                </div>
								
                                <small id="Email_err" style="color:#a94442"></small>
							
                            </div>						
					
                        </div>												
					
                        <div class="form-group">

                            <div class="col-sm-12">
						
                                <label for="User">User Name</label>
							
                                <div class="input-group input-group-md">
							
                                    <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                
                                    <input id="User" type="text" onkeypress="clearErrorField('User')" name="User" onblur='isUnique("User","username");' required placeholder="Enter User Name Here.." class="form-control"/>
                            
                                </div>	
							     
                                <small id="User_err" style="color:#a94442"></small>
                    
                            </div>
					   
                        </div>		
				
                        <div class="form-group">
						
                            <div class="col-sm-12">
							
                                <label for="Password">Password</label>

                                <div class="input-group input-group-md">
								
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" name="Password" onblur="validate()" required id="Password" placeholder="Enter Password Here.." class="form-control">
							
                                </div>
							
                                <small id="Password_err" style="color:#a94442"></small>
					
                            </div>	
					
                        </div>	
					
                        <div class="form-group">
						
                            <div class="col-sm-12">				
							
                                <label for="cPassword">Confirm your Password</label>
							
                                <div class="input-group input-group-md">
								
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" required name="cPassword" id="cPassword" onblur="validate()" placeholder="Confirm your Password Here.." class="form-control">
					
                                </div>
						
                            </div>
				
                        </div>
                        
                        <center>
        
                            <div style="margin:10px 0px;" class="g-recaptcha" data-sitekey="6LdctxYTAAAAADYwi6YL9e5Dry4uw1h_izpdelTg"></div>
                            
                            <div id="error" style="color:#a94442;margin:10px 0px;"></div>

                        </center>
                    
                        <input type="checkbox" id="tnc" name="tnc" onclick="validate()"/> By Signing Up You Agree to Our <a href="utilities/tncs.html" target="_blank">Terms And Conditions</a>
					   
                        <center style="margin-top:10px;">
                            <input type="submit" id="submit" name="submit" class="btn btn-lg btn-info" disabled value="Register"/>
                        </center>

                    </div>
				
               </form>
        
           </div>

        </div>

    </div>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
    <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
 	
    <!-- Latest compiled and minified JS -->
 	
    <script src="https://netdna.bootstrapcdn.com/bootstrap/js/bootstrap.min.js"></script>
 	
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
				Mobile :{
					validators : {
						regexp:{
							regexp: /^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/,
                        	message: 'Mobile Number should be of 10 digits'
						},
						notEmpty : {
							message : "Please provide a Mobile Number"
						}, 
					}
				},
				User :{
					validators : {
						notEmpty : {
							message : "Please provide a User Name"
						},
                        stringLength : {
							min: 6,
							message: "Username must be 6 characters long"
						},
                        regexp:{
							regexp: /[a-zA-Z]/,
                        	message: 'Username Should Have Atleast One Alphabet'
						},
					}
				},			
				Address :{
					validators : {
						notEmpty : {
							message : "Please provide an Address"
						}, 
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

require_once 'utilities/reCaptchaLibrary.php';

// your secret key
$secret = "6LdctxYTAAAAAAUw3FcMNdab04YlT8SakB60P_68";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if (isset($_POST['submit'])) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
    
if ($response != null && $response->success) {
    //Everything Well And Good
    require_once 'db/db_func.php';
    $fname=sanitize($_POST['FirstName']);
    $lname=sanitize($_POST['LastName']);
    $address=sanitize($_POST['Address']);
    $city=sanitize($_POST['city']);
    $state=sanitize($_POST['state']);
    $pincode=sanitize($_POST['pincode']);
    $mob=sanitize($_POST['Mobile']);
    $email=sanitize($_POST['Email']);
    $user=sanitize($_POST['User']);
    $pass=sanitize($_POST['Password']);
    if(!empty($fname)&&!empty($lname)&&!empty($address)&&!empty($city)&&!empty($state)&&!empty($pincode)&&!empty($mob)&&!empty($pass)&&!empty($email)&&!empty($user))
    {
        //None Of The Value Is Empty and some extra checks if the js fails
        $st=0;
        if(valueExists($mob,'mobile_no'))
        {
            $status="Mobile Number Already Registered";
            $st=1;
        }
        else if(valueExists($email,'email'))
        {
            $status="Email Adress Already Registered";
            $st=1;
        }
        else if(valueExists($user,'username'))
        {
            $status="User Name Already Registered";
            $st=1;
        }
        if($st==0)
        {
            $status=insertValues($fname,$lname,$email,$address,$city,$state,$pincode,$user,$pass,$mob);
            //Values Inserted Successfully
            echo "<script>sessionStorage.clear();</script>";
            echo "<script>window.location='utilities/thankyou.php'</script>";
        }
    }
}
else
{
    echo "<script>document.getElementById('error').innerHTML='<b>Invalid Captcha</b>, Please Try Again';</script>";
}

}


?>