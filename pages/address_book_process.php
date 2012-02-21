<script language="javascript"><!--
function check_form() {
  var error = 0;
  var error_message = "<?php  echo JS_ERROR; ?>";

  var firstname = document.add_entry.firstname.value;
  var lastname = document.add_entry.lastname.value;
  var street_address = document.add_entry.street_address.value;
  var postcode = document.add_entry.postcode.value;
  var city = document.add_entry.city.value;

<?php 
 if (ACCOUNT_GENDER == 'true') {
?>
  if (document.add_entry.elements['gender'].type != "hidden") {
    if (document.add_entry.gender[0].checked || document.add_entry.gender[1].checked) {
    } else {
      error_message = error_message + "<?php  echo JS_GENDER; ?>";
      error = 1;
    }
  }
<?php 
 }
?>
  if (firstname == "" || firstname.length < <?php  echo ENTRY_FIRST_NAME_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php  echo JS_FIRST_NAME; ?>";
    error = 1;
  }

  if (lastname == "" || lastname.length < <?php  echo ENTRY_LAST_NAME_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php  echo JS_LAST_NAME; ?>";
    error = 1;
  }

  if (street_address == "" || street_address.length < <?php  echo ENTRY_STREET_ADDRESS_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php  echo JS_ADDRESS; ?>";
    error = 1;
  }

  if (postcode == "" || postcode.length < <?php  echo ENTRY_POSTCODE_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php  echo JS_POST_CODE; ?>";
    error = 1;
  }

  if (city == "" || city.length < <?php  echo ENTRY_CITY_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php  echo JS_CITY; ?>";
    error = 1;
  }
<?php 
  if (ACCOUNT_STATE == 'true') {
?>
  if (document.add_entry.state.value == "" || document.add_entry.state.length < <?php  echo ENTRY_STATE_MIN_LENGTH; ?> ) {
     error_message = error_message + "<?php  echo JS_STATE; ?>";
     error = 1;
  }
<?php 
  }
?>

  if (document.add_entry.country.value == 0) {
    error_message = error_message + "<?php  echo JS_COUNTRY; ?>";
    error = 1;
  }

  if (error == 1) {
    alert(error_message);
    return false;
  } else {
    return true;
  }
}
//--></script>

<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center">
<form name="add_entry" method="post" action="<?php  echo tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, '', 'SSL'); ?>" onSubmit="return check_form();">
	<table border="0" width="731" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40" align="center" class="TYPO_ROUGE_ITALIQUE"><?php  echo ($HTTP_GET_VARS['action'] == 'modify') ? HEADING_TITLE_MODIFY_ENTRY : HEADING_TITLE_ADD_ENTRY; ?></td>
          </tr>
        </table></td>
      </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></div></td>
  </tr>
      <tr>
        <td>
        	<br>
		<?php  
			include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/address_book_process/address_book_details.php'));
			?>
        </td>
      </tr>
<?php 
    if (($HTTP_GET_VARS['action'] == 'modify') && ($HTTP_GET_VARS['entry_id'])) {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="2" cellpadding="0">
          <tr>
            <td class="SLOGAN_DETAIL"><input type="hidden" name="action" value="update"><input type="hidden" name="entry_id" value="<?php  echo $HTTP_GET_VARS['entry_id']; ?>"><a href="<?php  echo tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'); ?>"><?php  echo tep_image_button('button_back.gif', IMAGE_BUTTON_BACK); ?></a></td>
            <td class="SLOGAN_DETAIL" align="right"><?php  echo tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
          </tr>
        </table></td>
      </tr>
<?php 
    } elseif (($HTTP_POST_VARS['action'] == 'update') && ($HTTP_POST_VARS['entry_id'])) {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="2" cellpadding="0">
          <tr>
            <td class="SLOGAN_DETAIL"><input type="hidden" name="action" value="update"><input type="hidden" name="entry_id" value="<?php  echo $entry_id; ?>"><a href="<?php  echo tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'); ?>"><?php  echo tep_image_button('button_back.gif', IMAGE_BUTTON_BACK); ?></a></td>
            <td class="SLOGAN_DETAIL" align="right"><?php  echo tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
          </tr>
        </table></td>
      </tr>
<?php 
    } else {
      if (sizeof($navigation->snapshot) > 0) {
        $back_link = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
      } else {
        $back_link = tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL');
      }
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo '<a href="' . $back_link . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
            <td align="right" class="SLOGAN_DETAIL"><input type="hidden" name="entry_id" value="<?php  echo ($HTTP_GET_VARS['entry_id'] ? $HTTP_GET_VARS['entry_id'] : $entry_id); ?>"><input type="hidden" name="action" value="process"><?php  echo tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
          </tr>
        </table></td>
      </tr>
<?php 
    }
?>
    </table>
</form>

    
    </td>
  </tr>
</table>   