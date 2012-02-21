<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan=2 height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
    <td  colspan=2 height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
      <?php  
		$custsuspended_query = tep_db_query("select * from customers  where customers_id = '" . $customer_id . "'  ");
		$custsuspended = tep_db_fetch_array($custsuspended_query);
		if ($custsuspended['customers_abo_suspended'] > 0 ){
			echo '<font color=red><b>' . TEXT_ABO_ALREADY_SUSPENDED . '</b></font>';
		}else{
			tep_db_query("INSERT INTO abo_suspended_holiday (customers_id , date_asked , weeks , date_end) VALUES ('" . $customer_id . "', now(), '" . $HTTP_POST_VARS['weeks'] . "', DATE_ADD(now(), INTERVAL " . $HTTP_POST_VARS['weeks'] * 7 . " DAY) ) ");
			tep_db_query("INSERT INTO abo_suspended_history (customers_id , date , action , reason, comment) VALUES ('" . $customer_id . "', now(), '1', '1', 'holiday on website' ) ");
			tep_db_query("UPDATE customers SET customers_abo_suspended = 1 WHERE customers_id = '" . $customer_id . "' "); 				
			tep_db_query("UPDATE customers SET customers_abo_validityto = DATE_ADD(customers_abo_validityto, INTERVAL " . $HTTP_POST_VARS['weeks'] *7 . " DAY) WHERE customers_id = '" . $customer_id . "' "); 				
		}							
		echo TEXT_HOLIDAY_DONE;
		echo '<br><br>';
		echo '<a class="red_slogan" href="default.php">' . TEXT_BACK . '</a>';
	?>
    </td>
  </tr>
</table>