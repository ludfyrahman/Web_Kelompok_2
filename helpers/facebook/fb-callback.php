<?php 
include "../../vendor/autoload.php";
include "../../define.php";
$fb = new \Facebook\Facebook([
  'app_id' => APP_FACEBOOK_ID,
  'app_secret' => APP_FACEBOOK_SECRET,
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/Papikos/pengguna/loginfb");

try{
  $accessToken = $helper->getAccessToken();
  if(isset($accessToken)){
    $_SESSION['access_token'] = (string)$accessToken;
  }
}catch(Exception $ex){
  echo $ex->getTraceAsString();
}