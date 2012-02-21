<?php
$memcache_available=true; 
require('configure/application_top.php');

$current_page_name = FILENAME_MYDVDPOST;


$customers_query = tep_db_query("select *, now() as ajd from customers where customers_id = " . $customer_id );
$customers_values = tep_db_fetch_array($customers_query);
$customers_val=$customers_values;
$customers_id=$customer_id;

#$customers_language = tep_db_fetch_array($customers_language_query);
if ($customers_values['customers_language']==0){
    $lang_id = $HTTP_COOKIE_VARS['language_id'];
    if($lang_id != 1 && $lang_id != 2 && $lang_id != 3)
    {
      $lang_id = 1;
    }
    tep_db_query("update customers set customers_language = '".$lang_id."' where customers_id = '" . $customers_id . "'");
}
	
setcookie('customers_registration_step', $customers_values['customers_registration_step'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
$customers_registration_step=$customers_values['customers_registration_step'];
if ($customers_registration_step<100){
	tep_redirect(tep_href_link('index.php'));	
	}	

	



include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>