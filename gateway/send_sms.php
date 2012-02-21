<?php
require('../configure/application_top.php');

$current_page_name = 'step3c.php';

include(DIR_WS_INCLUDES . 'translation.php');

if(!empty($_GET['number']) && tep_session_is_registered('customer_id'))
{
	$number=$_GET['number'];
	$code = tep_create_password(4);
	$request =  'http://www.mobiletrend.fr/Ext';
	$format = 'push.asp';   // this can be xml, json, html, or php
	$args .= 'number='.$number;
	//$text=urlencode(utf8_encode("test d'envoi sms étoile"));
	$text=SMS_TEXT;
	$text=str_replace('[code]',$code,$text);
	$text=urlencode($text);
	$args .= '&content='.$text;
	$args .= '&senderid=DVDPost';
	


	// Get and config the curl session object
	//echo $request.'/'.$format.'?'.$args;
	$session = curl_init($request.'/'.$format.'?'.$args);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	    //execute the request and close
	$response = curl_exec($session);
	curl_close($session);
	$value=intval($response);
	if(is_numeric($value) && $value > 0)
	{
		$sql='insert into registration_sms_status (customers_id,code,status,senderid,create_date,create_time,phone) values ('.$customer_id.',"'.$code.'","PENDING",'.$value.',now(),now(),"'.$number.'")';
		tep_db_query($sql);
		echo 'ok';
	}
	else
	{
		echo 'error';
	}
}
else
{
	echo 'error';
}
?>