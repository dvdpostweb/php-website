<?php 
require('configure/application_top.php');

$current_page_name = FILENAME_PRODUCT_INFO_ADULT;

  $get_params = tep_get_all_get_params();
  $get_params_back = tep_get_all_get_params(array('reviews_id')); // for back button
  $get_params = substr($get_params, 0, -1); //remove trailing &
  if ($get_params_back != '') {
  $get_params_back = substr($get_params_back, 0, -1); //remove trailing &
  } else {
  $get_params_back = $get_params;
  }
$HTTP_GET_VARS['products_id']=intval($HTTP_GET_VARS['products_id']);
if ($HTTP_GET_VARS['products_id'] > 0){	
}else{
	tep_redirect(tep_href_link('mydvdxpost.php', '', 'SSL'));
}

if (!tep_session_is_registered('adult_pwd')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name,'get' => array('products_id'=>$_GET['products_id'],'cPath'=>$_GET['cPath'],'list'=>$_GET['list'])));
	tep_redirect(FILENAME_LOGIN_ADULTPWD);
}  


if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name,'get' => array('products_id'=>$_GET['products_id'],'cPath'=>$_GET['cPath'],'list'=>$_GET['list'])));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private_adult.php'));

require('configure/application_bottom.php');
?>