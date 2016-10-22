<?php
//ob_start();
//session_start();

require_once("../vendor/autoload.php");
require_once("functions.php");

/*
|-- ************* BRAINTREE CONFIGURATION ************* --| */
// //Phils default sandbox account
// Braintree_Configuration::environment('sandbox');
// Braintree_Configuration::merchantId('w2d7snyv86b6m993');
// Braintree_Configuration::publicKey('rm724h4nmjw6pg2n');
// Braintree_Configuration::privateKey('87b54560036ce7f21ee95c866357341c');

//-- Partner Configuration --//

// //a test app from Mark form BT
// $partnerClientId = 'client_id$sandbox$275h3nw6cx59vv7p';
// $partnerClientSecret = 'client_secret$sandbox$9b78e0ccdb313f3cc1d3c3a8fc9c8176';

//my BT sandbox test app - trial accounts dont seem to work on my account, maybe another setting is required in BT?
 $partnerClientId = 'client_id$sandbox$59fh2sd5sknfbchh';
 $partnerClientSecret = 'client_secret$sandbox$586a96992bcbb4b93996aafde7bc572d';

//DEFINE PROJECT PATH CONSTANTS
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

defined("PUBLIC_HOME") ? null : define("PUBLIC_HOME", "public");

//defined("DOMAIN") ? null : define("DOMAIN", "https://braintree-auth-pmward.c9users.io");
defined("DOMAIN") ? null : define("DOMAIN", "http://localhost:8888/braintree-Auth");
http://localhost:8888/braintree-Auth/public/

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
