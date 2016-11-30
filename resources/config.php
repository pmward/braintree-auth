<?php
//ob_start();
//session_start();

require_once("../vendor/autoload.php");
require_once("functions.php");

/*
|-- ************* BRAINTREE CONFIGURATION ************* --| */
// //Phils default sandbox account
$environment = 'sandbox';
$merchantId = 'w2d7snyv86b6m993';
$publicKey = 'rm724h4nmjw6pg2n';
$privateKey = '87b54560036ce7f21ee95c866357341c';

//-- Partner Configuration --//

// //a test app from Mark form BT
// $partnerClientId = 'client_id$sandbox$275h3nw6cx59vv7p';
// $partnerClientSecret = 'client_secret$sandbox$9b78e0ccdb313f3cc1d3c3a8fc9c8176';

//my BT sandbox test app - trial accounts dont seem to work on my account, maybe another setting is required in BT - 
 $partnerClientId = 'client_id$sandbox$59fh2sd5sknfbchh';
 $partnerClientSecret = 'client_secret$sandbox$586a96992bcbb4b93996aafde7bc572d';
 //$accessToken = 'access_token$sandbox$2bdsdksbkdvzcnxs$2afc80e9948cd0227806da136cf75849';
 // - UK ACCESS TOKENS CREATED VIA BT AUTH
 //Sellr:
 //$accessToken = 'access_token$sandbox$33q3tdtcjkxsy2gm$d2e11e04aabe667f635d524bd26d5e48';
 
 //Phils test harness:
 //$accessToken = 'access_token$sandbox$9wyh6sr6mbs4tvgw$2e5b15a809fb3d4712a576f2654bc52c';
 
 //new access token which should work for 3ds and PayPal - the below will hit PayPal sandbox
 $accessToken = 'access_token$sandbox$2npg24dd8qbxgt6f$4920e84eb2c1d93ecbc60760d47bcd14';
 //----------------------------------
 
 //'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$cd3d96b6a4ccf7bab234262c1024d099'
 //'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$2afc80e9948cd0227806da136cf75849'
 //access token with paypal and cards:
 //'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$597c8a02230dca13677dc78c52fb8e44',
 //'merchantAccountId' => 'USD'
 //'refreshToken' => string 'refresh_token$sandbox$2bdsdksbkdvzcnxs$9596b533e8b464d163de0d840710c5d9' (length=71)
 //'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$f0311a0859ef88dc813df434aecbef3a'
 //'accessToken' => 'access_token$sandbox$w2d7snyv86b6m993$c48ed26d18a0e2f5a2b91410119c2cbe'
//'accessToken' => 'access_token$sandbox$w2d7snyv86b6m993$3a165d034ed45434c9c2812ae796205f'


//DEFINE PROJECT PATH CONSTANTS
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

defined("PUBLIC_HOME") ? null : define("PUBLIC_HOME", "public");

//defined("DOMAIN") ? null : define("DOMAIN", "https://braintree-auth-pmward.c9users.io");
//defined("DOMAIN") ? null : define("DOMAIN", "http://localhost:8888/braintree-Auth");
//defined("DOMAIN") ? null : define("DOMAIN", "https://bt-auth:8890");
//http://localhost:8888/braintree-Auth/public/
defined("DOMAIN") ? null : define("DOMAIN", "https://bt-auth-v2-pmward.c9users.io");
//defined("BASE_PATH") ? null : define("BASE_PATH", "braintree/braintree-partner-api");

$domain = urlencode("http://localhost:8888/braintree-Auth");
$base_path = "public";

//DEFINE DB CONFIG
defined("DB_HOST") ? null : define("DB_HOST", "localhost");

defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "root");

//defined("DB_NAME") ? null : define("DB_NAME", "ecom_db");

//$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>
