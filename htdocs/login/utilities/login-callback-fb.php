<?php
session_start();
require_once __DIR__ . '/fb/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '880027255444391',
  'app_secret' => '310820463e970afc975d68453634266e',
  'default_graph_version' => 'v2.5'
]);

$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)) {
   $fb->setDefaultAccessToken($accessToken);

  try {
  
    $requestProfile = $fb->get("/me?fields=name,email");
    $profile = $requestProfile->getGraphNode()->asArray();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }

  $name = $profile['name'];
  $email=$profile['email'];
  require_once '../db/db_func.php';
  $status=valueExistsApi($email,'Facebook');
  if($status==0)
 {
 	valueInsertApi($name,$email,'Facebook');
 }
 $_SESSION['user']=$name;
  header('location: ../');
  exit;
} else {
    echo "Unauthorized access!!!";
    exit;
}