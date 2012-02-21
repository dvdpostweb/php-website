<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="4" align="center" valign="top"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></td>
  </tr>
  <tr>
    <td colspan="4" class="SLOGAN_DETAIL">
	  <br>
      <?php  echo TEXT_INFORMATION; ?>
	  <br>
    </td>
  </tr>
  <tr>
	<td height="6" colspan="4" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
        <table border="0" width="731" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_BLACK" align="left"><?php  echo TABLE_HEADING_DELIVERY; ?></td>
            <td class="SLOGAN_BLACK" align="center"><?php  echo TABLE_HEADING_NUMBER; ?></td>
            <td class="SLOGAN_BLACK"><?php  echo TABLE_HEADING_NAME; ?></td>
            <td class="SLOGAN_BLACK" align="right"><?php  echo TABLE_HEADING_LOCATION; ?></td>
          </tr>
          <tr>
            <td colspan="4"><?php  echo tep_draw_separator(); ?></td>
          </tr>
			<?php 
			  $cust_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
			  $cust = tep_db_fetch_array($cust_query);
			  $address_book_query = tep_db_query("select * from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . $customer_id . "' order by address_book_id");
			  if (!tep_db_num_rows($address_book_query)) {
			?>
          <tr class="addressBook-odd">
            <td colspan="4" class="SLOGAN_DETAIL"><?php  echo TEXT_NO_ENTRIES_IN_ADDRESS_BOOK; ?></td>
          </tr>
			<?php 
			  } else {
			    while ($address_book = tep_db_fetch_array($address_book_query)) {
				 ?>
				 <tr class="addressBook-odd">
			     <td class="SLOGAN_DETAIL" align="left">
			     <a  class="red_slogan" href="changedefaultaddr.php?customers_id=<?php  echo $customer_id; ?>&customers_default_address_id=<?php  echo $address_book['address_book_id']; ?>"><img onmouseover="document.all(1).style.cursor='hand';" onmouseout="document.all(1).style.cursor='default';" src="<?php  echo DIR_WS_IMAGES ; ?>dvd2.gif" border=0 align="absmiddle"></a>
				 <?php 
				 if ($cust['customers_default_address_id'] == $address_book['address_book_id']){
				  echo '<img src="' . DIR_WS_IMAGES . 'arrowanimated2.gif" align="absmiddle">';	   
			     } else{ echo '<a class="red_slogan" href="changedefaultaddr.php?customers_id='.$customer_id.'&customers_default_address_id='.$address_book['address_book_id'].'">( '.TEXT_ACTIVATE.' )</a>';}
				  echo '  </td>' . "\n" .
				       '  <td class="SLOGAN_DETAIL" align="center">' . $address_book['address_book_id'] . '.</td>' . "\n" .
			           '  <td class="SLOGAN_DETAIL">' . $address_book['entry_firstname'] . ' ' . $address_book['entry_lastname'] . '</td>' . "\n" .
			           '  <td class="SLOGAN_DETAIL" align="right">' . $address_book['entry_street_address'] . ' ' . $address_book['entry_postcode'] . ' ' . $address_book['entry_city'] .' <a class="red_slogan" href="' . tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'action=modify&entry_id=' . $address_book['address_book_id'], 'SSL') . '">( '. TEXT_CHANGE .' )</a></td>' . "\n" .
			           '</tr>' . "\n";
				$last_id=$address_book['address_book_id'];
			    }
			  }
			?>
          <tr>
            <td colspan="4"><?php  echo tep_draw_separator(); ?></td>
          </tr>
		  <tr>
			<td height="6" colspan="4" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></div></td>
		  </tr>
			<?php 
			  if ($row < MAX_ADDRESS_BOOK_ENTRIES) {
			?>
          <tr>
            <td colspan="4"><table border="0" width="731" cellspacing="0" cellpadding="2">
              <tr>
                <td class="SLOGAN_DETAIL" valign="top">
                <?php  //echo sprintf(TEXT_MAXIMUM_ENTRIES, MAX_ADDRESS_BOOK_ENTRIES); ?></td>
                <td class="SLOGAN_DETAIL" align="right" valign="top"><?php  echo '<a href="' . tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS,  'entry_id=' . ($last_id ), 'SSL') . '">' . tep_image_button('button_add_address.gif', IMAGE_BUTTON_ADD_ADDRESS) . '</a>'; ?></td>
              </tr>
            </table></td>
          </tr>
			<?php 
			  } else {
			?>
          <tr>
            <td colspan="4"><table border="0" width="731" cellspacing="0" cellpadding="2">
              <tr>
                <td class="SLOGAN_DETAIL"><?php  //echo sprintf(TEXT_MAXIMUM_ENTRIES_REACHED, MAX_ADDRESS_BOOK_ENTRIES); ?></td>
                <td class="SLOGAN_DETAIL" align="right"><?php  echo '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
              </tr>
            </table></td>
          </tr>
			<?php 
			  }
			?>
		</table>
    </td>
  </tr>
</table>
<br>