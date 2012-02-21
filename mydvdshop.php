<?php
require('configure/application_top.php');

$current_page_name = 'mydvdshop.php';
//$current_page_name = 'mydvdpost.php';

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	tep_redirect(tep_href_link('mydvdshop_public.php', '', 'SSL'));
}else{
	


include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop.php'));

require('configure/application_bottom.php');

}
?>