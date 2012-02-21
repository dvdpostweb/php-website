<?php

require('configure/application_top.php');

$current_page_name = FILENAME_SURVEY_CUSTSERV_PROCESS;

include(DIR_WS_INCLUDES . 'translation.php');

  $q1_a = tep_db_prepare_input($HTTP_POST_VARS['q1_a']);
  $q1_b = tep_db_prepare_input($HTTP_POST_VARS['q1_b']);
  $q1_c = tep_db_prepare_input($HTTP_POST_VARS['q1_c']);
  $q1_d = tep_db_prepare_input($HTTP_POST_VARS['q1_d']);
  $q1_e = tep_db_prepare_input($HTTP_POST_VARS['q1_e']);
  $q1_f = tep_db_prepare_input($HTTP_POST_VARS['q1_f']);
  
  $q2_a = tep_db_prepare_input($HTTP_POST_VARS['q2_a']);
  $q2_b = tep_db_prepare_input($HTTP_POST_VARS['q2_b']);
  $q2_c = tep_db_prepare_input($HTTP_POST_VARS['q2_c']);
  $q2_d = tep_db_prepare_input($HTTP_POST_VARS['q2_d']);
  
  $cust_point = tep_db_prepare_input($HTTP_POST_VARS['cust_point']);
  
  $q3_a = tep_db_prepare_input($HTTP_POST_VARS['q3_a']);
  $q3_b = tep_db_prepare_input($HTTP_POST_VARS['q3_b']);
  $q3_c = tep_db_prepare_input($HTTP_POST_VARS['q3_c']);
  $q3_d = tep_db_prepare_input($HTTP_POST_VARS['q3_d']);
  $q3_e = tep_db_prepare_input($HTTP_POST_VARS['q3_e']);
  
  $q4_a = tep_db_prepare_input($HTTP_POST_VARS['q4_a']);
  $q4_b = tep_db_prepare_input($HTTP_POST_VARS['q4_b']);

  $q5_a = tep_db_prepare_input($HTTP_POST_VARS['q5']);
  
  $q6_a = tep_db_prepare_input($HTTP_POST_VARS['q6_a']);

  $q7_a = tep_db_prepare_input($HTTP_POST_VARS['q7_a']);
  $q7_b = tep_db_prepare_input($HTTP_POST_VARS['q7_b']);
  $q7_c = tep_db_prepare_input($HTTP_POST_VARS['q7_c']);
  $q7_d = tep_db_prepare_input($HTTP_POST_VARS['q7_d']);
    
  $comment = tep_db_prepare_input($HTTP_POST_VARS['comment3']);
    
tep_db_query("insert into survey_custserv (customers_id, date, language, q1_a, q1_b, q1_c, q1_d, q1_e, q1_f, q2_a, q2_b, q2_c, q2_d, cust_point, q3_a, q3_b, q3_c, q3_d , q3_e, q4_a, q4_b, q5_a, q6_a, q7_a, q7_b, q7_c, q7_d, comment3 ) values ('" . $customer_id . "', now(), '" . $languages_id . "', '" . $q1_a . "' , '" . $q1_b . "', '" . $q1_c . "' , '" . $q1_d . "' , '" . $q1_e . "' , '" . $q1_f . "' , '" . $q2_a . "'  , '" . $q2_b . "', '" . $q2_c . "' , '" . $q2_d . "'  , '" . strtr($HTTP_POST_VARS['cust_point'],"'","''") . "', '" . $q3_a . "' , '" . $q3_b . "' , '" . $q3_c . "' , '" . $q3_d . "' , '" . $q3_e . "' , '" . $q4_a . "' , '" . $q4_b . "' , '" . $q5_a . "' , '" . $q6_a . "' , '" . $q7_a . "' , '" . $q7_b . "' , '" . $q7_c . "' , '" . $q7_d . "' , '" . strtr($HTTP_POST_VARS['comment3'],"'","''") . "' ) ");
  
$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>