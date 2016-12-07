<?php
require_once('../resources/config.php');
//instatiate gateway object
$gateway = new Braintree_Gateway(array(
    //'clientId' => $partnerClientId,
	//'clientSecret' => $partnerClientSecret,
    //'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$cd3d96b6a4ccf7bab234262c1024d099'
    
    'accessToken' => $accessToken
    //'accessToken' => $accessToken
    //the merchantAccountId' => 'philwardyhotmailcouk' - but no need to specify a MID if using BT Auth Auth.
    //'accessToken' => 'access_token$sandbox$w2d7snyv86b6m993$c48ed26d18a0e2f5a2b91410119c2cbe'
    //'accessToken' => 'access_token$sandbox$w2d7snyv86b6m993$3a165d034ed45434c9c2812ae796205f'
      // 'environment' => $environment,
      //   'merchantId' => $merchantId,
      //   'publicKey' => $publicKey,
      //   'privateKey' => $privateKey
));

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
$result = $gateway->paymentMethodNonce()->find($_POST['payment_method_nonce']

);

echo '<pre>';
print_r($result);
echo '</pre>';

?>
