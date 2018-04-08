<?php
@session_start();
$url="http://".$_SERVER['HTTP_HOST'];
if(!isset($_SESSION['st']))
{
	session_destroy();
	header('Location:'.$url);
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Forgot your password</title>
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
	function goToHome()
	{
		window.location='<?php
		echo $url;
		?>';
	}
</script>

</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="goToHome()" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Forgot your password</h4>
            </div>
            <div class="modal-body">
                    <div id="confirmation" class="alert alert-success">
                    <span class="glyphicon glyphicon-star"></span> Password has been changed sucessfully
                </form>
            </div>
            <button type="button" onclick="goToHome()" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</body>
</html>                                		