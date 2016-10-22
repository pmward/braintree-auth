<?php
require_once('../resources/config.php');

?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "navigation-top.php"); ?>



// Pick up the token from Braintree
<?
$gateway = new Braintree_Gateway([
	'clientId' => 'client_id$sandbox$b56fhtx5q4hmdvxj',
	'clientSecret' => 'client_secret$sandbox$0d28fd5017c406a2925ad4a318bd7555'
]);
echo "<br/>";
echo "<br/>";
var_dump($gateway);

echo "<br/>";
echo "<br/>";
echo "<br/>";



$result = $gateway->oauth()->createTokenFromCode([
    'code' => 'ef5baf3d14b32f87']);
echo "<pre>";
var_dump($result);
echo "</pre>";

?>