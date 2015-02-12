<?php  
function ruby_host($prefix = 'public')
{
   if($_SERVER['SERVER_NAME'] == 'www.dvdpost.nl' ||  $_SERVER['SERVER_NAME'] == 'dvdpost.nl')
   {
     return 'http://'.$prefix.'.dvdpost.nl/';
   }
   else
   {
     return 'http://'.$prefix.'.dvdpost.com/';
   }
}
function scriptAvailable($tab,$page='')
{
	$result=false;
	for($i=0;$i<=count($tab);$i++)
	{
		$value=$tab[$i];
		if(strpos(((!empty($page))?$page:$_SERVER['SCRIPT_NAME']),$value)!==false){
			$result=true;
		}
	}
	return $result;
}

function scriptAvailable_new($tab,$page='')
{
	$result=false;
	for($i=0;$i<=count($tab);$i++)
	{
		$value=$tab[$i];
		if(strpos(((!empty($page))?$page:$_SERVER['SCRIPT_NAME']),$value)!==false){
			$result=$value;
		}
	}
	return $result;
}

function replace_accents($string)
{
  return str_replace( array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'), array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $string);
}
function formatAvailability($added_today, $products_next, $products_date_available, $products_availability) {
    if ($products_next > 0) {
        //$lc_text = $lc_text . '<font color="#2C5196"><b>' . substr($listing_values['products_date_available'],0,10) . '</b></font>';        
        $strdate = substr($products_date_available, 0, 10);
        return '<font color="#2C5196"><b><span style="font-weight:bold">' . substr($strdate, 8, 2) . "/" . substr($strdate, 5, 2) . "/" . substr($strdate, 0, 4) . '</span></b></font>';        
    } else if ($added_today > 0) {
        return AVAILABILITY_ADDED_TODAY;
    } else {
        return '<img src="' . DIR_WS_IMAGES . 'avail' . $products_availability . '.gif">';
    }
}

////
// Reorder the wishlist of a client
  function tep_reorder_wishlist($customers_id) {
    /*$tableSuffix = '';
    if (SITE_ADULT) $tableSuffix = '_adult';
   //BEN001  $wlid_query = tep_db_query('select wl_id from ' . TABLE_WISHLIST . ' where customers_id=\'' . $customers_id . '\' order by rank asc');
    $wlid_query = tep_db_query('select wl_id from ' . TABLE_WISHLIST . ' where customers_id=\'' . $customers_id . '\' and wishlist_type = "DVD_NORM" order by rank asc'); //BEN001
    $sqltrailer = '';
    $sqlfooter = '';
    $counter = 0;
    while ($wlids = tep_db_fetch_array($wlid_query)) {
        ++$counter;
        $sqltrailer .= 'if(wl_id='.$wlids['wl_id'].',' . $counter . ',';
        $sqlfooter .= ')';
        if ($counter%100==0) {
            //BEN001 tep_db_query('update ' . TABLE_WISHLIST . ' set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\'');
			tep_db_query('update ' . TABLE_WISHLIST . ' set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\' and wishlist_type = "DVD_NORM" '); //BEN001
            $sqltrailer = '';
            $sqlfooter = '';
        }
    }
    //BEN001 tep_db_query('update ' . TABLE_WISHLIST . ' set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\'');
	tep_db_query('update ' . TABLE_WISHLIST . ' set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\' and wishlist_type = "DVD_NORM" '); //BEN001
	*/
  }

    function tep_reorder_wishlist2($customers_id) {
    /*$tableSuffix = '';
    if (SITE_ADULT) $tableSuffix = '_adult';
    //BEN001 $wlid_query = tep_db_query('select wl_id from ' . TABLE_WISHLIST . ' where customers_id=\'' . $customers_id . '\'  order by priority ,  date_added');
	$wlid_query = tep_db_query('select wl_id from ' . TABLE_WISHLIST . ' where customers_id=\'' . $customers_id . '\' and wishlist_type = "DVD_NORM" order by priority ,  date_added'); //BEN001
    $sqltrailer = '';
    $sqlfooter = '';
    $counter = 0;
    while ($wlids = tep_db_fetch_array($wlid_query)) {
        ++$counter;
        $sqltrailer .= 'if(wl_id='.$wlids['wl_id'].',' . $counter . ',';
        $sqlfooter .= ')';
        if ($counter%100==0) {
            //BEN001 tep_db_query('update ' . TABLE_WISHLIST . ' set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\'  ');
			tep_db_query('update ' . TABLE_WISHLIST . ' set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\' and wishlist_type = "DVD_NORM"'); //BEN001 
            $sqltrailer = '';
            $sqlfooter = '';
        }
    }
    //BEN001 tep_db_query('update ' . TABLE_WISHLIST . ' set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\' ');
	tep_db_query('update ' . TABLE_WISHLIST . ' set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\' and wishlist_type = "DVD_NORM"'); //BEN001
	*/
  }

    function tep_reorder_wishlist_adult($customers_id) {
    /*$tableSuffix = '';
    if (SITE_ADULT) $tableSuffix = '_adult';
    //BEN001 $wlid_query = tep_db_query('select wl_id from wishlist_adult where customers_id=\'' . $customers_id . '\' order by rank asc');
	$wlid_query = tep_db_query('select wl_id from wishlist where wishlist_type = "DVD_ADULT" and customers_id=\'' . $customers_id . '\' order by rank asc'); //BEN001
    $sqltrailer = '';
    $sqlfooter = '';
    $counter = 0;
    while ($wlids = tep_db_fetch_array($wlid_query)) {
        ++$counter;
        $sqltrailer .= 'if(wl_id='.$wlids['wl_id'].',' . $counter . ',';
        $sqlfooter .= ')';
        if ($counter%100==0) {
            //BEN001 tep_db_query('update wishlist_adult set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\'');
			tep_db_query('update wishlist set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where wishlist_type = "DVD_ADULT" and customers_id=\'' . $customers_id . '\''); //BEN001
            $sqltrailer = '';
            $sqlfooter = '';
        }
    }
    //BEN001 tep_db_query('update wishlist_adult set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where customers_id=\'' . $customers_id . '\'');
	tep_db_query('update wishlist set rank=' . $sqltrailer . 'rank' . $sqlfooter . ' where wishlist_type = "DVD_ADULT" and customers_id=\'' . $customers_id . '\''); //BEN001
	*/
  }

////
// Stop from parsing any further PHP code
  function tep_exit() {
   tep_session_close();
   exit();
  }

////
// Redirect to another page or site
  function tep_redirect($url) {
    #tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'redirect', $url, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
  	
    header('Location: ' . $url);
    tep_exit();
  }

  function tep_redirect_301($url)
  {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . $url);
    tep_exit();
  }
////
// Error message wrapper
// When optional parameters are provided, it closes the application
// (ie, halts the current application execution task)
  function tep_error_message($error_message, $close_application = false, $close_application_error = '') {
    echo $error_message;

    if ($close_application) {
      die($close_application_error);
    }
  }

////
// Return a random row from a database query
  function tep_random_select($query) {
    srand((double)microtime()*1000000); // seed the random number generator
    $random_product = '';
    $random_query = tep_db_query($query);
    $num_rows = tep_db_num_rows($random_query);
    if ($num_rows > 0) {
      $random_row = @rand(0, ($num_rows - 1));
      tep_db_data_seek($random_query, $random_row);
      $random_product = tep_db_fetch_array($random_query);
    }
    return $random_product;
  }

////
// Return a product's name
// TABLES: products
  function tep_get_products_name($product_id) {
    global $languages_id;

    $product_query = tep_db_query("select products_name from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" . $product_id . "' and language_id = '" . $languages_id . "'");
    $product = tep_db_fetch_array($product_query);

    return $product['products_name'];
  }

////
// Return a product's special price (returns nothing if there is no offer)
// TABLES: products
  function tep_get_products_special_price($product_id) {
    $product_query = tep_db_query("select specials_new_products_price from " . TABLE_SPECIALS . " where products_id = '" . $product_id . "' and status");
    $product = tep_db_fetch_array($product_query);

    return $product['specials_new_products_price'];
  }

////
// Return a product's stock
// TABLES: products
  function tep_get_products_stock($products_id) {
    $products_id = tep_get_prid($products_id);
    $stock_query = tep_db_query("select products_quantity from " . TABLE_PRODUCTS . " where products_id = '" . $products_id . "'");
    $stock_values = tep_db_fetch_array($stock_query);
    return $stock_values['products_quantity'];
  }

////
// Check if the required stock is available
// If insufficent stock is available return an out of stock message
  function tep_check_stock($products_id, $products_quantity) {
    $stock_left = tep_get_products_stock($products_id) - $products_quantity;
    $out_of_stock = '';
    if ($stock_left < 0) {
      $out_of_stock = '<span class="markProductOutOfStock">' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '</span>';
    }
    return $out_of_stock;
  }

////
// Break a word in a string if it is longer than a specified length ($len)
  function tep_break_string($string, $len, $break_char = '-') {
    $l = 0;
    $output = '';
    for ($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      if ($char != ' ') {
        $l++;
      } else {
        $l = 0;
      }
      if ($l > $len) {
        $l = 1;
        $output .= $break_char;
      }
      $output .= $char;
    }

    return $output;
  }

////
// Return all HTTP GET variables, except those passed as a parameter
  function tep_get_all_get_params($exclude_array = '') {
    global $HTTP_GET_VARS;

    if ($exclude_array == '') $exclude_array = array();

    $get_url = '';
    if (is_array($HTTP_GET_VARS)) {
      reset($HTTP_GET_VARS);
      while (list($key, $value) = each($HTTP_GET_VARS)) {
        if ((strlen($value) > 0) && ($key != session_name()) && ($key != 'error') && (!in_array($key, $exclude_array))) {
          $get_url .= $key . '=' . rawurlencode(stripslashes($value)) . '&';
        }
      }
    }
    return $get_url;
  }

////
// Returns an array with countries
// TABLES: countries
  function tep_get_countries($countries_id = '', $with_iso_codes = false) {
    $countries_array = array();
    if ($countries_id) {
      if ($with_iso_codes) {
        $countries = tep_db_query("select countries_name, countries_iso_code_2, countries_iso_code_3 from " . TABLE_COUNTRIES . " where countries_id = '" . $countries_id . "' order by countries_name");
        $countries_values = tep_db_fetch_array($countries);
        $countries_array = array('countries_name' => $countries_values['countries_name'],
                                 'countries_iso_code_2' => $countries_values['countries_iso_code_2'],
                                 'countries_iso_code_3' => $countries_values['countries_iso_code_3']);
      } else {
        $countries = tep_db_query("select countries_name from " . TABLE_COUNTRIES . " where countries_id = '" . $countries_id . "' ");
        $countries_values = tep_db_fetch_array($countries);
        $countries_array = array('countries_name' => $countries_values['countries_name']);
      }
    } else {
      $countries = tep_db_query("select countries_id, countries_name from " . TABLE_COUNTRIES . " order by countries_name");
      while ($countries_values = tep_db_fetch_array($countries)) {
        $countries_array[] = array('countries_id' => $countries_values['countries_id'],
                                   'countries_name' => $countries_values['countries_name']);
      }
    }

    return $countries_array;
  }

////
// Alias function to tep_get_countries, which also returns the countries iso codes
  function tep_get_countries_with_iso_codes($countries_id) {
    return tep_get_countries($countries_id, true);
  }

////
// Generate a path to categories
  function tep_get_path($current_category_id = '') {
    global $cPath_array;

    if ($current_category_id) {
      if (sizeof($cPath_array) == 0) {
        $cPath_new = $current_category_id;
      } else {
        $cPath_new = '';
        $last_category_query = tep_db_query("select parent_id from " . TABLE_CATEGORIES . " where categories_id = '" . $cPath_array[(sizeof($cPath_array)-1)] . "'");
        $last_category = tep_db_fetch_array($last_category_query);
        $current_category_query = tep_db_query("select parent_id from " . TABLE_CATEGORIES . " where categories_id = '" . $current_category_id . "'");
        $current_category = tep_db_fetch_array($current_category_query);
        if ($last_category['parent_id'] == $current_category['parent_id']) {
          for ($i=0; $i<(sizeof($cPath_array)-1); $i++) {
            $cPath_new .= '_' . $cPath_array[$i];
          }
        } else {
          for ($i=0; $i<sizeof($cPath_array); $i++) {
            $cPath_new .= '_' . $cPath_array[$i];
          }
        }
        $cPath_new .= '_' . $current_category_id;
        if (substr($cPath_new, 0, 1) == '_') {
          $cPath_new = substr($cPath_new, 1);
        }
      }
    } else {
      $cPath_new = implode('_', $cPath_array);
    }

    return 'cPath=' . $cPath_new;
  }

////
// Returns the clients browser
  function tep_browser_detect($component) {
    global $HTTP_USER_AGENT;

    $result = stristr($HTTP_USER_AGENT, $component);

    return $result;
  }

////
// Alias function to tep_get_countries()
  function tep_get_country_name($country_id) {
    $country_array = tep_get_countries($country_id);

    return $country_array['countries_name'];
  }

////
// Returns the zone (State/Province) name
// TABLES: zones
  function tep_get_zone_name($country_id, $zone_id, $default_zone) {
    $zone_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . $country_id . "' and zone_id = '" . $zone_id . "'");
    if (tep_db_num_rows($zone_query)) {
      $zone = tep_db_fetch_array($zone_query);
      return $zone['zone_name'];
    } else {
      return $default_zone;
    }
  }

////
// Returns the zone (State/Province) code
// TABLES: zones
  function tep_get_zone_code($country_id, $zone_id, $default_zone) {
    $zone_query = tep_db_query("select zone_code from " . TABLE_ZONES . " where zone_country_id = '" . $country_id . "' and zone_id = '" . $zone_id . "'");
    if (tep_db_num_rows($zone_query)) {
      $zone = tep_db_fetch_array($zone_query);
      return $zone['zone_code'];
    } else {
      return $default_zone;
    }
  }

////
// Wrapper function for round() for php3 compatibility
  function tep_round($value, $precision) {
    if (PHP_VERSION < 4) {
      $exp = pow(10, $precision);
      return round($value * $exp) / $exp;
    } else {
      return round($value, $precision);
    }
  }

////
// Returns the tax rate for a zone / class
// TABLES: tax_rates, zones_to_geo_zones
  function tep_get_tax_rate($class_id, $country_id = -1, $zone_id = -1) {
    global $customer_zone_id, $customer_country_id;

    if ( ($country_id == -1) && ($zone_id == -1) ) {
      if (!tep_session_is_registered('customer_id')) {
        $country_id = STORE_COUNTRY;
        $zone_id = STORE_ZONE;
      } else {
        $country_id = $customer_country_id;
        $zone_id = $customer_zone_id;
      }
    }

    $tax_query = tep_db_query("select SUM(tax_rate) as tax_rate from " . TABLE_TAX_RATES . " tr left join " . TABLE_ZONES_TO_GEO_ZONES . " za ON tr.tax_zone_id = za.geo_zone_id left join " . TABLE_GEO_ZONES . " tz ON tz.geo_zone_id = tr.tax_zone_id WHERE (za.zone_country_id IS NULL OR za.zone_country_id = '0' OR za.zone_country_id = '" . $country_id . "') AND (za.zone_id IS NULL OR za.zone_id = '0' OR za.zone_id = '" . $zone_id . "') AND tr.tax_class_id = '" . $class_id . "' GROUP BY tr.tax_priority");
    if (tep_db_num_rows($tax_query)) {
      $tax_multiplier = 0;
      while ($tax = tep_db_fetch_array($tax_query)) {
        $tax_multiplier += $tax['tax_rate'];
      }
      return $tax_multiplier;
    } else {
      return 0;
    }
  }

////
// Return the tax description for a zone / class
// TABLES: tax_rates;
  function tep_get_tax_description($zone_id, $class_id) {
    $tax_query = tep_db_query("select tax_description from " . TABLE_TAX_RATES . " where tax_zone_id = '" . $zone_id . "' and tax_class_id = '" . $class_id . "'");
    if (tep_db_num_rows($tax_query)) {
      $tax = tep_db_fetch_array($tax_query);
      return $tax['tax_description'];
    } else {
      return TEXT_UNKNOWN_TAX_RATE;
    }
  }

////
// Add tax to a products price
  function tep_add_tax($price, $tax) {
    global $currencies;

    if (DISPLAY_PRICE_WITH_TAX == true) {
      return tep_round($price, $currencies->currencies[DEFAULT_CURRENCY]['decimal_places']) + tep_calculate_tax($price, $tax);
    } else {
      return tep_round($price, $currencies->currencies[DEFAULT_CURRENCY]['decimal_places']);
    }
  }

// Calculates Tax rounding the result
  function tep_calculate_tax($price, $tax) {
    global $currencies;

    return tep_round($price * $tax / 100, $currencies->currencies[DEFAULT_CURRENCY]['decimal_places']);
  }

////
// Return the number of products in a category
// TABLES: products, products_to_categories, categories
  function tep_count_products_in_category($category_id, $include_inactive = false) {
    $products_count = 0;
    if ($include_inactive) {
      $products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_id = p2c.products_id and p2c.categories_id = '" . $category_id . "'");
    } else {
      $products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_id = p2c.products_id and p.products_status = 1 and p2c.categories_id = '" . $category_id . "'");
    }
    $products = tep_db_fetch_array($products_query);
    $products_count += $products['total'];

    if (USE_RECURSIVE_COUNT == 'true') {
      //BEN001 $child_categories_query = tep_db_query("select categories_id from " . TABLE_CATEGORIES . " where parent_id = '" . $category_id . "'");
	  $child_categories_query = tep_db_query("select categories_id from " . TABLE_CATEGORIES . " where parent_id = '" . $category_id . "' and categories_type = 'DVD_NORM'"); //BEN001
      if (tep_db_num_rows($child_categories_query)) {
        while ($child_categories = tep_db_fetch_array($child_categories_query)) {
          $products_count += tep_count_products_in_category($child_categories['categories_id'], $include_inactive);
        }
      }
    }

    return $products_count;
  }

////
// Return true if the category has subcategories
// TABLES: categories
  function tep_has_category_subcategories($category_id) {
    //BEN001 $child_category_query = tep_db_query("select count(*) as count from " . TABLE_CATEGORIES . " where parent_id = '" . $category_id . "'");
	$child_category_query = tep_db_query("select count(*) as count from " . TABLE_CATEGORIES . " where parent_id = '" . $category_id . "' and categories_type = 'DVD_NORM'"); //BEN001
    $child_category = tep_db_fetch_array($child_category_query);

    if ($child_category['count'] > 0) {
      return true;
    } else {
      return false;
    }
  }

  function tep_has_theme_subthemes($theme_id) {
    //BEN001 $child_theme_query = tep_db_query("select count(*) as count from " . TABLE_THEMES . " where parent_id = '" . $theme_id . "'");
	$child_theme_query = tep_db_query("select count(*) as count from " . TABLE_THEMES . " where parent_id = '" . $theme_id . "' and themes_type = 'DVD_NORM'"); //BEN001
    $child_category = tep_db_fetch_array($child_theme_query);

    if ($child_theme['count'] > 0) {
      return true;
    } else {
      return false;
    }
  }

////
// Returns the address_format_id for the given country
// TABLES: countries;
  function tep_get_address_format_id($country_id) {
    $address_format_query = tep_db_query("select address_format_id as format_id from " . TABLE_COUNTRIES . " where countries_id = '" . $country_id . "'");
    if (tep_db_num_rows($address_format_query)) {
      $address_format = tep_db_fetch_array($address_format_query);
      return $address_format['format_id'];
    } else {
      return '1';
    }
  }

////
// Return a formatted address
// TABLES: address_format
  function tep_address_format($address_format_id, $address, $html, $boln, $eoln) {
    $address_format_query = tep_db_query("select address_format as format from " . TABLE_ADDRESS_FORMAT . " where address_format_id = '" . $address_format_id . "'");
    $address_format = tep_db_fetch_array($address_format_query);

    $firstname = addslashes($address['firstname']);
    $lastname = addslashes($address['lastname']);
    $street = addslashes($address['street_address']);
    $suburb = addslashes($address['suburb']);
    $city = addslashes($address['city']);
    $state = addslashes($address['state']);
    $country_id = $address['country_id'];
    $zone_id = $address['zone_id'];
    $postcode = addslashes($address['postcode']);
    $zip = $postcode;
    $country = tep_get_country_name($country_id);
    $state = tep_get_zone_code($country_id, $zone_id, $state);

    if ($html) {
// HTML Mode
      $HR = '<hr>';
      $hr = '<hr>';
      if ( ($boln == '') && ($eoln == "\n") ) { // Values not specified, use rational defaults
        $CR = '<br>';
        $cr = '<br>';
        $eoln = $cr;
      } else { // Use values supplied
        $CR = $eoln . $boln;
        $cr = $CR;
      }
    } else {
// Text Mode
      $CR = $eoln;
      $cr = $CR;
      $HR = '----------------------------------------';
      $hr = '----------------------------------------';
    }

    $statecomma = '';
    $streets = $street;
    if ($suburb != '') $streets = $street . $cr . $suburb;
    if ($firstname == '') $firstname = addslashes($address['name']);
    if ($country == '') $country = addslashes($address['country']);
    if ($state != '') $statecomma = $state . ', ';

    $fmt = $address_format['format'];
    eval("\$address = \"$fmt\";");
    $address = stripslashes($address);

    return $boln . $address . $eoln;
  }

////
// Return a formatted address
// TABLES: customers, address_book
  function tep_address_label($customers_id, $address_id = 1, $html = false, $boln = '', $eoln = "\n") {
    $address_query = tep_db_query("select entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . $customers_id . "' and address_book_id = '" . $address_id . "'");
    $address = tep_db_fetch_array($address_query);
    $format_id = tep_get_address_format_id($address['country_id']);
    return tep_address_format($format_id, $address, $html, $boln, $eoln);
  }

////
// Return a formatted address
// TABLES: address_book, address_format
  function tep_address_summary($customers_id, $address_id) {
    $customers_id = tep_db_prepare_input($customers_id);
    $address_id = tep_db_prepare_input($address_id);

    $address_query = tep_db_query("select ab.entry_street_address, ab.entry_suburb, ab.entry_postcode, ab.entry_city, ab.entry_state, ab.entry_country_id, ab.entry_zone_id, c.countries_name, c.address_format_id from " . TABLE_ADDRESS_BOOK . " ab, " . TABLE_COUNTRIES . " c where ab.address_book_id = '" . tep_db_input($address_id) . "' and ab.customers_id = '" . tep_db_input($customers_id) . "' and ab.entry_country_id = c.countries_id");
    $address = tep_db_fetch_array($address_query);

    $street_address = $address['entry_street_address'];
    $suburb = $address['entry_suburb'];
    $postcode = $address['entry_postcode'];
    $city = $address['entry_city'];
    $state = tep_get_zone_code($address['entry_country_id'], $address['entry_zone_id'], $address['entry_state']);
    $country = $address['countries_name'];

    $address_format_query = tep_db_query("select address_summary from " . TABLE_ADDRESS_FORMAT . " where address_format_id = '" . $address['address_format_id'] . "'");
    $address_format = tep_db_fetch_array($address_format_query);

//    eval("\$address = \"{$address_format['address_summary']}\";");
    $address_summary = $address_format['address_summary'];
    eval("\$address = \"$address_summary\";");

    return $address;
  }

  function tep_row_number_format($number) {
    if ( ($number < 10) && (substr($number, 0, 1) != '0') ) $number = '0' . $number;

    return $number;
  }

  function tep_get_categories($categories_array = '', $parent_id = '0', $indent = '') {
    global $languages_id;

    $parent_id = tep_db_prepare_input($parent_id);

    if (!is_array($categories_array)) $categories_array = array();

    //BEN001 $categories_query = tep_db_query("select c.categories_id, cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where parent_id = '" . tep_db_input($parent_id) . "' and c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "' order by sort_order, cd.categories_name");
	$categories_query = tep_db_query("select c.categories_id, cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where parent_id = '" . tep_db_input($parent_id) . "' and c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "' and categories_type = 'DVD_NORM' order by sort_order, cd.categories_name"); //BEN001
    while ($categories = tep_db_fetch_array($categories_query)) {
      $categories_array[] = array('id' => $categories['categories_id'],
                                  'text' => $indent . $categories['categories_name']);

      if ($categories['categories_id'] != $parent_id) {
        $categories_array = tep_get_categories($categories_array, $categories['categories_id'], $indent . '&nbsp;&nbsp;');
      }
    }

    return $categories_array;
  }

  function tep_get_manufacturers($manufacturers_array = '') {
    if (!is_array($manufacturers_array)) $manufacturers_array = array();

    $manufacturers_query = tep_db_query("select manufacturers_id, manufacturers_name from " . TABLE_MANUFACTURERS . " order by manufacturers_name");
    while ($manufacturers = tep_db_fetch_array($manufacturers_query)) {
      $manufacturers_array[] = array('id' => $manufacturers['manufacturers_id'], 'text' => $manufacturers['manufacturers_name']);
    }

    return $manufacturers_array;
  }

////
// Return all subcategory IDs
// TABLES: categories
  function tep_get_subcategories(&$subcategories_array, $parent_id = 0) {
    //BEN001 $subcategories_query = tep_db_query("select categories_id from " . TABLE_CATEGORIES . " where parent_id = '" . $parent_id . "'");
	$subcategories_query = tep_db_query("select categories_id from " . TABLE_CATEGORIES . " where parent_id = '" . $parent_id . "' and categories_type = 'DVD_NORM'"); //BEN001
    while ($subcategories = tep_db_fetch_array($subcategories_query)) {
      $subcategories_array[sizeof($subcategories_array)] = $subcategories['categories_id'];
      if ($subcategories['categories_id'] != $parent_id) {
        tep_get_subcategories($subcategories_array, $subcategories['categories_id']);
      }
    }
  }

// Output a raw date string in the selected locale date format
// $raw_date needs to be in this format: YYYY-MM-DD HH:MM:SS
  function tep_date_long($raw_date) {
    if ( ($raw_date == '0000-00-00 00:00:00') || ($raw_date == '') ) return false;

    $year = (int)substr($raw_date, 0, 4);
    $month = (int)substr($raw_date, 5, 2);
    $day = (int)substr($raw_date, 8, 2);
    $hour = (int)substr($raw_date, 11, 2);
    $minute = (int)substr($raw_date, 14, 2);
    $second = (int)substr($raw_date, 17, 2);

    return strftime(DATE_FORMAT_LONG, mktime($hour,$minute,$second,$month,$day,$year));
  }

////
// Output a raw date string in the selected locale date format
// $raw_date needs to be in this format: YYYY-MM-DD HH:MM:SS
// NOTE: Includes a workaround for dates before 01/01/1970 that fail on windows servers
  function tep_date_short($raw_date) {
    if ( ($raw_date == '0000-00-00 00:00:00') || ($raw_date == '') ) return false;

    $year = substr($raw_date, 0, 4);
    $month = (int)substr($raw_date, 5, 2);
    $day = (int)substr($raw_date, 8, 2);
    $hour = (int)substr($raw_date, 11, 2);
    $minute = (int)substr($raw_date, 14, 2);
    $second = (int)substr($raw_date, 17, 2);
    return date(DATE_FORMAT, mktime($hour, $minute, $second, $month, $day, $year));
  }

////
// Parse search string into indivual objects
  function tep_parse_search_string($search_str = '', &$objects) {
    $search_str = trim(strtolower($search_str));

// Break up $search_str on whitespace; quoted string will be reconstructed later
    $pieces = explode('[[:space:]]+', $search_str);

    $objects = array();
    $tmpstring = '';
    $flag = '';

    for ($k=0; $k<count($pieces); $k++) {
      while (substr($pieces[$k], 0, 1) == '(') {
        $objects[] = '(';
        if (strlen($pieces[$k]) > 1) {
          $pieces[$k] = substr($pieces[$k], 1);
        } else {
          $pieces[$k] = '';
        }
      }

      $post_objects = array();

      while (substr($pieces[$k], -1) == ')')  {
        $post_objects[] = ')';
        if (strlen($pieces[$k]) > 1) {
          $pieces[$k] = substr($pieces[$k], 0, -1);
        } else {
          $pieces[$k] = '';
        }
      }

// Check individual words

      if ( (substr($pieces[$k], -1) != '"') && (substr($pieces[$k], 0, 1) != '"') ) {
        $objects[] = trim($pieces[$k]);

        for ($j=0; $j<count($post_objects); $j++) {
          $objects[] = $post_objects[$j];
        }
      } else {
/* This means that the $piece is either the beginning or the end of a string.
   So, we'll slurp up the $pieces and stick them together until we get to the
   end of the string or run out of pieces.
*/

// Make sure the $tmpstring is empty
        $tmpstring = '';

// Add this word to the $tmpstring, starting the $tmpstring

        $tmpstring .= trim(preg_replace('/"/', ' ', $pieces[$k]));

// Check for one possible exception to the rule. That there is a single quoted word.
        if (substr($pieces[$k], -1 ) == '"') {
// Turn the flag off for future iterations
          $flag = 'off';

          $objects[] = trim($pieces[$k]);

          for ($j=0; $j<count($post_objects); $j++) {
            $objects[] = $post_objects[$j];
          }

          unset($tmpstring);

// Stop looking for the end of the string and move onto the next word.
          continue;
        }

// Otherwise, turn on the flag to indicate no quotes have been found attached to this word in the string.
        $flag = 'on';

// Move on to the next word
        $k++;

// Keep reading until the end of the string as long as the $flag is on

        while ( ($flag == 'on') && ($k < count($pieces)) ) {
          while (substr($pieces[$k], -1) == ')') {
            $post_objects[] = ')';
            if (strlen($pieces[$k]) > 1) {
              $pieces[$k] = substr($pieces[$k], 0, -1);
            } else {
              $pieces[$k] = '';
            }
          }

// If the word doesn't end in double quotes, append it to the $tmpstring.
          if (substr($pieces[$k], -1) != '"') {
// Tack this word onto the current string entity
            $tmpstring .= ' ' . $pieces[$k];

// Move on to the next word
            $k++;
            continue;
          } else {
/* If the $piece ends in double quotes, strip the double quotes, tack the
   $piece onto the tail of the string, push the $tmpstring onto the $haves,
   kill the $tmpstring, turn the $flag "off", and return.
*/
            $tmpstring .= ' ' . trim(preg_replace('/"/', ' ', $pieces[$k]));

// Push the $tmpstring onto the array of stuff to search for
            $objects[] = trim($tmpstring);

            for ($j=0; $j<count($post_objects); $j++) {
              $objects[] = $post_objects[$j];
            }

            unset($tmpstring);

// Turn off the flag to exit the loop
            $flag = 'off';
          }
        }
      }
    }

// add default logical operators if needed
    $temp = array();
    for($i=0; $i<(count($objects)-1); $i++) {
      $temp[sizeof($temp)] = $objects[$i];

      if ( ($objects[$i] != 'and') &&
           ($objects[$i] != 'or') &&
           ($objects[$i] != '(') &&
           ($objects[$i] != ')') &&
           ($objects[$i+1] != 'and') &&
           ($objects[$i+1] != 'or') &&
           ($objects[$i+1] != '(') &&
           ($objects[$i+1] != ')') ) {
        $temp[sizeof($temp)] = ADVANCED_SEARCH_DEFAULT_OPERATOR;
      }
    }
    $temp[sizeof($temp)] = $objects[$i];
    $objects = $temp;

    $keyword_count = 0;
    $operator_count = 0;
    for($i=0; $i<count($objects); $i++) {
      if ( ($objects[$i] == 'and') || ($objects[$i] == 'or') ) {
        $operator_count ++;
      } elseif ( ($objects[$i]) && ($objects[$i] != '(') && ($objects[$i] != ')') ) {
        $keyword_count ++;
      }
    }

    if ($operator_count < $keyword_count) {
      return true;
    } else {
      return false;
    }
  }

////
// Check date
  function tep_checkdate($date_to_check, $format_string, &$date_array) {
    $separator_idx = -1;

    $separators = array('-', ' ', '/', '.');
    $month_abbr = array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');
    $no_of_days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    $format_string = strtolower($format_string);

    if (strlen($date_to_check) != strlen($format_string)) {
      return false;
    }

    for ($i=0; $i<sizeof($separators); $i++) {
      $pos_separator = strpos($date_to_check, $separators[$i]);
      if ($pos_separator != false) {
        $date_separator_idx = $i;
        break;
      }
    }

    for ($i=0; $i<sizeof($separators); $i++) {
      $pos_separator = strpos($format_string, $separators[$i]);
      if ($pos_separator != false) {
        $format_separator_idx = $i;
        break;
      }
    }

    if ($date_separator_idx != $format_separator_idx) {
      return false;
    }

    if ($date_separator_idx != -1) {
      $format_string_array = explode( $separators[$date_separator_idx], $format_string );
      if (sizeof($format_string_array) != 3) {
        return false;
      }

      $date_to_check_array = explode( $separators[$date_separator_idx], $date_to_check );
      if (sizeof($date_to_check_array) != 3) {
        return false;
      }

      for ($i=0; $i<sizeof($format_string_array); $i++) {
        if ($format_string_array[$i] == 'mm' || $format_string_array[$i] == 'mmm') $month = $date_to_check_array[$i];
        if ($format_string_array[$i] == 'dd') $day = $date_to_check_array[$i];
        if ( ($format_string_array[$i] == 'yyyy') || ($format_string_array[$i] == 'aaaa') ) $year = $date_to_check_array[$i];
      }
    } else {
      if (strlen($format_string) == 8 || strlen($format_string) == 9) {
        $pos_month = strpos($format_string, 'mmm');
        if ($pos_month != false) {
          $month = substr( $date_to_check, $pos_month, 3 );
          for ($i=0; $i<sizeof($month_abbr); $i++) {
            if ($month == $month_abbr[$i]) {
              $month = $i;
              break;
            }
          }
        } else {
          $month = substr($date_to_check, strpos($format_string, 'mm'), 2);
        }
      } else {
        return false;
      }

      $day = substr($date_to_check, strpos($format_string, 'dd'), 2);
      $year = substr($date_to_check, strpos($format_string, 'yyyy'), 4);
    }

    if (strlen($year) != 4) {
      return false;
    }

    if (!settype($year, 'integer') || !settype($month, 'integer') || !settype($day, 'integer')) {
      return false;
    }

    if ($month > 12 || $month < 1) {
      return false;
    }

    if ($day < 1) {
      return false;
    }

    if (tep_is_leap_year($year)) {
      $no_of_days[1] = 29;
    }

    if ($day > $no_of_days[$month - 1]) {
      return false;
    }

    $date_array = array($year, $month, $day);

    return true;
  }

////
// Check if year is a leap year
  function tep_is_leap_year($year) {
    if ($year % 100 == 0) {
      if ($year % 400 == 0) return true;
    } else {
      if (($year % 4) == 0) return true;
    }

    return false;
  }

////
// Return table heading with sorting capabilities
  function tep_create_sort_heading($sortby, $colnum, $heading) {
    global $PHP_SELF;

    $sort_prefix = '';
    $sort_suffix = '';

    if ($sortby) {
      $sort_prefix = '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('page', 'info', 'x', 'y', 'sort')) . 'page=1&sort=' . $colnum . ($sortby == $colnum . 'a' ? 'd' : 'a'), 'NONSSL') . '" title="' . TEXT_SORT_PRODUCTS . ($sortby == $colnum . 'd' || substr($sortby, 0, 1) != $colnum ? TEXT_ASCENDINGLY : TEXT_DESCENDINGLY) . TEXT_BY . $heading . '">' ;
      $sort_suffix = (substr($sortby, 0, 1) == $colnum ? (substr($sortby, 1, 1) == 'a' ? '+' : '-') : '') . '</a>';
    }

    return $sort_prefix . $heading . $sort_suffix;
  }

////
// Recursively go through the categories and retreive all parent categories IDs
// TABLES: categories
  function tep_get_parent_categories(&$categories, $categories_id) {
    $parent_categories_query = tep_db_query("select parent_id from " . TABLE_CATEGORIES . " where categories_id = '" . $categories_id . "'");
    while ($parent_categories = tep_db_fetch_array($parent_categories_query)) {
      if ($parent_categories['parent_id'] == 0) return true;
      $categories[sizeof($categories)] = $parent_categories['parent_id'];
      if ($parent_categories['parent_id'] != $categories_id) {
        tep_get_parent_categories($categories, $parent_categories['parent_id']);
      }
    }
  }

////
// Construct a category path to the product
// TABLES: products_to_categories
  function tep_get_product_path($products_id) {
    $cPath = '';

    $cat_count_sql = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . $products_id . "'");
    $cat_count_data = tep_db_fetch_array($cat_count_sql);

    if ($cat_count_data['count'] == 1) {
      $categories = array();

      $cat_id_sql = tep_db_query("select categories_id from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . $products_id . "'");
      $cat_id_data = tep_db_fetch_array($cat_id_sql);
      tep_get_parent_categories($categories, $cat_id_data['categories_id']);

      for ($i=sizeof($categories)-1; $i>=0; $i--) {
        if ($cPath != '') $cPath .= '_';
        $cPath .= $categories[$i];
      }
      if ($cPath != '') $cPath .= '_';
      $cPath .= $cat_id_data['categories_id'];
    }

    return $cPath;
  }

////
// Return a product ID with attributes
  function tep_get_uprid($prid, $params) {
    $uprid = $prid;
    if ( (is_array($params)) && (!strstr($prid, '{')) ) {
      while (list($option, $value) = each($params)) {
        $uprid = $uprid . '{' . $option . '}' . $value;
      }
    }

    return $uprid;
  }

////
// Return a product ID from a product ID with attributes
  function tep_get_prid($uprid) {
    $pieces = explode('[{]', $uprid, 2);

    return $pieces[0];
  }

////
// Return a customer greeting
  function tep_customer_greeting() {
    global $HTTP_COOKIE_VARS, $customer_id, $customer_first_name;

    if ($HTTP_COOKIE_VARS['first_name']) {
      $first_name = stripslashes($HTTP_COOKIE_VARS['first_name']);
    } elseif ($customer_first_name) {
      $first_name = $customer_first_name;
    }

    if ($first_name) {
      $greeting_string = sprintf(TEXT_GREETING_PERSONAL, $first_name, tep_href_link(FILENAME_PRODUCTS_NEW, '', 'NONSSL'));
      if (!$customer_id) {
        $greeting_string .= '<br>' . sprintf(TEXT_GREETING_PERSONAL_RELOGON, $first_name, tep_href_link(FILENAME_LOGIN, '', 'SSL'));
      }
    } else {
      $greeting_string = sprintf(TEXT_GREETING_GUEST, tep_href_link(FILENAME_LOGIN, '', 'SSL'), tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'));
    }

    return $greeting_string;
  }
  function avg_count_fct($nb, $count)
  {
	if($count==0)	
		$jsrate=0;
	else
		$jsrate=round($nb/$count,1);
		
	$jsrate*=10;
	return array('avg'=>$jsrate,'count'=>$count);
  }
////
//! Send email (text/html) using MIME
// This is the central mail function. The SMTP Server should be configured
// correct in php.ini
// Parameters:
// $to_name           The name of the recipient, e.g. "Jan Wildeboer"
// $to_email_address  The eMail address of the recipient,
//                    e.g. jan.wildeboer@gmx.de
// $email_subject     The subject of the eMail
// $email_text        The text of the eMail, may contain HTML entities
// $from_email_name   The name of the sender, e.g. Shop Administration
// $from_email_adress The eMail address of the sender,
//                    e.g. info@mytepshop.com
	
  function tep_mail($to_name, $to_email_address, $email_subject, $email_text, $from_email_name, $from_email_address) {
    #if (SEND_EMAILS != 'true') return false;
		
		$recipient = $to_email_address;
		$mail = new PHPmailer();
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->Host='email-smtp.eu-west-1.amazonaws.com';
		#$mail->Port= 465;
		#$mail->CharSet = 'us-ascii';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls"; 
    $mail->Username = "AKIAICQS7KIVA5N62SKQ";
    $mail->Password = "Au/ZyAC8yBAZGGSPdGDNEz00v2biQZPjUnxpd+qLl3Xn";
    
		$mail->SetFrom('dvdpost@dvdpost.be', 'DVDPost');
		//$mail->Host='mail.dvdpost.local';
		//die($from_email_address.';'.$email_text);
		$mail->AddAddress($recipient);
		#$mail->AddReplyTo($from_email_address);	
		$mail->Subject= $email_subject;
		$mail->Body=$email_text;
		if(!$mail->Send()){ //Teste si le return code est ok.
		  echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
		}else
		{
			//echo 'ok';
		}
		$mail->SmtpClose();
		unset($mail);
  }
  function tep_mail_plush($to_name, $to_email_address, $email_subject, $email_text, $from_email_name, $from_email_address) {
    #if (SEND_EMAILS != 'true') return false;
		
		$recipient = $to_email_address;
		$mail = new PHPmailer();
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->Host='email-smtp.eu-west-1.amazonaws.com';
		#$mail->Port= 465;
		#$mail->CharSet = 'UTF-8';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls"; 
    $mail->Username = "AKIAICQS7KIVA5N62SKQ";
    $mail->Password = "Au/ZyAC8yBAZGGSPdGDNEz00v2biQZPjUnxpd+qLl3Xn";
    
		$mail->SetFrom('info@plush.be', 'Plush');
		$mail->AddAddress($recipient);
		#$mail->AddReplyTo('info@plush.be');	
		$mail->Subject= $email_subject;
		$mail->Body=$email_text;
		if(!$mail->Send()){ //Teste si le return code est ok.
		  echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
		}else
		{
			//echo 'ok';
		}
		$mail->SmtpClose();
		unset($mail);
  }
////
// Check if product has attributes
  function tep_has_product_attributes($products_id) {
    $attributes_query = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_ATTRIBUTES . " where products_id = '" . $products_id . "'");
    $attributes = tep_db_fetch_array($attributes_query);

    if ($attributes['count'] > 0) {
      return true;
    } else {
      return false;
    }
  }

////
// Get the number of times a word/character is present in a string
  function tep_word_count($string, $needle) {
    $temp_array = explode($needle, $string);
    return sizeof($temp_array);
  }

  function tep_count_modules($modules = '') {
    if (!$modules) return '0';

    $modules_array = explode(';', $modules);

    return sizeof($modules_array);
  }

  function tep_count_payment_modules() {
    return tep_count_modules(MODULE_PAYMENT_INSTALLED);
  }

  function tep_count_shipping_modules() {
    return tep_count_modules(MODULE_SHIPPING_INSTALLED);
  }

  function tep_create_random_value($length, $type = 'mixed') {
    if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) return false;

    $rand_value = '';
    mt_srand((double) microtime() * 1000000);
    while (strlen($rand_value)<$length) {
      if ($type == 'digits') {
        $char = mt_rand(0,9);
      } else {
        $char = chr(mt_rand(0,255));
      }
      if ($type == 'mixed') {
        if (preg_match('/^[a-z0-9]$/i', $char)) $rand_value .= $char;
      } elseif ($type == 'chars') {
        if (preg_match('/^[a-z]$/i', $char)) $rand_value .= $char;
      } elseif ($type == 'digits') {
        if (preg_match('/^[0-9]$/i', $char)) $rand_value .= $char;
      }
    }

    return $rand_value;
  }
  function tep_create_password( $length = 5) {

		if(empty($length)) $length = 5;



		$chaine = ""; 



		$list = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$list=strtolower($list);
		mt_srand((double)microtime()*1000000);

		$newstring="";



		while( strlen( $newstring )< $length ) {

			$newstring .= $list[mt_rand(0, strlen($list)-1)];

		}

		return $newstring;

	}

  function tep_output_warning($warning) {
    new errorBox(array(array('text' => tep_image(DIR_WS_ICONS . 'warning.gif', ICON_WARNING) . ' ' . $warning)));
  }

  function tep_array_to_string($array, $exclude = '', $equals = '=', $separator = '&') {
    if ($exclude == '') $exclude = array();

    $get_string = '';
    if (sizeof($array) > 0) {
      while (list($key, $value) = each($array)) {
        if ( (!in_array($key, $exclude)) && ($key != 'x') && ($key != 'y') ) {
          $get_string .= $key . $equals . $value . $separator;
        }
      }
      $remove_chars = strlen($separator);
      $get_string = substr($get_string, 0, -$remove_chars);
    }

    return $get_string;
  }

  function tep_not_null($value) {
    if (is_array($value)) {
      if (sizeof($value) > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      if (($value != '') && ($value != 'NULL') && (strlen(trim($value)) > 0)) {
        return true;
      } else {
        return false;
      }
    }
  }

////
// Output the tax percentage with optional padded decimals
  function tep_display_tax_value($value, $padding = TAX_DECIMAL_PLACES) {
    if (strpos($value, '.')) {
      $loop = true;
      while ($loop) {
        if (substr($value, -1) == '0') {
          $value = substr($value, 0, -1);
        } else {
          $loop = false;
          if (substr($value, -1) == '.') {
            $value = substr($value, 0, -1);
          }
        }
      }
    }

    if ($padding > 0) {
      if ($decimal_pos = strpos($value, '.')) {
        $decimals = strlen(substr($value, ($decimal_pos+1)));
        for ($i=$decimals; $i<$padding; $i++) {
          $value .= '0';
        }
      } else {
        $value .= '.';
        for ($i=0; $i<$padding; $i++) {
          $value .= '0';
        }
      }
    }

    return $value;
  }

////
// Checks to see if the currency code exists as a currency
// TABLES: currencies
  function tep_currency_exists($code) {
    $currency_code = tep_db_query("select currencies_id from " . TABLE_CURRENCIES . " where code = '" . $code . "'");
    if (tep_db_num_rows($currency_code)) {
      return $code;
    } else {
      return false;
    }
  }

  function tep_string_to_int($string) {
    return (int)$string;
  }
  function mail_verify($email){
	$regex='/^[a-zA-Z0-9][a-zA-Z0-9_-]*([.][a-zA-Z0-9_-]*)*[a-zA-Z0-9_-][@][a-zA-Z0-9][a-zA-Z0-9_-]*([.][a-zA-Z0-9_-]*)*[a-zA-Z0-9][.][a-zA-Z]{2,4}$/i';
	// test de l'adresse e-mail
	if (preg_match($regex, $email)) 
		return true;
	else
	{
		$data='<br /><br />email<br />';

		$data.='host -> '.$_SERVER['HTTP_HOST'].'<br />';
		$data.='user agent -> '.$_SERVER['HTTP_USER_AGENT'].'<br />';
		$data.='current page -> '.$_SERVER['SCRIPT_FILENAME'].'<br />';
		$data.='referer -> '.$_SERVER['HTTP_REFERER'].'<br />';
		$data.='query string -> '.$_SERVER['QUERY_STRING'].'<br />';
		if(!empty($_COOKIE['customers_id']))
			$data.=$_COOKIE['customers_id'].'<br />';
		//tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','email error prod','<font color="#000000">'.$email.'<br />'.$data.'</font>','bugreport@dvdpost.be','bugreport@dvdpost.be');
		return false;
	}
  }
function tep_rating($products_id, $imdb_id,$rate,$customer_id){
	tep_db_query("insert into products_rating (products_id , products_rating, products_rating_date , customers_id,  rating_type, imdb_id) values ('" . $products_id . "', '" . $rate . "', now(), '" . $customer_id . "' , 'DVD_NORM',".$imdb_id.") ");
	
	if($imdb_id>0)
		tep_db_query('update products set rating_users=rating_users+'.$rate.', rating_count=rating_count+1 where imdb_id = '.$imdb_id);
	else	
		tep_db_query('update products set rating_users=rating_users+'.$rate.', rating_count=rating_count+1 where products_id = '.$products_id);
}
function tep_rating_filter($products_id, $imdb_id,$rate,$language,$customer_id,$type){
	tep_db_query("insert into products_rating (products_id , products_rating, products_rating_date , customers_id,  rating_type, imdb_id) values ('" . $products_id . "', '" . $rate . "', now(), '" . $customer_id . "' , '".$type."' ,".$imdb_id.") ");
	if($imdb_id>0)
		tep_db_query('update products set rating_users=rating_users+'.$rate.', rating_count=rating_count+1 where imdb_id = '.$imdb_id);
	else	
		tep_db_query('update products set rating_users=rating_users+'.$rate.', rating_count=rating_count+1 where products_id = '.$products_id);
	
	$request =  'http://partners.thefilter.com/DVDPostService';
	$format = 'CaptureService.ashx';   // this can be xml, json, html, or php
	$args .= 'cmd=AddEvidence';
	$args .= '&catalogId='.$products_id;
	$args .= '&eventType=Rating';
	$args .= '&userId='.$customer_id;
	$args .= '&userLanguage='.$language;
	$args .= '&rating='.$rate;
	$args .= '&clientIp='.$_SERVER['REMOTE_ADDR'];
	

    // Get and config the curl session object
    $session = curl_init($request.'/'.$format.'?'.$args);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	    //execute the request and close
    $response = curl_exec($session);
    curl_close($session);
	
}
function tep_rating_review($products_id, $imdb_id,$rate,$name,$review,$languages_id,$customer_id){
	tep_db_query("insert into " . TABLE_REVIEWS . " (products_id, customers_id, customers_name, reviews_rating , languages_id, reviews_text, date_added) values ('" . $products_id . "', '" . $customer_id . "', '" .  $name . "', '" . $rate . "', '" . $languages_id . "', '" . $review . "', now())");	

	if($imdb_id>0)
		tep_db_query('update products set rating_users=rating_users+'.$rate.', rating_count=rating_count+1 where imdb_id = '.$imdb_id);
	else	
		tep_db_query('update products set rating_users=rating_users+'.$rate.', rating_count=rating_count+1 where products_id = '.$products_id);
	switch($languages_id){
		case 1:
			$lang='FR';
		break;
		case 2:
			$lang='NL';
		break;
		case 3:
			$lang='EN';
		break;
	}
	$request =  'http://partners.thefilter.com/DVDPostService';
	$format = 'CaptureService.ashx';   // this can be xml, json, html, or php
	$args .= 'cmd=AddEvidence';
	$args .= '&catalogId='.$products_id;
	$args .= '&eventType=Rating';
	$args .= '&userId='.$customer_id;
	$args .= '&userLanguage='.$lang;
	$args .= '&rating='.$rate;
	$args .= '&clientIp='.$_SERVER['REMOTE_ADDR'];
	

    // Get and config the curl session object
    $session = curl_init($request.'/'.$format.'?'.$args);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	    //execute the request and close
    $response = curl_exec($session);
    curl_close($session);
	
}

function tep_check_portable($phone)
{
	$phone = preg_replace("/^\+/i","",$phone);
	$phone = preg_replace("/^(32|0032|032|0)/i","",$phone);
	$phone = preg_replace("/([^0-9])/i","",$phone);
	$prefix=substr($phone,0,2);
	$error=false;
	if($prefix!='47' && $prefix!='48' && $prefix!='49')
		$error=true;
	if(strlen($phone)<9)
		$error=true;
	return $error;
}
function tep_fix_portable($phone)
{
	$phone = preg_replace("/^\+/i","",$phone);
	$phone = preg_replace("/^(32|0032|032|0)/i","",$phone);
	$phone = preg_replace("/([^0-9])/i","",$phone);
	$phone = '32'.$phone;
	return $phone;
}
function tep_send_portable($phone)
{
	$sql='select * from registration_sms_status where phone="'.$phone.'" order by id desc;';
	#echo $sql;
	$query=tep_db_query($sql);
	$value=tep_db_fetch_array($query);

	if(strtolower($value['status'])=='handset')
	{
		return array('customer'=>$value['customers_id'],'status'=>'SEND');
	}
	
	else if(!empty($value['status']))
	{
		return array('customer'=>$value['customers_id'],'status'=>'WAIT');
	}
	else
	{
		return array('customer'=>0,'status'=>'EMPTY');
	}
}
function tep_inused_portable($customer,$code)
{
	$sql='select * from registration_sms_status where customers_id = '.$customer.' and code="'.$code.'" order by id desc;';
	$query=tep_db_query($sql);
	$value=tep_db_fetch_array($query);
	if($value['used_date'] !='0000-00-00' && $value['used_date'] != NULL)
	{
		return 'USED';
	}
	else if($value['code']==$code)
	{
		return 'GOOD';
	}
	else if($value['code']!=$code)
	{
		return 'WRONG';
	}
	else
	{
		return 'EMPTY';
	}
}
function tep_ab_testing_verif($data,$type_var=1,$page='step1')
{
	global $ab;
	if(empty($data) || ($data<0 || $data>$ab[$page][$type_var]))
	{
		$data=1;

	}
	return $data;
}
function tep_ab_testing_link($url,$page='step1')
{
	global $ab;
	if(strpos($url,'?')===false)
		$delimiter='?';
	else
		$delimiter='&';
	for($i=0;$i<count($ab[$page]);$i++)
	{
		$url.=$delimiter.'arg'.$i.'='.rand(1,$ab[$page][$i]);
		$delimiter='&';
	}
	return $url;
}
function luhn_check($number) {
 
  // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
  $number=preg_replace('/\D/', '', $number);
 
  // Set the string length and parity
  $number_length=strlen($number);
  $parity=$number_length % 2;
 
  // Loop through each digit and do the maths
  $total=0;
  for ($i=0; $i<$number_length; $i++) {
    $digit=$number[$i];
    // Multiply alternate digits by two
    if ($i % 2 == $parity) {
      $digit*=2;
      // If the sum is two digits, add them together (in effect)
      if ($digit > 9) {
        $digit-=9;
      }
    }
    // Total up the digits
    $total+=$digit;
  }
 
  // If the total mod 10 equals 0, the number is valid
  return ($total % 10 == 0) ? TRUE : FALSE;
 
}
function shipping($country,$nbrtotdvd)
{
	switch ($country){
	case '21' :	
		if($nbrtotdvd==0){
			$price=0;
		}else if($nbrtotdvd<=2){
			$price=2.80;
		}else if($nbrtotdvd<=12){
			$price=6.7;
		}
		else if($nbrtotdvd<=24){
			$price=12.4;
		}	
		else if($nbrtotdvd<=37){
			$price=19.1;
		}
		else
		{
			$price=0.51*$nbrtotdvd;
		}	
					
							
	break;
	case '124' :
		switch ($nbrtotdvd){
				case 1:
				case 2:
					$price=5.20;
					break;
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
					$price=9.30;
					break;
				default:
					$price=(ceil($nbrtotdvd/12))*18.5;																	
				break;								
			}
	break;
	case '150' :
		switch ($nbrtotdvd){
				case 1:
				case 2:
					$price=5.20;
					break;
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
					$price=9.30;
					break;
				default:
					$price=(ceil($nbrtotdvd/12))*18.5;																	
				break;								
			}
	break;
	}
	return $price;
}
function create_code_droselia()
{
	$intflag_activation_code_unique=0;
	while($intflag_activation_code_unique<1){	
		$droselia_codes = 'VOD' . rand(11111,99999)	;
		$actcode_unique_query = tep_db_query("select count(*) as cpt from droselia_codes where droselia_codes = '" . $droselia_codes . "' ");
		$actcode_unique = tep_db_fetch_array($actcode_unique_query);
		if ($actcode_unique['cpt'] == 0)	
			$intflag_activation_code_unique = 1;
	}
	return $droselia_codes;
}
function registration_activation($activation_code,$customers_id,$products_id,$site,$languages_id,$method_payment='OGONE',$mail_message=645,$type_payment=1)
{
	$sql="select a.*,ac.droselia from activation_code a left join activation_campaign ac on a.campaign_id = ac.id where a.activation_id= " . $activation_code;
	$code_query = tep_db_query($sql,'db_link',true);
	$code = tep_db_fetch_array($code_query);
	$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $products_id);
	$products_abo = tep_db_fetch_array($products_abo_query);
	
	$customers_query = tep_db_query("select * from customers where customers_id = '" . $customers_id . "' ",'db_link',true);
	$customers = tep_db_fetch_array($customers_query);
	$first_time = tep_db_query("select * from abo where customerid = '" . $customers_id . "' ",'db_link',true);
	$first_time_value = tep_db_fetch_array($first_time);
	if($languages_id==1)
	{
	  $locale_id = 2;
	}
	elseif($languages_id==2)
	{
	  $locale_id = 3;
	}
	else
	{
	  $locale_id = 1;
	}
	
	$dom = "select * from `i18n_db_translations` where tr_key = 'info'  and namespace = 'info.conditions' and locale_id = ".$locale_id;
  $dom_query = tep_db_query($dom);
  $dom_values = tep_db_fetch_array($dom_query);
  $conditions = $dom_values['text'];
  
	if ($code['next_abo_type'] > 0)
	{
		$next = $code['next_abo_type'];
	}
	else
	{
		$next = $products_id;
	}
	if ($first_time_value['abo_id']>0){
	}else{	
			
	}
	
	tep_db_query("insert into abo (Customerid, Action , code_id, Date , product_id, payment_method, site) values ('" . $customers_id . "', 8, '" . $activation_code . "' ,now(), '" . $products_id . "' , '".$method_payment."', '" . $site. "') "); 
	
	tep_db_query("update products set products_quantity  = products_quantity - 1 , products_ordered  = products_ordered + 1 where products_id = '" . $products_id . "' "); 
	
	tep_db_query("update customers set customers_abo  = 1 , customers_registration_step=100 , customers_abo_payment_method  = ".$type_payment." , customers_abo_dvd_norm  =". $products_abo['qty_at_home']." , customers_abo_start_rentthismonth  =0 , customers_abo_type  = '" . $products_id . "',  customers_next_abo_type = '" . $next . "',customers_next_discount_code  =". $code['next_discount']." , customers_abo_auto_stop_next_reconduction =".$code['abo_auto_stop_next_reconduction']." where customers_id = '" . $customers_id . "'");
	if(!isset($code['abo_auto_stop_next_reconduction']))
	{
		$data='<br /><br />registration<br />';

		$data.='host -> '.$_SERVER['HTTP_HOST'].'<br />';
		$data.='user agent -> '.$_SERVER['HTTP_USER_AGENT'].'<br />';
		$data.='current page -> '.$_SERVER['SCRIPT_FILENAME'].'<br />';
		$data.='current page -> '.$_SERVER['REQUEST_URI'].'<br />';
		$data.='current page -> '.$_SERVER['REDIRECT_URL'].'<br />';

		$data.='referer -> '.$_SERVER['HTTP_REFERER'].'<br />';
		$data.='query string -> '.$_SERVER['QUERY_STRING'].'<br />';
		$data.='language -> '.$language.'.'.$languages_id.'.'.$_COOKIE['language_id'].'.'.$_SESSION['languages_id'].'.'.$_SESSION['language'].'<br />';
		$data.=$activation_code.'.'.$customers_id.'.'.$products_id.'.'.$site.'.'.$languages_id.'.'.$method_payment.'.'.$mail_message.'.'.$type_payment;
		$data.='sql -> '.$sql.'<br />';
		$data.=$code['abo_auto_stop_next_reconduction'];
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','regisration -> ',$data,'bugreport@dvdpost.be','bugreport@dvdpost.be');
	}
	if ($code['abo_dvd_credit'] > 0)
	{
		
		credit_history($customers_id  , $customers['customers_abo_dvd_credit'],$code['abo_dvd_credit'],4);
		
		tep_db_query("update customers set customers_abo_dvd_credit  = customers_abo_dvd_credit + ". $code['abo_dvd_credit']." where customers_id = " . $customers_id . ";");
	}
	else
	{
		credit_history($customers_id  , $customers['customers_abo_dvd_credit'],$products_abo['qty_credit'],4);
		
		tep_db_query("update customers set customers_abo_dvd_credit  = customers_abo_dvd_credit + ". $products_abo['qty_credit']." where customers_id = " . $customers_id .";");

	}
	//add credits droselia
	if($code['droselia']>0)
	{
		for($i=0;$i<$code['droselia'];$i++)
		{
			$droselia_codes =create_code_droselia();
			tep_db_query("insert into droselia_codes (droselia_codes, customers_id, buy_date , catalog_id) values ( '" . $droselia_codes . "','" . $customers_id . "',now() , 0 )");
		}
	}
			
	 tep_db_query("insert into abo (Customerid, Action ,  Date , product_id, payment_method, site) values ('" . $customers_id . "', 17, now(), '" . $products_id. "' , '".$method_payment."', '" . $site. "') "); 
	switch ($code['activation_group']){
	    case 39: //spector
			tep_db_query("update customers set customers_abo_payment_method  = 9 where customers_id = '" . $customers_id . "'");
		break;
	    case 48: //pizza hut
			tep_db_query("update customers set customers_abo_payment_method  = 10 where customers_id = '" . $customers_id . "'");
	    break;
	    case 72: //exell mailing lcd
			tep_db_query("update customers set customers_abo_payment_method  = 11 where customers_id = '" . $customers_id . "'");
	    break;
	    case 77: //the phone house
			tep_db_query("update customers set customers_abo_payment_method  = 12 where customers_id = '" . $customers_id . "'");
	    break;
	    case 78: //just for you
			tep_db_query("update customers set customers_abo_payment_method  = 13 where customers_id = '" . $customers_id . "'");
		break;
	    case 84: //essent
			tep_db_query("update customers set customers_abo_payment_method  = 15 , customers_abo_auto_stop_next_reconduction = '1' where customers_id = '" . $customers_id . "'");
		break;
	    case 85: //Metro
			tep_db_query("update customers set customers_abo_payment_method  = 16 , customers_abo_auto_stop_next_reconduction = '1' where customers_id = '" . $customers_id . "'");
		break;
	    case 89: //Carrefour
			tep_db_query("update customers set customers_abo_payment_method  = 18 , customers_abo_auto_stop_next_reconduction =  '1'  where customers_id = '" . $customers_id . "'");
		break;
		case 93: //TVV 10 DVD
			tep_db_query("update customers set customers_abo_auto_stop_next_reconduction = 1  where customers_id = '" . $customers_id . "'");
		break;
		case 94: //TVV 15 DVD
			tep_db_query("update customers set customers_abo_auto_stop_next_reconduction = 1  where customers_id = '" . $customers_id . "'");
		break;
	}
		
	switch ($code['validity_type']){
	    case 1: //day
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $code['validity_value'] . "' DAY)  where customers_id = '" . $customers_id . "'");
	    break;
	    case 2: //month
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $code['validity_value'] . "' MONTH)  where customers_id = '" . $customers_id . "'");
	    break;
	    case 3: //year
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $code['validity_value'] . "' YEAR)  where customers_id = '" . $customers_id . "'");
	    break;
	}
	tep_db_query("update customers set customers_abo_rank  = 10 where customers_id = '" . $customers_id . "'");
	
	tep_db_query("update activation_code set activation_date  = now() , customers_id = '" . $customers_id . "' where activation_id  = '" . $code['activation_id'] . "' ");
	
	/*switch ($code['activation_group']){
	    case 39: //spector
			$email_text = TEXT_MAIL_SPECTOR;
			$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
			$email_text = str_replace('µµµcustomers_nameµµµ', $customers['customers_firstname'] . ' ' . $customers['customers_lastname'] , $email_text);
			$email_text = str_replace('µµµabo_typeµµµ',  $product_info_values['products_name'] , $email_text);
			$email_text = str_replace('µµµloginµµµ',  $customers['customers_email_address'] , $email_text);
			$email_text = str_replace('µµµcustomers_addressµµµ',  $customers_addr['entry_street_address'] . ' ' . $customers_addr['entry_postcode'] . ' ' . $customers_addr['entry_city'], $email_text);
			
		  	tep_mail($customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $customers['customers_email_address'], TEXT_MAIL_SUBJECT_SPECTOR, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
	    break;
	}*/
	
	//action parrainage
	require('includes/classes/activation_code_actions.php');
	$action=new Activation_code_actions();
	$data2 = $action->execute($customers_id,$activation_code);
	$error=$data2['error'];
	$status=$data2['status'];
	if ($error == 7)
		parrainage_classic($customers_id);
	$sql_p = "select p.products_id, p.products_model, p.products_quantity, p.products_image, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p where p.products_id = " . $products_id;
	$product_info = tep_db_query($sql_p,'db_link',true);
  	$product_info_values = tep_db_fetch_array($product_info);
	$promotion = promotion($products_id, $next, 'A', $activation_code);
	$data= array();
	$type_gender = (strtoupper($customers['customers_gender']) == 'f' ? 'female_gender' : 'male_gender');
	$gender_sql = "select * from  dvdpost_common.translation2 where translation_key = '".$type_gender."' and language_id = ".$languages_id;
	$gender_query = tep_db_query($gender_sql);
	$gender_value = tep_db_fetch_array($gender_query);
	$promotion2 = promotion($products_id, $next, 'A', $activation_code, 2,$languages_id);
	
	$data['gender_simple'] = $gender_value['translation_value'];
	$data['customers_name'] = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
	$data['email'] = $customers['customers_email_address'];
	$data['promotion'] = $promotion2;
	
  $data['abo_price'] = $product_info_values['products_price'];
  $data['general_conditions'] = $conditions;
  $data['subscription'] = $product_info_values['products_model'];
 
	mail_message($customers_id, $mail_message, $data);
	
}

function registration_discount($discount_code_id,$customers_id,$products_id,$site,$languages_id,$belgiqueloisirs_id ,$method_payment='OGONE',$mail_message=645,$type_payment=1,$reference_id='')
{
  #echo 'ici1';
  
	$sql="SELECT * FROM discount_code WHERE discount_code_id ='".$discount_code_id. "'";
	$discount_query = tep_db_query($sql);
	$discount_values = tep_db_fetch_array($discount_query);
	$next_abo_type = $discount_values['next_abo_type'];
	
	
	if(!$next_abo_type >0 )
	{
		$next_abo_type = $products_id;
	}
	
	$products_abo_query = tep_db_query("SELECT * from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$products_id. "'",'db_link',true);
	$products_abo = tep_db_fetch_array($products_abo_query);
	
	$customers_query = tep_db_query("select * from customers where customers_id = '" . $customers_id . "' ",'db_link',true);
	$customers = tep_db_fetch_array($customers_query);
	if($languages_id==1)
	{
	  $locale_id = 2;
	}
	elseif($languages_id==2)
	{
	  $locale_id = 3;
	}
	else
	{
	  $locale_id = 1;
	}
	$dom = "select * from `i18n_db_translations` where tr_key = 'info'  and namespace = 'info.conditions' and locale_id = ".$locale_id;
  $dom_query = tep_db_query($dom);
  $dom_values = tep_db_fetch_array($dom_query);
  $conditions = $dom_values['text'];
	$first_time = tep_db_query("select * from abo where customerid = '" . $customers_id . "' ",'db_link',true);
	$first_time_value = tep_db_fetch_array($first_time);	
	if ($first_time_value['abo_id']>0){
	}else{	
		
	}
	//action parraingage
	require('includes/classes/activation_code_actions.php');
	$action=new Activation_code_actions();
	$data2 = $action->execute($customers_id,0);
	$error=$data2['error'];
	$status=$data2['status'];
	if ($error == 7)
		parrainage_classic($customers_id);
	
	
	#echo 'ici2';
	if ($discount_code_id< 1){
		//norm
		tep_db_query("insert into abo (Customerid, Action , Date , product_id, payment_method, site) values ('" . $customers_id . "', 1 ,now(), '" . $products_id. "' , '".$method_payment."', '" . $site. "') "); 
		$abo_id=tep_db_insert_id();
		tep_db_query("update customers set customers_abo_validityto = DATE_ADD(now(), INTERVAL 1 MONTH), customers_abo_auto_stop_next_reconduction = 0 , customers_next_discount_code = 0  where customers_id = '" . $customers_id . "'");		
	}else{
		//discount
		$code_query_disc = tep_db_query("select * from discount_code where discount_code_id  = '" . $discount_code_id. "' ");
		$code_disc = tep_db_fetch_array($code_query_disc);
		if($code_disc['droselia']>0)
		{
			for($i=0;$i<$code_disc['droselia'];$i++)
			{
				$droselia_codes =create_code_droselia();
				tep_db_query("insert into droselia_codes (droselia_codes, customers_id, buy_date , catalog_id) values ( '" . $droselia_codes . "','" . $customers_id . "',now() , 0 )");
			}
		}
		tep_db_query("insert into abo (Customerid, Action , code_id, Date , product_id, payment_method, site) values ('" . $customers_id . "', 6, '" . $discount_code_id . "' ,now(), '" . $products_id. "' , '".$method_payment."', '" . $site. "') "); 
		$abo_id=tep_db_insert_id();
		tep_db_query("insert into discount_use  (discount_code_id , discount_use_date , customers_id) values ('" . $discount_code_id . "', now(), '" . $customers_id . "' )");
		tep_db_query("update discount_code set discount_limit = discount_limit  -1 where  discount_code_id  = '" . $discount_code_id . "' ");
		tep_db_query("update customers set activation_discount_code_id=".$discount_code_id.",customers_abo_validityto  = DATE_ADD(now(), INTERVAL 1 MONTH), customers_abo_auto_stop_next_reconduction =".$code_disc['abo_auto_stop_next_reconduction']." , customers_next_discount_code  =". $code_disc['next_discount']."   where customers_id = '" . $customers_id . "'");
	
	
		switch ($code_disc['discount_abo_validityto_type']){
			case 1:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $code_disc['discount_abo_validityto_value'] . " DAY)  where customers_id = '" . $customers_id . "'");		
			break;
			case 2:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $code_disc['discount_abo_validityto_value'] . " MONTH)  where customers_id = '" . $customers_id . "'");		
			break;
			case 3:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $code_disc['discount_abo_validityto_value'] . " YEAR)  where customers_id = '" . $customers_id . "'");		
			break;		
		}
		//recurring discount
		if ($code_disc['discount_recurring_nbr_of_month'] > 0 ){
			tep_db_query("update customers set customers_abo_discount_recurring_to_date  = DATE_ADD(now(), INTERVAL " . $code_disc['discount_recurring_nbr_of_month'] . " MONTH)  where customers_id = '" . $customers_id . "'");		
			tep_db_query("update customers set customers_abo_discount_recurring_to_date  = DATE_ADD(customers_abo_discount_recurring_to_date , INTERVAL 1 DAY)  where customers_id = '" . $customers_id . "'");		
		}
	}
	
	tep_db_query("update products set products_quantity  = products_quantity - 1, products_ordered  = products_ordered + 1 where products_id = '" . $products_id. "' ");
		
	tep_db_query("update customers set customers_abo  = 1 , customers_registration_step=100 , customers_abo_payment_method  = ".$type_payment." , customers_abo_rank  = 10 , customers_abo_type  = '" . $products_id. "',  customers_next_abo_type = '" . $next_abo_type. "' , customers_abo_start_rentthismonth  =0 where customers_id = '" . $customers_id . "'");
	
	//RALPH-001 START
	//ogone payment
	$price=$products_abo['products_price'];
	
	$final_price=abo_price($code_disc['discount_type'],$discount_code_id,$code_disc['discount_value'],$price);
	if($final_price>0)
	{
		$credit_history_type=5;
	}
	else
	{
		$credit_history_type=4;
	}
	if ($code_disc['abo_dvd_credit'] > 0 )
	{
		
		credit_history($customers_id  , $customers['customers_abo_dvd_credit'],$code_disc['abo_dvd_credit'],$credit_history_type);
		if($code_disc['abo_dvd_remain']>0)
		{
			$sql = "update customers set customers_abo_dvd_credit  = ". $code_disc['abo_dvd_credit']." ,customers_abo_dvd_remain = ".$code_disc['abo_dvd_remain'].", customers_abo_dvd_norm  =". $products_abo['qty_at_home'].", customers_abo_dvd_adult=0 where customers_id = '" . $customers_id . "'";
			tep_db_query($sql);
			
		}
		else 
		{
			$sql="update customers set customers_abo_dvd_credit  = customers_abo_dvd_credit + ". $code_disc['abo_dvd_credit']." , customers_abo_dvd_norm  =". $products_abo['qty_at_home']." where customers_id = '" . $customers_id . "'";
			tep_db_query($sql);
		}
	}
	else
	{

		credit_history($customers_id  , $customers['customers_abo_dvd_credit'],$products_abo['qty_credit'],$credit_history_type);

		if($products_abo['qty_dvd_max']>0)
		{
			$sql="update customers set customers_abo_dvd_credit  = ". $products_abo['qty_credit']." , customers_abo_dvd_remain = ".$products_abo['qty_dvd_max'].",customers_abo_dvd_norm  =". $products_abo['qty_at_home']." where customers_id = '" . $customers_id . "'";
			tep_db_query($sql);
		}
		else
		{
			$sql= "update customers set customers_abo_dvd_credit  = customers_abo_dvd_credit + ". $products_abo['qty_credit']." , customers_abo_dvd_norm  =". $products_abo['qty_at_home']." where customers_id = '" . $customers_id . "'";
			tep_db_query($sql);
		}
  }
	
	if($final_price>0)
	{
    
	  if($type_payment == 4)
	  {
	    $nvpstr="&AMT=$final_price&CURRENCYCODE=EUR&PAYMENTACTION=SALE&REFERENCEID=$reference_id";
      /* Make the API call to PayPal, using API signature.
         The API response is stored in an associative array called $resArray */
      $resArray=hash_call("DoReferenceTransaction",$nvpstr);

      /* Display the API response back to the browser.
         If the response from PayPal was a success, display the response parameters'
         If the response was an error, display the errors received using APIError.php.
         */

      $ack = strtoupper($resArray["ACK"]);
      if($ack!="SUCCESS")  {
          $_SESSION['reshash']=$resArray;
          $payment_id = 1;
          $data = serialize($resArray).' customersid => '.$customers_id.' data => '.$nvpstr;
          tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'payment error discount', $data, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
      	  /*$location = "../APIError.php";
      		header("Location: $location");*/
      }
      else
      {
        $payment_id = 2;
      }
      
      
      
	  }
	  else
	  {
	    $payment_id = 2;
	  }
		$sql_insert_ogone="insert into payment (date_added,payment_method, abo_id,customers_id,amount,payment_status,last_modified) values(now(),$type_payment,$abo_id,$customers_id,$final_price,$payment_id,now());";
		tep_db_query($sql_insert_ogone);
		$id = tep_db_insert_id();
		if($type_payment == 4){
		  $sql_paypal_hist = "insert into paypal_payments_history (payment_id, pp_request, pp_response, created_date, message, customer_id) values (".$id.", '".$nvpstr."' , '".serialize($resArray)."', NOW(),'".$resArray["ACK"]."', ".$customers_id.")";
		  tep_db_query($sql_paypal_hist);
	  }
		
		tep_db_query("insert into abo (Customerid, Action ,  Date , product_id, payment_method, site) values ('" . $customers_id . "', 7, now(), '" . $products_id. "' , '".$method_payment."', '" . $site. "' ) "); 
	}
	else
	{
		tep_db_query("insert into abo (Customerid, Action ,  Date , product_id, payment_method, site) values ('" . $customers_id . "', 17, now(), '" . $products_id. "' , '".$method_payment."', '" . $site. "') "); 
		
	}
	//belgiqueloisirs_id
	if (strlen($belgiqueloisirs_id > 0 )){		
		tep_db_query("update customers set belgiqueloisirs_id = '" . $belgiqueloisirs_id . "' where customers_id = '" . $customers_id . "'");		
	}
  	$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $products_id. "' and pd.products_id = '" . $products_id. "' and pd.language_id = '".$languages_id."' ",'db_link',true);
  	$product_info_values = tep_db_fetch_array($product_info);					  		
	
	$promotion = promotion($products_id, $next_abo_type, 'D', $discount_code_id);
	$promotion2 = promotion($products_id, $next_abo_type, 'D', $discount_code_id,2,$languages_id);
	$data=array();
	$type_gender = (strtoupper($customers['customers_gender']) == 'f' ? 'female_gender' : 'male_gender');
	$gender_sql = "select * from  dvdpost_common.translation2 where translation_key = '".$type_gender."' and language_id = ".$languages_id;
	$gender_query = tep_db_query($gender_sql);
	$gender_value = tep_db_fetch_array($gender_query);
	
	$data['gender_simple'] = $gender_value['translation_value'];
	$data['customers_name'] = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
	$data['email'] = $customers['customers_email_address'];
	$data['promotion'] = $promotion2;
	$data['final_price'] = $final_price;
	$data['price'] = $price;
	$data['abo_price'] = $price;
	$data['subscription'] = $products_abo['products_model'];
	$data['general_conditions'] = $conditions;
/*	
	if($final_price>0)
	{
		$formating['text'] = str_replace('<tr id="promo">', '<tr id="promo" style="display:none">',$formating['text']);
	}
*/
	mail_message($customers_id, $mail_message, $data );
	
}
function products_link($lang,$title,$id)
{
	if($lang=='fr')
	{
		$cat='films';
	}
	else if ($lang=='nl')
	{
		$cat='films';
	}
	else
	{
		$cat='movies';
	}
	return '/'.$lang.'/'.$cat.'/'.ponctuation_link(replace_accents(strtolower($title))).'_'.$id;
}
function actors_link($lang,$title,$id)
{
	if($lang=='fr')
	{
		$cat='acteurs';
	}
	else if ($lang=='nl')
	{
		$cat='actors';
	}
	else
	{
		$cat='actors';
	}
	return '/'.$lang.'/'.$cat.'/'.ponctuation_link(replace_accents(strtolower($title))).'_'.$id;
}
function directors_link($lang,$title,$id)
{
	if($lang=='fr')
	{
		$cat='realisateurs';
	}
	else if ($lang=='nl')
	{
		$cat='directors';
	}
	else
	{
		$cat='directors';
	}
	return '/'.$lang.'/'.$cat.'/'.ponctuation_link(replace_accents(strtolower($title))).'_'.$id;
}
function studios_link($lang,$title,$id)
{
	$cat='studios';

	return '/'.$lang.'/'.$cat.'/'.ponctuation_link(replace_accents(strtolower($title))).'_'.$id;
}
function themes_link($lang,$title,$id)
{
	if($lang=='nl')
	{
		$cat='themas';
	}
	else
	{
		$cat='themes';
	}

	return '/'.$lang.'/'.$cat.'/'.ponctuation_link(replace_accents(strtolower($title))).'_'.$id;
}
function cats_link($lang,$title,$parent_title='')
{
	if($lang=='fr')
	{
		$cat='categories';
	}
	else if ($lang=='nl')
	{
		$cat='categorien';
	}
	else
	{
		$cat='categories';
	}
	$name=ponctuation_link(replace_accents(strtolower($title)));
	$name=(($name=='vampires___creatures')?'vampires':$name);
	$name=(($name=='vampieren_en_monsters')?'vampieren':$name);
	
	if($id==16||$id==18||$id==19)
	{
		switch($language_id)
		{
			case 1:
				$categorie_value['parent_name']	='famille_enfants';
			break;
			case 2:
				$categorie_value['parent_name']	='familiefilm';
			break;
			case 3:
				$categorie_value['parent_name']	='kids_family';
			break;
		}
	}
	
	return '/'.$lang.'/'.$cat.((!empty($parent_title))?'/'.ponctuation_link(replace_accents(strtolower($parent_title))):'').'/'.$name;
}
function get_cats($id,$list,$lang='fr',$type="DVD_NORM")
{
	if($lang=='fr')
	{
		$cat='categories';
		$language_id=1;
	}
	else if ($lang=='nl')
	{
		$cat='categorien';
		$language_id=2;
	}
	else
	{
		$cat='categories';
		$language_id=3;
	}
	if($type=='DVD_ADULT')
	{
		$cat.='/adult';	
	}
	if($id>0)
	{
		
	$sql="SELECT l.code, (SELECT cd2.categories_name
	FROM categories_description cd2
	WHERE c.parent_id = cd2.categories_id
	AND cd2.language_id = cd.language_id
	) AS parent_name, categories_name,c.categories_id
	FROM categories c
	JOIN categories_description cd ON ( c.categories_id = cd.categories_id ) 
	JOIN languages l ON ( cd.language_id = l.languages_id ) 
	WHERE product_type = 'Movie'
	and c.categories_id =".$id." and language_id=".$language_id;
	$query = tep_db_query($sql);
	$categorie_value = tep_db_fetch_array($query);
	$name=str_replace('18 ans et +','18 ans',$categorie_value['categories_name']);
	$name=str_replace(' +','',$name);
	$name=ponctuation_link2(replace_accents(strtolower($name)));
	$name=(($name=='vampires_creatures')?'vampires':$name);
	$name=(($name=='vampieren_en_monsters')?'vampieren':$name);

		
	//echo $sql;
	//echo $categorie_value['parent_name'];
	if($id==16||$id==18||$id==19)
	{
		switch($language_id)
		{
			case 1:
				$categorie_value['parent_name']	='famille_enfants';
			break;
			case 2:
				$categorie_value['parent_name']	='familiefilm';
			break;
			case 3:
				$categorie_value['parent_name']	='kids_family';
			break;
		}
	}
	if($categorie_value['parent_name']=="Hors film"||$categorie_value['parent_name']=="Andere"||$categorie_value['parent_name']=="Not movies")
	{
	$categorie_value['parent_name']='';	
	}
	$parent_name=ponctuation_link2(replace_accents(strtolower($categorie_value['parent_name'])));
	return '/'.$lang.'/'.$cat.'/'.((!empty($categorie_value['parent_name']))? $parent_name.'/':'').$name;
	}
	else
	{
		switch($list)
		{
			case 'stars':
				$list='5star';
			break;
			case '1':
				$list='culte';
			break;
			case 'dvdpostchoice':
				$list='coeur';
			break;
			case 'awards':
				$list='prime';
			break;
			
		}
		$title=array(
		'5star'=>array('','5_etoiles','5_sterren','5_stars'),
		'culte'=>array('','film_culte','cultfilms','cult_movies'),
		'coeur'=>array('','coups_de_coeur','aanraders','dvdpost_s_choice'),
		'bluray'=>array('','bluray','bluray','bluray'),
		'new'=>array('','nouveautes','nieuw_op_dvd','new_titles'),
		'fresh'=>array('','fresh','fresh','fresh'),
		'next'=>array('','prochaines_sorties','wordt_verwacht','future_releases'),
		'prime'=>array('','films_primes','bekroonde_films','academy_awards'),
		'cinema'=>array('','cinema','bioscoop','cinema'),
		'6'=>array('','famille_enfants','familiefilm','kids_family'),
		'7'=>array('','Films_d_auteur','artistieke_films','small_production'),
		'french'=>array('','films_francais','cinema_francais','french_movies'),
		'classic'=>array('','oldies','klassiekers','oldies')
		);
		return '/'.$lang.'/'.$cat.'/'.$title[$list][$language_id];
	}
}
function ponctuation_link($str)
{
	$str=preg_replace("/[^\-\w]/", '_',$str);
	return $str;
}
function ponctuation_link2($str)
{
	$str=preg_replace("/[^\-\w]/", '_',$str);
	$str=preg_replace("/(_){2,9}/", '_',$str);
	return $str;
}
function remove_get($get,$list)
{
	//var_dump($get);
	foreach($list as $element)
	{
		unset($get[$element]);
	}
	$query='';
	foreach($get as $element => $value)
	{
		$query.='&'.$element.'='.$value;
	}
	$query=substr($query,1);
	return $query;
	
}
function check_points($customer_id)
{
	$sql='SELECT *	FROM mem_get_mem_used	WHERE points =0 and  father_id ='.$customer_id;
	$query=tep_db_query($sql);
	while($row=tep_db_fetch_array($query))
	{
		$sql_action='SELECT * 	FROM `abo`	WHERE customerid ='.$row['son_id'].' and date > "'.$row['date'].'" and action=7';
		//echo $sql;
		$query_action=tep_db_query($sql_action);
		if($row_son=tep_db_fetch_array($query_action))
		{
			
			tep_begin();
			$check1=tep_db_query("update customers set mgm_points= mgm_points + ".$row['expected_points']." where customers_id = '" . $customer_id . "' ",'db_link',true);	    	    				
			//insert into point history
			$check2=tep_db_query("insert into  customers_points_history (customers_id, date, action, sub_action, points ) values ('" . $customer_id . "', now(), 1, 1, ".$row['expected_points'].") ",'db_link',true);
			$sql_update='update mem_get_mem_used set points='.$row['expected_points'].' where father_id ='.$customer_id.' and son_id = '.$row['son_id'];
			$check3=tep_db_query($sql_update,'db_link',true);
			if($check1==true && $check2==true && $check3==true)
			{
				tep_commit();
			}
			else
			{
				tep_rollback();
			}
		}
	}
}
function check_stop($customer_id)
{
	$sql='SELECT *	FROM mem_get_mem_used	WHERE points =0 and  father_id ='.$customer_id;
	$query=tep_db_query($sql);
	while($row=tep_db_fetch_array($query))
	{
		$sql_action='SELECT * 	FROM `abo`	WHERE customerid ='.$row['son_id'].' and date > "'.$row['date'].'" and action=4';
		//echo $sql;
		$query_action=tep_db_query($sql_action);
		if($row_son=tep_db_fetch_array($query_action))
		{
			
			$sql_update='update mem_get_mem_used set expected_points=0, son_abo_type=0 where father_id ='.$customer_id.' and son_id = '.$row['son_id'];
			$check3=tep_db_query($sql_update,'db_link',true);
		}
	}
}
function parrainage($customer_id,$type)
{
	if($type=='free')
	{
		$point=' points = 0 and expected_points > 0 ';
		$points='expected_points';
		$class='';
		$text=FREE_STATUS;
	}
	else if ($type == 'stop')
	{
		$point=' expected_points = 0 ';	
		$points='points';	
		$class='red';
		$text=TEXT_ABO_STOP;
	}
	else
	{
		$point=' points > 0 ';	
		$points='points';	
		$class='odd';
		$text='<img alt="" src="images/check.gif">'.PAYED_STATUS;
	}
	$sql="select c.customers_firstname , c.customers_lastname , s.date as date1 , su.date as date2, su.son_abo_type,points, expected_points 
	from mem_get_mem_used su
	left join mem_get_mem s on su.father_id=s.customers_id 
	left join customers c on  su.son_id=c.customers_id where father_id= '".$customer_id."' and ".$point."  group by c.customers_lastname order by date2 DESC";
	$query_sponsoring = tep_db_query($sql);
	while ($query_sponsoring_values = tep_db_fetch_array($query_sponsoring)) {
		
		
		if($query_sponsoring_values['date1'] == null)
			$query_sponsoring_values['date1']=$query_sponsoring_values['date2'];
		if(empty($query_sponsoring_values['customers_lastname']))
		{
			$query_sponsoring_values['customers_lastname']='&nbsp;';
		}	
		if(empty($query_sponsoring_values['customers_firstname']))
		{
			$query_sponsoring_values['customers_firstname']='&nbsp;';
		}	
			echo '<tr>
				<td class="'.$class.'">'.ucwords($query_sponsoring_values['customers_lastname']).'</td>
				<td class="'.$class.'">'.ucwords($query_sponsoring_values['customers_firstname']).'</td>
				<td class="'.$class.' brdr">'.substr($query_sponsoring_values['date1'], 0, 10).'</td>
				<td class="'.$class.' brdr">'.$text.'</td>
				<td class="'.$class.' brdr"><strong>'.$query_sponsoring_values[$points].'Pts</strong></td>
			</tr>	'		;					
	}
	
}
function gift($customer_id,$type,$lang_short,$languages_id)
{
	if($type=='free')
	{
		$date='date';
		$status='0';
		$class='';
		$text=GIFT_NOT_SEND;
	}
	else
	{
		$date='gift_sent_date';	
		$status='1';	
		$class='odd';
		$text=GIFT_SEND;
	}
	$sql="SELECT * FROM mem_get_mem_gift_history m 
	join mem_get_mem_gift mg on
	m.gift_id = mg.mem_get_mem_gift_id
	 where customers_id = ".$customer_id." and gift_sent= ".$status." order by 1 DESC";
	$query_sponsoring = tep_db_query($sql);
	while ($query_sponsoring_values = tep_db_fetch_array($query_sponsoring)) {
			$name = 'gift_name_'.$lang_short;
			if($query_sponsoring_values['products_id']==0)
			{
				$name = $query_sponsoring_values[$name];
			}
			else
			{
				$sql_product='select * from products_description where products_id ='.$query_sponsoring_values['products_id'].' and language_id = '.$languages_id;
				$query_product = tep_db_query($sql_product);
				$query_product_value = tep_db_fetch_array($query_product);
				$name = $query_product_value['products_name'];
			}
			echo '<tr>
							<td class="'.$class.'"> '.$name.'</td>
							<td class="'.$class.' brdr">'. substr($query_sponsoring_values[$date], 0, 10) .' </td>
							<td class="'.$class.' brdr">'. $text .'</td>
							<td class="'.$class.' brdr"><strong>'. $query_sponsoring_values['points'].'Pts</strong></td>
		  		</tr>	';
	}
	
}
function dvd_finally_arrived($orders_id,$customer_id,$languages_id=1)
{
	include('includes/functions/isAdult.php'); //BEN001
	$sql_customers='select customers_language from customers where customers_id = '.$customer_id;
    $customers_value = tep_db_query($sql_customers,'db_connection',true);
	$languages_id=$customers_value['customers_language'];
	$sql="select products_dvd,op.products_id,orders_status from " . TABLE_ORDERS . " o JOIN " . TABLE_ORDERS_PRODUCTS . " op ON  o.orders_id=op.orders_id where o.orders_id='" . $orders_id . "' limit 1";
    $orders_status_query = tep_db_query($sql,'db_connection',true);
	$orders_status = tep_db_fetch_array($orders_status_query);
	$pid=$orders_status['products_id'];
	$dvdid=$orders_status['products_dvd'];
	$orders_status=$orders_status['orders_status'];
	if($orders_status!=17 && $orders_status!=12)
	{
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','dvd_finally_arrived','pid -> '.$pid.' orders_status ->  '.$orders_status.' orders id -> '.$orders_id.'customers -> '.$customer_id,'bugreport@dvdpost.be','bugreport@dvdpost.be');
	}
	else
	{
	    $custserv_message_query = tep_db_query("select * from " . TABLE_CUSTSERV_AUTO_ANSWER . " where language_id = '" . $languages_id . "' and custserv_auto_answer_id = 20 ");  
	    $custserv_message = tep_db_fetch_array($custserv_message_query);

	    //insert cust serv avec admin auto
	    tep_db_query("INSERT INTO " . TABLE_CUSTSERV . " (customers_id , language_id , custserv_cat_id , customer_date , orders_id, products_id , dvd_id, admindate , adminby , adminmessage, messagesent ) VALUES ('" . $customer_id . "', '" . $languages_id . "', '19', now(), '" . $orders_id . "', '" . $pid . "', '" . $dvdid . "', now(), 99, '". strtr($custserv_message['messages_html'],"'","\'") ."',1)");
	    $insert_id = tep_db_insert_id();

	    tep_db_query("INSERT INTO " . TABLE_CUSTSERV_DELAYED_FINNALYARRIVED . " (custserv_id, customers_id , customer_date , orders_id, products_id , dvd_id) VALUES ('" . $insert_id . "','" . $customer_id . "', now(), '" . $orders_id . "', '" . $pid . "', '" . $dvdid . "' )");

    
	   tep_db_query("UPDATE products_dvd SET products_dvd_status = 1 WHERE products_id = '" . $pid . "' AND products_dvdid = '" . $dvdid . "'"); //BEN001

	    //set orders delayed
	    tep_db_query("update " . TABLE_ORDERS . " set orders_status = 2 where orders_id= '" . $orders_id . "' "); 
	    tep_db_query("insert into " . TABLE_ORDERS_STATUS_HISTORY . "  (orders_id, new_value, old_value, date_added, customer_notified ) values ('" . $orders_id . "', 2, 17, now(), 1) "); 
	    tep_db_query("update " . TABLE_ORDERS_PRODUCTS . " set orders_products_status = 1 where products_id = '" . $pid . "' and orders_id = '" . $orders_id . "' "); 

	    //dvdathome!
	    //BEN001 if ($pid > 9999) {
		if (isAdult($pid)) { //BEN001
	       tep_db_query("update " . TABLE_CUSTOMERS . " set customers_abo_dvd_home_adult = customers_abo_dvd_home_adult + 1  where customers_id = '" . $customer_id . "'  "); 
	    }else{
	       tep_db_query(" update " . TABLE_CUSTOMERS . " set customers_abo_dvd_home_norm = customers_abo_dvd_home_norm + 1  where customers_id = '" . $customer_id . "' "); 
	    }
	}
}
function parrainage_classic($son_id)
{
	//parrainage classic
	$customers_query = tep_db_query("select * from customers where customers_id = '" . $son_id . "' ",'db_link',true);
	$son_value = tep_db_fetch_array($customers_query);

	$sql_son_verif = 'select count(1) as count from mem_get_mem_used where son_id = '. $son_id;
	$son_query_verif = tep_db_query($sql_son_verif);
	$son_verif_value = tep_db_fetch_array($son_query_verif);
	if($son_verif_value['count']==0)
	{
		$query_mgm = tep_db_query("select * from mem_get_mem where email = '" . $son_value['customers_email_address'] . "' order by mem_get_mem_id limit 1",'db_link',true);
		
		if($query_mgm_value = tep_db_fetch_array($query_mgm)) 
		{
			if($query_mgm_value['mem_get_mem_id']>0)
			{
				$father = tep_db_query("select * from customers where customers_id = '" . $query_mgm_value['customers_id'] . "' ",'db_link',true);
				$father_value = tep_db_fetch_array($father);	
				if ($father_value['customers_abo']>0)
				{
					
					

					
					
					tep_db_query("insert into mem_get_mem_used (date, father_id, father_abo_type, son_id , son_abo_type , points, expected_points) values (now(), '" . $query_mgm_value['customers_id'] . "', '" . $father_value['customers_abo_type'] . "', '" . $son_id . "', '" . $products_id. "', '0' ,'200')");	    	    				
					
					$type_gender = (strtoupper($father_value['customers_gender']) == 'f' ? 'female_gender' : 'male_gender');
					$gender_sql = "select * from  dvdpost_common.translation2 where translation_key = '".$type_gender."' and language_id = ".$father_value['customers_language'];
					$gender_query = tep_db_query($gender_sql);
					$gender_value = tep_db_fetch_array($gender_query);
					$data = array();
					$data['gender_simple'] = $gender_value['translation_value'];
					$data['godfather_name'] = ucwords($father_value['customers_firstname']) . ' ' . ucwords($father_value['customers_lastname']);
					$data['son_name'] = ucwords($son_value['customers_firstname']) . ' ' . ucwords($son_value['customers_lastname']);
					$data['godfather_point'] = $father_value['mgm_points'];
					mail_message($query_mgm_value['customers_id'], 447, $data);
					return array('status' => 'true', 'error'=> 'false');
				}
				else
				{
					return array('status' => 'false', 'error'=> 11);
				}
			}
		}
		else
		{
			return array('status' => 'false', 'error'=> 10);
		}
	}
	else
	{
		return array('status' => 'false', 'error'=> 9);
	}
}
  // Fonction permettant de compter le nombre de jours ouvrés entre deux dates
  function get_nb_open_days($date_start, $date_stop) {
  $arr_bank_holidays = array(); // Tableau des jours feriés
  
  // On boucle dans le cas où l'année de départ serait différente de l'année d'arrivée
  $diff_year = date('Y', $date_stop) - date('Y', $date_start);
  for ($i = 0; $i <= $diff_year; $i++) {
  $year = (int)date('Y', $date_start) + $i;
  // Liste des jours feriés
  $arr_bank_holidays[] = '1_1_'.$year; // Jour de l'an
  $arr_bank_holidays[] = '1_5_'.$year; // Fete du travail
  $arr_bank_holidays[] = '21_7_'.$year; // Fete nationale
  $arr_bank_holidays[] = '15_8_'.$year; // Assomption
  $arr_bank_holidays[] = '1_11_'.$year; // Toussaint
  $arr_bank_holidays[] = '11_11_'.$year; // Armistice 1918
  $arr_bank_holidays[] = '25_12_'.$year; // Noel
  
  // Récupération de paques. Permet ensuite d'obtenir le jour de l'ascension et celui de la pentecote
  //$easter = easter_date($year);
  //$arr_bank_holidays[] = date('j_n_'.$year, $easter + 86400); // Paques
  //$arr_bank_holidays[] = date('j_n_'.$year, $easter + (86400*39)); // Ascension
  //$arr_bank_holidays[] = date('j_n_'.$year, $easter + (86400*50)); // Pentecote
  }
  //print_r($arr_bank_holidays);
  $nb_days_open = 0;
  while ($date_start < $date_stop) {
  // Si le jour suivant n'est ni un dimanche (0) ou un samedi (6), ni un jour férié, on incrémente les jours ouvrés
  if (!in_array(date('w', $date_start), array(0, 6))
  && !in_array(date('j_n_'.date('Y', $date_start), $date_start), $arr_bank_holidays)) {
  $nb_days_open++;
  }
  $date_start += 86400;
  }
  return $nb_days_open;
  }
function wishlist_form($language='french',$languages_id=1,$customer_id=0,$type='normal')
{
	?>

			  <tr align="center">
	      		<td width="14" height="35"><img src="<?php    echo DIR_WS_IMAGES;?>img_recom/top_left_recom3.gif" width="14"></td>
		  		<td width="295" align="left" height="35" background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border">
					<B class="TYPO_STD_BLACK"><?php    echo TEXT_TITLE; ?></B>
				</td>
		  		<td width="26" height="35" background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border">
					<B class="TYPO_STD_BLACK">&nbsp;</B>
				</td>
				<td width="142" height="35" background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border">
					<B class="TYPO_STD_BLACK"><?php    echo TEXT_ADVICE; ?></B>
				</td>
				<td  width="176" height="35" align ="center" background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif">
	      			<table width="176" height="27" border="0" align="center" cellpadding="0" cellspacing="0"> 
		      			<tr>
							<td width="53" align ="center">
								<img src="<?php    echo DIR_WS_IMAGES;?>high.gif" width="27" height="27">
							</td>
							<td width="53" align ="center">
								<img src="<?php    echo DIR_WS_IMAGES;?>med.gif" width="27" height="27">
							</td>
							<td width="54" align ="center">
								<img src="<?php    echo DIR_WS_IMAGES;?>low.gif" width="27" height="27">
							</td>
						</tr>
	   			  </table>
		  		</td>
	      		<td width="97" height="35" background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" >
					<B class="TYPO_STD_BLACK"><?php    echo TEXT_REMOVE; ?></B>
				</td>
		  		<td width="14" height="35" valign="top" ><img src="<?php    echo DIR_WS_IMAGES;?>img_recom/top_right_recom3.gif" width="14" height="35"></td>
		 	  </tr>    	  
			 		<?php   
					$sql="select distinct p.products_rating,p.rating_users,p.rating_count,w.already_rented,p.products_media, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.priority, w.product_id, date_format(p.products_date_available,'%d/%m/%Y') day,p.imdb_id from " . TABLE_WISHLIST . " w LEFT join " . TABLE_PRODUCTS . " p on p.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where w.customers_id = '" . $customer_id . "' and w.wishlist_type = 'DVD_NORM' and products_status !=-1 ".(($type=='normal')?' and products_next=0 ':' and products_next!=0 ')."order by w.priority, pd.products_name";
					#echo $sql;
					$wl_query = tep_db_query($sql); 
	      			$i=1;				
					while ($wl = tep_db_fetch_array($wl_query)) {
						if ($i % 2 ==0){$bcolor='#F2F2F2'; }
						else {$bcolor='#FFFFFF'; }
						if(empty($wl['products_media']))
							$wl['products_media']='DVD';


	      			?>
	      				<tr align="center">
							<td background="<?php    echo DIR_WS_IMAGES.'img_recom/left_line_recom_transpa.gif';?>" bgcolor="<?php    echo $bcolor;?>">
								<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14">
							</td>						
	        				<td width="300" align="left" bgcolor="<?php    echo $bcolor;?>" height="32">
	          					<a class="basiclink" href="product_info.php?products_id=<?php    echo $wl['product_id']; ?>">
	            				<b><font color="#000000"><?php    echo $wl['products_name'];?></font></b>
	          					</a>
	          					<?php   
	          					echo '<img src="'.DIR_WS_IMAGES.'blank.gif" border="0" align="absmiddle" width="15" height="2">';

	            				if ($wl['already_rented']=='YES'){
	              					echo '&nbsp;&nbsp;&nbsp;<img src="' . DIR_WS_IMAGES . 'eye.gif" alt="You have alreay ordered this products the ' . substr($alreadyordered['date_purchased'],0, 10) . '">' ;
	            					}
	          					?>
	        				</td>
							<td width="26" class="TYPO_STD_BLACK" bgcolor="<?php    echo $bcolor;?>">
								<?php echo '<img src="'.DIR_WS_IMAGES.'canvas/'.$wl['products_media'].'.png" border="0" align="absmiddle" width="26" alt="'.strtolower($wl['products_media']).'" title="'.strtolower($wl['products_media']).'">'; ?>

							</td>	
	        				<td width="142" class="TYPO_STD_BLACK" bgcolor="<?php    echo $bcolor;?>">
		          				<?php   
		            			if ($wl['products_next'] > 0 ){
		              				echo ' (' . TEXT_PRODUCTS_NEXT . $wl['day'] . ')';
		            			}else{
									if ($wl['products_availability'] < 0){
		              				echo '<font color="red">' . TEXT_NOT_AVAILABLE . '</font>';
									}else{
		              					$data_avg_count=avg_count_fct($wl['rating_users'],$wl['rating_count']);
										$jsrate=$data_avg_count['avg'];
									if ($jsrate==0){ 
										echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?cPath=21&products_id='. $wl['product_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
	//									echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?cPath=21&products_id='. $wl['product_id'] .'">' . '<img border="0" src="' .DIR_WS_IMAGES_LANGUAGES . $language.'/images/buttons/button_write_review.gif">' . '</a>';						
									}
									else {

										echo  '<img src="'. DIR_WS_IMAGES . 'starbar/stars_1_'. $jsrate .'.gif">';
										}								
									}
								}
		          				?>
	        				</td>        				
	        				<td width="176" bgcolor="<?php    echo $bcolor;?>">
		        				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			        				<tr align="center">	<input type='hidden' name='id[]' value='<?php    echo $wl['wl_id']; ?>' /> 
				        					<td width="53">
													<label title="<?php   echo TEXT_PRIORITY_H ;?>">
														<input type='hidden' name='rank_original<?php    echo $wl['wl_id']; ?>' value='h' />
														<INPUT type="radio" id="rank<?php    echo $wl['wl_id']; ?>" name="priority<?php    echo $wl['wl_id']; ?>" value="h" alt="<?php   echo TEXT_PRIORITY_H ;?>" <?= (($wl['priority']==1)? 'checked="true"':'') ?>>
									  				</label>
												</td>
						        				<td width="53">
						        					<label title="<?php   echo TEXT_PRIORITY_M ;?>">
														<INPUT type="radio" id="rank<?php    echo $wl['wl_id']; ?>" name="priority<?php    echo $wl['wl_id']; ?>" value="m" alt="<?php   echo TEXT_PRIORITY_M ;?>" <?= (($wl['priority']==2)? 'checked="true"':'') ?>>
									  				</label>
												</td>
						        				<td width="54">
						        					<label title="<?php   echo TEXT_PRIORITY_L ;?>">
														<INPUT type="radio" id="rank<?php    echo $wl['wl_id']; ?>" name="priority<?php    echo $wl['wl_id']; ?>" value="l" alt="<?php   echo TEXT_PRIORITY_L ;?>" <?= (($wl['priority']==3)? 'checked="true"':'') ?>>
									  				</label>
												</td>

		        				  </tr>
	        				  </table>
							</td>	
	        				<td width="100" bgcolor="<?php    echo $bcolor;?>">
	 	         				<label title="<?php   echo TEXT_REMOVE ;?>">
	 	         					<INPUT type="radio" id="rank<?php    echo $wl['wl_id']; ?>" name="priority<?php    echo $wl['wl_id']; ?>" value="del" alt="<?php   echo TEXT_REMOVE ;?>">
	 	         				</label>
	        				</td>
							<td background="<?php    echo DIR_WS_IMAGES.'img_recom/right_line_recom_transpa.gif';?>" bgcolor="<?php    echo $bcolor;?>">
								<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14">
							</td>
						</tr>
						<?php   
						$i++; 
						} 
						?>
			<tr>
				<td height="14"><img src="<?php    echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
	      		<td colspan="5" background="<?php    echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
					<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
	      		<td><img src="<?php    echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
			</tr> 


	<?php
}
function abo_price($discount_type,$discount_code_id,$discount_value,$price)
{
	switch ($discount_type) {
		case 1: // - X%
			$final_price  = round($price  - ($discount_value  / 100 * $price ),2)  ;
		break;
		case 2: //tot=x euro 
					$final_price =  $discount_value;
		break;
		case 3: //tot=tot - x euro 
			$final_price = ($price - $discount_value)  ;
		break;
		default:
			$final_price = $price;
	}
	return $final_price;
}
function credit_history($customers_id, $credit, $quantity, $type_id=0)
{
	$select = 'select * from credit_history where customers_id = '.$customers_id.' order by id desc limit 1';
	$data=tep_db_query($select);
  if($credit_history = tep_db_fetch_array($data))
  {
    $credit_free=$credit_history['credit_free']+$credit_history['quantity_free'];
	}
  else
 {
  $credit_free=0;
 }
 if($credit_history = tep_db_fetch_array($data))
  {
    $credit_paid=$credit_history['credit_paid']+$credit_history['quantity_paid'];
	}
  else
 {
  $credit_paid=0;
 }	
	$sql='insert into credit_history (customers_id,credit_action_id,credit_paid,credit_free,quantity_free,user_modified) values ('.$customers_id.','.$type_id.','.$credit_paid.','.$credit_free.','.$quantity.',55);';
	
	return tep_db_query($sql);
}
function truncate($text,$numb,$etc = "...") {
$text = html_entity_decode($text, ENT_QUOTES);
if (strlen($text) > $numb) {
$text = substr($text, 0, $numb);
$text = substr($text,0,strrpos($text," "));

$punctuation = ".!?:;,-"; //punctuation you want removed

$text = (strspn(strrev($text),  $punctuation)!=0)
        ?
        substr($text, 0, -strspn(strrev($text),  $punctuation))
        :
$text;

$text = $text.$etc;
}
#$text = htmlentities($text, ENT_QUOTES);
return $text;
}
function last_login($customer_id)
{
	$select = 'select * from customer_attributes where customer_id = '.$customer_id.';';
	$data=tep_db_query($select);
  if($login = tep_db_fetch_array($data))
  {
		$sql_change="update customer_attributes set number_of_logins=number_of_logins+1 ,last_login_at = now() where customer_id = ".$customer_id;
	}
  else
  {
		$sql_change="INSERT INTO customer_attributes (customer_id, number_of_logins, last_login_at, created_at, updated_at) VALUES (".$customer_id.",1,now(),now(),now())";
  }	
	return tep_db_query($sql_change);
}

function promotion($current_products_id, $next_abo_type, $discount_type, $promo_id,$title = 0,$lang=1)
{
  if($title ==2)
  {
    
  $sql= 'select translation_key as cfgKey, translation_value as cfgValue from dvdpost_common.translation2 where language_id = ' . intval($lang) . ' and translation_page="root" and (site_host_id  = ' . SITE_HOST_ID . ' or site_host_id  = ' . WEBSITE . ' or site_host_id =0 )  order by FIELD(site_host_id,'.SITE_HOST_ID.','.WEBSITE.',0 )';
  #echo $sql;
  $translation_query = tep_db_query($sql);
  while ($translation = tep_db_fetch_array($translation_query)) {
    unset($translation['cfgKey']);
  	define($translation['cfgKey'], $translation['cfgValue']);
  }
  }
  
	$sql = "SELECT p.products_price, pa.qty_credit,qty_at_home from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$current_products_id. "'";
	$current_products_query = tep_db_query($sql);
	$current_products_values = tep_db_fetch_array($current_products_query);
	$current_credits=$current_products_values['qty_credit'];
	$promo_type = (($current_credits == 0) ? 'unlimited':'freetrial');
	
	
	$products_query = tep_db_query("SELECT p.products_price, pa.qty_credit,qty_at_home from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$next_abo_type. "'");
	$products_values = tep_db_fetch_array($products_query);
	$credits=$products_values['qty_credit'];
	$price_abo=$products_values['products_price'];
	$rotation = $products_values['qty_at_home'];
	if ($discount_type=='A'){
	  
		//ACTIVATION VIA OGONE
		$activation_query = tep_db_query("SELECT * FROM activation_code WHERE activation_id ='".$promo_id. "'");
		$activation_values = tep_db_fetch_array($activation_query);
		$abo_dvd_credit= $activation_values['abo_dvd_credit'];
		if ($activation_values['activation_waranty']==2)
		{
			$promo_type = 'pre_paid';
		}
		if($abo_dvd_credit > 0)
		{
			$credits=$abo_dvd_credit;
		}
		$activation_text = activation_text($activation_values, SHORT);
		switch ($activation_values['validity_type']){
			case 1:	
				$duration = '<span class="red_font">'.$activation_values['validity_value'].' '.TEXT_DAYS.'</span>';
				$period =  $credits.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
				
			break;
			case 2:	
				$duration = '<span class="red_font">'.$activation_values['validity_value'].' '.TEXT_MONTHS.'</span>';
				$period = $credits.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
			break;
			case 3:	
				$duration = '<span class="red_font">'.$activation_values['validity_value'].' '.TEXT_YEAR.'</span>';
				$period = $credits.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
				
			break;
		}
	}else{
		$sql="SELECT * FROM discount_code WHERE discount_code_id ='".$promo_id. "'";
		$discount_query = tep_db_query($sql);
		$discount_values = tep_db_fetch_array($discount_query);
		$abo_dvd_credit= $discount_values['abo_dvd_credit'];
		$abo_dvd_max = $discount_values['abo_dvd_remain'];
		$discount_text = discount_text($discount_values, SHORT);
		if($abo_dvd_credit==0)
			$abo_dvd_credit=$credits;
		$nb = $discount_values['discount_recurring_nbr_of_month']> 0 ? ($discount_values['discount_recurring_nbr_of_month'] +1)  : $discount_values['discount_abo_validityto_value'];
		switch ($discount_values['discount_abo_validityto_type']){
			case 1:	
				$duration = '<span class="red_font">'.$nb.' '.TEXT_DAYS.'</span>';
			break;
			case 2:	
				$duration = '<span class="red_font">'.$nb.' '.TEXT_MONTHS.'</span>';
			break;
			case 3:	
				$duration = '<span class="red_font">'.$nb.' '.TEXT_YEAR.'</span>';
				
			break;
			
		}
		if($abo_dvd_max > 0)
		{
			$period = $abo_dvd_max.' DVD/BLU-RAY/VOD & '.($abo_dvd_credit-$abo_dvd_max).' '.TEXT_FILMS_VOD.' '.TEXT_FOR.' '.$duration;			
		}
		else
		{
			$period = $abo_dvd_credit.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;			
		}
		
		$period_next = $credits.' '.TEXT_FILMS.' '.TEXT_PER.' '.TEXT_MONTH.', '. $rotation.' '.TEXT_FILMS.' '.AT_TIME.' &euro; '.$price_abo;
		
	}
	
	if ($promo_type == 'pre_paid') {
		if ($title == 1)
			return TEXT_ACTIVE_PROMO." :<br/> ".$period;
		else
			return $period;
		
	}
	else
	{ 
		if($abo_dvd_credit!=10000)
		{
		  if($discount_values['discount_type']==1 && $discount_values['discount_value'] > 0)
		  {
		    return !empty($discount_text)? $discount_text : "<strong>-".round($discount_values['discount_value']).TEXT_PAID_PERCENT.' '.(intval($discount_values['discount_recurring_nbr_of_month'])+1).' '.TEXT_MONTHS."</strong>";
		    // <span class='red_font'>".$period."</span>";
		  }
			else if($discount_values['discount_value']>0)
			{
				return "<strong>".TEXT_PAID_PROMO."</strong>: <span class='red_font'>".!empty($discount_text)? $discount_text : $period."</span>";
			}
			else if ($discount_values['discount_type'] == 1 && $discount_values['discount_value'] == 0)
			{
			  return $period.' '.TEXT_FOR_EURO.' &euro; '.$price_abo;
			}
			else
			{
				if ($promo_type != 'unlimited') {
				  if($title == 2)
				  {
				    if(!empty($discount_text))
  				  {
  				    return "<span class='red_font'>".$discount_text.'</span>';
  				  }
  				  else if(!empty($activation_text))
  				  {
  				    return "<span class='red_font'>".$activation_text.'</span>';
  				  }
  				  else
  				  {
  				    return "<span class='red_font'>".$period.'</span>';
  				  }
				  }
				  else
				  {
				    if(!empty($discount_text))
  				  {
  				    return "<strong>".TRIAL."</strong>: <span class='red_font'>".$discount_text.'</span>';
  				  }
  				  else if(!empty($activation_text))
  				  {
  				    return "<strong>".TRIAL."</strong>: <span class='red_font'>".$activation_text.'</span>';
  				  }
  				  else
  				  {
  				    return "<strong>".TRIAL."</strong>: <span class='red_font'>".$period.'</span>';
  				  }
				  }
				}else{ 
					return sprintf(UNLIMITED, $duration, $abo_dvd_credit);
				}
			}			
		}
		else
		{
			return "";
		}
	} 

}


function format($text,$data,$set_dico = true)
{
	if ($set_dico === true)
	{
		$dico='';
	}
	preg_match_all("/\\$\\$\\$(\w+)\\$\\$\\$/", $text, $extract_variable);
	foreach ($extract_variable[1] as $item)
	{
		if(!isset($data[$item]))
		{
			/*$key_missing=$item;
			echo 'missing key'.$key_missing;
			var_dump($data);
			return false;*/
      $fff=1;
		}
		$text = str_replace('$$$'.$item.'$$$',$data[$item],$text);
		if($set_dico == true)
		{
			if (strpos($dico, $item) === false) 
			{
				$dico.= '$$$'.$item.'$$$'.':::'.$data[$item].';;;';
			}
		}
	}
	return array('text' => $text, 'dico' => $dico);
}
function mail_message($customer_id, $mail_id, $data, $site = 'dvdpost')
{
  if(strpos($_SERVER['HTTP_HOST'],'.nl')>0)
  {
    $data['host'] = 'www.dvdpost.nl';
    $data['host_private'] = 'private.dvdpost.nl';
  }
  else
  {
    $customers_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ",'db',true);
    $customers = tep_db_fetch_array($customers_query);
    if($customers['site'] == 'nl')
    {
      $data['host'] = 'www.dvdpost.nl';
      $data['host_private'] = 'private.dvdpost.nl';
    }
    else
    {
      $data['host'] = 'www.dvdpost.be';
      $data['host_private'] = 'private.dvdpost.be';  
    }
  }
  if($site == 'plush')
  {
  	$mail_copy = 1;
  }
  else
  {
  	$sql = 'select * from customer_attributes where customer_id = '.$customer_id;
  	$query = tep_db_query($sql);
  	$row = tep_db_fetch_array($query);
  	$mail_copy = $row['mail_copy'];
  }
	$sql2 = 'select * from customers where customers_id = '.$customer_id;
	$query2 = tep_db_query($sql2);
	$customers = tep_db_fetch_array($query2);
	$l = $customers['customers_language'];
	if(empty($l))
	{
	  $l = 1;
	}
	$sql='SELECT * FROM mail_messages m where mail_messages_id ='.$mail_id.' and language_id = '.$l;
	/*echo $sql;*/
	$mail_query = tep_db_query($sql);
	$mail_values = tep_db_fetch_array($mail_query);
	$email_text = $mail_values['messages_html'];
	$category_id = $mail_values['category_id'];
	if($site == 'plush')
	{
	  $email = $customers['email'];  
	}
	else
	{
	  $email = $customers['customers_email_address'];
	}
	 tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'mail 645', $data['final_price'].'. .'.$data['price'] , 'dvdpost@dvdpost.be', 'dvdpost@dvdpost.be');
	if($mail_id == 645)
	{ 
	  if($data['final_price']===$data['price'] && $data['final_price'] !=0)
		{
			$email_text = preg_replace('/<span id="you_promo">(.*)<\/span>/s', '',$email_text);
		}
	}
	$data['display']='block';
	if($mail_copy == 1 || $mail_values['force_copy']==1)
	{
		$sql_insert="INSERT INTO `mail_messages_sent_history` (`mail_messages_sent_history_id` ,`date` ,`customers_id` ,`mail_messages_id`,`language_id` ,	`mail_opened` ,	`mail_opened_date` ,`customers_email_address`)	VALUES (NULL , now(), ".$customer_id.", '".$mail_id."', ".$customers['customers_language'].", '0', NULL , '".$email."'	);";
		tep_db_query($sql_insert);
		$history_id=tep_db_insert_id();
    
		$data['mail_messages_sent_history_id'] = $history_id;
		$formating = format($email_text, $data);
		$sql_up = 'update mail_messages_sent_history set lstvariable = "'.addslashes($formating['dico']).'" where mail_messages_sent_history_id = '.$history_id;
		tep_db_query($sql_up);
		if(gethostbyname($_SERVER["SERVER_NAME"]) != '127.0.0.1')
		{
			$recipient = $email;
		}
		else
		{
			$recipient = 'it@dvdpost.be';
		}
		if($site == 'plush')
		{
  		tep_mail_plush($customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $recipient, $mail_values['messages_title'], $formating['text'], STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
		  
		}
		else
		{
  		tep_mail($customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $recipient, $mail_values['messages_title'], $formating['text'], STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
		}
	}
	else
	{
		$history_id='NULL';
	}
		
	$data['mail_messages_sent_history_id'] = 0;
	$formating = format($email_text, $data);	
	
	$sql_insert = "INSERT INTO `tickets` (`created_at`, `updated_at`, `category_ticket_id`, `remove`, `customer_id`) VALUES(now(), now(), $category_id, 0, ".$customer_id.")";
	tep_db_query($sql_insert);
	$insert_id = tep_db_insert_id();
	$sql_insert2 = "INSERT INTO `message_tickets` (`created_at`, `updated_at`, `is_read`, `mail_id`, `ticket_id`, `user_id`, `data`, `mail_history_id`)";
	$sql_insert2 .= " VALUES(now(), now(), 0, ".$mail_id.", ".$insert_id;
	$sql_insert2 .= ", 55, '".addslashes($formating['dico'])."', '".$history_id."')";
	tep_db_query($sql_insert2);
}
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
function age($date_naissance)
 {
$arr1 = explode('/', $date_naissance);
$arr2 = explode('/', date('d/m/Y'));
 
if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[0] <= $arr2[0])))
return $arr2[2] - $arr1[2];
return $arr2[2] - $arr1[2] - 1;
}

function curPageURL2() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
function discount_text($discount_values, $locale)
{
  switch($locale)
  {
    case 'fr':
      $text = $discount_values['discount_text_fr'];
      break;
    case 'nl':
      $text = $discount_values['discount_text_nl'];
      break;
    case 'en':
      $text = $discount_values['discount_text_en'];
      break;
  }
  return $text;
}
function activation_text($values, $locale)
{
  switch($locale)
  {
    case 'fr':
      $text = $values['activation_text_fr'];
      break;
    case 'nl':
      $text = $values['activation_text_nl'];
      break;
    case 'en':
      $text = $values['activation_text_en'];
      break;
  }
  return $text;
}
?>
