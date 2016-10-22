<?php
$title = "Get refresh Token"; 
require_once('../resources/config.php');
include(TEMPLATE_FRONT . DS . "header.php"); 
include(TEMPLATE_FRONT . DS . "navigation-top.php");


$gateway = new Braintree_Gateway(array(
    'clientId' => $partnerClientId,
	'clientSecret' => $partnerClientSecret));

$result = $gateway->oauth()->createTokenFromRefreshToken([
    'refreshToken' => 'refresh_token$sandbox$2bdsdksbkdvzcnxs$9596b533e8b464d163de0d840710c5d9'
]);
echo "<br/>" . "<br/>";
echo $accessToken = $result->credentials->accessToken; 
echo "<br/>";
echo $expiresAt = $result->credentials->expiresAt;
echo "<br/>";
echo $refreshToken = $result->credentials->refreshToken;
echo "<br/>";

include(TEMPLATE_FRONT . DS . "footer.php"); ?>
