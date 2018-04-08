<?php
session_start();
session_destroy();
if(!isset($_SESSION['user']))
	{
	$url="http://".$_SERVER['HTTP_HOST'];
	header('Location:'.$url);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> <?php echo $_SESSION['user'];?> Signing out !
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/OTPstyle.css">
<style type="text/css">
	.progress {background: rgba(245, 245, 245, 1); border: 0px solid rgba(245, 245, 245, 1); border-radius: 10px; height: 30px;}
	.progress-bar-custom {background: rgba(66, 139, 202, 1);}
</style>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#myModal").modal('show');
			});
		</script>
        <script type="text/javascript">
            function insertDots()
            {
                document.getElementById('tmr').innerHTML+=".";
                setTimeout(insertDots,100);
            }
            setTimeout(function(){
            	window.location="";
            	},1000);
        </script>
</head>
    <body onload="insertDots()">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><?php echo $_SESSION['user']; unset($_SESSION['user']);?> is Signing out !</h4>
                    </div>
                    <div class="modal-body">
                    	<big><big><big><font id="tmr">Redirecting</font></big></big></big>
                   		<br><br>
                    	<div class="progress">
    						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    					</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>