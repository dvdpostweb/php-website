<?php 
$sql = "SELECT products_image_big FROM ". TABLE_PRODUCTS_DESCRIPTION . " WHERE products_id='".$HTTP_GET_VARS['products_id']."'";
$query_search_products = tep_db_query($sql);
$query_search_products_values = tep_db_fetch_array($query_search_products)
?>
<form name="product_reviews_write" method="post" action="<?php  echo tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'action=process&products_id=' . $HTTP_GET_VARS['products_id'], 'NONSSL'); ?>" onSubmit="return reviewcheckForm();">
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>   
	<td colspan="2"height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="2" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
  <tr>
    <td width="2" background="<?php echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
	<td width="762" class="SLOGAN_DETAIL">
			<table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td width="12%" height="130" rowspan="2" align="center" valign="middle" bgcolor="#E2E2E2" class="SLOGAN_DETAIL"><b><img src="<?php echo $constants['DIR_DVD_WS_IMAGES'].$query_search_products_values['products_image_big'];?>" width="70" height="105"><br>
                </b></td>
                <td width="88%" height="33" bgcolor="#E2E2E2" class="SLOGAN_DETAIL"><b><?php  echo '--'.SUB_TITLE_PRODUCT.'--'; ?></b> <?php  echo $product_info_values['products_name']; ?></td>
                <td width="0%" rowspan="5" align="right" valign="top"><br>
                </td>
              </tr>
              <tr>
                <td height="32" bgcolor="#E2E2E2" class="SLOGAN_DETAIL"><b><?php  echo SUB_TITLE_FROM; ?></b> <?php  echo $customer_values['customers_firstname'] . ' ' . $customer_values['customers_lastname']; ?></td>
              </tr>
              <tr>
                <td height="6" colspan="2" align="center" valign="middle" bgcolor="#E2E2E2" class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="SLOGAN_DETAIL"><br>
                <b><?php   echo SUB_TITLE_REVIEW; ?></b></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><?php  echo tep_draw_textarea_field('review', 'soft', 60, 15);?></td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="SLOGAN_DETAIL"><?php  echo TEXT_NO_HTML; ?></td>
              </tr>
        </table>
			<table border=0 align="center">
			   <tr>
			      <td align="center" class="SLOGAN_DETAIL"><br>
		         <b><?php  echo SUB_TITLE_RATING; ?></b> <?php  echo TEXT_BAD; ?> <input type="radio" name="rating" value="1"> <input type="radio" name="rating" value="2"> <input type="radio" name="rating" value="3"> <input type="radio" name="rating" value="4"> <input type="radio" name="rating" value="5"> <?php  echo TEXT_GOOD; ?></td>
			   </tr>
			   <tr>
			      <td align="center" class="SLOGAN_DETAIL">
			          <br>
			          <?php  echo TEXT_NB;?>    
		         </td>
			   </tr>
			   <tr>
			      <td class="main-removed"><br><table border="0" width="100%" cellspacing="0" cellpadding="2">
			   <tr>
			      <td align="center" class="main-removed"><?php  echo tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
			   </tr>
			</table>
        </td>    
  </tr>
</table>
</table>
<input type="hidden" name="get_params" value="<?php  echo $get_params; ?>">
</form>
