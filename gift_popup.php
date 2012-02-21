<?php

require('configure/application_top.php');
  
$current_page_name = FILENAME_GIFT_POPUP;

include(DIR_WS_INCLUDES . 'translation.php');

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<table width= 539>
	<tr>
		<td>
		<?php
			$customers_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
			$customers = tep_db_fetch_array($customers_query);

			$gift_query = tep_db_query("select * from activation_gift  where activation_gift_id= '" . $HTTP_GET_VARS['gift_order_id'] . "' ");
			$gift = tep_db_fetch_array($gift_query);
		
            echo '<img style="position:absolute" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/' . 'KDODVDPOSTbig.gif' . '">';
            switch ($languages_id){
	            case 1:
		            echo '<div style="position:absolute;top:103;left:200;color:black;font-size:15" ><b>- ' . $gift_firstname . ' ' . $gift_lastname .'</b></div>';
		            echo '<div style="position:absolute;top:133;left:250;color:black;font-size:15" ><b>' . $customers['customers_firstname'] . ' ' .  $customers['customers_lastname'] .'</b></div>';
		            echo '<div style="position:absolute;top:175;left:395;color:red;font-size:15" ><b>' . $gift_duration .'</b></div>';
		            echo '<div style="position:absolute;top:210;left:360;color:red;font-size:15" ><b>' . $gift['activation_code'] .'</b></div>';
	            break;
	            case 2:
		            echo '<div style="position:absolute;top:85;left:200;color:black;font-size:15" ><b>- ' . $gift_firstname . ' ' . $gift_lastname .'</b></div>';
		            echo '<div style="position:absolute;top:115;left:210;color:black;font-size:15" ><b>' . $customers['customers_firstname'] . ' ' .  $customers['customers_lastname'] .'</b></div>';
		            echo '<div style="position:absolute;top:159;left:400;color:red;font-size:15" ><b>' . $gift_duration .'</b></div>';
		            echo '<div style="position:absolute;top:223;left:340;color:red;font-size:15" ><b>' . $gift['activation_code'] .'</b></div>';
	            break;
	            case 3:
		            echo '<div style="position:absolute;top:85;left:200;color:black;font-size:15" ><b>- ' . $gift_firstname . ' ' . $gift_lastname .'</b></div>';
		            echo '<div style="position:absolute;top:115;left:210;color:black;font-size:15" ><b>' . $customers['customers_firstname'] . ' ' .  $customers['customers_lastname'] .'</b></div>';
		            echo '<div style="position:absolute;top:159;left:440;color:red;font-size:15" ><b>' . $gift_duration .'</b></div>';
		            echo '<div style="position:absolute;top:222;left:350;color:red;font-size:15" ><b>' . $gift['activation_code'] .'</b></div>';
	            break;
	        }
        ?>
		</td>
	</tr>
</table>		
</body>
</html>