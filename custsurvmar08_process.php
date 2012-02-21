<?php

require('configure/application_top.php');

$current_page_name = 'custsurvmar08_process.php';

include(DIR_WS_INCLUDES . 'translation.php');

  //Q1
  $Q1_EXP1 = tep_db_prepare_input($HTTP_POST_VARS['Q1_EXP1']);


  //Q2
  $Q2_EXP1 = tep_db_prepare_input($HTTP_POST_VARS['Q2_EXP1']);
  
  //Q3
  $Q3a_EXP1 = tep_db_prepare_input($HTTP_POST_VARS['Q3a_EXP1']);
  $Q3a_EXP2 = tep_db_prepare_input($HTTP_POST_VARS['Q3a_EXP2']);
  $Q3a_EXP3 = tep_db_prepare_input($HTTP_POST_VARS['Q3a_EXP3']);
  $Q3a_EXP4 = tep_db_prepare_input($HTTP_POST_VARS['Q3a_EXP4']);
  $Q3a_EXP5 = tep_db_prepare_input($HTTP_POST_VARS['Q3a_EXP5']);
  $Q3a_EXPLAIN=str_replace("'", "’", tep_db_prepare_input($HTTP_POST_VARS['Q3a_EXPLAIN']));
  
  $Q3b_EXP1 = tep_db_prepare_input($HTTP_POST_VARS['Q3b_EXP1']);
  $Q3b_EXP2 = tep_db_prepare_input($HTTP_POST_VARS['Q3b_EXP2']);
  $Q3b_EXP3 = tep_db_prepare_input($HTTP_POST_VARS['Q3b_EXP3']);
  $Q3b_EXP4 = tep_db_prepare_input($HTTP_POST_VARS['Q3b_EXP4']);
  $Q3b_EXP5 = tep_db_prepare_input($HTTP_POST_VARS['Q3b_EXP5']);
  $Q3b_EXPLAIN=str_replace("'", "’", tep_db_prepare_input($HTTP_POST_VARS['Q3b_EXPLAIN']));
  
  //Q4

  $Q4a_EXP1 = tep_db_prepare_input($HTTP_POST_VARS['Q4a_EXP1']);
  $Q4a_EXP2 = tep_db_prepare_input($HTTP_POST_VARS['Q4a_EXP2']);
  $Q4a_EXP3 = tep_db_prepare_input($HTTP_POST_VARS['Q4a_EXP3']);
  $Q4a_EXP4 = tep_db_prepare_input($HTTP_POST_VARS['Q4a_EXP4']);
  $Q4a_EXP5 = tep_db_prepare_input($HTTP_POST_VARS['Q4a_EXP5']);
  
  $Q4b_EXP1 = tep_db_prepare_input($HTTP_POST_VARS['Q4b_EXP1']);
  $Q4b_EXP2 = tep_db_prepare_input($HTTP_POST_VARS['Q4b_EXP2']);
  $Q4b_EXP3 = tep_db_prepare_input($HTTP_POST_VARS['Q4b_EXP3']);
  $Q4b_EXP4 = tep_db_prepare_input($HTTP_POST_VARS['Q4b_EXP4']);

  //Q5
  $Q5_EXP1 = tep_db_prepare_input($HTTP_POST_VARS['Q5_EXP1']);
  $Q5_EXP2 = tep_db_prepare_input($HTTP_POST_VARS['Q5_EXP2']);
  $Q5_EXP3 = tep_db_prepare_input($HTTP_POST_VARS['Q5_EXP3']);
  $Q5_EXP4 = tep_db_prepare_input($HTTP_POST_VARS['Q5_EXP4']);

  //GFC
  $GFC = tep_db_prepare_input($HTTP_POST_VARS['GFC']);
     
  //COMMENT
  $comment=str_replace("'", "’", tep_db_prepare_input($HTTP_POST_VARS['comment']));
   
  

   
tep_db_query("INSERT INTO survey_customers_2008 VALUES ('', '" . $customer_id . "', now(), '" . $languages_id . "', '" . $Q1_EXP1. "', '" .  $Q2_EXP1. "', '" .  $Q3a_EXP1. "', '" .  $Q3a_EXP2. "', '" .  $Q3a_EXP3. "', '" .  $Q3a_EXP4. "', '" .  $Q3a_EXP5. "', '" .   strtr($Q3a_EXPLAIN,"'","''"). "', '" .  $Q3b_EXP1. "', '" .  $Q3b_EXP2. "', '" .  $Q3b_EXP3. "', '" .  $Q3b_EXP4. "', '" .  $Q3b_EXP5. "', '" .   strtr($Q3b_EXPLAIN,"'","''"). "', '" .  $Q4a_EXP1. "', '" .  $Q4a_EXP2. "', '" .  $Q4a_EXP3. "', '" .  $Q4a_EXP4. "', '" .  $Q4a_EXP5. "', '" .  $Q4b_EXP1. "', '" .  $Q4b_EXP2. "', '" .  $Q4b_EXP3. "', '" .  $Q4b_EXP4. "', '" .  $Q5_EXP1. "', '" . $Q5_EXP2. "', '" .  $Q5_EXP3. "', '" .  $Q5_EXP4. "', '" .  $GFC. "', '" .   strtr($comment,"'","''"). "' ) ");

 
$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>