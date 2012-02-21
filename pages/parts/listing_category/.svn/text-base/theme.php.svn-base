   <?php  
	
	include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/products_listing_column_def.php'));
	
	if (strpos($HTTP_GET_VARS['list'],"?") > 0) {
    	$dvdlist =  substr($HTTP_GET_VARS['list'],0,strpos($HTTP_GET_VARS['list'],"?"));
	}else{
      	$dvdlist = $HTTP_GET_VARS['list'];
	}

	$listing_sql = 'select ' . $select_column_list . ',';
	$listing_sql .=	'pd.products_description, p.products_media, pd.products_image_big from ' . TABLE_PRODUCTS . ' p left join ' . TABLE_DIRECTORS . ' di on p.products_directors_id = di.Directors_id ';
	$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
	$listing_sql .= ' left join ' . TABLE_SPECIALS . ' s on p.products_id = s.products_id ';
	$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
	$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customers_id . '\' ';
	if ($HTTP_GET_VARS['list'] > 0) {
  		$listing_sql .= ' , ' . TABLE_PRODUCTS_TO_THEMES . ' p2c  where p.products_id=p2c.products_id and pd.products_id=p2c.products_id and p2c.themes_id=' . $HTTP_GET_VARS['list'] . ' and p.products_id > 9 ';
	} else {
 		//BEN001 $listing_sql .= ' where p.products_id > 49 ';
		$listing_sql .= ' where p.products_type = "DVD_NORM" and p.products_product_type= "Movie"  '; //BEN001
	}
	
	$listing_sql .= ' and p.products_status>-1 ';
	
	$dvdlist = $HTTP_GET_VARS['ftr'];
	
	$dvdlist2 = strtoupper($HTTP_GET_VARS['list']);
	include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/products_listing_conditions_specials.php'));
	
	//exclude some of the titles	
	if (strtoupper($HTTP_GET_VARS['list'])!='NEXT' && strtoupper($HTTP_GET_VARS['list'])!='NEW'&& strtoupper($HTTP_GET_VARS['list'])!='CINEMA') {
	    $listing_sql .= 'and w.product_id is null and wa.products_id is null ';
	}
	if (!SITE_IS_ADULT) $listing_sql .= getQueryLanguageClause($languages_id,'p');

	$listing_top_sql = $listing_sql;

	include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/products_listing_sort.php'));

	?>
      <tr>
        <td height="35" bgcolor="#E5E5E5" class="TYPO_STD2_BLACK">
			<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2">
			
			<?php  
			switch ($dvdlist2) {
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
            case 'FRESH' :
                echo TEXT_LIST_LASTADDED;
                break;
            case 'FRENCH' :
                echo TEXT_LIST_FRENCH;
                break;
            case 'CLASSIC' :
                echo TEXT_LIST_CLASSIC;
                break;
            case 'CINEMA' :
                echo TEXT_IN_CINEMA_NOW;
                break;
			case 'BLURAY' :
                echo 'Blu-Ray';
                break;
				
            }
			if ($HTTP_GET_VARS['list'] > 0){
                $themes_descriptions = tep_db_query("select c.themes_name from " . TABLE_THEMES_DESCRIPTION . " c where c.themes_id = '" . $HTTP_GET_VARS['list'] . "' and language_id = '" . $languages_id . "'");
                $themes_descriptions_values = tep_db_fetch_array($themes_descriptions);
	
                echo $themes_descriptions_values['themes_name'];
		
				}
            switch (strtoupper($HTTP_GET_VARS['ftr'])){
				case 'DISP':
	                echo ' '.TEXT_DISPONIBILITY;
					break;                    
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
				case 'BLURAY' :
	                echo 'Blu-Ray';
	                break;
            }
			$colspan = sizeof($column_list);
			$listing_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS_PRIVATE, $listing_sql, $listing_numrows);
			if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
				 echo'<img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="2">';
				 echo $listing_split->display_count($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS_PRIVATE, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS);
			}
			#echo $listing_sql;
	?>
        </td>
	</tr>