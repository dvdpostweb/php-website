<?php  
function listrecommand($categories_id,$languages_id, $customer_id) {
	$listing_sql = 'select p.products_id, pd.products_name  from ' . TABLE_PRODUCTS . ' p ';
	$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
	$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
	$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
	$listing_sql .= ' left join ' . TABLE_PRODUCTS_TO_CATEGORIES . ' pc on pc.products_id=p.products_id  ';
	//BEN001 $listing_sql .= ' where p.products_id > 49 ';
	$listing_sql .= ' where p.products_type = "DVD_NORM" '; //BEN001
	$listing_sql .= 'and w.product_id is null and wa.products_id is null ';
	$listing_sql.= ' and p.products_availability>1 ';
	$listing_sql.= ' and pc.categories_id= \'' . $categories_id . '\' ';
	$listing_top_sql = $listing_sql;
	$top_query = tep_db_query($listing_top_sql . ' order by rand() limit 5');
	while ($top = tep_db_fetch_array($top_query)) {
		$stroutput= $stroutput . '<a href="product_info.php?products_id=' . $top['products_id'] . '" class="SLOGAN_MENU">';
		$stroutput= $stroutput .  $top['products_name'];
		$stroutput= $stroutput .  '</a><br>';        
	}
	return $stroutput;
}
?>
<table width="269" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" background="<?php   echo DIR_WS_IMAGES;?>txt_recom/txt_recom_top.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="15" height="14"></td>
  </tr>
  <tr>
    <td width="15" rowspan="7" align="center" valign="top" background="<?php   echo DIR_WS_IMAGES;?>txt_recom/txt_recom_left.gif" class="TYPO_STD_BLACK_bold"><div align="justify"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="13"></div></td>
    <td height="40" align="center" valign="top" bgcolor="#EAEAEA" class="TYPO_STD_BLACK_bold"><span class="SLOGAN_BLACK"><?php   echo TEXT_RECOM2; ?> </span><span class="SLOGAN_MENU"><?php  // echo TEXT_WAITING_YOU ?></span></td>
    <td width="14" rowspan="7" align="center" valign="top" background="<?php   echo DIR_WS_IMAGES;?>txt_recom/txt_recom_right.gif" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="13"></td>
  </tr>
  <tr>
    <td height="20" valign="bottom" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"><?php   echo TEXT_ACTION;?></span></td>
  </tr>
  <tr>
    <td width="240" height="15" align="center" bgcolor="#EAEAEA"><div align="left">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="SLOGAN_MENU">
			<?php  
			echo listrecommand(1, $languages_id, $customer_id);
			?>          
          </td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="30" valign="bottom" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"><?php   echo TEXT_COMEDY;?></span></td>
  </tr>
  <tr>
    <td width="240" align="center" bgcolor="#EAEAEA"><div align="left">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="SLOGAN_MENU">
			<?php  
			echo listrecommand(8, $languages_id, $customer_id);
			?>          
            </td>
          </tr>
        </table>
    </div></td>
  </tr>
  <tr>
    <td height="30" valign="bottom" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"><?php   echo TEXT_FANTASY;?></span></td>
  </tr>
  <tr>
    <td width="240" align="center" bgcolor="#EAEAEA"><div align="left">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="SLOGAN_MENU">
			<?php  
			echo listrecommand(27, $languages_id, $customer_id);
			?>          
            </td>
          </tr>
        </table>
    </div></td>
  </tr>
  <tr>
    <td colspan="3" background="<?php   echo DIR_WS_IMAGES;?>txt_recom/txt_recom_back.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="15" height="14"></td>
  </tr>
</table>
