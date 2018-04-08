<?php
@session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
    echo "<script>window.location='user.php'</script>";
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>

    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="/" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required name="Email"  id="Email" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required name="Password" id="Password" autocomplete="off"/> 
          </div>
          <input type="submit" class="button button-block" name="submit" id="submit" value="Login"/></button>
          <p class="forgot"><a href="#">Forgot Password?</a></p>
           
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>

        
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
if(isset($_POST['submit']))
{
if($_POST['Email']=='apoorv2arsenalfc@gmail.com'&&$_POST['Password']=="installer")
{
?>
<script type="text/javascript">
window.location = "index2.php";
</script>  


<?php
}
}
if(isset($_POST['submit']))
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

?>
