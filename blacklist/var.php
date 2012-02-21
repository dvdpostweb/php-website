<?php  
require('../configure/application_top.php');
$sql = 'select * from mail_messages where mail_messages_id in (6  ,52 ,54 ,68 ,99 ,100 ,104 ,218 ,281 ,298 ,321 ,322 ,356 ,393 ,395 ,399 ,402 ,437 ,438 ,446 ,447 ,448 ,449 ,450 ,451 ,452 ,453 ,554 ,555 ,556 ,557 ,558 ,560)';

function format2($mail_id,$text,$dico)
{
	
	preg_match_all("/\\$\\$\\$(\w+)\\$\\$\\$/", $text, $extract_variable);
	foreach ($extract_variable[1] as $item)
	{
		if (strpos($dico, $item) === false) 
		{
			$sql2='select count(*) nb from translations.mail_variables where var_key="'.$item.'"';
			$query_var=tep_db_query($sql2);
			$var = tep_db_fetch_array($query_var);
			$dico .= $mail_id.' $$$'.$item.'$$$ <br />';
/*			if($var['nb']==0)
			{
				$dico .= $mail_id.' $$$'.$item.'$$$ <br />';
				$sql3="insert into translations.mail_variables (var_key,created_at,updated_at) values ('".$item."',now(),now())";
				$query_var=tep_db_query($sql3);
			}
*/
		}
	}
	return $dico;
}
$query=tep_db_query($sql);
$dico='';
while($mail= tep_db_fetch_array($query))
{
	$text=$mail['messages_html'];
	$dico = format2($mail['mail_messages_id'],$text,$dico);
}
var_dump($dico);