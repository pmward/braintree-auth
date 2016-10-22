<?php
$title = "Create Client Token";
require_once('../resources/config.php');
include(TEMPLATE_FRONT . DS . "header.php");
include(TEMPLATE_FRONT . DS . "navigation-top.php"); ?>

<?php
// echo "<br/>" . "<pre>";
// var_dump($gateway);
// echo "</pre>" . "<br />" . "<br/>";

//generate client token
$clientToken = createClientToken($accessToken);
echo "client token generated: ";
echo $clientToken;

?>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
