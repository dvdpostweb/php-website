<?php
require('configure/application_top.php');
//die();
$current_page_name = 'survey.php';

include(DIR_WS_INCLUDES . 'translation.php');


$var_status='surveystatus';
$var_customers_id ='surveycustomers';

if(!tep_session_is_registered($var_status) || $$var_status!==true )
{
	header('Location: /expired.php');
	die();
}

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
$page_body_to_include = $current_page_name;

if(!empty($_POST['q1']) || !empty($_POST['q2']))
{
	$sql='update customers_abo_stop set comment_users="'.addslashes($_POST['q1']).'",prevent_users="'.addslashes($_POST['q2']).'" where customers_id = '.$$var_customers_id. ' order by date_stop desc limit 1';
	tep_db_query($sql);
	$$var_customers_id=0;
	$$var_status=false;
	tep_session_register($var_customers_id);
	tep_session_register($var_status);
	$action=2;
}
else
{
	$action=1;
}
   	
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));

require('configure/application_bottom.php');

?>