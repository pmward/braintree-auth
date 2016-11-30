<?php
require_once('../resources/config.php');
//instatiate gateway object
$gateway = new Braintree_Gateway(array(
    //'clientId' => $partnerClientId,
	//'clientSecret' => $partnerClientSecret,
    //'accessToken' => 'access_token$sandbox$2bdsdksbkdvzcnxs$cd3d96b6a4ccf7bab234262c1024d099'
    
    'accessToken' => 'access_token$sandbox$2npg24dd8qbxgt6f$4920e84eb2c1d93ecbc60760d47bcd14'
    //'accessToken' => $accessToken
    //the merchantAccountId' => 'philwardyhotmailcouk' - but no need to specify a MID if using BT Auth Auth.
    //'accessToken' => 'access_token$sandbox$w2d7snyv86b6m993$c48ed26d18a0e2f5a2b91410119c2cbe'
    //'accessToken' => 'access_token$sandbox$w2d7snyv86b6m993$3a165d034ed45434c9c2812ae796205f'
      // 'environment' => $environment,
      //   'merchantId' => $merchantId,
      //   'publicKey' => $publicKey,
      //   'privateKey' => $privateKey
));

$result = $gateway->transaction()->sale(array(
 // 'deviceData' => $POST['device_data'],
  //'deviceData' => $POST['123456789'],
  'amount' => '1.58',
  //'merchantAccountId' => 'USD',
  //'paymentMethodNonce' => 'fake-valid-nonce'
  'paymentMethodNonce' => $_POST['payment_method_nonce'],
  /*-- decline nonces-- */
  //'paymentMethodNonce' => 'fake-processor-declined-visa-nonce'
    //'paymentMethodNonce' => 'fake-gateway-rejected-fraud-nonce',
    
    'options' => [
    'submitForSettlement' => true
  ]
    
));

echo '<pre>';
print_r($result);
echo '</pre>';

?>
