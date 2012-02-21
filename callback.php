<?php 
require('configure/application_top.php');

$current_page_name = 'contacts.php';

include(DIR_WS_INCLUDES . 'translation.php');

$error_cpt=0;
if(!empty($_POST['lastname']))
{
	$error_cpt++;
}
if (isset($_POST['name']) && $_POST['name']==''){
	$name=$_POST['name'];
	$error_cpt++;
}
$phone_ok=preg_match('/^(\+)?[0-9 \-\/.]+$/',$_POST['phone']);
if($phone_ok==0)
{
	$error_cpt++;
}
if (isset($_POST['phone']) && $_POST['phone']==''){
	$phone=$_POST['phone'];
	$error_cpt++;
}
if($_POST['day']=='cal'){
	if (empty($_POST['whendate'])){
		$day=$_POST['whendate'];
		$error_cpt++;
	}
}
if (isset($_POST['creneau']) && $_POST['creneau']==''){
	$hour=$_POST['creneau'];
	$error_cpt++;
}

if (isset($_POST['reason']) && $_POST['reason']==''){
	$reason=$_POST['reason'];
	$error_cpt++;
}


$language_user=$language_id;


$customer=$customer_id;
if ($error_cpt == 0){
	$sql="INSERT INTO phone_request ( id , name, phone, customers_id , language_id , call_me_day , call_me_hour , call_me_reason , entity_id , call_answerd )VALUES (NULL ,'".$_POST['name']."','".$_POST['phone']."' , '".$customer."', '".$language_user."', UNIX_TIMESTAMP('".$_POST['whendate']."'), '".$_POST['creneau']."', '".$_POST['reason']."', '".ENTITY_ID."', '0')";
	tep_db_query($sql);	
	tep_redirect(tep_href_link('contact.php?sent=2&day='.$_POST['whendate'].'&creneau='.$_POST['creneau'].' '));
}else{
	tep_redirect(tep_href_link('contact.php?name='.$name.'&phone='.$phone.'&day='.$day.'&creneau='.$hour.'&reason='.$reason.'&error_cpt='.$error_cpt.' '));
}
?>