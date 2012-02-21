<?php 
function listrecommand($categories_id,$languages_id, $customer_id) {
	//BEN001 $listing_sql = 'select p.products_id, pd.products_name  from products_adult p ';
	$listing_sql = 'select p.products_id, pd.products_name  from products p '; //BEN001
//BEN001	$listing_sql .= ' left join products_description_adult pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
	$listing_sql .= ' left join products_description pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ; //BEN001
	//BEN001 $listing_sql .= ' left join wishlist_adult w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
	$listing_sql .= ' left join wishlist w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ; //BEN001
	//BEN001 $listing_sql .= ' left join wishlist_assigned_adult wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
	$listing_sql .= ' left join wishlist_assigned wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' '; //BEN001
	//RALPH-005 $listing_sql .= ' left join products_to_categories_adult pc on pc.products_id=p.products_id  ';
	$listing_sql .= ' left join products_to_categories pc on pc.products_id=p.products_id  '; //RALPH-005
	//BEN001 $listing_sql .= ' where p.products_id > 49 ';
	$listing_sql .= 'and w.product_id is null and wa.products_id is null ';
	$listing_sql.= ' and p.products_availability>1 ';
	$listing_sql.= ' and pc.categories_id= \'' . $categories_id . '\' ';
	$listing_sql.=' and products_type = "DVD_ADULT" '; //BEN001
	$listing_top_sql = $listing_sql;
	$top_query = tep_db_query($listing_top_sql . ' order by rand() limit 5');
	while ($top = tep_db_fetch_array($top_query)) {
		$stroutput= $stroutput . '<a href="product_info_adult.php?products_id=' . $top['products_id'] . '" class="typo_menu2">';
		$stroutput= $stroutput .  $top['products_name'];
		$stroutput= $stroutput .  '</a><br>';        
	}
	return $stroutput;
}
?>
<table width="269" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>bckgd_soft.gif">
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="14"></td>
  </tr>
  <tr>
    <td width="15" rowspan="7" align="center" valign="top" class="TYPO_STD_BLACK_bold"><div align="justify"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="13"></div></td>
    <td height="40" align="center" valign="top" class="TYPO_STD_BLACK_bold"><span class="SLOGAN_BLACK"><?php  echo TEXT_RECOM2; ?> </span></td>
    <td width="14" rowspan="7" align="center" valign="top" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="13"></td>
  </tr>
  <tr>
    <td height="20" valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td width="240" height="15" align="center"><div align="left">
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
    <td height="30" valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td width="240" align="center"><div align="left">
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
    <td height="30" valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td width="240" align="center"><div align="left">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="SLOGAN_MENU">&nbsp;
            </td>
          </tr>
        </table>
    </div></td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="14"></td>
  </tr>
</table>
