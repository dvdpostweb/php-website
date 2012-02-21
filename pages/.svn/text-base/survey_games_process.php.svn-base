<?php
$survey_query = tep_db_query("select count(*) as cpt from survey_result_master where name='GAMES_SURVEY' and customers_id='".$customer_id."'" );
$survey = tep_db_fetch_array($survey_query);
if ($survey['cpt'] == 0){
	$survey_query = tep_db_query('select * from survey_def_master where name="GAMES_SURVEY" ' );
	while($survey = tep_db_fetch_array($survey_query)){
		$answ=$_POST['q'.$survey['question_id']];
		$cpt=0;
		while (list($id) = each($answ) ){
			if ($cpt++ >0){ $answer.=' , '.$answ[$id]; }
			else{$answer=$answ[$id];}
			$cpt++;
		
		} 
		$query="INSERT INTO survey_result_detail (name,question_id,customers_id,answer_value) VALUES ('GAMES_SURVEY','".$survey['question_id']."' ,'".$customer_id."','".$answer."')";
		$result=mysql_query($query);
		
		$query_master="INSERT INTO survey_result_master (name,customers_id,date, complete) VALUES ('GAMES_SURVEY','".$customer_id."', NOW() , '1')";
		$result_master=mysql_query($query_master);
		 
	}
	
	echo '<br><div align="center">'.TEXT_THANCKS.'<br><a class="red_slogan" href="mydvdpost.php">'.TEXT_BACK.'</a></div>';
}
else { echo '<br><div align="center">'.TEXT_ALREADY_DONE.'<br><a class="red_slogan" href="mydvdpost.php">'.TEXT_BACK.'</a></div>';  } 
?> 
