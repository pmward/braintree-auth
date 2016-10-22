
<?php
    require_once('vendor/autoload.php');
  	//Phils default sandbox account
    Braintree_Configuration::environment('sandbox');
  	Braintree_Configuration::merchantId('w2d7snyv86b6m993');
  	Braintree_Configuration::publicKey('rm724h4nmjw6pg2n');
  	Braintree_Configuration::privateKey('87b54560036ce7f21ee95c866357341c');


    /*
    echo $clientToken = Braintree_ClientToken::generate(array
    ('customerId' => '',
     'merchantAccountId' =>       'UK-MID-no-Amex')); */

//ClientID: $sandbox$275h3nw6cx59vv7p
//Client Secret: client_secret$sandbox$9b78e0ccdb313f3cc1d3c3a8fc9c8176

     $partnerClientId = 'client_id$sandbox$275h3nw6cx59vv7p';
     $partnerClientSecret = 'client_secret$sandbox$9b78e0ccdb313f3cc1d3c3a8fc9c8176';

    
    // $gateway = new Braintree_Gateway(array(
    // 'clientId' => 'client_id$sandbox$275h3nw6cx59vv7p',
    // 'clientSecret' => 'client_secret$sandbox$9b78e0ccdb313f3cc1d3c3a8fc9c8176'
    // )); 

    $gateway = new Braintree_Gateway(array(
    'clientId' => $partnerClientId,
    'clientSecret' => $partnerClientSecret
    ));

$result = $gateway->merchant()->create(array(
    'email' => 'name@email.com',
    'countryCodeAlpha3' => 'USA',
    'paymentMethods' => array('credit_card', 'paypal')
));


echo "<p> The ID is = ";
echo $merchantId = $result->merchant->id . "<br /></p>";
echo "<p> The Access token is = ";
echo $accessToken = $result->credentials->accessToken;
echo "</p>";




?>
