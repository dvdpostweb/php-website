<?php  

header('Content-Type: text/html; charset=ISO-8859-1');

require('configure/application_top.php');
if(!empty($_GET['page']))
	$current_page_name =$page;
else
	$current_page_name = 'step1.php';

include(DIR_WS_INCLUDES . 'translation.php');

$page_body_to_include = $current_page_name;
switch($action){
case 'redbox':
	$redbox_count_query = tep_db_query("select count(1) as nb from post_redbox where post_code = '" . $HTTP_GET_VARS['wherezip'] . "'");
	$redbox_count = tep_db_fetch_array($redbox_count_query);
	if($redbox_count['nb']>0){
		echo '<br><table width=100% bgcolor=#fce3c6><tr><td width= 100%><br><font color="red" size="2">&nbsp;<b>' . TEXT_REDBOXADRRESS . ':   </b></font><SELECT ID="post_redbox_id" NAME="post_redbox_id">';
		echo '<OPTION value="0">' . TEXT_PLEASE_SELECT . '</OPTION>';
		$redbox_query = tep_db_query("select * from post_redbox where post_code = '" . $HTTP_GET_VARS['wherezip'] . "' order by street_address");  
	
		while ($redbox = tep_db_fetch_array($redbox_query)) {
			echo '<OPTION value="' . $redbox['post_redbox_id'] . '">' . $redbox['street_address'] . ' ' . $redbox['street_number'] . '</OPTION>';
		}
		echo '</SELECT>';
		if ($HTTP_GET_VARS['error'] == 'noredbox'){
			echo ' <font color=red><b>' . TEXT_ERROR_NOREDBOX . '</b></font><br>';
		}
		echo '<br><br></td></tr></table>';
	}
	else
	{
		echo '<input type="hidden" name="post_redbox_id" value="-2">';
	}
break;
default:
	if (!mail_verify(trim($_POST['email']))) {	
		$error= 'error2';
	}else{ 
		$is_client ="select customers_id,customers_abo,`customers_registration_step`   from customers where customers_email_address='".trim($_POST['email'])."'";
		$is_client_query=tep_db_query($is_client);
		$is_client_values = tep_db_fetch_array($is_client_query);
		if ($is_client_values['customers_id']>0 )
		{
			if($is_client_values['customers_abo']== 0 &&  $is_client_values['customers_registration_step'] < 100)
			{
				$error= 'error3';
			}
			else
			{
				$error= 'error1';
			}
		}
		else
		{
			$error='ok';
		}
	}
	echo $error;
}
//include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step.php'));

require('configure/application_bottom.php');

?>
