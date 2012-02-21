<table width="731" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" height="40" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></div></td>
  </tr>
  <tr>
    <td align="center" class="SLOGAN_DETAIL">
      <br>
	  <?php  
		$subscription = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
		$subscription_values = tep_db_fetch_array($subscription);
		if ($subscription_values['customers_abo'] > 0) {
			$customers_query = tep_db_query("select customers_firstname,customers_lastname from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
			$customers = tep_db_fetch_array($customers_query);  
			$cust_name= $customers['customers_firstname'].' '.$customers['customers_lastname'] ;
			$info_text = TEXT_ALREADY_SUBSCRIBED;
			$info_text = str_replace('µµµnameµµµ',  $cust_name , $info_text);
			echo $info_text; 
			echo'<br>';					
		}else{			
            echo TEXT_INFORMATION; 
	        ?>
    	    <br><br>
				<form name='abo_activation' action='activation_code_confirm.php' method='post'>
					<input type='text' name='code' id='code'>
					<br><br>
					<?php  echo tep_image_submit('button_confirm_limited.gif', 'activate'); ?>
				</form>					
			<?php  
		}	      
      ?>
    </td>
  </tr>
</table>