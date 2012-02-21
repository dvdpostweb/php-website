<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan=2 height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td  colspan=2 height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></div></td>
  </tr>
  <tr>
   <td colspan=2>
    <br>
	<?php 
	  $is_read_only = true;
	
	  $account_query = tep_db_query("select c.customers_gender, c.customers_firstname, c.customers_lastname, c.customers_dob, c.customers_email_address, a.entry_company, a.entry_street_address, a.entry_suburb, a.entry_postcode, a.entry_city, a.entry_zone_id, a.entry_state, a.entry_country_id, c.customers_telephone, c.customers_telephone_evening, c.customers_fax, c.customers_newsletter, c.customers_newsletterpartner, c.adult_pwd from " . TABLE_CUSTOMERS . " c, " . TABLE_ADDRESS_BOOK . " a where c.customers_id = '" . $customer_id . "' and a.customers_id = c.customers_id and a.address_book_id = '" . $customer_default_address_id . "'");
	  $account = tep_db_fetch_array($account_query);
	  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/account/account_details.php'));
	?>
	<br>
    </td>
  </tr>
  <tr>
    <td align="center" class="SLOGAN_DETAIL"><?php  echo '<a href="' . tep_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL') . '">' . tep_image_button('button_edit_account.gif', IMAGE_BUTTON_EDIT_ACCOUNT) . '</a>'; ?></td>
	<td align="center" class="SLOGAN_DETAIL"><?php  echo '<a href="' . tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . tep_image_button('button_address_book.gif', IMAGE_BUTTON_ADDRESS_BOOK) . '</a>'; ?></td>
  </tr>
</table>
<br>