# braintree-auth
test harness for Braintree Auth

SETUP

1) Ensure you have composer https://getcomposer.org/ setup on your environment, this is the reccomended way to install the Braintree PHP SDK.
2) Update the composer.json file with the latest braintree PHP SDK version, which you can find detailed here https://developers.braintreepayments.com/start/hello-server/php
3) Run composer update from the command line. You should see the Braintree SDK and various dependencies being installed.
4) naviage to the resources/config.php and set you project DOMAIN constant. You will also need to configure you're own Braintree client_id, secret and access_tokens
5) you're all set!
