<?php
$title = "Checkout with PayPal";
require_once('../resources/config.php');
include(TEMPLATE_FRONT . DS . "header.php");
include(TEMPLATE_FRONT . DS . "navigation-top.php");
include(TEMPLATE_FRONT . DS . "left-sidebar.php");

// echo "<br/>" . "<pre>";
// var_dump($gateway);
// echo "<br />" . "<br/>";
?>
<br/>
<br/>

<!-- Load the client component. -->
<script src="https://js.braintreegateway.com/web/3.5.0/js/client.min.js"></script>

<!-- Load the PayPal component. -->
<script src="https://js.braintreegateway.com/web/3.5.0/js/paypal.min.js"></script>

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

</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
