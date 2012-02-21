<?php
require('configure/application_top.php');
//die();
$current_page_name = 'nps.php';

include(DIR_WS_INCLUDES . 'translation.php');



if(!tep_session_is_registered('customer_id') )
{
	header('Location: /login.php');
	die();
}

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
$page_body_to_include = $current_page_name;
if(!empty($_POST['r1']))
{
	if(!empty($_POST['r1']))
	{	
		$sql='insert into survey_responses (survey_question_id,customers_id,value) values (1,'.$customer_id.',"'.$_POST['r1'].'")';
		tep_db_query($sql);
	}
	if(!empty($_POST['r2']))
	{	
		$sql='insert into survey_responses (survey_question_id,customers_id,value) values (2,'.$customer_id.',"'.$_POST['r2'].'")';
		tep_db_query($sql);
	}
	if(!empty($_POST['r3']))
	{	
		$sql='insert into survey_responses (survey_question_id,customers_id,value) values (3,'.$customer_id.',"YES")';
		tep_db_query($sql);
	}
	else
	{
		$sql='insert into survey_responses (survey_question_id,customers_id,value) values (3,'.$customer_id.',"NO")';
		tep_db_query($sql);
	}
		
	$action=2;
}
else
{
	$action=1;
}
   	
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));

require('configure/application_bottom.php');

?>