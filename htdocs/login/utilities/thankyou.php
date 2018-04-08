<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registration Form</title>
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
</head>
    <body>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Registration Form</h4>
                    </div>
                    <div class="modal-body">
                            <div id="confirmation" class="alert alert-success">
                            <span class="glyphicon glyphicon-star"></span> You have been registered successfully, Please Activate Your Account From The Email Sent To You
                            </div>
                    <button type="button" onclick="window.location='http://telecomacademy.co.in'" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>