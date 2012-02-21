<?php  
require('configure/application_top.php');
require('includes/classes/sha256.php');
/***************************************************************************/
// Parse les var. pour flash afin de lui envoyer dans le bon format 
function parse($variable,$valeur)
{
echo "&$variable=$valeur";
}
/***************************************************************************/

$quizz_name_id =$_POST['quizz_name_id'];
if(empty($quizz_name_id))
	die('&data=no id');

$customerzz =$_POST['customerzz'];
if(empty($customerzz ))
	$customerzz =0;
$quizz_mail=$_POST['quizz_mail'];
$quizz_pseudo=$_POST['quizz_pseudo'];
$quizz_points=$_POST['quizz_points'];
$quizz_point=$_POST['quizz_point'];
$quizz_sub_ask=(!empty($_POST['sub'])?$_POST['sub']:0);
$quizz_lang=$_POST['quizz_lang'];
$quizz_nbrofquestions=$_POST['nbrofquestions'];
$token=$_POST['token'];
$reo=$_POST['rep'];
$sha=new nanoSha2();
$code='t3llm3m03'.$quizz_pseudo.$quizz_mail.$quizz_lang.$quizz_name_id.$quizz_points.$nb_rep.$quizz_nbrofquestions.$rep;
if($quizz_name_id > 35)
{
	$code=$sha->hash($code,false);
	if($code!=$token)
	{
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','quizz hack',$quizz_pseudo.'.'.$quizz_email.'.'.$quizz_nbrofquestions,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		die('&data=hack');
	}
}
if(!empty($_POST['quizz_marketing_ok']))
{
	$quizz_marketing_ok=(($_POST['quizz_marketing_ok']=='true')?'YES':'NO');
}
else
{
	$quizz_marketing_ok='NOTYET';
}


if ($quizz_point>$quizz_points){$quizz_points=$quizz_point;}




$unsubscribe_query = tep_db_query("select count(unsubscribe) as cpt from quizz where email='".$quizz_mail."'and unsubscribe = 1");
$unsubscribe_values = tep_db_fetch_array($unsubscribe_query);
if ($unsubscribe_values['cpt']>0 ){$unsubscribe= 1;}
else{$unsubscribe= 0;}

$maxpoints = tep_db_query("SELECT `maxpoints`FROM `quizz_name`WHERE `quizz_name_id` =".$quizz_name_id."");
$maxpoints_values = tep_db_fetch_array($maxpoints);

$sql="INSERT INTO quizz (  date , language_id , customers_id , email , pseudo , quizz_name_id , score, nbrofquestions, site , EntityID , unsubscribe , sub_ask,marketing_ok,secure) VALUES ( now() , '" . $quizz_lang . "' , '" . $customerzz . "' , '" . $quizz_mail . "' , '" . $quizz_pseudo . "' , '" . $quizz_name_id . "', '" . $quizz_points . "', '" . $quizz_nbrofquestions . "', '" . WEB_SITE . "', '" . ENTITY_ID . "', '".$unsubscribe."','".$quizz_sub_ask."','".$quizz_marketing_ok."','".$quizz_pseudo.$quizz_mail.$quizz_lang.$quizz_name_id.$quizz_points.$nb_rep.$quizz_nbrofquestions.$rep.$token."' )";	
 tep_db_query($sql);

//tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','quizz error',$maxpoints_values['maxpoints'].'.'.$sql,'bugreport@dvdpost.be','bugreport@dvdpost.be');
parse("customerzz",$customerzz);


  // ----- test si l'insertion s'est bien passée
  if ($r) parse("ok",1);
  else parse("ok",0);
  
 // ----- traitement terminé
 parse("done",1);
 parse("data",1);
  echo "ok";
require('configure/application_bottom.php');
?>