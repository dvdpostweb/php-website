<?php  
require('configure/application_top.php');
require 'authentification2/src/authentification.php';
$authentification= new Authentification(array(
  'client_id'  => HTTPS_CLIENT_ID,
  'secret' => HTTPS_SECRET,
  'domain' => HTTPS_URL,
  'site' => PRIVATE_SITE,
));

$url = $_GET['url'];
$url=rawurlencode($url);
$all=$authentification->getRememberMe($_SESSION['access_token'],$url);
header('Location: '.$all);