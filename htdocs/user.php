<?php
session_start();
if(!isset($_SESSION['user'])||empty($_SESSION['user']))
{
    echo "<script>alert('Sign In First');window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> 
    <?php
    echo $_SESSION['user'];
    ?>
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/OTPstyle.css">
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
<script type="text/javascript">
	
	function signout()
	{
		window.location='signout.php';
	}

</script>
</head>
    <body>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="signout()" aria-hidden="true">x</button>
                        <h4 class="modal-title"><?php echo $_SESSION['user'];?> is Signed in Successfully !</h4>
                    </div>
                    <div class="modal-body">
                            <div id="confirmation" class="alert alert-success">
                            	<center><big><big><span class="glyphicon glyphicon-star"></span>
                            	Welcome <?php echo $_SESSION['user'];?> !!</big></big></center> 
                            </div>
                        <center>
                        
                            <button type="button" class="btn btn-default"><a href='signout.php'>Sign Out</a></button>
                    
                        </center>
                            
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>