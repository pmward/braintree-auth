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

// if(isset($_SESSION['codeFromBtAuth'])) {
//   echo  "<p3" . $_SESSION['codeFromBtAuth'] . "</p3>";

//   //exchange the code for an accesstoken
//   $result = $gateway->oauth()->createTokenFromCode([
//   //need to store this code value in session later
//   'code' => $_SESSION['codeFromBtAuth']]);

//   //'code' => 'fake-valid-auth-code']);
//   /* Dummy auth codes from BT site, these can be
//   |- 'fake-valid-auth-code'   A valid auth code that can be exchanged for an access token and a refresh token
//   |- 'fake-used-auth-code'    An auth code that will be treated as a duplicate submission
//   |- 'fake-expired-auth-code' An auth code that will be treated as expired    */

// } else {
//   echo "there is no code stored in session, you need to go back through the BT Auth flow again";
// }
//
// access token hard coded from before below:
// 'accessToken' => string 'access_token$sandbox$2bdsdksbkdvzcnxs$cd3d96b6a4ccf7bab234262c1024d099' (length=70)
// 'refreshToken' => string 'refresh_token$sandbox$2bdsdksbkdvzcnxs$f6fc43e144b0d60b63d297c6f22b31e6' (length=71)
// 'tokenType' => string 'bearer' (length=6)
// */
//
// echo "<div>" . "<p2>";
//
// // echo $accessToken = $result->credentials->accessToken;
// // echo $expiresAt = $result->credentials->expiresAt;
// // echo $refreshToken = $result->credentials->refreshToken;
// echo "</p2>" . "</div>";

  $result = $gateway->oauth()->createTokenFromCode([
  //need to store this code value in session later
  'code' => '787cb21e60c96c04']);

echo "<div>" . "<pre>";
var_dump($result);
echo "</div>" . "</pre>";

?>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
