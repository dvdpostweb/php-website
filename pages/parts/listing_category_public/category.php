<?php 


$categories_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where categories_id = '" . $current_category_id . "'");
$cateqories_products = tep_db_fetch_array($categories_products_query);
if ($cateqories_products['total'] > 0) {
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/products_listing_column_def.php'));
		// show the products of a specified manufacturer
		if ($HTTP_GET_VARS['manufacturers_id']) {
			if ($HTTP_GET_VARS['filter_id']) {
			// We are asked to show only a specific category
			$listing_sql = 'select ' . $select_column_list . ',p.products_media , pd.products_description from ' . TABLE_PRODUCTS . ' p ';
			$listing_sql .= ' inner join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on pd.products_id = p.products_id ';
			$listing_sql .= ' inner join ' . TABLE_MANUFACTURERS . ' m on p.manufacturers_id = m.manufacturers_id ';
			$listing_sql .= ' inner join ' . TABLE_PRODUCTS_TO_CATEGORIES . ' p2c on  p.products_id = p2c.products_id ';
			$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customers_id . '\' ';
			$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customers_id . '\' ';
			$listing_sql .= ' where w.product_id is null and p.products_status > \'-1\' and m.manufacturers_id = \'' . $HTTP_GET_VARS['manufacturers_id'] . '\'   and pd.language_id = \'' . $languages_id . '\' and p2c.categories_id = \'' . $HTTP_GET_VARS['filter_id'] . '\'';
			} else {
		// We show them all
			$listing_sql = 'select ' . $select_column_list . ',p.products_media , pd.products_description from ' . TABLE_PRODUCTS . ' p, ' . TABLE_PRODUCTS_DESCRIPTION . ' pd, ' . TABLE_MANUFACTURERS . ' m  ';
			$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customers_id . '\' ';
			$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customers_id . '\' ';
			$listing_sql .= ' where w.product_id is null and p.products_status > \'-1\' and pd.products_id = p.products_id and pd.language_id = \'' . $languages_id . '\' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = \'' . $HTTP_GET_VARS['manufacturers_id'] . '\' ';
			}
			// We build the categories-dropdown
			//BEN001 $filterlist_sql = 'select distinct c.categories_id as id, cd.categories_name as name from ' . TABLE_PRODUCTS . ' p, ' . TABLE_PRODUCTS_TO_CATEGORIES . ' p2c, ' . TABLE_CATEGORIES . ' c, ' . TABLE_CATEGORIES_DESCRIPTION . ' cd where p.products_status = \'1\' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and p2c.categories_id = cd.categories_id and cd.language_id = \'' . $languages_id . '\' and p.manufacturers_id = \'' . $HTTP_GET_VARS['manufacturers_id'] . '\' order by cd.categories_name ';
			$filterlist_sql = 'select distinct c.categories_id as id, cd.categories_name as name from ' . TABLE_PRODUCTS . ' p, ' . TABLE_PRODUCTS_TO_CATEGORIES . ' p2c, ' . TABLE_CATEGORIES . ' c, ' . TABLE_CATEGORIES_DESCRIPTION . ' cd where p.products_status = \'1\' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and p2c.categories_id = cd.categories_id and cd.language_id = \'' . $languages_id . '\' and p.manufacturers_id = \'' . $HTTP_GET_VARS['manufacturers_id'] . '\' and products_type = "DVD_NORM" and c.product_type="Movie" order by cd.categories_name '; //BEN001
		} else {
		// show the products in a given categorie
			if ($HTTP_GET_VARS['filter_id']) {
			// We are asked to show only specific catgeory

			$listing_sql = 'select ' . $select_column_list . ',p.products_media , pd.products_description from ' . TABLE_PRODUCTS . ' p, ' . TABLE_PRODUCTS_DESCRIPTION . ' pd, ' . TABLE_MANUFACTURERS . ' m, ' . TABLE_PRODUCTS_TO_CATEGORIES . ' p2c  on p.products_id = p2c.products_id ';
			$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customers_id . '\' ';
			$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customers_id . '\' ';
			$listing_sql .= ' where w.product_id is null and p.products_status > \'-1\' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = \'' . $HTTP_GET_VARS['filter_id'] . '\' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = \'' . $languages_id . '\' and p2c.categories_id = \'' . $current_category_id . '\' ';

			} else {
			// We show them all
			$listing_sql = 'select ' . $select_column_list . ',p.products_media , pd.products_description from ' . TABLE_PRODUCTS_DESCRIPTION . ' pd ';
			$listing_sql .= ' inner join ' . TABLE_PRODUCTS . ' p on pd.products_id=p.products_id ';
			$listing_sql .= ' left join ' . TABLE_MANUFACTURERS . ' m on p.manufacturers_id = m.manufacturers_id ' ;
			$listing_sql .= ' left join ' . TABLE_PRODUCTS_TO_CATEGORIES . ' p2c  on pd.products_id = p2c.products_id ';
			$listing_sql .= ' where p.products_status > \'-1\' and  pd.language_id = \'' . $languages_id . '\' and p2c.categories_id = \'' . $current_category_id . '\'';
			
			}
			// We build the manufacturers Dropdown
			$filterlist_sql= 'select distinct m.manufacturers_id as id, m.manufacturers_name as name from ' . TABLE_PRODUCTS . ' p, ' . TABLE_PRODUCTS_TO_CATEGORIES . ' p2c, ' . TABLE_MANUFACTURERS . ' m where p.products_status = \'1\' and p.manufacturers_id = m.manufacturers_id and p.products_id = p2c.products_id and p2c.categories_id = \'' . $current_category_id . '\' order by m.manufacturers_name';
		}
		$dvdlist = $HTTP_GET_VARS['ftr'];
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/products_listing_conditions_specials.php'));
		//exclude some of the titles
		$listing_sql .= ' AND p.products_media="DVD" and p.products_product_type= "Movie" ' ; //BEN001
		if (!SITE_IS_ADULT && SITE_TYPE!="DVD_ADULT")
		{ 
			$listing_sql .= getQueryLanguageClause($languages_id,'p');
		}
		$listing_top_sql = $listing_sql;
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common_public/products_listing_sort.php'));
		?>
			 
			<?php                       
			$categories_descriptions = tep_db_query("select c.categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " c where c.categories_id = '" . $current_category_id . "' and language_id = '" . $languages_id . "'");  
			$categories_descriptions_values = tep_db_fetch_array($categories_descriptions);
			$show_parent_descriptions = tep_db_query("select c.parent_id , cd.categories_name from " . TABLE_CATEGORIES . "  c, " . TABLE_CATEGORIES_DESCRIPTION . "  cd WHERE c.categories_id ='". $current_category_id ."' and c.parent_id=cd.categories_id AND c.parent_id > 0 and language_id = '" . $languages_id . "'");  
			$show_parent_descriptions_values = tep_db_fetch_array($show_parent_descriptions);
			 if ($show_parent_descriptions_values['parent_id']==0 ||$show_parent_descriptions_values['parent_id']==47){			 
				echo $categories_descriptions_values['categories_name'];
			}else{
				echo $show_parent_descriptions_values['categories_name'];
				echo ' ('.$categories_descriptions_values['categories_name'].')';
				}
			
			switch ($HTTP_GET_VARS['ftr']) {
			case 'STARS':
				echo ' *****';
				break;
			case 'AWARDS':
				echo ' awards';
				break;
			case 'DVDPOSTCHOICE':
				echo ' coup de coeur';
				break;
			case 'NEW':
				echo ' new';
				break;
			case 'LASTADDED':
				echo ' dernierement ajouté';
				break;
			case 'MISTHEM':
				echo ' vous les avez ratés';
				break;
			case 'french' :
				echo TEXT_LIST_FRENCH;        
				break;
			case 'classic' :
				echo TEXT_LIST_CLASSIC;        
				break;
			}
			if (!SITE_IS_ADULT && SITE_TYPE!="DVD_ADULT")
			{ 
				$count_special .= getQueryLanguageClause($languages_id,'p');
			}
			$sql_count="SELECT count(pc.products_id) as cpt FROM products_to_categories pc LEFT JOIN products p on p.products_id=pc.products_id where pc.categories_id='". $current_category_id ."' and p.products_status>-1 and p.products_media='DVD'".$count_special;
			#echo $sql_count;
			$count_movies_category = tep_db_query($sql_count);  
			
			$count_movies_category_values = tep_db_fetch_array($count_movies_category);
			echo ' <SPAN class="dvdtitle_link"><B>'.$count_movies_category_values['cpt'].' '.TITLES_IN_CATALOG.'</b></span>';
			$colspan = sizeof($column_list);

			$listing_sql.= ' limit 200 ';
			if($_GET['debug']==1)
				echo $listing_sql;
			
			$list_tab = tep_db_cache_asso($listing_sql,'products_id',14400);
			$list_tab=tep_db_rand($list_tab,20);
			//$listing_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $listing_sql, $listing_numrows);
			//if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
				 //echo'<img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="2">';
				 //echo $listing_split->display_count($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS);
			//}
}?>		