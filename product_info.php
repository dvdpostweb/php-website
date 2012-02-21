<?php
require('configure/application_top.php');

$current_page_name = FILENAME_PRODUCT_INFO;

  $get_params = tep_get_all_get_params();
  $get_params_back = tep_get_all_get_params(array('reviews_id')); // for back button
  //echo $get_params_back;
  $get_params = substr($get_params, 0, -1); //remove trailing &
  if ($get_params_back != '') {
  $get_params_back = substr($get_params_back, 0, -1); //remove trailing &
  } else {
  $get_params_back = $get_params;
  }
$HTTP_GET_VARS['products_id']=intval($HTTP_GET_VARS['products_id']);  
if ($HTTP_GET_VARS['products_id'] > 0){	
}else{
	tep_redirect(tep_href_link('mydvdpost.php', '', 'SSL'));
}

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {    
	tep_redirect(tep_href_link('product_info_public.php?products_id='.$HTTP_GET_VARS['products_id'], '', 'SSL'));
}
$meta_query = tep_db_query("select products_title,products_description,products_type from products p 
join products_description pd  on p.products_id=pd.products_id
where p.products_id=".$_GET['products_id']." and language_id=1".$languages_id);
$meta_value = tep_db_fetch_array($meta_query);	
$strmeta = $meta_value['products_title'];
$strdescription =htmlspecialchars($meta_value['products_title'].' : '.$meta_value['products_description']);

include(DIR_WS_INCLUDES . 'translation.php');

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');
?>