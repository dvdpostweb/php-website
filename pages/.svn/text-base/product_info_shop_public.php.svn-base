<style type="text/css">
<!--
.ORIG_title {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	color: #999999;
	font-weight: bold;
}
-->
</style>
<table width="100%"  align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"><tr><td>
<?php  
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/query_productsid_info.php')); 

if (!tep_db_num_rows($product_info)) { 
  // product not found in database
  ?>
<table width="95%"  align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="3" width="2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
	<td rowspan="3" width="10" ></td>
    <td>
      	<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
	  		<tr>
        		<td  colspan="3" class="TYPO_STD2_BLACK" align="center"><br>  <?php  echo TEXT_PRODUCT_NOT_FOUND; ?></td>
      		</tr>
      		<tr align="center" valign="middle">
        		<td  colspan="3"><br>   
          			<a href="<?php  echo tep_href_link(FILENAME_DEFAULT, '', 'NONSSL'); ?>"><?php  echo tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></a></td>
      		</tr>
		</table>
	</td>
  </tr>
</table>
      <?php 
} else {
    //there is a product
    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and language_id = '" . $languages_id . "'");
    $product_info_values = tep_db_fetch_array($product_info);
    $undertitles_query = tep_db_query("select ut.products_undertitles_id from " . TABLE_PRODUCTS_TO_UNDERTITLES. " ut where ut.products_id = '" . $product_info_values['products_id'] . "'");
    $soundtracks_query = tep_db_query("select st.products_soundtracks_id from " . TABLE_PRODUCTS_TO_SOUNDTRACKS. " st where st.products_id = '" . $product_info_values['products_id'] . "'");
    ?>
<table width="95%"  align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="3" width="2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
	<td rowspan="3" width="10" ></td>
    <td>
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
        <td height="15" colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="15"></td>
      </tr>
      <tr align="left">
        <td height="20" colspan="3" class="TYPO_STD2_BLACK">			  
	  	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  
			echo $product_info_values['products_name'].' ( '.$product_info_values['products_year'].' )';
		?></td>
      </tr>
      <tr align="right" valign="top">
        <td height="20" colspan="3" class="TYPO_STD2_BLACK"><font class="dvdpost_brown">
          <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/categories_themes.php')); ?>
        </font></td>
      </tr>
      <tr>
        <td width="199" align="center" valign="top"><table width="200"  border="0" cellspacing="0" cellpadding="0">
            <?php 
        if  ($product_info_values['products_dvdpostchoice'] > 0)  {
        	echo '<tr><td height="25" colspan="2" align="center"class="SLOGAN_DETAIL_ROUGE">'.TEXT_HEART .'</td></tr>';
        }
        ?>	
            <tr>
              <td height="240" colspan="2" align="center" valign="top"><img src="<?php echo DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'];?>" width="160" height="240"></td>
            </tr>
            <tr>
              <td width="200" align="center" valign="top" nowrap>
			   <?php 
			    $alreadyordered_query = tep_db_query("select orders_products_id from orders o left join orders_products op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $product_info_values['products_id'] . "' ");
                $alreadyordered = tep_db_fetch_array($alreadyordered_query);
                if ($alreadyordered['orders_products_id']>0){
                  echo '<br><img src="' . DIR_WS_IMAGES . 'eye.gif"><br>';
                }
			   ?>
			   <br>
			   <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_shop_public/button_buy.php'));?>
			  </td>
            </tr>
        </table></td>
        <td colspan="2" align="center" valign="top"  bgcolor="#FFFFFF" class="TYPO_STD_BLACK_bold">
        	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_shop/table_title_description.php'));
        	?>
        </td>
      </tr>
    </table></td>
  </tr>  
</table>
<?php  }?>
</td></tr></table>
<?php
	 switch($languages_id){
		case 1:
			$lang='fr';
		break;
		case 2:
			$lang='nl';
		break;
		case 3:
			$lang='en';
		break;
		
	}
?>
<div id='filter' language='<?= $lang ?>'>