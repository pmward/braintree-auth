<?php
require_once('../resources/config.php');


// $trialMerchantAccount = createMerchant($partnerClientId, $partnerClientSecret);
// echo "<pre>";
// var_dump($trialMerchantAccount);
// echo "</pre>";


$url = $gateway->oauth()->connectUrl(array(
    'merchantId' => 'tmpnv8qsvmqshdtx',
    'redirectUri' => 'https://pplabs.co.uk/~phil/braintree/partnerapi/return.php',
    'scope' => 'read_write',
    'state' => 'foo_state',
    'user' => array(
        'country' => 'USA',
        'email' => 'foo@example.com'
    ),
    'business' => array(
        'name' => 'Awesome T Shirt Store',
        'registeredAs' => 'pmward ltd'
    ),
    'paymentMethods' => array(
        'credit_card'
    )
));


?>

