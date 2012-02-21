<?php
require('configure/application_top.php');
if(empty($HTTP_GET_VARS['lang']))
	$HTTP_GET_VARS['lang']='fr';
	
if (!tep_session_is_registered('customer_id')) {
tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}else{
	
	
	
tep_rating_filter($HTTP_GET_VARS['movieid'],0,$HTTP_GET_VARS['value'],$HTTP_GET_VARS['lang'],$customer_id,'DVD_ADULT');

tep_redirect($HTTP_GET_VARS['url']);
}
  require(DIR_WS_INCLUDES . 'stat.php');

?>
