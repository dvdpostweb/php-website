<?php
require('configure/application_top.php');
require('includes/classes/actions.php');
$uniq_id=$_GET['uniq_id'];
if(isset($_GET['url_back']))
	$url_back= $_GET['url_back'];
$actions=new Actions();
$return = $actions->execute($uniq_id);
switch($return['error'])
{
	case Actions::UNIQ_ID_EMPTY:
		header('Location: /expired.php');
	break;
	case Actions::UNIQ_ID_NOT_EXIST:
		header('Location: /expired.php');
	break;
	case Actions::UNIQ_ID_EXPIRED:
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','script expiré',$uniq_id,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		if(empty($return['error_link']))
			header('Location: /expired.php');
		else
			header('Location: '.$return['error_link']);
		
	break;
	case Actions::SCRIPT_NOT_EXIST:
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','script cassé',$uniq_id,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		header('Location: /error.php?code=404');
	break;
	case Actions::ERROR_SCRIPT:
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','erreur du script',$uniq_id,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		header('Location: /error.php?code=404');
	break;
	case Actions::ERROR_FINISH:
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','erreur de la class (db)',$uniq_id,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		header('Location: /error.php?code=404');
	break;
	case Actions::CLASS_NOT_EXIST:
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','erreur de la class (not found)',$uniq_id,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		header('Location: /error.php?code=404');
	break;
	
	case -1:
	$var_customers_id =$return['name'].'customers';
	$var_status=$return['name'].'status';
	$$var_customers_id=$return['customers_id'];
	$$var_status=true;
	tep_session_register($var_customers_id);
	tep_session_register($var_status);
	
	$link = $return['link'];
	if( isset($url_back) )
	{
		$link.='?url_back='.rawurlencode($url_back);
	}
	
	header('Location: '. $link);
}
require('configure/application_bottom.php');

?>