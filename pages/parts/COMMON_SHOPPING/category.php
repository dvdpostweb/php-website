<?php
$categories_products_query = tep_db_query("SELECT count(*) as total FROM  products p LEFT  JOIN products_to_categories pc ON p.products_id = pc.products_id WHERE quantity_to_sale  > 0 AND pc.categories_id =  '" . $current_category_id . "'"); 
$cateqories_products = tep_db_fetch_array($categories_products_query);
	if ($cateqories_products['total'] > 0) {
		
		$listing_sql ='SELECT p.products_id, p.products_ordered, pd.products_image_big, p.manufacturers_id, p.products_directors_id, p.products_rating, p.products_language_fr, p.products_undertitle_nl FROM products p LEFT JOIN products_to_categories pc ON p.products_id = pc.products_id LEFT JOIN products_description pd ON p.products_id = pd.products_id WHERE quantity_to_sale > 0 AND pc.categories_id ='. $current_category_id .' ';
		$listing_top_sql = $listing_sql;		
		?>
		<tr>
			<td height="35" bgcolor="#E5E5E5" class="TYPO_STD2_BLACK">
			 <img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2">
			<?php                      
			
			$categories_descriptions = tep_db_query("select c.categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " c where c.categories_id = '" . $current_category_id . "' and language_id = '" . $languages_id . "'");  
			$categories_descriptions_values = tep_db_fetch_array($categories_descriptions);
			$show_parent_descriptions = tep_db_query("select c.parent_id , cd.categories_name from " . TABLE_CATEGORIES . "  c, " . TABLE_CATEGORIES_DESCRIPTION . "  cd WHERE c.categories_id ='". $current_category_id ."' and c.parent_id=cd.categories_id AND c.parent_id > 0 and language_id = '" . $languages_id . "'");  
			$show_parent_descriptions_values = tep_db_fetch_array($show_parent_descriptions);
			 if ($show_parent_descriptions_values['parent_id']==0){			 
				echo $categories_descriptions_values['categories_name'];
			}else{
				echo $show_parent_descriptions_values['categories_name'].' ('.$categories_descriptions_values['categories_name'].')';
				}

			switch ($HTTP_GET_VARS['ftr']) {			
			  case 'DISP' :
				echo ' '.TEXT_DISPONIBILITY;
				break;
			case 'STARS':
				echo ' *****';
				break;
			case 'AWARDS':
				echo ' awards';
				break;
			case 'DVDPOSTCHOICE':
				echo ' '.TEXT_LIST_DVDPOSTCHOICE;
				break;
			case 'NEW':
				echo ' '.TEXT_LIST_NEW;
				break;
			case 'LASTADDED':
				echo ' '.TEXT_LIST_LASTADDED;
				break;
			case 'MISTHEM':
				echo ' '.TEXT_LIST_MISTHEM;
				break;
			case 'french' :
				echo TEXT_LIST_FRENCH;        
				break;
			case 'classic' :
				echo TEXT_LIST_CLASSIC;        
				break;
			}
			$colspan = sizeof($column_list);
			$listing_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $listing_sql, $listing_numrows);
			if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
				 echo'<img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="2">';
				 echo $listing_split->display_count($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS);
			}
        ?>
			</td>
		</tr>
  <?}?>		