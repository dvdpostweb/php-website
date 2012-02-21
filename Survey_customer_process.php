<?php

require('configure/application_top.php');

$current_page_name = FILENAME_SURVEY_CUSTOMERS_PROCESS;

include(DIR_WS_INCLUDES . 'translation.php');

  //Q1
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q1_a']);
	if ($tmp=='check'){	$Q1_a=1; }else {$Q1_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q1_b']);
	if ($tmp=='check'){	$Q1_b=1; }else {$Q1_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q1_c']);
	if ($tmp=='check'){	$Q1_c=1; }else {$Q1_c=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q1_d']);
	if ($tmp=='check'){	$Q1_d=1; }else {$Q1_d=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q1_e']);
	if ($tmp=='check'){	$Q1_e=1; }else {$Q1_e=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q1_f']);
	if ($tmp=='check'){	$Q1_f=1; }else {$Q1_f=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q1_g']);
	if ($tmp=='check'){	$Q1_g=1; }else {$Q1_g=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q1_h']);
	if ($tmp=='check'){	$Q1_h=1; }else {$Q1_h=0;}
  
  //Q2
  $Q2 = tep_db_prepare_input($HTTP_POST_VARS['Q2']);
  
  //Q3
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q3_a']);
	if ($tmp=='check'){	$Q3_a=1; }else {$Q3_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q3_b']);
	if ($tmp=='check'){	$Q3_b=1; }else {$Q3_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q3_c']);
	if ($tmp=='check'){	$Q3_c=1; }else {$Q3_c=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q3_d']);
	if ($tmp=='check'){	$Q3_d=1; }else {$Q3_d=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q3_e']);
	if ($tmp=='check'){	$Q3_e=1; }else {$Q3_e=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q3_f']);
	if ($tmp=='check'){	$Q3_f=1; }else {$Q3_f=0;}	
  $Specify_Q3=str_replace("'", "’", tep_db_prepare_input($HTTP_POST_VARS['Specify_Q3']));
  
  //Q4
  $Q4 = tep_db_prepare_input($HTTP_POST_VARS['Q4']);
  
  //Q5
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q5_a']);
	if ($tmp=='check'){	$Q5_a=1; }else {$Q5_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q5_b']);
	if ($tmp=='check'){	$Q5_b=1; }else {$Q5_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q5_c']);
	if ($tmp=='check'){	$Q5_c=1; }else {$Q5_c=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q5_d']);
	if ($tmp=='check'){	$Q5_d=1; }else {$Q5_d=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q5_e']);
	if ($tmp=='check'){	$Q5_e=1; }else {$Q5_e=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q5_f']);
	if ($tmp=='check'){	$Q5_f=1; }else {$Q5_f=0;}
  $Specify_Q5=str_replace("'", "’", tep_db_prepare_input($HTTP_POST_VARS['Specify_Q5']));
	
  //Q6
  $Q6_comment=str_replace("'", "’", tep_db_prepare_input($HTTP_POST_VARS['Q6_comment']));

  //Q7
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q7_a']);
	if ($tmp=='check'){	$Q7_a=1; }else {$Q7_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q7_b']);
	if ($tmp=='check'){	$Q7_b=1; }else {$Q7_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q7_c']);
	if ($tmp=='check'){	$Q7_c=1; }else {$Q7_c=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q7_d']);
	if ($tmp=='check'){	$Q7_d=1; }else {$Q7_d=0;}

  //Q8
  $Q8 = tep_db_prepare_input($HTTP_POST_VARS['Q8']);
  
  //Q9
  $Q9 = tep_db_prepare_input($HTTP_POST_VARS['Q9']);  
  
  //Q10
  $Q10 = tep_db_prepare_input($HTTP_POST_VARS['Q10']);

  //Q11
  $Q11 = tep_db_prepare_input($HTTP_POST_VARS['Q11']);
  $Specify_Q11=str_replace("'", "’", tep_db_prepare_input($HTTP_POST_VARS['Specify_Q11']));

  
  //Q12
  $Q12_a = tep_db_prepare_input($HTTP_POST_VARS['Q12_a']);
  $Q12_b = tep_db_prepare_input($HTTP_POST_VARS['Q12_b']);
  $Q12_c = tep_db_prepare_input($HTTP_POST_VARS['Q12_c']);
  
  //Q13
  $Q13 = tep_db_prepare_input($HTTP_POST_VARS['Q13']);  

  //Q14
  $Q14 = tep_db_prepare_input($HTTP_POST_VARS['Q14']);

  //Q15
  $Q15 = tep_db_prepare_input($HTTP_POST_VARS['Q15']);

  //Q16
  $Q16 = tep_db_prepare_input($HTTP_POST_VARS['Q16']);

  //Q17
  $Q17 = tep_db_prepare_input($HTTP_POST_VARS['Q17']);  
  
  //Q18
  $Q18 = tep_db_prepare_input($HTTP_POST_VARS['Q18']);

  //Q19
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q19_a']);
	if ($tmp=='check'){	$Q19_a=1; }else {$Q19_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q19_b']);
	if ($tmp=='check'){	$Q19_b=1; }else {$Q19_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q19_c']);
	if ($tmp=='check'){	$Q19_c=1; }else {$Q19_c=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q19_d']);
	if ($tmp=='check'){	$Q19_d=1; }else {$Q19_d=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q19_e']);
	if ($tmp=='check'){	$Q19_e=1; }else {$Q19_e=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q19_f']);
	if ($tmp=='check'){	$Q19_f=1; }else {$Q19_f=0;} 
  
  //Q20
  $Q20 = tep_db_prepare_input($HTTP_POST_VARS['Q20']);
  
  //Q21
  $Q21 = tep_db_prepare_input($HTTP_POST_VARS['Q21']);
  
  //Q22
  $Q22 = tep_db_prepare_input($HTTP_POST_VARS['Q22']);
  
  //Q23
  $Q23_a = tep_db_prepare_input($HTTP_POST_VARS['Q23_a']);
  $Q23_b = tep_db_prepare_input($HTTP_POST_VARS['Q23_b']);
  $Q23_c = tep_db_prepare_input($HTTP_POST_VARS['Q23_c']); 
  $Q23_d = tep_db_prepare_input($HTTP_POST_VARS['Q23_d']);   


   
tep_db_query("INSERT INTO survey_customers_2 (survey_customers_id , customers_id , date , language , Q1_a, Q1_b, Q1_c, Q1_d, Q1_e, Q1_f, Q1_g, Q1_h, Q2, Q3_a, Q3_b, Q3_c, Q3_d, Q3_e, Q3_f, Specify_Q3, Q4, Q5_a, Q5_b, Q5_c, Q5_d, Q5_e, Q5_f, Specify_Q5, Q6_comment, Q7_a, Q7_b, Q7_c, Q7_d, Q8, Q9, Q10, Q11, Specify_Q11, Q12_a, Q12_b, Q12_c, Q13, Q14, Q15, Q16, Q17, Q18, Q19_a, Q19_b, Q19_c, Q19_d, Q19_e, Q19_f, Q20, Q21, Q22, Q23_a, Q23_b, Q23_c, Q23_d )VALUES ('', '" . $customer_id . "', now(), '" . $languages_id . "', '" . $Q1_a. "', '" .  $Q1_b. "', '" .  $Q1_c. "', '" .  $Q1_d. "', '" .  $Q1_e. "', '" .  $Q1_f. "', '" .  $Q1_g. "', '" .  $Q1_h. "', '" .  $Q2. "', '" .  $Q3_a. "', '" .  $Q3_b. "', '" .  $Q3_c. "', '" .  $Q3_d. "', '" .  $Q3_e. "', '" .  $Q3_f. "', '" .  strtr($Specify_Q3,"'","''"). "', '" .  $Q4. "', '" .  $Q5_a. "', '" .  $Q5_b. "', '" .  $Q5_c. "', '" .  $Q5_d. "', '" .  $Q5_e. "', '" .  $Q5_f. "', '" .  strtr($Specify_Q5,"'","''"). "', '" .  strtr($Q6_comment,"'","''"). "', '" .  $Q7_a. "', '" .  $Q7_b. "', '" .  $Q7_c. "', '" .  $Q7_d. "', '" .  $Q8. "', '" .  $Q9. "', '" .  $Q10. "', '" .  $Q11. "', '" .  strtr($Specify_Q11,"'","''"). "', '" .  $Q12_a. "', '" .  $Q12_b. "', '" .  $Q12_c. "', '" .  $Q13. "', '" .  $Q14. "', '" .  $Q15. "', '" .  $Q16. "', '" .  $Q17. "', '" .  $Q18. "', '" .  $Q19_a. "', '" .  $Q19_b. "', '" .  $Q19_c. "', '" .  $Q19_d. "', '" .  $Q19_e. "', '" .  $Q19_f. "', '" .  $Q20. "', '" .  $Q21. "', '" .  $Q22. "', '" .  $Q23_a. "', '" .  $Q23_b. "', '" .  $Q23_c. "', '" .  $Q23_d . "' ) ");

 
$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>