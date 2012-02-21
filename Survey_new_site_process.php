<?php

require('configure/application_top.php');

$current_page_name = FILENAME_SURVEY_NEW_SITE_PROCESS;

include(DIR_WS_INCLUDES . 'translation.php');

  $q1 = tep_db_prepare_input($HTTP_POST_VARS['q1']);
  $q2 = tep_db_prepare_input($HTTP_POST_VARS['q2']);
  $q3 = tep_db_prepare_input($HTTP_POST_VARS['q3']);
  $q4_a = tep_db_prepare_input($HTTP_POST_VARS['q4_a']);
  $q4_b = tep_db_prepare_input($HTTP_POST_VARS['q4_b']);
  $q4_c = tep_db_prepare_input($HTTP_POST_VARS['q4_c']);
  $q4_d = tep_db_prepare_input($HTTP_POST_VARS['q4_d']);
  $q4_e = tep_db_prepare_input($HTTP_POST_VARS['q4_e']);
  $q4_f = tep_db_prepare_input($HTTP_POST_VARS['q4_f']);
  $q4_g = tep_db_prepare_input($HTTP_POST_VARS['q4_g']);
  $q4_h = tep_db_prepare_input($HTTP_POST_VARS['q4_h']);
  $q4_i = tep_db_prepare_input($HTTP_POST_VARS['q4_i']);
  
$page_body_to_include = $current_page_name;

tep_db_query("insert into survey_new_site (customers_id, date, language, q1, q2 ,q3 ,q4_a, q4_b, q4_c, q4_d, q4_e, q4_f, q4_g, q4_h, q4_i ) values ('" . $customer_id . "', now(), '" . $languages_id . "', '" . $HTTP_POST_VARS['q1'] . "' , '" . $HTTP_POST_VARS['q2'] . "', '" . $HTTP_POST_VARS['q3'] . "' , '" . $HTTP_POST_VARS['q4_a'] . "' , '" . $HTTP_POST_VARS['q4_b'] . "' , '" . $HTTP_POST_VARS['q4_c'] . "' , '" . $HTTP_POST_VARS['q4_d'] . "' , '" . $HTTP_POST_VARS['q4_e'] . "' , '" . $HTTP_POST_VARS['q4_f'] . "' , '" . $HTTP_POST_VARS['q4_g'] . "' ,  '" . $HTTP_POST_VARS['q4_h'] . "' , '" . $HTTP_POST_VARS['q4_i'] . "'  ) ");

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>