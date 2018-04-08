<?php
@session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
    echo "<script>window.location='user.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <title>Login Page</title>
        <!-- Latest compiled and minified CSS & JS -->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="style/LPstyle.css">
        
        <script>
        function fb_login() {
	    FB.login( function() {}, { scope: 'email,public_profile' } );
	}
        </script>
        
    </head>
    <body>
        <script type="text/javascript" src="utilities/fb.js"></script>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h2 class="text-center login title" align="center">Sign in to your account</h2>
                        <div class="account-wall well">
                            <img class="profile-img" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                            <form class="form-signin" name="f1" id="f1" method="POST" class="form-horizontal">
                                <div class="form-group">  
                                    
                                    <label for="Email"></label>
                                    <input type="email" name="Email" required id="Email" onkeydown="document.getElementById('email_err').innerHTML=' '" value="<?php if(!empty($_POST['Email']))
                                           echo $_POST['Email'];
                                           ?>" placeholder="Enter your Email Here.." class="form-control"> 
				
				                    <small id="email_err" style="color:#A94442"></small>
                                
                                            
			        </div>
                                
                                <div class="form-group">    
                
                                    <label for="Password"></label>
                
                                    <input type="password" required name="Password" id="Password" onkeydown="document.getElementById('err_pwd').innerHTML=' '" placeholder="Enter your Password Here.." class="form-control">    
				
                                <small id="err_pwd" style="color:#A94442"></small>
                                 
                                </div>
			                    
                                <center>
        
                                    <div style="margin:10px 0px;" class="g-recaptcha" data-sitekey="6LeIPhcTAAAAAPKcXJmXtlPeFgY_Bwi7jQZ2pSTO"></div> <!--Here is the site key for recaptcha -->
                            
                                    <div id="error" style="color:#a94442;margin:10px 0px;"></div>
                                    
                                </center>
                                
                                <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" id="submit" value="Login"/>
                
                                <div id="remember" class="checkbox">
                                
                                    <label>
                                
                                        <input type="checkbox" value="remember-me">Remember me
                                
                                    </label>
                                
                                    <a href="registration.php" class="text-center new-account">Create an account</a> 
                                
                                </div>
                
                                <a href="RegViaOTP.php" class="text-center new-account">Register through OTP</a>

                                
                                <a href="forgotPassword.php" class="text-center new-account">Forgot Password</a>
            
                            </form>
          
                    </div>
                    <center class="well">
                
                        <center>
                            <label>Sign in with social media</label>
                        </center>
                
                        <a class="btn btn-lg btn-social-icon btn-facebook">
                
                            <div class="fa fa-facebook fb-login-button" data-size="icon" data-scope="public_profile,email" onlogin="checkLoginState();"></div>
                
                        </a>
                
                        <a href="utilities/twitter_signin.php" class="btn btn-lg btn-social-icon btn-twitter">
                
                            <span class="fa fa-twitter"></span>
                
                        </a>
                
                        <a href='utilities/linkdin-login.php' class="btn btn-lg btn-social-icon btn-linkedin">
                
                            <span class="fa fa-linkedin"></span>
                
                        </a>
                
                        <a class="btn btn-lg btn-social-icon btn-google">
                
                            <span class="fa fa-google"></span>
                
                        </a>
                    
                    </center>
        
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
      submitButtons: 'button[type="submit"]',      
      fields : {            
        Password : {
          validators: {
            notEmpty : {
              message : "Please provide a Password"
            },            
          }
        }, 
        Email :{
          validators : {
            notEmpty : {
              message : "Please provide an Email Address"
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

require_once 'utilities/reCaptchaLibrary.php';

// your secret key
$secret = "6LeIPhcTAAAAABBt0hPbebL65Ybgvngunx9P9hHk";
//Here is the site key for recaptcha
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response

if(isset($_POST['submit']))
{
    
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
    
    if ($response != null && $response->success) 
    {
        require_once 'db/db_func.php';
        $user=$_POST['Email'];
        $pass=$_POST['Password'];
        $status=ValidateUser($user,$pass);
        switch($status)
        {
            case 0:
                echo "<script>alert('Please Activate Your Account By Clicking The Link On The Link Sent To You Via Email');</script>";
                break;
            case 1:
                $_SESSION['user']=$user;
                //echo "<script>alert('Welcome $user');</script>";
                echo "<script>window.location='user.php';</script>";            
                break;
        }
    }
    else
    {
        echo "<script>document.getElementById('error').innerHTML='<b>Invalid Captcha</b>, Please Try Again';</script>";
    }
}

?>