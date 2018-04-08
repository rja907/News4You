<?php
@session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
    echo "<script>window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize2.css">

    
        <link rel="stylesheet" href="css/style2.css">

    
    
    
    
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
          
          <form action="" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name='fname' required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name='lname' required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name='uname' required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name='email' required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name='pass' required autocomplete="off"/>
          </div>
          
          <input type="submit" value="Signup" class="button button-block" name="signup"/>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="post">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="un" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="passw" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <input class="button button-block" type='submit' name="login" value="Log In"/>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      <?php
      
      require_once 'db/db_config.php';
      $db_link=Connect_DB();
      $flag=0;
      if(isset($_POST['signup']))
      {
        if(empty($_POST['email'])||empty($_POST['pass']))
          {$flag=1;}
        else
        {
        $fname=$_POST['fname'];    
        $lname=$_POST['lname'];
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $pass=md5($_POST['pass']);
        $query="SELECT username,email from users";
        if($query_run=mysqli_query($db_link,$query))
          {
            while($row=mysqli_fetch_assoc($query_run))
                {
                if($email==$row['email'])
                  $flag=2;
                if($uname==$row['username'])
                  $flag=3;
                  
                }
          if($flag==1)
            echo "<div class='field-wrap'>
              <label>Invalid email or password.
              </label>
              </div>";
          if($flag==2)
            echo "<div class='field-wrap'>
              <label>Email id already exists
              </label>
              </div>";
          if($flag==3)
            echo "<div class='field-wrap'>
              <label>Username already exists.</label>
              </div>";
          if($flag==0)
          {
          $query="INSERT into users(fname,lname,email,username,password,auth_key,active_status) VALUES('$fname','$lname','$email','$uname','$pass',00,1)";      
           if($query_run=mysqli_query($db_link,$query))
              {
              echo "<div class='field-wrap'>
              <label>
              Account Created!  ------Click on login <span class='req'></span>
              </label>
              </div>";
              }
          }
      }
      }
      }
      if(isset($_POST['login']))
      {
        if(empty($_POST['un'])||empty($_POST['passw']))
          echo "Please fill in the details";
        else
        {
          $uname=$_POST['un'];
          echo $uname;
          $passw=$_POST['passw'];
          $passw=md5($passw);
          echo $passw;
          $query="SELECT * FROM users where password='$passw' AND username='$uname'";
          if($result=mysqli_query($db_link,$query))
          {
            if($row=mysqli_fetch_assoc($result))
          {

            $uname=$row['username'];
            $mail=$row['email'];
            $pass=$row['password'];
            $_SESSION['user']=$uname;
            
            header("location:index.php");
          }
          }
          else
          echo "Invalid username or password.";
        }
      }
      ?>

</div> 
<!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/login.js"></script>

    
    
  </body>
</html>
