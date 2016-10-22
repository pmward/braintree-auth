<?php
$title = "Braintree Auth return"; 
require_once('../resources/config.php');
include(TEMPLATE_FRONT . DS . "header.php"); 
include(TEMPLATE_FRONT . DS . "navigation-top.php");

echo "<br />" . "< br/>";
//instatiate gateway object
$gateway = new Braintree_Gateway([
    'clientId' => $partnerClientId,
    'clientSecret' => $partnerClientSecret
]);

//exchange the code for an accesstoken
$result = $gateway->oauth()->createTokenFromCode([
//need to store this code value in session later
//'code' => '468948e2088fc168']);

'code' => 'fake-valid-auth-code']);
/* Dummy auth codes from BT site, these can be   
|- 'fake-valid-auth-code'   A valid auth code that can be exchanged for an access token and a refresh token
|- 'fake-used-auth-code'    An auth code that will be treated as a duplicate submission
|- 'fake-expired-auth-code' An auth code that will be treated as expired    

access token hard coded from before below:
'accessToken' => string 'access_token$sandbox$2bdsdksbkdvzcnxs$cd3d96b6a4ccf7bab234262c1024d099' (length=70)
'refreshToken' => string 'refresh_token$sandbox$2bdsdksbkdvzcnxs$f6fc43e144b0d60b63d297c6f22b31e6' (length=71)
'tokenType' => string 'bearer' (length=6)    
*/ 

echo "<div>" . "<p2>";

// echo $accessToken = $result->credentials->accessToken;
// echo $expiresAt = $result->credentials->expiresAt;
// echo $refreshToken = $result->credentials->refreshToken;
echo "</p2>" . "</div>";

echo "<div>" . "<pre>";
var_dump($result);
echo "</div>" . "</pre>";
    
?>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>