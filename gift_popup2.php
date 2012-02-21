<?php

require('configure/application_top.php');
  
$current_page_name = 'gift_popup2.php';

include(DIR_WS_INCLUDES . 'translation.php');

?>

<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
</head>

<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<style type="text/css">
<!--
.Style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Style2 {
	font-family: Arial, Helvetica, sans-serif;
	color: #CC0000;
	font-size: 36px;
}
.Style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #CC0000;
}
-->
</style>
<?php 
$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
$customers = tep_db_fetch_array($customers_query);

//$gift_query = tep_db_query("select * from activation_gift  where activation_gift_id= '" . $HTTP_GET_VARS['gift_order_id'] . "' ");
$gift_query = tep_db_query("select * from activation_gift  where customers_id = '" . $customer_id . "' order by activation_gift_id desc limit 1");
$gift = tep_db_fetch_array($gift_query);
?>
 <table width="744" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="89" background="<? echo DIR_WS_IMAGES;?>user_layout/header_gift.jpg" colspan="3" align="center" class="Style2"><? echo TEXT_MERRY_XMAS_DVD; ?></td>
              </tr>
              <tr>
                <td height="83" colspan="2" valign="bottom" background="<? echo DIR_WS_IMAGES;?>user_layout/header2b_gift.gif" class="Style3"><img src="<? echo DIR_WS_IMAGES;?>blank.gif" width="25" height="30" align="texttop" ><? echo TEXT_HOW_TO_USE_GIFT ;?></td>
                <td width="244" valign="top" bgcolor="#DCDEDD">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" bgcolor="#D9B8B3">&nbsp;</td>
                <td width="244" rowspan="9" valign="top" bgcolor="#DCDEDD"><table width="90%" height="180"  border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center" bgcolor="#FFFFFF"><? echo TEXT_GIFT_FOR;?></td>
                  </tr>
                  <tr>
                    <td align="center" bgcolor="#FFFFFF" class="Style1"><b>
                      <?
					  echo TEXT_ABO ; 
                    		switch($gift['products_id']){
	                    		case 2:
	                    		break;
								
	                    		case 5:
	                    			echo TEXT_ABO_REGULAR . '<br>';
									//echo '<img src="' . DIR_WS_IMAGES . 'dvd_one.jpg" width="21" height="22" align="top"><br>';                      <?php
	                    			echo TEXT_ABO_REGULAR_EXPLANATION;	                    			
	                    		break;
	                    		case 6:
	                    			echo TEXT_ABO_CLASSIC . '<br>';
	                    			//echo '<img src="' .DIR_WS_IMAGES . 'dvd_two.jpg" width="21" height="22" align="top"><br>';                      <?php
	                    			echo TEXT_ABO_CLASSIC_EXPLANATION;	                    			
	                    		break;
	                    		case 7:
	                    			echo TEXT_ABO_DISCOVERY .'<br>';
	                    			//echo '<img src="'. DIR_WS_IMAGES .'dvd_three.jpg" width="21" height="22" align="top"><br>';                      <?php
	                    			echo TEXT_ABO_DISCOVERY_EXPLANATION;	   	                    		
	                    		break;
	                    		case 8:
	                    			echo TEXT_ABO_ADVENTURE .'<br>';
	                    			//echo '<img src="' . DIR_WS_IMAGES . 'dvd_four.jpg" width="21" height="22" align="top"><br>';                      <?php
	                    			echo TEXT_ABO_ADVENTURE_EXPLANATION;		                    		
	                    		break;
	                    		case 9:
	                    			echo TEXT_ABO_PASSION . '<br>';
	                    			//echo '<img src="' .DIR_WS_IMAGES . 'dvd_five.jpg" width="21" height="22" align="top"><br>';                      <?php
	                    			echo TEXT_ABO_PASSION_EXPLANATION;		                    		
	                    		break;
	                    	}
                    		?>
                    </b> </td>
                  </tr>
                  <tr>
                    <td align="center" bgcolor="#FFFFFF" class="Style1"><b><? echo TEXT_FOR . ' ' . $gift['duration'] . ' ' . TEXT_MONTH;?></b></td>
                  </tr>
                  <tr>
                    <td align="center" bgcolor="#FFFFFF" class="Style1">CODE : <b><? echo $gift['activation_code'] ;?></b></td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td width="22" rowspan="2" bgcolor="#D9B8B3" class="Style1">&nbsp;</td>
                <td width="478" bgcolor="#D9B8B3" class="Style1"><? echo TEXT_G_STEP1 ;?></td>
              </tr>
              <tr>
                <td bgcolor="#D9B8B3" class="Style1"><img src="<? echo DIR_WS_IMAGES;?>blank.gif" width="25" height="10" ></td>
              </tr>
              <tr>
                <td rowspan="2" bgcolor="#D9B8B3" class="Style1">&nbsp;</td>
                <td bgcolor="#D9B8B3" class="Style1"><? echo TEXT_G_STEP2 ;?></td>
              </tr>
              <tr>
                <td bgcolor="#D9B8B3" class="Style1"><img src="<? echo DIR_WS_IMAGES;?>blank.gif" width="25" height="10" ></td>
              </tr>
              <tr>
                <td rowspan="2" bgcolor="#D9B8B3" class="Style1">&nbsp;</td>
                <td bgcolor="#D9B8B3" class="Style1"><? echo TEXT_G_STEP3 ;?></td>
              </tr>
              <tr>
                <td bgcolor="#D9B8B3" class="Style1"><img src="<? echo DIR_WS_IMAGES;?>blank.gif" width="25" height="10" ></td>
              </tr>
              <tr>
                <td bgcolor="#D9B8B3" class="Style1">&nbsp;</td>
                <td bgcolor="#D9B8B3" class="Style1"><? echo TEXT_G_STEP4 ;?></td>
              </tr>
              <tr>
                <td colspan="2" bgcolor="#D9B8B3"><img src="<? echo DIR_WS_IMAGES;?>blank.gif" width="25" height="8" >&nbsp;</td>
              </tr>
              <tr bgcolor="#DCDEDD">
                <td colspan="3"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" align="center" class="Style1"><? echo TEXT_EXPL_GIFT ?></td>
                  </tr>
                </table></td>
              </tr>
            </table>	
</body>
</html>