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
 
<?php include(TEMPLATE_FRONT . DS . 'result-panel.php'); ?> 
 <!-- Configuration options:
  data-color: "blue", "gold", "silver"
  data-size: "tiny", "small", "medium"
  data-shape: "pill", "rect"
  data-button_disabled: "false", "true"
  data-button_type: "submit", "button"
--->
<?php $clientToken = createClientToken($accessToken); ?>

<script type="text/javascript">
var payment_method_nonce = null;

var client_token = "<?php echo $clientToken; ?>";

// Fetch the button you are using to initiate the PayPal flow
var paypalButton = document.querySelector('.paypal-button');

// Create a client.
braintree.client.create({
  authorization: client_token
}, function (clientErr, clientInstance) {

  // Stop if there was a problem creating the client.
  // This could happen if there is a network error or if the authorization
  // is invalid.
  if (clientErr) {
    console.error('Error creating client:', clientErr);
    return;
  }

  // Create a PayPal component.
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

    // Enable the button.
    paypalButton.removeAttribute('disabled');

    // When the button is clicked, attempt to tokenize.
    paypalButton.addEventListener('click', function (event) {

      // Because tokenization opens a popup, this has to be called as a result of
      // customer action, like clicking a button—you cannot call this at any time.
      paypalInstance.tokenize({
      flow: 'checkout', // Required
      amount: 10.00, // Required
      currency: 'GBP', // Required
      locale: 'en_US',
      intent: 'authorize',
      enableShippingAddress: true,
      }, function (tokenizeErr, payload) {

        // Stop if there was an error.
        if (tokenizeErr) {
          if (tokenizeErr.type !== 'CUSTOMER') {
            console.error('Error tokenizing:', tokenizeErr);
          }
          return;
        }

        // Tokenization succeeded!
        paypalButton.setAttribute('disabled', true);
        console.log('Got a nonce! You should submit this to your server.');
        console.log(payload.nonce);
        
        var payment_method_nonce = '&payment_method_nonce=' + payload.nonce;
        console.log(payment_method_nonce);
        
          $.post( "sale.php", payment_method_nonce)
          .done(function( data ) {
            
            //alert( "Data Loaded: " + data );
            $("#result").html( "<pre>" + data + "</pre>" );
              //     $('pre code').each(function(i, block) {
              //   hljs.highlightBlock(block);
              // });
              });

      });

    }, false);
    
    
    
  
    
  });

});

</script>
<script src="https://js.braintreegateway.com/web/3.5.0/js/paypal.min.js"></script>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
