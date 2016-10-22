<?php
$title = "Braintree Auth return"; 
require_once('../resources/config.php');
include(TEMPLATE_FRONT . DS . "header.php"); 
include(TEMPLATE_FRONT . DS . "navigation-top.php");


$codeFromBtAuth = $_GET['code'];


echo "<p3>" . "the code from Braintree Auth is: " .  "<strong>" . "<br/><br />";
echo $codeFromBtAuth . "</p3>" . "</strong>" . "<br /><br />";

echo "<pre>";
var_dump($_GET);
echo "</pre>";

//example return URL for a success
//https://braintree-auth-pmward.c9users.io/public/return.php?state=phil_foo_state&merchantId=2bdsdksbkdvzcnxs&code=74c41b6f405216e0
//https://braintree-auth-pmward.c9users.io/public/return.php?state=phil_foo_state&merchantId=2bdsdksbkdvzcnxs&code=9564222d143b439c

?>

<div></div>
<php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

