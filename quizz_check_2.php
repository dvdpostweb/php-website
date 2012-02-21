<?php
require('configure/application_top.php');
/***************************************************************************/
// Parse les var. pour flash afin de lui envoyer dans le bon format 
function parse($variable,$valeur)
{
echo "&$variable=$valeur";
}
/***************************************************************************/

$customerzz=$HTTP_POST_VARS['customerzz'];
$customers = tep_db_query("select customers_email_address, customers_firstname  from " . TABLE_CUSTOMERS. "  where customers_id=". $customerzz );  
$customers_values = tep_db_fetch_array($customers);
	
	
$quizz_name_id =$HTTP_POST_VARS['quizz_name_id'];
if(empty($quizz_name_id))
	die('no ID');
$quizz_mail=$customers_values['customers_email_address'];
$quizz_pseudo=$customers_values['customers_firstname'];
$quizz_points=$HTTP_POST_VARS['quizz_points'];
$quizz_point=$HTTP_POST_VARS['quizz_point'];
if ($quizz_point>$quizz_points){$quizz_points=$quizz_point;}
$quizz_lang=$HTTP_POST_VARS['quizz_lang'];
$quizz_nbrofquestions=$HTTP_POST_VARS['nbrofquestions'];

$maxpoints = tep_db_query("SELECT `maxpoints`FROM `quizz_name`WHERE `quizz_name_id` =".$quizz_name_id."");
$maxpoints_values = tep_db_fetch_array($maxpoints);
if ($maxpoints_values['maxpoints']>= $quizz_points){
 tep_db_query("INSERT INTO quizz ( quizz_id , date , language_id , customers_id , email , pseudo , quizz_name_id , score, nbrofquestions ) VALUES ('', now() , '" . $quizz_lang . "', '" . $customerzz . "', '" . $quizz_mail . "', '" . $quizz_pseudo . "', '" . $quizz_name_id . "', '" . $quizz_points . "', '" . $quizz_nbrofquestions . "' )");
}	

parse("quizz_pseudo",$HTTP_COOKIE_VARS['first_name']);
parse("quizz_mail",$customers_values['customers_email_address']);

parse("customerzz",$customerzz);

  // ----- test si l'insertion s'est bien passée
  
  if ($r) parse("ok",1);
  else parse("ok",0);
  
 // ----- traitement terminé
  parse("done",1);
  echo "ok";
require('configure/application_bottom.php');
?>