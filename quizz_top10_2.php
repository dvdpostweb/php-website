<?php
require('configure/application_top.php');
/***************************************************************************/
// Parse les var. pour flash afin de lui envoyer dans le bon format 
function parse($variable,$valeur)
{
echo "&$variable=$valeur";
}
/***************************************************************************/
$quizz_name_id =$HTTP_POST_VARS['quizz_name_id'];
if(empty($quizz_name_id))
	$quizz_name_id =$HTTP_GET_VARS['quizz_name_id'];

if(empty($quizz_name_id))
	die('no id');	
	
$i=1;
if ($quizz_name_id >3){
	$maxpoints = tep_db_query("SELECT `maxpoints`FROM `quizz_name`WHERE `quizz_name_id` =".$quizz_name_id."");
	$maxpoints_values = tep_db_fetch_array($maxpoints);
	$top10 = tep_db_query("SELECT pseudo, max( `score` ) AS ced FROM quizz where quizz_name_id=".$quizz_name_id." AND score <= ".$maxpoints_values['maxpoints']." GROUP BY pseudo, customers_id ORDER BY `ced` DESC LIMIT 0 , 5");
}else{	
	$top10 = tep_db_query("SELECT pseudo, max( `score` ) AS ced FROM quizz where quizz_name_id=".$quizz_name_id." GROUP BY pseudo, customers_id ORDER BY `ced` DESC LIMIT 0 , 5");
}
while ($top10_values = tep_db_fetch_array($top10)) {		
	$val="$top10_values[pseudo]";//show the playername
	$val2="$top10_values[ced]";//show the playerpoints
	parse($i,utf8_encode($val));
	parse($i.'b',$val2);
	$i++;
}
for($j=$i;$j<=5;$j++)
{
	parse($j,'');
	parse($j.'b','');
}
require('configure/application_bottom.php');

?>