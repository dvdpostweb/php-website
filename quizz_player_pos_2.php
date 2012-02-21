<?php 
require('configure/application_top.php');
?>
<style type="text/css">
<!--
.Style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<?php

/***************************************************************************/
// Parse les var. pour flash afin de lui envoyer dans le bon format 
function Parse($variable,$valeur) {
echo "&" . $variable . "=" . urlencode(utf8_encode($valeur));
}
/***************************************************************************/

$customerzz=$HTTP_POST_VARS['customerzz'];
$quizz_name_id =$HTTP_POST_VARS['quizz_name_id'];
$quizz_mail=$HTTP_POST_VARS['quizz_mail'];
$quizz_lang=$HTTP_POST_VARS['quizz_lang'];

if(empty($quizz_name_id))
	die('no id');
$sql_max="SELECT `maxpoints`FROM `quizz_name`WHERE `quizz_name_id` =".$quizz_name_id;
$maxpoints = tep_db_query($sql_max);
$maxpoints_values = tep_db_fetch_array($maxpoints);

$sql="SELECT count(pseudo) AS usr_played, max(score) AS usr_bestscore, min(date) AS usr_date, email , customers_id FROM quizz where quizz_name_id=".$quizz_name_id." AND score < " .$maxpoints_values['maxpoints'] . " GROUP BY pseudo, customers_id ORDER BY usr_bestscore DESC";
$info_player = tep_db_query($sql);




$i=1;
while ($info_player_values = tep_db_fetch_array($info_player)){
	if (($customerzz >0 && $info_player_values['customers_id'] == $customerzz) || $info_player_values['email'] == $quizz_mail)
	{
			$usr_pos= $i;
			$usr_bestscore= $info_player_values[usr_bestscore];
			$usr_played= $info_player_values[usr_played];
			$usr_date= $info_player_values[usr_date];
			$usr_date= substr($usr_date, 0, 10);
	}
	$i++;
}
	
$num_player = mysql_num_rows($info_player);

		switch($quizz_lang){
		case 1:
			$player_infos ='<br>';
			$player_infos .='votre position est :<font color="#FFCCFF"> '. $usr_pos .' sur '. $num_player .'</font><br><br>';
			$player_infos .='votre meilleur score est:<font color="#FFCCFF"> '. $usr_bestscore .' points</font><br><br>';
			$player_infos .='vous avez joué :<font color="#FFCCFF">'. $usr_played .'</font> fois à ce QUIZZ <br>Depuis le '.$usr_date.'<br><br>';
		break;
		case 2:
			$player_infos ='<br>';
			$player_infos .='Uw rangschikking:<font color="#FFCCFF"> '. $usr_pos .'ste op '. $num_player .'</font><br><br>';
			$player_infos .='Uw beste score is:<font color="#FFCCFF"> '. $usr_bestscore .' punten</font><br><br>';
			$player_infos .='U speelde deze kwis: <font color="#FFCCFF">'. $usr_played .'</font> maal<br>Sinds '.$usr_date.'<br><br>';
		break;
		case 3:
			$player_infos ='<br>';
			$player_infos .='Your position: <font color="#FFCCFF"> '. $usr_pos .' out of '. $num_player .'</font><br><br>';
			$player_infos .='Your best score: <font color="#FFCCFF"> '. $usr_bestscore .' points</font><br><br>';
			$player_infos .='You have played <font color="#FFCCFF">'. $usr_played .'</font> times <br>Since the '.$usr_date.'<br><br>';
		break;
		}

Parse("plinfo",$player_infos);
?>

