<?php
  if (count($list_tab) > 0) {
    $number_of_products = '0';
    //$listing = tep_db_query($listing_sql);
    $select_str_products = "select if(to_days(p.products_date_added)=to_days(curdate()),1,0) added_today, p.products_id,  pd.products_name, p.products_availability, p.products_language_fr, p.products_undertitle_nl, p.products_next, p.products_date_available,p.products_rating ,p.products_directors_id,pd.products_description,pd.products_image_big from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id where p.products_id > 9 and pd.products_name like '%" . $HTTP_GET_VARS['keywords'] . "%' group by p.products_id, pd.products_name order by pd.products_name";
	$select_str_directors = "select directors_id, directors_name from " . TABLE_DIRECTORS . " where  directors_name like '%" . $HTTP_GET_VARS['keywords'] . "%' order by directors_name";
	$cpt=1;
	?>
	<table border="0" align="center" cellpadding="0" cellspacing="0" width="560">
  		<tr>
			<td  colspan="9" width="100" height="30" valign="middle" align="left" ><?php echo $category_name_values['categories_name'];?></td>
  		</tr>
        
  		<tr>
  	<?php
   // while ($product_info_values = tep_db_fetch_array($listing)) {
	if($type=='DVD_NORM')
		$path=$constants['DIR_DVD_WS_IMAGES'];
	else
		$path=$constants['DIR_WS_IMAGESX'];
	foreach ($list_tab as $product_info_values) {
		
	   		echo '
					<td align="center">
						<table>';
					switch ($product_info_values['products_media']){
						
						case 'BlueRay' :
						echo '<tr><td height="118"><table cellspacing="0" cellpadding="0"><tr><td><br /><img src="'.$path.'www3/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
							echo '<a  href="'. products_link($lang_short,$product_info_values['products_name'],$product_info_values['products_id']).'">';
						echo '<img class="bluborder" src="'.$path.$product_info_values['products_image_big'].'" border="0" width="88" height="118" alt="'.$tag_dvd.'" title="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
						echo '</td></tr>';
						break;
					
					
					default :
					
						echo '<tr><td><a href="'. products_link($lang_short,$product_info_values['products_name'],$product_info_values['products_id']).'"><img class="border_dvd" src="'.$path.$product_info_values['products_image_big'].'" border="0" width="90" height="135" alt="'.$product_info_values['products_name'].'" title="'.$product_info_values['products_name'].'"></a></td></tr>';
						break;
					}					
					echo '<tr>
						<td width="98" height="47" align="center" valign="top"><a  href="'. products_link($lang_short,$product_info_values['products_name'],$product_info_values['products_id']).'" class="dvdtitle_link">'. substr($product_info_values['products_name'], 0, 30).'</a>
						<td>						
						</tr></table></td>';
					if ($cpt % 5 ==0 ){echo '</tr><tr><td colspan="9" height="15" valign="middle" align="left" >&nbsp;</td></tr><tr>';}					
					$cpt++;
			}
		echo '</tr></table>'; 
  } else {
	  
?>

 <table width="560"" height="150"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="TYPO_STD_BLACK" align="center">
	<br><p>
	<?php  echo ($HTTP_GET_VARS['manufacturers_id'] ? TEXT_NO_PRODUCTS2 : TEXT_NO_PRODUCTS); ?>&nbsp;</p><br></td>
  </tr>
  </table>
<?php 
  }
?>
<table width="100%" align="center">
  <tr>
  <?php
	//
	//echo '<td align="right" class="SLOGAN_orange">';
	//echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y')));
	//echo '</td>';		
  ?>
  </tr>
</table>
