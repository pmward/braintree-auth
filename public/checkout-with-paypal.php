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
  }, function (err, paypalInstance) {
    paypalButton.addEventListener('click', function () {
      // Tokenize here!
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
      }, function (err, tokenizationPayload) {
        // Tokenization complete
        // Send tokenizationPayload.nonce to server
        console.log('something worked...')
      });
    });
  });
});

</script>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
