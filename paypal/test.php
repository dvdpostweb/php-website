<?php
/***********************************************************
CreateRPProfileReceipt.php

Submits a Profile Details and credit card information to PayPal using a
CreateRecurringPaymentsProfile request.

The code collects transaction parameters from the form
displayed by CreateRPProfile.php then constructs and sends
the CreateRecurringPaymentsProfile request string to the PayPal server.

After the PayPal server returns the response, the code
displays the API request and response in the browser.
If the response from PayPal was a success, it displays the
response parameters. If the response was an error, it
displays the errors.

Called by CreateRPProfile.php.

Calls CallerService.php and APIError.php.

***********************************************************/

require_once 'CallerService.php';

session_start();


/**
 * Get required parameters from the web form for the request
 */
/* 
 &PAYMENTREQUEST_0_PAYMENTACTION=AUTHORIZATION    #Payment authorization  
 &PAYMENTREQUEST_0_AMT=0    #The amount authorized
 &PAYMENTREQUEST_0_CURRENCYCODE=USD    #The currency, e.g. US dollars
 &L_BILLINGTYPE0=MerchantInitiatedBilling    #The type of billing agreement
 &L_BILLINGAGREEMENTDESCRIPTION0=ClubUsage    #The description of the billing agreement
 &cancelUrl=http://www.yourdomain.com/cancel.html    #For use if the consumer decides not to proceed with payment 
 &returnUrl=http://www.yourdomain.com/success.html   #For use if the consumer proceeds with payment */


$nvpstr="&PAYMENTREQUEST_0_PAYMENTACTION=AUTHORIZATION&PAYMENTREQUEST_0_AMT=0&PAYMENTREQUEST_0_CURRENCYCODE=EUR&L_BILLINGTYPE0=MerchantInitiatedBilling&L_BILLINGAGREEMENTDESCRIPTION0=dvdpost_test&cancelUrl=http://private.dvdpost.com&returnUrl=http://localhost/paypal2/get_detail.php";

/* Make the API call to PayPal, using API signature.
   The API response is stored in an associative array called $resArray */
$resArray=hash_call("SetExpressCheckout",$nvpstr);

/* Display the API response back to the browser.
   If the response from PayPal was a success, display the response parameters'
   If the response was an error, display the errors received using APIError.php.
   */
   
$ack = strtoupper($resArray["ACK"]);
if($ack!="SUCCESS")  {
    $_SESSION['reshash']=$resArray;
	  $location = "../APIError.php";
		header("Location: $location");
}

?>

<html>
<head>
    <title>PayPal PHP SDK - CreateRecurringPaymentsProfile API</title>
    <link href="../sdk.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<br>
	<center>
	<font size=2 color=black face=Verdana><b>Create Recurring Payments Profile</b></font>
	<br><br>
    <table width = 400>
    	<?php 
    		foreach($resArray as $key => $value) {
    			
    			echo "<tr><td>$key:</td><td>$value</td>";
    		}	
    	?>
    	<a href="https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=<?= $resArray["TOKEN"] ?> ">go go go</a>
    	<tr>
    		<td>
    			<a id="GetRPProfileDetailsLink" href="GetRPProfileDetails.html?profileID=<?php echo $resArray['PROFILEID'];?>">Get Recurring Payments Details</a>
    		</td>
    	</tr>
    </table>
    </center>
   <a id="CallsLink" href="RecurringPayments.php"><b>Recurring Payments Home</b></a>
</body>




