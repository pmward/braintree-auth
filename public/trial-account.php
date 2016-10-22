<?php
$title = "create trial account"; 
require_once('../resources/config.php');
include(TEMPLATE_FRONT . DS . "header.php"); 
include(TEMPLATE_FRONT . DS . "navigation-top.php");



// echo "<br/>" . "<pre>";
// var_dump($gateway);
// echo "<br />" . "<br/>";

$trialMerchantAccount = createTrialAccount($partnerClientId, $partnerClientSecret);

echo "<div>" . "<pre>";
var_dump($trialMerchantAccount);
echo "</div>" . "</pre>";

?>

<php include(TEMPLATE_FRONT . DS . "footer.php"); ?>