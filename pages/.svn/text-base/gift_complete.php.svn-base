<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
            <?php  
			$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
			$customers = tep_db_fetch_array($customers_query);

			$gift_query = tep_db_query("select * from activation_gift  where activation_gift_id= '" . $HTTP_GET_VARS['gift_order_id'] . "' ");
			$gift = tep_db_fetch_array($gift_query);
            
            echo TEXT_INFORMATION; 
            echo '<br><br><a href="gift_popup.php?gift_order_id=' . $HTTP_GET_VARS['gift_order_id'] . '" target=new><u>' . TEXT_POPUP_PRINT . '</u></a>';
            echo '<br><br>';
            echo '<img style="position:relative" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/' . 'KDODVDPOSTbig.gif' . '">';
            switch ($languages_id){
	            case 1:
		            echo '<div style="position:relative;top:-145;left:200;color:black;font-size:15" ><b>' . $gift_firstname . ' ' . $gift_lastname .'</b></div>';
		            echo '<div style="position:relative;top:-133;left:240;color:black;font-size:15" ><b>' . $customers['customers_firstname'] . ' ' .  $customers['customers_lastname'] .'</b></div>';
		            echo '<div style="position:relative;top:-109;left:393;color:red;font-size:15" ><b>' . $gift_duration .'</b></div>';
		            echo '<div style="position:relative;top:-80;left:360;color:red;font-size:15" ><b>' . $gift['activation_code'] .'</b></div>';
	            break;
	            case 2:
		            echo '<div style="position:relative;top:-160;left:200;color:black;font-size:15" ><b>' . $gift_firstname . ' ' . $gift_lastname .'</b></div>';
		            echo '<div style="position:relative;top:-149;left:200;color:black;font-size:15" ><b>' . $customers['customers_firstname'] . ' ' .  $customers['customers_lastname'] .'</b></div>';
		            echo '<div style="position:relative;top:-125;left:399;color:red;font-size:15" ><b>' . $gift_duration .'</b></div>';
		            echo '<div style="position:relative;top:-81 ;left:320;color:red;font-size:15" ><b>' . $gift['activation_code'] .'</b></div>';
	            break;
	            case 3:
		            echo '<div style="position:relative;top:-161;left:185;color:black;font-size:15" ><b>' . $gift_firstname . ' ' . $gift_lastname .'</b></div>';
		            echo '<div style="position:relative;top:-150;left:200;color:black;font-size:15" ><b>' . $customers['customers_firstname'] . ' ' .  $customers['customers_lastname'] .'</b></div>';
		            echo '<div style="position:relative;top:-127;left:440;color:red;font-size:15" ><b>' . $gift_duration .'</b></div>';
		            echo '<div style="position:relative;top:-80;left:350;color:red;font-size:15" ><b>' . $gift['activation_code'] .'</b></div>';
	            break;
	        }
            ?>    </td>    
  </tr>
</table>