<?php
$title = "Create Client Token"; 
require_once('../resources/config.php');
include(TEMPLATE_FRONT . DS . "header.php"); 
include(TEMPLATE_FRONT . DS . "navigation-top.php");

//instatiate gateway object
$gateway = new Braintree_Gateway(array(
    //'clientId' => $partnerClientId,
	//'clientSecret' => $partnerClientSecret,
    //'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$cd3d96b6a4ccf7bab234262c1024d099'
    'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$2afc80e9948cd0227806da136cf75849'
    // access token with paypal and cards:
   // 'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$597c8a02230dca13677dc78c52fb8e44',
    //'merchantAccountId' => 'USD'
    // 'refreshToken' => string 'refresh_token$sandbox$2bdsdksbkdvzcnxs$9596b533e8b464d163de0d840710c5d9' (length=71)
    
    //'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$f0311a0859ef88dc813df434aecbef3a'
    //'accessToken' => 'access_token$sandbox$w2d7snyv86b6m993$c48ed26d18a0e2f5a2b91410119c2cbe'
    //'accessToken' => 'access_token$sandbox$w2d7snyv86b6m993$3a165d034ed45434c9c2812ae796205f'
    
));

echo "<br/>" . "<pre>";
var_dump($gateway);
echo "</pre>" . "<br />" . "<br/>";

//generate client token

echo "client token generated: "; 
echo $clientToken = $gateway->clientToken()->generate(array(
  //"customerId" => '',
  'merchantAccountId' => 'USD'));
    
?>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

?>