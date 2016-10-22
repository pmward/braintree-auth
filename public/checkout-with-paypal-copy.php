<?php
$title = "Checkout with PayPal";
require_once('../resources/config.php');
include(TEMPLATE_FRONT . DS . "header.php");
include(TEMPLATE_FRONT . DS . "navigation-top.php");
include(TEMPLATE_FRONT . DS . "left-sidebar.php");


?>
<br/><br/><br/><br>


<script src="https://www.paypalobjects.com/api/button.js?"
     data-merchant="braintree"
     data-id="paypal-button"
     data-button="checkout"
     data-color="silver"
     data-size="medium"
     data-shape="pill"
     data-button_type="submit"
     data-button_disabled="false"
 ></script>
 <!-- Configuration options:
  data-color: "blue", "gold", "silver"
  data-size: "tiny", "small", "medium"
  data-shape: "pill", "rect"
  data-button_disabled: "false", "true"
  data-button_type: "submit", "button"
--->
<?php $clientToken = createClientToken($accessToken); ?>

<script type="text/javascript">

var client_token = "<?php echo $clientToken; ?>";

// Fetch the button you are using to initiate the PayPal flow
var paypalButton = document.getElementById('paypal-button');

// Create a Client component
braintree.client.create({
  authorization: client_token
}, function (clientErr, clientInstance) {
  // Create PayPal component
  braintree.paypal.create({
    client: clientInstance
  }, function (paypalErr, paypalInstance) {

    // Stop if there was a problem creating PayPal.
   // This could happen if there was a network error or if it's incorrectly
   // configured.
   if (paypalErr) {
     console.error('Error creating PayPal:', paypalErr);
     return;
   }
    // When the button is clicked, attempt to tokenize.
    paypalButton.addEventListener('click', function () {
      // Because tokenization opens a popup, this has to be called as a result of
      // customer action, like clicking a button—you cannot call this at any time.
      paypalInstance.tokenize({
        flow: 'checkout', // Required
        amount: 10.00, // Required
        currency: 'USD', // Required
        locale: 'en_US',
        enableShippingAddress: true,
        shippingAddressEditable: false,
        shippingAddressOverride: {
          recipientName: 'Scruff McGruff',
          line1: '1234 Main St.',
          line2: 'Unit 1',
          city: 'Chicago',
          countryCode: 'US',
          postalCode: '60652',
          state: 'IL',
          phone: '123.456.7890'
        }
      }, function (tokenizeErr, Payload) {

        if (tokenizeErr) {
        // Handle tokenization errors or premature flow closure

          switch (tokenizeErr.code) {
            case 'PAYPAL_POPUP_CLOSED':
              console.error('Customer closed PayPal popup.');
              break;
            case 'PAYPAL_ACCOUNT_TOKENIZATION_FAILED':
              console.error('PayPal tokenization failed. See details:', tokenizeErr.details);
              break;
            case 'PAYPAL_FLOW_FAILED':
              console.error('Unable to initialize PayPal flow. Are your options correct?', tokenizeErr.details);
              break;
            default:
              console.error('Error!', tokenizeErr);
          }
        } else {
      // Submit payload.nonce to your server
        // Tokenization succeeded!
        //paypalButton.setAttribute('disabled', true);
        console.log('Got a nonce! You should submit this to your server.');
        console.log(payload.nonce);
        console.log(payload.details);


      });
    });
  });
});

</script>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
