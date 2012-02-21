<style>
.surv_question{
	font:Verdana, Arial, Helvetica, sans-serif;
	font-size:14px;
	color:#FFFFFF;
	font-weight:bold;
	text-decoration:underline;
	margin-left:10px;
	margin-right:10px;
	margin-top:10px;
	padding-top:5px;
	padding-bottom:5px;
	padding-left:8px;
	background-color:#666666;
}

.surv_proposal{
	font:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#333333;
	background-color:#CCCCCC;
	border: 1px solid #666666;
	margin-left:10px;
	margin-right:10px;
	margin-bottom:10px;
	padding-left:15px;
	padding-right:15px;
	padding-top:15px;
	padding-bottom:15px;
	vertical-align:middle;
	line-height:25px;
}

.align_button { vertical-align: -4px } 

</style>
<br />
<?php
$survey_query = tep_db_query("select count(*) as cpt from survey_result_master where name='GAMES_SURVEY' and customers_id='".$customer_id."'" );
$survey = tep_db_fetch_array($survey_query);
if ($survey['cpt'] == 0){
	echo '<form name="form1" method="post" action="survey_games_process.php">';
	echo '<div align="center"><img src="'.DIR_WS_IMAGES.'survey_games/banner_games.jpg"></div>';
	$survey_query = tep_db_query('select * from survey_def_master where name="GAMES_SURVEY" and language_id='.$languages_id );
	while($survey = tep_db_fetch_array($survey_query)){
		echo '<div class="surv_question">'.$survey['description'].'</div><div class="surv_proposal">';
		$survey_question_query = tep_db_query('select * from survey_def_detail where name="GAMES_SURVEY" and question_id= '.$survey['question_id'] .' and language_id='.$languages_id);
		while($survey_question = tep_db_fetch_array($survey_question_query)){
			switch ($survey_question['display_type']){
				case "text":
					echo $survey_question['answer_label'].'<input class="surv_proposal" name="q'.$survey_question['question_id'].'[]" type="text" value=""><br>';
					break;
				case "radio":
					echo '<input class="align_button" align="absmiddle"  name="q'.$survey_question['question_id'].'[]" type="radio" value="'.$survey_question['answer_id'].'">'.$survey_question['answer_label'].'<br>';
					break;
				case "check":
					echo '<input class="align_button" align="absmiddle"  name="q'.$survey_question['question_id'].'[]" type="checkbox" value="'.$survey_question['answer_id'].'">'.$survey_question['answer_label'].'<br>';	
					break;
			}
		}
		echo '</div>';
	}
?> 
	<p>&nbsp;</p>
	 <div align="center"><input name="imageField" src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_confirm_limited.gif" border="0" type="image"></div>
	</form>
	<br>
<?php
}
else { echo '<br><div align="center">'.TEXT_ALREADY_DONE.'<br><a class="red_slogan" href="mydvdpost.php">'.TEXT_BACK.'</a></div>';  } 
?>
