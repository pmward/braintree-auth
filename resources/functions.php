<?php
include("config.php");

//echo($clientToken = Braintree_ClientToken::generate());

function createTrialAccount($partnerClientId, $partnerClientSecret) {
    $gateway = new Braintree_Gateway(array(

       'clientId' => $partnerClientId,
       'clientSecret' => $partnerClientSecret));

    $trialAccount = $gateway->merchant()->create(array(
        'email' => 'pmward12346@hotmail.com',
        'countryCodeAlpha3' => 'USA',
        'paymentMethods' => array('paypal')));

    return $trialAccount;
}
// $trialAccount = createTrialAccount($partnerClientId, $partnerClientSecret);
// print_r($trialAccount);

//US onboarding example
/* $onboardingParams = array(
    //'merchantId' => 'c62xmytns4rhrsgb',
    'redirectUri' => DOMAIN . DS . PUBLIC_HOME . DS . "return.php",
    'scope' => 'read_write',
    'state' => 'phil_foo_state',
    'user' => array(
        'country' => 'USA',
        'email' => 'philwardy@hotmail.co.uk'
    ),
    'business' => array(
        'name' => '1490 snakes and Ladders',
        'registeredAs' => '1490.0 Ladders',
        'description' => 'fashion retailer',
        'industry' => 'clothing',
        'street_address' => 'clothing',
        'locality' => 'clothing',
        'region' => 'fashion retailer',
        'postal_code' => '90210',
        'country' => 'USA',
        'established_on' => '1981-01',
        'annual_volume_amount' => 50000,
        'average_transaction_amount' => 100,
        'maximum_transaction_amount' => 9998,
        'ship_physical_goods' => true,
        'fulfillment_completed_in' => 3,
        'currency' => 'USD',
        'website' => 'http://example.com'
    ),
    'paymentMethods' => array(
        'credit_card', 'paypal'
    ));*/
    
    //UK onboarding
    $onboardingParams = array(
    //'merchantId' => 'c62xmytns4rhrsgb',
    'redirectUri' => DOMAIN . DS . PUBLIC_HOME . DS . "return.php",
    'scope' => 'read_write',
    'state' => 'phil_foo_state_uk',
    'user' => array(
        'country' => 'GBR',
        'email' => 'pward@paypal.com'
    ),
    'business' => array(
        'name' => 'A UK business ',
        'registeredAs' => 'UK T-Shirt store',
        'description' => 'fashion retailer',
        'industry' => 'clothing',
        'street_address' => 'uk t-shirt store - Shepherds Chase',
        'locality' => 'bagshot',
        'region' => 'Surrey',
        'postal_code' => 'GU195QX',
        'country' => 'GBR',
        'established_on' => '1981-01',
        'annual_volume_amount' => 50000,
        'average_transaction_amount' => 100,
        'maximum_transaction_amount' => 9998,
        'ship_physical_goods' => true,
        'fulfillment_completed_in' => 3,
        'currency' => 'GBP',
        'website' => 'http://example.com'
    ),
    'paymentMethods' => array(
        'credit_card', 'paypal'
    ));


//function createSignUp($partnerClientId, $partnerClientSecret, $ukOnboardingParams) {
function createSignUp($partnerClientId, $partnerClientSecret, $onboardingParams) {

    $gateway = new Braintree_Gateway(array(

       'clientId' => $partnerClientId,
       'clientSecret' => $partnerClientSecret));

    $url = $gateway->oauth()->connectUrl(array(
        //'merchantId' => $onboardingParams["merchantId"],
        'redirectUri' => $onboardingParams["redirectUri"],
        'scope' =>  $onboardingParams["scope"],
        'state' =>  $onboardingParams["state"],
        'user' => array(
            'country' => $onboardingParams["user"]["country"],
            'email' => $onboardingParams["user"]["email"]
        ),
        'business' => array(
            'name' => $onboardingParams["business"]["name"],
            'registeredAs' => $onboardingParams["business"]["registeredAs"]
        ),
        'paymentMethods' => array(
            'credit_card','paypal'
        )
    ));
    return $url;
}


//$url = createSignUp($partnerClientId, $partnerClientSecret, $onboardingParams);

?>
