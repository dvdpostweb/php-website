<?php  
$jaquette='jaquette';

switch($languages_id){
	case 1:
		$title='title_fr';
		$question='question_fr';
		$choice='choice_fr';
		$active='active_fr';
				
		break;
		
	case 2:
		$title='title_nl';
		$question='question_nl';
		$choice='choice_nl';
		$active='active_nl';
		break;
		
	case 3:
		$title='title_en';
		$question='question_en';
		$choice='choice_en';
		$active='active_en';
		break;
}


$sql="select  contest_name_id, ".$title." as title, ".$jaquette." as jaquette, ".$question." as question, ".$choice." as choice, validity,banner  from contest_name where ".$active."=1 and validity>now() order by validity asc limit 1 ";


$contest_values_tab = tep_db_cache($sql,14400);
$contest_values=$contest_values_tab[0];
$banner=$contest_values['banner'];


?>
<table width="180" height="150" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<?php  
	  	echo '<td><a href="contest.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/'.$banner.'" border="0" alt="'. CONTEST_ALT_IMAGE .'"></a></td>';
	?>
	</tr>
</table>