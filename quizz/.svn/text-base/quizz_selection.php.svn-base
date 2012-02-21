<?php
require('../configure/application_top.php');
require('../includes/classes/Cryptage.php');
$cryptage = new Cryptage("mb3dyfx6ilk");
function replace($txt)
{
	return str_replace('%C2%92','%27',$txt);
}
function Parse($variable,$valeur) {
echo "&" . $variable . "=" . replace(urlencode(utf8_encode($valeur)));
}
$_GET['lang']=intval($_GET['lang']);
if(empty($_GET['lang']))
	$_GET['lang']=1;
$sql='SELECT * FROM quizz_creator q where quizz_id='.$_GET['quizz_id'].' and language_id ='.$_GET['lang'];

$products = tep_db_query($sql,'db_link',true);
$nb=0;
while($products_value = tep_db_fetch_array($products)){
	$nb++;
 	Parse('q_'.$nb,$products_value['question']); 
 	Parse('r1_'.$nb,$products_value['r1']); 
 	Parse('r2_'.$nb,$products_value['r2']); 
 	Parse('r3_'.$nb,$products_value['r3']); 
 	Parse('r4_'.$nb,$products_value['r4']); 
	$str_point=$products_value['points1'].'_'.$products_value['points2'].'_'.$products_value['points3'].'_'.$products_value['points4'];
	$crypt_str_point = $cryptage->encode($str_point);
 	Parse('point_'.$nb,$crypt_str_point); 
}
$sql='SELECT * FROM `quizz_details` where quizz_id='.$_GET['quizz_id'].' and language_id ='.$_GET['lang'];

$details = tep_db_query($sql,'db_link',true);

while($details_value = tep_db_fetch_array($details))
{
	Parse($details_value['property'],$details_value['value']);	
}
Parse(nb,$nb);



?>