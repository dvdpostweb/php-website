<?php 
require('configure/application_top.php');

$current_page_name = 'contest_process.php';

include(DIR_WS_INCLUDES . 'translation.php');
  $q1 = tep_db_prepare_input($HTTP_POST_VARS['Q1']);
  switch($languages_id){
	case 1:
		$active='active_fr';		
		break;
		
	case 2:
		$active='active_nl';
		break;
		
	case 3:
		$active='active_en';
		break;
}
if(isset($HTTP_POST_VARS['marketing']))
	$marketing='YES';
else
	$marketing='NO';

$contest = tep_db_query("select  contest_name_id from contest_name where ".$active."=1 and validity>now() order by validity ASC ");  
$contest_values = tep_db_fetch_array($contest);
$contest_name = $contest_values['contest_name_id'];//

$unsubscribe_query = tep_db_query("select count(unsubscribe) as cpt from contest where email='".$quizz_mail."'and unsubscribe = 1");
$unsubscribe_values = tep_db_fetch_array($unsubscribe_query);
if ($unsubscribe_values['cpt']>0 ){$unsubscribe= 1;}
else{$unsubscribe= 0;}

  
  if (tep_session_is_registered('customer_id')) {
		$customers = tep_db_query("select customers_email_address, customers_firstname, customers_lastname from " . TABLE_CUSTOMERS. "  where customers_id= '". $customer_id ."'");  
		$customers_values = tep_db_fetch_array($customers);
		tep_db_query("INSERT INTO contest ( contest_id , date , language_id , customers_id , email , pseudo , contest_name_id , answer_id, site , EntityID, unsubscribe ,marketing_ok) VALUES ('', now(), '". $languages_id ."','" . $customer_id . "', '" . $customers_values['customers_email_address'] . "', '" . addslashes($customers_values['customers_firstname']) . "', '" . $contest_name . "', '" . $q1 . "', '" . WEB_SITE . "', '" . ENTITY_ID . "', '".$unsubscribe."','".$marketing."') ");
  }else{
		$name = tep_db_prepare_input($HTTP_POST_VARS['name']);
		$email = tep_db_prepare_input($HTTP_POST_VARS['email']);
		
		if(empty($q1))
			tep_redirect(tep_href_link('contest_public.php?error=empty'));
		else
		{
			if(!empty($HTTP_POST_VARS['email']) && true===mail_verify($HTTP_POST_VARS['email']))
			{
				$sql="select count(unsubscribe) as cpt from contest where email like '".$HTTP_POST_VARS['email']."' and contest_name_id = ".$contest_name;
				$duplicate_query = tep_db_query($sql,true);
				$duplicate_values = tep_db_fetch_array($duplicate_query);
				if($duplicate_values['cpt']==0)
					tep_db_query("INSERT INTO contest ( contest_id , date , language_id , customers_id , email , pseudo , contest_name_id , answer_id, site ,  EntityID, unsubscribe ,marketing_ok) VALUES ('', now(), '". $languages_id ."','0', '" . $email . "', '".addslashes($name)."', '" . $contest_name . "', '" . $q1 . "', '" . WEB_SITE . "', '" . ENTITY_ID . "' , '".$unsubscribe."','".$marketing."') ");
					else
						tep_redirect(tep_href_link('contest_public.php?error=duplicate'));
			}
			else
				tep_redirect(tep_href_link('contest_public.php?error=email'));
		}
  	}

  
$page_body_to_include = $current_page_name;


if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}

require('configure/application_bottom.php');

?>