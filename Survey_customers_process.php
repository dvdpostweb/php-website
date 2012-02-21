<?php

require('configure/application_top.php');

$current_page_name = FILENAME_SURVEY_CUSTOMERS_PROCESS;

include(DIR_WS_INCLUDES . 'translation.php');

  $Q1 = tep_db_prepare_input($HTTP_POST_VARS['Q1']);
  
  $Q2 = tep_db_prepare_input($HTTP_POST_VARS['Q2']);
  $Q3 = tep_db_prepare_input($HTTP_POST_VARS['Q3']);
  
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q4_a']);
	if ($tmp=='check'){	$Q4_a=1; }else {$Q4_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q4_b']);
	if ($tmp=='check'){	$Q4_b=1; }else {$Q4_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q4_c']);
	if ($tmp=='check'){	$Q4_c=1; }else {$Q4_c=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q4_d']);
	if ($tmp=='check'){	$Q4_d=1; }else {$Q4_d=0;}
  
  $Q5 = tep_db_prepare_input($HTTP_POST_VARS['Q5']);

  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q6_a']);
	if ($tmp=='check'){	$Q6_a=1; }else {$Q6_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q6_b']);
	if ($tmp=='check'){	$Q6_b=1; }else {$Q6_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q6_c']);
	if ($tmp=='check'){	$Q6_c=1; }else {$Q6_c=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q6_d']);
	if ($tmp=='check'){	$Q6_d=1; }else {$Q6_d=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q6_e']);
	if ($tmp=='check'){	$Q6_e=1; }else {$Q6_e=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q6_f']);
	if ($tmp=='check'){	$Q6_f=1; }else {$Q6_f=0;}
  $Specify_Q6 = tep_db_prepare_input($HTTP_POST_VARS['Specify_Q6']);
  
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q7_a']);
	if ($tmp=='check'){	$Q7_a=1; }else {$Q7_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q7_b']);
	if ($tmp=='check'){	$Q7_b=1; }else {$Q7_b=0;}
  
  $Q8 = tep_db_prepare_input($HTTP_POST_VARS['Q8']);
  
  $Q9 = tep_db_prepare_input($HTTP_POST_VARS['Q9']);
  
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q10_a']);
	if ($tmp=='check'){	$Q10_a=1; }else {$Q10_a=0;} 
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q10_b']);
	if ($tmp=='check'){	$Q10_b=1; }else {$Q10_b=0;}  
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q10_c']);
	if ($tmp=='check'){	$Q10_c=1; }else {$Q10_c=0;}  

  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q11_a']);
	if ($tmp=='check'){	$Q11_a=1; }else {$Q11_a=0;} 
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q11_b']);
	if ($tmp=='check'){	$Q11_b=1; }else {$Q11_b=0;} 

  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q12_a']);
	if ($tmp=='check'){	$Q12_a=1; }else {$Q12_a=0;} 
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q12_b']);
	if ($tmp=='check'){	$Q12_b=1; }else {$Q12_b=0;} 

  $Q13 = tep_db_prepare_input($HTTP_POST_VARS['Q13']); 

  $Q14 = tep_db_prepare_input($HTTP_POST_VARS['Q14']);
  
  $Q15 = tep_db_prepare_input($HTTP_POST_VARS['Q15']); 
  
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q16_a']);
	if ($tmp=='check'){	$Q16_a=1; }else {$Q16_a=0;} 
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q16_b']);
	if ($tmp=='check'){	$Q16_b=1; }else {$Q16_b=0;} 
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q16_c']);
	if ($tmp=='check'){	$Q16_c=1; }else {$Q16_c=0;} 
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q16_d']);
	if ($tmp=='check'){	$Q16_d=1; }else {$Q16_d=0;} 
  
  $Q17 = tep_db_prepare_input($HTTP_POST_VARS['Q17']); 
  
  $Q18 = tep_db_prepare_input($HTTP_POST_VARS['Q18']);
  $Specify_Q18 = tep_db_prepare_input($HTTP_POST_VARS['Specify_Q18']);  
  
  $Q19 = tep_db_prepare_input($HTTP_POST_VARS['Q19']);
  $Specify_Q19 = tep_db_prepare_input($HTTP_POST_VARS['Specify_Q19']);  

  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q20_a']);
	if ($tmp=='check'){	$Q20_a=1; }else {$Q20_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q20_b']);
	if ($tmp=='check'){	$Q20_b=1; }else {$Q20_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q20_c']);
	if ($tmp=='check'){	$Q20_c=1; }else {$Q20_c=0;}

  $Q21 = tep_db_prepare_input($HTTP_POST_VARS['Q21']);

  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q22_a']);
	if ($tmp=='check'){	$Q22_a=1; }else {$Q22_a=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q22_b']);
	if ($tmp=='check'){	$Q22_b=1; }else {$Q22_b=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q22_c']);
	if ($tmp=='check'){	$Q22_c=1; }else {$Q22_c=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q22_d']);
	if ($tmp=='check'){	$Q22_d=1; }else {$Q22_d=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q22_e']);
	if ($tmp=='check'){	$Q22_e=1; }else {$Q22_e=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q22_f']);
	if ($tmp=='check'){	$Q22_f=1; }else {$Q22_f=0;}
  $tmp = tep_db_prepare_input($HTTP_POST_VARS['Q22_g']);  
	if ($tmp=='check'){	$Q22_g=1; }else {$Q22_g=0;}
  $Specify_Q22 = tep_db_prepare_input($HTTP_POST_VARS['Specify_Q22']);   
   
tep_db_query("INSERT INTO survey_customers (survey_customers_id , customers_id , date , language , Q1 , Q2 , Q3 , Q4_a , Q4_b , Q4_c , Q4_d , Q5 , Q6_a , Q6_b , Q6_c , Q6_d , Q6_e , Q6_f , Specify_Q6 , Q7_a , Q7_b , Q8 , Q9 , Q10_a , Q10_b , Q10_c , Q11_a , Q11_b , Q12_a , Q12_b , Q13 , Q14 ,  Q15 , Q16_a , Q16_b , Q16_c , Q16_d , Q17 , Q18 , Specify_Q18 , Q19 , Specify_Q19 , Q20_a , Q20_b , Q20_c , Q21 , Q22_a , Q22_b , Q22_c , Q22_d , Q22_e , Q22_f , Q22_g , Specify_Q22 ) VALUES ('', '" . $customer_id . "', now(), '" . $languages_id . "', '" . $Q1 . "' , '" . $Q2 . "', '" . $Q3 . "', '" . $Q4_a . "', '" . $Q4_b ."', '" . $Q4_c. "', '" . $Q4_d. "', '" . $Q5 . "', '" . $Q6_a . "', '" . $Q6_b . "', '" . $Q6_c . "', '" . $Q6_d . "', '" . $Q6_e . "', '" . $Q6_f. "', '" . $Specify_Q6 . "', '" . $Q7_a . "', '" . $Q7_b . "', '" . $Q8 . "', '" . $Q9 . "', '" . $Q10_a . "', '" . $Q10_b . "', '" . $Q10_c . "', '" . $Q11_a . "', '" . $Q11_b . "', '" . $Q12_a . "', '" . $Q12_b . "', '" . $Q13 . "', '" . $Q14 . "',  '" . $Q15 . "', '" . $Q16_a . "', '" . $Q16_b . "', '" . $Q16_c . "', '" . $Q16_d . "', '" . $Q17 . "', '" . $Q18. "', '" . $Specify_Q18 . "', '" . $Q19 . "', '" . $Specify_Q19 . "', '" . $Q20_a . "', '" . $Q20_b . "', '" . $Q20_c . "', '" . $Q21 . "', '" . $Q22_a . "', '" . $Q22_b . "', '" . $Q22_c . "', '" . $Q22_d . "', '" . $Q22_e . "', '" . $Q22_f . "', '" . $Q22_g . "', '" . $Specify_Q22 . "' ) ");
 


 
$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>