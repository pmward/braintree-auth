
<?php $title = "Braintree Partner API test harness"; ?>

<?php
require_once('../resources/config.php');

?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "navigation-top.php"); ?>

<?php
//get the onboarding URL:
$url = createSignUp($partnerClientId, $partnerClientSecret, $onboardingParams);

?>
        <br/><br /><h1>PayPal Powered by Braintree</h1>

        <div class="row">
            <div class="col-md-10">

               <a href="<?php echo $url ; ?>" role="button">
                   <img src="https://s3-us-west-1.amazonaws.com/bt-partner-assets/connect-braintree.png" alt="Connect with Braintree" width="328" height="44"></a>
                   </div>
        </div><br />

        <div class="row">
            <div class="col-md-10">
               <div class="panel panel-default">
                   <div class="panel-heading"><h3 class="panel-title">Request</h3></div>
                       <div class="panel-body">
                           <pre><?php echo urldecode($url); ?></pre>

                       </div>
               </div>
            </div>
        </div>


  <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
