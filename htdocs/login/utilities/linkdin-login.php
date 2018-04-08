<?php
session_start();
require_once("../db/db_config.php");
include_once("LinkedIn/http.php");
include_once("LinkedIn/oauth_client.php");

//db class instance
$db = Connect_DB();

if (isset($_GET["oauth_problem"]) && $_GET["oauth_problem"] <> "") {
  // in case if user cancel the login. redirect back to home page.
  $_SESSION["err_msg"] = $_GET["oauth_problem"];
  echo "<script>alert('Error');</script>";
  //header("location:../index.php");
  exit;
}

$client = new oauth_client_class;

$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = 'http://telecomacademy.co.in/utilities/linkdin-login.php';

$client->client_id = '75ftmt71j4qbys';
$application_line = __LINE__;
$client->client_secret = 'e8pgRvYSYcnOlISQ';

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
  die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
			'necessary permissions to execute the API calls your application needs.';

/* API permissions
 */
$client->scope = $linkedinScope;
if (($success = $client->Initialize())) {
  if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      $success = false;
    } elseif (strlen($client->access_token)) {
      $success = $client->CallAPI(
					'http://api.linkedin.com/v1/people/~:(email-address,first-name,last-name)', 
					'GET', array(
						'format'=>'json'
					), array('FailOnAccessError'=>true), $user);
    }
  }
  $success = $client->Finalize($success);
}
if ($client->exit) exit;
if ($success) {
  	$email=$user->emailAddress;
  	$name=$user->firstName." ".$user->lastName;
  	require_once '../db/db_func.php';
  	$status=valueExistsApi($email,'LinkedIn');
  	if($status==0)
	 {
 		valueInsertApi($name,$email,'LinkedIn');
 	}
 	$_SESSION['user']=$name;

} else {
 	 $_SESSION["err_msg"] = $client->error;
 	 die("Some Error Has Occured Please Contact Site Administrator");
}
header("location:../");
exit;
?>