<?php
$title = "Hosted Fields";
require_once('../resources/config.php');
//include(TEMPLATE_FRONT . DS . "header.php");
include(TEMPLATE_FRONT . DS . "hs-header.php");
include(TEMPLATE_FRONT . DS . "left-sidebar.php");
include(TEMPLATE_FRONT . DS . "navigation-top.php");


//$clientToken = createClientToken($accessToken); 
/$clientToken = createClientTokenWithCredentials($environment, $merchantId, $publicKey, $privateKey) ?>

<script type="text/javascript"></script>
<br /><br />
<!-- Bootstrap inspired Braintree Hosted Fields example -->
<div class="panel panel-default bootstrap-basic">
  <div class="panel-heading">
    <h3 class="panel-title">Enter Card Details</h3>
  </div>
  <form id="checkout" class="panel-body">
    <div class="row">
      <div class="form-group col-xs-8">
        <label class="control-label">Card Number</label>
        <!--  Hosted Fields div container -->
        <div class="form-control" id="card-number"></div>
        <span class="helper-text"></span>
      </div>
      <div class="form-group col-xs-4">
        <div class="row">
          <label class="control-label col-xs-12">Expiration Date</label>
          <div class="col-xs-6">
            <!--  Hosted Fields div container -->
            <div class="form-control" id="expiration-month"></div>
          </div>
          <div class="col-xs-6">
            <!--  Hosted Fields div container -->
            <div class="form-control" id="expiration-year"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <label class="control-label">Security Code</label>
        <!--  Hosted Fields div container -->
        <div class="form-control" id="cvv"></div>
      </div>
    </div>


    <button value="submit" id="submit" class="btn btn-danger pull-left">Pay with <span id="card-type">Card</span></button>
  </form>

  <div class="panel panel-result panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Result</h3>
    </div>
    <div class="panel-body" id="result">
       Waiting..
    </div>
  </div>

<!-- Load the required client component. -->
<script src="https://js.braintreegateway.com/web/3.5.0/js/client.min.js"></script>

<!-- Load Hosted Fields component. -->
<script src="https://js.braintreegateway.com/web/3.5.0/js/hosted-fields.min.js"></script>
<!-- Load 3ds  component. -->
<script src="https://js.braintreegateway.com/web/3.5.0/js/three-d-secure.min.js"></script>
<!-- Load data collector component. -->
<script src="https://js.braintreegateway.com/web/3.5.0/js/data-collector.min.js"></script>

<script>
var client_token = "<?php echo $clientToken; ?>"; 
var threeDSecure;

braintree.client.create({
  authorization: client_token
}, function (err, clientInstance) {
  if (err) {
    console.error(err);
    return;
  }
  
  braintree.dataCollector.create({
    client: clientInstance,
    kount: true
    
  }, function (err, dataCollectorInstance) {
      if (err) {
        console.log('device collector err fired...' + err);
        // Handle error in creation of data collector
        return;
      }
      // At this point, you should access the dataCollectorInstance.deviceData value and provide it
      // to your server, e.g. by injecting it into your form as a hidden input.
      console.log('look like data collector worked ' + dataCollectorInstance)
      var deviceData = dataCollectorInstance.deviceData;
    });

  braintree.hostedFields.create({
    client: clientInstance,
    styles: {
      'input': {
        'font-size': '14px',
        'font-family': 'helvetica, tahoma, calibri, sans-serif',
        'color': '#3a3a3a'
      },
      ':focus': {
        'color': 'black'
      }
    },
    fields: {
      number: {
        selector: '#card-number',
        placeholder: '4111 1111 1111 1111'
      },
      cvv: {
        selector: '#cvv',
        placeholder: '123'
      },
      expirationMonth: {
        selector: '#expiration-month',
        placeholder: 'MM'
      },
      expirationYear: {
        selector: '#expiration-year',
        placeholder: 'YY'
      }//,
      //postalCode: {
      //  selector: '#postal-code',
      //  placeholder: '90210'
      //}
    }
  }, function (err, hostedFieldsInstance) {
    if (err) {
      console.error(err);
      return;
    }

    hostedFieldsInstance.on('validityChange', function (event) {
      var field = event.fields[event.emittedBy];

      if (field.isValid) {
        if (event.emittedBy === 'expirationMonth' || event.emittedBy === 'expirationYear') {
          if (!event.fields.expirationMonth.isValid || !event.fields.expirationYear.isValid) {
            return;
          }
        } else if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('');
        }

        // Apply styling for a valid field
        $(field.container).parents('.form-group').addClass('has-success');
      } else if (field.isPotentiallyValid) {
        // Remove styling  from potentially valid fields
        $(field.container).parents('.form-group').removeClass('has-warning');
        $(field.container).parents('.form-group').removeClass('has-success');
        if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('');
        }
      } else {
        // Add styling to invalid fields
        $(field.container).parents('.form-group').addClass('has-warning');
        // Add helper text for an invalid card number
        if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('Looks like this card number has an error.');
        }
      }
    });

    hostedFieldsInstance.on('cardTypeChange', function (event) {
      // Handle a field's change, such as a change in validity or credit card type
      if (event.cards.length === 1) {
        $('#card-type').text(event.cards[0].niceType);
      } else {
        $('#card-type').text('Card');
      }
    });

    $('.panel-body').submit(function (event) {
      event.preventDefault();
      hostedFieldsInstance.tokenize(function (err, payload) {
        if (err) {
          console.error(err);
          return;
        }
        //console logging...
        console.log('Got a nonce: ' + payload.nonce);
        console.log('Got some details: ' + 'the last 2 was: ' + payload.details.lastTwo);
        console.log('the card type was ' + payload.details.cardType);
        console.log('Got some description: ' + payload.description);

         var payment_method_nonce = '&payment_method_nonce=' + payload.nonce;
        console.log(payment_method_nonce);

        // braintree.threeDSecure.create({
        //   client: clientInstance
        // }, function (threeDSecureErr, threeDSecureInstance) {
        //   if (threeDSecureErr) {
        //     // Handle error in 3D Secure component creation
        //     console.log('3ds error....' + threeDSecureErr);
        //     return;
        //   }
        //   console.log("something was logged..." . threeDSecureInstance)
        //   threeDSecure = threeDSecureInstance;
        // });
        
        // threeDSecure.verifyCard({
        //   amount: 150,
        //   nonce: payment_method_nonce
        //   // addFrame and removeFrame functions here later....

        // },  function (err, response) {
        //   if (err) {
        //     // Handle error
        //     console.log(err);
        //     return;
        //   }
        //   console.log(' got a new 3DS nonce: ' + response.nonce);
        //   // need to perform server side lookup with the nonce here..doa jquery post to lookup nonce
        //   var threeDSecureNonce = response.nonce;
        // });

        //send the payment method none to server
    $.post( "sale.php", payment_method_nonce)
          .done(function( data ) {
            
            //alert( "Data Loaded: " + data );
            $("#result").html( "<pre>" + data + "</pre>" );
              //     $('pre code').each(function(i, block) {
              //   hljs.highlightBlock(block);
              // });
              });

          //     $('pre code').each(function(i, block) {
          //   hljs.highlightBlock(block);
          // });
        });
      });
    });
  });




</script>
<!-- <script src="<?php echo DOMAIN . DS . PUBLIC_HOME . DS . 'js/hs.js'; ?>"></script> -->

<?php echo $clientToken; ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
