<?php 

require('configure/application_top.php');

if ($HTTP_POST_VARS['ccnum1']< 1){
tep_redirect('cc_form.php?error=1&ccnum1='.$HTTP_POST_VARS['ccnum1'].'&ccnum2='.$HTTP_POST_VARS['ccnum2'].'&ccnum3='.$HTTP_POST_VARS['ccnum3'].'&ccnum4='.$HTTP_POST_VARS['ccnum4']);	
}

if ($HTTP_POST_VARS['ccnum2']< 1){
tep_redirect('cc_form.php?error=1&ccnum1='.$HTTP_POST_VARS['ccnum1'].'&ccnum2='.$HTTP_POST_VARS['ccnum2'].'&ccnum3='.$HTTP_POST_VARS['ccnum3'].'&ccnum4='.$HTTP_POST_VARS['ccnum4']);	
}

if ($HTTP_POST_VARS['ccnum3']< 1){
tep_redirect('cc_form.php?error=1&ccnum1='.$HTTP_POST_VARS['ccnum1'].'&ccnum2='.$HTTP_POST_VARS['ccnum2'].'&ccnum3='.$HTTP_POST_VARS['ccnum3'].'&ccnum4='.$HTTP_POST_VARS['ccnum4']);	
}

if ($HTTP_POST_VARS['ccnum4']< 1){
tep_redirect('cc_form.php?error=1&ccnum1='.$HTTP_POST_VARS['ccnum1'].'&ccnum2='.$HTTP_POST_VARS['ccnum2'].'&ccnum3='.$HTTP_POST_VARS['ccnum3'].'&ccnum4='.$HTTP_POST_VARS['ccnum4']);	
}

if (!isset($HTTP_POST_VARS['cc_months']) || !isset($HTTP_POST_VARS['cc_years'])){
tep_redirect('cc_form.php?error=2');	
}
if (preg_match("/^4/", $HTTP_POST_VARS['ccnum1'], $matches)) {
	$type='Visa';
}
else if(preg_match("/^37/", $HTTP_POST_VARS['ccnum1'])|| preg_match("/^34/", $HTTP_POST_VARS['ccnum1'], $matches))
{
	$type='American Express';
}
else if(preg_match("/^51/", $HTTP_POST_VARS['ccnum1'])|| preg_match("/^52/", $HTTP_POST_VARS['ccnum1'])|| preg_match("/^53/", $HTTP_POST_VARS['ccnum1'])|| preg_match("/^54/", $HTTP_POST_VARS['ccnum1'], $matches)|| preg_match("/^55/", $HTTP_POST_VARS['ccnum1'], $matches))
{
	$type='MasterCard';
}

$number=$HTTP_POST_VARS['ccnum1'] . $HTTP_POST_VARS['ccnum2'] . $HTTP_POST_VARS['ccnum3'] . $HTTP_POST_VARS['ccnum4'];
$verif=luhn_check($number);
if($verif===true)
{
	tep_db_query("update customers set  ".((isset($type))?"ogone_card_type='".$type."',":"")." ogone_cc_expiration_status='2', ogone_card_no='".$HTTP_POST_VARS['ccnum1'] . $HTTP_POST_VARS['ccnum2'] . $HTTP_POST_VARS['ccnum3'] . $HTTP_POST_VARS['ccnum4']."' , ogone_owner='".strtoupper($HTTP_POST_VARS['ccowner'])."', ogone_exp_date='".$HTTP_POST_VARS['cc_months'].$HTTP_POST_VARS['cc_years']."' where customers_id = '".$customer_id."'");
	tep_redirect('/cc_complete.php');
}
else
{
	tep_redirect('/cc_form.php?error=1&ccnum1='.$HTTP_POST_VARS['ccnum1'].'&ccnum2='.$HTTP_POST_VARS['ccnum2'].'&ccnum3='.$HTTP_POST_VARS['ccnum3'].'&ccnum4='.$HTTP_POST_VARS['ccnum4']);
}
?>
