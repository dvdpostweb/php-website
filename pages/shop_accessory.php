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
		$readable_query = 'select';
		$readable_query .= ' if(to_days(products_date_added)=to_days(curdate()),1,0) added_today,p.imdb_id, p.products_type,p.products_id, p.products_media, p.products_price, p.products_tax_class_id, p.products_year, p.products_rating, p.products_next,p.rating_users, p.rating_count,p.products_model,  ';
		$readable_query .= ' p.products_title,p.imdb_id, p.products_countries_id, p.products_date_available, date_format(p.products_date_available,"%d/%m/%Y") as date_available_formated , p.products_availability, p.products_other_language, ';
		$readable_query .= ' p.products_series_id, p.products_dvdpostchoice, month(p.products_date_available) as new_dvd_datemonth, year(p.products_date_available) as new_dvd_dateyear, ';
		$readable_query .= ' month(p.products_date_added) as last_added_dvd_datemonth, year(p.products_date_added) as last_added_dvd_dateyear, ';
		$readable_query .= ' p.products_directors_id, p.products_public, p.products_studio, p.products_runtime, p.products_picture_format, ';
		$readable_query .= ' p.cinebel_trailer, p.cinebel_id, pd.products_description, pd.products_name, pd.products_image_big, pd.products_url, pd.products_awards, p.in_cinema_now   ';
		$readable_query .= ' from ' . TABLE_PRODUCTS . ' p, ' . TABLE_PRODUCTS_DESCRIPTION . ' pd ';
		$readable_query .= ' where p.products_id = ' . $HTTP_GET_VARS['products_id'];
		$readable_query .= ' and pd.products_id = p.products_id';
		$readable_query .= ' and p.products_status != -1 ';
		$readable_query .= ' and pd.language_id = ' . $languages_id;
		#echo $readable_query ;
		$product_info = tep_db_query($readable_query,'db_link',true);
		

if (!tep_db_num_rows($product_info) or $languages_id!=1) { 
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
    ?>
<table width="95%"  align="center" border="0" cellspacing="0" cellpadding="0">
	 <tr>
        <td height="15" colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="15"></td>
      </tr>
      <tr align="left">
        <td height="20" colspan="3" class="TYPO_STD2_BLACK">			  
	  	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  
			echo $product_info_values['products_name'];
		?></td>
      </tr>
  <tr>
    <td rowspan="3" width="2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
	<td rowspan="3" width="10" ></td>
    <td valign="top">
	     <table width="" border="0" align="center" cellpadding="0" cellspacing="0">
		
	  <tr>
        <td height="15" colspan="3" ><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="15"></td>
      </tr>
      <tr>
              <td height="240" colspan="2" align="center" valign="top"><img src="<?php echo DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'];?>"></td>
            </tr>
            <tr>
              <td width="200" align="center" valign="top" nowrap>
			   
			   <br>
			   <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_shop/button_buy.php'));?>
			  </td>
            </tr>
        </table></td>
        <td colspan="2" align="center" valign="top"  bgcolor="#FFFFFF" class="TYPO_STD_BLACK_bold">
        	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_shop/table_title_description_buy.php'));
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