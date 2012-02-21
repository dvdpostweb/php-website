<?php
require('configure/application_top.php');

$current_page_name = 'product_info_shop.php';

  $get_params = tep_get_all_get_params();
  $get_params_back = tep_get_all_get_params(array('reviews_id')); // for back button
  $get_params = substr($get_params, 0, -1); //remove trailing &
  if ($get_params_back != '') {
  $get_params_back = substr($get_params_back, 0, -1); //remove trailing &
  } else {
  $get_params_back = $get_params;
  }
$HTTP_GET_VARS['products_id'] = intval($HTTP_GET_VARS['products_id']);
if ($HTTP_GET_VARS['products_id'] > 0){	
}else{
	tep_redirect(tep_href_link('mydvdpost.php', '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$page_body_to_include = $current_page_name;


if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop_public.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop.php'));
}

require('configure/application_bottom.php');
?>