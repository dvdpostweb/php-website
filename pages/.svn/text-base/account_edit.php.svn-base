<?php    	  
	echo tep_draw_form('account_edit', tep_href_link(FILENAME_ACCOUNT_EDIT_PROCESS, '', 'SSL'), 'post', 'onSubmit="return check_form();"') . tep_draw_hidden_field('action', 'process'); 
?>
<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php    echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td  colspan="2" height="6" colspan="3" valign="top"><div align="center"><img src="<?php    echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></div></td>
  </tr>
  <tr>
   <td colspan="2">
	<?php    
	$count_address = tep_db_query("select * from address_book where customers_id = '" . $customer_id . "' and address_book_id = '" . $customer_default_address_id . "'");
	if ($count = tep_db_fetch_array($count_address)){
		 	$account_query = tep_db_query("select c.customers_gender, c.customers_firstname, c.customers_lastname, c.customers_dob, c.customers_email_address, a.entry_company, a.entry_street_address, a.entry_suburb, a.entry_postcode, a.entry_city, a.entry_zone_id, a.entry_state, a.entry_country_id, c.customers_telephone,c.customers_telephone_evening, c.customers_fax, c.customers_newsletter, c.adult_pwd from " . TABLE_CUSTOMERS . " c, " . TABLE_ADDRESS_BOOK . " a where c.customers_id = '" . $customer_id . "' and a.customers_id = c.customers_id and a.address_book_id = '" . $customer_default_address_id . "'");
	}else{
		$account_query = tep_db_query("select customers_id, customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_telephone, customers_telephone_evening, customers_fax, customers_newsletter, adult_pwd from customers where customers_id = " . $customer_id  );
		$customer_default_address_id=1;
	}  	  
	  $account = tep_db_fetch_array($account_query);
	  $email_address = $account['customers_email_address'];
	  
	  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/account/account_details.php'));
	?>
	<br>
    </td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL"><?php    echo '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
    <td class="SLOGAN_DETAIL" align="right"><?php    echo tep_image_submit('button_confirm_update.gif', IMAGE_BUTTON_CONTINUE); ?></td>
  </tr>	
</table>
</form>
<br>