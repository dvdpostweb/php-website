   <?php 
	include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common_adult/products_listing_column_def_adult.php'));
	if (strpos($HTTP_GET_VARS['list'],"?") > 0) {
    	$dvdlist =  substr($HTTP_GET_VARS['list'],0,strpos($HTTP_GET_VARS['list'],"?"));
	}else{
      	$dvdlist = $HTTP_GET_VARS['list'];
	}

	//BEN001 $listing_sql = 'select ' . $select_column_list . ', pd.products_description,pd.products_image_big from products_adult p left join manufacturers ma on p.manufacturers_id  = ma.manufacturers_id  ';
	$listing_sql = 'select ' . $select_column_list . ', pd.products_description,pd.products_image_big from products p left join studio st on p.products_studio  = st.studio_id  '; //BEN001
//BEN001	$listing_sql .= ' left join products_description_adult pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
	$listing_sql .= ' left join products_description pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ; //BEN001
	//BEN001 $listing_sql .= ' left join wishlist_adult w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
	$listing_sql .= ' left join wishlist w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ; //BEN001
	//BEN001 $listing_sql .= ' left join wishlist_assigned_adult wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customers_id . '\' ';
	$listing_sql .= ' left join wishlist_assigned wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customers_id . '\' '; //BEN001

	if ($HTTP_GET_VARS['list'] > 0) {
  		//RALPH-004 $listing_sql .= ' , products_to_themes_adult p2c  where p.products_id=p2c.products_id and pd.products_id=p2c.products_id and p2c.themes_id=' . $HTTP_GET_VARS['list'] . ' and products_status=1 and p.products_id > 9 ';
  		//BEN001 $listing_sql .= ' , products_to_themes p2c  where p.products_id=p2c.products_id and pd.products_id=p2c.products_id and p2c.themes_id=' . $HTTP_GET_VARS['list'] . ' and products_status=1 and p.products_id > 9 '; //RALPH-004
		$listing_sql .= ' , products_to_themes p2c  where p.products_id=p2c.products_id and pd.products_id=p2c.products_id and p2c.themes_id=' . $HTTP_GET_VARS['list'] . ' and products_status=1 and p.products_type = "DVD_ADULT" '; //BEN001
	} else {
 		//BEN001 $listing_sql .= ' where p.products_id > 49 ';
		$listing_sql .= ' where p.products_type = "DVD_ADULT" ';
	}

	$dvdlist = strtoupper($HTTP_GET_VARS['list']);
	include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common_adult/products_listing_conditions_specials_adult.php'));
	//exclude some of the titles	
	if (strtoupper($HTTP_GET_VARS['list'])!='NEXT' && strtoupper($HTTP_GET_VARS['list'])!='NEW') {
    $listing_sql .= 'and w.product_id is null and wa.products_id is null ';
    $listing_sql.= ' and p.only_for_sale=0 ';
	}
	$listing_sql.= ' and products_type = "DVD_ADULT" '; //BEN001
	$listing_top_sql = $listing_sql;
	
	include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common_adult/products_listing_sort_adult.php'));
	?>
      <tr>
        <td height="35" bgcolor="#F7EAF4" class="TYPO_STD2_BLACK">
			<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2">
			<?php 
			switch ($dvdlist) {
            case 'NEW' :
				echo TEXT_LIST_NEW;
				break;
            case 'LASTADDED' :
                echo TEXT_LIST_LASTADDED;
                break;
            case 'NEXT' :
                echo TEXT_LIST_NEXT;
                break;
            case 'STARS' :
                echo TEXT_LIST_5STRAS;
                break;
            case 'DVDPOSTCHOICE' :
                echo TEXT_LIST_DVDPOSTCHOICE;
                break;
            case 'MISTHEM' :
                echo TEXT_LIST_MISTHEM;
                break;
            case 'AWARDS' :
                echo TEXT_LIST_AWARDS;
                break;
            case 'FRENCH' :
                echo TEXT_LIST_FRENCH;
                break;
            case 'CLASSIC' :
                echo TEXT_LIST_CLASSIC;
                break;
            }
			if ($HTTP_GET_VARS['list'] > 0){
                //RALPH-004 $themes_descriptions = tep_db_query("select c.themes_name from themes_description_adult c where c.themes_id = '" . $HTTP_GET_VARS['list'] . "' and language_id = '" . $languages_id . "'");
                $themes_descriptions = tep_db_query("select c.themes_name from themes_description c where c.themes_id = '" . $HTTP_GET_VARS['list'] . "' and language_id = '" . $languages_id . "'"); //RALPH-004
                $themes_descriptions_values = tep_db_fetch_array($themes_descriptions);
                echo $themes_descriptions_values['themes_name'];
                    switch (strtoupper($HTTP_GET_VARS['ftr'])){
                    case 'STARS':
                        echo ' - ' . TEXT_LIST_5STRAS;
                        break;
                    case 'AWARDS':
                        echo ' - ' . TEXT_LIST_AWARDS;
                        break;
                    case 'DVDPOSTCHOICE':
                        echo ' - ' . TEXT_LIST_DVDPOSTCHOICE;
                        break;
                    case 'NEW':
                        echo ' - ' . TEXT_LIST_NEW;
                        break;
                    case 'LASTADDED':
                        echo ' - ' . TEXT_LIST_LASTADDED;
                        break;
                    case 'MISTHEM':
                        echo ' - ' . TEXT_LIST_MISTHEM;
                        break;
                    case 'FRENCH' :
                        echo ' - ' . TEXT_LIST_FRENCH;
                        break;
                    case 'CLASSIC' :
                        echo ' - ' . TEXT_LIST_CLASSIC ;
                        break;
                    }

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