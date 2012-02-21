<?php
require('configure/application_top.php');

$current_page_name = FILENAME_PRODUCT_INFO_PUBLIC;

  $get_params = tep_get_all_get_params();
  $get_params_back = tep_get_all_get_params(array('reviews_id')); // for back button
  $get_params = substr($get_params, 0, -1); //remove trailing &
  if ($get_params_back != '') {
  $get_params_back = substr($get_params_back, 0, -1); //remove trailing &
  } else {
  $get_params_back = $get_params;
  }
$HTTP_GET_VARS['products_id']=intval($HTTP_GET_VARS['products_id']);
$products_id=$_GET['products_id']=$HTTP_GET_VARS['products_id'];
if ($HTTP_GET_VARS['products_id'] > 0){	
}else{
	tep_redirect(tep_href_link('default.php', '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$page_body_to_include = $current_page_name;

$meta_query = tep_db_query("select products_title,products_description,products_type,products_image_big from products p 
join products_description pd  on p.products_id=pd.products_id
where p.products_id=".$_GET['products_id']." and language_id=".$languages_id);
$meta_value = tep_db_fetch_array($meta_query);	
$strmeta = $meta_value['products_title'];
$strdescription =htmlspecialchars($meta_value['products_title'].' : '.$meta_value['products_description']);
$strtitle =htmlspecialchars($meta_value['products_title']);

if($meta_value['products_type']=='DVD_NORM')
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
else
{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_movix.php'));
}
require('configure/application_bottom.php');
?>