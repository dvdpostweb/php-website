<?php 
$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('index.php', '', 'SSL'));
}else{
	if ($customers_registration_step!=100){
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));
	}else{
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));	
	}
}
?>