<table width="180" height="150" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <?php  
		$sql_quizz="select * from quizz_name where focus =1";	
		$quizz_values_tab= tep_db_cache($sql_quizz,14400);
		$quizz_values=$quizz_values_tab[0];
		$banner=$quizz_values['banner'];		
	
    	echo '<td><a href="quizz.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/'.$banner.'?v=2" border="0" alt="Quizz DVDPost"></a></td>';
	?>
	</tr>
</table>