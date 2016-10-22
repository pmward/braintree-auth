<?php


require_once('../resources/config.php');

$trialAccount = createMerchant($partnerClientId, $partnerClientSecret);
echo '<pre>';
echo print_r($trialAccount);
echo '</pre>';

$onboardingParams = array(
    'merchantId' => 'c62xmytns4rhrsgb',
    'redirectUri' => 'https://pplabs.co.uk/~phil/braintree/partnerapi/return.php',
    'scope' => 'read_write',
    'state' => 'foo_state',
    'user' => array(
        'country' => 'USA',
        'email' => 'foo@example.com'
    ),
    'business' => array(
        'name' => '1490 snakes and Ladders',
        'registeredAs' => '1490.0 Ladders'
    ),
    'paymentMethods' => array(
        'credit_card', 'paypal'
    ));


$signedUpMerchant = createSignUp($partnerClientId, $partnerClientSecret, $onboardingParams);

//echo $signedUpMerchant;
?>
