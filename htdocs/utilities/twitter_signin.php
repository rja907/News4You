<?php
session_start();
require 'autoload-tw.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'ljRJyA7K4qOwLQlv0VdWGqLk9'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'hnGodvOztKbPn5lyG5tiWfCiCppjWNbRKDAC7RpwfgvpWXsOmW'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'http://telecomacademy.co.in/utilities/callback-twitter.php'); // your app callback URL
if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	header('location:'.$url);
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user = $connection->get("account/verify_credentials");
	$name=$user->name;
	$email=$user->screen_name;
	require_once '../db/db_func.php';
  	$status=valueExistsApi($email,'Twitter');
  	if($status==0)
	 {
 		valueInsertApi($name,$email,'Twitter');
 	}
 	$_SESSION['user']=$name;
  	header('location: ../');
}